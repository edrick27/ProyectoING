      function ocultarBoton1()
      {
        
        $('#modi').hide();
        $('#save').show();
      }

      function ocultarBoton3()
      {
        var id = $('#miTabla >tbody >tr').last().find('td:eq(0)').html();//.css( "background-color", "#ff3333");
        var num = parseInt(id)+1;

        $('#txt_Codigo').val(num);
        $('#txt_Codigo').attr('disabled', 'disabled');

        $('#modi').hide();
        $('#save').show();
      }

//ed
      function ocultarBoton2(num)
      {
          var id = $("#miTabla").find('tr:eq('+num+')').children("td:eq(0)").html(); 
          var descripcion = $("#miTabla").find('tr:eq('+num+')').children("td:eq(1)").html(); 

          $('#txt_Codigo').val(id);
          $('#txt_Nombre').val(descripcion);

        $('#save').hide();
        $('#modi').show();


      }     

      function ocultarBoton4(num)
      {
          var id = $("#miTabla >tbody ").find('tr:eq('+num+')').children("td:eq(0)").html(); 
          var descripcion = $("#miTabla >tbody").find('tr:eq('+num+')').children("td:eq(1)").html(); 

          //$('#txt_Codigo').attr('disabled', 'disabled');
          $('#txt_Codigo').val(id).attr('disabled', 'disabled');
          $('#txt_Nombre').val(descripcion);

      	$('#save').hide();
      	$('#modi').show();


      }
  
function GuardarDepartamento() 
{
        var xmlhttp = ConstructorXMLHttpRequest();

        var id = document.getElementById('txt_Codigo').value;
        var descripcion = document.getElementById('txt_Nombre').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
                
               $('#result').html(respuesta);
            }
        };
        xmlhttp.open("GET", "../../Controlador/ConfigureController/cat_departamenControllert04.php?txt_Codigo="+id+"&txt_Nombre="+descripcion, true);
        xmlhttp.send();
}

function ActualizarDepartamento() 
{
        var xmlhttp = ConstructorXMLHttpRequest();

        var id = document.getElementById('txt_Codigo').value;
        var descripcion = document.getElementById('txt_Nombre').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
                
               $('#result').html(respuesta);
            }
        };
        xmlhttp.open("GET", "../../Controlador/ConfigureController/updateDepartment.php?txt_Codigo="+id+"&txt_Nombre="+descripcion, true);
        xmlhttp.send();
      }

      function GuardarDocumento() 
{
        var xmlhttp = ConstructorXMLHttpRequest();

        var id = document.getElementById('txt_Codigo').value;
        var descripcion = document.getElementById('txt_Nombre').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
                
               $('#result').html(respuesta);
            }
        };
        xmlhttp.open("GET", "../../Controlador/ConfigureController/tip_documentController02.php?txt_Codigo="+id+"&txt_Nombre="+descripcion, true);
        xmlhttp.send();
}

function ActualizarDocumento() 
{
        var xmlhttp = ConstructorXMLHttpRequest();

        var id = document.getElementById('txt_Codigo').value;
        var descripcion = document.getElementById('txt_Nombre').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
                
               $('#result').html(respuesta);
            }
        };
        xmlhttp.open("GET", "../../Controlador/ConfigureController/updateDocument.php?txt_Codigo="+id+"&txt_Nombre="+descripcion, true);
        xmlhttp.send();
      }
function  ultimo()
{

  var id = $('#miTabla >tbody >tr').last().find('td:eq(0)').html();//.css( "background-color", "#ff3333");
   
   var num = parseInt(id)+1;
   
   alert(num);
}