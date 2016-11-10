
<?php

 class DocumentType_02  // Clase Tipo
{
	var $TypeCode; // Variable Codigo Tipo
	var $Description; // Variable Descripcion

public function __construct($TypeCode, $Description) // Constructor Parametros
	{
		$this->TypeCode = $TypeCode;
		$this->Description = $Description;
	}

  // Setter

	public function setTypeCode($TypeCode)
  {
		$this->TypeCode= $TypeCode;
	}
	public function setDescription($Description)
  {
		$this->Description= $Description;
	}

		//Getter

	public function getTypeCode()
  {
		return $this->TypeCode;
	}
	public function getDescription()
  {
		return $this->Description;
	}

public function __destruct(){} // Constructor Vacio


}

?>