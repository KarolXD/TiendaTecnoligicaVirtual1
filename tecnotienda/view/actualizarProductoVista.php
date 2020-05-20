
<?php
require 'public/headerMenuP.php';
?>
<form  method="POST"  action="?controlador=Producto&accion=modificarProducto" method="POST"  enctype="multipart/form-data">

    <div class="container">
        <h5>  <center>Modifica un Producto </center></h5>

        <div class="row">



            <div class="col-md-4">

                <h5>  <center> </center></h5>
                <hr style="color: #47748b">
                <?php
                foreach ($vars['actualizarProductos'] as $item) {
                    ?>
                    <div class="form-group">

                        <input class="form-control" id="productoid"   type="hidden" value="<?php echo $item[0] ?>" name="productoid" type="number"  required="">
                    </div>
                    <div class="form-group">
                        <label class="">Código de Barras</label>
                        <input class="form-control" id="productocodigobarras"  value="<?php echo $item[1] ?>" name="productocodigobarras"type="number"  required="">
                    </div>

                    <div class="form-group ">
                        <label class="c">Estado del producto:</label>
                        <input class="form-control" id="productoestado"   value="<?php echo $item[4] ?>" name="productoestado" type="text" required="">
                    </div>
                    <div class="form-group ">
                        <label class="form-control-label">Cantidad Producto</label>
                        <input class="form-control" id="cantidad"   value="<?php echo $item[6] ?>" name="cantidad" type="number">
                    </div>
       <div class="form-group ">
                        <a class="" href="?controlador=Producto&accion=menuProductoVista" > Regresar</a>
                </div>   
            </div>

                <div class="col-md-4">

                    <hr style="color: #47748b">



                    <div class="form-group ">
                        <label class="c">Mi Sub Categoria</label>
                        <input class="form-control" id="subcategoriaid1"   value="<?php echo $item[5] ?>" name="subcategoriaid1" type="text" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="">Modificar mi Sub Categoria</label>
                        <select class="form-control" name="subcategoriaid" id="subcategoriaid">
                            <option selected="" value="-1"> Selecciona:</option>
                        </select>
                    </div>
                <div class="form-group ">
                <center>        <button class="btn btn-warning" type="submit" value="Registrar">Modificar Producto</button></center>
                    </div>
<br><br>
                    <div class="form-group ">
                        <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>

                    </div>
                    
                    
                  



                </div>
                <div class="col-md-4">
                    <hr style="color: #47748b">
                    <div class="form-group">
                        <label class="">Garantias Aplicadas</label>
                        <input class="form-control" id="productogarantiasaplicadas"value="<?php echo $item[2] ?>"  name="productogarantiasaplicadas" type="number" required="">
                    </div>

                    <div class="form-group ">
                        <label class="">Productos devoluciones</label>

                        <input class="form-control" id="productosdevueltos" value="<?php echo $item[3] ?>"  name="productosdevueltos" type="number" required="">


                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</form>
<br>
<?php
require 'public/footerMenuP.php';
