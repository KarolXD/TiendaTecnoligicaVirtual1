<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <br>
            <h4><center>Modificar  correo Clientes</center></h4>
            <hr style="color: #47748b">
            <br><br>
            <center>

                <form action="?controlador=Cliente&accion=actualizarDatosCorreo"  method="post" name="" id="">
                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>

                        <div class="form-group" style="display: none">
                            <label class="form-control-label">Identificación Cliente</label>  

                            <input type="number" class="form-control" id="id"  value= "<?php echo $item[0] ?>" name="id" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                        <input type="number" class="form-control" id="clienteid"  value= "<?php echo $item[1] ?>" name="clienteid" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                       </div><div class="form-group">
                            <?php
                            $pizza = ($item[2]);
                            $pieces = explode(",", $pizza);
                            $contadorComas = substr_count($pizza, ',');
                            for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                ?>
                                <label class="form-control-label">Correos</label>
                                <input type="text" class="form-control"   value= "<?php echo $pieces[$i] ?>" name="correo[]" aria-describedby="emailHelp" placeholder="Correos" >     <?php
                            }
                            ?>

                            <input type="hidden" class="form-control" id="correoid"  value= "<?php echo $item[3] ?>" name="correoid" aria-describedby="emailHelp" readonly="" required="">

                        </div>
                        <input type="submit" name="submit"  id="submit" class="btn btn-warning" value="Modificar" />
                        <a href="?controlador=Cliente&accion=listarClientes" class="btn btn-info" >Regresar</a>
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
include_once 'public/footer.php';
?>
