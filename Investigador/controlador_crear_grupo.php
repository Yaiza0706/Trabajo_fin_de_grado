<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: menu_investigador.php');

    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['titulo_grupo'] ))
    {
        $titulo_grupo = $_POST['titulo_grupo'];
    }

    if (isset( $_POST['logo_grupo'] ))
    {
        $logo_grupo = $_POST['logo_grupo'];
    }

    if (isset( $_POST['descripcion'] ))
    {
        $descripcion = $_POST['descripcion'];
    }

   

      //Se comprueba que se hayan introducido datos.
      if ($titulo_grupo == '' or $logo_grupo == '' or $descripcion == '' )
      {
          $error = 'no_datos';
          header("Location: vista_crear_grupo.php?error=".$error);
      }
  
      else
      {   
          //Se realiza la conexion con la base de datos.
          $base_datos = new bbdd();
          $base_datos->conectar();

          $sql = "INSERT INTO grupos(logo_grupo, titulo, descripcion) 
          VALUES('$logo_grupo', '$titulo_grupo', '$descripcion')";

          $result = $base_datos->consulta($sql);

      }
}

?>


