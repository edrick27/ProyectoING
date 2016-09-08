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

}
?>