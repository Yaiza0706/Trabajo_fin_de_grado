<?php
require_once('../base_datos.php');
$id_grupo = 0;
$no_existe = false;
$imagen_anterior = 0;

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
        $id_grupo = $_POST['id_grupo'];
    }

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
    }else
    {
        $imagen_anterior = 1;
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

    //Se actualizan los nuevos valores introducidos
    if (!$imagen_anterior)
    { 
        $sql = "UPDATE grupos
        SET logo_grupo = '$logo_grupo_ruta', titulo = '$titulo_grupo', descripcion = '$descripcion', web = '$web'
        WHERE id = '$id_grupo'";
    }
    else
    {
        $sql = "UPDATE grupos
        SET titulo = '$titulo_grupo', descripcion = '$descripcion'
        WHERE id = '$id_grupo'";
    }
    $result = $base_datos->consulta($sql);

    if($result != -1)
    {
        echo json_encode(['result' => 'error']);
    }
    else
    {
        echo json_encode(['result' => 'ok']);
    } 
}

?>


