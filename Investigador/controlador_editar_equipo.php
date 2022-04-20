<?php
require_once('../base_datos.php');
$id_equipo = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    //Se obtiene el valor del id de la persona que se va a editar
    $id_equipo = $_GET["id"];
    
    //Se realiza la conexion con la base de datos.
    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se leen todos los datos del usuario con el id recibido
    $sql = "SELECT * FROM equipo WHERE id = " . $id_equipo;
    $result = $base_datos->consulta($sql);
    if($result == -1)
    {
        $no_existe = true;
    }else{
        $equipo = $result[0];
    }

} else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales

    $tipo_usuario = 1;     //Se añadirán a todos los nuevos usuarios como investigadores.
    $estado_usuario = 1;   //Se añadirán a todos los nuevos usuarios como no activos.
    $proyecto = 1  ;       //Se añadirán a todos los nuevos usuarios en un proyecto vacío.

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $titulacion = $_POST['titulacion'];
    $web = $_POST['web'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
    //$contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se verifica que no exista ya un usuario con ese email
    $result = $base_datos -> verificar_email($email);

    if(!$result)
    {

        //Se actualizan los nuevos valores introducidos
        $sql = "UPDATE equipo
        SET nombre = '$nombre', apellidos = '$apellidos', titulacion = '$titulacion', web = '$web', id_tipo_usuario = '$id_tipo_usuario', mail = '$mail',
        contraseña = '$contraseña', id_estado_usuario = '$id_estado_usuario', id_proyecto = '$id_proyecto'
        WHERE id = '$id_financiacion'";

        $test = $base_datos->consulta($sql);
        if(!$test)
        {   
            echo json_encode(['result' => 'error']);       
        }
        else
        {
            echo json_encode(['result' => 'ok']);
        }
    }
    else
    {
        echo json_encode(['result' => 'email_existente']);
    }
}

?>


