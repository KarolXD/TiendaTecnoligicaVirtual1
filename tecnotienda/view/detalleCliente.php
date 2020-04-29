<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <div class="row">
        <div class="table-responsive">

            <?php
            foreach ($vars['listado'] as $item) {
                ?>
                <center>
                    <a>Identificacion: <?php echo $item[0] ?></a>
                    </br>
                    <a>Correo: <?php echo $item[1] ?></a>
                    </br>
                    <a>Telefono: <?php echo $item[2] ?></a>
                    </br>
                    <a>Provincia: <?php echo $item[3] ?></a>
                    </br>
                    <a>Canton: <?php echo $item[4] ?></a>
                    </br>
                    <a>Distrito: <?php echo $item[5] ?></a>
                    </br>
                    <a>Descripcion: <?php echo $item[6] ?></a>
                    </br>
                    <a>Banco: <?php echo $item[7] ?></a>
                    </br>
                    <a>Número Cuenta: <?php echo $item[8] ?></a>
                </center>
                <?php
            }
            ?>

            </tbody>


        </div>
    </div>
</div>
<div class="auto" id="auto" style="display: none"><div  id="alertControl" style="opacity: none"></div></div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">

    <?php
    require 'public/footerMenuP.php';
    ?>