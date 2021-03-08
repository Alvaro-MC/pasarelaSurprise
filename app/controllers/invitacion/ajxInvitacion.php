<?php @session_start();

require 'InvitacionController.php';

$inv = new InvitacionController;
if(!empty($_POST)){
    switch($_POST['request']){
        case '1100':
            if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['mensaje'])){
                $urlInv = $inv->gestionarInv($_SESSION['id_usuario'],$_SESSION['cod_video'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['mensaje']);
                echo $urlInv;
            }else{
                echo 406;
            }
            break;
    }

}else{
    echo 400;
}

 /**
 * MANEJO DE CODIGOS DE ERORRES
 * 
 * 400 -> La peticion no pudo ser procesada (No existen parametros POST)
 * 406 -> Petición no aceptada (No existe dato a procesar)
 * 409 -> Conflicto con la peticion (Posiblemente el dato es erróneo)
 * 
 */