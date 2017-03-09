<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;


class OperatorController extends Controller
{
    //Controladores para los to do list

    public function todoList()
    {

        $todos = Todo::where('account',  1)
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

        return response()->json(200);
    }

    public function doneTodo(Request $request)
    {
        $statusTodo = Todo::byId($request->id);

        $statusTodo->status = $request['status'];
        $statusTodo->account =1;

        if(!$statusTodo->save())
        {
            return response()->json(500);
        }

        return response()->json(200);
    }


}
