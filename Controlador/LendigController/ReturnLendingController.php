<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php');
//controlador para devolver el prestamo
 $ID = $_GET['ID'];//Se inicializa un objeto que va almacenar el id

$Data = new reg_lendingData_09();//instancia del modelo de registro de documentos 
$answear = $Data->ReturnLending($ID);  //respuesta de la consulta  

echo $answear;
?>