<?php

include_once("ClassConexion.php");

/**
* 
*/
class DepartamentoDatos
{
	

 private $objC;
    
	function DepartamentoDatos()
    {
        $this->objC = new conexion();
    }

    function MostrarDepartamento()
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwCatDepart()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {
         $Departamento = array();
         while ($row = mysqli_fetch_array($result))
         {   
         

         $Departamento["code"] = $row["SAM04CoDepart"];
         $Departamento["description"] = $row["SAM04DescpPart"]; 
         array_push($response, $Departamento);
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