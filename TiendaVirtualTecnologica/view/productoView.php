<?php
require 'public/headerMenuP.php';
?>
<center>
<div class="col-md-5">
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Datos del Producto</h3>
        </div>
        <div class="card-body bg-info">
            <form autocomplete="off" class="form" method="POST" id="formularioP" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="Nombre" name="Nombre"type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Precio</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="Precio" name="Precio" type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Descripción</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="Descripcion" name="Descripcion" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Cantidad</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="Cantidad" name="Cantidad" type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Categoria</label>
                    <div class="col-lg-9">

                      
                        <select class="form-control" name="Categoria" id="Categoria"></select>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">SubCategoria</label>
                    <div class="col-lg-9">

                        <select class="form-control" name="SubCategoria" id="SubCategoria"></select>

                    </div>
                </div>
                <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="imagen" id="customFile">
                    <label class="custom-file-label" for="imagen">Selecciona una imagen</label>
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-2">
                        <button class="btn btn-primary" type="submit" value="Registrar">Registrar</button>
                      
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
