
<!DOCTYPE html>
<html lang="es">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Tienda Tecnologica Virtual</title>
            <meta charset="utf-8">
            <link rel="icon" type="image/png" href="./public/img/logo.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

            <link href="./public/css/animate.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/animate.min.css" rel="stylesheet" type="text/css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="./public/js/funcionesCliente.js" type="text/javascript"></script>
            <script src="./public/js/js_provincias.js" type="text/javascript"></script>
                  <script src="./public/js/contadorClicks.js" type="text/javascript"></script>
            
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
                              
                                    <a class=" btn btn-outline-danger" href="?controlador=Cliente&accion=cerrarSession">        <img src="./public/img/signs.png" alt=""/>Cerrar</a>
                                </li>
                </nav>

                <div class="content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                   
                           <button class=" btn btn-outline-info my-2 my-sm-0" >
                            Detalles Pago
                        </button>
                          
                        <a href="?controlador=Compra&accion=listarcarrito" class=" btn btn-outline-info my-2 my-sm-0 " >
                            Carrito
                        </a>
                        <a href="?controlador=Compra&accion=abono" class=" btn btn-outline-info my-2 my-sm-0" >
                          Abono
                        </a>
                          <a href="?controlador=Producto&accion=mostrarCombos2" class=" btn btn-outline-info my-2 my-sm-0" >
                          Combos
                        </a>
                          <a href="?controlador=Compra&accion=listarCompras" class=" btn btn-outline-info my-2 my-sm-0" >
                          Compras
                        </a>
                            <a href="?controlador=SubCategoria&accion=listaDeseos" class=" btn btn-outline-info my-2 my-sm-0" >
                          Mi lista de deseos
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