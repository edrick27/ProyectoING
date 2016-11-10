<?php
require_once("../../Modelo/ClassConexion.php"); // requiere la conexion
class TipoDocumento
{
  private $objC; // variable de la clase 
  function TipoDocumento()
  {
    $this->objC = new conexion(); // instancia de la conexion 
  }

  function mostrarTipoDocu()
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion(); // obtener la conexion 
        $response = array(); 
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwTipDoc()';
           //llama el procedimiento almacenado 
        $result = mysqli_query($conn, $sql);

        //enlaza el resultado obtenido 
        if (mysqli_num_rows($result) > 0)
          {
            $typeuser = array(); // variable que carga el array 
            while ($row = mysqli_fetch_array($result))
              {
                $typeuser["code"] = $row["SAM02CoTipDoc"]; // compara e iguala los datos del array y la bd 
                $typeuser["description"] = $row["SAM02Descp"];
                array_push($response, $typeuser); // carga valor dentro del array 
              }
          }
          else
            {
              echo "no hay resultados";
            }
            //fin del codigo para mostrar Datos
            $this->objC->CerrarConexion(); // cierra conexion 
            return $response;
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }
  }
 ?>
