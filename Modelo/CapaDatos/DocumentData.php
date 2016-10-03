<?php
include_once("ClassConexion.php");
require_once("../Modelo/Clases/class_reg_document.php");

class DocumentData
{
    private $objC;
    

	function DocumentData()
    {
        $this->objC = new conexion();
    }

  function SaveDocument($objDocument)
  {

    $Cod_document = $objDocument->getCodeDocument();
    $Cod_tipe = $objDocument->getUbication();
    $Detail = $objDocument->getCodeDepartment();
    
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samAddRegDoc(?,?,?,?,?,?)");

     $Sentencia->bind_param('sssssss',$CodeDocument,$Ubication,$CodeDepartment,$TransferYear,$EndDate,$IDUser);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);
     
     return $r[0];
  }


      function ShowDocument()
    {
        $conn =  $this->objC->ObtenerConexion();
        // abre la conexion con la base de datos
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwRegOrd()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $Document = array();

         $Document["SAM03CoOrd"] = $row["SAM03CoOrd"];
         $Document["SAM03Ubic"] = $row["SAM03Ubic"]; 
         $Document["SAM04CoDepart"] = $row["SAM04CoDepart"]; 
         $Document["SAM03AnioTrans"] = $row["SAM03AnioTrans"]; 
         $Document["SAM03FeExt"] = $row["SAM03FeExt"]; 
         $Document["SAM05CedUsr"] = $row["SAM05CedUsr"];
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

}
?>