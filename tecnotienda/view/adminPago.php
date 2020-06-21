<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <center><h5>Compras realizadas</h5></center>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Detalles</th>
                        <th scope="col">#Codigo</th>       
                        <th scope="col"> Cliente</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">CxC</th>
                       <th scope="col">Contado</th>
                           <th scope="col">Fecha</th>
                    </tr>
                </thead>

                <tbody>

                    
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                        <tr>
                            <td>  <a  class="btn btn-outline-info" href='?controlador=Compra&accion=detallecompraadmin&clientecompraid=<?php echo $item[0] ?>'> Detalles

                                </a> </td>
               
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[3] ?></td>
                             <td><?php echo $item[4] ?></td>
                               <td><?php echo $item[5] ?></td>
                        </tr>

                        <?php
                    }
                    ?>
                   
                </tbody>


            </table>
        </div>
    </div>
</div>
<br><br><br><br>
<?php
require 'public/footer.php';
?>