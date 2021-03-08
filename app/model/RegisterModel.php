<?php

require_once 'Conexion.php';
require 'LoginModel.php';

class RegisterModel{
    private $pdo;

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }
    /**
     * Funcion: SetRegister
     * Devuelve estado del Registro
     * 
     * Este función es la encargada de retornar un valor booleano que indica si se logro
     * realizar el registro del usuario
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function setRegister($nombre, $apellido, $correo, $telefono, $pass){
        $resultAdd = false;
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        
        if($this->validCorreo($correo) == false){
           $sql = "insert into usuario(nombre,apellido,correo,telefono,contrasena,fecha_creacion) values (:nombre,:apellido,:correo,:telefono,:pass,now());";
           $query = $this->pdo->prepare($sql);
           $resultAdd = $query->execute([
               'nombre' => $nombre,
               'apellido' => $apellido,
               'correo' => $correo,
               'telefono' => $telefono,
               'pass' => $password
           ]);
           if($resultAdd){
               $auth = new LoginModel;
               $login = $auth->startLogin($correo, $pass);
               return 1;
           }else{
               return 411;
           }
       }else{
           return 410;
       }

    }

    
    /**
     * Funcion : ValidCorreo
     * Devuelve si el correo existe en la BD
     * 
     * Función encargada de buscar si el correo que le envian existe
     * o no en la BD y retorna un valor booleano
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function validCorreo($correo){
        $query = "SELECT * FROM usuario WHERE correo = :correo";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'correo' => $correo
        ]);
        $user = $prepared->fetch(PDO::FETCH_ASSOC);

        return (isset($user['correo']))?true:false;
    }
}
