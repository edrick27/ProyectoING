<?php
require_once("ClassConexion.php");
require_once("../Modelo/Clases/class07_reg_person.php");

class PersonaDatos
{
    private $objC;
    

	function PersonaDatos()
  {
    $this->objC = new conexion();
  }

  function CreatePerson($objPersona)
  {

    $IDUser = $objPersona->getIDUser();
    $Name = $objPersona->getName();
    $Surname1 = $objPersona->getSurname1();
    $Surname2 = $objPersona->getSurname2();
    $OfficePhone = $objPersona->getOfficePhone();
    $PersonalPhone = $objPersona->getPersonalPhone();
    $Email = $objPersona->getEmail();
    $Password= $objPersona->getPassword();
    $Tipe_User= $objPersona->getTipe_User();
    $Department= $objPersona->getDepartment();
   
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_samAddRegPer(?,?,?,?,?,?,?,?,?,?)");

     $Sentencia->bind_param('ssssssssis',$IDUser,$Name,$Surname1,$Surname2, $OfficePhone,$PersonalPhone,$Email,$Password,$Tipe_User,$Department);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
      //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);

     $this->objC->CerrarConexion();
     $Sentencia->close();

     return $r[0];
  }


  function UpdatePerson($objPersona)
  {

    $IDUser = $objPersona->getIDUser();
    $Name = $objPersona->getName();
    $Surname1 = $objPersona->getSurname1();
    $Surname2 = $objPersona->getSurname2();
    $OfficePhone = $objPersona->getOfficePhone();
    $PersonalPhone = $objPersona->getPersonalPhone();
    $Email = $objPersona->getEmail();
    $Password= $objPersona->getPassword();
    $Tipe_User= $objPersona->getTipe_User();
    $Department= $objPersona->getDepartment();
   
     $conn =  $this->objC->ObtenerConexion();

     $Sentencia = $conn->prepare("CALL sp_SamUpdPer(?,?,?,?,?,?,?,?,?,?)");

     $Sentencia->bind_param('ssssssssis',$IDUser,$Name,$Surname1,$Surname2, $OfficePhone,$PersonalPhone,$Email,$Password,$Tipe_User,$Department);

     $Sentencia->execute();

     $resultado = $Sentencia->get_result();
 
        $r = $resultado->fetch_array(MYSQLI_NUM);
     
     $this->objC->CerrarConexion();
     $Sentencia->close();

     return $r[0];
  }

 function ShowPersonByDepartament($CodeDepartament)
  {

     $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwPerDepar("'.$CodeDepartament.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $person = array();

         $person['SAM07CedUsr'] = $row["SAM07CedUsr"];
         $person["SAM07NomPers"] = $row["SAM07NomPers"]; 
         $person["SAM07ApePers1"] = $row["SAM07ApePers1"];
         $person["SAM07ApePers2"] = $row["SAM07ApePers2"]; 
         array_push($response, $person);
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

   function SearchPersonByID($IdPerson)
  {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samSrhRegPers("'.$IdPerson.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $person = array();

         $person['SAM07CedUsr']    = $row["SAM07CedUsr"];
         $person["SAM07NomPers"]   = $row["SAM07NomPers"]; 
         $person["SAM07ApePers1"]  = $row["SAM07ApePers1"];
         $person["SAM07ApePers2"]  = $row["SAM07ApePers2"]; 
         $person["SAM07TelefOfi"]  = $row["SAM07TelefOfi"]; 
         $person["SAM07TelefPers"] = $row["SAM07TelefPers"]; 
         $person["SAM07CorrPers"]  = $row["SAM07CorrPers"]; 
         $person["SAM05Contra"]    = $row["SAM05Contra"]; 
         $person["SAM06CoTipUsr"]  = $row["SAM06CoTipUsr"]; 
         $person["SAM04CoDepart"]  = $row["SAM04CoDepart"]; 
         array_push($response, $person);
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

    function DeletePerson($objPersona)
    {
      
    $conn =  $this->objC->ObtenerConexion();
      
    $Sentencia = $conn->prepare("CALL sp_samDelRegPer(?)");
    $Sentencia->bind_param('s',$objPersona);
    $Sentencia->execute();
      
    $resultado = $Sentencia->get_result();
 
    $r = $resultado->fetch_array(MYSQLI_NUM);

    $this->objC->CerrarConexion();
    $Sentencia->close();

    return $r[0];
    }    

    function ShowPerson()
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL Sp_samShwRegPers()';
           //run the store proc
        $result = mysqli_query($conn, $sql);

           //loop the result set
      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         {   
         $person = array();

         $person["SAM07CedUsr"] = $row["SAM07CedUsr"];
         $person["SAM07NomPers"] = $row["SAM07NomPers"]; 
         $person["SAM07ApePers1"] = $row["SAM07ApePers1"];
         $person["SAM07ApePers2"] = $row["SAM07ApePers2"]; 
         $person["SAM07TelefOfi"] = $row["SAM07TelefOfi"];
         $person["SAM07TelefPers"] = $row["SAM07TelefPers"]; 
         $person["SAM07CorrPers"] = $row["SAM07CorrPers"];
         array_push($response, $person);
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


}
?>