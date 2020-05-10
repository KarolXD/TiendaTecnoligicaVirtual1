<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br>
            <center><h5 style="background-color: #aaa">Detalle sobre el Cliente</h5></center>
            <hr style="color: #999">
            <br>

            <?php
            foreach ($vars['listado'] as $item) {
                ?>
    <!--                <center>-->
                <p>Identificacion: <?php echo $item[1] ?></p>

                <hr style="color: #999">
                <p>Correo:</p>
                <?php
                $pizza = ($item[2]);
                $pieces = explode(",", $pizza);
                $contadorComas = substr_count($pizza, ',');
                for ($i = 0; $i <= $contadorComas - 1; $i++) {
                    ?>
                    <p><?php echo $pieces[$i] ?></p>  

                    <?php
                }
                ?>
                <hr style="color: #999">

                <p>Telefono:</p>
                <?php
                $pizza2 = ($item[3]);
                $piecess = explode(",", $pizza2);
                $contadorComass = substr_count($pizza2, ',');
                for ($y = 0; $y <= $contadorComass - 1; $y++) {
                    ?>
                    <p> <?php echo $piecess[$y] ?></p>  

                    <?php
                }
                ?>   <hr style="color: #999">

                <p>Provincia: <?php echo $item[4] ?></p>
                <hr style="color: #999">
                <p>Canton: <?php echo $item[5] ?></p>
                <hr style="color: #999">
                <p>Distrito: <?php echo $item[6] ?></p>
                <hr style="color: #999">
                <p>Otras señas: <?php echo $item[7] ?></p>
                <hr style="color: #999">
                <p>Banco: <?php echo $item[8] ?></p>
                <hr style="color: #999">
                <p>Número Cuenta: <?php echo $item[9] ?></p>
                <hr style="color: #999">
                <!--                </center>-->
                <?php
            }
            ?>
            <br><br>
            <a href="?controlador=Cliente&accion=listarClientes" class="btn btn-outline-info" >Regresar</a>



        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<br><br>


<?php
require 'public/footerMenuP.php';
?>