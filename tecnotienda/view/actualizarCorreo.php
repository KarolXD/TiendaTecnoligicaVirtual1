<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6" >
            <center>
                <div class="form-group">
                    <form action="?controlador=Cliente&accion=actualizarDatosCorreo"  method="post" name="" id="">
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                            <div class="table-responsive">
                                <div class="form-group">
                                    <h4>Id Cliente</h4>  
                                    <input type="number" class="form-control" id="clienteid"  value= "<?php echo $item[0] ?>" name="clienteid" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">

                                    <?php
                                    $pizza = ($item[1]);
                                    $pieces = explode(",", $pizza);
                                    $contadorComas = substr_count($pizza, ',');
                                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                        ?>
                                        <h4>Correos</h4>
                                        <input type="text" class="form-control"   value= "<?php echo $pieces[$i] ?>" name="correo[]" aria-describedby="emailHelp" placeholder="Correos" >     <?php
                                    }
                                    ?>
                                   
                                    <input type="hidden" class="form-control" id="correoid"  value= "<?php echo $item[2] ?>" name="correoid" aria-describedby="emailHelp" readonly="" required="">
                                   
                                </div>
                                <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Submit" />
                                <a href="?controlador=Cliente&accion=menuPrincipal" class="btn btn-info" >Regresar</a>
                            </div> <?php
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
