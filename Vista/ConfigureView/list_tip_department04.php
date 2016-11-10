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
      include('../../Modelo/ConfigureData/department_04.php'); 
      $Data = new department_04(); 
      $List = $Data->showDepartament();
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
        <h2>Departamentos de la Municipalidad</h2>
      </div>
      <input type="button" class="btn btn-success" id="Nuevo registro" onclick="ocultarBoton1()" value="Nuevo registro"  data-toggle="modal" data-target="#modal2">
      <br/>
      <br/>
      <br/>

      <table id="miTabla" class="table table-condensed table-bordered">
        <tr>
          <th class="danger" align="center"  width="20%">Codigo del departamento</th>
          <th class="danger" width="70%">Nombre del departamento</th>
          <th class="danger" align="center"  width="20%">Accion</th>
        </tr>
        <?php 
        foreach($List as $row)
          {
            echo "<tr id='$conta'>";
            echo "<td>".$row['code']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>
                  <button type='button'  class='close' align='center'  onclick='ocultarBoton2($(this).parent().parent().index())' value='Nuevo registro'  data-toggle='modal' data-target='#modal2'><span class='glyphicon glyphicon-pencil'></span></button> 
                  </td>";
            echo "</tr>";
          }
        ?>
      </table>        
    </div>
    <div id="modal2" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" onclick="location.href='../ConfigureView/list_tip_department04.php'" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Formulario Tipo Documentos</h4>
          </div>

          <div class="modal-body">
            <div class="container">
              <div class="col-md-12">
                <div class="form-horizontal" style="">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="txt_Codigo">Codigo Departamento: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control item-md" id="txt_Codigo" value="<?php echo $GLOBALS['Code']; ?>" name="txt_Codigo"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="txt_Nombre">Nombre Departamento: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control item-md" id="txt_Nombre" value="<?php echo $GLOBALS['Name']; ?>" name="txt_Nombre"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <div id="result"></div>
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="save" onclick="GuardarDepartamento()" class="btn btn-success">Guardar</button>
                        <button type="submit" id="modi" onclick="ActualizarDepartamento()" class="btn btn-success">Modificar</button>
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