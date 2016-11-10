<?php 
include('../../Modelo/LendingData/reg_request_Data.php');

//controlador para traer los documentos por departamento

$CodeRequest = $_GET['code'];//Se inicializa un objeto que va almacenar el codigo

$Data = new reg_request_Data();//instancia del modelo de registro de documentos 
$answear = $Data->Request_report($CodeRequest); //respuesta de la consulta  
 

if($answear != 'no hay resultados')
{
  session_start();
  $_SESSION['report'] = $answear;
  header('Location: ../../Vista/LendingView/request_report.php');
}
else
{
   header('Location: ../../Vista/LendingView/reg_request.php');
}
?>