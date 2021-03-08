<?php

class LoginValidate{

    private $patrones = array(
        "caracteres" => "/[\"\'\;\=\*\$\%\#\&\|\?\!\\\(\)\/\[\]]/",
        "reservado" => "/(SELECT|DROP|INSERT|UPDATE|DATABASE|WHERE|COUNT|FROM| OR | AND |NULL|TABLE)/i"
    );
    private $sustituciones = array(
        "caracteres" => '',
        "reservado" => ''
        );

    /**
     * Devuelve cadenas de texto limpias para la inserción en BD
     * 
     * Este método se encarga del reemplazo de los caracteres especiales y de las palabras reservadas
     * que pueda afectar a alguna consulta SQL que se desee realizar.
     * 
     * @return String
     * @example Entrada->"SELECT * FROM usuario" - Retorno->usuario
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    public function logValidate($valor){
        $htmlValor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
        $patternValor = preg_replace($this->patrones, $this->sustituciones, $htmlValor);
        return $patternValor;
    }

}

