<?php

require 'public/headerMenuP.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<center> <a href="?controlador=Categoria&accion=registrarCategoriaVista"> Registrar una Categoria</a> </center>
<br>
<div class="container">
    <center><h5>Mis Categorias!</h5></center>
    <hr style="color: #47748b"
        <div class="row">
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="tblCategoria">
            <thead>
                <tr>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">#Codigo</th>
                    <th scope="col">Categoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>


        </table>
    </div>
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
                        ajaxEliminarSubCategoria(categoriaid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");

                    }
                });

    }




    function ajaxEliminarSubCategoria(categoriaid) {
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
