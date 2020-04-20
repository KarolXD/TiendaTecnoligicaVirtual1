
<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <h5>  <center>Modifica un Producto </center></h5>
            <hr style="color: #47748b">
            <form  method="POST"   autocomplete="off" class="form" method="POST" id="formularioActualizarP" enctype="multipart/form-data">
                <?php
                foreach ($vars['actualizarProductos'] as $item) {
                    ?>
                
                  <div class="form-group">
                  
                      <input class="form-control" id="productoid"   type="hidden" value="<?php echo $item[0] ?>" name="productoid" type="number"  required="">
                    </div>
                    <div class="form-group">
                        <label class="">Nombre</label>
                        <input class="form-control" id="Nombre"  value="<?php echo $item[1] ?>" name="Nombre"type="text"  required="">
                    </div>
                    <div class="form-group">
                        <label class="">Precio</label>
                        <input class="form-control" id="Precio"value="<?php echo $item[3] ?>"  name="Precio" type="number" required="">
                    </div>

                    <div class="form-group ">
                        <label class="">Descripción</label>

                        <input class="form-control" id="Descripcion" value="<?php echo $item[4] ?>"  name="Descripcion" type="text" required="">

                    </div>
                    <div class="form-group ">
                        <label class="c">Cantidad</label>
                        <input class="form-control" id="Cantidad"   value="<?php echo $item[5] ?>" name="Cantidad" type="number" required="">
                    </div>
                    <div class="form-group ">
                        <label class="c">Mi Sub Categoria</label>
                        <input class="form-control" id="sub"   value="<?php echo $item[6] ?>" name="sub" type="text" readonly="">
                    </div>
                    <div class="form-group">
                        <label class="">Modificar mi Sub Categoria</label>
                        <select class="form-control" name="subcategoriaid" id="subcategoriaid"></select>
                    </div>

                    <div class="form-group">
                        <label class="">Modificar mi Sub Categoria</label>
                        <img  width='300' height='300' src="<?php echo $item[2] ?>"alt=""/>

                    </div>
                    <div class="form-group">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es" required="">
                            <label class="custom-file-label" for="imagen">Cambiar  Imagen</label>

                        </div>
                    </div>
                    <div class="form-group ">
                        <button class="btn btn-warning" type="submit" value="Registrar">Modificar Producto</button>
                        <a class="btn btn-primary" href="?controlador=Producto&accion=menuProductoVista" > Regresar</a>
                    </div>
                    <div class="form-group ">
                        <label class=""></label>
                        <div class="col-md-6" id="alertControl"></div>
                    </div>
                    <?php
                }
                ?>


            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<br>
<?php
require 'public/footerMenuP.php';
