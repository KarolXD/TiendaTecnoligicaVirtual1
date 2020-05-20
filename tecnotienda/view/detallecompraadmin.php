<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>  <center>Detalle de Compra </center></h5>
            <hr style="color: #47748b">

            <?php
            foreach ($vars['listado'] as $item) {
                ?>

                <div class="form-group">
                    <strong>   <label class=''> Código de Compra</label>  </strong>
                    <p> <?php echo $item[0] ?></p>
                </div>

                <hr style="color: #999">
                <div class="form-group">
                    <strong>     <label class=''> Usuario:</label>        </strong>
                    <p> <?php echo $item[1] ?></p>
                </div>
                <hr style="color: #999">
                <div class="form-group">
                    <strong>     <label class=''>Detalle de Compra:</label>  </strong>
                    <p>


                        <?php
                        $pizza = ($item[2]);
                        $pieces = explode(".", $pizza);
                        $contadorComas = substr_count($pizza, '.');
                        for ($i = 0; $i <= $contadorComas - 1; $i++) {
                            ?>
                        <p>  <?php echo $pieces[$i] ?></p>
                        
                   <hr style="color: #999">
                        <?php
                    }
                    ?>





                </div>
                <div class="form-group">
                    <strong>  <label class=''> Venta Cuentas por cobrar: </label>  </strong>
                    <p><?php echo $item[3] ?></p>
                </div>
                <hr style="color: #999">
                <div class="form-group">
                    <strong>     <label class=''> Venta Contado</label>  </strong>    
                    <p> <?php echo $item[4] ?></p>


                    <?php
                }
                ?>
                    
                   <hr style="color: #999">
                <br><br>
                <center>
                    <a  class="btn btn-outline-info" href='?controlador=Compra&accion=adminPago'> Regresar </a> </center>
                <br><br>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
    <?php
    require 'public/footer.php';
    