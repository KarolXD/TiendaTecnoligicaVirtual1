<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

      <h5>  <center>Registrar una Producto </center></h5>
            <hr style="color: #47748b">
            <form autocomplete="off" class="form" method="POST" id="formularioP" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="">Nombre</label>
                    <input class="form-control" id="Nombre" name="Nombre"type="text"  required="">
                </div>
                <div class="form-group">
                    <label class="">Precio</label>
                    <input class="form-control" id="Precio" name="Precio" type="number" required="">
                </div>

                <div class="form-group ">
                    <label class="">Descripción</label>

                    <input class="form-control" id="Descripcionprecio" name="Descripcion" type="text" required="">

                </div>
                <div class="form-group ">
                    <label class="c">Cantidad</label>

                    <input class="form-control" id="Cantidad" name="Cantidad" type="number" required="">

                </div>
                <div class="form-group">
                    <label class="">SubCategoria</label>
                    <select class="form-control" name="subcategoriaid" id="subcategoriaid"></select>

                </div>
                <div class="form-group">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es" required="">
                        <label class="custom-file-label" for="imagen">Seleccionar una Imagen</label>

                    </div>
                </div>
                <div class="form-group ">
                    <button class="btn btn-primary" type="submit" value="Registrar">Registrar</button>
                    <a class="btn btn-primary" href="?controlador=Producto&accion=menuProductoVista" > Regresar</a>
                </div>
                <div class="form-group ">
                    <label class=""></label>
                    <div class="col-md-6" id="alertControl"></div>
                </div>


            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<br>
<?php
require 'public/footerMenuP.php';
