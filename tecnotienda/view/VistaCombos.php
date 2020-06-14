<?php
require 'public/headerMenuP.php';
?>

<br>
<div class="container">
    <br>
    <center><h5>Lista de Combos</h5></center>
    <hr style="color: #999">
     <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
     <center>      <a class="btn btn-outline-info"  href="?controlador=Producto&accion=registrarComboVista">Registrar Combo</a>          </center>  
                     
    <br>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
            
                <thead>
                    <tr>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Codigo Barras</th>  
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                        <tr>                          
                            <td> <a  class="btn btn-danger" href='?controlador=Producto&accion=eliminarCombo&correoid=<?php echo $item[0] ?>'> Eliminar

                                </a> </td>
                              <td> <a  class="btn btn-danger" href='?controlador=Producto&accion=modificarCombo&correoid=<?php echo $item[0] ?>'> Modificar

                                </a> </td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[3] ?></td>
                            <td><?php echo $item[4] ?></td>
                            <td><img width="150" height="150" src="<?php echo $item[5]?>"/></td>

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
  
<div class="auto" id="auto" style="display: none"><div  id="alertControl" style="opacity: none"></div></div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
//No se asusten!!!!!!!!!!!Tengo que pasar esto a un archivo JS :s lo sse lo se
                        function eliminar(valor) {

                            var clienteid = valor;
                            swal({
                                title: "Estás seguro?",
                                text: "Una vez eliminado este registro, no podrás dar marcha atrás!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            ajaxEliminarCliente(clienteid);
                                        } else {
                                            swal("Cancelado", "Dato no Eliminado :)", "error");


                                        }
                                    });

                        }


                        function ajaxEliminarCliente(clienteid) {
                            
                            var parametros = {
                                "clienteid": clienteid
                            };
                            $.ajax({
                                data: parametros, //datos que se envian a traves de ajax
                                url: '?controlador=Producto&accion=eliminarCombo',
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
?>