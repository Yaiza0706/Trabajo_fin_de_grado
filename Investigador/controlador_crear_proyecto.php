<?php
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: menu_investigador.php');

    //Se guardan los datos introducidos en variables locales
    if (isset( $_POST['titulo_pagina'] ))
    {
        $titulo_pagina = $_POST['titulo_pagina'];
    }

    if (isset( $_POST['titulo_proyecto'] ))
    {
        $titulo_proyecto = $_POST['titulo_proyecto'];
    }

    if (isset( $_POST['logo'] ))
    {
        $logo = $_POST['logo'];
    }

    if (isset( $_POST['expediente'] ))
    {
        $expediente = $_POST['expediente'];
    }

    if (isset( $_POST['inicio'] ))
    {
        $inicio = $_POST['inicio'];
    }

    if (isset( $_POST['cif'] ))
    {
        $cif = $_POST['cif'];
    }

    if (isset( $_POST['duracion'] ))
    {
        $duracion = $_POST['duracion'];
    }

    if (isset( $_POST['resumen'] ))
    {
        $resumen = $_POST['resumen'];
    }

    if (isset( $_POST['logo_menu'] ))
    {
        $logo_menu = $_POST['logo_menu'];
    }
    

      //Se comprueba que se hayan introducido datos.
      if ($titulo_pagina == '' or $titulo_proyecto == '' or $logo == '' or $expediente == '' or
       $inicio == '' or $cif == '' or $duracion == '' or $resumen == '' or $logo_menu == '')
      {
          $error = 'no_datos';
          header("Location: vista_crear_proyecto.php?error=".$error);
      }
  
      else
      {   
          //Se realiza la conexion con la base de datos.
          $base_datos = new bbdd();
          $base_datos->conectar();

          $sql = "INSERT INTO proyecto(titulo_proyecto, logo_proyecto, titulo, numero_expediente, fecha_inicio, cif, duracion, resumen, logo_menu) 
          VALUES('$titulo_proyecto', '$logo', '$titulo_pagina', '$expediente', '$inicio', '$cif', '$duracion', '$resumen', '$logo_menu')";

          $result = $base_datos->consulta($sql);

      }
}

?>


