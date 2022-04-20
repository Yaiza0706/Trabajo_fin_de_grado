<?php
require_once('../base_datos.php');

$no_hay_financiacion = false;
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se muestran todas las financiaciones existentes
    $sql = "SELECT * FROM financiacion";
    $result = $base_datos->consulta($sql);
    if(!$result)
    {
        $no_hay_financiacion = true;
    }
}

?>
