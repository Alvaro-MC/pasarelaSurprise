<?php

require_once 'CriptoString.php';
require_once '../../app/model/UserModel.php';

if (!isset($_GET['em']) || !isset($_GET['token'])) {
    header('Location: ../index.php');
}

class RecoveryValidate{
    private $user;
    private $userConsult;
    private $correoDecrypt;
    private $tokenDec;
    private $estadoValidate = 0;
    private $decryptCorreo = array(
        "clave_correo" => 'correo9para8cifrar7envio6por5la4url3',
        "iv_correo" => 'e71865c3f21caf4a'
    );
    private $tokenDecrypt = array(
        "llave" => '',
        "iv_token" => ''
    );

    /**
     * Funcion constructora
     * 
     * Esta funcion nos sirve para inicializar la validación del correo y setearla
     * en las variables de la instancia para luego poder solicitar a otra funcion
     * que se encargue de validar el acceso.
     * El retorno de esta funcion es un valor booleano que nos indicará
     * 
     * TRUE -> Se concede el acceso a la página
     * FALSE -> Acceso Prohibido. Redireccionamos el acceso al Index.
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function __construct(){
        $decrypt = new CriptoString;
        $this->userConsult = new UserModel;
        $this->correoDecrypt = $decrypt->decryptStringUrl($_GET['em'], $this->decryptCorreo['clave_correo'], $this->decryptCorreo['iv_correo']);

        if($this->userConsult->validCorreo($this->correoDecrypt)){
            $this->estadoValidate = $this->gestionarAcceso($this->userConsult, $decrypt, $this->correoDecrypt);
        }else{
            $this->estadoValidate = 0;
        }
    }

    /**
     * Funcion GestionarAcceso
     * 
     * Esta función se encarga de revisar y hacer las validaciones correspondientes
     * al token enviado por la URL con respecto al usuario que fue seteado en la funcion
     * constructora. El retorno es un valor Boleano.
     * 
     * TRUE -> Token válido
     * FALSE -> Token inválido o diferente
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function gestionarAcceso($userConsult, $decrypt, $correoDecrypt){
        $this->user = $userConsult->getUser($correoDecrypt);

        if(!(empty($this->user['llave'])) && !(empty($this->user['token'])) && !(empty($this->user['iv_token']))){
            $this->tokenDecrypt['llave'] = $this->user['llave'];
            $this->tokenDecrypt['iv_token'] = $this->user['iv_token'];
            $this->tokenDec = $decrypt->decryptStringUrl($_GET['token'], $this->tokenDecrypt['llave'], $this->tokenDecrypt['iv_token']);
            if (!($this->tokenDec == $this->user['token'])) {
                $this->estadoValidate = 0;
                return 0;
            }else{
                $this->estadoValidate = 1;
                return 1;
            }
        }else{
            return 0;
        }
    }

    /**
     * Funcion getEstadoValidate
     * 
     * Returna si el estado del token es válido o inválido
     * @return Boolean
     */
    function getEstadoValidate(){
        return $this->estadoValidate;
    }

    /**
     * Funcion getUser
     * 
     * Retorna un array con los datos completos del usuario que corresponde al
     * que fue seteado en la funcion "GestionarAcceso"
     * 
     * NOTA: La funcion solo puede ser usada si se encuentra en la página
     * de recuperación de contraseña, debido a que para setear estos campos antes
     * de usa la función, se debe recibir un token en la URL.
     * @return Array
     */
    function getUser(){
        return $this->user;
    }

    function getIdUserEncrypt(){
        $encrypt = new CriptoString;
        return $encrypt->encryptStringUrl($this->user['id_usuario'],'id9cifrado8para7mostrarse6en5el4script3del2cliente','e71865c3f21caf4a');
    }
}