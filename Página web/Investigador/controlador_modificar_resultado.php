<?php

require_once('../base_datos.php');

$no_hay_resultados = false;
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se muestran todos los resultados existentes
    $sql = "SELECT * FROM resultados";
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_hay_resultados = true;
    }
}
?> 