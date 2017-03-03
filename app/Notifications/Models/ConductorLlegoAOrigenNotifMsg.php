<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13/12/16
 * Time: 06:19 PM
 */

namespace App\Notifications\Models;


class ConductorLlegoAOrigenNotifMsg
{
    public $title;
    public $subTitle;
    public $hora;
    public $ser_id;

    public function getBody()
    {
        return
            [    
                "title" => $this->title,
                "subTitle" => $this->subTitle,
                "hora" => $this->hora,
                "ser_id" => $this->ser_id,
                "tipo_de_notificacion"=>"ConductorLlegoAOrigen"
            ];
    }    
}