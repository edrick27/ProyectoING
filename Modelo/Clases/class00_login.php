<?php
	class class00_login
	{
	    public $IDUser;  // Variable Cedula Usuario
	    
	    function get_IDUser()
	    {
	        return $this->IDUser;
	    }
	    
	    function set_IDUser($IDUser)
	    {
	        $this->IDUser = $IDUser;
	    }
		public $Password; // Variable Contrasena
	    
	    function get_Password()
	    {
	        return $this->Password;
	    }
	    
	    function set_Password($Password)
	    {
	        $this->Password = $Password;
	    }
		public $TypeUser; // Variable de tipo usuario
	    
	    function get_TypeUser()
	    {
	        return $this->TypeUser;
	    }
	    
	    function set_TypeUser($TypeUser)
	    {
	        $this->TypeUser = $TypeUser;
	    } 
	}
?>