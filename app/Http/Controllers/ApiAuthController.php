<?php
namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Account_condition;
use App\Models\Conditions_types;
use App\Models\Priority_types;
use App\Models\Relationship_types;
use App\Models\Emergency_contact;
use App\Models\EvaFirebaseToken;
use App\Models\EvaUsuario;
use App\Models\EvaPersona;

use App\Models\Fileentry;


use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

use Mail;
use Session;
use Redirect;

class ApiAuthController extends Controller
{


    public function userAuth(Request $request)
    {
        $token = null;
        if (($request->ci == null && $request->email == null) || $request->password == null) {
            return response()->json(["success" => "False", "error" => "Faltan datos. Debe indicar email y password"], 400);
        }

        if ($request->firebase_token == null) {
            return response()->json(["success" => "False", "error" => "Debe indicar el token de firebase"], 400);
        }

        $loginBy = "";
        if ($request->ci != null) {
            $loginBy = "ci";
            $loginCred = $request->ci;
            $usuario = Account::byCI($request->ci);
        } else if ($request->email != null) {
            $loginBy = "email";
            $loginCred = $request->email;
            $usuario = Account::byEmail($request->email);
        }

        if ($usuario == null) {
            return response()->json(["success" => "False", "error" => "No existe un usuario con " . $loginBy . " igual a " . ($loginBy == "CI" ? $request->ci : $request->email)], 401);
        }

        try {
            $token = JWTAuth::attempt([$loginBy => $loginCred, 'password' => $request->password]);
            if (!$token) {
                return response()->json(["success" => "False", "error" => "Clave incorrecta, por favor verifique sus datos"], 401);
            }
        } catch (JWTException $ex) {
            return response()->json(["success" => "False", "error" => "Error desconocido al loguearse"], 401);
        }

        $is_first_login = $usuario->isFirstLogin();

        date_default_timezone_set("America/Caracas");
        $usuario->last_login = date('Y-m-d H:i:s', time());

        if (!$usuario->save()) {
            $resp = array("message" => "Error desconocido al actualizar la fecha de ingreso");
            return response()->json(array_replace($this->response_base, $resp), 500);
        }

        $this->setFirebaseToken($request, false);

        $usuario->token = $token;
        $usuario->is_first_login = $is_first_login;
        $resp = array(
            "success" => "true",
            "account" => $usuario

        );
        return response()->json($resp, 200);

    }


    public function setFirebaseToken(Request $request, $return = true)
    {
        if ($request->id == null || $request->firebase_token == null) {
            return response()->json(["message" => "Faltan datos. Debe indicar: id de usuario (id) y firebase_token"], 400);
        }

        // Verifica que el token ya exista
        $firebaseToken = FirebaseToken::where("firebase_token", $request->firebase_token)->first();

        if (!$firebaseToken) {
            $firebaseToken = new FirebaseToken;
            $firebaseToken->firebase_token = $request->firebase_token;
        }
        $firebaseToken->account_id = $request->id;
        $firebaseToken->save();

        if ($return) {
            return response()->json(["message" => "Token almacenado correctamente"], 200);
        }

        return True;
    }


