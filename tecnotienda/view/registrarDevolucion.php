<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"> </div>
        <div class="col-md-4"> 
            <form method="post" action="?controlador=Producto&accion=guardarDevolucion">
            <hr style="color: #47748b">
            <strong> <center> Registrar Devolución  </center> </strong>     <hr style="color: #47748b">
            <div class="form-group">
                <label class="">Código de Barras</label>
                <input class="form-control" id="productoid" name="productoid" placeholder="Id Producto" type="number" required="">
            </div>

            <div class="form-group ">
                <label class="">Cantidad Devolución</label>

                <input class="form-control" id="productocantidaddevuelto" placeholder="Cantidadesde Devueltas" name="productocantidaddevuelto" type="number" required="">

            </div>
              <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>

<br><br>
                 <center>      <div class="form-group ">
                <button class="btn btn-primary" type="submit" value="Registrar">Registrar Devolución</button>
                <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a>
            </div>

        </center>
            </form>
        </div>
        <div class="col-md-4"> </div>
    </div>
</div>
<br><br>
<br><br>
<br><br>
<?php
require 'public/footerMenuP.php';
