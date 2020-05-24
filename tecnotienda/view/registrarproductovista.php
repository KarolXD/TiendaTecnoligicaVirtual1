
<?php

require 'public/headerMenuP.php';
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>   
<script src="./public/js/repeater.js" type="text/javascript"></script>

<div class="container">


    <h5>  <center>Registra una Producto </center></h5>
    <hr style="color: #47748b">
    <form  action="?controlador=Producto&accion=registrarProductos" method="POST"  enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>

                <div class="form-group">
                    <label class="form-control-label">Código de Barras</label>
                    <input class="form-control" id="productocodigobarras" name="productocodigobarras"type="number" placeholder="Código de Barras" required="">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Cantidad</label>
                    <input class="form-control" id="cantidad" name="cantidad"type="number" placeholder="Cantidad de Producto" required="">
                </div>
                <div class="form-group">
                    <label class="">Sub Categoria</label>
                    <select class="form-control" name="subcategoriaid" id="subcategoriaid"></select>

                </div>
                <div class="form-group">
                    <label class="">Estado del producto:</label>
                    <input class="form-control" name="productoestado" placeholder="Estado del Productos" id="productoestado" type="text" required="">

                </div>

            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="form-group ">
                    <hr style="color: #47748b">
                    <strong>   <center>Datos sobre el precio </center></strong>
                    <hr style="color: #47748b">
                    <label class="">Precio de Compra</label>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="preciocompra" name="preciocompra" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="">Fecha  de Compra</label>

                    <input class="form-control" id="preciofechacompra" name="preciofechacompra"  type="date" >

                </div>

                <div class="form-group ">
                    <label class="">Fecha  de Venta</label>

                    <input class="form-control" id="preciofechaventa" name="preciofechaventa" type="date" >

                </div>
                <div class="form-group ">
                    <label class=""> % de Ganancia</label>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="number" class="form-control" required=""  id="precioganacia" name="precioganacia" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">0</span>
                        </div>
                    </div>
                </div> 
                <hr style="color: #47748b">
                <strong>   <center> Caracteristicas sobre el producto  </center>    </strong>   <hr style="color: #47748b">
                <div class="form-group">
                    <label class="">Titulo</label>
                    <input class="form-control " id="caractericticatitulo" name="caractericticatitulo" type="text" required="">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-sm-4" ></div>
                <div class="col-sm-4" id="" name="">
                    <div class="form-group">
                        <select name="provincia" id="provincia" class="form-control">
                            <option value="" disabled selected>Cantidad Caracteristicas...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input  id="cantidadCa" name="cantidadCa"  type="hidden" />
                    </div>
                </div>
                <div class="col-sm-4" ></div>
            </div>





            <div class="row">
                <div class="col-sm-3" ></div>
                <div class="col-sm-7" id="item" name="item">

                </div>
                <div class="col-sm-2" ></div>
            </div>
            <!--                        <div class="col-lg-6" >
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                                <td><input type="text" name="caracteristicacriterio[]" placeholder="Escriba su criterio" class="form-control name_list" /></td>
                                                <td><button type="button" name="add" id="add"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-6" >
                                        <table class="table table-bordered" id="dynamic_field2">
                                            <tr>
                                                 <td><a>Agregar Valores</a> </td>
                                                <td><input type="text" name="caracteristicavalor[]" placeholder="Escriba su valor" class="form-control name_list" /></td>
                                               
                                                <td><button type="button" name="add" id="add2"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                        
                                            </tr>
                                        </table>
                                    </div>-->


        </div>


        <div class="row">
            <div class="col-md-12">

                <hr style="color: #47748b">
                <strong> <center> Añade imagenes para el producto  </center> </strong>     <hr style="color: #47748b">
                <br>
                <div class="container ">
                    <div class="row">
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field3">
                                <tr>
                                    <td><input  placeholder="Color: Blanco Tamaño Gris Teclado: Con Luz" type="texto" name="imagenesnombre[]" placeholder="Escriba caracteristica" class="form-control name_list" /></td>
                                    <td><button type="button" name="add3" id="add3"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field4">
                                <tr>
                                    <td><input type="file"  name="imagenesruta[]"  class="form-control name_list"  /></td>
                                    <td><button type="button" name="add4" id="add4"  class="btn btn-success" ><strong>+</strong>  </button></td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>

            </div></div>



        
        
        
        
  
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <center>      <div class="form-group ">
                <button class="btn btn-primary" type="submit" value="Registrar">Registrar Producto</button>
                <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar al menú</a>
            </div>

        </center>
    </form>
    <!--    </center>-->
