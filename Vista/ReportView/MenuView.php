<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=divice-width, initial-scale=1">
    <title>S.A.M</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php
      include('../menu_admin.html');
    ?>

  </head>
  <!--header-->
<body>
<br>
<br>

<div ><B><font face="arial" size="3"><center>Reportes</center></font></B>
<br>

  <a href="../../Controlador/ReportController/personDocumentReport.php" >  Reporte de Persona</href></a>
  <br>
  <a href="../../Controlador/ReportController/documentDepartment.php" >Reporte de Documentos</href></a>
  <br>
  <a data-toggle='modal' data-target='#modal2'>Reporte por fecha</a>
  <br>

 <div id="modal2" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Formulario Tipo Documentos</h4>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="col-md-12">
                <div class="form-horizontal" style="">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="F1">Fecha inicial: </label>
                      <div class="col-sm-10">
                        <input type="date" class="from-control" id="F1" name="txt_F1"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="F2">Fecha final: </label>
                        <div class="col-sm-10">
                          <input type="date" class="from-control" id="F2" name="txt_F2"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <div id="result"></div>
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-success" onclick="ReporteFechas()">Generar</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/Reportes.js"></script>
</html>
