<?php
class Reg_Order
{
   var $CodeOrder;//Codigo de la orden
   var $Ubication;//Ubicacion
   var $CodeDepartment;//Codigo de departamento
   var $TransferYear;//Año de transferencia
   var $EndDate;//Fecha extrema
   var $IDUser;//Codigo de usuario

  function __construct($Code,$Ubic,$CDepa,$TrsYear,$End,$Usr)
  {
    $this->CodeOrder = $Code;
    $this->Ubication = $Ubic;
    $this->CodeDepartment = $CDepa;
    $this->TransferYear = $TrsYear;
    $this->EndDate = $End;
    $this->IDUser = $Usr;
  }

//Setter
  public function setCodeOrder($Order)
  {
    $this->CodeOrder = $Order;
  }

  public function setUbication($Ubica)
  {
    $this->Ubication = $Ubica;
  }

  public function setCodeDepartment($CDepart)
  {
    $this->CodeDepartment = $CDepart;
  }

  public function setTransferYear($Year)
  {
    $this->TransferYear = $Year;
  }

  public function setEndDate($Date)
  {
    $this->EndDate = $Date;
  }

  public function setIDUser($ID)
  {
    $this->IDUser = $ID;
  }

//Getters
  public function getCodeOrder()
  {
    return $this->CodeOrder;
  }

  public function getUbication()
  {
    return $this->Ubication;
  }

  public function getCodeDepartment()
  {
    return $this->CodeDepartment;
  }

  public function getTransferYear()
  {
    return $this->TransferYear;
  }

  public function getEndDate()
  {
    return $this->EndDate;
  }

  public function getIDUser()
  {
    return $this->IDUser;
  }
}

?>
