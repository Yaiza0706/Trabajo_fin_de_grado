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

    if(isset($_FILES['logo_grupo']['name']))
    {
        $filename = pathinfo($_FILES['logo_grupo']['name']);
        $image_path = 'logo_grupo'.'_'.microtime(true).'.'.$filename['extension'];
        $logo_grupo_ruta = "../imagenes_subidas/".$image_path;

        if(!move_uploaded_file($_FILES['logo_grupo']['tmp_name'],$logo_grupo_ruta))
        {
            echo json_encode(['result' => 'error']);
        }
    }

    if (isset( $_POST['descripcion'] ))
    {
        $descripcion = $_POST['descripcion'];
    }

    if (isset( $_POST['web'] ))
    {
        $web = $_POST['web'];
    }
  
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

     //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO grupos(logo_grupo, titulo, descripcion, web) 
    VALUES(?, ?, ? , ?)";

    $result = $base_datos->consulta_segura($sql,'ssss', array($logo_grupo_ruta, $titulo_grupo, $descripcion , $web));
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