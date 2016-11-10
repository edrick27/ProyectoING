<?php 
include_once("../../Modelo/LendingData/det_lendingData_10.php");
include_once("../../Modelo/Clases/class10_det_lending.php");

//controlador para guardar el detalle


   $objlending = new DetailLending_10('0',$_GET['txt_CodeLending'],$_GET['txt_DocumentCode']);//instancia de la funcion 
   
   $Datos = new det_lendingData_10();//instancia del modelo de datos detalle de prestamo


  $respuesta = $Datos->Savelending($objlending);//obtenemos la respuesta de la consulta
    
  echo "1";//

?>