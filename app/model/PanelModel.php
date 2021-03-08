<?php

require_once 'Conexion.php';

class PanelModel{

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }

    /**
     * Devuelve stock en fecha especifica
     * 
     * Esta funcion se encarga de retrnar el stock de un panel
     * en una fecha en especifico, fecha que debe ser futura a la actual
     * 
     * @return Int
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function getStockPanel($fecha, $panel){
        $queryResult = $this->pdo->prepare("select count(*) as total from video where fecha_publicacion=:fecha and id_panel=:panel");
        $queryResult->execute([
            'fecha' => $fecha,
            'panel' => $panel
        ]);
        $pan = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        return $pan['total'];
    }
}