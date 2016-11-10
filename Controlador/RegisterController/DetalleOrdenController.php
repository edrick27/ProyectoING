<?php
require_once("../../Modelo/RegisterData/DocumentData.php"); // requiere el modelo 

	  $ObjOrden = $_GET['Codigo']; // obtiene el codigo y lo carga en la variable 

      $ObjDoc = new DocumentosDatos(); // crea instancia del modelo 

      session_start(); // inicia la sesion 
      
      $Resultado = $ObjDoc->ShowDocumentByOrder($ObjOrden); // carga en la variable el resultado de la funcion del modelo 
      $_SESSION['tabla'] = $Resultado; // carga en la sesion el resultado obtenido 

	 header('Location: ../../Vista/RegisterView/DetalleOrden.php'); // incluya la vista 
?>