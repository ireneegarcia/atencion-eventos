<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Account_condition;
use App\Models\Conditions_types;
use App\Models\Emergency_contact;
use App\Models\Priority_types;
use App\Models\Relationship_types;
use Illuminate\Http\Request;

use App\Models\Todo;


class OperatorController extends Controller
{
    //Controladores para los to do list

    public function todoList()
    {

        $todos = Todo::where('account',  1)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('/index', [
            'todos' => $todos
        ]);
    }

    public function storeTodo(Request $request)
    {
        $newTodo = new Todo;

        $newTodo->item = $request['item'];
        $newTodo->status = 1;
        $newTodo->account = $request['account'];;

        if(!$newTodo->save())
        {
            return response()->json(500);
        }

        $newTodo->id;
        return response()->json($newTodo->id,200);
    }

    public function doneTodo(Request $request)
    {
        $statusTodo = Todo::byId($request->id);

        $statusTodo->status = 2;
        //$statusTodo->account =1;

        if(!$statusTodo->save())
        {
            return response()->json(500);
        }

        return response()->json(200);
    }


    //Controladores para los tipos de usuarios

    //Clientes
    function getClients()
    {
        $clients = Account::where('role', 2)
                ->orderBy('name', 'asc')
                ->get();

        return view('clients', [
            'clients' => $clients
        ]);
    }

    //Servicios
    function getServices()
    {
        $services = Account::where('role', 3)
                ->orderBy('name', 'asc')
                ->get();

        return view('services', [
            'services' => $services
        ]);
    }

    //Operadores
    function getOperators()
    {
        $operators = Account::where('role', 4)
                ->orderBy('name', 'asc')
                ->get();

        return view('operators', [
            'operators' => $operators
        ]);
    }

    //Admin
    function getAdmin()
    {
        $admins = Account::where('role', 1)
                ->orderBy('name', 'asc')
                ->get();

        return view('admin', [
            'admins' => $admins
        ]);
    }

    //PROFILE
    function getProfile()
    {
        $profile = Account::where('id', 1)->first();

        $conditions = Conditions_types::orderBy('name')->get();

        $priority_types = Priority_types::orderBy('description', 'asc')->get();

        $relationship_types = Relationship_types::orderBy('name', 'asc')->get();

        return view('profile', [
            'profile' => $profile,
            'conditions' =>$conditions,
            'priority_types' =>$priority_types,
            'relationship_types' =>$relationship_types
        ]);
    }

    function my_condition(Request $request)
    {

        $acc_count = Account_condition::where('account', $request['account'])
            ->orderBy('condition', 'asc')
            ->get();

        return response()->json($acc_count,200);

    }

    function add_condition(Request $request)
    {
        $newCondition = new Account_condition();
        $newCondition->condition = $request['condition'];
        $newCondition->account = $request['account'];

        if(!$newCondition->save())
        {
            return response()->json(500);
        }

        return response()->json(200);
    }

    function add_contact(Request $request)
    {
        $emergency_contact = new Emergency_contact();

        $emergency_contact->account = $request['account'];
        $emergency_contact->name = $request['name'];
        $emergency_contact->phone = $request['phone'];
        $emergency_contact->relationship = $request['relationship'];
        $emergency_contact->priority = $request['priority'];

        if(!$emergency_contact->save())
        {
            return response()->json(500);
        }

        return response()->json(200);
    }

    function my_contact(Request $request)
    {

        $my_contact = Emergency_contact::where('account', $request['account'])
            ->orderBy('name', 'asc')
            ->get();

        return response()->json( $my_contact,200);

    }

    //Register
    //Servicios
    function getSignup($role)
    {

        return view('signup', [
            'role' => $role
        ]);
    }


}
