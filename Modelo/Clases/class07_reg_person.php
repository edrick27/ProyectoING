<?php
class Person_07
{
   Protected $IDUser;//Codigo de la persona
   Protected $Name;//Nombre de la persona
   Protected $Surname1;//Primer apellido de la persona
   Protected $Surname2;//Segundo apellido de la persona
   Protected $OfficePhone;//Telefono de la oficina
   Protected $PersonalPhone;//Telefono personal
   Protected $Email;//Correo electronico
   Protected $Password; // Variable Contrasena
   Protected $Tipe_User; // Variable Tipo Usuario
   Protected $Department; // Variable Departamento
//Constructor
  Public function __construct($ID,$Nam,$Sur1,$Sur2,$Offi,$Pers,$Email,$Password, $Tipe_User, $Department)
  {
    $this->IDUser = $ID;
    $this->Name = $Nam;
    $this->Surname1 = $Sur1;
    $this->Surname2 = $Sur2;
    $this->OfficePhone = $Offi;
    $this->PersonalPhone = $Pers;
    $this->Email = $Email;
    $this->Password= $Password;
    $this->Tipe_User= $Tipe_User;
    $this->Department= $Department;
  }

//Setter
  Public function setIDUser($User)
  {
    $this->IDUser = $User;
  }

  Public function setName($Nam)
  {
    $this->Name = $Nam;
  }

  Public function setSurname1($Sur1)
  {
    $this->Surname1 = $Sur1;
  }

  Public function setSurname2($Sur2)
  {
    $this->Surname2 = $Sur2;
  }

  Public function setOfficePhone($Offi)
  {
    $this->OfficePhone = $Offi;
  }

  Public function setPersonalPhone($Per)
  {
    $this->PersonalPhone = $Per;
  }

  Public function setEmail($Ema)
  {
    $this->Email = $Ema;
  }

  public function setPassword($Password)
  {
    $this->Password= $Password;
  }

  public function setTipe_User($Tipe_User)
  {
    $this->Tipe_User= $Tipe_User;
  }

  public function setDepartment($Department)
  {
    $this->Department= $Department;
  }

//Getters
  Public function getIDUser()
  {
    return $this->IDUser;
  }

  Public function getName()
  {
    return $this->Name;
  }

  Public function getSurname1()
  {
    return $this->Surname1;
  }

  Public function getSurname2()
  {
    return $this->Surname2;
  }

  Public function getOfficePhone()
  {
    return $this->OfficePhone;
  }

  Public function getPersonalPhone()
  {
    return $this->PersonalPhone;
  }

  Public function getEmail()
  {
    return $this->Email;
  }

  public function getPassword()
  {
    return $this->Password;
  }

  public function getTipe_User()
  {
    return $this->Tipe_User;
  }

  public function getDepartment()
  {
    return $this->Department;
  }
}

?>
