<?php
require 'public/headerCliente.php';
global $total;
?>

<div class="container">

    <div class="form-row">

        <div class="form-group col-md-4">            
        </div>
        <div class="form-group col-md-4">    
            <form action="?controlador=Compra&accion=modificarventaporcobrar"  method="post">
                <center><h3>Abono a la compra</h3></center>
                <hr style="color: #47748b">
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <div class="form-group">
                        <input    type="hidden" readonly  value="<?php echo $item[0] ?>" class="form-control"  id="id" name="id">
                    </div>

                    <div class="form-group">
                        <input  readonly type="hidden"   value="<?php echo $item[1] ?>" class="form-control"  id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="detalle">Cantidad Ultimo Abonada: </label>
                        <input readonly type="text"   value="<?php echo $item[2] ?>" class="form-control"  id="saldopendiente" name="saldopendiente">
                    </div>

                    <div class="form-group">
                        <label  for="detalle">Fecha Ultimo Abono: </label>
                        <input readonly type="text"   value="<?php echo $item[3] ?>" class="form-control"  id="saldopendiente" name="saldopendiente">
                    </div>

                    <div class="form-group">
                        <label for="detalle">Deuda Pendiente </label>
                        <input readonly style="border:3px solid red" type="number"   value="<?php echo $item[4] ?>" class="form-control"  id="deudapendiente" name="deudapendiente">
                    </div>
                    <div class="form-group">
                        <input type="hidden"   value="<?php echo $item[5] ?>" class="form-control"  id="totalpago" name="totalpago">
                    </div>
                    <div class="form-group">
                        <label for="detalle">Fecha Limite de pagar </label>
                        <input readonly type="text"   value="<?php echo $item[6] ?>" class="form-control"  id="saldopendiente" name="saldopendiente">
                    </div>

                    <div class="form-group" >
                        <label for="detalle">Cantidad Abonar: </label>
                        <input  style="border:3px solid red" type="number"   value="<?php echo $item[2] ?>" class="form-control"  id="cuentaporpagar" name="cuentaporpagar">
                    </div>


                    <strong>    <label for="detalle">Total Precio: <?php echo $item[5] ?> </label></strong>
                    <br><br>
                    <center>      <button class="btn btn-warning"> Actualizar Pago</button> </center>
                    <br>          
                    <div class="form-group " style="transform-style: preserve-3d" align="center">
                        <?php
                        $fechaActual = date("Y/m/d");
                        $date1 = new DateTime($fechaActual);

                        $date2 = new DateTime($item[6]);
                        $diff = $date1->diff($date2);
// will output 2 days
                        echo 'Tiempo Restante <br>';
                        echo '  ' . $diff->days . ' dias';
                        //     echo 'Año:' . $diff->y .'='. $diff->days .'  <br> ';
                        //        echo ' Meses ' . $diff->m . '<br>';
                    }
                    ?>
                </div>
                         <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>
            </form>
        </div>
        <div class="form-group col-md-4">   
        </div>

    </div>
</div>

<br><br>
<?php
require 'public/footer.php';
?>
