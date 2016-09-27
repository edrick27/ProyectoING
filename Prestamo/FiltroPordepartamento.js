function showDocumentAJAX() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var departamento = document.getElementById('comboDepart').value;
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var json = xmlhttp.responseText;
                var nFilas = $("#miTabla tr").length;

                nFilas = nFilas - 2;

                if(nFilas>2)
                {
                  for (var i = 0; i != nFilas; i++) 
                  {
                     $('#miTabla').find('tr:eq(3)').remove(); 
                  };
                }
     
                $('#miTabla').append(json);
            }
        };
        xmlhttp.open("GET", "../Controlador/DocumentControler.php?D="+departamento, false);
        xmlhttp.send();
}


function CheackPerson() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var identity = document.getElementById('txt_Cedula').value;
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
                document.getElementById('txt_Nombre').innerHTML = respuesta;
            }
        };
        xmlhttp.open("GET", "../Controlador/CheckControler.php?ID="+identity, false);
        xmlhttp.send();
}