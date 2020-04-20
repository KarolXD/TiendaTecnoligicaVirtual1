<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5> <center>Modifica una  Categoria </center></h5>
            <hr style="color: #47748b">
            <form id="FormularioModificarCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
                <?php
                foreach ($vars['actualizarCategorias'] as $item) {
                    ?>

                    <div class="form-group">
                        <label for="username"> Codigo</label>
                        <input type="text" class="form-control" value="<?php echo $item[0] ?>" id="categoriaid" readonly="" name="categoriaid"   placeholder="Categoria" required="">
                    </div>
                    <div class="form-group">
                        <label for="username"> Escribe el nombre de una Categoria</label>
                        <input type="text" class="form-control" value="<?php echo $item[1] ?>" id="nombreCategoria" name="nombreCategoria" placeholder="Categoria" required="">
                    </div>

                    <?php
                }
                ?>
                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Modificar " class="btn btn-info">
                        <a href="?controlador=Categoria&accion=menuCategoriaVista" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
                <div  name="alertControl" id="alertControl"></div>
            </form>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>



<?php
include_once 'public/footerMenuP.php';
?>
