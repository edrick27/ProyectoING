<?php 
require_once("../../Modelo/PersonData/PersonaDatos.php");

//Se inicializa un objeto que va almacenar la cedula de personas
   $ObjPersona =  $_GET['cedulaLI'];
// Se instancia del modelo de datos de personas
   $Datos = new PersonaDatos();
//Se llama la funcion de eliminar y se manda el objeto con la cedula
   $respuesta = $Datos->DeletePerson($ObjPersona);
   echo $respuesta;
?>