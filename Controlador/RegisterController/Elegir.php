<?php 
	include_once("../../Modelo/RegisterData/OrdenDatos.php"); // require el modelo 


	$ObjOrden = $_GET['ID']; // obtiene el id 

	$Datos = new OrdenDatos(); // instancia del modelo 

	session_start(); // inicio de la sesion 

	$_SESSION['SAM03CoOrd'] = $ObjOrden; // el valor obtenido se almacena en la variable de sesion 

	$_SESSION['Action2'] = 'eliControl'; // guarda en la variable el nuevo valor de la sesion 

	header('Location: ../../Vista/RegisterView/Documento.php'); // incluye la vista 
 ?>