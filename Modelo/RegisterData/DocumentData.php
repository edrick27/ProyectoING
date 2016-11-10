<?php
require_once("../../Modelo/ClassConexion.php"); // requiere de la conexion 
require_once("../../Modelo/Clases/class01_reg_document.php"); // requiere la clase 

class DocumentosDatos
{
    private $objC; // variable de la clase 


	function DocumentosDatos()
    {
        $this->objC = new conexion(); // instancia de la conexion
    }

  function GuardarDocumentos($objDocument)
    {
      try
      {
        $CodeDocument = $objDocument->getDocumentCode(); // obtencion del codigo mediante el get de la variable
        $OrderCode = $objDocument->getOrderCode(); // obtencion del codigo mediante el get de la variable
        $TypeCode = $objDocument->getTypeCode(); // obtencion del codigo mediante el get de la variable
        $Conten = $objDocument->getContent(); // obtencion del codigo mediante el get de la variable
        $Note = $objDocument->getNote(); // obtencion del codigo mediante el get de la variable
        $Contri = $objDocument->getContributor(); // obtencion del codigo mediante el get de la variable
        $Year = $objDocument->getYear(); // obtencion del codigo mediante el get de la variable
        $EndDate = $objDocument->getEndDate(); // obtencion del codigo mediante el get de la variable

         $conn =  $this->objC->ObtenerConexion(); // obtiene la conexion 

         $Sentencia = $conn->prepare("CALL sp_samAddRegDoc(?,?,?,?,?,?,?,?)"); //  llama el procedimeinto almacenado junto a sus variables 

         $Sentencia->bind_param('ssisssss',$CodeDocument,$OrderCode,$TypeCode,$Conten,$Note,$Contri,$Year,$EndDate); // referencia las variables que se obtienen de la base de datos 

         $Sentencia->execute(); // ejecuta lo obtenido 

         $resultado = $Sentencia->get_result(); // almacena y obtiene el resultado 

          //$r = var_dump($resultado->fetch_assoc());
         $r = $resultado->fetch_array(MYSQLI_NUM); // guarda el valor en un array segun su valor 

         $this->objC->CerrarConexion(); // cerrar la conexion
         $Sentencia->close(); // cierre de sentencia
         return $r[0]; // retorna el valor obtenido de la funcion 
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }

  function ActualizarDoc($objDocument)
    {
      try
      {
        $CodeDocument = $objDocument->getDocumentCode();
        $TypeCode = $objDocument->getTypeCode();
        $Conten = $objDocument->getContent();
        $Note = $objDocument->getNote();
        $Contri = $objDocument->getContributor();
        $Year = $objDocument->getYear();
        $EndDate = $objDocument->getEndDate();

         $conn =  $this->objC->ObtenerConexion();

         $Sentencia = $conn->prepare("CALL sp_samUpdDoc(?,?,?,?,?,?,?)");

         $Sentencia->bind_param('sisssss',$CodeDocument,$TypeCode,$Conten,$Note,$Contri,$Year,$EndDate);

         $Sentencia->execute();

         $resultado = $Sentencia->get_result();

          //$r = var_dump($resultado->fetch_assoc());
         $r = $resultado->fetch_array(MYSQLI_NUM);

         $this->objC->CerrarConexion();
         $Sentencia->close();
         return $r[0];
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }

  function ListarDocumento()
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion(); // obtiene la conexion por una instancia 
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwRegDoc()';
           //llama el procedimeinto almacenado 
        $result = mysqli_query($conn, $sql); 

           //enlaza el resltado obtenido
        if (mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_array($result)) // compara los resultado para ejecutar una condicion 
              {
                $Document = array(); // guarda los datos del array en la variable 

                $Document["SAM01CoDoc"] = $row["SAM01CoDoc"]; // compara e iguala los datos del array con la bd
                $Document["SAM03CoOrd"] = $row["SAM03CoOrd"];
                $Document["SAM02CoTipDoc"] = $row["SAM02CoTipDoc"];
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
              $this->objC->CerrarConexion(); // cierra la conexion 
              return $response; 
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }

  function ShowDocumentByDepartament($CodeDepartament)
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwDocDepar("'.$CodeDepartament.'")';
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
      catch(Exception $e)
      {
         echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
   }

  function ShowDocumentByOrder($codeDepartament)
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samShwDocumentByOrder("'.$codeDepartament.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
        if (mysqli_num_rows($result) > 0) 
          {
            while ($row = mysqli_fetch_array($result))
              {   
                $Document = array();
                $Document["SAM01CoDoc"] = $row["SAM01CoDoc"];
                $Document["SAM04DescpPart"] = $row["SAM04DescpPart"]; 
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
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }

  function DeleteDoc($objDoc)
    {
      try
      {
        $conn = $this->objC->ObtenerConexion(); // obtiene la conexion

        $Sentencia = $conn->prepare("CALL sp_samDelRegDoc(?)"); // llamada del procediemiento almacenado
        $Sentencia->bind_param('s',$objDoc); // obiene los parametro de la base de datos 
        $Sentencia->execute(); // ejecuta la sentencia

        $resultado = $Sentencia->get_result(); // obtiene el resulta obtenido 

        $r = $resultado->fetch_array(MYSQLI_NUM); // carga el valor del array y el valor obtenido 

        $this->objC->CerrarConexion(); // cierra conexion 
        $Sentencia->close(); // cierra sentencia 

        return $r[0];
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }

  function SearchDocByID($IdDoc)
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samSrhRegDoc("'.$IdDoc.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
          {
            while ($row = mysqli_fetch_array($result))
              {   
                $doc = array();
                $doc ['SAM01CoDoc']  = $row["SAM01CoDoc"];
                $doc ['SAM03CoOrd'] = $row["SAM03CoOrd"]; 
                $doc ['SAM02CoTipDoc'] = $row["SAM02CoTipDoc"];
                $doc ['SAM01Conte'] = $row["SAM01Conte"];
                $doc ['SAM01Note'] = $row["SAM01Note"]; 
                $doc ['SAM01Contri'] = $row["SAM01Contri"];
                $doc ['SAM01Anio'] = $row["SAM01Anio"];
                $doc ['SAM01FeExt'] = $row["SAM01FeExt"];
                array_push($response, $doc);
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
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }
}
?>
