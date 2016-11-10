<?php
include_once("../../Modelo/ClassConexion.php");
require_once("../../Modelo/Clases/class04_cat_department.php");

class department_04//clase modelo de datos de departamento 
{
 private $objC;//variable de la clase
    
	function department_04() //funcion para conectar con la base de datos.
    {
        $this->objC = new conexion();//se crea el objeto de la conexion
    }


   function SaveDepartament($objlending)//funcion para guardar el  Departamento 
  {

    $DepartmentCode = $objlending->getDepartmentCode();//obtencion del codigo del departamento por medio de la variable
    $Description = $objlending->getDescription();//obtencion del nombre de departamento por medio de la variable

     $conn =  $this->objC->ObtenerConexion();//Abrimos la conexion

     $Sentencia = $conn->prepare("CALL sp_samAddCatDepart(?,?)");//se abre la sentencia y llamamos el procedimiento de la base de datos

     $Sentencia->bind_param('ss',$DepartmentCode,$Description);//obtiene los parametos de la base de datos

     $Sentencia->execute();//se ejecuta la sentencia

     $resultado = $Sentencia->get_result();//trae los resultados
 
     $r = $resultado->fetch_array(MYSQLI_NUM);//trae las respuestas de la base de datos

     $Sentencia->close();//cierra la sentencia

     $this->objC->CerrarConexion();//se cierra la conexion

     return $r[0];

  }

    function showDepartament()//funcion para mostrar los Departamentos
    {
        $conn =  $this->objC->ObtenerConexion();//se abre la conexion

        $response = array();//codigo para mostrar datos

        $sql = 'CALL Sp_samShwCatDepart()';

        $result = mysqli_query($conn, $sql);//llamamos el procedimiento almacenado

      if (mysqli_num_rows($result) > 0) //recorre las filas en busca de datos
      {
         $typeDepartamento = array();
         while ($row = mysqli_fetch_array($result))// si encuentra datos los muestra 
         {   
         

         $typeDepartamento["code"] = $row["SAM04CoDepart"];//obtiene el codigo de la base de datos
         $typeDepartamento["description"] = $row["SAM04DescpPart"]; //obtiene el nombre de la base de datos
         array_push($response, $typeDepartamento);//trae la respuesta
         }
               
      }
      else
      {
        echo "no hay resultados";
      }
        //fin del codigo para mostrar Datos


        $this->objC->CerrarConexion();//cierra la conexion
        return $response;
    }

    function SearchDepartByID($IdDepart)
    {
        $conn =  $this->objC->ObtenerConexion();
        $response = array();
        //codigo para mostrar datos
        $sql = 'CALL sp_samSrhRegDepart("'.$IdDepart.'")';
           //run the store proc
        $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) 
      {

         while ($row = mysqli_fetch_array($result))
         { 

         $depart = array();

         $depart ['SAM04CoDepart']  = $row["SAM04CoDepart"];
         $depart ['SAM04DescpPart'] = $row["SAM04DescpPart"]; 
         array_push($response, $depart);
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

    function UpdateDeparment($objDepartmen)
    {
      $IdDepar = $objDepartmen->getDepartmentCode();
      $Descp = $objDepartmen->getDescription();

       $conn =  $this->objC->ObtenerConexion();

       $Sentencia = $conn->prepare("CALL sp_samUpdDepart(?,?)");

       $Sentencia->bind_param('ss',$IdDepar,$Descp);

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