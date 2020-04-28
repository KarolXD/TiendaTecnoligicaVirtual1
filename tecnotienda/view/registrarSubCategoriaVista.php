<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5> <center>Registra una  Sub Categoria </center></h5>
            <hr style="color: #47748b">
            <form action="?controlador=SubCategoria&accion=registrarSubCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Escriba una Sub Categoria</label>
                    <input type="text" class="form-control" id="subcategorianombre" name="subcategorianombre" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                </div>
                <div class="form-group">
                    <label for="username">Elige una Categoria</label>
                    <select class="form-control" name="categoriaid"   id="categoriaid"></select> </div>
                <div class="form-group">
                    <label for="username">Añade una descripción</label>
                    <input type="text" class="form-control" id="subcategoriadescripcion" name="subcategoriadescripcion" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                </div>

                <div class="form-group ">
                    <label class="">Añade un Usuario</label>
                    <select class="form-control" name="usuarioid"   id="usuarioid"></select>
                </div>
                <div class="form-group">
                    <label for="username">Añade una fecha</label>
                    <input type="date" class="form-control" id="subcategoriafecha" name="subcategoriafecha" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                </div>
                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                        <a href="?controlador=SubCategoria&accion=menuSubCategoriaVista" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
                <label class="col-lg-3 col-form-label form-control-label"></label>
                <div class="col-md-12" id="alertControl"></div>
            </form>


        </div>
        <div class="col-md-4"></div>
    </div>
</div>




<?php
include_once 'public/footerMenuP.php';
?>
