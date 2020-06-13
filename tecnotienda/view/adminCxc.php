<?php
require 'public/headerMenuP.php';
?>


<div class="container">
    <label><center>Categorizacion de nuestros Clientes</center> </label>
    <br>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Cantidad Abonada</th>
                    <th scope="col">Fecha Ultimo Pago</th>
                    <th scope="col">Cantidad debe</th>
                    <th scope="col">Total Factura</th>
                    <th scope="col">Fecha Limite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $item[0] ?></th>
                        <td><?php echo $item[1] ?></td>
                        <td><?php echo $item[2] ?></td>
                        <td><?php echo $item[3] ?></td>
                        <td><?php echo $item[4] ?></td>
                        <td><?php echo $item[5] ?></td>
                        <td><?php echo $item[6] ?></td>
                    </tr>
                    <?php
                }
                ?>


            </tbody>
        </table>
    </div></div>
<br><br>
<?php
require 'public/footer.php';
