<?php 
	require_once("../../Modelo/RegisterData/DocumentData.php"); // requiere el modelo 

	$ObjDoc = $_GET['idDoc']; // obtiene el id del documento

	$Datos = new DocumentosDatos(); // instancia del modelo 

	$respuesta = $Datos->DeleteDoc($ObjDoc); // carga el resultado de la funcion del modelo 

	echo $respuesta; // envia resultado 
 ?>