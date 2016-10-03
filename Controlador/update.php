<?php 
require_once("../Modelo/CapaDatos/PersonaDatos.php");



   $ObjPersona =  $_GET['ID'];

   $Datos = new PersonaDatos();

   $respuesta = $Datos->SearchPersonByID($ObjPersona);

   session_start();

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

   header('Location: ../Vista/persona.php');
?>