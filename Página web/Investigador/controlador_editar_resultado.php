<?php

require_once('../base_datos.php');
$id_resultado = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    if(isset($_GET["id"]))
    {
        //Se obtiene el valor del id del resultado que se va a editar
        $id_resultado = $_GET["id"];
        
        //Se realiza la conexion con la base de datos.
        $base_datos = new bbdd();
        $base_datos->conectar();

        //Se leen todos los datos del resultado con el id recibido
        $sql = "SELECT * FROM resultados WHERE id = " . $id_resultado;
        $result = $base_datos->consulta($sql);
        if($result == -1)
        {
            $no_existe = true;
        }else{
            $resultados = $result[0];
        }
    }
}else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales

    if (isset( $_POST['id_resultado'] ))
    {
        $id_resultado = $_POST['id_resultado'];
    }

    if (isset( $_POST['titulo'] ))
    {
        $titulo = $_POST['titulo'];
    }

    if (isset( $_POST['anyo_publicacion'] ))
    {
        $anyo_publicacion = $_POST['anyo_publicacion'];
    }

    if (isset( $_POST['id_tipo_publicacion'] ))
    {
        $id_tipo_publicacion = $_POST['id_tipo_publicacion'];
    }

    if (isset( $_POST['revista'] ))
    {
        $revista = $_POST['revista'];
    }

    if (isset( $_POST['autores'] ))
    {
        $autores = $_POST['autores'];
    }

    if (isset( $_POST['web'] ))
    {
        $web = $_POST['web'];
    }

    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    if ($id_tipo_publicacion == "Artículo")
        $id_tipo_publicacion = 1;

    if ($id_tipo_publicacion == "Letter")
        $id_tipo_publicacion = 2;

    if ($id_tipo_publicacion == "Patente")
        $id_tipo_publicacion = 3;

    if ($id_tipo_publicacion == "Congreso")
        $id_tipo_publicacion = 4;

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE resultados
    SET titulo = ?, anyo_publicacion = ?, id_tipo_publicacion = ?,revista = ?, autores = ?, web = ? 
    WHERE id = ?";
    $result = $base_datos->consulta_segura($sql,'siisssi',array($titulo, $anyo_publicacion, $id_tipo_publicacion, $revista, $autores, $web,$id_resultado));

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