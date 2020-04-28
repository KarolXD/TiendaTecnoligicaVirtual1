<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
<!--        <center>-->
        <div class="col-md-4">

           
            <form  action="?controlador=Producto&accion=modificarProductoPrecio" method="POST"  enctype="multipart/form-data">
   <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                <div class="form-group">
                    <label class=""> </label>
                    <input class="form-control" id="productoid"   value="<?php echo $item[0] ?>" name="productoid"type="hidden"  required="">
                </div>
                <div class="form-group ">
                     <h5>  <center>Módificar Productos </center></h5>
          
                    <hr style="color: #47748b">
                    <strong>   Datos sobre el precio </strong>
                    <hr style="color: #47748b">
                    <label class="">Precio de Compra</label>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""  value="<?php echo $item[1] ?>"  id="preciocompra" name="preciocompra" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Compra</label>

                    <input class="form-control" id="preciofechacompra"   value="<?php echo $item[2] ?>" name="preciofechacompra"   type="text" >

                </div>
                <div class="form-group ">
                    <label class="">Precio de Venta</label>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""   value="<?php echo $item[3] ?>"  id="precioventa" name="precioventa" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Venta</label>
                    <input class="form-control" id="preciofechaventa"   value="<?php echo $item[4] ?>" name="preciofechaventa" type="text" >
                </div>
                <div class="form-group ">
                    <label class=""> % de Ganancia</label>
                    <input class="form-control" id="precioganacia"   value="<?php echo $item[5] ?>" name="precioganacia" type="number" required="">
                </div>
                <div class="form-group ">
                    <button class="btn btn-warning" type="submit" value="M">Modificar Producto</button>
                    <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a>
                </div>
   <?php
                }
                    ?>
            </form>
            <!--    </center>-->
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<br>

<?php
require 'public/footerMenuP.php';
