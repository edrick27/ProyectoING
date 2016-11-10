<?php 
include_once('../../Modelo/LendingData/reg_lendingData_09.php');
include_once("../../Modelo/Clases/class09_reg_lending.php");

//controlador para registrar el prestamo

   $objlending = new Lending_09('00',$_GET['txt_DateLending'],$_GET['txt_ReturnDate'],$_GET['txt_Cedula']);//instancia de la funcion

   $Datos = new reg_lendingData_09();//intancia del modelo de datos del prestamo

  $respuesta = $Datos->Savelending($objlending);//respuesta de la consulta
  
     echo '1'; 

?>