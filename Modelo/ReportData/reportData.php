  <?php
require_once("../../Modelo/ClassConexion.php");

class reportData//clase registro de solicitud
{
    private $objC;//variable de la clase 
    

  function reportData()//funcion para conectar con la base de datos.
    {
        $this->objC = new conexion();//se crea el objeto de la conexion
    }


  function personDepartment_report($CodeReport)//funcion de generar el reporte
  {
       try
       {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samShwPerDeparGene()';//abre la conexion y llama el procedimiento

        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
           $Request = array();

           $Request["SAM07CedUsr"] = $row["SAM07CedUsr"]; 
           $Request["SAM07NomPers"] = $row["SAM07NomPers"]; 
           $Request["SAM07ApePers1"] = $row["SAM07ApePers1"]; 
           $Request["SAM07ApePers2"]  = $row["SAM07ApePers2"];
           $Request["SAM04DescpPart"] = $row["SAM04DescpPart"]; 

           array_push($response, $Request);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cerrar conexion 

        return $response;//retorna la respuesta
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
   }


   function documentDepartment_report($CodeReport)//funcion de generar el reporte
  {
    try
    {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samShwDocDeparReport()';//abre la conexion y llama el procedimiento

        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
           $Request = array();

           $Request["SAM01CoDoc"] = $row["SAM01CoDoc"]; 
           $Request["SAM01Conte"] = $row["SAM01Conte"]; 
           $Request["SAM01Contri"] = $row["SAM01Contri"]; 
           $Request["SAM01Anio"]  = $row["SAM01Anio"];
           $Request["SAM02Descp"] = $row["SAM02Descp"]; 
           $Request["SAM04DescpPart"] = $row["SAM04DescpPart"];

           array_push($response, $Request);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cerrar conexion 

        return $response;//retorna la respuesta
    }
    catch (Exception $e)
    {
      echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }

  function documentDate_report($F1,$F2)//funcion de generar el reporte
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = "CALL sp_samShwDocumentDateReport('".$F1."','".$F2."')";//abre la conexion y llama el procedimiento

        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
           $Request = array();

           $Request["SAM01CoDoc"] = $row["SAM01CoDoc"]; 
           $Request["SAM03CoOrd"] = $row["SAM03CoOrd"]; 
           $Request["SAM02Descp"] = $row["SAM02Descp"]; 
           $Request["SAM01Conte"]  = $row["SAM01Conte"];
           $Request["SAM01Contri"] = $row["SAM01Contri"]; 
           $Request["SAM01Anio"] = $row["SAM01Anio"];
           $Request["SAM04DescpPart"] = $row["SAM04DescpPart"];

           array_push($response, $Request);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cerrar conexion 

        return $response;//retorna la respuesta
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }

    }
}
?>