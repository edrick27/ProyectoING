<? php

class RegisterUser_05  // Clase Registro Usuarios 
{

	protected $Id_User;  // Variable Cedula Usuario
	protected $Password; // Variable Contrasena
	protected $Tipe_User; // Variable Tipo Usuario
    protected $Department; // Variable Departamento
	
	protected function __construct($Id_User, $Password, $Tipe_User, $Department) // Constructor Parametros
	{
		$this->Id_User= $Id_User;
		$this->Password= $Password;
		$this->Tipe_User= $Tipe_User;
		$this->Department= $Department;
	}
 	
 	// Setter

 	protected function setId_User($Id_User){
 		$this->Id_User= $Id_User;
 	}

 	protected function setPassword($Password){
 		$this->Password= $Password;
 	}

 	protected function setTipe_User($Tipe_User){
 		$this->Tipe_User= $Tipe_User;
 	}

 	protected function setDepartment($Department){
 		$this->Department= $Department;
 	}


 	// Getter

 	protected function getId_User(){
 		return $this->Id_User;
 	}

 	protected function getPassword($Password){
 		return $this->Password;
 	}

 	protected function getTipe_User($Tipe_User){
 		return $this->Tipe_User;
 	}

 	protected function getDepartment($Department){
 		return this->Department;
 	}


protected function __destruct(){} // Constructor Vacio

?>