 <?php  
require_once("../../Modelo/RegisterData/DocumentData.php");

//controlador para mostrar los documentos por departamento

 $D = $_GET['D'];//Se inicializa un objeto que va almacenar el Id del departamento 

$Data = new DocumentosDatos(); //intancia del modelo de documentos 
$List = $Data->ShowDocumentByDepartament($D);  //respuesta del mostrar.  

$respuesta="";//variable para almacenar las respuestas
$count = 0; //contador

foreach ($List as $row) //recorre la fila
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
       
        $respuesta.=  "<input type='checkbox' id=".$count." onclick='check(".$count.")'; >" ;
       
   $respuesta.= "</td>";

   $respuesta.= "</tr>";    
  $count++;
} 

echo $respuesta;//retorna la respuesta
?>
