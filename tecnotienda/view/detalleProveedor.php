<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <div class="row">
           <div class="col-md-4"></div>
        <div class="col-md-4">
         <br>
             <center><h5 style="background-color: #aaa">Detalle sobre el Proveedor</h5></center>
    <hr style="color: #999">
    <br>
            <?php
            foreach ($vars['listado'] as $item) {
                ?>
               
                    <p>Identificacion: <?php echo $item[0] ?></p>
                   <hr style="color: #999">
                    <p>Empresa: <?php echo $item[1] ?></p>
                      <hr style="color: #999">
                    <p>Detalle: <?php echo $item[2] ?></p>
                      <hr style="color: #999">
                    
                    
                    <p>Correo:</p>
                    <?php
                    $pizza = ($item[3]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    for ($i = 0; $i <= $contadorComas - 1; $i++) {
                        ?>
                        <p> <?php echo $pieces[$i] ?></p>  

                        <?php
                    }
                    ?>

                      <hr style="color: #999">
                    <p>Telefono:</p>

                    <?php
                    $pizza2 = ($item[4]);
                    $piecess = explode(",", $pizza2);
                    $contadorComass = substr_count($pizza2, ',');
                    for ($y = 0; $y <= $contadorComass - 1; $y++) {
                        ?>
                        <p> <?php echo $piecess[$y] ?></p>  

                        <?php
                    }
                    ?>
             <hr style="color: #999">
                <?php
            }
            ?>
             <br><br>
      <a href="?controlador=Proveedor&accion=listarProveedor" class="btn btn-outline-info" >Regresar</a>
     
        </div>
              <div class="col-md-4"></div>
    </div>
</div>

  <br><br>
    <?php
    require 'public/footerMenuP.php';
    ?>
