<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="abs-center">

        <h2> Modificar Categoria</h2>
         <form id="FormularioModificarCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
            <?php
            foreach ($vars['actualizarCategorias'] as $item) {
                ?>

                <div class="form-group">
                    <label for="username"> Codigo</label>
                    <input type="text" class="form-control" value="<?php echo $item[0] ?>" id="codigoCategoria" readonly="" name="codigoCategoria" aria-describedby="emailHelp" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Categoria</label>
                    <input type="text" class="form-control" value="<?php echo $item[1] ?>" id="nombreCategoria" name="nombreCategoria" aria-describedby="emailHelp" placeholder="Categoria" required="">
                </div>

                <?php
            }
            ?>
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Modificar " class="btn btn-info">
                    <a href="?controlador=Producto&accion=menuCategoriaView" class="btn btn-info" >Regresar</a>
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
