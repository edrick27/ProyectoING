<?php 
	require_once("../../Modelo/ConfigureData/tipodocument_02.php");

    //controlador hacer la acrualizacion de tipo de documento

	$ObjDoc = $_GET['ID'];//Se inicializa un objeto que va almacenar el id del documento
   
	$Datos = new tipodocument_02();//instancia del modelo de tipo de documento

	$respuesta = $Datos->SearchTipDocByID($ObjDoc);//respuesta

	session_start();//se abre la seccion 

	foreach ($respuesta as $Valor) //trae los datos y se los asigna a las variales de session 
	{
		$_SESSION['SAM02CoTipDoc'] = $Valor['SAM02CoTipDoc'];
		$_SESSION['SAM02Descp'] =   $Valor['SAM02Descp'];
	}

	$_SESSION['Action2'] = 'uptControll';

	header('Location: ../../Vista/ConfigureView/Document02.php');//redirige al documento
 ?>