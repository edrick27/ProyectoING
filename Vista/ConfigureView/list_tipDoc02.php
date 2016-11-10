<!DOCTYPE html>
<html>
  <head>
    <title>S.A.M</title>  
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="../../Vista/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
     <link rel="stylesheet" href="../../Vista/css/estructra.css">    
     <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script> 
     <script type="text/javascript" src="../../Vista/js/Ajax.js"></script> 
     <script type="text/javascript" src="../../Vista/js/botones.js"></script> 
    <?php  
      include('../../Modelo/ConfigureData/tipodocument_02.php');
      $Data = new tipodocument_02(); 
      $List = $Data->showDocument();
      session_start();
      $_SESSION['Action2'] = 'new';  
    ?>
  </head>

  <body>
    <?php 
      include('../menu_admin.html'); 
    ?>
    <div class="container">
            <div class="jumbotron">
                <h2>Documentos de la Municipalidad</h2>
            </div>
            <input type="button" class="btn btn-success" value="Nuevo registro" onclick="ocultarBoton3()" data-toggle="modal" data-target="#modal">
               <br/>
               <br/>

                  <table id="miTabla" class="table table-condensed table-bordered">
                    <tr>
                        <td class="danger" align="center"  width="20%">Codigo del documento</td>
                        <td class="danger"  width="70%">Descripcion del documento</td>
                        <td class="danger" align="center" width="70%">Accion</td>
                    </tr>
                  
                  <!-- <tbody> -->
                  <?php 
                  foreach($List as $row){?>
                  <tr>
                      <td align="center" width="20%"><?php echo $row['code']; ?></td>
                      <td width="70%"><?php echo $row['description']; ?></td>
                      <td align="center" width="70%"> 
                      <?php echo 
                      "<button type='button'  class='close' onclick='ocultarBoton4($(this).parent().parent().index())' value='Nuevo registro'  data-toggle='modal' data-target='#modal'><span class='glyphicon glyphicon-pencil'></span></button>";?>
                       </td>
                  </tr>
                
                  <?php } ?>
                  <!-- </tbody> -->
                  </table>
             
                </div>
    <div id="modal" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" onclick="location.href='../ConfigureView/list_tipDoc02.php'" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Formulario Tipo Documentos</h4>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="col-md-12">
                <div class="form-horizontal" style="">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="txt_Codigo">Codigo Documento: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control item-md" id="txt_Codigo"  name="txt_Codigo"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="txt_Nombre">Nombre Documento: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control item-md" id="txt_Nombre"  name="txt_Nombre"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <div id="result"></div>
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="save" onclick="GuardarDocumento()" class="btn btn-success">Guardar</button>
                        <button type="submit" id="modi" onclick="ActualizarDocumento()" class="btn btn-success">Modificar</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
  <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
  </body>
</html>