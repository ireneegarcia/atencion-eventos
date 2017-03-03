<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function byCI($ci)
    {
        $account= Account::byCI($ci);
        if ($account==null){
            return response()->json(["success" => "False", "error" => "Usuario con cédula N° ".$ci." no encontrado"], 400);
        }
        return response()->json(["success" => "True", "account" => $account], 200);
    }

    public function byEmail($email)
    {
        $account= Account::byEmail($email);
        if ($account==null){
            return response()->json(["success" => "False", "error" => "Usuario con email '".$email."' no encontrado"], 400);
        }
        return response()->json(["success" => "True", "account" => $account], 200);
    }
}
