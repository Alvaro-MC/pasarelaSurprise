<?php @session_start();

require_once 'CarritoController.php';
require_once '../../baseClass/TokenCreate.php';

$car = new Carritocontroller;
$codigo = new TokenCreate;

if(!empty($_POST)){
    
    switch($_POST['request']){
        case '1000':
            /**
             * REQUEST '1000'
             * 
             * Esta petición se encarga de redireccionar a controllador los parametros
             * del video que se deseea agregar a un carrito
             * El retorno de esta peticion es un arreglo en formato JSON que presenta
             * los siguientes parametros.
             * 
             * Request: Codigo de estado de la petición
             * Response: Valor boleano de satisfaccion de registro de video
             * ID_video: Código actual del registro del video
             * 
             * @return Array
             * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
             */
            if(!empty($_POST['panel']) && !empty($_POST['plantilla']) && !empty($_POST['mensaje']) && !empty($_POST['fecha'])){
                if(empty($_SESSION['carrito'])){
                    //Creamos codigo de carrito
                    $_SESSION['carrito'] = $codigo->getToken16();
                    $responseAdd = $car->addProduct(1,$_SESSION['id_usuario'],$_SESSION['carrito'],$_POST['panel'],$_POST['plantilla'],$_POST['mensaje'],$_POST['fecha']);
                }else{
                    $responseAdd = $car->addProduct(1,$_SESSION['id_usuario'],$_SESSION['carrito'],$_POST['panel'],$_POST['plantilla'],$_POST['mensaje'],$_POST['fecha']);
                }
                echo $responseAdd;
            }else{
                echo 406;
            } 
            break;
        case 1005://Mostrar Carrito
            if(isset($_SESSION['carrito'])){
                $products = $car->getProducts($_SESSION['id_usuario'],$_SESSION['carrito']);
                echo json_encode($products);
            }else{
                echo json_encode(array('response' => '0','products' => ''));
            }
            break;
        case 1007://Borrar elemento de carrito
            if(!empty($_POST['video'])){
                if(!empty($_SESSION['carrito'])){
                    $responseRemove = $car->removeVideo($_POST['video'],$_SESSION['carrito'],$_SESSION['id_usuario']);
                    echo $responseRemove;
                }else{
                    echo 406;
                }
            }
            break;
        case 1008://Enviar invitación
            if(!empty($_POST['video'])){
                $responseInv = $car->sendInv($_POST['video']);
                $_SESSION['sendVideo'] = $responseInv;
                echo true;
            }
            break;
        case 1010://Pagar el carrito con codigo : *******
            echo $_SESSION['carrito'];
            break;
    }

}else{
    echo 400;
}

/**
 * CODIGOS DE RESPUESTA EXITOSOS
 * 
 * 200 -> Exito en la operacion
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