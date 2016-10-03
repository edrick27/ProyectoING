function show() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var departamento = document.getElementById('comboDepart').value;
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var json = xmlhttp.responseText;
                var nFilas = $("#miTabla tr").length;


                if(nFilas>2)
                {
                  for (var i = 0; i != nFilas; i++) 
                  {
                     $('#miTabla').find('tr:eq(2)').remove(); 
                  };
                }
     
                $('#miTabla').append(json);
            }
        };
        xmlhttp.open("GET", "PersonalDepartamento.php?D="+departamento, false);
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
                
<<<<<<< HEAD
                 RemovePersonDeleted();
=======
                 RemovePersonDeleted(ID[1]);
>>>>>>> origin/master
                $( "#PersonalDetail" ).empty();
                $( "#PersonalDetail" ).append(json);
            }
        };
        xmlhttp.open("GET", "../Controlador/DeletePerson.php?cedulaLI="+ID[1], true);
        xmlhttp.send();
}