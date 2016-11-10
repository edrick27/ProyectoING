<?php
require_once("../../Modelo/ClassConexion.php");

class DepartamentoDatos//clase modelo de datos de departamento 
{
 private $objC;//variable de la clase
    
	function DepartamentoDatos()//Funcion para conectar a la base de datos 
    {
        $this->objC = new conexion(); //se crea el objeto de la conexion
    }

    function MostrarDepartamento()//Funcion para mostrar los departamentos
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();//abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samShwDepart()';//llamamos el procedimiento almacenado

        $result = mysqli_query($conn, $sql);//respuesta de procedimiento almacenado

      if (mysqli_num_rows($result) > 0) //recorre las filas en busca de datos
      {
         $Departamento = array();
         while ($row = mysqli_fetch_array($result))// si encuentra datos los muestra 
         {   
         

         $Departamento["code"] = $row["SAM04CoDepart"];//obtiene el codigo de la base de datos

         $Departamento["description"] = $row["SAM04DescpPart"];//obtiene el nombre de la base de datos

         array_push($response, $Departamento);//trae la respuesta
         }
               
      }
      else
      {
        echo $result; //echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cerramos la conexion
        return $response;//trae la respuesta
      }
      catch(Exception $e)
      {
         echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
        
    }
 }
?>