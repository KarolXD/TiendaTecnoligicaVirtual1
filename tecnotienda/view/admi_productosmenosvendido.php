<?php
require 'public/headerMenuP.php';
?>



<div class="container">
    <h5>  <center>Producto menos vendidos</center></h5>
      <br><br><br>
    <div class="row">

        <table class="table">
      
            <thead class="thead-dark">
                <tr>
                  
                    <th scope="col">Detalle</th>
                    <th scope="col">Menos Vendidas</th>
                      <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
     <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                <tr>
                    <th scope="row"><?php echo $item[0] ?></th>
                    <td><?php echo $item[1] ?></td>
                    <td><?php echo $item[2] ?></td>
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
