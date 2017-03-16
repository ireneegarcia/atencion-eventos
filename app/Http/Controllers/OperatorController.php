<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
}
