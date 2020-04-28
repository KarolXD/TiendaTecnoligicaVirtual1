<?php
include_once 'public/header.php';
?>
<div class="container">

    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-6" >
            <center>

                <div class="form-group">
                    <form action="?controlador=Cliente&accion=registrarCliente"   method="post" id="formulario1" name="formulario1">

                        <h3>Usuario</h3>
                        <div class="form-group">
                            <input type="number" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="contra" name="contra" aria-describedby="emailHelp" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-group" style="display: none">
                            <input type="number" class="form-control" id="estado" name="estado" aria-describedby="emailHelp" value="0" required="">
                        </div>

                        <h3>Correo y Telefono</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="email" name="name[]" placeholder="Escriba su correo" class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add"  class="btn btn-success" >Agregar un correo más </button></td>
                                </tr>
                            </table>

                            <table class="table table-bordered" id="dynamic_fieldd">
                                <tr>
                                    <td><input type="number" name="names[]" placeholder="Escriba su telefono" class="form-control name_list" /></td>
                                    <td><button type="button" name="addd" id="addd"  class="btn btn-success" >Agregar un telefono más </button></td>
                                </tr>
                            </table>
                            
                        <h3>Direccion</h3>
                            <div class="form-group">
                                <label asp-for="TC_Provincia" class="control-label"></label>

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
                        <h5>Canton</h5>
                            <div class="form-group">
                                <label asp-for="TC_Canton" class="control-label"></label>

                                <select required class="form-control" id="canton" name="canton" asp-for="TC_Canton" onchange="visualizarDistrito()">
                                </select>

                                <span asp-validation-for="TC_Canton" class="text-danger"></span>
                            </div>
                        <h5>Distrito</h5>
                            <div class="form-group">
                                <label asp-for="TC_Distrito" class="control-label"></label>

                                <select required  asp-for="TC_Distrito" id="distrito" name="distrito" class="form-control">
                                </select>
                                <span asp-validation-for="TC_Distrito" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp" placeholder="Direccion" required="">
                            </div>

                        <h3>Datos Bancarios</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="banco" name="banco" aria-describedby="emailHelp" placeholder="Banco de la tarjeta" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="numerocuenta" name="numerocuenta" aria-describedby="emailHelp" placeholder="Numero de Cuenta" required="">
                            </div>



                            <input type="submit" name="submit"  id="submit" class="btn btn-info" value="Registrar" />
                            <a href="?controlador=Cliente&accion=menuPrincipal" class="btn btn-info" >Regresar</a>
                        </div>

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




<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;

            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Ingrese su correo" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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

            $('#dynamic_fieldd').append('<tr id="roww' + y + '"><td><input type="text" name="names[]" placeholder="Ingrese su telefono" class="form-control name_list" /></td><td><button type="button" name="removee" id="' + y + '" class="btn btn-danger btn_removee">X</button></td></tr>');
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
