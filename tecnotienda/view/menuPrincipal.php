<?php
include_once 'public/headerMenuP.php';
?>

<div class="container ">
    <div class="row">

        <div class="col-md-12  alert-info animated infinite bounceInRight">
            <label class=""> <font size="34" > Sitio Administrativo Bienvenido a   Tecno Tienda </font></label>


        </div>
    </div>

    
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente </th>       
                        <th scope="col">CXC  </th>
                        <th scope="col">Total Deuda</th>
                        <th scope="col">Fecha Limite</th>
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
                            <td><?php echo $item[4] ?></td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>
    </div>



    <br><br><br><br><br>

    <br><br><br><br><br>
</div>
<?php
include_once 'public/footerMenuP.php';
?>

