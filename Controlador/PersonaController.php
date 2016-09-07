<?php 

include_once("../Modelo/CapaDatos/PersonaDatos.php");
include_once("../Modelo/Clases/class_reg_person.php");



   $ObjPersona = new Reg_Person();
   $Datos = new PersonaDatos();



   $ObjPersona->setIDUser($_POST['txt_cedula']);
   $ObjPersona->setName($_POST['txt_nombre']);
   $ObjPersona->setSurname1($_POST['txt_pr_apellido']);
   $ObjPersona->setSurname2($_POST['txt_se_apellido']);
   $ObjPersona->setOfficePhone($_POST['txt_tele_ofi']);
   $ObjPersona->setPersonalPhone($_POST['txt_tele_perso']);
   $ObjPersona->setEmail($_POST['txt_correo']);
   $ObjPersona->setPassword($_POST['txt_contra']); 
   $ObjPersona->setTipe_User($_POST['sel_tipoUsr']);
   $ObjPersona->setDepartment($_POST['sel_departamento']); 

  $respuesta = $Datos->PruebaGuardarP($ObjPersona);
    

     echo '<script language="javascript">alert("'.$respuesta.'");</script>'; 

?>