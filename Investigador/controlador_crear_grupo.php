<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['titulo_grupo'] ))
    {
        $titulo_grupo = $_POST['titulo_grupo'];
    }

    if (isset( $_POST['logo_grupo'] ))
    {
        $logo_grupo = $_POST['logo_grupo'];
    }

    if (isset( $_POST['descripcion'] ))
    {
        $descripcion = $_POST['descripcion'];
    }
  
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

     //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO grupos(logo_grupo, titulo, descripcion) 
    VALUES('$logo_grupo', '$titulo_grupo', '$descripcion')";

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


