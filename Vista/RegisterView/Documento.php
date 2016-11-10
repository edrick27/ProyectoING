<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>S.A.M</title>
    <script type="text/javascript" src="../js/Ajax.js"></script>
    <?php  
        include('../../Modelo/DepartamentData/DepartamentoDatos.php'); 
        include('../../Modelo/RegisterData/TipoDocumento.php');
    ?>
  </head>
      <body>
        <?php
            include('../menu_admin.html'); 
         ?>
         
        <?php
                       $TypeUser = new TipoDocumento();
                       $Lista2 = $TypeUser->mostrarTipoDocu();

                 ?>
                 <?php 
                       $IdentiyDoc = '';
                       $Identiy    = '';
                       $CodDoc     = '';
                       $Conte      = '';
                       $Note       = '';
                       $Contri     = '';
                       $Anio       = '';
                       $FeExt      = '';

                       session_start();

                       if($_SESSION['Action2']=='ord')
                       {
                        $Identiy    = $_SESSION['SAM03CoOrd'];
                        session_destroy();
                        session_start();
                        $_SESSION['Action'] = 'create';
                       }
                       else
                       {
                        if($_SESSION['Action2'] == 'uptControll')
                        {
                           $IdentiyDoc = $_SESSION['SAM01CoDoc'];
                           $Identiy    = $_SESSION['SAM03CoOrd'];
                           $CodDoc     = $_SESSION['SAM02CoTipDoc'];
                           $Conte      = $_SESSION['SAM01Conte'];
                           $Note       = $_SESSION['SAM01Note'];
                           $Contri     = $_SESSION['SAM01Contri'];
                           $Anio       = $_SESSION['SAM01Anio'];
                           $FeExt      = $_SESSION['SAM01FeExt'];
                           session_destroy();

                           session_start();
                           $_SESSION['Action'] = 'update';
                        }
                        else if($_SESSION['Action2'] == 'eliControl')
                        {
                          $Identiy    = $_SESSION['SAM03CoOrd'];
                          session_destroy();

                          session_start();
                          $_SESSION['Action'] = 'create';
                        }
                       }
                  ?>

      <div class="container">
      <div class="jumbotron">
          <h2>Formulario de registro de Documentos</h2>
      </div>
         <div class="col-md-12">
         <div class="form-horizontal" style="">
            <form action="../../Controlador/RegisterController/DocumentoController.php" method="post">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_cod_doc">Codigo Documento: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['IdentiyDoc']; ?>" name="txt_cod_doc"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_orden">Codigo Orden: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['Identiy']; ?>" readonly="readonly" name="txt_orden"/>
                <button type="submit" class="btn btn-success">  
                  <a class="btn-success" href="ListaOrden.php">Elegir de Ordenes</a>
                </button>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="drp_TipoDoc">Tipo de Documento: </label>
                <div class="col-sm-10">
                <select name="sel_tipoDoc" class="form-control item-md" id="sel_tipoDoc" class="form-control">
                  <option value="0"> --Selecciona un departamento--</option>
                  <?php foreach($Lista2 as $row2){?>
                  <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>

            <?php
                echo "<script>
                setValueSelectDepar(sel_tipoDoc,'".$GLOBALS['CodDoc']."')
                </script>"; 
             ?>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_des_doc">Descripcion del Documento: </label>
                <div class="col-sm-10">
                <input  type="text" class="form-control item-md" value="<?php echo $GLOBALS['Conte']; ?>" name="txt_des_doc" rows="4" cols="70"></input>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_nota">Nota: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['Note']; ?>" name="txt_nota"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_contri">Contribuyente: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['Contri']; ?>" name="txt_contri"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_ano">Año: </label>
                <div class="col-sm-10">
                <input type="date" class="form-control item-md" value="<?php echo $GLOBALS['Anio']; ?>" name="txt_ano"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_fecha">Fecha Extrema: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['FeExt']; ?>" name="txt_fecha"/>
                </div>
              </div>


              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Guardar</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
   </body>
      <script src="../../Vista/js/jquery.min.js"></script>
      <script src="../../Vista/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/filtroDoc.js"></script>
</html>
