<?php
class catDepartment_04
{
   var $DepartmentCode;//Codigo del departamento
   var $Description;//Descripcion

//Constructor
  function __construct($DepartmentCode,$Description)
  {
    $this->DepartmentCode = $DepartmentCode;
    $this->Description = $Description;
  }

//Setters
  public function setDepartmentCode($DepartmentCode)
  {
    $this->DepartmentCode = $DepartmentCode;
  }

  public function setDescription($Description)
  {
    $this->Description = $Description;
  }

//Getters
  public function getDepartmentCode()
  {
    return $this->DepartmentCode;
  }

  public function getDescription()
  {
    return $this->Description;
  }
}

?>
