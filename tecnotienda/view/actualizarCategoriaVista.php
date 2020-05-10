

<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>  <center>Modificar una Categoria </center></h5>
            <hr style="color: #47748b">
            <form action="?controlador=Categoria&accion=modificarCategoria" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
                <?php
                foreach ($vars['actualizarCategorias'] as $item) {
                    ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="categoriaid" value="<?php echo $item[0] ?>" name="categoriaid" placeholder="Categoria" required="">
                    </div>
                    <div class="form-group">
                        <label for="username"> Escribe el nombre de una Categoria</label>
                        <input type="text" class="form-control"   readonly="" id="categorianombre" value="<?php echo $item[1] ?>" name="categorianombre" placeholder="Categoria" required="">
                    </div>
                    <div class="form-group">
                        <label for="username"> Escribe una descripción</label>
                        <input type="text" class="form-control" id="categoriadescripcion" value="<?php echo $item[2] ?>"  name="categoriadescripcion" placeholder="Descripción" required="">
                    </div>
                    <div class="form-group">
                        <label for="username"> Escribe el nombre de una fecha</label>
                        <input type="text" class="form-control" id="categoriafecha" value="<?php echo $item[3] ?>" name="categoriafecha" placeholder="Descripción" required="">
                    </div>
                    <div class="form-group">
                        <label for="username"> Usuario que agregó categoria</label>
                        <input type="text" class="form-control" id="usuarioid1" readonly="" value="<?php echo $item[4] ?>" name="usuarioid1" placeholder="Descripción" required="">


                    </div>
                    <div class="form-group">
                        <label for="username">Modificar el usuario</label>
                        <select  name="usuarioid" id="usuarioid" class="form-control">
                            <option selected>Selecciona:</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <center>
                            <input name="submit" type="submit" value=" Modificar " class="btn btn-warning">
                            <a href="?controlador=Categoria&accion=menuCategoriaVista" class="btn btn-info" >Regresar</a>
                        </center>
                    </div>
                    <div  class="alertControl alert alert-info" name="alertControl" id="alertControl"> </div>
                    <?php
                }
                ?>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<br>
<?php
include_once 'public/footerMenuP.php';
?>
