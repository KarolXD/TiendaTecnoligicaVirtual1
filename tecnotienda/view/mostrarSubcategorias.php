
<?php
include_once 'public/headerUsuario.php';
?>
<br><br>

<div class="container">


    <div class="row">
              <div class="col-sm-4"></div>
        <div class="col-sm-4">

            <?php
            foreach ($vars['listado'] as $item) {
                ?>
                <ul>
                    <li class="white-text">
                        <a  
                            class="btn btn-outline-info"  href="?controlador=SubCategoria&accion=mostrardetallesSubCategoria&subcategoriaid=<?php echo$item[0] ?>" name="btn-categorias"  value="<?php echo$item[0] ?>"   >
                            <?php echo $item[1] ?>
                        </a>
                    </li>
                    
                </ul>
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

<?php
include_once 'public/footerUsuario.php';



