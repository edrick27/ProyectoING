<!DOCTYPE html>
<html>
<head>
<?php  
include('../Modelo/CapaDatos/DepartamentoDatos.php'); 
$Data2 = new DepartamentoDatos();    
$List2 = $Data2->MostrarDepartamento();   
?>
<script type="text/javascript" src="javaScript/Ajax.js"></script>
<script type="text/javascript" src="javaScript/FiltroPordepartamento.js"></script>
<script type="text/javascript" src="javaScript/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="javaScript/pruebaJquery.js"></script>
<script type="text/javascript" src="javaScript/popup.js"></script>
<link rel="stylesheet" type="text/css" href="style/CSS3/estilo_pop-up.css">
  <title></title>
</head>
<body>
        
                <div>
                Departamentos:
                <select name="sel_tipoUsr" id="comboDepart" onchange="show()" >
                  <option value="0"> --Seleccione un departamento--</option>
                  <?php foreach($List2 as $row2){?>
                  <option value="<?php echo $row2['code']; ?>"><?php echo $row2['description']; ?></option>
                  <?php } ?>
                </select>
                </div>
      
  <br/>
       <a href="persona.php">Nuevo registro</a>
  <br/>
<table  id="miTabla">  
  <tr>
    <th>cedula</th>
    <th>nombre</th> 
    <th>primer apellido</th>
    <th>segundo apellido</th>
  </tr>

  <tr>
     <th><input type="text"   onkeyup="GridFilter()"  id="txt_ID"/></th>
     <th><input type="text"   onkeyup="GridFilter()"  id="txt_namePerson"/></th>
     <th><input type="text"   onkeyup="GridFilter()"  id="txt_firstsourname"/></th>
     <th><input type="text"   onkeyup="GridFilter()"  id="txt_secondsourname"/></th>
  </tr>
</table>
  
 <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box">
            <a class="boxclose" id="boxclose"></a>
            <h1>¿Esta seguro que desea eliminar este registro?</h1>
            <p>
              <div id="PersonalDetail"> </div>
                 <input type="submit" value="Eliminar" onclick="DeletePersonAjax()" id="BtnDelete"  />
            </p>
        </div>
</body>
</html>