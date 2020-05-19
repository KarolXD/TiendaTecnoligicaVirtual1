<?php
require 'public/headerCliente.php';
?>


<br>
<div class="container">

    <center><h5>Lista del carrito</h5></center>
    <hr style="color: #999">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Nombre del Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>   
                        <th scope="col">Quitar del carrito</th>   
                    </tr>
                </thead>

                <tbody>


                    <?php
                    foreach ($vars['listado'] as $item) {
                        global $total;
                        $precio = $item[2];
                        $total += $item[1] * $precio;
                        ?>
                        <tr>
                            <td><?php echo $item[3] ?></td>

                            <td><?php echo $item[1] ?></td>

                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[4] ?></td>

                            <td>  
                                <a  class="btn btn-danger" href='?controlador=Compra&accion=quitardelCarrito&productoid=<?php echo $item[4] ?>'> X
                                </a> 
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    <div class="form-row">
        <div class="form-group col-md-5"></div>
        <div class="form-group col-md-2">    
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><?php echo $total ?></td>
                    </tr>
                </tbody>
            </table>
            <button>Pagar</button>
        </div>
        <div class="form-group col-md-5"></div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">

</script>
<?php
require 'public/footer.php';
?>
