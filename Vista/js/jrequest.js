function agregarSolicitud() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var identity = document.getElementById('txt_Cedula').value;
        var dateReq = document.getElementById('txt_DateRequest').value;

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
                if(respuesta == '1')
                {
                $('#blockTable').show();
                $("#btnGuardar").attr("disabled", "disabled");
                }
            }
        };
        xmlhttp.open("GET","../../Controlador/LendigController/reg_requestController.php?txt_Cedula="+identity+"&txt_DateRequest="+dateReq, true);
        xmlhttp.send();
}

function agregarDetalleSoli(INDEX) 
{
    var id = INDEX;

        var xmlhttp = ConstructorXMLHttpRequest();
        var RequestCode = document.getElementById('txt_CodPrestamo').value;
        var documentCode =  $(id).parent().parent().find('td:eq(0)').html();

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
                if(respuesta == '1')
                { 

                 $(id).parent().parent().css( "background-color", "#66ffc2" );

                 $(id).parent().parent().insertBefore( $("#miTabla").find('tr:eq(2)'));
                }
                else
                   {
                    $(id).parent().parent().css( "background-color", "#ff3333");
                   }
            }
        };
        xmlhttp.open("GET","../../Controlador/LendigController/reg_detrequestController.php?txt_CodeLending="+RequestCode+"&txt_DocumentCode="+documentCode, true);
        xmlhttp.send();

}



function check(INDEX)
{

    id = "#"+ INDEX;

    if($(id).prop('checked'))
    {

      agregarDetalleSoli(id);

    }  
    else
    {
     $(id).parent().parent().css( "background-color", "" );
    }
}