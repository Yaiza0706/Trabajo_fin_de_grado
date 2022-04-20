<?php

//Se definen los parámetros para realizar la conexión con la base de datos.
define ('USER', 'root');
define ('PASSWORD', 'TFG1234');
define ('HOST', 'localhost');
define ('DATABASE', 'pagina_web');

class bbdd 
{
	protected $conexion;
	public function conectar()
	{
		if (!isset($this->conexion))
		{
			$this->conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
		}
		if (!$this->conexion)
		 {
		    echo("ERROR: No se puede conectar al servidor: " . $this->conexion->connect_error);
		}
	}

	public function consulta($consultar, $parametros = array())
	{
		$resultado = $this->conexion->prepare($consultar);
		if ($this->conexion->error) 
		{
    		echo("ERROR: No se puede hacer la consulta: " . $this->conexion->error);
  		} 
		$resultado->execute() or trigger_error($resultado->error, E_USER_ERROR);
		$exe = $resultado->get_result() ;
		if($exe == NULL)
		{
			return -1;
		}
		
		else if ($exe->num_rows>0) 
		{
			$row_data = $exe->fetch_all(MYSQLI_ASSOC);
			return $row_data;
		}
		 else 
		 {	
			return -1;
		}
		
	}

	public function verificar_login($usuario, $contraseña)
	{
		//Se buscan los datos introducidos en la base de datos.
        $resultado = $this->conexion->prepare("SELECT * FROM equipo WHERE mail = ? and contraseña = ? ");
        //De esta forma se evitan las inyecciones sql.
		$resultado->bind_param("ss", $usuario , $contraseña);
		$resultado->execute();
		$res = $resultado->fetch();
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function verificar_email($usuario)
	{    
		//Se buscan si ya existe un usuario con ese email.
        $resultado = $this->conexion->prepare("SELECT * FROM equipo WHERE mail = ? ");
        //De esta forma se evitan las inyecciones sql.
		$resultado->bind_param("s", $usuario);
		$resultado->execute();
		$res = $resultado->fetch();
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>