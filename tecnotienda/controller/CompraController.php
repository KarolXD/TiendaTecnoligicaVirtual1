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



        if ($tipopago == 1) {// pago al credito
            $totalcontado = $_POST["totalpago"];
            $resultado = $items->registrarPago($usuario, $valor, 0, $totalcontado);
        } else if ($tipopago == 0) {//pago al contado
            $cuentaporpagar = $_POST["cuentaporcobrar"];
            $resultado = $items->registrarPago($usuario, $valor, $cuentaporpagar, 0);
        }

        if ($resultado == 0) {
            $idproducto = $_POST["idproducto"];
            $cantidadAr = $_POST["cantidadarticulos"];
            $count = count($cantidadAr);
            for ($j = 0; $j < $count; $j++) {
               $resul1= $items->actualizarCantiadadProductos($cantidadAr[$j], $idproducto[$j]);}
              for ($k = 0; $k < $count; $k++) {
              $resul2=  $items->eliminarDelCarrito($idproducto[$k]); }
              
            if($resul1==1 && $resul2==1){echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Compra  realizada </div> ");  });</script>';
            }else{ echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha podido realizar su compra! </div> ");  });</script>';
      }
            } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No se ha podido realizar su compra! </div> ");  });</script>';
        }
        $dato['listado'] = $items->listarPago($usuario);
        $dato['listado2'] = $items->listarPagoDatosCliente($usuario);
        $this->view->show("clientePago.php", $dato);
    }
    
    
    public function adminPago(){
          require 'model/data/compraDato.php';
        $items = new compraDato();
       $dato['listado'] = $items->listarPagoAdmin();
        $this->view->show("adminPago.php", $dato);  
    }

}

?>