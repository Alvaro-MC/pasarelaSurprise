<?php

require 'PanelController.php';
require '../../baseClass/ValidateDate.php';

$panel = new PanelController;
$date = new ValidateDate;

if(!empty($_POST)){
    
    switch($_POST['request']){
        case '0':
            if(!empty($_POST['numberPanel'])){
                $stock = $panel->consultarStock($_POST['numberPanel']);
                echo ($stock!=-1)?$stock:409;
            }else{
                echo 406;
            }
            break;
        /**
         * Case 1: Retorna si hay stock en un panel X en una fecha especifica Y
         * 
         * @return Int
         */
        case '1':
            if(!empty($_POST['fecha']) && !empty($_POST['panel'])){
                $responseDate = $date->validarFecha($_POST['fecha']);
                if($responseDate == 1){
                    $responseValidate = $panel->validarStockDate($_POST['fecha'], $_POST['panel']);
                    echo $responseValidate;
                }else{
                    echo 409;
                }
            }else{
                echo 406;
            }
            break;
    }

}else{
    echo 400;
}

/**
 * MANEJO DE CODIGOS DE PETICIONES
 * 
 * 0 -> Petición Index (Revisa Stock de paneles)
 * 
 */

 /**
 * MANEJO DE CODIGOS DE ERORRES
 * 
 * 400 -> La peticion no pudo ser procesada (No existen parametros POST)
 * 406 -> Petición no aceptada (No existe dato a procesar)
 * 409 -> Conflicto con la peticion (Posiblemente el dato es erróneo)
 * 
 */