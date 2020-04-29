
<?php

include_once 'public/headerUsuario.php';
?>
<div>
    
    
        <div class="content">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="dropdown">
<!--
          
                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>
                     <?php
                    foreach ($vars['listado2'] as $item2) {
                        ?>

                        <button class="btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href="#homeSubmenu"  id="dropdown<?php echo $item[0]?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $item[0] ?>

                        </button> 

                        <div class="dropdown-menu" aria-labelledby="dropdown<?php echo $item[0] ?>" >
                            <a class="dropdown-item" href="#"><?php echo $item2[0] ?>"</a>
                           
                        </div>
                    </div>
                    <?php
                }
                    }
                ?>



                            <div class="dropdown">
                                <button class=" btn btn-outline-info my-2 my-sm-0 dropdown-toggle" href=""  id="hola" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Producto
                                </button>
                                <div class="dropdown-menu" aria-labelledby="hola">
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
                                    <a class="dropdown-item" href="?controlador=Cliente&accion=listarClientes">Administrar Clientes</a>
                                    <a class="dropdown-item" href="?controlador=Proveedor&accion=listarProveedor">Administrar Proveedores</a>
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
-->


  <div id="header">
      <ul class="nav">
          <ul class="subNav">
          </ul>
      </ul>
  </div>
                </div>
  </nav>


        </div>



    </div>  

<script>
var ttMenuGral = [
                    {
                        "cSistema": "PMS",
                        "cMenu": "Ama Llaves",
                        "cSubMenu": "",
                        "cOpcion": "",
                        "cPrograma": "",
                        "iSec": 6,
                        "lexiste": false,
                        "cRowID": "0x000000000000048d",
                        "lError": false,
                        "cErrDesc": ""
                    },
                    {
                        "cSistema": "PMS",
                        "cMenu": "Auditoria",
                        "cSubMenu": "",
                        "cOpcion": "",
                        "cPrograma": "",
                        "iSec": 5,
                        "lexiste": false,
                        "cRowID": "0x0000000000000488",
                        "lError": false,
                        "cErrDesc": ""
                    },
                  
                  ];
                 subMenuGral=[
                    {
                        "cSistema": "PMS",
                        "cMenu": "Ama Llaves",
                        "cSubMenu": "Estado de Cuartos",
                        "cOpcion": "",
                        "cPrograma": "amallaves/estado_cuartos",
                        "iSec": 601,
                        "lexiste": false,
                        "cRowID": "0x000000000000049d",
                        "lError": false,
                        "cErrDesc": ""
                    },
                    {
                        "cSistema": "PMS",
                        "cMenu": "Ama Llaves",
                        "cSubMenu": "Fuera de Orden",
                        "cOpcion": "",
                        "cPrograma": "amallaves/fuera_orden",
                        "iSec": 604,
                        "lexiste": false,
                        "cRowID": "0x000000000000049c",
                        "lError": false,
                        "cErrDesc": ""
                    },
                    {
                        "cSistema": "PMS",
                        "cMenu": "Auditoria",
                        "cSubMenu": "Fuera de Servicio",
                        "cOpcion": "",
                        "cPrograma": "amallaves/fuera_servicio",
                        "iSec": 503,
                        "lexiste": false,
                        "cRowID": "0x0000000000000488",
                        "lError": false,
                        "cErrDesc": ""
                    }
                ]


crearMenu(ttMenuGral);
crearSubMenu(subMenuGral);

function crearMenu(menu){
  console.log(menu)
  for (var i = 0; i < menu.length; i++) {
//pintamos los menus y aca menu le damos de class el menu[i].cMenu,
// para utilizarlo en el momento de agregar el submenu
  var className = menu[i].cMenu.replace(" ","");
    $(".nav").append("<li   class="+className+">"+menu[i].cMenu+"</li>");
}
}

function crearSubMenu(menu){
  for (var i = 0; i < menu.length; i++) {
//obtenemos la class que le dimos en la function pasada para 
//agregar el  submenu
  var className = menu[i].cMenu.replace(" ","");
    if(i == 0){
//agregamos un <ul> el cual va hacer el contenedor del submenu
        $("."+className).append('<ul class="subNav"></ul>')   
    }
//y por ultimo agregamos los item al submenu
    $("."+className +" ul").append("<li   class="+className+">"+menu[i].cSubMenu+"</li>")
}
}
</script>
<?php

include_once 'public/footerUsuario.php';



