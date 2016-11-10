<?php

include "../../Modelo/LoginData/usuariosDatos.php";

class usuariosControlador{
      function validar($usuario,$pass)
      {
        $obj = new usuariosDatos();
		    return $obj->validarUsuarios($usuario,$pass);
      }
}

?>