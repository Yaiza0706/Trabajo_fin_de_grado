<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../base_datos.php');
require_once('../verificacion.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: ../index.php');

    //Se guardan los datos introducidos en variables locales

    $tipo_usuario = 1;     //Se añadirán a todos los nuevos usuarios como investigadores.
    $estado_usuario = 1;   //Se añadirán a todos los nuevos usuarios como no activos.
    $proyecto = 1  ;       //Se añadirán a todos los nuevos usuarios en un proyecto vacío.

    if (isset( $_POST['nombre'] ))
    {
        $nombre = $_POST['nombre'];
    }

    if (isset( $_POST['apellido'] ))
    {
        $apellido = $_POST['apellido'];
    }

    if (isset( $_POST['titulacion'] ))
    {
        $titulacion = $_POST['titulacion'];
    }

    if (isset( $_POST['web'] ))
    {
        $web = $_POST['web'];
    }

    if (isset( $_POST['email'] ))
    {
        $email = $_POST['email'];
    }

    if (isset( $_POST['contraseña'] ))
    {
        $contraseña = $_POST['contraseña'];
    }

      //Se comprueba que se hayan introducido datos.
      if ($nombre == '' or $apellido == '' or $titulacion == '' or $web == '' or $email == '' or $contraseña == '' )
      {
          $error = 'no_datos';
          header("Location: vista_registro.php?error=".$error);
      }

      $longitud_nombre = 10;
      if (!verificar_longitud($nombre, $longitud_nombre))
      {
        $error = 'longitud_incorrecta';
        header("Location: vista_registro.php?error=".$error);
      }
    
      else
      {
        $contraseña_hash = sha1($contraseña);
        //$contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

        $sql = "INSERT INTO equipo(nombre, apellidos, titulacion, web, id_tipo_usuario, mail, contraseña, id_estado_usuario, id_proyecto) 
        VALUES('$nombre', '$apellido', '$titulacion', '$web', '$tipo_usuario', '$email', '$contraseña_hash', '$estado_usuario', '$proyecto')";

        $base_datos = new bbdd();
        $base_datos->conectar();
        $test = $base_datos->consulta($sql);

        $to      = 'y.rubio@edu.uah.es';
        $subject = 'Actualización Base Datos';
        $message = 'Se ha añadido un usuario nuevo a la base de datos. $nombre';
        $headers = 'From: yaizarubioch@gmail.com'       . "\r\n" .
                    'Reply-To: webmaster@example.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
      }
    


}

?>
