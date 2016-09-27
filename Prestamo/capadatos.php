<?php

 function ShowDocumentByDepartament($CodeDepartament)
  {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwDocDepar("'.$CodeDepartament.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
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