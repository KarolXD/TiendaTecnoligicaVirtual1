<!DOCTYPE html>

<html lang="es">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Tienda Tecnologica Virtual</title>
            <meta charset="utf-8">
            <link rel="icon" type="image/png" href="./public/img/logo.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link href="./public/css/animate.css" rel="stylesheet" type="text/css"/>
          <link href="./public/css/animate.min.css" rel="stylesheet" type="text/css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="./public/js/productoJS.js" type="text/javascript"></script>
            <script src="./public/js/js_provincias.js" type="text/javascript"></script>
        </head>
        <body>
            <header>

              
                <nav class="navbar navbar-light bg-light animated infinite ">
                    <a class="navbar-brand" href="?controlador=Usuario&accion=menuPrincipalUsuario">
                        <img src="./public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        <strong>  Bienvenidos a TecnoTienda </strong>
                    </a>
                </nav>
                <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                    <a class="navbar-brand" href="?controlador=Usuario&accion=menuPrincipalUsuario">Inicio</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="line"></div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto" id="tblmenuUsuario" name="tblmenuUsuario">
                            <ul  class="navbar-nav mr-auto"></ul>
                            <br>

                        </ul>

                    </div>
                         <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                        <a class="nav-link" href="?controlador=Cliente&accion=loginCliente">Iniciar Sesion <span class="sr-only">(%)</span></a>
                                </li>

                              
                            </ul>
                        </div>
                </nav>



            </header>

