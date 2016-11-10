<?php
include_once('../../Modelo/LendingData/reg_request_Data.php');
include_once("../../Modelo/Clases/class09_reg_lending.php");
//controlador para registrar las solicitudes

	$objlending = $objlending = new Lending_09('00',$_GET['txt_DateRequest'],'00',$_GET['txt_Cedula']);//instancia de la funcion

   $Datos = new reg_request_Data();//instancia del modelo de solicitud de documentos


  $respuesta = $Datos->Saverequest($objlending);//respuesta de la consulta
    
  
     echo '1'; 

?>