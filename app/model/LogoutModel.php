<?php @session_start();

require_once 'Conexion.php';
require_once 'CarritoModel.php';

class LogoutModel{
    private $pdo;
    private $carrito;

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
        $this->carrito = new CarritoModel;  
    }

    function cerrarCarrito($usuario, $carrito){
        $response = $this->carrito->removeSessionCar($usuario, $carrito);
        return $response;
    }

}