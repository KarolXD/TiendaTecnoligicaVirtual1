<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="abs-center">

        <h2> Registrar Cliente</h2>
        <form action="?controlador=Item&accion=registrarCliente" class="border p-3 form">
            <div class="form-group">
                <label for="username">Código Persona</label>
                <input type="text" class="form-control" id="codigoPersona" name="codigoPersona" aria-describedby="emailHelp" placeholder="Código Persona" required="">

            </div>
            <div class="form-group">
                <label for="username">Nombre Persona</label>
                <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre Persona" required="">
            </div>


            <div class="form-group">
                <label for="username">Apellido1 Persona</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" aria-describedby="emailHelp" placeholder="Apellido1 " required>
            </div>
            <div class="form-group">
                <label for="username">Apellido2 Persona</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" aria-describedby="emailHelp" placeholder="Apellido2" required> 
            </div>
            <div class="form-group">
                <label for="username">Correo Persona</label>
                <input type="text" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder=" Correo" required>
            </div>
            <div class="form-group">
                <label for="username">Tipo Usuario Persona</label>
                <input type="text" class="form-control" id="tipoUsuario" name="tipoUsuario" aria-describedby="emailHelp" placeholder="Tipo Persona" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
            </div>
         
            <div class="form-group">
                <center>
                    <input name="submit" type="submit" value=" Acceder " class="btn btn-info">
                    <a href="?controlador=Item&accion=menuPrincipal" class="btn btn-info" >Regresar</a>
                </center>
            </div>
        </form>
    </div>
</div>



<?php
include_once 'public/footer.php';
?>
