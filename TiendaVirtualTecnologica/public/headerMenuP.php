<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda Virtual Tecnologica</title> <!--titulo-->
        <meta name="descripcion" content="Sitio para poder pedir comida desde de tu casa."/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> </head>

           <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        
    <script src="public/js/productoJS.js"></script>

    <header>
        <nav class="navbar navbar-light navbar-brand">
            <form class="form-inline">
                <a class="btn btn-sm btn-outline-secondary" href="?controlador=Item&accion=loginCliente" type="button">Iniciar Session</a>
                <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Item&accion=mostrarRegistrarCliente"type="button">Registrarme</a>
            </form>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?controlador=Item&accion=menuPrincipal"> Principal <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Computadoras
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Laptops</a>
                            <a class="dropdown-item" href="#">Combos/Kits</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Componentes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Procesadores</a>
                            <a class="dropdown-item" href="#"> Tarjeta Madre</a>

                            <a class="dropdown-item" href="#"> Memoria RAM</a>

                            <a class="dropdown-item" href="#"> Tarjeta Video</a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Ventiladores</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Perifericos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Teclado</a>
                            <a class="dropdown-item" href="#">Mouse</a>

                            <a class="dropdown-item" href="#"> Parlantes</a>

                            <a class="dropdown-item" href="#"> Web Cam</a>


                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accesorios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Adaptadores</a>
                            <a class="dropdown-item" href="#">Cables</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Célulares
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Xiaomi</a>
                            <a class="dropdown-item" href="#">Protectores</a>

                            <a class="dropdown-item" href="#">Otros</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Busqueda" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
                </form>
            </div>
        </nav>
    </header>
    <section id="contenido">
        <br>
        <section id="principal">
