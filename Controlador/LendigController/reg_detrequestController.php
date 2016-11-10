<?php 
include_once("../../Modelo/LendingData/reg_request_Data.php");
include_once("../../Modelo/Clases/class10_det_lending.php");

//controlador para registrar el detalle de la solicitud

   $objlending = new DetailLending_10('0',$_GET['txt_CodeLending'],$_GET['txt_DocumentCode']);//instancia de la funcion 
   
   $Datos = new reg_request_Data();//intancia del modelo de datos de solicitud

  $respuesta = $Datos->detSaverequest($objlending);//respuesta de la consulta
    
  echo "1";

?>