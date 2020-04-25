<!DOCTYPE html>
<html lang="es">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Tienda Tecnologica Virtual</title>
            <meta charset="utf-8">
            <link rel="icon" type="image/png" href="./public/img/logo.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            

         	
        </head>
        <body>




            <header>

                <nav class="navbar navbar-light navbar-brand">
                    <form class="form-inline">
                        <a class="btn btn-sm btn-outline-secondary" href="?controlador=Cliente&accion=loginCliente" type="button">Iniciar Session</a>
                        <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Cliente&accion=registrarClienteVista"type="button">Registrarme</a>
                    </form>
                </nav>

                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="./public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        Tienda Tecnologica Virtual
                    </a>
                </nav>

                <div class="line"></div>
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

                        <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Producto
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                                Combos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="#">Ofertas</a>
                                <a class="dropdown-item" href="#">Descuentos</a>
                                <a class="dropdown-item" href="#">Promociones</a>
                            </div>
                        </div>
                           <div class="dropdown">
                            <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clientes
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="?controlador=Cliente&accion=menuClientes">Administrar Clientes</a>
                                <a class="dropdown-item" href="?controlador=Proveedor&accion=menuProveedor">Administrar Proveedores</a>
                            </div>
                        </div>
                        <button class=" btn btn-outline-info my-2 my-sm-0" >
                            Detalles Pago
                        </button>
                        <button class=" btn btn-outline-info my-2 my-sm-0 " >
                            Carrito
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="#">Cerrar</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>


            </header>
            <br>
            <br>
