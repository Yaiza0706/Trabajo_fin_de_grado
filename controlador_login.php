<?php
require_once('base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    session_start();
    //Se guardan los datos introducidos en variables locales.
    $usuario = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $captcha = $_POST['captcha'];
    if($captcha != $_SESSION['captcha_text'])
    {
        echo json_encode(['result' => 'no_captcha']);
    }
    else
    {
        //Se realiza la conexion con la base de datos.
        $base_datos = new bbdd();
        $base_datos->conectar();

        //Se leen los datos almacenados del usuario que ha inicado sesión
        $sql = "SELECT * FROM equipo WHERE mail = ?";
        $fila = $base_datos->consulta_segura($sql, 's', array($usuario) );
        if( $fila == -1)
        {   
            echo json_encode(['result' => 'no_verificado']);
        }
        else
        {
            $hash = $fila[0]['contraseña'];
            $intentos = $fila[0]['intentos'];
            $id_estado_usuario =  $fila[0]['id_estado_usuario'];
            $result = password_verify($contraseña, $hash);

            //Se comprueba si los datos leídos son correctos.
            if(!$result)
            {   
                if($id_estado_usuario == 1)
                {
                    echo json_encode(['result' => 'no_activo']);
                }
                else
                {
                    $intentos = $intentos + 1;
                    $sql = "UPDATE equipo
                    SET intentos = ?   WHERE mail = ?";
                    $result = $base_datos->consulta_segura($sql,'is',array($intentos,$usuario));

                    if ($intentos == 4)
                    {
                        $id_no_activo = '1';
                        $sql = "UPDATE equipo
                        SET id_estado_usuario = ?   WHERE mail = ?";
                        $result = $base_datos->consulta_segura($sql,'is',array($id_no_activo,$usuario));
                        
                    }
                    echo json_encode(['result' => 'no_verificado']);   
                }
            }
            else
            {
                //Si se cumplen los requisitos se accede a los menus.
                $nombre = $fila[0]['nombre'];
                $id_tipo_usuario = $fila[0]['id_tipo_usuario'];
                $apellidos =  $fila[0]['apellidos'];
                $id = $fila[0]['id'];
                $_SESSION['nombre'] = $nombre;
                $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
                $_SESSION['apellidos'] = $apellidos;
                $_SESSION['id'] = $id;
                $_SESSION['valido'] = true;
                echo json_encode(['result' => 'ok']);
            }
        }
    }
}
?>
