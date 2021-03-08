<?php

require 'RecoveryController.php';

$recov = new RecoveryController;

if(!empty($_POST)){
    
    switch($_POST['request']){
        case '600':
            if(!empty($_POST['correo'])){
                $recovery = $recov->recoverPass($_POST['correo']);
                echo $recovery;
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
 * 600 -> Petición Recovery (Solicita la recuperacion de contraseña)
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