<?php
	class Document_01  // Clase Documento
	{
		 protected $DocumentCode; // Variable Codigo Documento
		 protected $OrderCode;	   // Variable Codigo de la orden
		 protected $TypeCode;  // Variable de tipo de Documento
		 protected $Content; //Contenido
		 protected $Note; //Nota
		 protected $Contributor; //Contribuyente
		 protected $Year; //Año
		 protected $EndDate; //Fecha extrema

		function __construct($CDocu,$Order,$DocuTC,$Cont,$Not,$Contri,$Year,$End) // Constructor Parametros
		{
			$this->DocumentCode= $CDocu;
			$this->OrderCode= $Order;
			$this->TypeCode= $DocuTC;
			$this->Content= $Cont;
			$this->Note= $Not;
			$this->Contributor= $Contri;
			$this->Year= $Year;
			$this->EndDate= $End;
		}

		 // Setter
		public function setDocumentCode($Cod)
		{
			$this->DocumentCode= $Cod;
		}

		public function setOrderCode($Ord)
		{
			$this->OrderCode= $Ord;
		}

		public function setTypeCode($DoTi)
		{
			$this->TypeCode= $Doti;
		}

		public function setContent($Cont)
		{
			$this->Content= $Cont;
		}

		public function setNote($Note)
		{
			$this->Note= $Note;
		}

		public function setContributor($Ctb)
		{
			$this->Contributor= $Ctb;
		}

		public function setYear($Year)
		{
			$this->Year= $Year;
		}

		public function setEndDate($End)
		{
			$this->EndDate= $End;
		}
		// Getter

		public function getDocumentCode()
		{
			return $this->DocumentCode;
		}

		public function getOrderCode()
		{
			return $this->OrderCode;
		}

		public function getTypeCode()
		{
			return $this->TypeCode;
		}

		public function getContent()
		{
			return $this->Content;
		}

		public function getNote()
		{
			return $this->Note;
		}

		public function getContributor()
		{
			return $this->Contributor;
		}

		public function getYear()
		{
			return $this->Year;
		}

		public function getEndDate()
		{
			return $this->EndDate;
		}

		public function __destruct() // Constructor Vacio
		{
			
		} 
	}
?>
