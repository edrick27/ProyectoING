<? php

class 14_Movetype // Clase Tipo Movimiento
{
	private $CodeTypeMove;     // Variable Codigo Tipo Movimiento
	private $DescriptionMove; // Variable Descripcion Movimiento

	public function __construct($CodeTypeMove, $DescriptionMove)
	{
		$this->Cod_Tip_Move= $Cod_Tip_Move;
		$this->DescriptionMove= $DescriptionMove;
	}


		//Setter
	public function setCodeTypeMove($Cod_Tip_Move){
		$this->Cod_Tip_Move= $Cod_Tip_Move;
	}

	public function setDescriptionMove($Des_Move){
		$this->Des_Move= $Des_Move;
	}

		//Getter

	public function getCodeTypeMove(){
		return $this->Cod_Tip_Move;
	}

	public function getDescriptionMove(){
		return $this->Des_Move;
	}


}


}
?>