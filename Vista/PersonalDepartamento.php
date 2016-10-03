<?php  
include('../Modelo/CapaDatos/PersonaDatos.php');

 $D = $_GET['D'];

$Data = new PersonaDatos(); 
$List = $Data->ShowPersonByDepartament($D);    
$respuesta="";

 //$respuesta.="<table border='1px'>";

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
       
        $respuesta.="
                         <input type='submit' value='Eliminar' onclick='mostrar($(this).parent().parent().index())'  />
                    ";
       
        $respuesta.="
                         <a href='../Controlador/update.php?ID=".$row["SAM07CedUsr"]."'>Modificar</a>
                    ";

   $respuesta.= "</td>";
  
   $respuesta.= "</tr>";    
 
} 
// $respuesta.= "</table>";
 //echo  $respuesta;
echo $respuesta;
?>
