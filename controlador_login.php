<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales.
    $usuario = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    //Se comprueba que se hayan introducido datos.
    if ($usuario == '' or $contraseña == '')
    {
        $error = 'no_datos';
        header("Location: vista_login.php?error=".$error);
    }

    else
    {   
        //Se realiza la conexion con la base de datos.
        $base_datos = new bbdd();
        $base_datos->conectar();

        $result = $base_datos -> verificar_login($usuario, $contraseña);

        //Se comprueba si los datos leídos son correctos.
        if(!$result)
        {   
            $error = 'datos_incorrectos';
            header("Location: vista_login.php?error=".$error);        
        }
        else
        {
        	//Si se cumplen los requisitos se accede a los menus.
            $_SESSION['valido'] = true;
            $_SESSION['usuario'] = $usuario;
        	header('Location: menus.php');
        }
    }
}
?>
