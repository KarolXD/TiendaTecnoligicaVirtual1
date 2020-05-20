<?php
include_once 'public/headerMenuP.php';
?>
<div class="container">
 <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4" >
            <center>

                <div class="form-group">
                    <form action="?controlador=Proveedor&accion=registrarProveedor"   method="post" id="formulario1" name="formulario1">
      <hr style="color: #47748b">
                       
                        <h4><center>Ingresar Proveedores</center></h4>
                             <hr style="color: #47748b">
                        <div class="form-group">
                            Pasaporte/Cédula
                            <input type="text" pattern="^[9|8|7|6|5|4|3|2|1]\d{8}$" required=""  class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" required="">
                        </div>
                        <div class="form-group">
                            <input  class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 1 número y una letra mayuscula y minuscula, y minimo 8 caracteres"  type="password" id="contra" name="contra" aria-describedby="emailHelp" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="empresa" name="empresa" aria-describedby="emailHelp" placeholder="Nombre Empresa" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" placeholder="Detalle" required="">
                        </div>
                        <div class="form-group" style="display: none">
                            <input type="number" class="form-control" id="estado" name="estado" aria-describedby="emailHelp" value="0" required="">
                        </div>

                        <label>Correo y Telefono</label>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input required type="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" name="name[]" placeholder="Escriba su correo" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add"  class="btn btn-success" ><strong> +</strong> </button></td>
                                </tr>
                            </table>

                            <table class="table table-bordered" id="dynamic_fieldd">
                                <tr>
                                    <td><input type="tel"  minlength="8"  required name="names[]" placeholder="Escriba su telefono" class="form-control name_list" /></td>
                                    <td><button type="button" name="addd" id="addd"  class="btn btn-success" ><strong>+</strong> </button></td>
                                </tr>
                            </table>      

                            <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Registrar" />
                            <a href="?controlador=Proveedor&accion=menuProveedor" class="btn btn-info" >Regresar</a>
                        </div>

                    </form>


                </div>

            </center>
            
              <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>
        </div>
        <div class="col-md-4"></div>

    </div>


</div>
<br>
<br>
<br>




<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required  name="name[]" placeholder="Ingrese su correo" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            //  document. getElementById("contadorcorreo").value(i);

        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");

            $('#row' + button_id + '').remove();

        });
    });

    $(document).ready(function () {
        var y = 1;
        $('#addd').click(function () {
            y++;

            $('#dynamic_fieldd').append('<tr id="roww' + y + '"><td><input  minlength="8"  type="text" required name="names[]" placeholder="Ingrese su telefono" class="form-control name_list" /></td><td><button type="button" name="removee" id="' + y + '" class="btn btn-danger btn_removee">X</button></td></tr>');
            //  document. getElementById("contadorcorreo").value(i);

        });

        $(document).on('click', '.btn_removee', function () {
            var button_id = $(this).attr("id");

            $('#roww' + button_id + '').remove();

        });
    });
</script>


<?php
include_once 'public/footer.php';
?>
