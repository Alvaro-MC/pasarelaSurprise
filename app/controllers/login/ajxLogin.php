<?php

require 'LoginController.php';

$auth = new LoginController;

if(!empty($_POST)){
    
    switch($_POST['request']){
        case '201':
            if(!empty($_POST['correo']) && !empty($_POST['pass'])){
                $login = $auth->startLogin($_POST['correo'],$_POST['pass']);
                echo ($login)?1:409;
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
 * 201 -> Petición Index (Solicita Autenticación para login)
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