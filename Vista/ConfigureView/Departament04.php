<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=1" />
            <link href="../css/bootstrap.min.css" rel="stylesheet">


    <?php   
    
    include('../../Modelo/ConfigureData/department_04.php'); 

    ?>
    </head>

    <body>
        <header>
            <h1></h1>
        </header>

      <?php 
          $Code = '';
          $Name = '';

          session_start();

          if($_SESSION['Action2']=='new')
          {
            session_destroy();
            session_start();
            $_SESSION['Action'] = 'create';
          }
          else
          {
            if($_SESSION['Action2']=='uptControll')
            {
              $Code  =   $_SESSION['SAM04CoDepart'];
              $Name    =  $_SESSION['SAM04DescpPart'];   
              session_destroy();
              session_start();
              $_SESSION['Action'] = 'update';
            }
          }
       ?>

    <div id="modal2" class="modal-fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <form action="../../Controlador/ConfigureController/cat_departamenControllert04.php" method="post">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Codigo">Codigo Departamento: </label>
                <div class="col-sm-10">
                <input type="text" class="from-control" value="<?php echo $GLOBALS['Code']; ?>" name="txt_Codigo"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Nombre">Nombre Departamento: </label>
                <div class="col-sm-10">
                <input type="text" class="from-control" value="<?php echo $GLOBALS['Name']; ?>" name="txt_Nombre"/>
                </div>
              </div>


              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Guardar</button>
  
                </div>
                </div>
            </form>
          </div>
        </div>
      </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="location.href='../ConfigureView/list_tip_department04.php'" 
            data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
</div>
</body>
      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>
