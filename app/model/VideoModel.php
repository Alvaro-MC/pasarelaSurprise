<?php

require_once 'Conexion.php';

class VideoModel{
    private $pdo;

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }
    
    function addVideo($fecha,$mensaje,$nro_plantilla,$carrito,$plan,$panel){

            $mensaje = substr($mensaje, 0, 45);
            $fila = $this->filaCountVideo();
            $sql = "insert into video(fecha_publicacion,mensaje,nro_plantilla,fecha_creacion,id_carrito,id_plan,id_panel) values (:fecha_publicacion,:mensaje,:nro_plantilla,now(),:id_carrito,:id_plan,:id_panel)";

            $query = $this->pdo->prepare($sql);
            $resultAdd = $query->execute([
                'fecha_publicacion' => $fecha,
                'mensaje' => $mensaje,
                'nro_plantilla' => $nro_plantilla,
                'id_carrito' => $carrito,
                'id_plan' => $plan,
                'id_panel' => $panel
            ]);
        
            if ($resultAdd) {
                $query = "update carrito set nro_videos=nro_videos+1 where id_carrito = :id_carrito";
                $prepared = $this->pdo->prepare($query);
                $prepared->execute([
                    'id_carrito' => $carrito
                ]);
                $this->actualizarTotal($carrito,$plan);
                return 1;
            }else{
                return 0;
            }

    }
    function removeVideo($video){
        $query = "delete from video where id_video=:video";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'video' => $video
        ]);
        if($prepared){
            return 200;
        }else{
            return 400;
        }
    }

    function actualizarTotal($carrito, $plan){
        //Revisamos cuato cuesta ese plan
        $queryResult = $this->pdo->prepare("select costo from planes where id_plan=:plan");
        $queryResult->execute([
            'plan' => $plan
        ]);
        $pan = $queryResult->fetch(PDO::FETCH_ASSOC);
        //Agregamos el costo al total del carrito
        $query = "update carrito set total=total+:costo where id_carrito = :id_carrito";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'costo' => $pan['costo'],
            'id_carrito' => $carrito
        ]);
    }

    function filaCountVideo(){
        $query = "SELECT count(*) as total FROM video";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([]);
        $fila = $prepared->fetch(PDO::FETCH_ASSOC);
        $fila['total'] += 1;
        return $fila;
    }
}