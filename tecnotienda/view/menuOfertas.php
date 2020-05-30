<?php
require 'public/headerMenuP.php';
?>


<div class="container">

    <center>  <a href="#"  class="badge badge-primary" data-toggle="modal" data-target="#exampleModal"> nueva Oferta </a>  </center>
    <br><br>
    <div class="row">


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#Código Oferta</th>
                    <th scope="col">Precio</th>
                      <th scope="col">Código Producto</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Fecha Fin</th>
                     <th scope="col">Opciones </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['listado'] as $item) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $item[0] ?></th>
                        <td ><?php echo $item[1] ?></td>
                        <td><?php echo $item[2] ?></td>
                        <td ><?php echo $item[3] ?></td>
                        <td><?php echo $item[4] ?></td>
     <td><?php echo $item[5] ?></td>
     <td><a class="btn btn-warning">Modificar</a>  <a class="btn btn-danger">Eliminar </a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Oferta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?controlador=Oferta&accion=registrarOferta" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            Fecha Inicio Oferta
                            <input  type="datetime-local"class="form-control"   name="fechaIn" id="fechaIn">
                        </div>
                        <div class="form-group">
                            Fecha Final de la  Oferta
                            <input  type="datetime-local"  class="form-control" placeholder="Fecha Fin de la  Oferta" name="fechaFin" id="fechaFin">
                        </div>
                       
                        <div class="form-group">
                            %Descuento
                            <input  type="number" class="form-control" placeholder="Descuento" name="descuento" id="descuento">
                        </div>

                        <div class="form-group">
                            Código Producto
                            <input type="hidden" name="productoid" id="productoid">
                            <select   class="form-control" name="producid" id="producid" onchange="ShowSelected()"> </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
</div>

<script>
    function ShowSelected()
{
var cod = document.getElementById("producid").value;
document.getElementById("productoid").value=cod;



}


</script>
<?php
require 'public/footer.php';
