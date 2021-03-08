<?php @session_start();

require '../../model/LogoutModel.php';

class LogoutController{
    private $logoutModel;

    function __construct(){
        $this->logoutModel = new logoutModel;
    }

    function cerrarCarrito($usuario, $carrito){
        if(!empty($carrito)){
            $responseCar = $this->logoutModel->cerrarCarrito($usuario, $carrito);
            $response = $this->cerrarSession();
            return $response;
        }else{
            $response = $this->cerrarSession();
            return $response;
        }
    }

    function cerrarSession(){
        session_destroy();
        return true;
    }
}