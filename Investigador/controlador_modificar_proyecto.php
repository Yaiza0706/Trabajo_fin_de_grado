<?php
require_once('../base_datos.php');

$no_hay_proyectos = false;
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se muestran todos los proyectos existentes
    $sql = "SELECT * FROM proyecto";
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_hay_proyectos = true;
    }
}

?>


