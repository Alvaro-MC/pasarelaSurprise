<?php

class ValidateDate{

    function validarFecha($fecha){
        if (isset($fecha) && strlen($fecha) > 0) {
            $fechaActual = getdate();
            $fecha = explode('-', $fecha);
        
            $valid_date = 0;
        
            if ($fecha[0] >= $fechaActual['year']) {
                if ($fecha[0] == $fechaActual['year']) {
                    if ($fecha[1] >= $fechaActual['mon']) {
                        if ($fecha[1] > $fechaActual['mon']) {
                            $valid_date = 1;
                        } else {
                            if ($fecha[2] >= $fechaActual['mday']) {
                                $valid_date = 1;
                            }
                        }
                    }
                }else{
                    $valid_date = 1;
                }
            }
            
            return $valid_date;
        } else {
            return 0;
        }
    }
}