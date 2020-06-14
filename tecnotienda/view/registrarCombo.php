
<?php

require 'public/headerMenuP.php';
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>   
<script src="./public/js/repeater.js" type="text/javascript"></script>

<div class="container">


    <h5>  <center>Registra Combo </center></h5>
    <hr style="color: #47748b">
         <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
             
    <form  action="?controlador=Producto&accion=registrarCombo" method="POST"  enctype="multipart/form-data">
        <div class="row">
          
            <div class="col-md-4">
               <hr style="color: #47748b">
                    <strong>   <center>Datos sobre el combo </center></strong>
                    <hr style="color: #47748b">

                <div class="form-group">
                    <label class="form-control-label">Código de Barras</label>
                    <input class="form-control" id="productocodigobarras" name="productocodigobarras"type="number" placeholder="Código de Barras" required="">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Cantidad</label>
                    <input class="form-control" id="cantidad" name="cantidad"type="number" placeholder="Cantidad del combo" required="">
                </div>

            </div>
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
              
            </div>
            <div class="col-md-4">
                
                <hr style="color: #47748b">
                <strong>   <center> Caracteristicas sobre el combo  </center>    </strong>   <hr style="color: #47748b">
                <div class="form-group">
                    <label class="">Titulo</label>
                    <input class="form-control " id="caractericticatitulo" name="caractericticatitulo" type="text" required="">
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-md-12">

                <hr style="color: #47748b">
                <strong> <center> Añade imagenes para el combo  </center> </strong>     <hr style="color: #47748b">
                <br>
                <div class="container ">
                    <div class="row">
               
                        <div class="col-sm-6" >
                            <table class="table table-bordered" id="dynamic_field4">
                                <tr>
                                    <td><input type="file"  name="imagenesruta[]"  class="form-control name_list"  /></td>
                                  
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <center>      <div class="form-group ">
                <button class="btn btn-primary" type="submit" value="Registrar">Registrar </button>
                <a class="btn btn-info" href="?controlador=Producto&accion=menuProductoVista" > Regresar </a>
            </div>

        </center>
    </form> 



</div>

<br>
<script type="text/javascript">
    function  mostrarDivs() {
        var valor = document.getElementById("selector").value;
      
        document.getElementById("valorselect").value=valor;  
        document.getElementById("valorselect2").value=valor; 
        document.getElementById("valorselect3").value=valor;
        div = document.getElementById('selector');
        div = "div" + valor;
        
        if (valor == 3) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
        } else if (valor == 5) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
        } else if (valor == 7) {
            document.getElementById(div).style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
        }
    }


</script>
<script>
  $(document).ready(function () {

document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew);
document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew2);
document.getElementById("productocodigobarras").addEventListener('keyup', autoCompleteNew3);
function autoCompleteNew(e) {            
    var value = $(this).val();
    var a=localStorage.setItem("codigoId", document.getElementById("productocodigobarras").value);

    $("#productocodigobarras2").val(value.replace(/\s/g, '').toLowerCase()); 
       $("#productocodigobarras2").val(localStorage.getItem("codigoId"));
    
}
function autoCompleteNew2(e) {            
    var value = $(this).val();         
    $("#productocodigobarras3").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew3(e) {            
    var value = $(this).val();         
    $("#productocodigobarras4").val(value.replace(/\s/g, '').toLowerCase()); 
}


document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew4);



document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew5);
document.getElementById("caractericticatitulo").addEventListener('keyup', autoCompleteNew6);
function autoCompleteNew4(e) {            
    var value = $(this).val();         
    $("#titulo").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew5(e) {            
    var value = $(this).val();         
    $("#titulo1").val(value.replace(/\s/g, '').toLowerCase()); 
}
function autoCompleteNew6(e) {            
    var value = $(this).val();         
    $("#titulo2").val(value.replace(/\s/g, '').toLowerCase()); 
}



        var i = 1;

    
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


        $("#repeater").createRepeater();
        $("#repeater7").createRepeater();
        $("#repeater1").createRepeater();
        $("#repeater2").createRepeater();
        $("#repeater3").createRepeater();
        $("#repeater4").createRepeater();
        $("#repeater5").createRepeater();
        $("#repeater6").createRepeater();
        $("#repeater8").createRepeater();
        $("#repeater9").createRepeater();
        $("#repeater10").createRepeater();
        $("#repeater11").createRepeater();
        $("#repeater12").createRepeater();
        $("#repeater13").createRepeater();
        $("#repeater14").createRepeater();

    });
</script>


<?php

require 'public/footer.php';

