<?php

 class DetailLending_10
 {
	//Variables de la clase de movimiento del documento.
 	protected $CodeDetail;//Codigo del detalle 
 	protected $CodeLending;//Codigo de prestamo
 	protected $CodeDocument;//Codigo de documento


 	//Constructor de la clase
 protected function __construct($Detail,$Lending,$Document)
 	{
 		$this->CodeDetail = $Detail;
 		$this->CodeLending = $Lending;
 		$this->CodeDocument = $Document;
 	}


 	//Funciones publicas de Setter.
 	protected function setCodeDetail($Detail)
 	{
 		$this->CodeDetail = $Detail;
 	}

 	protected function setCodeLending($Lending)
 	{
 		$this->CodeLending = $Lending;
 	}

 	protected function setCodeDocument($Document)
 	{
 		$this->CodeDocument = $Document;
 	}


 	//Funciones publicas de Getter. 
 	protected  function getCodeDetail()
 	{
 		return $this->CodeDetail;
 	}

 	protected  function getCodeLending()
 	{
 		return $this->CodeLending;
 	}

 	protected function getCodeDocument()
 	{
 		return $this->CodeDocument;
 	}
 } 
 ?>