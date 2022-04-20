<?php
require_once('../base_datos.php');
$id_proyecto = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se obtiene el valor del id del proyecto que se va a editar
    $id_proyecto = $_GET["id"];
    
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se leen todos los datos del proyecto con el id recibido
    $sql = "SELECT * FROM proyecto WHERE id = " . $id_proyecto;
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_existe = true;
    }else{
        $proyecto = $result[0];
    }

}else if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['id_proyecto'] ))
    {
        $id_proyecto = $_POST['id_proyecto'];
    }

    if (isset( $_POST['titulo_pagina'] ))
    {
        $titulo_pagina = $_POST['titulo_pagina'];
    }

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

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE proyecto
    SET titulo_proyecto = '$titulo_proyecto', logo_proyecto = '$logo', titulo = '$titulo_pagina', numero_expediente = '$expediente', fecha_inicio = '$inicio',
    cif = '$cif', duracion = '$duracion', resumen = '$resumen', logo_menu = '$logo_menu'
    WHERE id = '$id_proyecto'";
    
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


