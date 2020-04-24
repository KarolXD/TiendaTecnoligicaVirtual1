<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>  <center>Registrar una Proveedor </center></h5>
            <hr style="color: #47748b">
            <form id="formularioGuardarProveedor" method="post" autocomplete="off" class="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username"> Escribe su cédula Juridica</label>
                    <input type="number" class="form-control" id="proveedorid" name="proveedorid" placeholder="Cédula Jurida/Pasaporte" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el nombre de la empresa</label>
                    <input type="text" class="form-control" id="proveedornombreempresa," name="proveedornombreempresa" placeholder="Nombre Empresa" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Fax</label>
                    <input type="text" class="form-control" id="proveedorfax" name="proveedorfax" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el apartado Postal</label>
                    <input type="number" class="form-control" id="proveedorapartadopostal" name="proveedorapartadopostal" placeholder="Apartado Postal" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe un correo Electrónico</label>
                    <input type="text" class="form-control" id="proveedorcorreo" name="proveedorcorreo" placeholder="Correo Electrónico" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Sitio Web</label>
                    <input type="text" class="form-control" id="proveedorsitioweb" name="proveedorsitioweb" placeholder="SitioWeb" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Contacto Persona</label>
                    <input type="text" class="form-control" id="proveedorpersonadecontacto" name="proveedorpersonadecontacto" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Teléfono</label>
                    <input type="text" class="form-control" id="proveedornumerotelefono" name="proveedornumerotelefono" placeholder="Telefono" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe la dirección Física</label>
                    <input type="text" class="form-control" id="proveedordireccionfisicaempresa" name="proveedordireccionfisicaempresa" placeholder="Direccón Física" required="">
                </div>


                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Registrar " class="btn btn-info">
                        <a href="?controlador=Proveedor&accion=menuProveedor" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
                <div  name="alertControl" id="alertControl"></div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<br>
<?php
include_once 'public/footerMenuP.php';
?>
