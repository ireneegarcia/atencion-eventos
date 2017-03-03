<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13/12/16
 * Time: 06:19 PM
 */

namespace App\Notifications\Models;


class SolicitudManualNotifMsg{
    public $title;
    public $subTitle;
    public $coordOrig;
    public $ser_origen;
    public $ser_destino;
    public $nombre;
    public $telef;
    public $id_pasajero;
    public $id_usuario;
    public $id_solicitud;
    public $is_favorito;

    public function getBody()
    {
        return
            [
                "title"=>$this->title,
                "subTitle"=>$this->subTitle,
                "coordOrig"=>$this->coordOrig,
                "ser_origen" => $this->ser_origen,
                "ser_destino" => $this->ser_destino,
                "id_usuario"=>$this->id_usuario,
                "id_pasajero"=>$this->id_pasajero,
                "nombre"=>$this->nombre,
                "telef"=>$this->telef,
                "id_solicitud"=>$this->id_solicitud,
                "is_favorito" => $this->is_favorito,
                "tipo_de_notificacion"=>"SolicitudDeServicioManual"
            ];
    }
}