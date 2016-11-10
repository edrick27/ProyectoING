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

    <?php  
      include('../../Modelo/DepartamentData/DepartamentoDatos.php'); 
      $Data2 = new DepartamentoDatos(); 
      $List2 = $Data2->MostrarDepartamento();  
    ?>

  </head>
  <body>
     <?php 
        include('../menu_admin.html');
      ?>
    <section>
      <div class="container">
        <div class="form-group">
          <label for="sel_tipoUsr">Departamentos:</label>
          <select class="form-control item-md" name="sel_tipoUsr" id="comboDepart" onchange="showDocumentAjax()" >
            <option value="0">
             --Seleccione un departamento--
            </option>
            <?php 
            foreach($List2 as $row2)
              {
            ?>
              <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?>
                
              </option>
            <?php 
              } 
            ?>
          </select>
        </div>
      </div>
    
      <br/>
     <!--<a href="Documento.php">Nuevo registro</a>-->
       <div class="container">
        <input type="button" class="btn btn-success" onclick="location.href='Orden.php'" value="Nuevo registro">
        <br/>
        <br/>
        <div class="alert alert-warning" id="respuesta">
        </div>
        <br/>
        <div class="table-responsive">
          <table class="table table-condensed table-hover" id="miTabla">  
            <tr>
              <th>Codigo Documento</th>
              <th>Descripcion</th> 
              <th>Fecha tranferecia</th>
              <th>Tipo Documento</th>
              <th>Contribuyente</th>
              <th>Accion</th>
            </tr>

            <tr>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilter()"  id="txt_DeparNum"/>
              </th>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilter()"  id="txt_Conten"/>
              </th>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilter()"  id="txt_Year"/>
              </th>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilter()"  id="txt_TypeDocument"/>
              </th>
              <th>
                <input class="form-control" type="text"   onkeyup="GridFilter()"  id="txt_contributor"/>
              </th>
              <th>
                
              </th>
            </tr>
          </table>
        </div>

       <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box">
          <div class="modal-header">
            <a data-dismiss="modal" class="close" id="boxclose">X</a>
            <h4>¿Esta seguro que desea eliminar este registro?</h4>
          </div>
            <div class="modal-body" id="DocDetail"> </div>
          <div class="footer">
              <input type="submit"  class="btn btn-danger" value="Eliminar" onclick="DeleteDocumentAjax()" id="BtnDelete"  />
          </div>  
       </div>
      </div>
    </section>
    <footer>
    
    </footer>
</body>
  <script src="../../Vista/js/jquery.min.js"></script>
  <script src="../../Vista/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../Vista/js/Ajax.js"></script>
  <script type="text/javascript" src="../../Vista/js/FiltroPordepartamentoRegister.js"></script>
  <script type="text/javascript" src="../../Vista/js/FiltroDoc.js"></script>
  <script type="text/javascript" src="../../Vista/js/popupDoc.js"></script>
</html>