<?php 
require_once("../Modelo/CapaDatos/PersonaDatos.php");
require_once("../Modelo/Clases/class07_reg_person.php");

          
           session_start();
          $Action =  $_SESSION['Action'];

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
   $Datos = new PersonaDatos();


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
    
   //  alert("'.$respuesta.'");
  // echo '<script language="javascript">alert("'.$respuesta.'"); </script>';
  // .'<META HTTP-EQUIV="refresh" content="1;URL=../Vista/persona.php">'; 
   
  //// echo '<script language="javascript">document.getElementById("respuesta").innerHTML='.$respuesta.'</script>';

   header('Location: ../Vista/GridPerson.php');
?>