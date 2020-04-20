<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">

    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5> Modificar SubCategoria</h5>   
            <hr style="color: #47748b">
                   <form id="FormularioModificarSubCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
            <?php
            foreach ($vars['actualizarSubCategorias'] as $item) {
                ?>

                <div class="form-group">
                   
                    <input type="number" class="form-control" value="<?php echo $item[0] ?>" id="idsubcategoria" readonly="" name="idsubcategoria" aria-describedby="emailHelp" placeholder="Codigo" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Sub Categoria</label>
                    <input type="text" class="form-control" value="<?php echo $item[1] ?>" id="nombresubcategoria" name="nombresubcategoria" aria-describedby="emailHelp" placeholder="SubCategoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Mi Categoria</label>
                    <input type="text" class="form-control" value="<?php echo $item[2] ?>" id="categoriaid"  readonly="" name="categoriaid" aria-describedby="emailHelp" placeholder="nombreCategoria" required="">
                </div>
                <?php
            }
            ?>
            <div class="form-group ">
                    <label class="">Categoria</label>
                    <select class="form-control" name="categoriaid1"   id="categoriaid1"></select>
                </div>
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Modificar " class="btn btn-info">
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