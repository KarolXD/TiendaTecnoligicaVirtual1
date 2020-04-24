<?php
require 'public/headerMenuP.php';
?>


<div class="container">
    <center><h5> Mis Clientes</h5></center>
    <hr style="color: #47748b"
        <div class="row">

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="tblClientes">
            <thead>
                <tr>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">#Identificación</th>
                    <th scope="col"> Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Correo 1</th>
                    <th scope="col">Correo 2</th>  
                    <th scope="col">Telefono 1</th>
                    <th scope="col">Telefono 2</th>
                    <th scope="col">direccion</th>


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
                        ajaxCliente(clienteid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");


                    }
                });

    }
    function ajaxCliente(clienteid) {
        $.ajax({
            url: '?controlador=Cliente&accion=eliminarCliente',
            type: 'POST',
            dataType: 'html',
            data: "clienteid=" + clienteid,
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
