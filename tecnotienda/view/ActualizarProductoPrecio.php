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
               
                <div class="form-group ">
                          <hr style="color: #47748b">
                     <h6>  <center>Módificar Precios del  Producto</center></h6>
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
                    <label class="">Fecha  de Venta</label>
                    <input class="form-control" id="preciofechaventa"   value="<?php echo $item[4] ?>" name="preciofechaventa" type="text" >
                </div>
                <div class="form-group ">
                    <label class=""> % de Ganancia</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="precioganacia"   value="<?php echo $item[5] ?>" name="precioganacia"  aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">0.0</span>
                        </div>
                        </div>
                         </div>
 <div class="form-group">
              
                    <input class="form-control" id="productoid"   value="<?php echo $item[0] ?>" name="productoid"type="hidden"  required="">
                </div>
 <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>

                <div class="form-group ">
                    <center><button class="btn btn-warning" type="submit" value="M">Modificar Producto</button>  </center>
                 
                </div>
 
                <div class="form-group ">
       <center>  <a class="" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a> </center>
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
