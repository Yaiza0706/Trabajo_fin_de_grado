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
    $hash_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    //Se comprueba que se hayan introducido datos.
    if ($usuario == '' or $contraseña == '')
    {
        $error = 'no_datos';
        header("Location: index.php?error=".$error);
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
            header("Location: index.php?error=".$error);        
        }
        else
        {
        	//Si se cumplen los requisitos se accede a los menus.
            $_SESSION['valido'] = true;
  
            $sql = "SELECT * FROM equipo WHERE mail = '$usuario'";
            $fila = $base_datos->consulta($sql);

            if($fila != -1)
            {
                $nombre = $fila[0]['nombre'];
                $id_tipo_usuario = $fila[0]['id_tipo_usuario'];

                $_SESSION['nombre'] = $nombre;
                $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
            }
            else 
            {
                
                $_SESSION['nombre'] =  'error';
            }
        	header('Location: ../Investigador/menu_investigador.php');
        }
    }
}
?>
