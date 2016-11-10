<?php
    
   require_once("../../Modelo/Clases/class00_login.php");
   require_once("../../Modelo/ClassConexion.php");

    class usuariosDatos 
    {
        private $objC;


    	public function __construct()
        {
           //  $usuarios = new usuarios();
        }

        function validarUsuarios($usuario,$pass)
        {
            try
            {
                $this->objC = new conexion();
                $con =  $this->objC->ObtenerConexion();
    		
    		/*$usuarios = new usuarios();
    		$usuarios->IDUser=$usuario;
    		$usuarios->Password = $pass;*/  

                $sql = 'CALL sp_samLogin('.$usuario.','.$pass.')';

                $consulta = mysqli_query($con,$sql);

                $response = array();    
 

                while ($fila = mysqli_fetch_array($consulta))
                    {   
                        $usuario = array();

                        $usuario['id']    = $fila["SAM05CedUsr"];
                        $usuario["pass"]   = $fila["SAM05Contra"]; 
                        $usuario["privilegio"]  = $fila["SAM06CoTipUsr"];
                        $usuario["nombre"]  = $fila["SAM07NomPers"]; 
          
                        array_push($response, $usuario);
                    }
                        return $response;
            }
            catch(Exception $e)
            {
                echo 'no se pudo realizar la funcion'.$e->getMessage();
            }
        }
    }
?>