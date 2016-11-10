<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../Vista/css/estructra.css">    
    <link rel="stylesheet" href="../../Vista/css/estilo_pop-up.css">
    <link href="../../Vista/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
    <meta charset="UTF-8">   
    <title>S.A.M</title>    
    <?php 
         include('../../Modelo/DepartamentData/DepartamentoDatos.php'); 
         include('../../Modelo/PersonData/TipoUsuarioDatos.php');
    ?>
          <script type="text/javascript" src="../js/Ajax.js"></script>
  </head>
  <body>
    <?php 
        include('../menu_admin.html');
     ?>
    <?php 
      $Departamento = new DepartamentoDatos(); 
      $Lista = $Departamento->MostrarDepartamento();
      $TypeUser = new TipoUsuarioDatos();
      $Lista2 = $TypeUser->showTypeUser(); 
      $Identiy    =  '';
      $Name       =   '';
      $sourname1  =  '';
      $sourname2  =  '';
      $email      =  '';
      $phoneOfice =  '';
      $phonePersonal = '';
      $password   =  '';
      $TypeUser   =  '';
      $departament = '';

      session_start();

      if (!isset($_SESSION['SAM07CedUsr'])) 
      {
        session_destroy();
        session_start();
        $_SESSION['Action'] = 'create';
      }
      else
      {
        $Identiy =   $_SESSION['SAM07CedUsr'];
        $Name    =   $_SESSION['SAM07NomPers'];
        $sourname1 = $_SESSION['SAM07ApePers1'];
        $sourname2 = $_SESSION['SAM07ApePers2'];
        $email =     $_SESSION['SAM07CorrPers'];
        $phoneOfice = $_SESSION['SAM07TelefOfi'];
        $phonePersonal = $_SESSION['SAM07TelefPers'];
        $password =   $_SESSION['SAM05Contra'];
        $TypeUser =   $_SESSION['SAM06CoTipUsr'];
        $departament = $_SESSION['SAM04CoDepart'];   
        session_destroy();
        session_start();
       $_SESSION['Action'] = 'update';
      }
    ?>
  <div class="container">
    <div class="jumbotron">
      <h2>Formulario de registro de persona</h2>
    </div>
      <div class="col-md-12">
        <div class="form-horizontal" style="">
          <form action="../../Controlador/PersonController/PersonaController.php" method="post">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_cedula">Cedula: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" /*class="form-control"*/ value="<?php echo  $GLOBALS['Identiy'];?>" name="txt_cedula"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_nombre">Nombre: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['Name'];?>" name="txt_nombre"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_pr_apellido">Primer Apellido: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['sourname1'];?>" name="txt_pr_apellido"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_se_apellido">Segundo Apellido: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['sourname2'];?>" name="txt_se_apellido"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_correo">Correo: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['email'];?>" name="txt_correo"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_tele_perso">Telefono Personal: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['phoneOfice'];?>" name="txt_tele_perso"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_tele_ofi">Telefono Oficina: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['phonePersonal'];?>" name="txt_tele_ofi"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_contra">Contraseña: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" value="<?php echo  $GLOBALS['password'];?>" name="txt_contra"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="txt_ve_contra">Verificar Contraseña: </label>
              <div class="col-sm-10">
              <input type="text" class="from-control" name="txt_ve_contra"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="drp_TipoUsr">Tipo de usuario: </label>
            <div class="col-sm-10">
              <select name="sel_tipoUsr" id="sel_tipoUsr" class="form-control">
                <option value="0"> --Selecciona--</option>
                <?php 
                foreach($Lista2 as $row2){?>
                <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
                   
          <div class="form-group">
            <label class="col-sm-2 control-label" for="drp_departamento">Numero de departamento: </label>
            <div class="col-sm-10">
              <select name="sel_departamento" id="sel_departamento" class="form-control">
                <option value="0"> --Seleccione un departamento--</option>
                <?php foreach($Lista as $row){?>
                <option value="<?php echo $row['code']; ?>"><?php echo $row['description']; ?></option>
                <?php }  ?>
              </select>
            </div>
          </div>
          <?php
            echo "<script>setValueSelectDepar(sel_tipoUsr,'".$GLOBALS['TypeUser'] ."');</script>";
            echo "<script>setValueSelectDepar(sel_departamento,'".$GLOBALS['departament']."');</script>";
          ?>
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
      <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script>
      <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../../Vista/js/FiltroPordepartamentoPerson.js"></script>
</html>
