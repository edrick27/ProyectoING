function ocupado()
{
  var ex = 0;

       var valor = [];
       valor[0] = document.getElementById('txt_Cod').value;
       valor[1] = document.getElementById('txt_Ubi').value;
       valor[2] = document.getElementById('txt_Cod_Depa').value;
       valor[3] = document.getElementById('txt_Ano').value;

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



function GridFilter()
{
   //obtenemos el valor insertado a buscar
       var valor = [];
       valor[0] = document.getElementById('txt_Cod').value;
       valor[1] = document.getElementById('txt_Ubi').value;
       valor[2] = document.getElementById('txt_Cod_Depa').value;
       valor[3] = document.getElementById('txt_Ano').value;

        var r = ocupado();

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
                  var codigo = $(this).html();

                  if(!codigo.match(valor[i]))
                  {
                    $(this).parent().hide();
                  }
               }
             )
           }
         };
        }
}


function RemoveOrdenTable()
{
var IdOrder = $( "#OrdenDetail" ).find('ul').children("li").eq(0).html(); 
        var ID = IdOrder.split(" ");

    $("#miTabla tr").find('td:eq(0)').each
             (
               function () 
               {
                  var codigo = $(this).html();
 
                  if(codigo == ID[2])
                  { 
                    $(this).parent().empty();
                  }
               }
             )
}

 function setValueSelectDepar(SelectId, Value) //sirbe para setear el valor del combo
 {           
     var l =  SelectId.length;//cantidad de opciones que tiene un select

        for(index = 0;  index < l;  index++)
        {
            if(SelectId.options[index].value == Value)
            {
               SelectId.selectedIndex = index;
            }
        }
 }
