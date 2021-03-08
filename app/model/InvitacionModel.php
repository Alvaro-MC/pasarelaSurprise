<?php

require_once 'Conexion.php';
require_once __DIR__.'/../baseClass/CriptoString.php';
require_once __DIR__.'/../baseClass/LoginValidate.php';



class InvitacionModel{
    private $pdo;
    private $lim;
    private $cripto;
    
    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
        $this->cripto = new CriptoString;
        $this->lim = new LoginValidate;
    }

    function validVideo($video){
        $video = $this->cripto->decryptStringUrl($video,'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
        $query = "select * from video where id_video=:video;";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'video' => $video
        ]);
        $valid = $prepared->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($valid['id_video'])){
            return 1;
        }else{
            return 0;
        }
    }

    function getDataBasic($video){
        $video = $this->cripto->decryptStringUrl($video,'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
        $query = "select v.fecha_publicacion as fecha, p.ubicacion as ubicacion from video v join panel p on v.id_panel=p.id_panel where v.id_video=:video;";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'video' => $video
            ]);
            $valid = $prepared->fetch(PDO::FETCH_ASSOC);
            
            return array('fecha' => $valid['fecha'], 'ubicacion' => $valid['ubicacion']);
        }
        
        function crearURL($usuario, $video, $nombre, $apellido, $telefono, $mensaje){
            //Limpiamos y preparamos las variables para poder insertarlas en la BD
            $video = $this->cripto->decryptStringUrl($video,'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
            $nombre = $this->lim->logValidate($nombre);
            $apellido = $this->lim->logValidate($apellido);
            $mensaje = $this->lim->logValidate($mensaje);

            //Solicitamos la inserción de la invitacion en la BD
            $this->guardarInvitacion($usuario, $video, $nombre, $apellido, $telefono, $mensaje);
            //Consultamos el ID ultimo ingresado que corresponde al creado recientemente
            $id_invitacion = $this->consultarID($usuario, $video);
            //Preparamos la URL con el ID que obtuvimos
            $newURL = $this->prepararURL($id_invitacion);
            $this->updateURL($newURL, $id_invitacion);
            return $newURL;
        }

        function guardarInvitacion($usuario, $video, $nombre, $apellido, $telefono, $mensaje){
            //Inserción de datos a la tabla invitacion
            $url = 'surprise.php';
            $sql = "insert into invitacion(nombre,apellido,telefono,mensaje,url,fecha_creacion,id_usuario,id_video) values (:nombre,:apellido,:telefono,:mensaje,:url,now(),:id_usuario,:id_video);";
            $query = $this->pdo->prepare($sql);
            $resultAdd = $query->execute([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'mensaje' => $mensaje,
                'url' => $url,
                'id_usuario' => $usuario,
                'id_video' => $video
            ]);
        }
        function consultarID($usuario, $video){
            //Consulta para saber el id de la invitacion para asignarla a la url
            $query = "select max(id_invitacion) as id_invitacion from invitacion where id_usuario=:id_usuario and id_video=:id_video";
            $prepared = $this->pdo->prepare($query);
            $prepared->execute([
                'id_usuario' => $usuario,
                'id_video' => $video
            ]);
            $invitacion = $prepared->fetch(PDO::FETCH_ASSOC);
            return $invitacion['id_invitacion'];
        }
        function prepararURL($id_invitacion){
            $cod = base64_encode($id_invitacion);
            $code = urlencode($cod);
            
            return $url = "http://localhost/surprise/public/surprise.php?i={$code}";
        }
        function updateURL($url, $id_invitacion){
            $query = "update invitacion i set url = :url where i.id_invitacion = :id_invitacion;";
            $prepared = $this->pdo->prepare($query);
            $prepared->execute([
                'url' => $url,
                'id_invitacion' => $id_invitacion
            ]);
        }
}
