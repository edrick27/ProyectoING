function agregarPrestamo() 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var identity = document.getElementById('txt_Cedula').value;
        var dateReturn = document.getElementById('txt_ReturnDate').value;
        var dateLending = document.getElementById('txt_DateLending').value;

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
        xmlhttp.open("GET","../../Controlador/LendigController/reg_lendingController09.php?txt_Cedula="+identity+"&txt_ReturnDate="+dateReturn+"&txt_DateLending="+dateLending, true);
        xmlhttp.send();
}

function agregarDetallePrestamo(INDEX) 
{
        var xmlhttp = ConstructorXMLHttpRequest();
        var id =  INDEX;
        var LendingCode = document.getElementById('txt_CodPrestamo').value;
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
        xmlhttp.open("GET","../../Controlador/LendigController/det_lendingController10.php?txt_CodeLending="+LendingCode+"&txt_DocumentCode="+documentCode, true);
        xmlhttp.send();

}

function check(INDEX)
{

    id = "#"+ INDEX;

    if($(id).prop('checked'))
    {

      agregarDetallePrestamo(id);

    }  
    else
    {
     $(id).parent().parent().css( "background-color", "" );
    }
}


function clasificarEstados()
{
    var Estado;

    $("#miTabla tr").find('td:eq(5)').each
       (
  function () 
       {
           Estado = $(this).html();

           if (Estado == "Transicion") 
           {
              $(this).parent().css( "background-color", "#cc66ff");
           }
           else 
             {
               if (Estado == "Prestado") 
               {
                $(this).parent().css( "background-color", "#99bbff");
               }
             } 
        }
       )
}


  
$( document ).ready(
  function()
  {
    clasificarEstados();
  }
);

function ReturnLending(INDEX)
{
        var id = "#"+ INDEX;
        var xmlhttp = ConstructorXMLHttpRequest();
        var Code =  $(id).parent().parent().find('td:eq(0)').html();

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
                if(respuesta == '1')
                {
                  $(id).parent().parent().empty();
                }
                else
                {
                  
                }
            }
        };
        xmlhttp.open("GET","../../Controlador/LendigController/ReturnLendingController.php?ID="+Code, true);
        xmlhttp.send();  

}

function ConfirmLending(INDEX)
{
      var id = "#"+ INDEX;
        var xmlhttp = ConstructorXMLHttpRequest();
        var Code =  $(id).parent().parent().find('td:eq(0)').html();

        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                var respuesta = xmlhttp.responseText;
               
                if(respuesta == '1')
                {
                   $(id).parent().parent().css( "background-color", "#99bbff");
                   $(id).parent().parent().find('td:eq(5)').html('Prestado');
                   $(id).hide();
                   $(id).parent().parent().find('td:eq(6)').append("<input type='Button' value='Devolver' id="+INDEX+" onclick='ReturnLending("+INDEX+")'; >");
                   window.open("../../Controlador/LendigController/reportController.php?code=19",'','width=600,height=400,left=50,top=50,toolbar=yes');
                }
                else
                {
                  
                }
            }
        };
        xmlhttp.open("GET","../../Controlador/LendigController/ConfirmLendingController.php?ID="+Code, true);
        xmlhttp.send();  
}