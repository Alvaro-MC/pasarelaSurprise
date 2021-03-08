<?php

class CriptoString{
    private $method = 'aes128';
    /**
     * Funcion EncryptStringURL
     * 
     * Esta funcion se encarga de encriptar cadenas que desean ser enviadas directamente
     * por la URL.
     * 
     * @return String
     * @author Alvaro Chico <alvaro.chico@gruomcperu.com>
     */
    function encryptStringUrl($string, $pass, $iv){
        $cifradoString = openssl_encrypt($string, $this->method, $pass, false, $iv);
        $codigoStringCifrado = base64_encode($cifradoString);
        $codeStringCifrado = urlencode($codigoStringCifrado);
        return $codeStringCifrado;
    }
    function decryptStringUrl($string, $pass, $iv){
        $decodeString = urldecode($string);
        $decodString = base64_decode($decodeString);
        $stringDescifrado = openssl_decrypt($decodString, $this->method, $pass, false, $iv);
        return $stringDescifrado;
    }
    function encryptStringPass($string, $method, $pass, $iv){}
    function decryptStringPass(){}

}