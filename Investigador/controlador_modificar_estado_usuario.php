<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
            $sql = "SELECT * FROM equipo";
            $fila = $base_datos->consulta($sql);
            if($fila != -1)
            {
                $nombre = $fila[0]['nombre'];
                $nombre2 = $fila[0]['nombre'];
                $nombre3 = $fila[0]['nombre'];
                $id_tipo_usuario = $fila[0]['id_tipo_usuario'];

                $_SESSION['nombre'] = $nombre;
                $_SESSION['nombre2'] = $nombre2;
                $_SESSION['nombre3'] = $nombre3;
                $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
            }
        	header('Location: menu_investigador.php');
}
?>
