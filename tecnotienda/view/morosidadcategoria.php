
<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <center><h5> Listado de Morosos!</h5></center>
    <br>
    <br>
    <div class="form-group ">   <div  class="alertControl alert alert-primary" name="alertControl" id="alertControl"> </div></div>

    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Cliente </th>       
                        <th scope="col">Categoria  </th>
                        <th scope="col">Total Deuda</th>
                        <th scope="col">Fecha Limite</th>
                        
                        <th scope="col">Estado</th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    foreach ($vars['listado'] as $item) {
                    
                        ?>
                        <tr>                          
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[3] ?></td>
                            <td><?php      $estatus;
                        $estado=$item[4];
                        if  ($estado==1) {
                      echo   ' <div class="alert-danger"">'. $estatus="Moroso".' ';   
                        }else{
                            echo   ' <div class="alert-infor"">'. $estatus="No presenta Morosidad".' '; 
                        } ?></td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>
    </div>
</div>
<BR><BR>

<?php
include_once 'public/footer.php';
?>