<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13/12/16
 * Time: 06:19 PM
 */

namespace App\Notifications\Models;


class AceptacionDeSolicitudNotifMsg
{
    public $title;
    public $subTitle;
    public $recep_fecha;
    public $recep_conductor;
    public $recep_serid;
    public $usuario_conductor;
    public $telf_conductor;
    public $nombre_conductor;
    public $fecha_ingreso_conductor;


    public function parse($recepcionDeServicio)
    {
        $this->recep_fecha = $recepcionDeServicio->recep_fecha;
        $this->recep_conductor = $recepcionDeServicio->recep_conductor;
        $this->recep_serid = $recepcionDeServicio->recep_serid;
        $this->usuario_conductor = $recepcionDeServicio->usuario_conductor;
        $this->telf_conductor = $recepcionDeServicio->telf_conductor;
        $this->nombre_conductor = $recepcionDeServicio->nombre_conductor;
        $this->fecha_ingreso_conductor = $recepcionDeServicio->fecha_ingreso_conductor ;
    }

    public function getBody()
    {
        return
            [    
                "title" => $this->title,
                "subTitle" => $this->subTitle,
                
                "recep_fecha" => $this->recep_fecha,
                "recep_conductor" => $this->recep_conductor,
                "recep_serid" => $this->recep_serid,
                "usuario_conductor" => $this->usuario_conductor,
                "telf_conductor" => $this->telf_conductor,
                "nombre_conductor" => $this->nombre_conductor,
                "fecha_ingreso_conductor" => $this->fecha_ingreso_conductor,
                "tipo_de_notificacion"=>"AceptacionDeSolicitudDeServicioAutomatica"
            ];
    }    
}