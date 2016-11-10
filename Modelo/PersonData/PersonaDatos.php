<?php
require_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class07_reg_person.php");

class PersonaDatos
{
  //Se declara una variable donde se almacena la instancia de la conexion 
    private $objC;
    

	function PersonaDatos()
  {
    //Se almacena la conexion en la variable
    $this->objC = new conexion();
  }

  function CreatePerson($objPersona)//Funcion de guardado de la persona
  {
    try{
        //Se almacena en variable lo getter de cada uno de los datos obtenidos 
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
 
        //Se obtiene una conexion a la base de datos
        $conn =  $this->objC->ObtenerConexion();
        //Se prepara la sentencia donde se prepara la llamada del procedimiento
        $Sentencia = $conn->prepare("CALL sp_samAddRegPer(?,?,?,?,?,?,?,?,?,?)");
        //Se mandan los parametros al procedimiento almacenado
        $Sentencia->bind_param('ssssssssis',$IDUser,$Name,$Surname1,$Surname2, $OfficePhone,$PersonalPhone,$Email,$Password,$Tipe_User,$Department);
        //Se ejecuta la sentencia del procedimiento almacenado
        $Sentencia->execute();
        //Se obtiene los resultados de la base de datos
        $resultado = $Sentencia->get_result();
        //$r = var_dump($resultado->fetch_assoc());
        $r = $resultado->fetch_array(MYSQLI_NUM);
        //Se cierra la conexion de la base de datos
        $this->objC->CerrarConexion();
        $Sentencia->close();

        return $r[0];
      }
      catch(Exception $e)
        {
          echo 'no se pudo realizar la funcion'.$e->getMessage();
        }
  }

  function UpdatePerson($objPersona) //Funcion de actualizar las personas
  {
    try
    {  
      //Se almacena en variable lo getter de cada uno de los datos obtenidos 
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
     //Se obtiene una conexion a la base de datos
       $conn =  $this->objC->ObtenerConexion();
     //Se prepara la sentencia donde se prepara la llamada del procedimiento
       $Sentencia = $conn->prepare("CALL sp_SamUpdPer(?,?,?,?,?,?,?,?,?,?)");
     //Se mandan los parametros al procedimiento almacenado
       $Sentencia->bind_param('ssssssssis',$IDUser,$Name,$Surname1,$Surname2, $OfficePhone,$PersonalPhone,$Email,$Password,$Tipe_User,$Department);
     //Se ejecuta la sentencia del procedimiento almacenado
       $Sentencia->execute();
     //Se obtiene los resultados de la base de datos
       $resultado = $Sentencia->get_result();
   
          $r = $resultado->fetch_array(MYSQLI_NUM);
       //Se cierra la conexion de la base de datos
       $this->objC->CerrarConexion();
       $Sentencia->close();

       return $r[0];
    }
    catch(Exception $e)
    {
      echo 'no se pudo realizar la funcion'.$e->getMessage();
    }
  }

 function ShowPersonByDepartament($CodeDepartament)
  {
    try
    {  
      //Se obtiene una conexion a la base de datos
      $conn =  $this->objC->ObtenerConexion();
      $response = array();
      //Se hace un llamado al procedimiento almacenado con el parametro 
      $sql = 'CALL sp_samShwPerDepar("'.$CodeDepartament.'")';
             //Se obtiene el resultado de la consulta
      $result = mysqli_query($conn, $sql);

             //Se hace un contador de los resultados 
      if (mysqli_num_rows($result) > 0) 
        {
          //Cuando se la fila es igual resultado se agrega al array person 
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
          //Fin del codigo para mostrar Datos
          //Se cierra la conexion 
          $this->objC->CerrarConexion();
          return $response;
    }
    catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
  }

 function SearchPersonByID($IdPerson)
  {
    try
    {
      $conn =  $this->objC->ObtenerConexion();
      $response = array();
        //Se llama al procedimiento con el procedimiento 
      $sql = 'CALL sp_samSrhRegPer("'.$IdPerson.'")';
          //Se obtiene los resultados de la consulta
      $result = mysqli_query($conn, $sql);
         //Se comprueba si se extrajo los resultados
      if (mysqli_num_rows($result) > 0) 
      {
        //Cuando se la fila es igual resultado se agrega al array person
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
        //Fin del codigo para mostrar Datos

        //Se cierra la conexion
        $this->objC->CerrarConexion();
        return $response;
    }
    catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
       //Se obtiene la conexion 
  }

    function DeletePerson($objPersona)
    {
      try
      {
        $conn =  $this->objC->ObtenerConexion();
        //Se prepara la sentencia y se ejecuta con el parametro obtenido
        $Sentencia = $conn->prepare("CALL sp_samDelRegPer(?)");
        $Sentencia->bind_param('s',$objPersona);
        $Sentencia->execute();
        //Se almacena el resultado
        $resultado = $Sentencia->get_result();  
        $r = $resultado->fetch_array(MYSQLI_NUM);
        //Se cierra la conexion 
        $this->objC->CerrarConexion();
        $Sentencia->close();
        return $r[0];
      }
      catch(Exception $e)
      {
        echo 'no se pudo realizar la funcion'.$e->getMessage();
      }
    }
}
?>