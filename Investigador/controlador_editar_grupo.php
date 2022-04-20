<?php
require_once('../base_datos.php');
$id_grupo = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se obtiene el valor del id del grupo que se va a editar
    $id_grupo = $_GET["id"];
    
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se leen todos los datos del grupo con el id recibido
    $sql = "SELECT * FROM grupos WHERE id = " . $id_grupo;
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_existe = true;
    }else{
        $grupos = $result[0];
    }

}else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales

    if (isset( $_POST['id_grupo'] ))
    {
        $grupo = $_POST['id_grupo'];
    }

    if (isset( $_POST['titulo'] ))
    {
        $titulo_grupo = $_POST['titulo'];
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

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE grupos
    SET logo_grupo = '$logo_grupo', titulo = '$titulo', descripcion = '$descripcion'
    WHERE id = '$id_grupo'";
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


