<?php
require_once('base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales.
    $usuario = $_POST['email'];
    $contraseña = $_POST['contraseña'];

        //Se realiza la conexion con la base de datos.
        $base_datos = new bbdd();
        $base_datos->conectar();

        $sql = "SELECT * FROM equipo WHERE mail = '$usuario'";
        $fila = $base_datos->consulta($sql);
        $hash = $fila[0]['contraseña'];
		$result = password_verify($contraseña, $hash);

        //Se comprueba si los datos leídos son correctos.
        if(!$result)
        {   
            echo json_encode(['result' => 'no_verificado']);       
        }
        else
        {
            session_start();
        	//Si se cumplen los requisitos se accede a los menus.
            $_SESSION['valido'] = true;

            if($fila != -1)
            {
                $nombre = $fila[0]['nombre'];
                $id_tipo_usuario = $fila[0]['id_tipo_usuario'];
                $apellidos =  $fila[0]['apellidos'];
                $id = $fila[0]['id'];

                $_SESSION['nombre'] = $nombre;
                $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
                $_SESSION['apellidos'] = $apellidos;
                $_SESSION['id'] = $id;

            }
            else 
            {
                $_SESSION['nombre'] =  'error';
            }
        	echo json_encode(['result' => 'ok']);
        }
}
?>
