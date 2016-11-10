$(document).ready
(
  function()
  {
    $('#box').hide();
     $('#boxclose').click(function()
     {
       $('#box').animate({'top':'-200px'},500,
        function()
        {
          $('#overlay').fadeOut('fast');
          $('#box').hide();
           $( "#OrdenDetail" ).empty();
        });
      });
  }
 );

function mostrarOrden(num)
{
    var x = num;
    var Datos = [];
    var Orden;
    $('#box').show();

   for (var i = 0; i <= 3 ; i++)
   {
     Datos[i] = $("#miTabla").find('tr:eq('+x+')').children("td").eq(i).html();
   };

    Orden = "<ul class='lista'>"+
              "<li id = 'codigoLI'>Codigo Orden: "+Datos[0]+"</li>"+
              "<li>Ubicacion: "+Datos[1]+"</li>"+
              "<li>Codigo Departamento:"+Datos[2]+"</li>"+
              "<li>Año transferencia:"+Datos[3]+"</li>"+
              "</ul>";

     $('#OrdenDetail').append(Orden);
 // document.getElementById('PersonalDetail').innerHTML = datos;

 $('#overlay').fadeIn('fast',
   function()
   {
     $('#box').animate({'top':'160px'},500);
   });
}