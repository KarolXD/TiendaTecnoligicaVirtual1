
<?php
include_once 'public/headerCliente.php';
?>

<div class="container">
    <div class="row">
        <table class="table table-striped">
          <center>  <h4 class="">Mis movimientos de abonos</h4></center>
            <br>
            <thead>
                <tr>
                    <th scope="col">#</th>
                      <th scope="col">Cliente</th>
                    <th scope="col">Cantidad Pagada</th>
                    <th scope="col">Fecha Último Abono</th>
                    <th scope="col">Total Deuda</th>
                      <th scope="col">Total Factura</th>
                    <th scope="col">Fecha Limite de Pago</th>
                     <th scope="col">Producto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $item[0] ?></th>
                        <th ><?php echo $item[1] ?></th>
                        <th ><?php echo $item[2] ?></th>
                        <th ><?php echo $item[3] ?></th>
                        <th ><?php echo $item[4] ?></th>
                        <th ><?php echo $item[5] ?></th>
                       <th ><?php echo $item[6] ?></th>
                       <th ><?php echo $item[7] ?></th>
 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
<hr style="color:black">
</div>
<br><br><br>
<?php
include_once 'public/footer.php';
