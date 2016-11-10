<?php 
include('../../Modelo/LendingData/reg_lendingData_09.php');

//controlador para generar el reporte

$CodeLending = $_GET['code']; //Se inicializa un objeto que va almacenar el codigo

$Data = new reg_lendingData_09(); //instancia del modelo de registro de documentos
$answear = $Data->Lending_report($CodeLending);  //respuesta de la consulta  

if($answear != 'no hay resultados')
{
  session_start();
  $_SESSION['report'] = $answear;
  header('Location: ../../Vista/LendingView/lending_report.php');
}
else
{
   header('Location: ../../Vista/LendingView/reg_lending09.php');
}
?>