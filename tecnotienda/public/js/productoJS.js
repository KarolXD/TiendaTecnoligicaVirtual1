
$(document).ready(function () {
       $.ajax({
        type: 'POST',
        url: "?controlador=Cliente&accion=listarClientes",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";
                $.each(resultado, function (index, val) {
                    var columnaEliminar = "<td> <a  class='btn btn-danger' >Eliminar. </a></td>";
                    var columnaModificar = "<td> <a class='btn btn-warning' href='?controlador=Cliente&accion=filtrarClienteById&clienteid=" + val.tbclienteid + "'> Modificar. </a> </td>";
                    var columnaCodigo = "<td>" + val.tbclienteid + "</td>";
                    var columnaNombre = "<td>" + val.tbclientenombre + "</td>";
                    var columnaApellido1 = "<td>" + val.tbclienteapellido1 + "</td>";
                    var columnaApellido2 = "<td>" + val.tbclienteapellido2 + "</td>";
                    var columnaCorreo1 = "<td>" + val.tbclientecorreo1 + "</td>";
                    var columnaCorreo2 = "<td>" + val.tbclientecorreo2 + "</td>";
                    var telefono1 = "<td>" + val.tbclientetelefono1 + "</td>";
                    var telefono2 = "<td>" + val.tbclientetelefono2 + "</td>";
                    var direccion = "<td>" + val.tbclientedireccion + "</td>";

                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaNombre + columnaApellido1 + columnaApellido2 + columnaCorreo1 + columnaCorreo2
                            + telefono1 + telefono2 + direccion  + "</tr>";
                });
                $("#tblClientes tbody").empty();
                $("#tblClientes tbody").append(filas);

                console.log(resultado);
            });
    $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerProductos",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";//columnaEliminar
                $.each(resultado, function (index, val) {

                    var columnaEliminar = "<td> <a  class='btn btn-danger' onclick='return  eliminar(" + val.tbproductoid + ")' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a class='btn btn-warning' href='?controlador=Producto&accion=filtrarProductoById&productoid=" + val.tbproductoid + "'> Modificar </a> </td>";
                    var columnaCodigo = "<td>" + val.tbproductoid + "</td>";
                    var columnaNombre = "<td>" + val.tbproductonombre + "</td>";
                    var columnaImagen = "<td> <img  width='50' height='50' src='" + val.tbproductoimagen + "' class='img-fluid' alt='Responsive image'> </td>"
                    var columnaPrecio = "<td>" + val.tbproductoprecio + "</td>";
                    var columnaDescripcion = "<td>" + val.tbproductodescripcion + "</td>";
                    var columnaCantidad = "<td>" + val.tbproductocantidad + "</td>";
                    var columnaidSubCategoria = "<td>" + val.tbsubcategorianombre + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaNombre + columnaImagen + columnaPrecio +
                            columnaDescripcion + columnaCantidad + columnaidSubCategoria + "</tr>";
                });
                $("#tblProducto tbody").empty();
                $("#tblProducto tbody").append(filas);

                console.log(resultado);
            });
    $.ajax({
        type: 'POST',
        url: "?controlador=Categoria&accion=obtenerCategorias",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";//columnaEliminar
                $.each(resultado, function (index, val) {

                    var columnaEliminar = "<td> <a  class='btn btn-danger' onclick='return  eliminar(" + val.tbcategoriaid + ")' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a class='btn btn-warning' href='?controlador=Categoria&accion=filtrarCategoriaById&categoriaid=" + val.tbcategoriaid + "'> Modificar </a> </td>";
                    var columnaCodigo = "<td>" + val.tbcategoriaid + "</td>";
                    var columnaCategoria = "<td>" + val.tbcategorianombre + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaCodigo + columnaCategoria + "</tr>";
                });
                $("#tblCategoria tbody").empty();
                $("#tblCategoria tbody").append(filas);

                console.log(resultado);
            });
    $.ajax({
        type: 'POST',
        url: "?controlador=Categoria&accion=obtenerCategorias",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
                $("#categoriaid1").append('<option value="' + item.tbcategoriaid + '">' + item.tbcategorianombre + '</option>');
            });

        }
    });
    $.ajax({
        type: 'POST',
        url: "?controlador=SubCategoria&accion=obtenerSubCategorias",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
                $("#subcategoriaid").append('<option value="' + item.tbsubcategoriaid + '">' + item.tbsubcategorianombre + '</option>');
            });

        }
    });
//Listar SubCategoria
    $.ajax({
        type: 'POST',
        url: "?controlador=SubCategoria&accion=listarSubCategorias",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";
                $.each(resultado, function (index, val) {
                    var columnaEliminar = "<td> <a  class='btn btn-danger' onclick='return  eliminar(" + val.tbsubcategoriaid + ")' >Eliminar </a></td>";
                    var columnaModificar = "<td> <a  class='btn btn-warning' href='?controlador=SubCategoria&accion=filtrarSubCategoriaById&subcategoriaid=" + val.tbsubcategoriaid + "'> Modificar </a> </td>";
                    var columnaSubCodigo = "<td>" + val.tbsubcategoriaid + "</td>";
                    var columnaSubCategoria = "<td>" + val.tbsubcategorianombre + "</td>";
                    var columnaCategoriaNombre = "<td>" + val.tbcategorianombre + "</td>";
                    filas += "<tr>" + columnaEliminar + columnaModificar + columnaSubCodigo + columnaSubCategoria + columnaCategoriaNombre + "</tr>";
                });
                $("#tblSubCategorias tbody").empty();
                $("#tblSubCategorias tbody").append(filas);

                console.log(resultado);
            });

     guardarP();
    actualizarP();
    guardarCategorias();
    guardarSubCategorias();
    modificarCategorias();
    modificarSubCategorias();
    guardarCliente();
    modificarCliente();

});


var modificarCategorias = function () {
    $("#FormularioModificarCategorias").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Categoria&accion=modificarCategorias",
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
            url: "?controlador=SubCategoria&accion=modificarSubCategorias",
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
            url: "?controlador=Categoria&accion=registrarCategorias",
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
            url: "?controlador=SubCategoria&accion=registrarSubCategorias",
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

var guardarCliente= function () {
    $("#formularioCliente").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Cliente&accion=registrarCliente",
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

                $("#alertControl").html('<div class="alert alert-success" id="alert">' + "Registrado con exito" + '</div>');

                window.setTimeout(function () {
                    $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
                        $(this).remove();
                    });

                }, 3000000000);

            }
        });
    });
};
var modificarCliente= function () {
    $("#formularioClienteM").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "?controlador=Cliente&accion=modificarCliente",
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

                $("#alertControl").html('<div class="alert alert-success" id="alert">' + "Modificado con exito" + '</div>');

                window.setTimeout(function () {
                    $(".alert").fadeTo(5000000, 0).slideUp(50000000, function () {
                        $(this).remove();
                    });

                }, 3000000000);

            }
        });
    });
};
