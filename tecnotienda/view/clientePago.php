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
                <center><h3>Detalle de la compra</h3></center>
                <br>
                <center>
                    <img src="./public/img/tarjeta.svg" width="150" height="150"/>
                </center>
                <br>
                <label for="detalle">Detalle: </label>
                <?php
                foreach ($vars['listado'] as $item) {
                    $precio = $item[2];
                    $total += $item[1] * $precio;
                    ?>

                    <div class="form-group"> 
                        <textarea class="form-control" id="detalle" name="detalle[]" readonly> <?php echo $item[0] ?> </textarea>
                    </div>                 


                    <?php
                }
                ?>



                <?php
                foreach ($vars['listado2'] as $item2) {
                    ?>

                    <label for="cliente">Cliente: </label>
                    <input type="text" class="form-control" id="cliente" name="cliente" readonly value="<?php echo $item2[0] ?>">
                    <br>
                    <label for="correo">Correo: </label>       
                    <?php
                    $pizza = ($item2[1]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                        ?>
                        <input readonly type="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  class="form-control"   value= "<?php echo $pieces[0] ?>" name="correo[]" aria-describedby="emailHelp" placeholder="Correos" required="" > 
                        <?php
                    }
                    ?>
                    <br>
                    <label for="cliente">Cuenta Bancaria: </label>
                    <input type="text" class="form-control" id="cuenta" name="cuenta" readonly value="<?php echo $item2[2] ?>">
                    <br>

                    <?php
                }
                ?>
                <div class="form-group">
                    <label for="pago">Forma de pago</label>
                    <select class="form-control" id="pago">
                        <option value="1">Contado</option>
                        <option value="0">Credito</option>
                    </select>
                </div>


                <label for="cliente">Total de la compra: </label>
                <div class="form-group">
                    <input type="text" class="form-control" id="monto" name="monto" readonly value=" <?php
                    if ($total != null) {
                        echo $total;
                    } else {
                        echo $total = 0;
                    }
                    ?>" >
                </div>


                <div class="form-group">
                    <center><button type="submit" class="btn btn-success">Pagar</button> </center> </div>  
            </form>
        </div>
        <div class="form-group col-md-4">   
        </div>

    </div>
</div>







<?php
require 'public/footer.php';
?>
