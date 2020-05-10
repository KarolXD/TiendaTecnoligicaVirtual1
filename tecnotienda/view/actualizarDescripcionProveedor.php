<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <br>
            <h4><center>Modificar Descripción</center></h4>
            <hr style="color: #47748b">
            <br>
            <center>

                <form action="?controlador=Proveedor&accion=actualizarDatosDetalle"  method="post" name="" id="">
                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id"  value= "<?php echo $item[0] ?>" name="id" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                            <input type="hidden" class="form-control" id="clienteid"  value= "<?php echo $item[1] ?>" name="clienteid" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                            <input type="text" class="form-control" id="descripcion"  value= "<?php echo $item[2] ?>" name="descripcion" aria-describedby="emailHelp" placeholder="Detalle" required="">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit"  id="submit" class="btn btn-warning" value="Modificar" />
                            <a href="?controlador=Proveedor&accion=menuProveedor" class="btn btn-info" >Regresar</a>
                        </div>
                        <?php
                    }
                    ?>
                </form>

            </center>
        </div>
        <div class="col-md-4"></div>

    </div>
</div>
<br>
<br>
<br>

<?php
include_once 'public/footerMenuP.php';
?>
