
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
            <script src="./public/js/funcionesCliente.js" type="text/javascript"></script>
            <script src="./public/js/js_provincias.js" type="text/javascript"></script>
        </head>
        <body><div class="container">
                <div class="row">
                    <div class="col-md-4"></div>  
                    <div class="col-md-4">
                        <?php
                        if (!isset($_SESSION)) {
                            session_start();
                            error_reporting(0);
                        }

                        if ($_SESSION['usuario'] == null || $_SESSION['usuario'] == "") {
                            echo '<div class="alert alert-danger" role="alert">
                          Usted no tiene PERMISOS!
                         <center>   <a href="?controlador=Cliente&accion=loginCliente">Iniciar Session como Cliente</a></center>
           
                           </div>';
                            //Sessions are not available
                            die();
                        }
                        ?>
                    </div>  
                    <div class="col-md-4"></div>  
                </div>

            </div>



            <header>


                             <nav class="navbar   " style="background-color: #ddd">
                                 <a class="navbar-brand" href="?controlador=Cliente&accion=menuPrincipalCliente1" style="color:white">
                        <img src="./public/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
                        Bienvenido a TiendaTienda
                    </a>
                                  <li class="nav-item" style="color:#ddd">
                              
                                    <a class=" btn btn-outline-dark" href="?controlador=Cliente&accion=cerrarSession">        <img src="./public/img/signs.png" alt=""/>Cerrar</a>
                                </li>
                </nav>

                <div class="content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="dropdown">
                            <button class="btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href="#homeSubmenu"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Inicio
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                <a class="dropdown-item" href="#">Galeria Imagenes</a>
                                <a class="dropdown-item" href="#">Recorrido por Pagina</a>
                                <a class="dropdown-item" href="#">Pagina Princpal</a>
                            </div>
                        </div>
                           <button class=" btn btn-outline-info my-2 my-sm-0" >
                            Detalles Pago
                        </button>
                          
                        <a href="?controlador=Compra&accion=listarcarrito" class=" btn btn-outline-info my-2 my-sm-0 " >
                            Carrito
                        </a>
                        <div class="line"></div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto" id="tblmenuUsuario1" name="tblmenuUsuario1">
                                <ul  class="navbar-nav mr-auto">

                                </ul>
                                <br>
                            </ul>


                        </div>


                   
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link  alert-info"><strong >
                        <img src="./public/img/avatar.png"  alt=""/>  Bienvenido  <?php echo $_SESSION['usuario'] ?></strong> </a>
                                </li>
 <li class="line">
                                  
                               </li>
                               
                            </ul>
                        </div>
                    </nav>
                </div>


            </header>
            <br>
            <br>
            <?php
//else{
//  //  header('Location: ?controlador=Usuario&accion=cerrarSession');
//}
            ?>