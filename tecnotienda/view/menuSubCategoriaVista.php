<?php
require 'public/headerMenuP.php';
?>
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Filtrar por nombre" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar </button>
</form>
<center>
    <a href="?controlador=Producto&accion=registrarSubCategoriaVista"> Registrar SubCategoria</a>
</center>
<br>
<div class="table-responsive-sm">
    <table class="table table-bordered" id="tblSubCategorias">
        <thead>
            <tr>
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
                <th scope="col">#Codigo</th>       
                <th scope="col">SubCategoria</th>
            </tr>
        </thead>

        <tbody>

            <tr>





            </tr>
        </tbody>


    </table>
</div>

<?php
require 'public/footerMenuP.php';
