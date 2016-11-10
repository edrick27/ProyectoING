<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php');

//controlador la notificacion

$Data = new reg_lendingData_09();//instancia del modelo de datos de notificar
$answear = $Data->Notification();  //respuesta de la notificacion 

echo $answear;//respuesta
?>