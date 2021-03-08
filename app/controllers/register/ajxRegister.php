<?php

require 'RegisterController.php';

$auth = new RegisterController;

if(!empty($_POST)){
    switch($_POST['request']){
        case '202':
            if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && !empty($_POST['pass'])){
                $register = $auth->setRegister($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['telefono'],$_POST['pass']);
                echo $register;
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
 * 202 -> Petición Index (Solicita Autenticación para registro)
 * 
 */

 /**
 * MANEJO DE CODIGOS DE ERORRES
 * 
 * 400 -> La peticion no pudo ser procesada (No existen parametros POST)
 * 406 -> Petición no aceptada (No existe dato a procesar)
 * 409 -> Conflicto con la peticion (Posiblemente el dato es erróneo)
 * 410 -> Correo Repetido
 * 
 */