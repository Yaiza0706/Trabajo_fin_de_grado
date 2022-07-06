<?php

require_once('../base_datos.php');

$no_hay_grupos = false;
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se muestran todos los grupos existentes
    $sql = "SELECT * FROM grupos";
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_hay_grupos = true;
    }
}
 ?>