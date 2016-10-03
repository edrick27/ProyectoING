<!DOCTYPE html>
<html>
<head>
<?php  
include('../Modelo/CapaDatos/DocumentData.php');
include('../Controlador/DocumentController.php');
include('../Modelo/CapaDatos/DepartamentoDatos.php'); 


$Data2 = new DepartamentoDatos(); 
$List2 = $Data2->MostrarDepartamento();  
?>
<script type="text/javascript" src="javaScript/Ajax.js"></script>
<script type="text/javascript" src="javaScript/FiltroPordepartamento.js"></script>
<script type="text/javascript" src="javaScript/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="javaScript/FiltroJquey.js"></script>
  <title>S.A.M</title>
</head>
<body>
        
         
                <label  for="txt_CodPrestamo">Codigo del prestamo: </label>
       
                <input type="text" class="from-control" readonly="readonly" name="txt_CodPrestamo"/>
               
                 <label class="col-sm-2 control-label" for="txt_Cedula">Cedula:</label>
               
                 <input type="text" class="from-control" name="txt_Cedula"/>
                 <button type="submit" class="btn btn-default">Verificar</button>
                 <button type="submit" class="btn btn-default">Buscar</button>
            

           
             <label class="col-sm-2 control-label" for="txt_Nombre">Nombre:  </label>              
               <div class="col-sm-10">
                    <input type="text" class="from-control" readonly="readonly" name="txt_Nombre"/>
                </div>
             </div>

                <div>
                Departamentos:
                <select name="sel_tipoUsr" id="comboDepart" onchange="showDocumentAJAX()" >
                  <option value="0"> --Seleccione un departamento--</option>
                  <?php foreach($List2 as $row2){?>
                  <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?></option>
                  <?php } ?>
                </select>
                </div>
      
  <br/>
       <a href="">Nuevo registro</a>
  <br/>
<table  id="miTabla">  
  <tr>
    <th>cedula</th>
    <th>nombre</th> 
    <th>primer apellido</th>
    <th>segundo apellido</th>
  </tr>

  <tr>
     <th><input type="text"   onkeyup="GridFilterDocument()"  id="txt_DeparNum"/></th>
     <th><input type="text"   onkeyup="GridFilterDocument()"  id="txt_Conten"/></th>
     <th><input type="text"   onkeyup="GridFilterDocument()"  id="txt_Year"/></th>
     <th><input type="text"   onkeyup="GridFilterDocument()"  id="txt_TypeDocument"/></th>
     <th><input type="text"   onkeyup="GridFilterDocument()"  id="txt_contributor"/></th>
  </tr>
</table>
</body>
</html>