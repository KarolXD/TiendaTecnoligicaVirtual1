<?php
require 'public/headerMenuP.php';


?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="container">
       <hr style="color: #47748b"
           <strong> <h5><center>Listado de Categorias</center></h5></strong>
    <hr style="color: #47748b"
     
        <div class="row">
   <center> <a href="?controlador=Categoria&accion=registrarCategoriaVista"> Registrar nueva Categoria</a> </center>
<br>
        <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="tblCategoria">
            <thead>
                <tr>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">#Codigo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">fecha</th>
                </tr>
            </thead>
            <tbody>
            <tbody>


                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <tr>
                      
                                 <td>  <a  class="btn btn-danger" onclick="eliminar('<?php echo $item[0] ?>')" > Eliminar

                                </a> </td>
                        <td>  <a  class="btn btn-warning" href='?controlador=Categoria&accion=filtrarCategoriaById&categoriaid=<?php echo $item[0] ?>'> Modificar

                            </a> </td>
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

            </tbody>


        </table>
    </div>
</div>

<div class="auto" id="auto" style="display: none"><div  id="alertControl" style="opacity: none"></div></div>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">

    function eliminar(tbcategoriaid) {

        var categoriaid = tbcategoriaid;

        swal({
            title: "Estás seguro?",
            text: "Una vez eliminado este registro, no podrás dar marcha atrás!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
                .then((willDelete) => {
                    if (willDelete) {
                        ajaxEliminarCategoria(categoriaid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");

                    }
                });

    }




    function ajaxEliminarCategoria(categoriaid) {
     
        var parametros = {
            "categoriaid": categoriaid

        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            // URL a la que se enviará la solicitud Ajax
            url: "?controlador=Categoria&accion=verificarCategoria", //archivo que recibe la peticion
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
                    console.log("complete" + categoriaid);
                });
    }


</script>


<?php
require 'public/footerMenuP.php';
