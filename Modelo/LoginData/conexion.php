<?php

class conexion//clase para conexion a la base de datos
{
	function conectar(){
		return mysqli_connect("localhost","root","s1st3m4SAM");
	}
}

?>