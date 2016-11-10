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
           $( "#DocDetail" ).empty();
        });
      });
  }
 );

function mostrarDoc(num)
{
    var x = num;
    var Datos = [];
    var Doc;
    $('#box').show();

   for (var i = 0; i <= 3 ; i++)
   {
     Datos[i] = $("#miTabla").find('tr:eq('+x+')').children("td").eq(i).html();
   };

    Doc = "<ul class='lista'>"+
              "<li id = 'codigoLI'>Codigo Documento: "+Datos[0]+"</li>"+
              "<li>Codigo Orden: "+Datos[1]+"</li>"+
              "<li>Tipo Documento: "+Datos[3]+"</li>"+
              "<li>Año: "+Datos[2]+"</li>"+
              "</ul>";

     $('#DocDetail').append(Doc);
 // document.getElementById('PersonalDetail').innerHTML = datos;

 $('#overlay').fadeIn('fast',
   function()
   {
     $('#box').animate({'top':'160px'},500);
   });
}