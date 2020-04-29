<?php
require 'public/headerMenuP.php';
?>

<div class="container">
    <center>


 <form class="form-inline my-2 my-lg-0"  method="post" action="?controlador=Producto&accion=filtrarBySubCategoria">
<!--        <input class="form-control mr-sm-2"   name="subcategorianombre" id="subcategorianombre"type="search" placeholder="Search" aria-label="Search">
   -->
      <select name="subcategorianombre" id="subcategorianombre"  class="form-control mr-sm-2">  </select>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar por Sub Categoria</button>
     
    </form>
</center>
<center>
    <a href="?controlador=Producto&accion=registrarProductoVista"> Registrar Producto</a>
</center>
<br>
    <center><h5>Lista de Productos!</h5></center>
    <div class="row">

        <hr style="color: #47748b"
            <div class="table-responsive">

        <table id="tblProducto" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Detalles</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">#Id Producto</th>
                    <th scope="col">Código Barras</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Sub Categoria</th>
                    <th scope="col">Titulo</th>
                   

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <tr>
                            <td>  <a  class="btn btn-outline-info" href='?controlador=Producto&accion=detallesProducto&productoid=<?php echo $item[0] ?>'> Detalles

                                </a> </td>
                                
                            <td>  <a  class="btn btn-outline-danger"   return "eliminar('<?php echo $item[0] ?>')"> Eliminar

                                </a> </td>
                                
                            <td>  <a  class="btn  btn-outline-warning" href='?controlador=Producto&accion=filtrarProductoById&productoid=<?php echo $item[0] ?>'>  Producto

                                </a>
                                <a  class="btn btn-outline-warning" href='?controlador=Producto&accion=filtrarProductoPrecioById&productoid=<?php echo $item[0] ?>'>  Precios

                                </a>
                                <a  class="btn btn-outline-warning" href='?controlador=Producto&accion=filtrarProductoCaracteristicaById&productoid=<?php echo $item[0] ?>'>  Caracteristicas

                                </a>
                                <a  class=" btn btn-outline-warning" href='?controlador=Producto&accion=filtrarProductoImagenById&productoid=<?php echo $item[0] ?>'>  Imagenes

                                </a>
                            </td>

                        <td><?php echo $item[0] ?></td>
                        <td><?php echo $item[1] ?></td>
                        <td><?php echo $item[2] ?></td>
                        <td><?php echo $item[3] ?></td>
                        <td><?php echo $item[4] ?></td>
                      

                    </tr>
                    <?php
                }
                ?>
            </tbody>


        </table>
    </div>
</div>

<div class="auto" id="auto" style="display: none"><div  id="alertControl" style="opacity: none"></div></div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
//No se asusten!!!!!!!!!!!Tengo que pasar esto a un archivo JS :s lo sse lo se
    function eliminar(valor) {

        var productoid = valor;
        swal({
            title: "Estás seguro?",
            text: "Una vez eliminado este registro, no podrás dar marcha atrás!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        ajaxEliminarProducto(productoid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");


                    }
                });

    }
    function ajaxEliminarProducto(productoid) {
        $.ajax({
            url: '?controlador=Producto&accion=eliminarProducto',
            type: 'POST',
            dataType: 'html',
            data: "productoid=" + productoid,
            beforeSend: function () {
                $("#alertControl").html('<div class="alert alert-success" id="alert"> Procesando... </div>');
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 300);
            }
        })
                .done(function (data) {
                    console.log(data);
                    $("#alertControl").html('<div class="alert alert-success" id="alert">' + data + '</div>');

                    window.setTimeout(function () {
                        $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
                            $(this).remove();
                        });

                    }, 3000000000);
                    //  swal("Cancelado", "Dato  Eliminado :)", "error");

                })
                .fail(function () {
                    console.log('Error');
                    swal("Cancelado", "Dato no Eliminado :)", "error");
                })
                .always(function () {
                    console.log("complete");
                });
    }

</script>
<?php
require 'public/footerMenuP.php';
