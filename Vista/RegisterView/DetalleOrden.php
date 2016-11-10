<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
    <meta charset="UTF-8">
<?php

session_start();

$Lista = $_SESSION['tabla'];

session_destroy();

?>
  <title>Detalle Orden</title>
</head>
<body>
    <?php
      include('../menu_admin.html');
    ?>
  <br/>
  <br/>
  <br/>
      <input type="button" class="btn btn-success" onclick="location.href='ListaOrden.php'" value="Lista de Ordenes">
  <br/>
  <br/>
  <div>
    <?php
   echo "Codigo de la Orden: ";
   echo $GLOBALS['Lista'][0]['SAM03CoOrd'];
   echo "<br/>";
   echo "Departamento: ";
   echo  $GLOBALS['Lista'][0]['SAM04DescpPart'];
   echo "<br/>";
   echo "Ubiciacion: ";
   echo  $GLOBALS['Lista'][0]['SAM03Ubic'];
   echo "<br/>";
   echo "Año: ";
   echo  $GLOBALS['Lista'][0]['SAM01Anio'];
   echo "<br/>";
    ?>
  </div>
  <br/>
  <br/>
<div class="table-responsive">
  <table class="table table-condensed table-hover" id="miTabla">
  <tr class="warning">
    <th>Codigo de Documento</th>
    <th>Contenido</th>
    <th>Descripcion</th>
    <th>Fecha extrema</th>
    <th>Contribuyente</th>
  </tr>

  <?php  
      foreach ($GLOBALS['Lista'] as $row) 
      {
          echo "<tr>";
          echo "<td>";
       
          echo $row["SAM01CoDoc"];
       
          echo "</td>";
   
          echo "<td>";
       
          echo $row["SAM01Conte"];
       
          echo "</td>";  

          echo "<td>";
       
          echo  $row["SAM02Descp"];
       
          echo "</td>";

          echo "<td>";

          echo  $row["SAM01FeExt"];
       
          echo "</td>";

          echo "<td>";
       
          echo  $row["SAM01Contri"];
       
          echo "</td>";

  
          echo "</tr>";    
      } 
  ?>

</table>
</div>


</body>
  <script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
</html>
