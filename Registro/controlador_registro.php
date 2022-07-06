<?php  
require_once('../base_datos.php');

//Se comprueba peticion post
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    //Se guardan los datos introducidos en variables locales

    $tipo_usuario = 3;     //Se añadirán a todos los nuevos usuarios como investigadores.
    $estado_usuario = 1;   //Se añadirán a todos los nuevos usuarios como no activos.
    $intentos = 0;

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
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
    }

    $base_datos = new bbdd();
    $base_datos->conectar();

    //Se verifica que no exista ya un usuario con ese email
    $result = $base_datos -> verificar_email($email);

    if(!$result)
    {
        $sql = "INSERT INTO equipo(nombre, apellidos, titulacion, web, id_tipo_usuario, mail, contraseña, id_estado_usuario, intentos) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?,?)";
    
        $test = $base_datos->consulta_segura($sql,'ssssissii', array($nombre, $apellido, $titulacion, $web, $tipo_usuario, $email, $contraseña_hash, $estado_usuario, $intentos));
        if(!$test)
        {   
            echo json_encode(['result' => 'error']);       
        }
        else
        {
            echo json_encode(['result' => 'ok']);
        }
    }
    else{
        echo json_encode(['result' => 'email_existente']);
    }
}
?>