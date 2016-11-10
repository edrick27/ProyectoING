<?php
require_once("../../Modelo/RegisterData/DocumentData.php"); // requiere el modelo 
include_once("../../Modelo/Clases/class01_reg_document.php"); // requiere la clase 

      session_start(); // inicia la sesion 
      $Action = $_SESSION['Action']; // carga la variable con el valor de la sesion 
      session_destroy(); // destruye la sesion 

  $ObjDocumento = new Document_01(
      $_POST['txt_cod_doc'],
      $_POST['txt_orden'],
      $_POST['sel_tipoDoc'],
      $_POST['txt_des_doc'],
      $_POST['txt_nota'],
      $_POST['txt_contri'],
      $_POST['txt_ano'],
      $_POST['txt_fecha']
    ); // instancia de la clase con parametros 

    $Datos = new DocumentosDatos(); // instancia del modelo 

    if($Action == 'update') 
    {
      $respuesta = $Datos->ActualizarDoc($ObjDocumento); // carga el resultado de la funcion del modelo 
          header('Location: ../../Vista/RegisterView/reg_Document01.php');
    }
    else
    {
        if($Action == 'create')
        {
            $respuesta = $Datos->GuardarDocumentos($ObjDocumento); // carga el resultado de la funcion del modelo
            session_start(); // inicio de sesion 
            $_SESSION['Action2'] = 'ord'; // carga la varaible con el nuevo valor de la sesion 
            $_SESSION['SAM03CoOrd'] = $ObjDocumento-> getOrderCode(); // obtiene el valor en la variable de sesion 
            header('Location: ../../Vista/RegisterView/Documento.php'); // incluye la vista 
        }
    }
 ?>
