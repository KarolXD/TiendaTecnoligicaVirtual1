
$(document).ready(function () {

    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerCategorias",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
                $("#Categoria").append('<option value="' + item.codigoCategoria + '">' + item.nombreCategoria + '</option>');
            });

        }
    });
    
    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerSubCategorias",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
                $("#SubCategoria").append('<option value="' + item.codigoSubCategoria + '">' + item.nombreSubCategoria + '</option>');
            });

        }
    });
    guardarP();
    actualizarP();

});

var guardarP = function () {
    $("#formularioP").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=guardarProducto",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $("#alertControl").html('<div class="alert alert-success" id="alert"> Procesando... </div>');
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 3000);
            },
            success: function (response) {
                console.log(response);

                $("#alertControl").html('<div class="alert alert-success" id="alert">' + response + '</div>');

                window.setTimeout(function () {
                    $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
                        $(this).remove();
                    });

                }, 3000000000);

            }
        });
    });
};
var actualizarP = function () {
    $("#formularioActualizarP").on('submit', function (e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=modificarProducto",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

                $("#alertControl").html('<div class="alert alert-success" id="alert"> Procesando... </div>');
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 3000);
            },
            success: function (response) {
                console.log(response);

                $("#alertControl").html('<div class="alert alert-success" id="alert">' + 'Se ha modificado exitosamente' + '</div>');

//                window.setTimeout(function () {
//                    $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
//                        $(this).remove();
//                    });
//
//                }, 3000000000);

            }
        });
    });
};
