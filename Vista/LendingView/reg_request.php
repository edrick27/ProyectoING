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
    <?php  
      include('../../Modelo/LendingData/reg_request_Data.php'); 
      include('../../Controlador/LendigController/ShoxMaxcontroller.php'); 
      session_start();
      $IdPerson =  $_SESSION["id"];
      $Data2 = new reg_request_Data(); 
      $List2 = $Data2->ShowRequestByPerson($IdPerson);  
      $request = new ShowMaxController(); 
      $code = $request->MaxCodPres();
    ?>
  </head>
  <body>
    <?php 
      include('../menu_admin.html');  
    ?> 

    <div class="container">
      <div class="col-md-6">
        <div class="form-group">
          <label  for="txt_CodPrestamo">Codigo del Solicitud</label>
          <input type="text" class="form-control item-md" value="<?php echo $code ; ?>" readonly="readonly" id="txt_CodPrestamo"/>
        </div>

        <div class="form-group">
          <label for="txt_Cedula">Numero de cedula:</label>
          <input type="text" class="form-control item-md" value="<?php echo $_SESSION["id"]; ?>" id="txt_Cedula" readonly="ReadOnly" name="txt_Cedula"/>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="txt_NombrePersona">Bienvenido:</label>
          <input type="text" class="form-control item-md" value="<?php echo $_SESSION["nombre"]; ?>" id="txt_NombrePersona" readonly="ReadOnly" name="txt_NombrePersona"/>
        </div>

        <div class="form-group">
          <label  for="txt_DateRequest">Fecha Solicitud: </label>
          <input type="text" class="form-control item-md" value="<?php echo date("Y-m-d");?>" readonly="ReadOnly" id="txt_DateRequest" name="txt_DateRequest"/>
        </div>

        <div class="form-group">
          <button type="submit" onclick="agregarSolicitud()" id="btnGuardar" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="form-group">
        <div id="blockTable" style="display:none">
        <br/>
        <br/>
  
          <div class="alert alert-warning" id="respuesta"></div>
        <br/>
        <br/>
            <div class="table-responsive">
              <table class="table table-condensed table-hover" id="miTabla">  
                <tr class="warning">
                  <th>Codigo Documento</th>
                  <th>Descripcion</th> 
                  <th>Fecha tranferecia</th>
                  <th>Tipo Documento</th>
                  <th>Contribuyente</th>
                </tr>
          
                <tr>
                  <th><input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_DeparNum"/></th>
                  <th><input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_Conten"/></th>
                  <th><input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_Year"/></th>
                  <th><input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_TypeDocument"/></th>
                  <th><input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_contributor"/></th>
                </tr>
            <?php
              $count = 0;
                foreach ($List2 as $row) 
                  {
            ?>
                <tr>
                  <td><?php echo $row['SAM01CoDoc']; ?></td>
                  <td><?php echo $row["SAM01Conte"]; ?></td>
                  <td><?php echo $row["SAM01Contri"]; ?></td>
                  <td><?php echo $row["SAM01Anio"];?></td>
                  <td><?php echo $row["SAM02Descp"]; ?></td>
                  <td><?php echo "<input type='checkbox' id=".$count." onclick='check(".$count.")'; >"?></td>
                </tr>
            <?php
              $count++;
                  }
            ?>
              </table>
          </div>
          <br/>
          <button type="submit" class="btn btn-success">
            <a class="btn-success" target="_blank" href="../../Controlador/LendigController/request_reportController.php?code=<?php echo $code ; ?>">GENERAR COMPROBANTE</a>
          </button>
        </div>
      </div>
    </div> 
</body>
  <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script> 
  <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../Vista/js/Ajax.js"></script>
  <script type="text/javascript" src="../../Vista/js/FiltroLending.js"></script>
  <script type="text/javascript" src="../../Vista/js/FiltroPordepartamentoLending.js"></script>
  <script type="text/javascript" src="../../Vista/js/jrequest.js"></script>
</html>