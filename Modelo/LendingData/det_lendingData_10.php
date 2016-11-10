<?php
require_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class09_reg_lending.php");

class det_lendingData_10// Clase detalle de prestamo
{
    private $objC; //variable de la clase 
    

	function det_lendingData_10() //funcion para conectar con la base de datos.
    { 
        $this->objC = new conexion();//se crea el objeto de la conexion
    }


    function Savelending($objlending)//funcion para guardar el prestamo 
  {
    try
    {
    $CodeLending = $objlending->getCodeLending();//obtencion del codigo del documento por medio de la variable
    $DocumentCode = $objlending->getDocumentCode();//obtencion del nombre del documento por medio de la variable
    $conn =  $this->objC->ObtenerConexion();//Abrimos la conexion
   
    $Sentencia = $conn->prepare("CALL sp_samAddDetPrest(?,?)"); //se abre la sentencia y llamamos el procedimiento de la base de datos
   
    $Sentencia->bind_param('is',$CodeLending,$DocumentCode); //obtiene los parametos de la base de datos
 
    $Sentencia->execute();   //se ejecuta la sentencia 
  
    $resultado = $Sentencia->get_result();  //obtiene la sentencia 
  
    $Sentencia->close();  //Cerramos la sentencia 
 
    $r = $resultado->fetch_array(MYSQLI_NUM);   //trae los resultados 
  
    $this->objC->CerrarConexion();  //se cierra la conexion 
     return $r[0];
    }
    catch(Exception $e)
    {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }

    function MaxCodDetPres()//funcion para obtener el ultimo numero del prestamo.
  {
    try
    {
         $conn =  $this->objC->ObtenerConexion(); //se abre la conexion

         $Sentencia = $conn->prepare("CALL sp_samMaxCoDetPres10()"); //se abre la sentencia y llamamos el procedimiento de la base de datos

         $Sentencia->execute();//se ejecuta la sentencia 

         $resultado = $Sentencia->get_result(); //obtiene el resultado de la sentencia 
     
         $Sentencia->close();  //Cerramos la sentencia

         $r = $resultado->fetch_array(MYSQLI_NUM);//trae los resultados de la base de datos 
         
        $this->objC->CerrarConexion();// Cerramos la conexion 
         return $r[0];
    }
    catch(Exception $e)
    {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }


    function DeleteLending($objlending)//funcion para eliminar los prestamos
    {
      try{
    $conn =  $this->objC->ObtenerConexion(); //se abre la conexion
      
    $CodeDetail = $objlending->getCodeDetail();//obtencion del codigo del documento por medio de la variable

    $Sentencia = $conn->prepare("CALL sp_samDelRegPrest(?)");//se llama el procedimiento almacenado

    $Sentencia->bind_param('s',$CodeDetail);// se pasa los parametros 

    $Sentencia->execute();//se ejecuta la sentencia 

    $Sentencia->close(); //Cerramos la sentencia

    $this->objC->CerrarConexion();// Cerramos la conexion 
      } 
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
    }    

    function ShowLending()//funcion para mostrar los prestamos
    {
       try 
       {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion
            
        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samShwDetPrest()';//llamamos el procedimiento almacenado

        $result = mysqli_query($conn, $sql);// devuelve el resultado 

          if (mysqli_num_rows($result) > 0) //recorre las filas en busca de datos
          {

             while ($row = mysqli_fetch_array($result))// si encuentra datos los muestra
             {   
             $Lending = array();

             $Lending["SAM10CoDet"] = $row["SAM10CoDet"]; //obtiene el codigo de la base de datos

             $Lending["SAM09CoPrest"] = $row["SAM09CoPrest"]; //obtiene el codigo del prestamo de la base de datos
             $Lending["SAM01CoDoc"] = $row["SAM01CoDoc"]; //obtiene el nombre del prestamos de la base de datos
             array_push($response, $Lending);
             }
                   
          }
          else
          {
            echo "no hay resultados";// respuesta que no hay resltados
          }
            //fin del codigo para mostrar Datos


            $this->objC->CerrarConexion();// se cierra la conexion
            return $response;//retorna la respuesta
       } 
       catch (Exception $e) 
       {
           echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
       }
   
    }


}
?>