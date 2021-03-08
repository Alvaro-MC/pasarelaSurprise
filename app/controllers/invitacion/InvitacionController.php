<?php

require __DIR__.'/../../model/InvitacionModel.php';

class InvitacionController{
    private $inv;

    function __construct(){
        $this->inv = new InvitacionModel;
    }

    function validVideo($video){
        return $response = $this->inv->validVideo($video);
    }

    function getDataBasic($video){
        return $response = $this->inv->getDataBasic($video);
    }

    function gestionarInv($usuario, $video, $nombre, $apellido, $telefono, $mensaje){
        return $urlInv = $this->inv->crearURL($usuario,$video, $nombre, $apellido, $telefono, $mensaje);
    }
}