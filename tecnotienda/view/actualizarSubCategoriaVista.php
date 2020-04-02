<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="abs-center">

        <h2> Modificar SubCategoria</h2>
         <form id="FormularioModificarSubCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
            <?php
            foreach ($vars['actualizarSubCategorias'] as $item) {
                ?>

                <div class="form-group">
                    <label for="username"> Codigo</label>
                    <input type="text" class="form-control" value="<?php echo $item[0] ?>" id="codigoSubCategoria" readonly="" name="codigoSubCategoria" aria-describedby="emailHelp" placeholder="Codigo" required="">
                </div>
                <div class="form-group">
                    <label for="username"> SubCategoria</label>
                    <input type="text" class="form-control" value="<?php echo $item[1] ?>" id="nombreSubCategoria" name="nombreSubCategoria" aria-describedby="emailHelp" placeholder="SubCategoria" required="">
                </div>

                <?php
            }
            ?>
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Modificar " class="btn btn-info">
                    <a href="?controlador=Producto&accion=menuSubCategoriaVista" class="btn btn-info" >Regresar</a>
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