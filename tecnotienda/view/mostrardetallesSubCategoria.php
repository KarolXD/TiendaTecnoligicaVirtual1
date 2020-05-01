
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


                    <img src="<?php echo $pieces[$i] ?>" class="card-img-top" width="80" height="130" alt="...">
                    <?php
                }
                ?>

                <div class="card-body">
                  
                    <p class="card-text">Precio: <img src="./public/img/money.png" alt="...">  <font size="5"><?php echo$item[2] ?></font>  </p>
                    <hr style="border-top: 1px solid black;">
                      <h5 class="card-title"><?php echo$item[1] ?>  </h5>
                </div>
                <hr style="border-top: 5px solid black;">
            </div>


            <hr style="border-top: 5px solid black;">

            <?php
        }
        ?>

    </div>



</div>

<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>

<?php
include_once 'public/footerUsuario.php';

