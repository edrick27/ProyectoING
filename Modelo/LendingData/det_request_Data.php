<?php
require_once(dirname(dirname(__FILE__))."\ClassConexion.php");
require_once(dirname(dirname(__FILE__))."\Clases\class10_det_lending.php");

class det_request_Data
{
    private $objC;
    

	function det_request_Data()
    {
        $this->objC = new conexion();
    }


    function detSaverequest($objlending)
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