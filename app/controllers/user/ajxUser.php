<?php

require 'UserController.php';

$user = new UserController;

if(!empty($_POST)){
    
    switch($_POST['request']){
        case '1000':
            if(!empty($_POST['usuario']) && !empty($_POST['newpass'])){
                $changeResponse = $user->changePassword($_POST['usuario'], $_POST['newpass']);
                echo ($changeResponse)?1:409;
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