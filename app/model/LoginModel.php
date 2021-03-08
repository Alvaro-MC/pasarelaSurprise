<?php

require_once 'Conexion.php';

class LoginModel{
    private $pdo;

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }
    /**
     * Función StarLogin
     * 
     * Devuelve estado del Login:
     * Este función es la encargada de retornar un valor booleano que indica si se logro
     * la autenticacion del login con los datos enviados
     * 
     * True -> Logueado
     * False -> Error en la consulta (Posiblemente no se encontradon los datos en la consulta)
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function startLogin($correo, $pass){


        $query = "SELECT * FROM usuario WHERE correo = :correo";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'correo' => $correo
        ]);
        $user = $prepared->fetch(PDO::FETCH_ASSOC);
    
        if (isset($user['correo']) && $user['estado'] == 'activo') {
    
            if ($user['correo'] == $_POST['correo'] && password_verify($_POST['pass'], $user['contrasena'])) {
                session_start();
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['usuario'] = $user['correo'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['correo'] = $user['correo'];
                
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
}