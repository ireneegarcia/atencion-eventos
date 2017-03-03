<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 10/12/16
 * Time: 03:10 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaFirebaseToken extends Model
{
    protected $table = 'firebase_token';
    public $primaryKey = 'token';
    public $timestamps = false;
}