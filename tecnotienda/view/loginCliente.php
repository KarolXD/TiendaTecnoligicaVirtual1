<?php
include_once 'public/header.php';
?>
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <form action="?controlador=Cliente&accion=inicioSesionAdmin" method="POST" class="border p-3 form">
                 <center><h5>Iniciar Session</h5></center>
               <hr style="color: #47748b">
                <div class="form-group">
                    <!--                <label for="username">Nombre Administrador</label>-->
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Nombre Usuario">
                </div>
                <br>

                <div class="form-group">
                    <!--                <label for="password">Contraseña</label>-->
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
<br>

                    <center>   <a href="?controlador=Cliente&accion=loginAdmin">Iniciar Session como Admin</a></center>
                </div>
                <div class="form-group">
                    <center>
                        <a class="btn btn-sm btn-outline-secondary"  name="submit" type="submit" value=" Acceder "> Acceder</a>
                        <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Cliente&accion=menuPrincipal">Regresar</a>
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
<br>
<br>


<?php
include_once 'public/footer.php';
?>
