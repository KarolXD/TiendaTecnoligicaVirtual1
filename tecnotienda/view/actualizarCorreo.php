<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6" >
            <center>
                <div class="form-group">
                    <form action="?controlador=Cliente&accion=actualizarCorreo"  method="post" name="" id="">
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                            <div class="table-responsive">
                                <div class="form-group">
                                    Id Correo
                                    <input type="text" class="form-control" id="correoid"  value= "<?php echo $item[0] ?>" name="correoid" aria-describedby="emailHelp" placeholder="ID CLIENTE" required="">
                                    Id Cliente  
                                    <input type="text" class="form-control" id="clienteid"  value= "<?php echo $item[1] ?>" name="clienteid" aria-describedby="emailHelp" placeholder="ID CLIENTE" required="">
                                 
                                     <?php
                                    $pizza = ($item[2]);
                                    $pieces = explode(",", $pizza);
                                    $contadorComas = substr_count($pizza, ',');
                                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                        ?>
                                    Correo
                                       <input type="text" class="form-control"   value= "<?php echo $pieces[$i] ?>" name="correo[]" aria-describedby="emailHelp" placeholder="Correos" >     <?php
    }
    ?>
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
