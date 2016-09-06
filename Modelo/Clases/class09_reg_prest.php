<?php
class 09_Lending
{
   var $CodeLending;//Codigo Prestamo
   var $DateLending;//Fecha de Prestamo
   var $ReturnDate;//Fecha de devolucion
   var $IDUser;//Codigo de usuario

//Constructor
  function __construct($CodeLending,$DateLending,$ReturnDate,$IDUser)
  {
    $this->CodeLending = $CodeLending;
    $this->DateLending = $DateLending;
    $this->ReturnDate = $ReturnDate;
    $this->IDUser = $IDUser;
  }

//Setters
  public function setCodeLending($CodeLending)
  {
    $this->CodeLending = $CodeLending;
  }

  public function setDateLending($DateLending)
  {
    $this->DateLending = $DateLending;
  }

  public function setReturnDate($ReturnDate)
  {
    $this->ReturnDate = $ReturnDate;
  }

  public function setIDUser($IDUser)
  {
    $this->IDUser = $IDUser;
  }

//Getters
  public function getCodeLending()
  {
    return $this->CodeLending;
  }

  public function getDateLending()
  {
    return $this->DateLending;
  }

  public function getReturnDate()
  {
    return $this->ReturnDate;
  }

  public function getIDUser()
  {
    return $this->IDUser;
  }
}

?>