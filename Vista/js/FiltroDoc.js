function ocupado()
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



function GridFilter()
{
   //obtenemos el valor insertado a buscar
       var valor = [];
       valor[0] = document.getElementById('txt_DeparNum').value;
       valor[1] = document.getElementById('txt_Conten').value;
       valor[2] = document.getElementById('txt_Year').value;
       valor[3] = document.getElementById('txt_TypeDocument').value;
       valor[4] = document.getElementById('txt_contributor').value;
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

function RemoveDocTable()
{
var IdDoc = $( "#DocDetail" ).find('ul').children("li").eq(0).html(); 
        var ID = IdDoc.split(" ");

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
