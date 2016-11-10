<?php 

include_once("../../Modelo/ConfigureData/department_04.php");
include_once("../../Modelo/Clases/class04_cat_department.php");

//controlador para guardar los departamentos

   $objlending = new catDepartment_04(
   $_GET['txt_Codigo'],
   $_GET['txt_Nombre']
   );//instancia de la funcion 

   $Datos = new department_04();//instancia del modelo de configuracion de departamento

   $respuesta = $Datos->SaveDepartament($objlending);//respuesta

   echo $respuesta;
   //header('Location: ../../Vista/ConfigureView/list_tip_department04.php'); //redirige la grilla de crear
?>