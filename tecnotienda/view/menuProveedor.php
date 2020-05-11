<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <center>  <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Proveedor&accion=registrarProveedorVista"type="button">Registrar Proveedor</a></center>
    <br>
    <center><h5>Lista de Proveedores</h5></center>
    <hr style="color: #999">
    
      <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Detalle</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>    
                        <th scope="col">Id Proveedor</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Correos</th>
                        <th scope="col">Telefonos</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                        <tr>
                            
                             <td>  <a  class="btn btn-outline-info" href='?controlador=Proveedor&accion=listarProveedorDetalle&clienteid=<?php echo $item[0] ?>'> Detalle

                                </a> </td>
                                <td>  <a  class="btn btn-outline-danger"  onclick="eliminar(<?php echo $item[0] ?>)"> Eliminar

                                </a> </td>
                            <td> 
                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById&clienteid=<?php echo $item[0] ?>'>  Correo </a> 

                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById2&clienteid=<?php echo $item[0] ?>'>  Telefono </a> 

                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById3&clienteid=<?php echo $item[0] ?>'>  Descripción</a> 
                            </td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[3] ?></td>
                              <td>
                            <?php
                            $pizza = ($item[4]);
                            $pieces = explode(",", $pizza);
                            $contadorComas = substr_count($pizza, ',');
                            for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                ?>
                               <?php echo $pieces[$i] ?>

                                <?php
                            }
                            ?>
</td>  
  <td> 
                            <?php
                            $pizza2 = ($item[5]);
                            $piecess = explode(",", $pizza2);
                            $contadorComass = substr_count($pizza2, ',');
                            for ($y = 0; $y <= $contadorComass - 1; $y++) {
                                ?>
                              <?php echo $piecess[$y] ?>

                                <?php
                            }
                            ?>
</td>  
                        </tr>

                        <?php
                    }
                    ?>

                    </tr>
                </tbody>


            </table>
        </div>
    </div>
</div>


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
                            var parametros = {
                                "clienteid": productoid
                            };
                            $.ajax({
                                data: parametros, //datos que se envian a traves de ajax
                                url: '?controlador=Proveedor&accion=eliminarCliente',
                                type: 'post', //método de envio
                                beforeSend: function () {
                                    $("#resultado").html("Procesando, espere por favor...");
                                },
                                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    $("#resultado").html(response);
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


                                    })
                                    .fail(function () {
                                        console.log('Error');
                                        swal("Cancelado", "Dato no Eliminado :)", "error");
                                    })
                                    .always(function () {
                                        console.log("complete" + productoid);
                                    });
                        }



</script>
<?php
require 'public/footerMenuP.php';
