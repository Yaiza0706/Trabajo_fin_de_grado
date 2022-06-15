<?php
require_once('../base_datos.php');
$id_equipo = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se obtiene el valor del id de la financiación que se va a editar
    $id_equipo = $_GET["id"];
    
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se leen todos los datos de la financiacion con el id recibido
    $sql = "SELECT * FROM equipo WHERE id = " . $id_equipo;
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_existe = true;
    }else{
        $equipo = $result[0];
    }

}else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{

    if (isset( $_POST['id_estado_usuario'] ))
    {
        $estado_usuario = $_POST['id_estado_usuario'];
    }

    if (isset( $_POST['id_equipo'] ))
    {
        $id_equipo = $_POST['id_equipo'];
    }

    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE equipo
    SET id_estado_usuario = '$estado_usuario' WHERE id = '$id_equipo'";
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


