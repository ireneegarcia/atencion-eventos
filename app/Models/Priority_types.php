<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority_types extends Model
{

    protected $table = 'priority_types';
    public $primaryKey = 'level';
    public $timestamps = false;

}