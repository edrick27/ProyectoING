<?php
include_once("ClassConexion.php");
require_once("../Modelo/Clases/class_reg_order.php");

class OrdenDatos
{
    private $objC;
    

	function OredenDatos()
    {
        $this->objC = new conexion();
    }

  function SaveOrder($objOrden)
  {

    $CodeOrder = $objOrden->getCodeOrder();
    $Ubication = $objOrden->getUbication();
    $CodeDepartment = $objOrden->getCodeDepartment();
    $TransferYear = $objOrden->getCodeDepartment();
    $EndDate = $objOrden->getTransferYear();
    $IDUser = $objOrden->getIDUser();
   
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samAddOrd(?,?,?,?,?,?)");

     $Sentencia->bind_param('sssssss',$CodeOrder,$Ubication,$CodeDepartment,$TransferYear,$EndDate,$IDUser);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);
     
     return $r[0];
  }

  function MaxOrder($CodeDepartment)
  {
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL Sp_samMaxCoDepart(?)");

     $Sentencia->bind_param('s',$CodeDepartment);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);
     
     return $r[0];
  }

      function ShowOrder()
    {
        $conn =  $this->objC->ObtenerConexion();
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwRegOrd()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $order = array();

         $order["SAM03CoOrd"] = $row["SAM03CoOrd"];
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

          
        $this->objC->CerrarConexion();
        // cierre de la conexion
        return $response;
    }

}
?>