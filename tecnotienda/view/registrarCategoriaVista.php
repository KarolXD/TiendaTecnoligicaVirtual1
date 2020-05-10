<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                <hr style="color: #47748b">
            <h5>  <center>Registrar una Categoria </center></h5>
            <hr style="color: #47748b">
            <form action="?controlador=Categoria&accion=registrarCategoria" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username"> Escribe el nombre de una Categoria</label>
                    <input type="text" class="form-control" id="categorianombre" name="categorianombre" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe una descripción</label>
                    <input type="text" class="form-control" id="categoriadescripcion" name="categoriadescripcion" placeholder="Descripción" required="">
                </div>
                    <div class="form-group ">
                    <input  type="hidden" name="usuarioid"   id="usuarioid"  value="<?php    echo $_SESSION["usuario"];?>">
                </div>
<!--                <div class="form-group">
                    <label for="username"> Escribe el nombre de una fecha</label>
                    <input type="date" class="form-control" id="categoriafecha" name="categoriafecha" placeholder="Descripción" required="">
                </div>-->
<!--                <div class="form-group">
                    <label for="username"> Usuario que agregó categoria</label>
                    <select  name="usuarioid" id="usuarioid" class="form-control">
                    </select>
                </div>-->


                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                        <a href="?controlador=Categoria&accion=menuCategoriaVista" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
               
                      <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<br>
<?php
include_once 'public/footerMenuP.php';
?>
