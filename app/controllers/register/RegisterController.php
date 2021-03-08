<?php

require '../../baseClass/LoginValidate.php';
require '../../model/RegisterModel.php';

class RegisterController{
    private $register;

    function __construct(){
        $this->register = new RegisterModel;
    }

    /**
     * Devuelve el estado del registro
     * 
     * Esta función se encarga de realizar la peticion al modelo
     * encargardo de generar el registro de un usuario
     * El retorno de esta funcion es un booleano que indica si el registro
     * fue exitoso o no fue exitoso
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function setRegister($nombre, $apellido, $correo, $telefono, $pass){
        $valid = new LoginValidate;
        $nombreLimpio = $valid->logValidate($nombre);
        $apellidoLimpio = $valid->logValidate($apellido);
        $correoLimpio = $valid->logValidate($correo);
        $telefonoLimpio = $valid->logValidate($telefono);
        $resultRegister = $this->register->setRegister($nombreLimpio, $apellidoLimpio, $correoLimpio, $telefonoLimpio, $pass);
        return $resultRegister;
    }


}