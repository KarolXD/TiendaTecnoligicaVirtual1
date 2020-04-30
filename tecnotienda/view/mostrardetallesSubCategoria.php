
<?php
include_once 'public/headerUsuario.php';
?>

<div class="container">
    <br><br><br>
    <div class="row">


        <?php
        foreach ($vars['listado'] as $item) {
            ?>
            <div class="col-sm-6"></div>   
            <div class="col-sm-6">
                Sub Categorias: <?php echo$item[3] ?>  </div> </div>

        <br><br>
        <div class="row">
            <div class="card-group">

                <div class="card">
                    <br>

                    <center  style="border-bottom-style: groove"><a href="#"> <h5  class="card-title" ><?php echo$item[1] ?></h5></a></center>
                    <br>
                    <?php
                    $pizza = ($item[0]);
                    $pieces = explode(",", $pizza);
                    $contadorComas = substr_count($pizza, ',');
                    for ($i = 0; $i <= 1 - 1; $i++) {
                        ?>

                    <a href="#"> <img width="30" height="210"  class="card-img-top" src="<?php echo $pieces[$i] ?>" alt="Card image cap"> </a>
                        <?php
                    }
                    ?>

                    <div class="card-body">
                        <center>  <font size="5"> <p class="card-text" style="border-bottom-style: groove">Precio: $<?php echo$item[2] ?></p></font></center>


                        <p class="card-text"><small class="text-muted"><?php echo$item[4] ?></small></p>
                    </div>
                </div>


            </div>


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

