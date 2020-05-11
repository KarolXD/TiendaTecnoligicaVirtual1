     
<?php
require 'public/headerMenuP.php';
?>
<div class="container ">
    <form action="?controlador=Producto&accion=modificarProductoCaracteristica" method="POST">
    <?php
    foreach ($vars['listado'] as $item) {
        ?>
        <div class="row">
            <div class="col-sm-4" ></div>
            <div class="col-sm-4" >
                <hr style="color: #47748b">
                <strong> Modifica las caracteristicas del producto  </strong>     <hr style="color: #47748b">


                <div class="form-group" >
                    <label class="form-control-label"> Titulo:</label>
                    <input  value="<?php echo $item[0] ?>"   type="hidden" name="productoid" placeholder="Escriba caracteristica" class="form-control" />
                    <input   value="<?php echo $item[3] ?>" type="texto" name="productocaracteristicatitulo" placeholder="Añade un titulo" class="form-control" />
                </div>      
            </div>
            <br>
            <div class="col-sm-4" ></div>
            <br>   <br>

        </div>

        <div class="row">
            <div class="col-sm-3"  ></div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <center>
                        <?php
                        $criterio = ($item[1]);
                        $separado = explode(",", $criterio);
                        $contadorComas1 = substr_count($criterio, ',');
                        for ($i = 0; $i <= $contadorComas1 - 1; $i++) {
                            ?>
                            <label class="form-control-label">Criterio: </label>
                            <input type="text" class="form-control"   value= "<?php echo $separado[$i] ?>" name="productocriterio[]" aria-describedby="emailHelp" placeholder="Correos" >    
                                 <?php
                }
                ?>  
                    </center>
                    </div>
             
            </div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <center>
                        <?php
                        $carac = ($item[2]);
                        $caracseparada = explode(",", $carac);
                        $contadorComas = substr_count($carac, ',');
                        for ($j = 0; $j <= $contadorComas - 1; $j++) {
                            ?>
                            <label class="form-control-label">Valor: </label>
                            <input type="text" class="form-control"   value= "<?php echo $caracseparada[$j] ?>" name="productovalor[]" aria-describedby="emailHelp" placeholder="Correos" >   
                         <?php
                }
                ?>   
                    </center>
                        <br> 

                    </div>
               
            </div>
            <br>

        </div>
    <?php }
    ?>
    
    <div class="row" >

    <div class="col-sm-4" ></div>
    <div class="col-sm-4" >
         <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>

            <div class="form-group ">
            <button class="btn btn-warning" type="submit" value="Modificar">Modificar caracteristicas del Producto</button>
          
    </div>
            <div class="col-sm-4" ></div>
  
</div>
    </div>
<br>  
<!--
<div class="row" >

    <div class="col-sm-4" ></div>
    <div class="col-sm-4" >
        <center>     <hr style="color: #47748b">
            <strong> Agregar más caracteristicas  </strong>     <hr style="color: #47748b"></center>



    </div>
    <div class="col-sm-4" ></div>

</div>-->

<!--<div class="row" >

    <div class="col-sm-3" ></div>


    <div class="col-sm-3" >

        <center>


            <table class="table table-bordered" id="dynamic_field">
                <tr>
                          <label> Criterio</label>
                    <td><input  placeholder="" type="texto" name="criterio[]" placeholder="Escriba caracteristica" class="form-control name_list" /></td>
                    <td><button type="button" name="add" id="add"  class="btn btn-success" ><strong>+</strong>  </button></td>
                </tr>
            </table>
        </center>
    </div>

    <div class="col-sm-3" >
        <center>
            <table class="table table-bordered" id="dynamic_field1">
                <tr>
                    <label> Valor</label>
                    <td><input type="text"  name="valor[]"  class="form-control name_list"  /></td>
                    <td><button type="button" name="add1" id="add1"  class="btn btn-success" ><strong>+</strong>  </button></td>
                </tr>
            </table>
        </center>
    </div>

</div>-->

<br>
<div class="row" >

    <div class="col-sm-4" ></div>
    <div class="col-sm-4" >
        <center>    
            <div>
                
<!--                <button  type="submit" class="btn btn-success">Agregar más caracteristicas </button>
                <br><br>-->
                  <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a> </div></center> 
        
            </div>

  <div class="col-sm-4" ></div>

    </div>
  


    </form>
</div>
<br><br><br><br><br>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="criterio[]" placeholder="Ingrese su criterio" class="form-control name_list" /></td><td><button type="button"  name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');


        });
        $('#add1').click(function () {
            i++;

            $('#dynamic_field1').append('<tr id="row' + i + '"><td><input type="text" name="valor[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove1" id="' + i + '" class="btn btn-danger btn_remove1">X</button></td></tr>');


        });

   
        $(document).on('click', '.btn_remove1', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });


    });
</script>
<?php
require 'public/footerMenuP.php';
