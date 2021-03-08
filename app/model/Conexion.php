<?php

class Conexion{
    // private $dbHost = '75.102.57.89';
    // private $dbName = 'qhgawllm_bdsurprise';
    // private $dbUser = 'qhgawllm';
    // private $dbPass = 'FD,9#MF&.CtP';
    private $dbHost = 'localhost';
    private $dbName = 'bdsurprise';
    private $dbUser = 'root';
    private $dbPass = '';

    function startConexion(){
        try {
            $pdo = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}