<!DOCTYPE html>
<html>
<head>
<?php  
include('../../Modelo/LendingData/reg_lendingData_09.php'); 

$Data2 = new reg_lendingData_09();
$List2 = $Data2->ShowLending();  

?>
  <title>S.A.M</title>
</head>
<body>
        
              
<table  id="miTabla">  
  <tr>
    <th>Codigo</th>
    <th>Fecha</th> 
    <th>Departamento</th>
    <th>Cedula</th>
    <th>Nombre persona</th>
    <th>Estado</th>
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
    echo "<td><input type='Button' value='Devolver' id=".$count." onclick='check(".$count.")'; ><td>" ;
   }

  ?>
           
</tr>

<?php

}
$count++;
?>

</table>
 </div> 

</body>

<script type="text/javascript" src="../js/Ajax.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/Notificacion.js"></script>
<script type="text/javascript" src="../js/push.min.js"></script>
</html>