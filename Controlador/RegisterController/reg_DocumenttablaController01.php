<?php  
include('../../Modelo/RegisterData/DocumentData.php'); // requiere el modelo 

 $D = $_GET['D']; // obtiene el valor de la variable 

$Data = new DocumentosDatos();  // instancia del modelo 
$List = $Data->ShowDocumentByDepartament($D); // carga el resultado de la funcion del modelo 
$respuesta="";

 //$respuesta.="<table border='1px'>";

foreach ($List as $row) // crea una tabla a travez del resultado 
{
  $respuesta.= "<tr>";
   $respuesta.= "<td>";
       
        $respuesta.= $row["SAM01CoDoc"];
       
   $respuesta.= "</td>";
   
   $respuesta.= "<td>";
       
        $respuesta.= $row["SAM01Conte"];
       
   $respuesta.= "</td>";  

     $respuesta.= "<td>";
       
        $respuesta.=  $row["SAM01Anio"];
       
   $respuesta.= "</td>";

   $respuesta.= "<td>";
       
        $respuesta.=  $row["SAM02Descp"];
       
   $respuesta.= "</td>";

  $respuesta.= "<td>";
       
        $respuesta.=  $row["SAM01Contri"];
       
   $respuesta.= "</td>";

   $respuesta.= "<td>";

        $respuesta.="
                      <button class='close' type='submit' onclick='mostrarDoc($(this).parent().parent().index())'><span class='glyphicon glyphicon-trash'></span></button>
                    ";

        $respuesta.="
                      <a class='close' href='../../Controlador/RegisterController/UpdateDocument.php?ID=".$row["SAM01CoDoc"]."'><span class='glyphicon glyphicon-pencil'></span></a>
                     ";

   $respuesta.= "</td>";

  
   $respuesta.= "</tr>";    
 
} 
// $respuesta.= "</table>";
 //echo  $respuesta;
    echo $respuesta;
?>
