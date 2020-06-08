

<?php

class ProveedorController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }

    public function menuProveedor() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $dato['listado'] = $items->listarDatosProveedor();
        $this->view->show("menuProveedor.php", $dato);
    }

    public function registrarProveedorVista() {
        $this->view->show("registrarProveedor.php");
    }

    public function listarProveedor() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $dato['listado'] = $items->listarDatosProveedor();
        $this->view->show("menuProveedor.php", $dato);
    }

    public function listarProveedorDetalle() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->listarDatosProveedorDetalle($clienteid);
        $this->view->show("detalleProveedor.php", $dato);
    }

    public function eliminarCliente() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        $usuario = $_POST['clienteid'];
        $PD->quitarCliente($usuario);
        $dato['listado'] = $PD->listarDatosProveedor();
        $this->view->show("menuProveedor.php", $dato);
    }

    public function registrarProveedor() {

        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $usuario = $_POST["usuario"];
        $empresa = $_POST["empresa"];
        $descrip = $_POST["descripcion"];
        $valor = "";
        $valor2 = "";
        $temp = "";
        $temp2 = "";
        $correos = $_POST["name"];
        $telefono = $_POST["names"];
        $array_cor = count($correos);
        $array_num = count($telefono);
        $estado = $_POST["estado"];
        $contra = $_POST["contra"];

        for ($i = 0; $i < $array_cor; $i++) {
            $valor .= $correos[$i] . ",";
            $temp .= "0" . ",";
        }
        for ($y = 0; $y < $array_num; $y++) {
            $valor2 .= $telefono[$y] . ",";
            $temp2 .= "0" . ",";
        }


        $resultado = $items->registrarProveedor($usuario, $contra, $empresa, $descrip, $estado);

        if ($resultado == 1) {

            $resultado1 = $items->registrarCorreo($usuario, $valor, $temp);
            $resultado2 = $items->registrarTelefono($usuario, $valor2, $temp2);
            if ($resultado1 == 1 && $resultado2 == 1) {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Registrado Correctamente </div> ");  });</script>';
            } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Proveedor no registrado </div> ");  });</script>';
            }
        } else if ($resultado == 0) {//existe
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Proveedor existente </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Proveedor no registrado </div> ");  });</script>';
        }


        $this->view->show("registrarProveedor.php");
    }

    public function actualizarDatosCorreo() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);

        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $resulatdo = $items->actualizarCorreo($correoid, $valor);
        if ($resulatdo == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>No se ha modificado </div> ");  });</script>';
        }

        $dato['listado'] = $items->filtarClienteById($_POST["id"]);
        $this->view->show("actualizarCorreoP.php", $dato);
    }

    public function actualizarDatosDetalle() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $correoid = $_POST["clienteid"];
        $valor = $_POST["descripcion"];

        $resulatdo = $items->actualizarDetalle($correoid, $valor);
        if ($resulatdo == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>No se ha modificado </div> ");  });</script>';
        }

        $dato['listado'] = $items->filtarClienteById3($_POST["id"]);
        $this->view->show("actualizarDescripcionProveedor.php", $dato);
    }

    public function actualizarDatosTelefono() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $resulatdo = $items->actualizarTelefono($correoid, $valor);

        if ($resulatdo == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Modificado exitosamente </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>No se ha modificado </div> ");  });</script>';
        }

        $dato['listado'] = $items->filtarClienteById2($_POST["id"]);
        $this->view->show("actualizarTelefonoP.php", $dato);
    }

    public function filtarClienteById() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById($clienteid);
        $this->view->show("actualizarCorreoP.php", $dato);
    }

    public function filtarClienteById2() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById2($clienteid);
        $this->view->show("actualizarTelefonoP.php", $dato);
    }

    public function filtarClienteById3() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById3($clienteid);
        $this->view->show("actualizarDescripcionProveedor.php", $dato);
    }

}
