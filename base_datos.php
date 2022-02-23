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
			$this->conexion =new mysqli(HOST, USER, PASSWORD, DATABASE);
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
		$resultado->execute();

		$res = $resultado->fetch();
		return $res;
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
}
?>