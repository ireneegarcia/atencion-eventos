<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Providers\User\Illuminate;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'account';

    public $primaryKey= 'id';
    public $timestamps = false;

    public function isFirstLogin(){
        return $this->last_login=="0001-01-01 00:01:01";
    }

    public static function getInitialDateValue(){
        return "0001-01-01 00:01:01";
    }

    public static function byEmail($email){
        return Account::where('email', $email)->first();
    }

    public static function byCI($ci){
        return Account::where('ci', $ci)->first();
    }


    public function __construct($userdata = null, $moredata = null) {
        if (!$userdata) return;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName(){
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(){
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken(){
        return $this->token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value){
        $this->token=$value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName(){
        return "token";
    }


}
