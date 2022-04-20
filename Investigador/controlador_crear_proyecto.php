<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['titulo_pagina'] ))
    {
        $titulo_pagina = $_POST['titulo_pagina'];
    }

    if (isset( $_POST['titulo_proyecto'] ))
    {
        $titulo_proyecto = $_POST['titulo_proyecto'];
    }

    if (isset( $_POST['logo'] ))
    {
        $logo = $_POST['logo'];
    }

    if (isset( $_POST['expediente'] ))
    {
        $expediente = $_POST['expediente'];
    }

    if (isset( $_POST['inicio'] ))
    {
        $inicio = $_POST['inicio'];
    }

    if (isset( $_POST['cif'] ))
    {
        $cif = $_POST['cif'];
    }

    if (isset( $_POST['duracion'] ))
    {
        $duracion = $_POST['duracion'];
    }

    if (isset( $_POST['resumen'] ))
    {
        $resumen = $_POST['resumen'];
    }

    if (isset( $_POST['logo_menu'] ))
    {
        $logo_menu = $_POST['logo_menu'];
    }
    
    //
    $logo = "LUEGO CAMBIAR";
    $logo_menu = "LUEGO CAMBIAR";

    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO proyecto(titulo_proyecto, logo_proyecto, titulo, numero_expediente, fecha_inicio, cif, duracion, resumen, logo_menu) 
    VALUES('$titulo_proyecto', '$logo', '$titulo_pagina', '$expediente', '$inicio', '$cif', '$duracion', '$resumen', '$logo_menu')";

    $result = $base_datos->consulta($sql);

    if(!$result)
    {
        echo json_encode(['result' => 'error']);
    }
    else
    {
        echo json_encode(['result' => 'ok']);
    }
}

?>
