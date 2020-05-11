<?php
include_once 'public/headerMenuP.php';
?>

<br>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <form action="?controlador=Usuario&accion=guardarUsuario" method="POST" class="">
                <hr style="color: #47748b">
                <center><h5>Registrar Cliente</h5></center>
                <hr style="color: #47748b">
                <div class="form-group">
                    <center>  <label for="username">Usuario</label></center>
                    <input  minlength="5" maxlength="40" required pattern="[A-Za-z0-9]+"  title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 40"  type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Nombre Usuario">
                </div>
                <br>

                <div class="form-group">
                    <center>  <label for="password">Clave</label></center>
                    <input  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 1 número y una letra mayuscula y minuscula, y minimo 8 caracteres"  type="password"  class="form-control" id="password" name="password" placeholder="Contraseña">


                </div>
                <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                </div>
                <div class="form-group ">



                </div>
                <div class="form-group">
                    <center>

                        <input type="submit" name="submit"  id="submit" class="btn btn-sm btn-outline-secondary"  value="Ingresar" />
                        <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Usuario&accion=listarUsuarios">Regresar</a>
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
