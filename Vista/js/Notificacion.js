function Notificacion()
{
$.ajax({
            type: "POST",
            url: "../../Controlador/LendigController/NotificacionController.php",
            success: function(data) 
            {
                //alert(data);

                if (data > 0) 
                {
                   Push.create("Nueva notificacion",
                    {
        
                    body:"Una Solicitud Pendiente",
                    icon:"img/muni.jpg",
                    timeout: 4000,
                    onClick: function()
                    {
                    window.focus();
                    this.close();
                    }  
                    });  
                }
           }//
        })
}
  $( document ).ready(
  function()
  {
    
    Notificacion(); 

   setInterval(Notificacion, 3000); 
  }

);



