<?php
include_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class02_tip_document.php");

class tipodocument_02//clase modelo de datos de tipo de documentos 
{
 private $objC;//variable de la clase
    
	function tipodocument_02()//funcion para conectar con la base de datos.
    {
        $this->objC = new conexion();//se crea el objeto de la conexion
    }


   function SavetipDocument($objlending)//funcion para guardar el tipo de documento
  {


    $Description = $objlending->getDescription();//obtencion del nombre del tipo de documento por medio de la variable

    $conn =  $this->objC->ObtenerConexion();//abre la conexion 
     $Sentencia = $conn->prepare("CALL sp_samAddTipDoc(?)");//se abre la sentencia y llamamos el procedimiento de la base de datos

     $Sentencia->bind_param('s',$Description);//obtiene los parametos de la base de datos

     $Sentencia->execute();//ejecuta la sentencia

     $resultado = $Sentencia->get_result();///trae los resultados
 
     $r = $resultado->fetch_array(MYSQLI_NUM);//trae las respuestas de la base de datos

     $Sentencia->close();//cierra la sentencia

     $this->objC->CerrarConexion();//cierra la conexion 
     return $r[0];

  }

    function MaxCodTipDoc()//funcion para mostrar el ultimo codigo agregado
  {
     $conn =  $this->objC->ObtenerConexion();//abrimos la conexion

     $Sentencia = $conn->prepare("CALL Sp_samMaxTipDoc02()");//

     $Sentencia->execute();//se ejecuta la sentencia

     $resultado = $Sentencia->get_result();//obtiene la respuesta 
 
     $Sentencia->close();  //Cerramos la sentencia

        $r = $resultado->fetch_array(MYSQLI_NUM);//trae los resultados de la base de datos 

     $this->objC->CerrarConexion();// Cerramos la conexion
     return $r[0];
  }
  function showDocument()//funcion para mostrar los tipo de documentos
    {
        $conn =  $this->objC->ObtenerConexion();//abrimos la conexion 

        $response = array(); //codigo para mostrar datos

        $sql = 'CALL Sp_SamShwCatTipDoc()';//llamamos el procedimiento almacenado

        $result = mysqli_query($conn, $sql);//recorre las filas en busca de datos

      if (mysqli_num_rows($result) > 0) 
      {
         $typeDocument = array();
         while ($row = mysqli_fetch_array($result))// si encuentra datos los muestra 
         {   
         

         $typeDocument["code"] = $row["SAM02CoTipDoc"];//obtiene el codigo de la base de datos
         $typeDocument["description"] = $row["SAM02Descp"]; //obtiene el nombre de la base de datos
         array_push($response, $typeDocument);//obtiene la respuesta de la fila
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();// se cierra la conexion 
        return $response;//respuesta
    }

    function SearchTipDocByID($IdDoc)
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samSrhRegTipDoc("'.$IdDoc.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         { 

         $docTip = array();

         $docTip ['SAM02CoTipDoc']  = $row["SAM02CoTipDoc"];
         $docTip ['SAM02Descp'] = $row["SAM02Descp"]; 
         array_push($response, $docTip);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos
        $this->objC->CerrarConexion();
        return $response;
    }

    function UpdatetipDocument($objTipDoc)
    {
      $IdTipDoc = $objTipDoc->getTypeCode();
      $Descp = $objTipDoc->getDescription();

       $conn =  $this->objC->ObtenerConexion();

       $Sentencia = $conn->prepare("CALL sp_SamUpdTipDoc(?,?)");

       $Sentencia->bind_param('is',$IdTipDoc,$Descp);

       $Sentencia->execute();

       $resultado = $Sentencia->get_result();

        //$r = var_dump($resultado->fetch_assoc());
          $r = $resultado->fetch_array(MYSQLI_NUM);

          $this->objC->CerrarConexion();
          $Sentencia->close();


       return $r[0];
    }
 }
?>