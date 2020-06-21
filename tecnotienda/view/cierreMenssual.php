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
                        <th scope="col">Concepto </th>       
                        <th scope="col">Ingreso</th>     
                        <th scope="col">Gasto</th>     
                    </tr>
                </thead>

                <tbody>


                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>
                        <tr>                          
                            <td>Ventas</td>
                            <td><?php echo $item[0] ?></td>
                            <td>------------</td>
                        </tr>
                        <tr>                          
                            <td>Cantidad pagada de deudas</td>
                            <td><?php echo $item[1] ?></td>
                            <td>----------------</td>
                        </tr>
                        <tr>                          
                            <td>Cantidad que deben de las deudas</td>
                            <td>--------------------</td>
                            <td><?php echo $item[2] ?></td>
                        </tr>                    
                        <tr>                          
                            <td>Gastos Financieros o en productos de entrada a la tienda</td>
                            <td>-----------------------</td>
                            <td>48948648.45646</td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<BR><BR>



<?php
require 'public/footer.php';
?>
