<?php

include_once("ClassConexion.php");

/**
* 
*/
class TipoUsuarioDatos
{
	

 private $objC;
    
	function TipoUsuarioDatos()
    {
        $this->objC = new conexion();
    }

    function showTypeUser()
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwTipUsr()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {
         $typeuser = array();
         while ($row = mysqli_fetch_array($result))
         {   

         $typeuser["code"] = $row["SAM06CoTipUsr"];
         $typeuser["description"] = $row["SAM06DescpUsr"]; 
         array_push($response, $typeuser);

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