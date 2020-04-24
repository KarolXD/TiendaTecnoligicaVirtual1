<?php
require 'public/headerMenuP.php';
?>
<center>
<form class="form-inline my-10 my-lg-0">
    <input class="form-control" type="search" placeholder="Filtrar por nombre" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar </button>
</form>
    </center>
<center>
    <a href="?controlador=Proveedor&accion=registrarProveedor"> Registrar Proveedor</a>
</center>
<br>
<div class="container">
        <center><h5>Mis Proveedores!</h5></center>
    <div class="row">
      
                <hr style="color: #47748b"
        <div class="table-responsive">
          
                <table id="tblProveector" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">#Cédula Juridica</th>
                        <th scope="col">Nombre Empresa</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Codigo Postal</th>
                        <th scope="col">Correo</th>
                        <th scope="col">SitioWeb</th>
                        <th scope="col">contacto</th>
                        <th scope="col">Telefono</th>
                         <th scope="col">Dirección Fisica</th>
                  
                    </tr>
                </thead>
                <tbody>
                    <tr >
                    </tr>
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
        var proveedorid = valor;
        swal({
            title: "Estás seguro?",
            text: "Una vez eliminado este registro, no podrás dar marcha atrás!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        ajaxEliminarProveedor(proveedorid);
                    } else {
                        swal("Cancelado", "Dato no Eliminado :)", "error");


                    }
                });

    }
    function ajaxEliminarProveedor(proveedorid) {
        $.ajax({
            url: '?controlador=Proveedor&accion=eliminarProveedor',
            type: 'POST',
            dataType: 'html',
            data: "proveedorid=" + proveedorid,
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
