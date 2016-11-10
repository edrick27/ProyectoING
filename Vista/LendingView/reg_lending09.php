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
      include('../../Modelo/DepartamentData/DepartamentoDatos.php'); 
      include('../../Controlador/LendigController/ShoxMaxcontroller.php'); 
      $Data2 = new DepartamentoDatos(); 
      $List2 = $Data2->MostrarDepartamento();  
      $lending = new ShowMaxController(); 
      $code =  $lending->MaxCodPres();
    ?>
  </head>
  <body>
    <?php 
      include('../menu_admin.html');
    ?>

    <div class="container">
      <div class="col-md-6">
        <div class="form-group">
          <label  for="txt_CodPrestamo">Codigo del prestamo: </label>    
          <input type="text" class="form-control item-md" value="<?php echo $code ; ?>" readonly="readonly" id="txt_CodPrestamo"/>
        </div>
        
        <div class="form-group">
          <label for="txt_Cedula">Cedula:</label>
          <input type="text" class="form-control item-md has-feedback" id="txt_Cedula" name="txt_Cedula" onkeyup="CheackPerson()" />
        </div>
        
      
        <div class="form-group">
          <label  for="txt_DateLending">Fecha Prestamo: </label>
          <input type="date" class="form-control item-md" value="<?php echo date("Y-m-d");?>" id="txt_DateLending" name="txt_DateLending"/>
        </div>
      </div>
        
      <div class="col-md-6">
        <div class="form-group">
          <label for="txt_Nombre"> Nombre de empleado:  </label>            
          <input type="text" class="form-control item-md" readonly="reonly" id="txt_Nombre" name="txt_Nombre"/>
        </div>
        
        <!-- <input type="checkbox" checked /> -->
          
        <div class="form-group">
          <label for="txt_ReturnDate">Fecha Devolucion: </label>
          <input type="date" class="form-control item-md" id="txt_ReturnDate" name="txt_ReturnDate"/>
        </div>
        
        <div class="form-group">
          <button type="submit" onclick="agregarPrestamo()" id="btnGuardar" class="btn btn-success">
            Guardar
          </button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="form-group">
        <div id="blockTable" style="display:none">

          <br>
          <label for="comboDepart">Departamentos: </label>
          <select class="form-control item-md" name="sel_tipoUsr" id="comboDepart" onchange="showLendingAJAX()" >
            <option value="0"> --Seleccione un departamento--</option>
              <?php foreach($List2 as $row2)
                {
                  echo "<option value='".$row2['code']."'>".$row2['description']."</option>";
                } 
              ?>
          </select>
        <br/>
        <div class="alert alert-warning" id="respuesta">
          
        </div>
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

              <th>
                <input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_DeparNum"/>
              </th>

              <th>
                <input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_Conten"/>
              </th>

              <th>
                <input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_Year"/>
              </th>

              <th>
                <input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_TypeDocument"/>
              </th>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilterDocument()"  id="txt_contributor"/>
              </th>

            </tr>
          </table>
        </div>
          <br/>
         <button type="submit" class="btn btn-success">
            <a class="btn-success" target="_blank" href="../../Controlador/LendigController/reportController.php?code=<?php echo $code ; ?>">GENERAR BOLETA</a>
          </button>  
        </div>
      </div>
    </div>
  </body>
    <script type="text/javascript" src="../../Vista/js/jquery.min.js"></script> 
    <script type="text/javascript" src="../../Vista/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../Vista/js/Ajax.js"></script>
    <script type="text/javascript" src="../../Vista/js/FiltroPordepartamentoLending.js"></script>
    <script type="text/javascript" src="../../Vista/js/FiltroLending.js"></script>
    <script type="text/javascript" src="../../Vista/js/Jprestamo.js"></script>
</html>