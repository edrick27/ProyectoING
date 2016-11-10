<?php
require_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class09_reg_lending.php");

class reg_lendingData_09//clase registro de prestasmo 
{
    private $objC;//variable de la clase 
    

  function reg_lendingData_09()//funcion para conectar con la base de datos.
    {
        $this->objC = new conexion();//se crea el objeto de la conexion
    }


    function Savelending($objlending)//funcion para guardar el de prestamo.
  {
    try
    {
    $DateLending = $objlending->getDateLending();//obtencion de la fecha del documento por medio de la variable
    $ReturnDate = $objlending->getReturnDate();//obtencion de la fecha de la solicitud por medio de la variable
    $IDUser = $objlending->getIDUser();//obtencion de la cedula de la persona por medio de la variable

     $conn =  $this->objC->ObtenerConexion();//se abre la conexion

     $Sentencia = $conn->prepare("CALL sp_samAddRegPres(?,?,?)");//se llama el procedimiento almacenado

     $Sentencia->bind_param('sss',$DateLending,$ReturnDate,$IDUser);//se pasan los parametros 

     $Sentencia->execute();// se ejecuta la sentencia

     $resultado = $Sentencia->get_result();// se obtine el resultado de la sentencia

     $r = $resultado->fetch_array(MYSQLI_NUM);// trae las respuestas de la base de datos

     $Sentencia->close();// se cierra la sentencia

     $this->objC->CerrarConexion();// se cierra la conexion 
     return $r[0];
   }
   catch(Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }
  }

  function MaxCodPres()// funcion para obtener el maximo numero de codigo
  {
    try
    {
     $conn =  $this->objC->ObtenerConexion();//se obtiene la conexion 

     $Sentencia = $conn->prepare("CALL Sp_samMaxCoRegPres09()");//se abre la sentencia y se llama el procedimiento

     $Sentencia->execute();// se ejecuta la sentencia

     $resultado = $Sentencia->get_result();// se obtine el resultado de la sentencia

     $r = $resultado->fetch_array(MYSQLI_NUM);// trae las respuestas de la base de datos

     $Sentencia->close();  //Cerramos la sentencia 
    
     $this->objC->CerrarConexion();// se cierra la conexion 
     return $r[0];
   }
   catch(Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }

  }

  
    function ConfirmLending($objlending)//funcion para confirmar el prestamo
    {
     try 
     { 
    $conn =  $this->objC->ObtenerConexion();//obtiene la conexion
      
    $CodeLending = $objlending;//compara el codigo de prestamo con el objeto.

    $r = "0";

    $Sentencia = $conn->prepare("CALL sp_samConfirmLending(?)");//se abre la sentencia y se llama el procedimiento

    $Sentencia->bind_param('s',$CodeLending);//se pasan los parametros 

    if ($Sentencia->execute()) 
    {
      $r = "1";
    };

    $Sentencia->close();//Cerramos la sentencia 

    $this->objC->CerrarConexion();// se cierra la conexion 

    return $r;
    }
    catch(Exception $e)
    {
      echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }

    }    


    function ReturnLending($objlending) //funcion para retornar el prestamo
    {
      try
      {
          $conn =  $this->objC->ObtenerConexion();//abre la conexion
            
          $CodeLending = $objlending;//compara el codigo del prestamo
          $r = "0";

          $Sentencia = $conn->prepare("CALL sp_samReturnLending(?)");//abre la sentencia y llama el procedimiento almacenado
          $Sentencia->bind_param('s',$CodeLending);//para los parametros
          if ($Sentencia->execute()) //ejecuta la sentencia 
          {
            $r = "1";
          };
          $Sentencia->close();//cierra la sentencia
          $this->objC->CerrarConexion();//cierra la conexion 

          return $r;
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
        $conn =  $this->objC->ObtenerConexion();// optiene la conexion y la abre

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samDocSoli1()';//llama el procedimiento almacenado

        $result = mysqli_query($conn, $sql) OR DIE ("Error de conexion"); 


      if ($result) 
      {
         $response = array();
  
         while ($row = mysqli_fetch_array($result))//recorre el array 
         {   
         $Lending = array();

         $Lending["SAM09CoPrest"] = $row["SAM09CoPrest"];
         $Lending["SAM09FePres"] = $row["SAM09FePres"]; 
         $Lending["SAM04DescpPart"] = $row["SAM04DescpPart"]; 
         $Lending["SAM05CedUsr"] = $row["SAM07CedUsr"]; 
         $Lending["SAM07NomPers"] = $row["SAM07NomPers"]; 
         $Lending["SAM13DesTip"] = $row["SAM13DesTip"];
         array_push($response, $Lending);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//se cierra la conexion 
        return $response;//retorna la respuesta
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
      }
    }

  function Lending_report($CodeLending)//funcion para el reporte del prestamo
  {
    try
    {
        $conn =  $this->objC->ObtenerConexion();//abre la conexion 

        $response = array();//codigo para mostrar datos

        $sql = 'CALL sp_samLeding_report("'.$CodeLending.'")';//llama el procedieminto almacenado

        $result = mysqli_query($conn, $sql);//obtine los resultados

      
      if (mysqli_num_rows($result) > 0) //recorre el array
      {

         while ($row = mysqli_fetch_array($result))
         {   
           $Lending = array();

           $Lending['sam04DescpPart'] = $row["sam04DescpPart"];
           $Lending["SAM09FePres"] = $row["SAM09FePres"]; 
           $Lending["SAM09FeDevo"] = $row["SAM09FeDevo"]; 
           $Lending["SAM09CoPrest"]  = $row["SAM09CoPrest"];
           $Lending["SAM07NomPers"] = $row["SAM07NomPers"]; 
           $Lending["SAM01CoDoc"] = $row["SAM01CoDoc"]; 
           $Lending["SAM02Descp"] = $row["SAM02Descp"]; 
           $Lending["SAM01FeExt"] = $row["SAM01FeExt"]; 
           $Lending["SAM03Ubic"] = $row["SAM03Ubic"]; 
           $Lending["SAM03CoOrd"] = $row["SAM03CoOrd"]; 
           array_push($response, $Lending);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//se cierra la conexion 
        return $response;
    }
    catch(Exception $e)
    {
      echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
    }
  }


  function CheckPerson($IdPerson) //funcion para verificar la persona
  {
    try
    {
     $conn =  $this->objC->ObtenerConexion(); //abre la conexion 

     $Sentencia = $conn->prepare("CALL sp_samCheckPerson(?)");//abre la sentencia y llama el procedimiento almacenado

     $Sentencia->bind_param('s',$IdPerson);//pasa los parametros

     $Sentencia->execute();//ejecuta la sentencia

     $resultado = $Sentencia->get_result();//obtiene los resultado
      
     $Sentencia->close();//cierra la sentencia

     $r = $resultado->fetch_array(MYSQLI_NUM);//trae las respuestas de la base de datos
    
     $this->objC->CerrarConexion();//se cierra la conexion 

     return $r[0];
   }
   catch(Exception $e)
   {
    echo 'no se pudo realizar la funcion:  '.$e->getMessage(); 
   }
  }

  function Notification()//funcion para mostrar la notificacion 
  {
    try
    {
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samNotificion()");//abre la sentencia y llama el procedimiento almacenado

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
}
?>