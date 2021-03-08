<?php

require '../../baseClass/LoginValidate.php';
require '../../model/LoginModel.php';

class LoginController{
    private $login;

    function __construct(){
        $this->login = new LoginModel;
    }

    /**
     * Devuelve el estado de Login
     * 
     * Esta función se encarga de consultarle a la BD si el usuario y contraseña
     * enviados son validos para autenticar al usuario
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function startLogin($correo, $pass){
        $valid = new LoginValidate;
        $correoLimpio = $valid->logValidate($correo);
        $estadoLogin = $this->login->startLogin($correo, $pass);
        return $estadoLogin;
    }


}