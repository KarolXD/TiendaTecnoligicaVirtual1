<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <br>
            <hr style="color: #47748b">
            <h5><center>Modificación de correos del Cliente</center></h5>
            <hr style="color: #47748b">
            <br>
            <center>

                <form action="?controlador=Cliente&accion=actualizarDatosCorreo"  method="post" name="" id="">
                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>

                        <div class="form-group" style="display: none">

                            <input type="number" class="form-control" id="id"  value= "<?php echo $item[0] ?>" name="id" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                            <input type="number" class="form-control" id="clienteid"  value= "<?php echo $item[1] ?>" name="clienteid" aria-describedby="emailHelp" readonly="" placeholder="ID CLIENTE" required="">
                        </div><div class="form-group">

                            <?php
                            $pizza = ($item[2]);
                            $pieces = explode(",", $pizza);
                            $contadorComas = substr_count($pizza, ',');
                            for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                ?>
                                <hr style="color: #47748b">
                                <label class="form-control-label">Dirección de Correo Electronico</label>
                                <hr style="color: #47748b">
                                <input type="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  class="form-control"   value= "<?php echo $pieces[$i] ?>" name="correo[]" aria-describedby="emailHelp" placeholder="Correos" required="" >     <?php
                            }
                            ?>

                            <input type="hidden" class="form-control"  id="correoid"  value= "<?php echo $item[3] ?>" name="correoid" aria-describedby="emailHelp" readonly="" required="">

                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group ">
                            <input type="submit" name="submit"  id="submit" class="btn btn-warning" value="Modificar" />
                            <a href="?controlador=Cliente&accion=listarClientes" class="btn btn-info" >Regresar</a>
                        </div>
                        <br>
                        <br>
                        <br>

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
