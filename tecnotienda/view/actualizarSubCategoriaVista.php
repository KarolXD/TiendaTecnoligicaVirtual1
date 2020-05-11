<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5> <center>Modificar una  Sub Categoria </center></h5>
            <hr style="color: #47748b">
            <form action="?controlador=SubCategoria&accion=modificarSubCategoria" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
                <?php
                foreach ($vars['actualizarSubCategorias'] as $item) {
                    ?>

                    <div class="form-group">

                        <input type="hidden"   class="form-control" id="subcategoriaid"  value="<?php echo $item[0] ?>" name="subcategoriaid" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                    </div>
                    <div class="form-group">
                        <label for="username">Escriba una Sub Categoria</label>
                        <input type="text"  readonly=" " class="form-control" id="subcategorianombre"  value="<?php echo $item[2] ?>" name="subcategorianombre" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                    </div>
                    <div class="form-group">

                        <label for="username">Elige una Categoria</label>  
                        <input type="hidden" class="form-control"  readonly="" id="categoriaid1"  value="<?php echo $item[6] ?>" name="categoriaid1" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required=""> 

                        <input type="text" class="form-control"  readonly="" id="categoria"  value="<?php echo $item[1] ?>" name="categoria" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required=""> 
                        <br>
                        <select class="form-control" name="categoriaid"   id="categoriaid" >  <option selected>Selecciona:</option></select> </div>
                    <div class="form-group">
                        <label for="username">Añade una descripción</label>
                        <input type="text" class="form-control" id="subcategoriadescripcion"  value="<?php echo $item[3] ?>" name="subcategoriadescripcion" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                    </div>

                    <div class="form-group ">
                      
                        <input type="hidden" class="form-control" readonly="" id="usuarioid"  value="<?php echo $_SESSION["usuario"] ?>" name="usuarioid" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                        <br>
                    </div>
<!--                    <div class="form-group">
                        <label for="username">Añade una fecha</label>
                        <input type="text" class="form-control" id="subcategoriafecha" name="subcategoriafecha"  value="<?php echo $item[5] ?>" aria-describedby="emailHelp" placeholder="Nombre SubCategoria" required="">
                    </div>-->
                    <div class="form-group">
                        <center>
                            <input name="submit" type="submit" value=" Modificar " class="btn btn-warning">
                            <a href="?controlador=SubCategoria&accion=menuSubCategoriaVista" class="btn btn-info" >Regresar</a>
                        </center>
                    </div>
                    <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div>
                    </div>

                    <?php
                }
                ?>
            </form>


        </div>
        <div class="col-md-4"></div>
    </div>
</div>




<?php
include_once 'public/footerMenuP.php';
?>
