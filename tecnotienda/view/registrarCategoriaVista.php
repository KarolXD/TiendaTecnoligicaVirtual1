<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="abs-center">

        <h2> Registrar Categoria</h2>
        <form id="formularioCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="username"> Categoria</label>
                <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" aria-describedby="emailHelp" placeholder="Categoria" required="">
            </div>


         
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                    <a href="?controlador=Producto&accion=menuCategoriaVista" class="btn btn-info" >Regresar</a>
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
