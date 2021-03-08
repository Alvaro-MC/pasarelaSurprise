<?php

require '../../model/RecoveryModel.php';
require '../../baseClass/LoginValidate.php';

class RecoveryController{
    private $authRecovery;
    private $validate;

    function __construct(){
        $this->authRecovery = new RecoveryModel;
    }

    /**
     * Funcion RecoverPass
     * 
     * Esta función se encarga de hacer la peticion al modelo para solicitar el
     * cambio de contraseña.
     * Se le envia el dato "correo" despues de pasar por la limpieza de la variable
     * Retorna un valor boleano correspondiente a si se logro o no mandar el correo
     * 
     * True -> Enviado
     * False -> No enviado
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function recoverPass($correo){
        $this->validate = new LoginValidate;
        $email = $this->validate->logValidate($correo);
        $response = $this->authRecovery->requestRecovery($email);
        return $response;
    }
}