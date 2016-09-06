<?php
include_once("ClassConexion.php");

class PersonaDatos
{
    private $objC;
    

	function PersonaDatos()
    {
        $this->objC = new conexion();
    }

	function GuardarPersona($objPersona)
	{
      
    $conn =  $this->objC->ObtenerConexion();
      
    $Nombre = $objPersona->getNombre();
    $Apellido1 = $objPersona->getApellido1();

    $Sentencia = $conn->prepare("CALL InsertarDatos(?,?)");
    $Sentencia->bind_param('ss',$Nombre,$Apellido1);
    $Sentencia->execute();
      
    $this->objC->CerrarConexion();
	}

    function EliminarPersona($objPersona)
    {
      
    $conn =  $this->objC->ObtenerConexion();
      
    $Apellido1 = $objPersona->getApellido1();

    $Sentencia = $conn->prepare("CALL EliminarDatos(?)");
    $Sentencia->bind_param('s',$Apellido1);
    $Sentencia->execute();
      
    $this->objC->CerrarConexion();
    }    

    function MostrarDatos()
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL mostrarDatos()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $persona = array();

         $persona["nombre"] = $row["nombre"];
         $persona["cedula"] = $row["edad"]; 
         array_push($response, $persona);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();
        return $response;
    }


}
?>