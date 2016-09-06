<?php

class conexion
{
  private $host = "localhost";
  private $User  = "edrick27";
  private $password = "casanicoya";
  private $DataBase = "edrick27";
  private $conexion;

    function conexion()
    {
    	
    }

	function ObtenerConexion()
	{
		 $this->conexion = new mysqli($this->host,$this->User,$this->password,$this->DataBase);

    	 return $this->conexion;
	}

	function CerrarConexion()
	{
		$this->conexion->close();
	}
}

?>