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
                    <p>Identificacion: <?php echo $item[0] ?></p>
                    </br>

                    <p>Correo:</p>
                    <?php
                    $pizza = ($item[1]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                        ?>
                        <p><?php echo $pieces[$i] ?></p>  

                        <?php
                    }
                    ?>

                    </br>
                    <p>Telefono:</p>
                     <?php
                    $pizza2 = ($item[2]);
                    $piecess = explode(",", $pizza2);
                    $contadorComass = substr_count($pizza2, ',');
                    for ($y = 0; $y <= $contadorComass - 1; $y++) {
                        ?>
                        <p> <?php echo $piecess[$y] ?></p>  

                        <?php
                    }
                    ?>
                    </br>
                    <p>Provincia: <?php echo $item[3] ?></p>
                    </br>
                    <p>Canton: <?php echo $item[4] ?></p>
                    </br>
                    <p>Distrito: <?php echo $item[5] ?></p>
                    </br>
                    <p>Descripcion: <?php echo $item[6] ?></p>
                    </br>
                    <p>Banco: <?php echo $item[7] ?></p>
                    </br>
                    <p>Número Cuenta: <?php echo $item[8] ?></p>
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