<?php
class 04_Department
{
   var $CodeDepartment;//Codigo del departamento
   var $Description;//Descripcion

//Constructor
  function __construct($CodeDepartment,$Description)
  {
    $this->CodeDepartment = $CodeDepartment;
    $this->Description = $Description;
  }

//Setters
  public function setCodeDepartment($CodeDepartment)
  {
    $this->CodeDepartment = $CodeDepartment;
  }

  public function setDescription($Description)
  {
    $this->Description = $Description;
  }

//Getters
  public function getCodeDepartment()
  {
    return $this->CodeDepartment;
  }

  public function getDescription()
  {
    return $this->Description;
  }
}

?>