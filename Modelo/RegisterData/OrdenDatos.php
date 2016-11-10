<?php
require_once("../../Modelo/ClassConexion.php"); // requiere la conexion 
require_once("../../Modelo/Clases/class03_reg_order.php"); // requiere la clase 

class OrdenDatos
{
    private $objC; // variable de la clase 


	function OrdenDatos()
    {
        $this->objC = new conexion(); // instancia de la conexion 
    }

  function GuardarOrden($objOrden)
  {
    try
    {
    $CodeOrder = $objOrden->getOrderCode(); //obtencion del codigo mediante el get de la variable
    $Ubication = $objOrden->getUbication(); //obtencion del codigo mediante el get de la variable
    $CodeDepartment = $objOrden->getDepartmentCode(); //obtencion del codigo mediante el get de la variable
    $TransferYear = $objOrden->getTransferYear(); //obtencion del codigo mediante el get de la variable
    $EndDate = $objOrden->getEndDate(); //obtencion del codigo mediante el get de la variable
    $IDUser = $objOrden->getIDUser(); //obtencion del codigo mediante el get de la variable

     $conn =  $this->objC->ObtenerConexion(); // obtiene la conexion

     $Sentencia = $conn->prepare("CALL sp_samAddOrd(?,?,?,?,?,?)"); // llama el procedimiento

     $Sentencia->bind_param('ssssss',$CodeOrder,$Ubication,$CodeDepartment,$TransferYear,$EndDate,$IDUser); // referencia los parametros de la base de datos 

     $Sentencia->execute(); // ejecuta la sentencia 

     $resultado = $Sentencia->get_result(); // obtiene el resultado de la sentencia 

      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM); // guarda el valor en un array segun su valor 

     return $r[0];
   }
   catch (Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }

  }

  function ActualizarOrden($objOrden)
  {
    try 
    {
    $CodeOrder = $objOrden->getOrderCode();
    $Ubication = $objOrden->getUbication();
    $CodeDepartment = $objOrden->getDepartmentCode();
    $TransferYear = $objOrden->getTransferYear();
    $EndDate = $objOrden->getEndDate();
    $IDUser = $objOrden->getIDUser();

     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samUpdOrd(?,?,?,?,?,?)");

     $Sentencia->bind_param('ssssss',$CodeOrder,$Ubication,$CodeDepartment,$TransferYear,$EndDate,$IDUser);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();

      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);

     return $r[0];
   }
   catch (Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }

  }

    function MostrarOrden()
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion(); // obtiene la conexion 
        // abre la conexion con la base de datos
        $response = array(); 
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwRegOrd()';
           //llama el procedimiento almacenado 
        $result = mysqli_query($conn, $sql);

           //enlaza el rsultado obtenido 
      if (mysqli_num_rows($result) > 0)
      {

         while ($row = mysqli_fetch_array($result)) // compara los resultado para ejecutar una condicion
         {
         $order = array(); // guarda los datos del array en la variable

         $order["SAM03CoOrd"] = $row["SAM03CoOrd"]; // compara e iguala los datos del array con la bd
         $order["SAM03Ubic"] = $row["SAM03Ubic"];
         $order["SAM04CoDepart"] = $row["SAM04CoDepart"];
         $order["SAM03AnioTrans"] = $row["SAM03AnioTrans"];
         $order["SAM03FeExt"] = $row["SAM03FeExt"];
         $order["SAM05CedUsr"] = $row["SAM05CedUsr"];
         array_push($response, $order);
         }

      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos
        $this->objC->CerrarConexion(); // cierra la conexion 
        // cierre de la conexion
        return $response;
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
    }

     function MostrarPeque()
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion(); 
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwRegOrd()';
           //llama el procedimiento almacenado 
        $result = mysqli_query($conn, $sql);

           //enlaza el resultado obtenido 
      if (mysqli_num_rows($result) > 0)
      {

         while ($row = mysqli_fetch_array($result)) // compara los resultados y ejecuta una condicion
         {
         $order = array(); // guarda datos del array en la variable

         $order["SAM03CoOrd"] = $row["SAM03CoOrd"]; // compara e iguala los datos del array con la bd
         array_push($response, $order); // cargar valor dentro del array 
         }

      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos
        $this->objC->CerrarConexion();
        // cierre de la conexion
        return $response;
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }

    }

    function ListarOrdenDepart($CodDepart)
    {
      try
      {
      $conn =  $this->objC->ObtenerConexion();
      // abre la conexion con la base de datos
      $response = array();
      //codigo para mostrar datos
      $sql = 'CALL sp_samShwOrdDepar("'.$CodDepart.'")';
         //llama el procedimeinto almacenado 
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0)
      {

         while ($row = mysqli_fetch_array($result))
         {
         $order = array(); // guarda los datos del array en una variable

         $order["SAM03CoOrd"] = $row["SAM03CoOrd"]; // compara e iguala los datos de la variable y db 
         $order["SAM03Ubic"] = $row["SAM03Ubic"];
         $order["SAM04CoDepart"] = $row["SAM04CoDepart"];
         $order["SAM03AnioTrans"] = $row["SAM03AnioTrans"];
         array_push($response, $order); // carga valor dentro el array 
         }

      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos
        $this->objC->CerrarConexion(); // cierra la conexion 
        return $response; // returna un resultado 
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
    }

    function DeleteOrden($objOrden)
    {
      try
      {
      $conn = $this->objC->ObtenerConexion(); // obtiene la conexion 

      $Sentencia = $conn->prepare("CALL sp_samDelRegOrd(?)"); // llama el procedimiento almacenado 
      $Sentencia->bind_param('s',$objOrden); // referencia los parametros de la base de datos 
      $Sentencia->execute(); // ejecuta la sentencia 

      $resultado = $Sentencia->get_result(); // obtiene el resultado de la sentencia 

      $r = $resultado->fetch_array(MYSQLI_NUM); // agrega el valor en un  array segun su valor  

      $this->objC->CerrarConexion(); // cierra la conexion 
      $Sentencia->close(); // cierra la sentencia 

      return $r[0];
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
    }

    function SearchOrderByID($IdOrden)
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samSrhRegOrd("'.$IdOrden.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $orden = array();

         $orden["SAM03CoOrd"]    = $row["SAM03CoOrd"];
         $orden["SAM03Ubic"]   = $row["SAM03Ubic"]; 
         $orden["SAM04CoDepart"]  = $row["SAM04CoDepart"];
         $orden["SAM03AnioTrans"]  = $row["SAM03AnioTrans"];
         $orden["SAM03FeExt"]  = $row["SAM03FeExt"]; 
         $orden["SAM05CedUsr"]  = $row["SAM05CedUsr"];  
         array_push($response, $orden);
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
    catch (Exception $e)
    {
      echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }
}
?>
