<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio sesión</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="stylesheet" href="Vista/css/bootstrap.min.css">
<body>
    <header>
        <div class="container text-center">
            <h1>Sistema de Archivo Municipal <b>(SAM)</b></h1>
            <br>
            <img src="Vista/img/muni.jpg" alt="Escudo Municipalidad Nicoya" height="120px" width="120px" class="img-rounded">
            <br>
            <h2>Bienvenido/a</h2>
            <br>
        </div>
    </header>

    <section>
        <div class="container center">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2">
                
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                <form method="post" action="Controlador/LoginController/validar.php">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" placeholder="usuario" required autofocus>
                    </div>
                    <div class="form-group">
                    <label for="pass">Contraseña:</label>
                        <input type="password" name="pass" class="form-control" placeholder="contraseña" required>
                    </div>
                    <button id="enviar" type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2">
                
            </div>
        </div>
        
        <div class="container" id="resultado"> 
        
        </div>
    </section>

    <footer>
        <div class="container">
            
        </div>
    </footer>
</body>
</html>