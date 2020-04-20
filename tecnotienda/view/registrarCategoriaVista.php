<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>  <center>Registrar una Categoria </center></h5>
            <hr style="color: #47748b">
            <form id="formularioCategorias" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username"> Escribe el nombre de una Categoria</label>
                    <input type="text" class="form-control" id="categorianombre" name="categorianombre" placeholder="Categoria" required="">
                </div>



                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                        <a href="?controlador=Categoria&accion=menuCategoriaVista" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
                <div  name="alertControl" id="alertControl"></div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<br>
<?php
include_once 'public/footerMenuP.php';
?>
