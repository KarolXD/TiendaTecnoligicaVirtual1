<?php
require 'public/headerMenuP.php';
?>
<center>
    <div class="col-md-5">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0"> Actualizar  del Producto</h3>
            </div>
            <div class="card-body bg-info">
                <form  method="POST"   autocomplete="off" class="form" method="POST" id="formularioActualizarP" enctype="multipart/form-data">
                    <?php
                    foreach ($vars['actualizarProductos'] as $item) {
                        ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Id</label>
                            <div class="col-lg-9">
                                <input class="form-control"  value="<?php echo $item[0] ?>"  readonly="" id="codigoProducto" name="codigoProducto"type="number" placeholder="Escribe el nombre del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                            <div class="col-lg-9">
                                <input class="form-control"  value="<?php echo $item[1] ?>" id="Nombre" name="Nombre"type="text" placeholder="Escribe el nombre del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="<?php echo $item[2] ?>" id="Precio" name="Precio" type="number" placeholder="Escribe el precio del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Descripción</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="<?php echo $item[3] ?>" id="descripcion" name="descripcion" type="text" placeholder="Escribe la descripción del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Cantidad</label>
                            <div class="col-lg-9">
                                <input class="form-control"  value="<?php echo $item[4] ?>" id="Cantidad" name="Cantidad" type="number" placeholder="Escribe la cantidad del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Categoria</label>
                            <div class="col-lg-9">


                                <select class="form-control" name="Categoria" id="Categoria"></select>
                                <input class="form-control"  value="<?php echo $item[5] ?>"  readonly="" id="Categoria1" name="Categoria1" type="text" placeholder="Escribe la categoría del Producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">SubCategoria</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="SubCategoria" id="SubCategoria"></select>
                                <input class="form-control" value="<?php echo $item[6] ?>"   readonly="" id="SubCategoria1" name="SubCategoria1" type="text" placeholder="Escribe la subcategoría del Producto">
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group row">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="s" id="customFile">
                            <label class="custom-file-label" for="s"> Selecciona una imagen</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" type="submit" value="Registrar">Modificar</button>

                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-primary" href="?controlador=Producto&accion=menuProductoView" > Regresar</a>
                        </div>
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-md-3" id="alertControl"></div>
                    </div>

                </form>

            </div>
        </div><!-- /form user info -->
    </div>
</center>

<br>
<?php
require 'public/footerMenuP.php';
