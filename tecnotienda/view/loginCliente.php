<?php
include_once 'public/header.php';
?>

<div class="container">
    <div class="abs-center">
     
        <form action="?controlador=Item&accion=inicioSesionAdmin" method="POST" class="border p-3 form">
   <center><h3>Iniciar Session</h3></center>
            <div class="form-group">
<!--                <label for="username">Nombre Administrador</label>-->
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Nombre Usuario">
            </div>
            <div class="form-group">
<!--                <label for="password">Contraseña</label>-->
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
    
                       <center>   <a href="?controlador=Item&accion=loginAdmin">Iniciar Session como Admin</a></center>
            </div>
            <div class="form-group">
                <center>
                    <a class="btn btn-sm btn-outline-secondary"  name="submit" type="submit" value=" Acceder "> Acceder</a>
                          <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Item&accion=menuPrincipal">Regresar</a>
                </center>
              
            </div>
        </form>
    </div>
</div>


<?php
include_once 'public/footer.php';
?>
