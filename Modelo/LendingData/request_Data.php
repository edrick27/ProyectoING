<?php
require_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class10_det_lending.php");

class request_Data//clase registro de solicitud
{
    private $objC;//variable de la clase 
    

	function request_Data()
    {
        $this->objC = new conexion();
    }


    function Saverequest($objlending)
  {
    try
    {
    //$DetailCode = $objlending->getCodeDetail();
    $CodeLending = $objlending->getCodeLending();
    $DocumentCode = $objlending->getDocumentCode();

     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samAddDetPrest(?,?)");

     $Sentencia->bind_param('is',$CodeLending,$DocumentCode);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();

     $Sentencia->close();
 
      //$r = var_dump($resultado->fetch_assoc());
      $r = $resultado->fetch_array(MYSQLI_NUM);
    
     $this->objC->CerrarConexion();
     return $r[0];
    }
    catch (Exception $e)
    {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }
}
    