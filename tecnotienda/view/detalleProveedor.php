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
                    <a>Empresa: <?php echo $item[1] ?></a>
                    </br>
                    <a>Detalle: <?php echo $item[2] ?></a>
                    </br>
                    <a>Correos: <?php echo $item[3] ?></a>
                    </br>
                    <a>Telefonos: <?php echo $item[4] ?></a>
                </center>
                <?php
            }
            ?>
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
