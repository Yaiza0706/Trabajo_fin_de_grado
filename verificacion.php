<?php

class verificacion
{

    public function verificar_longitud($parametro, $longitud)
    { 
        if (strlen($parametro) < $longitud)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>

