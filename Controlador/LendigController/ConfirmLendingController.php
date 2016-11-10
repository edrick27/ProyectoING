<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php');

//controlador para confirmar el prestamo

 $ID = $_GET['ID'];//Se inicializa un objeto que va almacenar el ID

$Data = new reg_lendingData_09();// Instancia del modelo de prestamo

$answear = $Data->ConfirmLending($ID); //se llama la funcion del modelo y se le pasa el parametro  

echo $answear; //retorna la respuesta
?>