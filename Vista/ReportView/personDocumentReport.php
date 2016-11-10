<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="../css/LendingReport.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
	<title>S.A.M</title>


</head>
<body onload="window.print();">
          <?php
      session_start();
      $report = $_SESSION['report'];
      session_destroy();
      $departament = $GLOBALS['report'][0]["SAM04DescpPart"];
      $conta = 0;
?>
  
    <br/>
    <br/>
    <br/>
    <div class="container">
      <div class="form-group">
        <div class="table-responsive">
  <div ><B><font face="arial" size="3"><center>Personas por departamentos</center></font></B> </div>
  <table class="table table-condensed table-hover" style="width:100%" id="miTabla2">
  <tr class="warning">
    <th>Cédula</th>
    <th>Nombre</th> 
    <th>Apellido</th>
    <th>Apellido</th>
  </tr>
  </table>

<?php  
    for($i = 0; $i  < 10 ; $i++)
       {
       echo "<br/><br/><br/>";
       echo $departament; 
?>
 <br/><br/><br/>
 <table class="table table-condensed table-hover" style="width:100%" id="miTabla">


  <div id="tabla">
<?php


for($a = $GLOBALS['i']  ; $a  < 10 ; $a++) 
{
  if ($GLOBALS['departament'] == $GLOBALS['report'][$a]["SAM04DescpPart"]) 
  {  
echo 
"<center>
   <tr>  
      <td>".$GLOBALS['report'][$a]["SAM07CedUsr"]."</td>
      <td>".$GLOBALS['report'][$a]["SAM07NomPers"]."</td>
      <td>".$GLOBALS['report'][$a]["SAM07ApePers1"]."</td>
      <td>".$GLOBALS['report'][$a]["SAM07ApePers2"]."</td>
   </tr>
 </center>";
 $GLOBALS['i']++; 
   }
  else
  {
    $GLOBALS['departament'] = $GLOBALS['report'][$a]["SAM04DescpPart"];
    break;
  }
}?>
</div>
</table>
<?php  }?>
        </div>
      </div>
    </div>
                                           
</body>
<script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
</html>
 