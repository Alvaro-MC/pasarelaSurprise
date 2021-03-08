<?php @session_start();

require '../../baseClass/LoginValidate.php';
require '../../model/CarritoModel.php';
require_once '../../baseClass/CriptoString.php';

class CarritoController{
    private $car;

    function __construct(){
        $this->car = new CarritoModel;
    }

    /**
     * Devuelve accion de agregar al carrito
     * 
     * Esta función se encarga de devolver un arreglo
     * 
     * @return Array
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */

    function addProduct($id_plan,$id_usuario,$codeCarrito,$panel,$plantilla,$mensaje,$fecha){
        $valid = new LoginValidate;
        $newMensaje = $valid->logValidate($mensaje);
        $responseAdd = $this->car->addProduct($id_plan,$id_usuario,$codeCarrito,$panel,$plantilla,$newMensaje,$fecha);
        return $responseAdd;
    }

    function getProducts($usuario, $carrito){
        $list = $this->car->getListProducts($usuario, $carrito);
        return $list;
    }

    function removeVideo($video, $carrito, $usuario){
        $request = $this->car->removeVideo($video, $carrito, $usuario);
        return $request;
    }
    
    function sendInv($video){
        $cripto = new CriptoString;
        $id_video = $cripto->decryptStringUrl($video,'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
        return $id_video;
    }
}