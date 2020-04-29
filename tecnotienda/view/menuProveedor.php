<?php
require 'public/headerMenuP.php';
?>


<br>
<div class="container">
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
                            <td>  <a  class="btn btn-danger" href='?controlador=Proveedor&accion=listarProveedorDetalle'> Detalle

                                </a> </td>
                            <td>  <a  class="btn btn-danger" href='?controlador=Proveedor&accion=eliminarCliente&clienteid=<?php echo $item[0] ?>'> Eliminar

                                </a> </td>
                            <td> 
                                <a  class="btn btn-danger" href='?controlador=Proveedor&accion=filtarClienteById&clienteid=<?php echo $item[0] ?>'> Actualizar Correo </a> 

                                <a  class="btn btn-danger" href='?controlador=Proveedor&accion=filtarClienteById2&clienteid=<?php echo $item[0] ?>'> Actualizar Telefono </a> 

                                <a  class="btn btn-danger" href='?controlador=Proveedor&accion=filtarClienteById3&clienteid=<?php echo $item[0] ?>'> Actualizar Detalle</a> 
                            </td>
                            <td><?php echo $item[0] ?></td>
                            <td><?php echo $item[1] ?></td>
                            <td><?php echo $item[2] ?></td>
                            <td><?php echo $item[3] ?></td>
                            <td><?php echo $item[4] ?></td>

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
<script type="text/javascript">

    <?php
    require 'public/footerMenuP.php';
    ?>