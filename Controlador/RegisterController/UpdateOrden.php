<?php 
include('../../Modelo/RegisterData/OrdenDatos.php'); // requiere el modelo 

	 $ObjOrden =  $_GET['ID']; // obtiene el valor de la variable 

   $Datos = new OrdenDatos(); // instancia del modelo 

   $respuesta = $Datos->SearchOrderByID($ObjOrden); // carga el resultado de la funcion del modelo

   session_start(); // inicia la sesion 

    foreach ($respuesta as $Valor) // recorre los campos mediante el valor 
    {
        $_SESSION['SAM03CoOrd'] =  $Valor['SAM03CoOrd'];
        $_SESSION['SAM03Ubic'] =  $Valor['SAM03Ubic'];
        $_SESSION['SAM04CoDepart'] =  $Valor['SAM04CoDepart'];
        $_SESSION['SAM03AnioTrans'] =  $Valor['SAM03AnioTrans'];
        $_SESSION['SAM03FeExt'] =  $Valor['SAM03FeExt'];
        $_SESSION['SAM05CedUsr'] =  $Valor['SAM05CedUsr'];
    }

   header('Location: ../../Vista/RegisterView/Orden.php');	// incluye la vista 
 ?>