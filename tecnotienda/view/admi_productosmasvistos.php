<?php
require 'public/headerMenuP.php';
?>



<div class="container">
    <h5>  <center>Producto más vistos</center></h5>
      <br><br><br>
    <div class="row">

        <table class="table">
      
            <thead class="thead-dark">
                <tr>
                  
                    <th scope="col">Producto</th>
                    <th scope="col">SubCategoria</th>
                    <th scope="col">Clicks</th>
                      
                </tr>
            </thead>
            <tbody>
     <?php
                foreach ($vars['listado'] as $item) {
                    $numero_aleatorio = mt_rand(80,100);
                    
                    ?>
                <tr>
                    <th scope="row"><?php echo $item[0] ?></th>
                    <td><?php echo $item[1] ?></td>
                     <td> <?php  echo $numero_aleatorio?></td>
                     
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
