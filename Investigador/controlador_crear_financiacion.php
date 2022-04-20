<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['descripcion'] ))
    {
        $descripcion = $_POST['descripcion'];
    }
    if (isset( $_POST['presupuesto_total'] ))
    {
        $presupuesto_total = $_POST['presupuesto_total'];
    }
    if (isset( $_POST['id_proyecto'] ))
    {
        $id_proyecto = $_POST['id_proyecto'];
    }
      
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO financiacion (descripcion, presupuesto_total, id_proyecto) 
    VALUES('$descripcion', '$presupuesto_total', '$id_proyecto')";

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


