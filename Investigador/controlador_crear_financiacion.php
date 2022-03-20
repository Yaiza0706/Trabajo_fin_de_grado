<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: menu_investigador.php');

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

   

      //Se comprueba que se hayan introducido datos.
      if ($presupuesto_total == '' or $id_proyecto == '' or $descripcion == '' )
      {
          $error = 'no_datos';
          header("Location: vista_crear_financiacion.php?error=".$error);
      }
  
      else
      {   
          //Se realiza la conexion con la base de datos.
          $base_datos = new bbdd();
          $base_datos->conectar();

          $sql = "INSERT INTO financiacion(descripcion, presupuesto_total, id_proyecto) 
          VALUES('$descripcion', '$presupuesto_total', '$id_proyecto')";

          $result = $base_datos->consulta($sql);

      }
}

?>