    public function register(Request $request, $save = true)
    {
        // Valida si faltan datos
        $v = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'ci' => 'required',
            'role' => 'required'
        ]);

        if ($v->fails()) {
            return response()->json(["success" => "False", "error" => "Faltan datos. Debe indicar: email, password, nombre, teléfono, ci, role"], 422);
        }

        // Valida si el correo exista
        $usuario = Account::byEmail($request->email);
        if ($usuario != null) {
            return response()->json(["success" => "False", "error" => "Este correo ya esta siendo usado"], 422);
        }
        // Valida el formato del correo
        $v = Validator::make($request->all(), [
            'email' => 'email|max:255'
        ]);

        if ($v->fails()) {
            return response()->json(["success" => "False", "Error" => "Correo inválido"], 422);
        }

        $usuario = Account::byCI($request->ci);
        if ($usuario != null) {
            return response()->json(["success" => "False", "error" => "Esta cédula ya está siendo usada"], 422);
        }

        // admin solo se crea desde la bd
        $rolefinded = Role::where('id',$request->role)->first();

        if (!$rolefinded){
            return response()->json(["success" => "False", "description" => "ERROR: Usted ha indicado un rol que no es válido"], 404);
        }


        $photo = 0;
        if ($request->photo != null) {
            $photoResult = $this->savePhoto($request, $save);
            if (strpos($photoResult, 'True') == false) {
                return $photoResult;
            } else {
                $photo = 1;
            }
        }

        $account = new Account;
        $account->ci = $request->ci;
        $account->name = $request->name;
        $account->password = Hash::make($request->password);
        $account->phone = $request->phone;

        $account->is_active = 1;
        $account->role = $rolefinded->id;

        $account->last_login = "0001-01-01 00:01:01";

        $now = date("Y-m-d H:i:s", time());
        $account->registration_date = $now;

        $account->email = $request->email;
        $account->photo = $photo;

        if ($save) {
            $account->save();
        }
        return response()->json(["success" => "True", "account" => $account], 200);
    }

    public function validRegister(Request $request)
    {
        return $this->register($request, false);
    }

    public function savePhoto(Request $request, $save = true, $is_ci = false)
    {

        if (($is_ci && $request->ci_photo == null) || (!$is_ci && $request->photo == null)) {
            return response()->json(["success" => "False", "error" => "No se ha adjuntado ninguna foto"], 422);
        }

        $field_name = ($is_ci ? 'ci_photo' : 'photo');

        $v = Validator::make($request->all(), [
            $field_name => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($v->fails()) {
            return response()->json(["success" => "False", "error" => "La foto debe tener un formato valido (jpeg,png,jpg,gif,svg)"], 422);

        }

        $v = Validator::make($request->all(), [
            $field_name => 'max:2048',
        ]);

        if ($v->fails()) {
            return response()->json(["success" => "False", "error" => "La foto debe pesar menos de 2 Megas"], 422);

        }

        $v = Validator::make($request->all(), [
            'ci' => 'required',
        ]);

        if ($v->fails()) {
            return response()->json(["success" => "False", "error" => "Debe indicar la cedula a la que esta asociada la foto"], 422);
        }

        if ($save) {
            $image = $request->file($field_name);
            $input['imagename'] = $request->ci . '.' . $image->getClientOriginalExtension();
            if ($is_ci) {
                $destinationPath = public_path('/images/ci/');
            } else {
                $destinationPath = public_path('/images/profiles/');
            }
            $image->move($destinationPath, $input['imagename']);
        }

        return response()->json(["success" => "True", "description" => "Imagen subida con exito"], 200);
    }

    private function validarRole($role)
    {

    }

    public function forgotPassword(Request $request)
    {
        $newPassLen = 8;


        if ($request->email == null && $request->ci == null) {
            return response()->json(["success" => "False", "description" => "ERROR: Debe indicar el correo o la ci"], 400);
        }

        if ($request->email) {
            $fieldTargetName = "email";
            $fieldValue = $request->email;
        } else {
            $fieldTargetName = "ci";
            $fieldValue = $request->ci;
        }

        $account = Account::where($fieldTargetName, $fieldValue)->first();

        if ($account == null) {
            return response()->json(["success" => "False", "description" => "ERROR: No existe ningun usuario con " . $fieldTargetName . " " . $fieldValue], 404);
        }

        $newRandomPassword = $this->randomPassword($newPassLen);
        $data = ['nombre' => $account->name,
            'nueva_clave' => $newRandomPassword];

        Mail::send('emails.contact', $data, function ($m) use ($account) {
            $m->to($account->email)->subject("Recuperación de contraseña");
        });

        $account->password = Hash::make($newRandomPassword);

        $account->save();

        if (!$account->save()) {
            return response()->json(["success" => "False", "description" => "ERROR: Problema al guardar en la bd"], 500);
        }

        return response()->json(["success" => "True", "description" => "Email enviado con exito a su correo"], 200);
    }


    public function changePassword(Request $request)
    {
        if ($request->old_password == null or $request->new_password==null) {
            return response()->json(["success" => "False", "description" => "ERROR: Debe indicar los campos old_password y new_password"], 400);
        }

        if (JWTAuth::attempt(['id' => $request->user->id, 'password' => $request->old_password])==null) {
            return response()->json(["success" => "False", "description" => "ERROR: La clave anterior es incorrecta"], 401);
        }
        $request->user->password=Hash::make($request->new_password);
        $request->user->save();
        return response()->json(["success" => "True", "description" => "Exito al cambiar la clave"], 200);
    }

    private function randomPassword($len)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $newPass = implode($pass);
        return substr($newPass, 0, $len);
    }


    function send_notification($tokens, $message)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids' => $tokens,
            'data' => $message
        );
        $headers = array(
            'Authorization:key = AAAASeodYfI:APA91bFuqSCDUs838T8fEFcyEmHQjADOM2haSUpmS7H_kcwnuPUwhneMdVyP9S0hnoi8BmqStW2tA72JLRPWwoDurwRSRrcmuScw-csD-q6qhd_oWt1j03Mk7HXfUnIYiB4kxBlGOuxD79tITbRfHYlb_2qgOhDRrQ',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }



}