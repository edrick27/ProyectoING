<?php

class Persona
{

  var $Nombre;
  var $Apellido1;
  var $Apellido2;
  var $correo;


  function persona(){}

  function constructorPersona($Nombre,$Apellido1,$Apellido2,$correo)
  {
    $this->Nombre = $Nombre;
    $this->Apellido1 = $Apellido1;
    $this->Apellido2 = $Apellido2;
    $this->correo = $correo;
  }

  function setNombre($Nombre)
  {
    $this->Nombre = $Nombre;
  }
  function getNombre()
  {
    return $this->Nombre;
  }

  function setApellido1($Apellido1)
  {
    $this->Apellido1 = $Apellido1;
  }
  function getApellido1()
  {
    return $this->Apellido1;
  }

  function setApellido2($Apellido2)
  {
    $this->Apellido2 = $Apellido2;
  }
  function getApellido2()
  {
    return $this->Apellido2;
  }

  function setCorreo($Correo)
  {
    $this->Correo = $Correo;
  }
  function getCorreo()
  {
    return $this->Correo;
  }  
}

?>