<?php
include_once 'public/headerCliente.php';
?>

<div class="container" >
        <br>
            <hr style="color: #999">
    <center><h5>Lista de Combos</h5></center>
    <hr style="color: #999">
           <br>       <br>       <br>       <br>
    <div class="row ">
       <br>       <br>       <br>
        <?php
        foreach ($vars['listado'] as $item) {
            ?>
            <div class="card gallery" style="width: 19rem;border:2px solid #ebe3e3">


                <img src="<?php echo $item[5] ?>" class="card-img-top " width="80" height="200" alt="...">
                <div class="card-body">

                    <p class="card-text">
                        <font style="text-transform: uppercase;">
                    <center>
                        <hr style="border-top: 1px solid black;" width="50%">
                        <strong><?php echo $item[4] ?>  </strong>
                        <hr style="border-top: 1px solid black;" width="50%">
                    </center>
                    </font>

                    <h5 class="btn btn-outline-info animated infinite bounceIn slow"  >Precio: ₡<?php echo $item[3] ?> </h5>
                    <br>
                    <h5 value="<?php echo $item[0] ?>" class="btn btn-dark animated infinite bounceInRight slow" >COMPRAR AHORA!</h5>
                </div>
                <hr style="border-top: 5px solid #ebe3e3">
            </div>


            <hr style="  border-top: 1px solid #ebe3e3;">

            <?php
        }
        ?>
    </div>
           <br>       <br>       <br>       <br>
</div>
<?php
include_once 'public/footer.php';
?>

