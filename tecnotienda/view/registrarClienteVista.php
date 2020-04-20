<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-sm-4" >

             <form id="formularioCliente" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

                <center><h5>Registrar mis datos</h5></center>
                <hr style="color: #47748b">
                <div class="form-group">
                    <label for="username">Identificación</label>
                    <input type="text" class="form-control" id="codigoPersona" name="codigoPersona" aria-describedby="emailHelp" placeholder="Identifiación" required="">

                </div>
                <div class="form-group">
                    <label for="username">Mi Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre " required="">
                </div>


                <div class="form-group">
                    <label for="username">Mi Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" aria-describedby="emailHelp" placeholder="Apellido1 " required>
                </div>
                <div class="form-group">
                    <label for="username">Mi Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" aria-describedby="emailHelp" placeholder="Apellido2" required> 
                </div>
                <div class="form-group">
                    <label for="username">Mis Correo </label>
                    <input type="text" class="form-control" id="correo1" name="correo1" aria-describedby="emailHelp" placeholder=" Correo 1" required>
                    <br>
                    <input type="text" class="form-control" id="correo2" name="correo2" aria-describedby="emailHelp" placeholder=" Correo 2" required>
                </div>
                <div class="form-group">
                    <label for="username">Mis Telefonos</label>
                    <input type="tel" class="form-control" id="telefono1" name="telefono1"  placeholder="Telefono 2" required>
                    <br>
                    <input type="tel" class="form-control" id="telefono2" name="telefono2"  placeholder="Telefono 1" required>
                </div>
                <div class="form-group">
                    <label for="text">Mi Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <label for="password">Mi Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
                </div>
                <label class="col-lg-3 col-form-label form-control-label"></label>
                <div class="col-md-12"  name="alertControl" id="alertControl"></div>
                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Acceder " class="btn btn-info">
                        <a href="?controlador=Cliente&accion=menuPrincipal" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
            </form>
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
