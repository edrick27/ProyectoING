
function ocupadoDocument()
{
  var ex = 0;

       var valor = [];
       valor[0] = document.getElementById('txt_DeparNum').value;
       valor[1] = document.getElementById('txt_Conten').value;
       valor[2] = document.getElementById('txt_Year').value;
       valor[3] = document.getElementById('txt_TypeDocument').value;
       valor[4] = document.getElementById('txt_contributor').value;

   for (var i = 0 ; i < valor.length; i++) 
   {
      if (valor[i] != "") 
        {
          ex = 1;
          break;
        }; 
   };

   return ex;
}



function GridFilterDocument()
{
   //obtenemos el valor insertado a buscar
       var valor = [];
       valor[0] = document.getElementById('txt_DeparNum').value;
       valor[1] = document.getElementById('txt_Conten').value;
       valor[2] = document.getElementById('txt_Year').value;
       valor[3] = document.getElementById('txt_TypeDocument').value;
       valor[4] = document.getElementById('txt_contributor').value;
       
        var r = ocupadoDocument();

        if(r == 0)
        {
          $("#miTabla tr").show();
        }
        else
        {
          $("#miTabla tr").show();
       
         for (var i = 0; i < valor.length; i++) 
         {       
           if(valor[i] != "")
           {
             $("#miTabla tr").find('td:eq('+i+')').each
             (
               function () 
               {
                 var valorCheck = $(this).parent().find('td:eq(5)').children().prop('checked');

                if(!valorCheck)//esta funcion se encarga de verificar si la fila esta selecionada
                {
                  var codigo = $(this).html();
 
                  if(!codigo.match(valor[i]))
                  { 
                    $(this).parent().hide();
                  }
                }
               }
             )
           }
         };
        }
}


