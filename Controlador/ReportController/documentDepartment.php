<?php 
include('../../Modelo/ReportData/reportData.php');

//controlador para traer los documentos por departamento

$CodeRequest = $_GET['code'];//Se inicializa un objeto que va almacenar el codigo

$Data = new reportData();//instancia del modelo de registro de documentos 
$answear = $Data->documentDepartment_report(); //respuesta de la consulta  
 

if($answear != 'no hay resultados')
{
  session_start();
  $_SESSION['report'] = $answear;
  header('Location: ../../Vista/ReportView/DocumentDepartment.php');
}
else
{
   header('Location: ../../Vista/LendingView/reg_request.php');
}
?>