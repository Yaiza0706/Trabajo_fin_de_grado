<?php
require_once('../base_datos.php');
//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['titulo'] ))
    {
        $titulo = $_POST['titulo'];
    }

    if(isset($_FILES['logo_financiacion']['name']))
    {
        $filename = pathinfo($_FILES['logo_financiacion']['name']);
        $image_path = 'logo_financiacion'.'_'.microtime(true).'.'.$filename['extension'];
        $logo_financiacion_ruta = "../imagenes_subidas/".$image_path;

        if(!move_uploaded_file($_FILES['logo_financiacion']['tmp_name'],$logo_financiacion_ruta))
        {
            echo json_encode(['result' => 'error']);
        }
    }
      
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO logo (nombre, imagen) 
    VALUES(?, ?)";

    $result = $base_datos->consulta_segura($sql,'ss',array($titulo, $logo_financiacion_ruta));
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