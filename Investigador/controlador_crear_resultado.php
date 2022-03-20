<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: menu_investigador.php');

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
 

      //Se comprueba que se hayan introducido datos.
      if ($titulo == '' or $año_publicacion == '' or $id_tipo_publicacion == '' or $revista == '' or $autores == '')
      {
          $error = 'no_datos';
          header("Location: vista_crear_resultado.php?error=".$error);
      }
  
      else
      {   
          //Se realiza la conexion con la base de datos.
          $base_datos = new bbdd();
          $base_datos->conectar();

          $sql = "INSERT INTO resultados(titulo, año_publicacion, id_tipo_publicacion, revista, autores) 
          VALUES('$titulo', '$año_publicacion', '$id_tipo_publicacion', '$revista' , '$autores')";

          $result = $base_datos->consulta($sql);

      }
}

?>


