<?php
require_once('../base_datos.php');
$id_resultado = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
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

    //Se actualizan los nuevos valores introducidos
    $sql = "UPDATE resultados
    SET titulo = '$titulo', año_publicacion = '$año_publicacion', id_tipo_publicacion = '$id_tipo_publicacion',revista = '$revista', autores = '$autores'
    WHERE id = '$id_resultado'";
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


