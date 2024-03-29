<?php
require_once('../base_datos.php');
$id_equipo = 0;
$no_existe = false;

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET') 
{
    if(isset($_GET["id"]))
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
    }

} 
else if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') 
{
    

    if (isset( $_POST['id_equipo'] ))
    {
        $id_equipo = $_POST['id_equipo'];
    }

    //Se guardan los datos introducidos en variables locales
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

    if (isset( $_POST['contra'] ))
    {
        $contra = $_POST['contra'];
        $contra_hash = password_hash($contra, PASSWORD_DEFAULT);
    }

    $base_datos = new bbdd();
    $base_datos->conectar();

        //Se actualizan los nuevos valores introducidos
        $sql = "UPDATE equipo
        SET nombre = ?, apellidos = ?, titulacion = ?, web = ?, mail = ?, contra = ?
        WHERE id = ?";

        $test = $base_datos->consulta_segura($sql, 'ssssssi', array($nombre,$apellido,$titulacion,$web,$email,$contra_hash, $id_equipo));
        if(!$test)
        {   
            echo json_encode(['result' => 'error']);       
        }
        else
        {
            echo json_encode(['result' => 'ok']);
        }
} 
?> 