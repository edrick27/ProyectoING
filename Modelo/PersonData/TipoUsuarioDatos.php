<?php
require_once("../../Modelo/ClassConexion.php");

class TipoUsuarioDatos
{
	//Se declara la variable donde se almacena la conexion
 private $objC;
    
	function TipoUsuarioDatos()
    {
        //Se instancia la conexion 
        $this->objC = new conexion();
    }

    function showTypeUser()
    {
      try
      {
        //Se obtiene la conexion 
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //Se hace un llamado al procedimiento almacenado
        $sql = 'CALL sp_samShwTipUsr()';
        //Se obtiene el resultado de la consulta
        $result = mysqli_query($conn, $sql);

           //Se comprueba si se extrajo los resultados
        if (mysqli_num_rows($result) > 0) 
          {
            $typeuser = array();
            //Mientras haya resultados se guarda en el array
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
            //Fin del codigo para mostrar Datos
            //Se cierra la conexion
            $this->objC->CerrarConexion();
            return $response;
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }
 }
?>