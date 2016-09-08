<?php

class Document  // Clase Documento
{


	 public $Cod_document; // Variable Codigo Documento
	 public $Cod_tipe;	   // Variable Codigo Tipo
	 public $Detail;       // Variable Detalle
	
	function __construct($Cod_document,$Cod_tipe,$Detail) // Constructor Parametros
	{

		$this->Cod_document= $Cod_document;
		$this->Cod_tipe= $Cod_tipe;
		$this->Detail= $Detail;
		
	}



 // Setter

public function setCod_document($Cod_document)
{
	$this->Cod_document= $Cod_document;
}

public function setCod_tipe($Cod_tipe)
{
	$this->Cod_tipe= $Cod_tipe;
}
public function setDetail($Detail)
{
	$this->Detail= $Detail;

}

// Getter

public function getCod_document()
{
	return $this->Cod_document;
}

public function getCod_tipe()
{
	return $this->Cod_tipe;
}

public function getDetail()
{
	return $this->Detail;
}



public function __destruct(){} // Constructor Vacio

}


?>