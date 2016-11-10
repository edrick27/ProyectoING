<?php 
	require_once("../../Modelo/ConfigureData/department_04.php");

	//controlador hacer la acrualizacion de tipo de documento

	$ObjDoc = $_GET['ID'];//Se inicializa un objeto que va almacenar el id del documento

	$Datos = new department_04();//instancia del modelo de tipo de documento

	$respuesta = $Datos->SearchDepartByID($ObjDoc);//respuesta

	session_start();//se abre la seccion

	foreach ($respuesta as $Valor) //trae los datos y se los asigna a las variales de session 
	{
		$_SESSION['SAM04CoDepart'] = $Valor['SAM04CoDepart'];
		$_SESSION['SAM04DescpPart'] =   $Valor['SAM04DescpPart'];
	}

	$_SESSION['Action2'] = 'uptControll';

	header('Location: ../../Vista/ConfigureView/Departament04.php');//redirige al documento 
 ?>