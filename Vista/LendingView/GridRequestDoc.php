<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php'); 

$Data2 = new reg_lendingData_09();
$List2 = $Data2->ShowLending();  

?>
  <title>S.A.M</title>
</head>
<body>
       <?php 
      include('../menu_admin.html');
        ?> 
       <br/>
       <br/>
       <br/> 
       <br/> 
       <br/>
   <div class="container">
     <div class="form-group">
        <label for="sel_tipoUsr">Solicitudes</label>
        <br/>
        <br/>
         <div class="table-responsive">          
<table class="table table-condensed table-hover" id="miTabla">  
  <tr class="warning">
    <th>Codigo de Solicitud</th>
    <th>Fecha de Solicitud</th> 
    <th>Departamento </th>
    <th>Cedula de la persona</th>
    <th>Nombre persona</th>
    <th>Estado</th>
    <th>Accion</th>
  </tr>
 
<?php
$count = 0;
foreach ($List2 as $row) 
{
?>

<tr id="<?php echo $row['SAM09CoPrest']?>">
  <td><?php echo $row['SAM09CoPrest']; ?></td>
  <td><?php echo $row["SAM09FePres"]; ?></td>
  <td><?php echo $row["SAM04DescpPart"]; ?></td>
  <td><?php echo $row["SAM05CedUsr"];?></td>
  <td><?php echo $row["SAM07NomPers"];?></td>
  <td><?php echo $row["SAM13DesTip"]; ?></td>
  <?php  
   if ($row["SAM13DesTip"]== "Prestado") 
   {
    echo "<td><input type='Button' value='Devolver' id=".$count." onclick='ReturnLending(".$count.")'; ><td>" ;
   } 
   else
   {
       if($row["SAM13DesTip"]== "Transicion") 
       {
        echo "<td><input type='Button' value='Prestar' id=".$count." onclick='ConfirmLending(".$count.")'; ><td>" ;
       }
   }
  ?>
           
</tr>

<?php
$count=$count+1;
}

?>

</table>
</div>
     </div>
   </div>     


</body>
  <script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../Vista/js/Ajax.js"></script>
  <script type="text/javascript" src="../../Vista/js/Jprestamo.js"></script>
</html>