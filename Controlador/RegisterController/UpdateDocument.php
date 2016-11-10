<?php 
	require_once("../../Modelo/RegisterData/DocumentData.php"); // requiere el modelo 

	$ObjDoc = $_GET['ID']; // obtiene el valor de la variable 
   

	$Datos = new DocumentosDatos(); // instancia del modelo 

	$respuesta = $Datos->SearchDocByID($ObjDoc); // carga el resultado de la funcion del modelo

	session_start(); // inicia la sesion 

	foreach ($respuesta as $Valor) // recorre los campos mediante el valor 
	{
		$_SESSION['SAM01CoDoc']=$Valor['SAM01CoDoc'];
		$_SESSION['SAM03CoOrd']=$Valor['SAM03CoOrd'];
		$_SESSION['SAM02CoTipDoc']=$Valor['SAM02CoTipDoc'];
		$_SESSION['SAM01Conte']=$Valor['SAM01Conte'];
		$_SESSION['SAM01Note']=$Valor['SAM01Note'];
		$_SESSION['SAM01Contri']=$Valor['SAM01Contri'];
		$_SESSION['SAM01Anio']=$Valor['SAM01Anio'];
		$_SESSION['SAM01FeExt']=$Valor['SAM01FeExt'];
	}

	$_SESSION['Action2'] = 'uptControll'; // carga el nuevo valor de la variable de sesion 

	header('Location: ../../Vista/RegisterView/Documento.php'); // incluye la vista 
 ?>