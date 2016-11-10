<!DOCTYPE html>
<html>
<head>
	<title>Boleta de prestamo</title>
	<link rel="stylesheet" type="text/css" href="../css/LendingReport.css">
</head>
<body onload="window.print();">
<?php
      session_start();
      $report = $_SESSION['report'];
      session_destroy();
?>
          <h2><center>Boleta Prestamo de Documento</center> </h2>
          <br>
          <br>
          <br>
         <label class="muni">MUNICIPALIDAD DE NICOYA</label> 
         <br><label class="muni">ARCHIVO CENTRAL</label>
                   <br>
          <br>
          <div class="oval"><label> <CENTER>BOLETA <br> PRESTAMO DE DOCUMENTOS</center> </label>
          </div>
          <img src="../img/muni.jpg"> 
         <div>
           <br/>
           <label>Dependencia que solicita: </label><label><?php echo $GLOBALS['report'][0]['sam04DescpPart']; ?></label>
           <br/>
           <label  >Fecha Prestamo:</label><label><?php echo $GLOBALS['report'][0]['SAM09FePres']; ?></label>
           <br/>
     		   <div class="polig"><label>Boleta N <?php echo ':  '. $GLOBALS['report'][0]['SAM09CoPrest']; ?></label> </div>
			   	<br/>
           <label>Fecha Devolucion:</label><label><?php echo $GLOBALS['report'][0]['SAM09FeDevo']; ?></label>
                

 <br/><br/><br/>
 <table style="width:100%" id="miTabla">
  <tr>
    <th>Signatura/Codigo</th>
    <th>Tipo Documental</th> 
    <th>Fechas Extremas</th>
    <th>Ubicacion Archivo</th>
    <th>Control ID</th>
  </tr>

  <div id="tabla">
<?php


foreach ($GLOBALS['report'] as $row) 
{
echo 
"<tr>
      <td>".$row["SAM01CoDoc"]."</td>
      <td>".$row["SAM02Descp"]."</td>
      <td>".$row["SAM01FeExt"]."</td>
      <td>".$row["SAM03Ubic"]."</td>
      <td>".$row["SAM03CoOrd"]."</td>
 </tr>";
}?>
</div>
</table>
<br/>
<br/>
<div><label>Responsable Documentacion:_____________________   </label></div>
<br/>
<div><label>Firma del responsable:_____________________  </label></div>
<br/>
<div><label>Nombre del prestatario:   <?php echo $GLOBALS['report'][0]['SAM07NomPers']; ?> </label></div>
<br/>
<div><label>Firma:_____________________  </label></div>


            </form>
          </div>
        </div>
      </div>
                                                   
</body>
</html>
