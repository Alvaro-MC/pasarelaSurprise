<?php @session_start();

require 'LogoutController.php';

$logout = new LogoutController;


if(!empty($_POST)){
    
    switch($_POST['request']){
        case '0':
            $response = $logout->cerrarCarrito($_SESSION['id_usuario'], $_SESSION['carrito']);
            return $response;
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