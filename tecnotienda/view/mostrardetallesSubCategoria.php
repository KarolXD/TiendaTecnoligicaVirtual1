
<?php
include_once 'public/headerUsuario.php';
?>

<div class="container">
    <br><br><br>
  <center style="background-color: #6d7fcc">    <font style="text-transform: uppercase;">   <p class="card-text"><strong> Echale un vistazo a nuestro contenido </strong>  </p>    </font> 
                </center>

    <br><br>


    <div class="row">
        <?php
        foreach ($vars['listado'] as $item) {
            ?>
    

            <div class="card" style="width: 18rem;">
              
                <center style="background-color: #6d7fcc">    <font style="text-transform: uppercase;">   <p class="card-text"> <strong><?php echo$item[3] ?>   </strong> </p>    </font> 
                </center>
            
             
                <hr style="border-top: 1px solid black;">
                <?php
                $pizza = ($item[0]);
                $pieces = explode(",", $pizza);
                $contadorComas = substr_count($pizza, ',');
                for ($i = 0; $i <= 1 - 1; $i++) {
                    ?>


                <a href="?controlador=Producto&accion=mostrarDetallesProducto&productoid=<?php echo$item[4] ?>"> <img src="<?php echo $pieces[$i] ?>" class="card-img-top" width="80" height="130" alt="..."> </a>
                    <?php
                }
                ?>

                <div class="card-body">
                  
                    <p class="card-text">Precio: <img src="./public/img/money.png" alt="...">  <font size="5"><?php echo$item[2] ?></font>  </p>
                    <hr style="border-top: 1px solid black;">
                    <a href="?controlador=Producto&accion=mostrarDetallesProducto&productoid=<?php echo$item[4] ?>">  <h5 class="card-title"><?php echo$item[1] ?>  </h5> </a>
                </div>
                <hr style="border-top: 5px solid black;">
            </div>


            <hr style="border-top: 5px solid black;">

         <br>
   
 
            <?php
            
        }
        ?>

    </div>
                
    <br>
    <br><br><br><br><br>
<center><a  href="?controlador=SubCategoria&accion=mostrarSubCategorias&categoriaid=<?php echo$item[5] ?>" class="btn btn-info"> Regresar</a></center>
     
</div>


<br><br><br><br><br>
<br><br><br><br><br>

<?php
include_once 'public/footerUsuario.php';

