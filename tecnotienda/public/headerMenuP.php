
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

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="./public/js/productoJS.js" type="text/javascript"></script>
            <script src="./public/js/js_provincias.js" type="text/javascript"></script>
            <link href="./public/css/animate.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/animate.min.css" rel="stylesheet" type="text/css"/>
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
                         <center>   <a href="?controlador=Cliente&accion=loginAdmin">Iniciar Session como Admin</a></center>
           
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
                    <a class="navbar-brand" href="?controlador=Cliente&accion=menuPrincipal">
                        <img src="./public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        <strong  style="color: #333333">   Tienda Tecnologica Virtual </strong>
                    </a>
                    <li class="nav-item" style="color:#ddd">
                              
                                    <a class=" btn btn-outline-dark" href="?controlador=Cliente&accion=cerrarSession">        <img src="./public/img/signs.png" alt=""/>Cerrar</a>
                                </li>
                </nav>
                <div class="line"></div>
                <div class="content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    

                        <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Producto
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <a class="dropdown-item" href="?controlador=Producto&accion=adm_productomasvendido">Producto Mas vendido</a>
                                <a class="dropdown-item" href="?controlador=Producto&accion=admi_productosmenosvendido">Producto menos vendido</a>
                                <a class="dropdown-item" href="?controlador=Producto&accion=admi_productosmasvistos">Producto mas visto</a>
                                  <a class="dropdown-item" href="?controlador=Producto&accion=adm_productovendidocxcc">Producto mas vendido (crédito/contado)</a>
                                <a class="dropdown-item" href="?controlador=Producto&accion=menuProductoVista">Producto</a>
                                <a class="dropdown-item" href="?controlador=Categoria&accion=menuCategoriaVista">Categoria</a>
                                <a class="dropdown-item" href="?controlador=SubCategoria&accion=menuSubCategoriaVista">Sub Categoria</a>
                            </div>
                        </div>

                        <button class=" btn btn-outline-info my-2 my-sm-0 " >
                            Publicidad
                        </button>

                        
                        <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ofertas y Combos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="?controlador=Oferta&accion=menuOfertas">Ofertas</a>
                                <a class="dropdown-item" href="#">Descuentos</a>
                                <a class="dropdown-item" href="#">Promociones</a>
                                 <a class="dropdown-item" href="?controlador=Producto&accion=listarCombo">Combos</a> 
                        
                            </div>
                        </div>
                        
                        
                        <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuarios
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="?controlador=Cliente&accion=listarClientes">Administrar Clientes</a>
                                <a class="dropdown-item" href="?controlador=Proveedor&accion=listarProveedor">Administrar Proveedores</a>
                                           <a class="dropdown-item" href="?controlador=Usuario&accion=listarUsuarios">Administrar Administradores</a>
                                           
                                           <a class="dropdown-item" href="?controlador=Usuario&accion=admcategorizacion">Categorizacion </a>
                      
                            </div>
                        </div>
                            <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButtonP" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Detalles de Pago
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonP">
                                <a class="dropdown-item" href="?controlador=Compra&accion=adminCxc">CxC</a>
                                <a class="dropdown-item" href="?controlador=Compra&accion=adminPago">Pago Contado</a>
                                    
                            </div>
                        </div>
                     <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButtonV" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ventas 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonV">
                                <a class="dropdown-item" href="?controlador=Compra&accion=adminCxc">Ventas Mensuales</a>
                                <a class="dropdown-item" href="?controlador=Compra&accion=adminPago">Ventas Diarias</a>
                                    
                            </div>
                        </div>
                            <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButtonMoro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Morosidad 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMoro">
                                <a class="dropdown-item" href="?controlador=Compra&accion=listarMorosos">Lista Morosos</a>
                                <a class="dropdown-item" href="?controlador=Compra&accion=listarMorososByCat">Lista Morosos por Categoria</a>
                                
                                <a class="dropdown-item" href="?controlador=Compra&accion=listarMorososByCat">Lista Morosos Mensual</a>
                                    
                            </div>
                        </div>
                        
                        
                        <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contabilidad
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="?controlador=Usuario&accion=estadoResultado">Estado Resultado</a>
                                <a class="dropdown-item" href="?controlador=Usuario&accion=asientos">Asientos</a>
                                <a class="dropdown-item" href="?controlador=Usuario&accion=cierreMensual">Cierre mensual</a>
                                <a class="dropdown-item" href="?controlador=Usuario&accion=graficos">Grafico Mensual</a>
                                <a class="dropdown-item" href="?controlador=Usuario&accion=graficosD">Grafico Diario</a>
                        
                            </div>
                        </div>
                      
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link  alert-info"><strong >Bienvenido  <?php echo $_SESSION['usuario'] ?></strong> </a>
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