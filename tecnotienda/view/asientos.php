<?php
require 'public/headerMenuP.php';

global $a;
?>

<div class="container">
    <center><h5> Estado Resultados!</h5></center>
    <br>
    <br>

    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Condicion </th> 
                        <th scope="col">Fecha </th>                         
                        <th scope="col">Debe </th>       
                        <th scope="col">Haber</th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    foreach ($vars['listado'] as $item) {
                        $total+=$item[2] ;
                        ?>
                        <tr>                          
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                        </tr>

                        <?php
                    }
                    
                    ?>
                    <tr>                          
                        <td>Ingrso de Productos</td>
                        <td> 2020-01-16 15:24:28 </td>
                        <td></td>
                        <td>2000000.0</td>
                    </tr>
                    <tr>                          
                        <td>Total</td>
                        <td> 2020-21-16</td>
                        <td> <?php echo $total ?></td>
                        <td>2000000.0</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<BR><BR>



<?php
require 'public/footer.php';
?>
