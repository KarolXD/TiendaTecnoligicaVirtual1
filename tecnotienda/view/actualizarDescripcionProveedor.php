<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6" >
            <center>
                <div class="form-group">
                    <form action="?controlador=Proveedor&accion=actualizarDatosDetalle"  method="post" name="" id="">
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                            <input type="hidden" class="form-control" id="clienteid"  value= "<?php echo $item[0] ?>" name="clienteid" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                            <input type="text" class="form-control" id="descripcion"  value= "<?php echo $item[1] ?>" name="descripcion" aria-describedby="emailHelp" placeholder="Detalle" required="">


                            <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Submit" />
                            <a href="?controlador=Cliente&accion=menuPrincipal" class="btn btn-info" >Regresar</a>

                            <?php
                        }
                        ?>
                    </form>
                </div>
            </center>
        </div>
        <div class="col-md-2"></div>

    </div>
</div>
<br>
<br>
<br>

<?php
include_once 'public/footer.php';
?>
