<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
<!--        <center>-->
        <div class="col-md-12">

            <h5>  <center>Registra una Producto </center></h5>
            <hr style="color: #47748b">
            <form  action="?controlador=Producto&accion=registrarProductos" method="POST"  enctype="multipart/form-data">

                <div class="form-group">
                    <label class="">Código de Barras</label>
                    <input class="form-control" id="productocodigobarras" name="productocodigobarras"type="number"  required="">
                </div>
                <div class="form-group">
                    <label class="">Cantidad Garantia Aplicada</label>
                    <input class="form-control" id="productocantidadgarantizada" name="productocantidadgarantizada" type="number" required="">
                </div>

                <div class="form-group ">
                    <label class="">Cantidad Devuelta</label>

                    <input class="form-control" id="productocantidaddevuelto" name="productocantidaddevuelto" type="number" required="">

                </div>
                <div class="form-group">
                    <label class="">Sub Categoria</label>
                    <select class="form-control" name="subcategoriaid" id="subcategoriaid"></select>

                </div>
                     <div class="form-group">
                    <label class="">Estado del producto:</label>
                    <input class="form-control" name="productoestado" id="productoestado" type="text" required="">

                </div>
                
                <div class="form-group ">
                    <hr style="color: #47748b">
                 <strong>   Datos sobre el precio </strong>
                    <hr style="color: #47748b">
                    <label class="">Precio de Compra</label>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="preciocompra" name="preciocompra" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Compra</label>

                    <input class="form-control" id="preciofechacompra" name="preciofechacompra"  value="01-01-2020" type="date" >

                </div>
                <div class="form-group ">
                    <label class="">Precio de Venta</label>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="precioventa" name="precioventa" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Venta</label>

                    <input class="form-control" id="preciofechaventa" value="01-01-2020" name="preciofechaventa" type="date" >

                </div>
                <div class="form-group ">
                    <label class=""> % de Ganancia</label>

                    <input class="form-control" id="precioganacia" name="precioganacia" type="number" required="">


                </div>

                <hr style="color: #47748b">
                <strong>    Caracteristicas sobre el producto      </strong>   <hr style="color: #47748b">
                <div class="form-group ">
                    <label class="">Titulo</label>
                    <input class="form-control" id="caractericticatitulo" name="caractericticatitulo" type="text" required="">
                </div>
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-6" >
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="text" name="caracteristicacriterio[]" placeholder="Escriba su criterio" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6" >
                            <table class="table table-bordered" id="dynamic_field2">
                                <tr>
                                    <td><input type="text" name="caracteristicavalor[]" placeholder="Escriba su valor" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add2"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
                <hr style="color: #47748b">
              <strong>  Añade imagenes para el producto   </strong>     <hr style="color: #47748b">
                <div class="container ">
                    <div class="row">
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field3">
                                <tr>
                                    <td><input  placeholder="Color: Blanco Tamaño Gris Teclado: Con Luz" type="texto" name="imagenesnombre[]" placeholder="Escriba caracteristica" class="form-control name_list" /></td>
                                    <td><button type="button" name="add3" id="add3"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field4">
                                <tr>
                                    <td><input type="file"  name="imagenesruta[]"  class="form-control name_list"  /></td>
                                    <td><button type="button" name="add4" id="add4"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-group ">
                            <button class="btn btn-primary" type="submit" value="Registrar">Registrar Producto</button>
                            <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a>
                        </div>

                    </div>
                </div>



            </form>
            <!--    </center>-->
        </div>

    </div>
</div>

<br>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="caracteristicacriterio[]" placeholder="Ingrese su criterio" class="form-control name_list" /></td><td><button type="button"  name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');


        });
        $('#add2').click(function () {
            i++;

            $('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="text" name="caracteristicavalor[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove2" id="' + i + '" class="btn btn-danger btn_remove2">X</button></td></tr>');


        });

        $('#add3').click(function () {
            i++;

            $('#dynamic_field3').append('<tr id="row' + i + '"><td><input type="text" name="imagenesnombre[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove3" id="' + i + '" class="btn btn-danger btn_remove3">X</button></td></tr>');


        });
        $('#add4').click(function () {
            i++;

            $('#dynamic_field4').append('<tr id="row' + i + '"><td><input type="file" name="imagenesruta[]"  class="form-control name_list" /></td><td><button type="button"  name="remove4" id="' + i + '" class="btn btn-danger btn_remove4">X</button></td></tr>');


        });
        $(document).on('click', '.btn_remove4', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove3', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove2', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });


    });
</script>
<?php
require 'public/footerMenuP.php';
