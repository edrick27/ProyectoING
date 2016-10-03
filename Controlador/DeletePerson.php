<?php 
require_once("../Modelo/CapaDatos/PersonaDatos.php");

   $ObjPersona =  $_GET['cedulaLI'];

   $Datos = new PersonaDatos();

   $respuesta = $Datos->DeletePerson($ObjPersona);

   echo $respuesta;
?>