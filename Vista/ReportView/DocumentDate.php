<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">   
    <link rel="stylesheet" type="text/css" href="../css/LendingReport.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
</head>
<body onload="window.print();">
    <?php
      include('../menu_admin.html');
    ?>
    <br/>
    <br/>
    <br/>
    <div>
      <div>
        <?php
      session_start();
      $report = $_SESSION['report'];
      session_destroy();
?>
<div ><B><font face="arial" size="3"><center>Reporte Documentos por Fecha</center></font></B> </div>
 <table class="table table-condensed table-hover" style="width:100%" id="miTabla">
  <tr>
    <th>Signatura/Codigo</th>
    <th>Codigo caja</th> 
    <th>Descripcion</th>
    <th>Contenido</th>
    <th>Contribuyente</th>
    <th>Departamento</th>
  </tr>

  
<?php


foreach($GLOBALS['report'] as $row) 
{
echo 

"<tr>
      <td>".$row["SAM01CoDoc"]."</td>
      <td>".$row["SAM03CoOrd"]."</td>
      <td>".$row["SAM02Descp"]."</td>
      <td>".$row["SAM01Conte"]."</td>
      <td>".$row["SAM01Contri"]."</td>
      <td>".$row["SAM01Anio"]."</td>
      <td>".$row["SAM04DescpPart"]."</td>
 </tr>";
}?>

</table>
      </div>
    </div>
                                                   
</body>
  <script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
</html>
