<?php 

include_once("../../Modelo/ConfigureData/tipodocument_02.php");
include_once("../../Modelo/Clases/class02_tip_document.php");

//controlador para guardar el tipo de documento
   

   $objlending = new DocumentType_02(
   $_GET['txt_Codigo'],
   $_GET['txt_Nombre']
   );//instancia de la funcion 

   $Datos = new tipodocument_02();//instancia del modelo de configuracion de departamento

   $respuesta = $Datos->SavetipDocument($objlending);//respuesta

   echo $respuesta;
?>