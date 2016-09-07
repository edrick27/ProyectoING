<?php
class Reg_Person
{
   var $IDUser;//Codigo de la persona
   var $Name;//Nombre de la persona
   var $Surname1;//Primer apellido de la persona
   var $Surname2;//Segundo apellido de la persona
   var $OfficePhone;//Telefono de la oficina
   var $PersonalPhone;//Telefono personal
   var $Email;//Correo electronico
   var $Password; // Variable Contrasena
   var $Tipe_User; // Variable Tipo Usuario
   var $Department; // Variable Departamento

    //Constructor
  function __construct($ID,$Nam,$Sur1,$Sur2,$Offi,$Pers,$Email,$Password, $Tipe_User, $Department)
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
  public function setIDUser($User)
  {
    $this->IDUser = $User;
  }

  public function setName($Nam)
  {
    $this->Name = $Nam;
  }

  public function setSurname1($Sur1)
  {
    $this->Surname1 = $Sur1;
  }

  public function setSurname2($Sur2)
  {
    $this->Surname2 = $Sur2;
  }

  public function setOfficePhone($Offi)
  {
    $this->OfficePhone = $Offi;
  }

  public function setPersonalPhone($Per)
  {
    $this->PersonalPhone = $Per;
  }

  public function setEmail($Ema)
  {
    $this->Email = $Ema;
  }

  public function setPassword($Password){
    $this->Password= $Password;
  }

  public function setTipe_User($Tipe_User){
    $this->Tipe_User= $Tipe_User;
  }

  public function setDepartment($Department){
    $this->Department= $Department;
  }

//Getters
  public function getIDUser()
  {
    return $this->IDUser;
  }

  public function getName()
  {
    return $this->Name;
  }

  public function getSurname1()
  {
    return $this->Surname1;
  }

  public function getSurname2()
  {
    return $this->Surname2;
  }

  public function getOfficePhone()
  {
    return $this->OfficePhone;
  }

  public function getPersonalPhone()
  {
    return $this->PersonalPhone;
  }

  public function getEmail()
  {
    return $this->Email;
  }


  public function getPassword($Password){
    return $this->Password;
  }

  public function getTipe_User($Tipe_User){
    return $this->Tipe_User;
  }

  public function getDepartment($Department){
    return $this->Department;
  }
}

?>
