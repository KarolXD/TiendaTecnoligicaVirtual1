<?php
include_once 'public/header.php';
?>

<div class="container">
    
          <a href="?controlador=Cliente&accion=listarCorreo" class="btn btn-info" >Listar</a>
    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-6" >
            <center>
          
                <div class="form-group">
                    <form action="?controlador=Cliente&accion=registrarCliente"  method="post" name="" id="">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="text" name="name[]" placeholder="Escriba su correo" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add" onclick="sumar();" class="btn btn-success" >Agregar un correo más </button></td>
                                </tr>
                            </table>
                            <div class="form-group">
                             
                                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" required="">
                            </div>

                            <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Submit" />
                              <a href="?controlador=Cliente&accion=menuPrincipal" class="btn btn-info" >Regresar</a>
                        </div>

                    </form>


                </div>

            </center>
        </div>
        <div class="col-md-2"></div>

    </div>
    <?php
   
$pizza  = "piece1,piece2,piece3,piece4,piece5,piece6";
$pieces = explode(",", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

?>

</div>
<br>
<br>
<br>




<script>
    var n = 1;
    function sumar() {
        n = n + 1;
        $('#contadorcorreo').val(n);

    }
    function borrar() {
        n = n - 1;
        $('#contadorcorreo').val(n);
    }

</script>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Ingrese su correo" class="form-control name_list" /></td><td><button type="button" onclick="eliminar()" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            //  document. getElementById("contadorcorreo").value(i);

        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();
            borrar();

        });


//        $('#submit').click(function () {
//            $.ajax({
//                url: "?controlador=Cliente&accion=registrarCliente",
//                method: "POST",
//                data: $('#add_name').serialize(),
//                success: function (data)
//                {
//
//                    alert(data);
//                    $('#add_name')[0].reset();
//                }
//            });
//        });

    });
</script>

<?php
include_once 'public/footer.php';
?>
