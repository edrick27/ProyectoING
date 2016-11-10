<?php
require_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class09_reg_lending.php");
require_once("../../Modelo/Clases/class10_det_lending.php");

class reg_request_Data//clase registro de solicitud
{
    private $objC;//variable de la clase 
    

  function reg_request_Data()//funcion para conectar con la base de datos.
    {
        $this->objC = new conexion();//se crea el objeto de la conexion
    }

    function Saverequest($objlending)//funcion para guardar 
  {
    try
    {
    $DateLending = $objlending->getDateLending();//obtencion de la fecha de la solicitud por medio de la variable
    $IDUser = $objlending->getIDUser();//obtencion de la cedula del usuario por medio de la variable

     $conn =  $this->objC->ObtenerConexion();//se abre la conexion

     $Sentencia = $conn->prepare("CALL sp_samAddRegSoli(?,?)");//se llama el procedimiento

     $Sentencia->bind_param('ss',$DateLending,$IDUser);//se pasan los parametros

     $Sentencia->execute();// se ejecuta la sentencia

     $resultado = $Sentencia->get_result();// se obtine el resultado de la sentencia

     $r = $resultado->fetch_array(MYSQLI_NUM);// trae las respuestas de la base de datos

     $Sentencia->close();// se cierra la sentencia

     $this->objC->CerrarConexion();// se cierra la conexion
     return $r[0];
   }
   catch (Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }
  }
    
 function ShowRequestByPerson($IDUser)//funcion para mostrar los documentos por persona
 {
       try
       {
        $conn =  $this->objC->ObtenerConexion();//abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samShwDocPerson("'.$IDUser.'")';//llama el procedimiento almacenado

        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) //recorre el array par encontrar datos
      {

         while ($row = mysqli_fetch_array($result))//si hay datos los muestra 
         {   
           $Document = array();

           $Document['SAM01CoDoc'] = $row["SAM01CoDoc"];
           $Document["SAM01Conte"] = $row["SAM01Conte"]; 
           $Document["SAM01Contri"] = $row["SAM01Contri"]; 
           $Document["SAM01Anio"]  = $row["SAM01Anio"];
           $Document["SAM02Descp"] = $row["SAM02Descp"]; 
           array_push($response, $Document);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cierra la conexion 

        return $response;//respuesta
      }
      catch (Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
   }

  function detSaverequest($objlending)//funcion de guardar el detalle del documento
  {
  try
  {
    $CodeLending = $objlending->getCodeLending();//obtencion de codigo de la solicitud por medio de la variable
    $DocumentCode = $objlending->getDocumentCode();//obtencion del nombre de la solicitud por medio de la variable

     $conn =  $this->objC->ObtenerConexion();//se abre la conexion 

     $Sentencia = $conn->prepare("CALL sp_samAddDetPrest(?,?)");//abre la conexion y llama el procedimiento

     $Sentencia->bind_param('is',$CodeLending,$DocumentCode);//pasa los parametros

     $Sentencia->execute();//ejecuta la sentencia

     $resultado = $Sentencia->get_result();//obtiene los resultado

     $Sentencia->close();//cierra la sentencia
 
    
      $r = $resultado->fetch_array(MYSQLI_NUM);//trae las respuestas de la base de datos
    
     $this->objC->CerrarConexion();//se cierra la conexion 
     return $r[0];
   }
   catch (Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }

  }

    function Request_report($CodeRequest)//funcion de generar el reporte
  {
    try
    {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samSoliReport1("'.$CodeRequest.'")';//abre la conexion y llama el procedimiento

        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
           $Request = array();

           $Request["SAM07CedUsr"] = $row["SAM07CedUsr"]; 
           $Request["SAM07NomPers"] = $row["SAM07NomPers"]; 
           $Request["SAM09FePres"] = $row["SAM09FePres"]; 
           $Request["SAM09CoPrest"]  = $row["SAM09CoPrest"];
           $Request["SAM01CoDoc"] = $row["SAM01CoDoc"]; 
           $Request["SAM02Descp"] = $row["SAM02Descp"]; 

           array_push($response, $Request);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cerrar conexion 

        return $response;//retorna la respuesta
    }
    catch (Exception $e)
    {
      echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }
}