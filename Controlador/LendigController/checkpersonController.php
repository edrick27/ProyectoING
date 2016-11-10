<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php');

//controlador verificar la persona

 $ID = $_GET['ID'];//Instancia del modelo de datos de persona 

$Data = new reg_lendingData_09();// Instancia del modelo de prestamo

$answear = $Data->CheckPerson($ID); //se llama la funcion del modelo y se le pasa el parametro

echo $answear;//retorna la respuesta
?>