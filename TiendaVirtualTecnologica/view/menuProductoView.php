<?php
require 'public/headerMenuP.php';
?>

<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Filtrar por nombre" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar </button>
</form>
<center>
    <a href="?controlador=Producto&accion=registrarProductoView"> Registrar Producto</a>
</center>
<br>
<div class="table-responsive-sm">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
                <th scope="col">#Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">SubCategoria</th>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <?php
        foreach ($vars['xd'] as $item) {
            ?>
            <tbody>

                <tr>

                    <td>  <a  class="btn btn-warning" href='?controlador=Producto&accion=filtrarProductoById&codigoProducto=<?php echo $item[0] ?>'>Actualizar</a> </td>
                    <td>   <a  class="btn btn-danger" href="?controlador=Producto&accion=eliminarProducto&codigoProducto=<?php echo $item[0] ?>">Eliminar</a> </td>
                    <td scope="row"><?php echo $item[0] ?></td>
                    <td><?php echo $item[1] ?></td>
                    <td><?php echo $item[2] ?></td>
                
                    <td><?php echo $item[3] ?></td>
                    <td><?php echo $item[4] ?></td>
                    <td><?php echo $item[5] ?></td>
                    <td><?php echo $item[6] ?></td>
                    <td><?php echo $item[7] ?></td>



                </tr>
                     </tbody>
                <?php
            }
            ?>
   
    </table>
</div>
<br>
<?php
require 'public/footerMenuP.php';
