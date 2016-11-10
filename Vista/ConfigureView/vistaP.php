<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
  
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
 
     <script type="text/javascript" src="../../Vista/js/Ajax.js"></script> 
     <script type="text/javascript" src="../../Vista/js/botones.js"></script> 
        
    <script src="../../Vista/js/bootstrap.min.js"></script>
<?php  

include('../../Modelo/ConfigureData/tipodocument_02.php'); 

$Data = new tipodocument_02(); 
$List = $Data->showDocument();  
session_start();
$_SESSION['Action2'] = 'new';
?>


  <title>S.A.M</title>
</head>
    <body>

  <?php include('../menu_admin.html'); ?>

      <div class="container">
            <div class="jumbotron">
                <h2>Documentos de la Municipalidad</h2>
            </div>
            <input type="button" class="btn btn-success" value="Nuevo registro" onclick="ocultarBoton1()" data-toggle="modal" data-target="#modal">
               <br/>
               <br/>

                  <table class="table table-condensed table-bordered">
                    <tr>
                        <td class="danger" align="center"  width="20%">Codigo del documento</td>
                        <td class="danger"  width="70%">Descripcion del documento</td>
                        <td class="danger" align="center" width="70%">Accion</td>
                    </tr>
                  </table>
                  <?php foreach($List as $row){?>
                  <table class="table table-condensed table-bordered"> 
                  <tr>
                      <td align="center" width="20%"><?php echo $row['code']; ?></td>
                      <td width="70%"><?php echo $row['description']; ?></td>
                      <td align="center" width="70%"> 
                      <?php echo "<a href='../../Controlador/ConfigureController/UpdateConfig.php?ID=".$row["code"]."'><span class='glyphicon glyphicon-pencil'></span></a>";?>
                       </td>
                  </tr>
                
                  </table>
                  <?php } ?>
             
                </div>


    <div id="modal" class="modal-fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="location.href='../ConfigureView/list_tipDoc02.php'" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Formulario Tipo Documentos</h4>
        </div>
        <div class="modal-body">
        <div class="container">
         <div class="col-md-6">
         <div class="form-horizontal" style="">
            <form action="../../Controlador/ConfigureController/tip_documentController02.php" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Codigo">Codigo: </label>
                <div class="col-sm-10">
                <input type="text" class="from-control" value="" readonly="readonly" name="txt_Codigo"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Nombre">Nombre: </label>
                <div class="col-sm-10">
                <input type="text" class="from-control" value="" name="txt_Nombre"/>
                </div>
              </div>

                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-success">Guardar</button>
               </div>
               </div>

        </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="location.href='../ConfigureView/vistaP.php'" 
            data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


</body>
</html>