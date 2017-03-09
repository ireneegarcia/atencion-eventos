<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';
    public $primaryKey = 'id';
    public $timestamps = false;


    public static function byId($id){
        return Todo::where('id', $id)->first();
    }
}
