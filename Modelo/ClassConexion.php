<?php

class conexion
{
  private $host = "ec2-54-71-10-152.us-west-2.compute.amazonaws.com";
  //private $host = "localhost";
  private $User  = "root";
  private $password = "s1st3m4SAM";
  //private $password = "root";
  private $DataBase = "sam";
  private $conexion;

    function conexion()
    {
    	
    }

	function ObtenerConexion()
	{
    try 
    {
		    $this->conexion = new mysqli($this->host,$this->User,$this->password,$this->DataBase) OR DIE ("Error de conexion");

        if (!$this->conexion) 
        {
         die('No pudo conectarse: ' . mysql_error());
        }
        else
        {
       	 return $this->conexion;
        }
     } 
     catch (Exception $e) 
     {
      echo 'no se pudo conectar a la base de datos  '.$e->getMessage(); 
     }
  }

  function CerrarConexion()
  {
    try
    {
      $this->conexion->close();
    }
    catch (Exception $e)
    {
      echo 'no se pudo cerrar la conexion a la base de datos  '.$e->getMessage(); 
    }
	}
}

?>