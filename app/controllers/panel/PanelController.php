<?php

require '../../model/PanelModel.php';

class PanelController{
    private $panelModel;

    function __construct(){
        $this->panelModel = new PanelModel;
    }

    /**
     * Devuelve el Stock de un panel en especifico
     * 
     * Este función es la encargada de enviarle al modelo la peticion
     * para consultar el stock de un panel y retorna a la consulta Ajax
     * el valor que el modelo le proporcione
     * 
     * @return Int
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function consultarStock($panel){
        $stock = $this->panelModel->getStock($panel);
        return $stock;
    }
    /**
     * Funcion ValidarStockDate
     * 
     * Esta funcion se encarga de validar si en un panel hay stock en cierta
     * fecha en especifico
     * 
     * @return Int
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function validarStockDate($fecha, $panel){
        $stock = $this->panelModel->getStockPanel($fecha, $panel);
        return $stock;
    }
}