<?php

class CompraController {

    public function __construct() {
        $this->view = new View();
    }

    public function agregaralcarrito() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $idproducto = $_POST["producto"];
        $usuario = $_POST["cliente"];
        $cantidad = $_POST["3"];
        $resultad = $items->agregaralcarrito($idproducto, $usuario, $cantidad);
        if ($resultad == 0) {
            echo "<script> alert('Agregado al carrito'); </script>";
        } else {
            echo "<script> alert('No agregado al carrito'); </script>";
        }
        $data['listado'] = $items->mostrardetallesProducto($idproducto);
        $this->view->show("mostrarDetallesProductoCliente.php", $data);
    }

    public function listarcarrito() {
        session_start();
        require 'model/data/compraDato.php';
        $items = new compraDato();

        $usuario = $_SESSION["usuario"];
        $dato['listado'] = $items->listarCarritoCompras($usuario);
        $this->view->show("vistaCarritoCliente.php", $dato);
    }

    public function quitardelCarrito() {
        session_start();
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $usuario = $_SESSION["usuario"];
        $items->quitardelCarrito($_GET["productoid"]);
        $dato['listado'] = $items->listarCarritoCompras($usuario);
        $this->view->show("vistaCarritoCliente.php", $dato);
    }

    public function vistaPago() {
        session_start();
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $usuario = $_SESSION["usuario"];
        $dato['listado'] = $items->listarPago($usuario);
        $dato['listado2'] = $items->listarPagoDatosCliente($usuario);
        $this->view->show("clientePago.php", $dato);
    }

    public function compraCliente() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $usuario = $_POST["cliente"];
        $valor = "";
        $detalle = $_POST["detalle"];
        $array_num = count($detalle);
        $tipopago = $_POST["tipopago"];

        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $detalle[$i] . ",";
        }
        $resultado = ""; $valor="";
      echo $valor=  $items->validarSiPagado($usuario);
if($valor>0){
        $totalcontado = $_POST["totalpago"];
        if ($tipopago == 1) {// pago al contado
            $resultado = $items->registrarPago($usuario, $valor, 0, $totalcontado);
        } else if ($tipopago == 0) {//pago al credito
            $cuentaporpagar = $_POST["cuentaporcobrar"];
             $fechaActual = date("Y-m-d H:i:s");//Y-m-d H:i:s
        //    $fechaActual = date("Y/m/d");//Y-m-d H:i:s
             
            $obtenerMeses = $_POST["plazo"];
            $sumarmeses = "+" . $obtenerMeses . "month";
            $fechalimite = date("Y-m-d", strtotime($fechaActual . $sumarmeses));
            
            $items->registrarventaporcobrar($usuario, $cuentaporpagar, ($totalcontado - $cuentaporpagar), $totalcontado, $fechalimite);

            $resultado = $items->registrarPago($usuario, $valor, 1, 0);
        }

        if ($resultado == 0) {
            $idproducto = $_POST["idproducto"];
            $cantidadAr = $_POST["cantidadarticulos"];
            $count = count($cantidadAr);
            for ($j = 0; $j < $count; $j++) {
                $resul1 = $items->actualizarCantiadadProductos($cantidadAr[$j], $idproducto[$j]);
            }
            for ($k = 0; $k < $count; $k++) {
                $resul2 = $items->eliminarDelCarrito($idproducto[$k]);
            }

            if ($resul1 == 1 && $resul2 == 1) {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Compra  realizada </div> ");  });</script>';
            } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha podido realizar su compra! </div> ");  });</script>';
            }
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha podido realizar su compra! </div> ");  });</script>';
        }
    }else{
        echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No ha pagado su abono. Compra NO realizada! </div> ");  });</script>';
       
    }
        
        $dato['listado'] = $items->listarPago($usuario);
        $dato['listado2'] = $items->listarPagoDatosCliente($usuario);
        $this->view->show("clientePago.php", $dato);
    }

    public function adminPago() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $dato['listado'] = $items->listarPagoAdmin();
        $this->view->show("adminPago.php", $dato);
    }

    public function detallecompraadmin() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $dato['listado'] = $items->listarDetallePagoAdmin($_GET["clientecompraid"]);
        $this->view->show("detallecompraadmin.php", $dato);
    }

    public function abono() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        session_start();
        $resultad["listado"]= $items->listarVentaCobrar($_SESSION["usuario"]);
        $this->view->show("vistaPagoAbonosCliente.php",$resultad);
    }

    public function modificarventaporcobrar() {
        require 'model/data/compraDato.php';
        $items = new compraDato();

    

         $totalPago=$_POST["deudapendiente"] ;
         $cuentaPagar= $_POST["cuentaporpagar"];
      
        $cantidadDebe =$totalPago-$cuentaPagar;


        $resul = $items->modificarventaporcobrar($_POST["usuario"], $_POST["cuentaporpagar"], $cantidadDebe, $_POST["id"]);
        if ($resul == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Abono  realizado </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>ADVERTENCIA!</strong> Abono  NO realizado </div> ");  });</script>';
        }

        $resultad["listado"] = $items->listarVentaCobrar($_POST["usuario"]);
        $this->view->show("vistaPagoAbonosCliente.php", $resultad);
    }

}

?>