<?php 
include('../../Modelo/ReportData/reportData.php');

//controlador para traer los documentos por departamento

$Data = new reportData();//instancia del modelo de registro de documentos 
$answear = $Data->documentDate_report($_GET['txt_Date1'],$_GET['txt_Date2']); //respuesta de la consulta  
 

if($answear != 'no hay resultados')
{
  session_start();
  $_SESSION['report'] = $answear;
  echo '2';
 header('Location: ../../Vista/ReportView/DocumentDate.php');
}
else
{
	 header('Location: ../../Vista/ReportView/DocumentDate.php');
	echo '1';
  // header('Location: ../../Vista/ReportView/DocumentDate.php');
}
?>