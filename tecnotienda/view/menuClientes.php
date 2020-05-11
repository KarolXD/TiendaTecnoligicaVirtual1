<?php
require 'public/headerMenuP.php';
?>

<br>
<div class="container">
    <br>
    <center><h5>Lista de Clientes</h5></center>
    <hr style="color: #999">
     <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
     <center>      <a class="btn btn-outline-info"  href="?controlador=Cliente&accion=registrarClienteVista">Registrar Usuario</a>          </center>  
                     
    <br>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
            
                <thead>
                    <tr>
                        <th scope="col">Detalle</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>  
                        <th scope="col">Id Cliente</th>
                        <th scope="col">Correos</th>
                        <th scope="col">Telefonos</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Canton</th>
                        <th scope="col">Distrito</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Banco</th>
                        <th scope="col">Numero Cuenta</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                        <tr>
                            <td>  <a  class="btn btn-outline-info" href='?controlador=Cliente&accion=listarClientesDetalle&clienteid=<?php echo $item[0] ?>'> Detalle</a></td>

                            <td>  <a  class="btn btn-outline-danger" onclick="eliminar(<?php echo $item[0] ?>)"> Eliminar  </a> </td>
                           
                            <td> 
                                <a  class="btn btn-outline-warning" href='?controlador=Cliente&accion=filtarClienteById&clienteid=<?php echo $item[0] ?>'>  Correo </a> 

                                <a  class="btn btn-outline-warning" href='?controlador=Cliente&accion=filtarClienteById2&clienteid=<?php echo $item[0] ?>'>  Telefono </a> 
                            </td>
                            <td><?php echo $item[1] ?></td>
   <td>
                            <?php
                            $pizza = ($item[2]);
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
                            $pizza2 = ($item[3]);
                            $piecess = explode(",", $pizza2);
                            $contadorComass = substr_count($pizza2, ',');
                            for ($y = 0; $y <= $contadorComass - 1; $y++) {
                                ?>
                             <?php echo $piecess[$y] ?>

                                <?php
                            }
                            ?>
</td>  
                            <td><?php echo $item[4] ?></td>
                            <td><?php echo $item[5] ?></td>
                            <td><?php echo $item[6] ?></td>
                            <td><?php echo $item[7] ?></td>
                            <td><?php echo $item[8] ?></td>
                            <td><?php echo $item[9] ?></td>

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
                                url: '?controlador=Cliente&accion=eliminarCliente',
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