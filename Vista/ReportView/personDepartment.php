<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	  <link rel="stylesheet" type="text/css" href="../css/LendingReport.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
    <meta charset="UTF-8">
  <title>S.A.M</title>
  
</head>
<body onload="window.print();">
    <?php
      include('../menu_admin.html');
    ?>
    <br/>
<div class="container">
  <div class="form-group">
  <?php
          session_start();
          $report = $_SESSION['report'];
          session_destroy();
          $departament = $GLOBALS['report'][0]["SAM04DescpPart"];
          $conta = count($report);
    ?>
    <br/>
    <br/>
    <div ><B><font face="arial" size="3"><center>Personas por departamentos</center></font></B> </div>
    <table class="table table-condensed table-hover" style="width:100%" id="miTabla">
      <tr class="warning">
        <th align="center">Cédula</th>
        <th align="center">Nombre</th> 
        <th align="center">Apellido</th>
        <th align="center">Apellido</th>
      </tr>
      </table>
    
    <?php  
        for($i = 0; $i  < $GLOBALS['conta'] ; $i++)
           {
           echo "<br/>";
           echo $departament; 
    ?>
     <br/><br/><br/>
     <table class="table table-condensed table-hover" style="width:100%" id="miTabla">
    
    
      <div id="tabla">
    <?php
    
    
    for($a = $GLOBALS['i']  ; $a  < $GLOBALS['conta']; $a++) 
    {
      if ($GLOBALS['departament'] == $GLOBALS['report'][$a]["SAM04DescpPart"]) 
      {  
    echo 
       "<tr>  
          <td>".$GLOBALS['report'][$a]["SAM07CedUsr"]."</td>
          <td>".$GLOBALS['report'][$a]["SAM07NomPers"]."</td>
          <td>".$GLOBALS['report'][$a]["SAM07ApePers1"]."</td>
          <td>".$GLOBALS['report'][$a]["SAM07ApePers2"]."</td>
       </tr>";
     $GLOBALS['i']++; 
       }
      else
      {
        $GLOBALS['departament'] = $GLOBALS['report'][$a]["SAM04DescpPart"];
        $GLOBALS['i']--; 
        break;
      }
    }?>
    </div>
    </table>
    <?php  }?>
    </div>
</div>                                                   
</body>
  <script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
</html>
 