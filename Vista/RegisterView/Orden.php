<!DOCTYPE html>
<html lang="en">
<head>
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>S.A.M</title>
	<?php 
		   include('../../Modelo/DepartamentData/DepartamentoDatos.php');
    ?>
<script type="text/javascript" src="../js/Ajax.js"></script>
    
</head>
	<body>
    <?php
            include('../menu_admin.html'); 
         ?>
		<?php
                       $TypeDepart = new DepartamentoDatos();
                       $Lista2 = $TypeDepart->MostrarDepartamento();

         ?>

    <?php
            $Identiy    =  '';
            $Ubication  =  '';
            $CodDepart  =  '';
            $AnioTrans  =  '';
            $FeExt      =  ''; 
            $CedUsr     =  '';

            session_start();

            if (!isset($_SESSION['SAM03Ubic'])) 
            {
              session_destroy();
              session_start();
            $_SESSION['Action'] = 'create';
            }
            else
            {
             $Identiy   =  $_SESSION['SAM03CoOrd'];
             $Ubication =  $_SESSION['SAM03Ubic'];
             $CodDepart =  $_SESSION['SAM04CoDepart'];
             $AnioTrans =  $_SESSION['SAM03AnioTrans'];
             $FeExt     =  $_SESSION['SAM03FeExt'];
             $CedUsr    =  $_SESSION['SAM05CedUsr'];  
              session_destroy();
              session_start();
            $_SESSION['Action'] = 'update';
            }
         ?>
         <div class="container">
      <div class="jumbotron">
          <h2>Formulario de registro de Ordenes</h2>
      </div>
         <div class="col-md-12">
         <div class="form-horizontal" style="">
            <form action="../../Controlador/RegisterController/OrdenController.php" method="post">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_cod_ord">Codigo Orden: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['Identiy']; ?>" name="txt_cod_ord" id="codigo" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_ubicacion">Ubicacion: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['Ubication']; ?>" name="txt_ubicacion"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="drp_TipoDepart">Codigo de Departamento: </label>
                <div class="col-sm-10">
                <select name="sel_tipoDepart" class="form-control item-md" id="sel_tipoDepart" class="form-control">
                  <option value="0"> --Selecciona un departamento--</option>
                  <?php foreach($Lista2 as $row2){?>
                  <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>

        <?php
                echo "<script>
                setValueSelectDepar(sel_tipoDepart,'".$GLOBALS['CodDepart']."')
                </script>"; 
             ?>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_ano">Año Transferencia: </label>
                <div class="col-sm-10">
                <input type="date" class="form-control item-md" value="<?php echo $GLOBALS['AnioTrans']; ?>" name="txt_ano"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_fecha">Fecha Extrema: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['FeExt']; ?>" name="txt_fecha"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_cedUsr">Cedula Usuario: </label>
                <div class="col-sm-10">
                <input type="text" class="form-control item-md" value="<?php echo $GLOBALS['CedUsr']; ?>" name="txt_cedUsr"/>
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
	</body>
      <script src="../../Vista/js/jquery.min.js"></script>
      <script src="../../Vista/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../../Vista/js/FiltroOrden.js"></script>
</html>