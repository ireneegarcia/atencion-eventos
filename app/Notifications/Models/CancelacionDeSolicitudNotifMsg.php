<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13/12/16
 * Time: 06:19 PM
 */

namespace App\Notifications\Models;


class CancelacionDeSolicitudNotifMsg
{
    public $title;
    public $subTitle;
    public $id_solicitud;
    public $motivo;

    public function getBody()
    {
        return
            [    
                "title" => $this->title,
                "subTitle" => $this->subTitle,
                "id_solicitud" => $this->id_solicitud,
                "motivo" => $this->motivo,
                "tipo_de_notificacion"=>"CancelacionDeSolicitud"
            ];
    }    
}