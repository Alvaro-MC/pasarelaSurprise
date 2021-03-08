<?php

require_once 'Conexion.php';
require 'LoginModel.php';

class UserModel{
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $contrasena;

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }

    /**
     * Funcion : ValidCorreo
     * Devuelve si el correo existe en la BD
     * 
     * Función encargada de buscar si el correo que le envian existe
     * o no en la BD y retorna un valor booleano
     * 
     * TRUE -> Existe
     * FALSE -> No existe
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

    function getUser($correo){
        $query = "SELECT * FROM usuario WHERE correo = :correo";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'correo' => $correo
        ]);
        $user = $prepared->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    function changePassword($id_usuario, $newpass){
        $query = null;
        $resultAdd = false;

        $password = password_hash($newpass, PASSWORD_DEFAULT);

        $query = "update usuario set contrasena=:contrasena, llave='', iv_token='', token='' where id_usuario=:id_usuario";
        $resultAdd = $this->pdo->prepare($query);
        $resultAdd->execute([
            'contrasena' => $password,
            'id_usuario' => $id_usuario
        ]);

        if ($resultAdd) {
            return 1;
        }else{
            return 409;
        }
    }
}
