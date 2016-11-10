<?php
class Order_03
{
   protected $OrderCode;//Codigo de la orden
   protected $Ubication;//Ubicacion
   protected $DepartmentCode;//Codigo de departamento
   protected $TransferYear;//Año de transferencia
   protected $EndDate;//Fecha extrema
   protected $IDUser;//Codigo de usuario

  function __construct($Code,$Ubic,$CDepa,$TrsYear,$End,$Usr) // constructor parametros
  {
    $this->OrderCode = $Code;
    $this->Ubication = $Ubic;
    $this->DepartmentCode = $CDepa;
    $this->TransferYear = $TrsYear;
    $this->EndDate = $End;
    $this->IDUser = $Usr;
  }

//Setter
  public function setOrderCode($Order)
  {
    $this->OrderCode = $Order;
  }

  public function setUbication($Ubica)
  {
    $this->Ubication = $Ubica;
  }

  public function setDepartmentCode($CDepart)
  {
    $this->DepartmentCode = $CDepart;
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
  public function getOrderCode()
  {
    return $this->OrderCode;
  }

  public function getUbication()
  {
    return $this->Ubication;
  }

  public function getDepartmentCode()
  {
    return $this->DepartmentCode;
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
