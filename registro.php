<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Si se cumplen los requisitos se vuelve al inicio de sesión
    header('Location: vista_login.php');

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
    

    $sql = "INSERT INTO equipo(nombre, apellidos, titulacion, web, id_tipo_usuario, mail, contraseña, id_estado_usuario, id_proyecto) 
        VALUES('$nombre', '$apellido', '$titulacion', '$web', '$tipo_usuario', '$email', '$contraseña', '$estado_usuario', '$proyecto')";

    $base_datos = new bbdd();
    $base_datos->conectar();

    $test = $base_datos->consulta($sql);

}

?>
