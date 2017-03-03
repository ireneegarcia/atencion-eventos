<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 13/12/16
 * Time: 06:19 PM
 */

namespace App\Notifications\Models;


class SolicitudAutoNotifMsg{
    public $title;
    public $subTitle;
    public $coordOrig;
    public $coordDest;
    public $nombre;
    public $telef;
    public $kms;
    public $precio;
    public $id_pasajero;
    public $id_usuario;
    public $id_solicitud;
    public $is_favorito;

    /**
     * @return mixed
     */
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    /**
     * @param mixed $id_solicitud
     */
    public function setIdSolicitud($id_solicitud)
    {
        $this->id_solicitud = $id_solicitud;
    }

    public function getBody()
    {
        return
            [
                "id_solicitud"=>$this->id_solicitud,
                "title"=>$this->title,
                "subTitle"=>$this->subTitle,
                "coordOrig"=>$this->coordOrig,
                "coordDest"=>$this->coordDest,
                "id_usuario"=>$this->id_usuario,
                "id_pasajero"=>$this->id_pasajero,
                "nombre"=>$this->nombre,
                "telef"=>$this->telef,
                "is_favorito" => $this->is_favorito,
                "kms" => $this->kms,
                "precio" => $this->precio,
                "tipo_de_notificacion"=>"SolicitudDeServicioAutomatica"
            ];
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCoordOrig()
    {
        return $this->coordOrig;
    }

    /**
     * @param mixed $coordOrig
     */
    public function setCoordOrig($coordOrig)
    {
        $this->coordOrig = $coordOrig;
    }

    /**
     * @return mixed
     */
    public function getCoordDest()
    {
        return $this->coordDest;
    }

    /**
     * @param mixed $coordDest
     */
    public function setCoordDest($coordDest)
    {
        $this->coordDest = $coordDest;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTelef()
    {
        return $this->telef;
    }

    /**
     * @param mixed $telef
     */
    public function setTelef($telef)
    {
        $this->telef = $telef;
    }

    /**
     * @return mixed
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * @param mixed $subTitle
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return mixed
     */
    public function getIdPasajero()
    {
        return $this->id_pasajero;
    }

    /**
     * @param mixed $id_pasajero
     */
    public function setIdPasajero($id_pasajero)
    {
        $this->id_pasajero = $id_pasajero;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
}