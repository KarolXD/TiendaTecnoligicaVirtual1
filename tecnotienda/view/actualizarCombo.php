<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <br>
            <hr style="color: #47748b">
            <h5><center>Modificación </center></h5>
            <hr style="color: #47748b">
            <br>
            <center>
                <div name="alertControl" id="alertControl"></div>

                <form action="?controlador=Producto&accion=actualizarCombo"  method="post" name="" id="">
                    <?php
                    foreach ($vars['listado'] as $item) {
                        ?>

                        <input type="number" class="form-control" id="id"  value= "<?php echo $item[0] ?>" name="id" readonly="" placeholder="ID Combo" required="">
                        Codigo de Barra   
                        <input type="number" class="form-control" id="codigoBarra"  value= "<?php echo $item[1] ?>" name="codigoBarra"   placeholder="Codigo de Barras" required="">
                        Cantidad    
                        <input type="number" class="form-control" id="cantidad"  value= "<?php echo $item[2] ?>" name="cantidad"   placeholder="Cantidad" required="">
                        Precio    
                        <input type="number" class="form-control" id="precio"  value= "<?php echo $item[3] ?>" name="precio"  placeholder="Precio" required="">
                        Descripcion
                        <input type="text" class="form-control" id="titulo"  value= "<?php echo $item[4] ?>" name="titulo"  placeholder="Titulo" required="">

                        <div class="row">
                            <div class="col-md-12">

                                <hr style="color: #47748b">
                                <strong> <center> Añade imagenes para el combo  </center> </strong>     <hr style="color: #47748b">
                                <br>
                                <div class="container ">
                                    <img width="150" height="150" src="<?php echo $item[5]?>"/>
                                    <div class="row">

                                        <div class="col-sm-6" >
                                            <table class="table table-bordered" id="dynamic_field4">
                                                <tr>
                                                    <td><input type="file"  name="imagenesruta2[]"  class="form-control name_list" /></td>

                                                </tr>
                                            </table>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>


                        <br>
                        <div class="form-group ">
                            <input type="submit" name="submit"  id="submit" class="btn btn-warning" value="Modificar" />
                            <a href="?controlador=Producto&accion=" class="btn btn-info" >Regresar</a>
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
