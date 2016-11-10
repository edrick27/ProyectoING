<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=1" />
            <link href="../css/bootstrap.min.css" rel="stylesheet">


    <?php   
    
    include('../../Modelo/ConfigureData/tipodocument_02.php'); 

    ?>
    </head>

    <body>
        <header>
            <h1></h1>
        </header>

       <?php 
       $code     =  '';
       $Name     =  '';

       session_start();

      if($_SESSION['Action2']=='new')
         {
          session_destroy();
          session_start();
          $_SESSION['Action'] = 'create';
          $tipDocument = new tipodocument_02();
          $code = $tipDocument->MaxCodTipDoc(); 
         }
     else
     {
        if($_SESSION['Action2'] == 'uptControll')
          {
            $code  =   $_SESSION['SAM02CoTipDoc'];
            $Name    =  $_SESSION['SAM02Descp'];   
            session_destroy();
            session_start();
            $_SESSION['Action'] = 'update';
          }  
     }                
      ?>

    <div id="modal" class="modal-fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" onclick="location.href='../ConfigureView/list_tipDoc02.php'" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Formulario Tipo Documentos</h4>
        </div>
        <div class="modal-body">
        <div class="container">
         <div class="col-md-6">
         <div class="form-horizontal" style="">
            <form action="../../Controlador/ConfigureController/tip_documentController02.php" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Codigo">Codigo: </label>
                <div class="col-sm-11">
                <input type="text" class="from-control" value="<?php echo $GLOBALS['code']; ?>" readonly="readonly" name="txt_Codigo"/>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="txt_Nombre">Nombre: </label>
                <div class="col-sm-11">
                <input type="text" class="from-control" value="<?php echo $GLOBALS['Name']; ?>" name="txt_Nombre"/>
                </div>
              </div>

               <button type="submit" class="btn btn-success">Guardar</button>

        </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="location.href='../ConfigureView/list_tipDoc02.php'" 
            data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
       

     <!--  <script>
           
    $('.btnModal').on("click", function(event) {
    event.preventDefault();
 
    var $contenedorModal = $('#myModal');
    var urlModal         = $(this).attr("href");
    var idModal          = $(this).data("idmodal");
 
    $contenedorModal.load(urlModal + ' ' + idModal , function(response) {
    $(this).modal({backdrop: "static"});
    });
});


       </script>-->

    </body>
</html>