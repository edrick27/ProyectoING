

function CheackPerson() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var identity = document.getElementById('txt_Cedula').value;
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
               $('#txt_Nombre').val(respuesta);
                //document.getElementById('txt_Nombre').innerHTML = respuesta;
                $("#btnGuardar").removeAttr("disabled");
            }
        };
        xmlhttp.open("GET", "../../Controlador/LendigController/checkpersonController.php?ID="+identity, true);
        xmlhttp.send();
}

function showLendingAJAX() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var departamento = document.getElementById('comboDepart').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var json = xmlhttp.responseText;
                var nFilas = $("#miTabla tr").length;
                $('#respuesta').html('');

                if(nFilas>2)
                {
                   var filaremover = 2;
                   var valorCheck = $('#miTabla').find('tr:eq('+filaremover+')').find('td:eq(5)').children().prop('checked');

                  if(valorCheck)
                    { 
                        filaremover++;
                    }
                  
                    for (var i = 0; i != nFilas; i++) 
                    {
                      $('#miTabla').find('tr:eq('+filaremover+')').remove(); 
                    };
                }
                if(json == "no hay resultados")
                {
                     $('#respuesta').html('NO SE ENCONTRARON RESULTADOS');
                     $('#respuesta').show();
                     $('#respuesta').hide(5000);
                }
                else 
                {
                    $('#miTabla').append(json);  
                }
            }
        };
        xmlhttp.open("GET", "../../Controlador/LendigController/reg_lendingtablaController09.php?D="+departamento, false);
        xmlhttp.send();
}