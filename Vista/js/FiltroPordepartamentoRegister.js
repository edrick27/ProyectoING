function showOrder()
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
                  for (var i = 0; i != nFilas; i++)
                  {
                     $('#miTabla').find('tr:eq(2)').remove();
                  };
                }
                if(json == "no hay resultados")
                {
                     $('#respuesta').html('NO SE ENCONTRARON RESULTADOS');
                     $('#respuesta').show();
                     $('#respuesta').hide(5000);
                     //$('#respuesta').html(json);
                }
                else 
                {
                    $('#miTabla').append(json);  
                }
            }
        };
        xmlhttp.open("GET", "../../Controlador/RegisterController/OrdenGrid.php?D="+departamento, false);
        xmlhttp.send();
}


function DeleteOrdenAjax()
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var IdOrden = $( "#OrdenDetail" ).find('ul').children("li").eq(0).html();
        var ID = IdOrden.split(" ");

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                var json = xmlhttp.responseText;

                 RemoveOrdenTable();
                $( "#OrdenDetail" ).empty();
                $( "#OrdenDetail" ).append(json);
            }
        };
        xmlhttp.open("GET", "../../Controlador/RegisterController/DeleteOrdenController.php?idOrden="+ID[2], true);
        xmlhttp.send();
}

function DeleteDocumentAjax()
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var IdDoc = $( "#DocDetail" ).find('ul').children("li").eq(0).html();
        var ID = IdDoc.split(" ");

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                var json = xmlhttp.responseText;

                 RemoveDocTable();
                $( "#DocDetail" ).empty();
                $( "#DocDetail" ).append(json);
            }
        };
        xmlhttp.open("GET", "../../Controlador/RegisterController/DeleteDocController.php?idDoc="+ID[2], true);
        xmlhttp.send();
}

function showDocumentAjax()
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
                  for (var i = 0; i != nFilas; i++)
                  {
                     $('#miTabla').find('tr:eq(2)').remove();
                  };
                }
                if(json == "no hay resultados")
                {
                     $('#respuesta').html(json);
                }
                else 
                {
                    $('#miTabla').append(json);  
                }
            }
        };
        xmlhttp.open("GET", "../../Controlador/RegisterController/reg_DocumenttablaController01.php?D="+departamento, false);
        xmlhttp.send();
}