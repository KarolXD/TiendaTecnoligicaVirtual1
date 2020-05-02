<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
    <center>  <a class="btn btn-sm btn-outline-secondary"  href="?controlador=Proveedor&accion=registrarProveedorVista"type="button">Registrar Proveedor</a></center>
    <br>
    <center><h5>Lista de Proveedores</h5></center>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tblSubCategorias">
                <hr style="color: #6d7fcc">
                <thead>
                    <tr>
                        <th scope="col">Detalle</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>    
                        <th scope="col">Id Proveedor</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Correos</th>
                        <th scope="col">Telefonos</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <?php
                        foreach ($vars['listado'] as $item) {
                            ?>
                        <tr>
                            <td>  <a  class="btn btn-outline-info" href='?controlador=Proveedor&accion=listarProveedorDetalle'> Detalle

                                </a> </td>
                            <td>  <a  class="btn btn-outline-danger" href='?controlador=Proveedor&accion=eliminarCliente&clienteid=<?php echo $item[0] ?>'> Eliminar

                                </a> </td>
                            <td> 
                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById&clienteid=<?php echo $item[0] ?>'>  Correo </a> 

                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById2&clienteid=<?php echo $item[0] ?>'>  Telefono </a> 

                                <a  class="btn btn-outline-warning" href='?controlador=Proveedor&accion=filtarClienteById3&clienteid=<?php echo $item[0] ?>'>  Descripción</a> 
                            </td>
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <?php
                            $pizza = ($item[3]);
                            $pieces = explode(",", $pizza);
                            $contadorComas = substr_count($pizza, ',');
                            for ($i = 0; $i <= $contadorComas - 1; $i++) {
                                ?>
                                <td> <?php echo $pieces[$i] ?></td>  

                                <?php
                            }
                            ?>

                            <?php
                            $pizza2 = ($item[4]);
                            $piecess = explode(",", $pizza2);
                            $contadorComass = substr_count($pizza2, ',');
                            for ($y = 0; $y <= $contadorComass - 1; $y++) {
                                ?>
                                <td> <?php echo $piecess[$y] ?></td>  

                                <?php
                            }
                            ?>

                        </tr>

                        <?php
                    }
                    ?>

                    </tr>
                </tbody>


            </table>
        </div>
    </div>
</div>
<div class="auto" id="auto" style="display: none"><div  id="alertControl" style="opacity: none"></div></div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./public/js/jquery-3.3.1.js" type="text/javascript"></script>


<?php
require 'public/footerMenuP.php';
