<?php 
	require_once("../../Modelo/RegisterData/OrdenDatos.php"); // requiere el modelo 

	$ObjOrden = $_GET['idOrden']; // obtiene el id de la orden 

	$Datos = new OrdenDatos(); // instancia del modelo 

	$respuesta = $Datos->DeleteOrden($ObjOrden); // carga el resultado obtenido en la funcion del modelo 

	echo $respuesta; // muestra un resultado 
 ?>