<?php
include_once 'public/header.php';
?>
<br>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <form action="?controlador=Cliente&accion=loginClientee" method="POST" class="">
                <hr style="color: #47748b">
                <center><h5>Módulo Cliente</h5></center>
                <hr style="color: #47748b">
                <div class="form-group">
                    <center>  <label for="username">Usuario</label></center>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Nombre Usuario">
                </div>
                <br>

                <div class="form-group">
                    <center>  <label for="password">Clave</label></center>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
             

              </div>
                     <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>
                <div class="form-group ">
                    
                            <center>      <a class=""  href="?controlador=Cliente&accion=registrarClienteVista">Registrarse</a>          </center>  
                     
                               <center>   <a href="?controlador=Cliente&accion=loginAdmin">Iniciar Session como Admin</a></center>
           
                </div>
                <div class="form-group">
                    <center>

                        <input type="submit" name="submit"  id="submit" class="btn btn-sm btn-outline-secondary"  value="Ingresar" />
                         <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Usuario&accion=menuPrincipalUsuario">Regresar</a>
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



<?php
include_once 'public/footer.php';
?>
