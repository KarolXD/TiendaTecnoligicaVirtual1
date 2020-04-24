<?php

require 'public/headerMenuP.php';
?>

<center>
    <a href="?controlador=SubCategoria&accion=registrarSubCategoriaVista"> Registrar una Sub Categoria</a>

</center>
<br>
<div class="container">
        <center><h5>Mis Sub Categorias!</h5></center>
   <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">#Codigo</th>       
                        <th scope="col">SubCategoria</th>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
//No se asusten!!!!!!!!!!!Tengo que pasar esto a un archivo JS :s lo sse lo se
    function eliminar(valor) {
        var subcategoriaid = valor;
        swal({
            title: "Estás seguro?",
            text: "Una vez eliminado este registro, no podrás dar marcha atrás!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        ajaxEliminarSubCategoria(subcategoriaid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");


                    }
                });

    }
    function ajaxEliminarSubCategoria(subcategoriaid) {
        $.ajax({
            url: '?controlador=SubCategoria&accion=eliminarSubCategoria',
            type: 'POST',
            dataType: 'html',
            data: "subcategoriaid=" + subcategoriaid,
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
                   // swal("Cancelado", "Dato  Eliminado :)", "error");

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
