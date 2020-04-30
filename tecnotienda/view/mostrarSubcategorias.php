
<?php
include_once 'public/headerUsuario.php';
?>
<br><br>
<br><br>
<div class="container">


    <div class="row">
        <div class="col-lg-6">

            <?php
            foreach ($vars['listado'] as $item) {
                ?>
                <ul>
                    <li class="bg-light">
                        <a  
                            class="bg-light"  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoria&subcategoriaid=<?php echo$item[0] ?>" name="btn-categorias"  value="<?php echo$item[0] ?>"   >
                            <?php echo $item[1] ?>
                        </a>
                    </li>
                    <br><br>
                </ul>
                <?php
            }
            ?>




        </div>


        <br>
        <br>
        <br>
        <br>

    </div>
</div>

<?php
include_once 'public/footerUsuario.php';