</div>

<br>
<script>
    $(document).ready(function () {
        
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="caracteristicacriterio[]" placeholder="Ingrese su criterio" class="form-control name_list" /></td><td><button type="button"  name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');


        });
        $('#add2').click(function () {
            i++;

            $('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="text" name="caracteristicavalor[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove2" id="' + i + '" class="btn btn-danger btn_remove2">X</button></td></tr>');


        });

        $('#add3').click(function () {
            i++;

            $('#dynamic_field3').append('<tr id="row' + i + '"><td><input type="text" name="imagenesnombre[]" placeholder="Ingrese el valor" class="form-control name_list" /></td><td><button type="button"  name="remove3" id="' + i + '" class="btn btn-danger btn_remove3">X</button></td></tr>');


        });
        $('#add4').click(function () {
            i++;

            $('#dynamic_field4').append('<tr id="row' + i + '"><td><input type="file" name="imagenesruta[]"  class="form-control name_list" /></td><td><button type="button"  name="remove4" id="' + i + '" class="btn btn-danger btn_remove4">X</button></td></tr>');


        });
        $(document).on('click', '.btn_remove4', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove3', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });

        ///jugar con estos
        $(document).on('click', '.btn_remove2', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();


        });


    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#a').click(function () {
            alert("hola");

        });


        $("item").empty();
        var select = document.getElementById('provincia');
        select.addEventListener('change',
                function () {
                    var selectedOption = this.options[select.selectedIndex];
                  //  console.log(selectedOption.value + ': ' + selectedOption.text);
                    var cantidad = selectedOption.value;
document.getElementById("cantidadCa").value=cantidad;
                    var resultado = "";
                    var cantidadInputs = "";
                    var cantidadRepeater = "";

                    var a = "";

                    for (var i = 1; i <= cantidad; i++) {

                        var idIp = "name" + i;
                        var idRepetear = "repeater" + i;
                        cantidadRepeater += "    <div class='form-groups'>  <input type='text' name='name[]'  class='form-control'  value=" + i + " required /> </div>        <div id=" + idRepetear + "> <div class='repeater-heading' align='center'>  <button  id='a' type='button' class='btn btn-primary repeater-add-btn'>+</button>   </div>  <br> <div class='clearfix'></div> <div class='items' data-group='programming_languages'>  <div class='item-content'>   <div class='form-group'> <div class='row'> <div class='col-md-9'>   <label>Agregue en cada campo un " + i + " DELANTE el valor  </label><input type='text' class='form-control' data-skip-name='true' name='skill[] ' data-group='hola'   required  />   </div><div class='col-md-3' style='margin-top:24px;' align='center'> <button id='remove-btn' name='remove-btn' class='btn btn-danger' type='button' > Remove</button>  </div> </div>  </div>  </div>   </div>  </div>    ";
                        document.getElementById("item").innerHTML = cantidadRepeater;


                        $("#repeater1").createRepeater();
                        $("#repeater2").createRepeater();
                        $("#repeater3").createRepeater();
                        $("#repeater4").createRepeater();
                        $("#repeater5").createRepeater();
                        $("#repeater6").createRepeater();
                        $("#repeater7").createRepeater();
                        $("#repeater8").createRepeater();
                        $("#repeater9").createRepeater();
                        $("#repeater10").createRepeater();

                    }




                });









        //    $(this).parents('.items').remove();


    });//fin document

</script>


<?php

require 'public/footer.php';
