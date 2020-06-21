<?php
require 'public/headerMenuP.php';
?>



<div class="container">
    <h5>  <center>Producto más vendidos por dia</center></h5>
    <br><br><br>
    <div class="row">

        <table class="table">

            <thead class="thead-dark">
                <tr>


                    <th scope="col">Fecha</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Dia</th>


                </tr>
            </thead>
            <tbody>
                <?php
              
                   foreach ($vars['listado'] as $item) {
             
                ?>
                <tr>
               <th scope="row"><?php echo $item[0] ?></th>
                <th scope="row"><?php echo $item[1] ?></th>
                <th scope="row"><?php echo $item[2] ?></th>
                <th scope="row"><?php echo $item[3] ?></th>
                 

                </tr>

<?php
                   }
?>

            </tbody>
        </table>


    </div>
    <hr style="color:black">


    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>




<?php
require 'public/footer.php';
