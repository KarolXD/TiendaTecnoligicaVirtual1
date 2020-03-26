<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="abs-center">

        <h2> Registrar SubCategoria</h2>
        <form id="formularioSubCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="username">SubCategoria</label>
                <input type="text" class="form-control" id="nombreSubCategoria" name="nombreSubCategoria" aria-describedby="emailHelp" placeholder="SubCategoria" required="">
            </div>


         
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                    <a href="?controlador=Producto&accion=menuSubCategoriaView" class="btn btn-info" >Regresar</a>
                </center>
            </div>
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-md-12" id="alertControl"></div>
        </form>
    </div>
</div>



<?php
include_once 'public/footerMenuP.php';
?>
