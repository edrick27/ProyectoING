<?php 
require_once("../../Modelo/PersonData/PersonaDatos.php");
require_once("../../Modelo/Clases/class07_reg_person.php");

          //Se inicia la sesion 
         session_start();
          $Action =  $_SESSION['Action'];
   //Se crea un objeto de la clase de persona, en orden por medio del post se envia los id de los campos de la vista de persona, donde vienen los valores que se quieren guardar o modificar
   $ObjPersona = new Person_07(
    $_POST['txt_cedula'],
    $_POST['txt_nombre'],
    $_POST['txt_pr_apellido'],
    $_POST['txt_se_apellido'],
    $_POST['txt_tele_ofi'],
    $_POST['txt_tele_perso'],
    $_POST['txt_correo'],
    $_POST['txt_contra'],
    $_POST['sel_tipoUsr'],
    $_POST['sel_departamento']
    );
   //Se crea el objeto de los datos de persona 
   $Datos = new PersonaDatos();

//Se crea una funcion de if donde depende de la accion se realiza un guardado o actualizacion
 if ($Action == 'update') 
 {
   $respuesta = $Datos->UpdatePerson($ObjPersona);
 }
 else
 {
    if ($Action == 'create') 
   {
      $respuesta = $Datos->CreatePerson($ObjPersona);
   }
 } 
   session_destroy();
    
   header('Location: ../../Vista/PersonView/GridPerson.php');
?>