<!DOCTYPE html>
<html>
<head>
	<title>Comprobante de Solicitud</title>
	<link rel="stylesheet" type="text/css" href="../css/LendingReport.css">
</head>
<body onload="window.print();">
<?php
      session_start();
      $report = $_SESSION['report'];
      session_destroy();
?>
          <h2><center></center> </h2>
          <br>
          <br>
          <br>
         <label class="muni">MUNICIPALIDAD DE NICOYA</label> 
         <br><label class="muni">ARCHIVO CENTRAL</label>
                   <br>
          <br>
          <div class="oval"><label> <CENTER><br> Comprobante de Solicitud</center> </label>
          </div>
          <img src="../img/muni.jpg"> 
         <div>
           <br/>
           <label>Nombre: </label>
            <label><?php echo $GLOBALS['report'][0]["SAM07NomPers"] ; ?></label>
          <br/>
          <label>Cedula:</label>
            <label><?php echo $GLOBALS['report'][0]["SAM07CedUsr"] ; ?></label>  
           <br/>
           <label>Fecha solicitud:</label>
            <label><?php echo $GLOBALS['report'][0]["SAM09FePres"] ; ?></label>  
           <br/>
           <div class="polig"><label>Solicitud N:  </label> 
     		   <label><?php echo $GLOBALS['report'][0]["SAM09CoPrest"] ; ?></label> 
           </div>
                

 <br/><br/><br/>
 <table style="width:100%" id="miTabla">
  <tr>
    <th>Codigo del Documento</th>
    <th>Descripcion</th> 
  </tr>

  <div id="tabla">
<?php


foreach ($GLOBALS['report'] as $row) 
{
echo 
"<tr>
      <td>".$row["SAM01CoDoc"]."</td>
      <td>".$row["SAM02Descp"]."</td>
 </tr>";
}?>
</div>
</table>
<br/>
<br/>



            </form>
          </div>
        </div>
      </div>
                                                   
</body>
</html>
