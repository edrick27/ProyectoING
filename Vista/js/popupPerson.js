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
           $( "#PersonalDetail" ).empty();
        });
      });
  }
 );

function mostrar(num)
{
    var x = num;
    var Datos = [];
    var Persona;
     $('#box').show();

   for (var i = 0; i <= 3 ; i++) 
   {
     Datos[i] = $("#miTabla").find('tr:eq('+x+')').children("td").eq(i).html(); 
   };
    
    Persona = "<ul class='lista'>"+
              "<li id = 'cedulaLI'>Cedula: "+Datos[0]+"</li>"+
              "<li>Nombre: "+Datos[1]+"</li>"+
              "<li>Apellidos:"+Datos[2]+" "+Datos[3]+"</li>"+
              "</ul>";

     $('#PersonalDetail').append(Persona);
 // document.getElementById('PersonalDetail').innerHTML = datos;

  $('#overlay').fadeIn('fast',
    function()
    {
      $('#box').animate({'top':'160px'},500);
    });
}

