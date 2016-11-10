<?php
include('../../Modelo/RegisterData/OrdenDatos.php'); // require el modelo 

 $D = $_GET['D']; // obtiene el valor de la variable 

$Data = new OrdenDatos(); // instancia del modelo 
$List = $Data->ListarOrdenDepart($D); // carga el resultado de la funcion del modelo
$respuesta="";

 //$respuesta.="<table border='1px'>";

foreach ($List as $row) // crea una tabla apartir del resultado 
{
  $respuesta.= "<tr>";
   $respuesta.= "<td>";

        $respuesta.= $row["SAM03CoOrd"];

   $respuesta.= "</td>";

   $respuesta.= "<td>";

        $respuesta.= $row["SAM03Ubic"];

   $respuesta.= "</td>";

    $respuesta.= "<td>";

        $respuesta.=  $row["SAM04CoDepart"];

   $respuesta.= "</td>";


     $respuesta.= "<td>";

        $respuesta.=  $row["SAM03AnioTrans"];

   $respuesta.= "</td>";

   $respuesta.= "<td>";

        $respuesta.="
                         <button class='close' type='submit' onclick='mostrarOrden($(this).parent().parent().index())'><span class='glyphicon glyphicon-trash'></span></button>
                    ";

        $respuesta.="
                         <a class='close' href='../../Controlador/RegisterController/UpdateOrden.php?ID=".$row["SAM03CoOrd"]."'><span class='glyphicon glyphicon-pencil'></span></a>
                    ";

        $respuesta.="
                         <a class='close' href='../../Controlador/RegisterController/Elegir.php?ID=".$row["SAM03CoOrd"]."'><span class='glyphicon glyphicon-ok'></span></a>
                    ";

        $respuesta.="
                         <a clase='close' href='../../Controlador/RegisterController/DetalleOrdenController.php?Codigo=".$row["SAM03CoOrd"]."'><span class='glyphicon glyphicon-list'></span></a>
                    ";

   $respuesta.= "</td>";

   $respuesta.= "</tr>";

}
//$respuesta.= "</table>";
 //echo  $respuesta;
echo $respuesta;
?>
