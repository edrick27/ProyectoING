<?php

 class DetailLending_10
 {
	//Variables de la clase de movimiento del documento.
 	protected $DetailCode;//Codigo del detalle
 	protected $CodeLending;//Codigo de prestamo
 	protected $DocumentCode;//Codigo de documento


 	//Constructor de la clase
 public function __construct($Detail,$Lending,$Document)
 	{
 		$this->CodeDetail = $Detail;
 		$this->CodeLending = $Lending;
 		$this->DocumentCode = $Document;
 	}


 	//Funciones publicas de Setter.
 	public function setCodeDetail($Detail)
 	{
 		$this->CodeDetail = $Detail;
 	}

 	public function setCodeLending($Lending)
 	{
 		$this->CodeLending = $Lending;
 	}

 	public function setDocumentCode($Document)
 	{
 		$this->DocumentCode = $Document;
 	}

 	//Funciones publicas de Getter.
 	public  function getCodeDetail()
 	{
 		return $this->CodeDetail;
 	}

 	public  function getCodeLending()
 	{
 		return $this->CodeLending;
 	}

 	public function getDocumentCode()
 	{
 		return $this->DocumentCode;
 	}
 }
 ?>
