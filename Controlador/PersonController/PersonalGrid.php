<?php  
  require_once("../../Modelo/PersonData/PersonaDatos.php");
  //Variable donde se recibe la variable del departamento del filtro
   $D = $_GET['D'];
  //Instancia del modelo de datos de persona 
  $Data = new PersonaDatos(); 
  //Se genera una variable donde se instancia la funcion
  $List = $Data->ShowPersonByDepartament($D);    
  //Se obtiene la respuesta de la consulta
  $respuesta="";

  //Se genera una lista con los datos extraidos de la consulta por departamento
  foreach ($List as $row) 
  {
    $respuesta.= "<tr>";

    $respuesta.= "<td>";
         
    $respuesta.= $row["SAM07CedUsr"];
         
    $respuesta.= "</td>";
     
    $respuesta.= "<td>";
         
    $respuesta.= $row["SAM07NomPers"];
         
    $respuesta.= "</td>";

    $respuesta.= "<td>";
         
    $respuesta.=  $row["SAM07ApePers1"];
         
    $respuesta.= "</td>";
      
    $respuesta.= "<td>";
         
    $respuesta.=  $row["SAM07ApePers2"];
         
    $respuesta.= "</td>";

    $respuesta.= "<td>";
        
    $respuesta.= "<button class='close' type='submit' onclick='mostrar($(this).parent().parent().index())'><span class='glyphicon glyphicon-remove'></span></button>";
    //Se manda la cedula de la persona a modificar al controlador
    $respuesta.="<a class='close' href='../../Controlador/PersonController/update.php?ID=".$row['SAM07CedUsr']."'><span class='glyphicon glyphicon-pencil'></span></a>";

    $respuesta.= "</td>";
    
    $respuesta.= "</tr>";    
   
  } 
  echo $respuesta;
?>
