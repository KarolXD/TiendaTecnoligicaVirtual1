<?php
require 'public/headerMenuP.php';
?>

<div class="container">
    <center><h5> Estado Resultados!</h5></center>
    <br>
    <br>

    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Producto vendido </th>       
                        <th scope="col">Cantidad pagada de deudas</th>
                        <th scope="col">Cantidad que deben de las deudas</th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>
                        <tr>                          
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>


            </table>

            <?php
            foreach ($vars['listado'] as $item) {
                ?>
                Ventas Netas:
                <?php echo $item[0] ?>
                <br>
                <br>

                Costos de ventas: 
                <?php echo '6541351.123' ?>
                <br>
                <br>

                Gastos de administracion:
                <?php echo '78465.21' ?>
                <br>
                <br>

                Utilidades:
                <?php echo '789465.0' ?>
                <?php
            }
            ?>




        </div>
    </div>
</div>
<BR><BR>



<?php
require 'public/footer.php';
?>
