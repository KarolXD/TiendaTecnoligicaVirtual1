
    

$(document).ready(function () {
     $.ajax({
        type: 'POST',
        url: "?controlador=SubCategoria&accion=obtenerSubCategorias",
        success: function (response) {
            console.log(response);
            $("#subcategoriaid").append('  <option selected value="2">Valores </option>   ');
            $.each(JSON.parse(response), function (i, item) {
                  

                $("#subcategoriaid").append(' <option value="' + item.tbsubcategoriaid + '">' + item.tbsubcategorianombre + '</option>');
            });

        }
    });

    $.ajax({
        type: 'POST',
        url: "?controlador=Cliente&accion=menuPrincipalCliente",
        dataType: "json"})
            .done(function (resultado) {
                var filas = "";
                $.each(resultado, function (index, val) {
                    var columnaModificar = "  <a class='nav-link' href='?controlador=SubCategoria&accion=mostrarSubCategoriaCliente&categoriaid=" + val.tbcategoriaid + "'> " + val.tbcategorianombre + " </a> ";
                    filas += "<div class='line'> </div>";
                    filas += " <li class='nav-item' >" + columnaModificar + "</li>";
                });
                $("#tblmenuUsuario1 ul").empty();
                $("#tblmenuUsuario1 ul").append(filas);
                console.log(resultado);
            });

});//fin document
