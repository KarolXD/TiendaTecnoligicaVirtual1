<?php
include_once 'public/headerMenuP.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h5>  <center>Modificar una Proveedor </center></h5>
            <hr style="color: #47748b">
            <form id="formularioModificarProveedor" method="post" autocomplete="off" class="form" enctype="multipart/form-data">
    <?php
                foreach ($vars['actualizarProveedores'] as $item) {
                    ?>
                <div class="form-group">
                    <label for="username"> Escribe su cédula Juridica</label>
                    <input type="text" class="form-control"  readonly="" id="proveedorid"value="<?php echo $item[0] ?>" name="proveedorid" placeholder="Cédula Jurida/Pasaporte" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el nombre de la empresa</label>
                    <input type="text" class="form-control" id="proveedornombreempresa"  value="<?php echo $item[1] ?>" name="proveedornombreempresa" placeholder="Nombre Empresa" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Fax</label>
                    <input type="text" class="form-control" id="proveedorfax"  value="<?php echo $item[2] ?>"name="proveedorfax" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el apartado Postal</label>
                    <input type="text" class="form-control" id="proveedorapartadopostal" value="<?php echo $item[3] ?>" name="proveedorapartadopostal" placeholder="Apartado Postal" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe un correo Electrónico</label>
                    <input type="text" class="form-control" id="proveedorcorreo"  value="<?php echo $item[4] ?>" name="proveedorcorreo" placeholder="Correo Electrónico" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Sitio Web</label>
                    <input type="text" class="form-control" id="proveedorsitioweb"  value="<?php echo $item[5] ?>" name="proveedorsitioweb" placeholder="SitioWeb" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Contacto Persona</label>
                    <input type="text" class="form-control" id="proveedorpersonadecontacto" value="<?php echo $item[6] ?>" name="proveedorpersonadecontacto" placeholder="Categoria" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe el Teléfono</label>
                    <input type="text" class="form-control" id="proveedornumerotelefono"  value="<?php echo $item[7] ?>" name="proveedornumerotelefono" placeholder="Telefono" required="">
                </div>
                <div class="form-group">
                    <label for="username"> Escribe la dirección Física</label>
                    <input type="text" class="form-control" id="proveedordireccionfisicaempresa" value="<?php echo $item[8] ?>"  name="proveedordireccionfisicaempresa" placeholder="Direccón Física" required="">
                </div>


                <div class="form-group">
                    <center>
                        <input name="submit" type="submit" value=" Modificar " class="btn btn-warning">
                        <a href="?controlador=Proveedor&accion=menuProveedor" class="btn btn-info" >Regresar</a>
                    </center>
                </div>
                <div  name="alertControl" id="alertControl"></div>
                       <?php
                }
                ?>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<br>
<?php
include_once 'public/footerMenuP.php';
?>
