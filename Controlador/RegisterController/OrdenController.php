<?php 
	include_once("../../Modelo/RegisterData/OrdenDatos.php"); // requiere el modelo 
	include_once("../../Modelo/Clases/class03_reg_order.php"); // requiere la clase 

		session_start(); // inicia la sesion 
		$Action = $_SESSION['Action']; // almacena el valor de la sesion en una variable 
		session_destroy(); // destruye la sesion 

	$ObjOrden = new Order_03(
		$_POST['txt_cod_ord'],
		$_POST['txt_ubicacion'],
		$_POST['sel_tipoDepart'],
		$_POST['txt_ano'],
		$_POST['txt_fecha'],
		$_POST['txt_cedUsr']
		); // instancia de la clase con parametros 

	$Datos = new OrdenDatos(); // instancia del modelo 

	if($Action == 'update')
	{
		$respuesta = $Datos->ActualizarOrden($ObjOrden); // carga el resultado de la funcion del modelo 

			header('Location: ../../Vista/RegisterView/ListaOrden.php'); // incluye la vista 
	}
	else
	{
		if($Action == 'create')
		{
			$respuesta = $Datos->GuardarOrden($ObjOrden); // carga el resultado de la funcion del modelo 


			session_start(); // inicia la sesion 

    		$_SESSION["SAM03CoOrd"]= $ObjOrden-> getOrderCode(); // el valor obtenido se almacena en la variable de sesion
			 $_SESSION['Action2']= 'ord'; // carga el nuevo valor de la sesion en la variable 
			header('Location: ../../Vista/RegisterView/Documento.php'); // incluye la vista 
		}
	}

 ?>