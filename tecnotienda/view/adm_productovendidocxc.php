<?php
require 'public/headerMenuP.php';
?>



<div class="container">
    <h5>  <center>Producto más vendido, cuentas por cobrar</center></h5>
      <br><br><br>
    <div class="row">

        <table class="table">
      
            <thead class="thead-dark">
                <tr>
                  
                    <th scope="col">Cliente</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Fecha de Compra</th>
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
