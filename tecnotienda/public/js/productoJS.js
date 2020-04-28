
$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: "?controlador=Categoria&accion=obtenerCategorias",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
                  $("#categoriaid").append('<option value="' + item.tbcategoriaid + '">' + item.tbcategorianombre + '</option>');
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
//    
        $.ajax({
        type: 'POST',
        url: "?controlador=Usuario&accion=obtenerUsuarios",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
               $("#usuarioid").append('<option value="' + item.tbusuarionombre + '">' + item.tbusuarionombre + '</option>');
            });

        }
    });
     $.ajax({
        type: 'POST',
        url: "?controlador=Producto&accion=obtenerSubCategoriaProductos",
        success: function (response) {
            console.log(response);
            $.each(JSON.parse(response), function (i, item) {
               $("#subcategorianombre").append('<option value="' + item.tbsubcategorianombre + '">' + item.tbsubcategorianombre + '</option>');
            });
        }
    });
    
});
