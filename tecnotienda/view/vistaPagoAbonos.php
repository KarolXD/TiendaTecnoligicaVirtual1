<?php
require 'public/headerCliente.php';
global $total;
?>

<div class="container">

    <div class="form-row">

        <div class="form-group col-md-4">            
        </div>
        <div class="form-group col-md-4">    
            <form action="?controlador=Compra&accion=compraCliente"  method="post">
                <center><h3>Abono a la compra</h3></center>
                <br>
                <center>
                    <img src="./public/img/tarjeta.svg" width="150" height="150"/>
                </center>
                <br>
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <label for="detalle">Monto a abonar: </label>
                    <input type="number" readonly  value="<?php echo $item[0] ?>" class="form-control"  id="montoabonar" name="montoabonar">
                    <br>
                    <br>
                    <label for="detalle">Saldo Pendiente: </label>
                    <input type="number" readonly  value="<?php echo $item[1] ?>" class="form-control"  id="saldopendiente" name="saldopendiente">

                    <?php
                }
                ?>
            </form>
        </div>
        <div class="form-group col-md-4">   
        </div>

    </div>
</div>

<?php
require 'public/footer.php';
?>
