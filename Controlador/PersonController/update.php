<?php 
require_once("../../Modelo/PersonData/PersonaDatos.php");

//Se crea una variable con la cedula de la persona a modificar
   $ObjPersona =  $_GET['ID'];
//Se crea una instanciacion del modelo de datos de la persona
   $Datos = new PersonaDatos();
//Se crea una variable donde se busca a la persona por la cedula
   $respuesta = $Datos->SearchPersonByID($ObjPersona);
//Se inicia la sesion 
   session_start();
//Se recorre la respuesta obtenida y se almacena en una variable de sesion
    foreach ($respuesta as $Valor)
    {
        $_SESSION['SAM07CedUsr'] =  $Valor['SAM07CedUsr'];
        $_SESSION['SAM07NomPers'] =  $Valor['SAM07NomPers'];
        $_SESSION['SAM07ApePers1'] =  $Valor['SAM07ApePers1'];
        $_SESSION['SAM07ApePers2'] =  $Valor['SAM07ApePers2'];
        $_SESSION['SAM07CorrPers'] =  $Valor['SAM07CorrPers'];
        $_SESSION['SAM07TelefOfi'] =  $Valor['SAM07TelefOfi'];
        $_SESSION['SAM07TelefPers'] =  $Valor['SAM07TelefPers'];
        $_SESSION['SAM07CorrPers'] =  $Valor['SAM07CorrPers'];
        $_SESSION['SAM05Contra'] =  $Valor['SAM05Contra'];
        $_SESSION['SAM06CoTipUsr'] =  $Valor['SAM06CoTipUsr'];
        $_SESSION['SAM04CoDepart'] =  $Valor['SAM04CoDepart'];

    }

   header('Location: ../../Vista/PersonView/persona.php');
?>