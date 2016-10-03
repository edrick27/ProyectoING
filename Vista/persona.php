<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=divice-width, initial-scale=1">
    <title>Regitro</title></title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <?php  include('../Modelo/CapaDatos/DepartamentoDatos.php'); 
           include('../Modelo/CapaDatos/TipoUsuarioDatos.php');
    ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="style/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="javaScript/Ajax.js"></script>
      <script type="text/javascript" src="javaScript/jquery-3.1.0.min.js"></script>
      <script type="text/javascript" src="javaScript/pruebaJquery.js"></script>
  </head>
  <body>
  <!--header-->
    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle"collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">CRUD</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="GridPerson.php">Grilla</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                 <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"></a>
                   <ul class="dropdown-menu">
                       <li><a href="index.php?m=empleado">Nuevo registro</a></li>
                   </ul>
                </li>
             </ul>
           </div>
          </div>
        </nav>
      </header>

      <body>
        
                 <?php $Departamento = new DepartamentoDatos(); 
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

                         if ($_SESSION['SAM07CedUsr'] == null) 
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
         <div id="respuesta">d</div>
            <form action="../Controlador/PersonaController.php" method="post">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_cedula">Cedula: </label>
                <div class="col-sm-10">
                <input type="text" class="from-control" value="<?php echo  $GLOBALS['Identiy'];?>" name="txt_cedula"/>
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
                  <?php foreach($Lista2 as $row2){?>
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
             echo "<script>
             setValueSelectDepar(sel_tipoUsr,'".$GLOBALS['TypeUser'] ."');
                  </script>";
             echo "<script>
             setValueSelectDepar(sel_departamento,'".$GLOBALS['departament']."');
                  </script>";
?>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
   </body>
</html>
