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

    if (isset( $_POST['año_publicacion'] ))
    {
        $año_publicacion = $_POST['año_publicacion'];
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
 
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    if ($id_tipo_publicacion == "Artículo")
        $id_tipo_publicacion = 1;

    if ($id_tipo_publicacion == "Letter")
        $id_tipo_publicacion = 2;

    //Se añaden los valores que el usuario ha introducido a la base de datos
    $sql = "INSERT INTO resultados(titulo, año_publicacion, id_tipo_publicacion, revista, autores) 
    VALUES('$titulo', '$año_publicacion', '$id_tipo_publicacion', '$revista' , '$autores')";

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

