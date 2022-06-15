<?php
require_once('../base_datos.php');

$no_hay_equipo = false;
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    session_start();
    //Se muestran todas las personas existentes
    $sql = "SELECT * FROM equipo";
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_hay_equipo = true;
    }
}

?>