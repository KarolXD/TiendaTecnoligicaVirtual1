<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-sm-4" >
            <form  method="POST"   autocomplete="off" class="form" method="POST" id="formularioClienteM" enctype="multipart/form-data">

                <?php
                foreach ($vars['actualizarCliente'] as $item) {
                    ?>
                    <center><h5>Modificar mis datos</h5></center>
                    <hr style="color: #47748b">
                    <div class="form-group">
                        <label for="username">Identificación</label>
                        <input type="text" class="form-control" id="codigoPersona" name="codigoPersona"  value="<?php echo $item[0]?>"  placeholder="Identifiación" readonly="">

                    </div>
                    <div class="form-group">
                        <label for="username">Mi Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $item[1]?>"  placeholder="Nombre " required="">
                    </div>


                    <div class="form-group">
                        <label for="username">Mi Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $item[2]?>"  placeholder="Apellido1 " required>
                    </div>
                    <div class="form-group">
                        <label for="username">Mi Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $item[3] ?>"  placeholder="Apellido2" required> 
                    </div>
                    <div class="form-group">
                        <label for="username">Mis Correo </label>
                        <input type="text" class="form-control" id="correo1" name="correo1"  value="<?php echo $item[4] ?>"  Correo 1" required>
                        <br>
                        <input type="text" class="form-control" id="correo2" name="correo2" value="<?php echo $item[5] ?>" placeholder=" Correo 2" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Mis Telefonos</label>
                        <input type="tel" class="form-control" id="telefono1" name="telefono1" value="<?php echo $item[6] ?>"   placeholder="Telefono 2" required>
                        <br>
                        <input type="tel" class="form-control" id="telefono2" name="telefono2"  value="<?php echo $item[7] ?>"  placeholder="Telefono 1" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Mi Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"  value="<?php echo $item[8] ?>" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mi Contraseña</label>
                        <input type="password" class="form-control" id="contrasenia" name="contrasenia" value="<?php echo $item[9] ?>"  placeholder="Contraseña" required>
                    </div>
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-md-12"  name="alertControl" id="alertControl"></div>
                    <div class="form-group">
                        <center>
                            <button class="btn btn-warning" type="submit" value="Registrar">Modificar Cliente</button>
                            <a href="?controlador=Cliente&accion=menuClientes" class="btn btn-info" >Regresar</a>
                        </center>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php
require 'public/footerMenuP.php';

