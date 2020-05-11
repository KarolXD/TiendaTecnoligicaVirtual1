<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6" >
            <center>
                <div class="form-group">
                    <form action="?controlador=Proveedor&accion=actualizarDatosCliente"  method="post" name="" id="">
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
                                    <?php
                                    $pizza2 = ($item[2]);
                                    $piecess = explode(",", $pizza2);
                                    $contadorComa = substr_count($pizza2, ',');
                                    for ($y = 0; $y <= $contadorComa - 1; $y++) {
                                        ?>

                                        <h4>Telefonos</h4>
                                        <input type="number" class="form-control"   value= "<?php echo $piecess[$y] ?>" name="telefono[]" aria-describedby="emailHelp" placeholder="numero" >     <?php
                                    }
                                    ?>
                                    <input type="hidden" class="form-control" id="correoid"  value= "<?php echo $item[3] ?>" name="correoid" aria-describedby="emailHelp" readonly="" required="">
                                    <input type="hidden" class="form-control" id="telefonoid"  value= "<?php echo $item[4] ?>" name="telefonoid" aria-describedby="emailHelp" readonly="" required="">

                                </div>
                                
                                              <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>
                                <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Submit" />
                                <a href="?controlador=Proveedor&accion=menuProveedor" class="btn btn-info" >Regresar</a>
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