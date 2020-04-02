
$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerCategorias2",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";
                $.each(resultado, function (index, val) {
                    var columnaEliminar = "<td> <a  class='btn btn-danger' href='?controlador=Producto&accion=eliminarCategoria&codigoCategoria=" + val.codigoCategoria + "' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a  class='btn btn-warning' href='?controlador=Producto&accion=filtrarCategoriaById&codigoCategoria=" + val.codigoCategoria + "'> Modificar </a> </td>";
                    var columnaCodigo = "<td>" + val.codigoCategoria + "</td>";
                    var columnaCategoria = "<td>" + val.nombreCategoria + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaCategoria + "</tr>";


                });
                $("#tblCategorias tbody").empty();
                $("#tblCategorias tbody").append(filas);

                console.log(resultado);
            });

    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerSubCategorias2",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";
                $.each(resultado, function (index, val) {
                    var columnaEliminar = "<td> <a  class='btn btn-danger' href='?controlador=Producto&accion=eliminarSubCategoria&codigoSubCategoria=" + val.codigoSubCategoria + "' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a  class='btn btn-warning' href='?controlador=Producto&accion=filtrarSubCategoriaById&codigoSubCategoria=" + val.codigoSubCategoria + "'> Modificar </a> </td>";
                    var columnaCodigo = "<td>" + val.codigoSubCategoria + "</td>";
                    var columnaCategoria = "<td>" + val.nombreSubCategoria + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaCategoria + "</tr>";


                });
                $("#tblSubCategorias tbody").empty();
                $("#tblSubCategorias tbody").append(filas);

                console.log(resultado);
            });

    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerProductos",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";

                $.each(resultado, function (index, val) {
                    var columnaEliminar = "<td> <a  class='btn btn-danger' href='?controlador=Producto&accion=eliminarProducto&codigoProducto=" + val.codigoProducto + "' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a  class='btn btn-warning' href='?controlador=Producto&accion=filtrarProductoById&codigoProducto=" + val.codigoProducto + "'> Modificar </a> </td>";
                    var columnaCodigo = "<td>" + val.codigoProducto + "</td>";
                    var columnaNombre = "<td>" + val.nombreProducto + "</td>";
                    var columnaRutaImagen = "<td  >  <img  height='100' width='100'  src=" + val.rutaImagen + " /></td>";
                    var columnaPrecio = "<td>" + val.precio + "</td>";
                    var columnaDecripcion = "<td>" + val.descripcion + "</td>";
                    var columnaCantidad = "<td>" + val.cantidad + "</td>";
                    var columnaSubCategoria = "<td>" + val.nombreSubCategoria + "</td>";
                    var columnaCategoria = "<td>" + val.nombreCategoria + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaNombre + columnaRutaImagen + columnaPrecio + columnaDecripcion + columnaCantidad + columnaSubCategoria + columnaCategoria + "</tr>";


                });
                $("#tblProductos tbody").empty();
                $("#tblProductos tbody").append(filas);

                console.log(resultado);
            });



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
    guardarCategorias();
    guardarSubCategorias();
    modificarCategorias();
    modificarSubCategorias();

});



var modificarCategorias = function () {
    $("#FormularioModificarCategorias").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=modificarCategorias",
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



var modificarSubCategorias = function () {
    $("#FormularioModificarSubCategorias").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=modificarSubCategorias",
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



var guardarCategorias = function () {
    $("#formularioCategorias").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=registrarCategorias",
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


var guardarSubCategorias = function () {
    $("#formularioSubCategorias").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Producto&accion=registrarSubCategorias",
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

                window.setTimeout(function () {
                    $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
                        $(this).remove();
                    });

                }, 3000000000);

            }
        });
    });
};
