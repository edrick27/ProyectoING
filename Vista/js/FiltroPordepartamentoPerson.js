function showPerson() 
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
                }
                else 
                {
                    $('#miTabla').append(json);  
                }
            }
        };
        xmlhttp.open("GET", "../../Controlador/PersonController/PersonalGrid.php?D="+departamento, false);
        xmlhttp.send();
}


function DeletePersonAjax() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var IdPerson = $( "#PersonalDetail" ).find('ul').children("li").eq(0).html(); 
        var ID = IdPerson.split(" ");

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var json = xmlhttp.responseText;
                
                 RemovePersonDeleted();
                $( "#PersonalDetail" ).empty();
                $( "#PersonalDetail" ).append(json);
            }
        };
        xmlhttp.open("GET", "../../Controlador/PersonController/DeletePerson.php?cedulaLI="+ID[1], true);
        xmlhttp.send();
}