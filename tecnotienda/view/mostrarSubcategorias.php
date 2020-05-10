
<?php
include_once 'public/headerUsuario.php';
?>
<br>

<div class="container">


    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <hr style="color: #47748b">
            <center><label>Lista de Sub Categorias</label></center>
            <hr style="color: #47748b">
            <br>

            <?php
            foreach ($vars['listado'] as $item) {
                ?>

                <a  
                    class="btn btn-outline-info"  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoria&subcategoriaid=<?php echo$item[0] ?>" name="btn-categorias"  value="<?php echo$item[0] ?>"   >
                        <?php echo $item[1] ?>
                </a>


                <?php
            }
            ?>




        </div>
        <div class="col-sm-4"></div>


    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>

<br>

<?php
include_once 'public/footerUsuario.php';



