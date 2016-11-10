<?php
require_once('../../Modelo/LendingData/reg_lendingData_09.php'); 
//controlador para mostrar el ultimo codigo agregado
class ShowMaxController
{
   
	function ShowMaxController(){}

  function MaxCodPres()
  {
     $lending = new reg_lendingData_09(); //instancia del modelo de datos de registro del prestamo

     $code =  $lending->MaxCodPres();//respuesta de la funcion 

     return $code;
  }
}
?>
