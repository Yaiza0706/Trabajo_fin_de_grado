<?php
require_once('../base_datos.php');
$id_financiacion = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se obtiene el valor del id de la financiación que se va a editar
    $id_financiacion = $_GET["id"];
    
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se leen todos los datos de la financiacion con el id recibido
    $sql = "SELECT * FROM financiacion WHERE id = " . $id_financiacion;
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_existe = true;
    }else{
        $financiacion = $result[0];
    }

}else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{

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

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE financiacion
    SET descripcion = '$descripcion', presupuesto_total = '$presupuesto_total', id_proyecto = '$id_proyecto'
    WHERE id = '$id_financiacion'";
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


