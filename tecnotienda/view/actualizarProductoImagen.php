
<?php
require 'public/headerMenuP.php';
?>
<div class="container">
    <form  action="?controlador=Producto&accion=modificarproductoimagen" method="POST"  enctype="multipart/form-data">
     <?php
        foreach ($vars['listado'] as $item) {
            ?>



            <div class="row">
                <div class="col-sm-4" ></div>
                <div class="col-sm-4" >
                    <hr style="color: #47748b">
                    <strong> Modifica las caracteristicas del producto  </strong>     <hr style="color: #47748b">


                    <div class="form-group" >
                        <input  value="<?php echo $item[0] ?>"   type="hidden" name="productoid" id="productoid" placeholder="Escriba caracteristica" class="form-control" />
                    </div>      
                </div>
                <br>
                <div class="col-sm-4" ></div>
                <br>   <br>

            </div>
        <div class="row">
                <div class="col-sm-4" >


                    <table class="table table-bordered" id="dynamic_field4">
                        <tr>
                            <td>
                                <?php
                                $criterio = ($item[1]);
                                $separado = explode(",", $criterio);
                                $contadorComas1 = substr_count($criterio, ',');
                                for ($i = 0; $i <= $contadorComas1 - 1; $i++) {
                                    ?>

                                <input type="text"  value= "<?php echo $separado[$i] ?>" name="imagenesnombre[]"  class="form-control "  placeholder="Color Blanco Tamano 16 pulgas" />
                                    <br><br><br>     <br><br><br>
                                    <?php
                                }
                                ?>

                            </td>


                        </tr>
                    </table> 
                </div>
            <div class="col-sm-4" >
                <table class="table table-bordered" id="dynamic_field4">
                    <tr>
                        <td>
                              <?php
                        $carac = ($item[2]);
                        $caracseparada = explode(",", $carac);
                        $contadorComas = substr_count($carac, ',');
                        for ($j = 0; $j <= $contadorComas - 1; $j++) {
                            ?>

                          <center>

                                <center> <label class="form-control-label">Imagen Actual: </label></center>
                                <img  width="100" height="100"  src= "<?php echo $caracseparada[$j] ?>"  aria-describedby="emailHelp" placeholder="Correos" >   


                            </center>
                          <?php
                        }
                        ?>
                        </td>
                        
                        
                    </tr>
                </table>
                
               
                
                
            </div>
            <div class="col-sm-4" >
                <table class="table table-bordered" id="dynamic_field4">
                    <tr>
                        <td> 
                        
                               <?php
                                        for ($j = 0; $j <= $contadorComas - 1; $j++) {
                                            ?>
                                            <input type="file"   name="imagenesruta[]"  class="btn btn-info" />
                                     <br><br><br>     <br><br><br>
                                <?php
                            }
                            ?>
                        
                        
                        <br>
                        </td>
                    </tr>
                </table>
            </div>



        </div>

    <?php
        }    ?>
        <center>
            <div class="form-group ">
                 <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
<br>
                <button class="btn btn-warning" type="submit" value="Registrar">Modificando Producto</button>
                <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a>
            </div>
    </center>

    </form>
</div>

<?php
require 'public/footerMenuP.php';
