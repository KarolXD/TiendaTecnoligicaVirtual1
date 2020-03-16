
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
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });

                }, 300);

            }
        });
    });
};