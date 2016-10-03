<?php

 function Lending_report($CodeLending)
  {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_SamLeding_report("'.$CodeLending.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
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


        $this->objC->CerrarConexion();
        return $response;
  }



 function CheckPerson($IdPerson)
  {
        $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL Sp_samCheckPerson(?)");

     $Sentencia->bind_param('s',$IdPerson);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
     $r = $resultado->fetch_array(MYSQLI_NUM);
     
     return $r[0];
  }

    function ShowDocumentByOrder($codeDepartament)
    {
        $conn =  $this->objC->ObtenerConexion();
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwDocumentByOrder("'.$codeDepartament.'"")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $Document = array();

         $Document["SAM01CoDoc"] = $row["SAM01CoDoc"];
         $Document["SAM04DescpPlart"] = $row["SAM04DescpPart"]; 
         $Document["SAM03CoOrd"] = $row["SAM03CoOrd"]; 
         $Document["SAM03Ubic"] = $row["SAM03Ubic"]; 
         $Document["SAM02Descp"] = $row["SAM02Descp"]; 
         $Document["SAM01Conte"] = $row["SAM01Conte"]; 
         $Document["SAM01Note"] = $row["SAM01Note"]; 
         $Document["SAM01Contri"] = $row["SAM01Contri"];
         $Document["SAM01Anio"] = $row["SAM01Anio"];
          $Document["SAM01FeExt"] = $row["SAM01FeExt"];

         array_push($response, $Document);
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos

          
        $this->objC->CerrarConexion();
        // cierre de la conexion
        return $response;
    }
