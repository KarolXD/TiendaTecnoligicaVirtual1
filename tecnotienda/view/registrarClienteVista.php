<?php
include_once 'public/header.php';
?>

<div class="container">

    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4" >
            <center>

                <div class="form-group">
                    <form action="?controlador=Cliente&accion=registrarCliente"   method="post" id="formulario1" name="formulario1">
                        <hr style="color: #47748b">
                        <h5>  <center>Datos del Cliente </center></h5>
                        <hr style="color: #47748b">


                        <div class="form-group">
                            <label class="form-control-label">Usuario</label>

                            <input type="text"  minlength="7" maxlength="40" required pattern="[A-Za-z0-9]+"  title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 40" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Clave</label>

                            <input type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 1 número y una letra mayuscula y minuscula, y minimo 8 caracteres" class="form-control" id="contra" name="contra" aria-describedby="emailHelp" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-group" style="display: none">
                            <input type="number" class="form-control" id="estado" name="estado" aria-describedby="emailHelp" value="0" required="">
                        </div>



                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                <label class="form-control-label">Correos</label>
                                <td><input type="email" required=""  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  name="name[]" id="id_mail"  placeholder="Escriba su correo" class="form-control name_list" /></td>
                                <td><button type="button" name="add" id="add"  class="btn btn-success" ><strong>+</strong></button></td>
                                </tr>
                            </table>


                            <table class="table table-bordered" id="dynamic_fieldd">
                                <label class="form-control-label">Telefono</label>
                                <tr>
                                    <td><input type="tel"  minlength="8"  required name="names[]" placeholder="Escriba su telefono" class="form-control name_list" /></td>
                                    <td><button type="button" name="addd" id="addd"  class="btn btn-success" ><strong>+</strong> </button></td>
                                </tr>
                            </table>
                        </div>


                        <div class="form-group">
                            <label class="form-control-label">Direccion</label>

                            <select required class="form-control" name="provincia" id="provincia" asp-for="TC_Provincia" onchange="visualizarCanton()">
                                <option value="0">Elige una provincia</option>
                                <option value="1">San José</option>
                                <option value="2">Alajuela</option>
                                <option value="3">Cartago</option>
                                <option value="4">Heredia</option>
                                <option value="5">Guanacaste</option>
                                <option value="6">Puntarenas</option>
                                <option value="7">Limón</option>
                            </select>
                            <span asp-validation-for="TC_Provincia" class="text-danger"></span>

                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Canton</label>

                            <select required class="form-control" id="canton" name="canton" asp-for="TC_Canton" onchange="visualizarDistrito()">
                            </select>

                            <span asp-validation-for="TC_Canton" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <label class="form-control-label">Distrito</label>

                            <select required  asp-for="TC_Distrito" id="distrito" name="distrito" class="form-control">
                            </select>
                            <span asp-validation-for="TC_Distrito" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp" placeholder="Direccion" required="">
                        </div>



                        <div class="form-group">
                                   <hr style="color: #47748b">
                            <label class="form-control-label">Datos Bancarios</label>
                            <hr style="color: #47748b">
                            <label class="form-control-label">Nombre de Banco</label>
                            <input type="text" class="form-control" id="banco" name="banco" aria-describedby="emailHelp" placeholder="Banco de la tarjeta" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Número Cuenta</label>
                            <input type="text" class="form-control"  minlength="16"  id="numerocuenta" name="numerocuenta" aria-describedby="emailHelp" placeholder="Numero de Cuenta" required="">
                        </div>
       <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>

                        <div class="form-group">
                            <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Registrar" />
                            <a href="?controlador=Usuario&accion=menuPrincipalUsuario" class="btn btn-info" >Regresar</a>
                        </div>

                    </form>


                </div>

            </center>
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

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="email"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" name="name[]" placeholder="Ingrese su correo" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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

            $('#dynamic_fieldd').append('<tr id="roww' + y + '"><td><input type="tel"  minlength="8" required  name="names[]" placeholder="Ingrese su telefono" class="form-control name_list" /></td><td><button type="button" name="removee" id="' + y + '" class="btn btn-danger btn_removee">X</button></td></tr>');
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
