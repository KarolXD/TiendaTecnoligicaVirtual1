<?php

class CompraController {

    public function __construct() {
        $this->view = new View();
    }

    
    
      public function adminCxc() {
        require 'model/data/compraDato.php';
        $PD = new compraDato();
        $dato["listado"] = $PD->obtenerCxc();
        $this->view->show("adminCxc.php", $dato);
    }
    
    public function productomascompradoByclientes(){
          $this->view->show("productomascompradoByclientes.php");    
    }
    
    public function morosomensual(){
        
        require 'model/data/compraDato.php';
        $PD = new compraDato();
        $dato["listado"] = $PD->morosidadmensual();
        $this->view->show("morosomensual.php",$dato); 
    }
    public function morosidadcategoria(){
        require 'model/data/compraDato.php';
        $PD = new compraDato();
        $dato["listado"] = $PD->morosidadByCategogia();
        $this->view->show("morosidadcategoria.php", $dato); 
    }
    
    public function listarCompras() {
        require 'model/data/compraDato.php';
        $PD = new compraDato();
       
         session_start();
        $usuario = $_SESSION["usuario"];
        $dato["listado"] = $PD->listarCompras($usuario);
        $this->view->show("listarCompras.php",$dato);
    }
    
    public function listarMorosos() {
        require 'model/data/compraDato.php';
        $PD = new compraDato();
        $dato["listado"] = $PD->obtenerMorosos();
        $this->view->show("vistalistaMorosos.php", $dato);
    }

    public function agregaralcarrito() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $idproducto = $_POST["producto"];
        $usuario = $_POST["cliente"];
        $cantidad = $_POST["3"];
        $resultad = $items->agregaralcarrito($idproducto, $usuario, $cantidad);
        if ($resultad == 0) {
            
        echo $resul=   $items->productoVendido($idproducto, $usuario, $cantidad);
            echo "<script> alert('Agregado al carrito' ); </script>";
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
        
          $items->borrarproductoVendido($_GET["productoid"]);
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

    public function detalleAbono() {
        session_start();
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $usuario = $_SESSION["usuario"];
        $dato['listado'] = $items->listarDetalleAbono($usuario);
        $this->view->show("detalleAbono.php", $dato);
    }
    
   
    public function compraCliente() {
        require 'model/data/compraDato.php';
        $items = new compraDato();
        $usuario = $_POST["cliente"];
        $idProducto=$_POST["id"];
        $valor1 = "";
        $detalle = $_POST["detalle"];
        $array_num = count($detalle);
        $tipopago = $_POST["tipopago"];

        for ($i = 0; $i < $array_num; $i++) {
            $valor1 .= $detalle[$i] . ",";
        }
        $resultado = "";
        $valor = "";
        $resultado2 = "";




        $totalcontado = $_POST["totalpago"];

        $valor = $items->validarSiPagado($usuario);


        if ($tipopago == 0) {//pago al credito
            if ($valor == 0) {
                $cuentaporpagar = $_POST["cuentaporcobrar"];
                $fechaActual = date("Y-m-d H:i:s"); //Y-m-d H:i:s
                //    $fechaActual = date("Y/m/d");//Y-m-d H:i:s

                $obtenerMeses = $_POST["plazo"];
                $sumarmeses = "+" . $obtenerMeses . "month";
                $fechalimite = date("Y-m-d", strtotime($fechaActual . $sumarmeses));

                $items->registrarventaporcobrar($usuario, $cuentaporpagar, ($totalcontado - $cuentaporpagar), $totalcontado, $fechalimite,$idProducto);

                $resultado = $items->registrarPago($usuario, $valor1, 1, 0,$idProducto);
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
            } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Existe un abono pendiente. Debe cancelarlo antes!! </div> ");  });</script>';
            }
        }else{
        $resultado2 = $items->registrarPago($usuario, $valor1, 0, $totalcontado,$idProducto );
        if ($resultado2 == 0) {
            $idproducto = $_POST["idproducto"];
            $cantidadAr = $_POST["cantidadarticulos"];
            $count2 = count($cantidadAr);
            for ($j = 0; $j < $count2; $j++) {
                echo $resul1 = $items->actualizarCantiadadProductos($cantidadAr[$j], $idproducto[$j]);
            }
            for ($k = 0; $k < $count2; $k++) {
                echo $resul2 = $items->eliminarDelCarrito($idproducto[$k]);
            }

            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Compra  realizada </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Compra NO  realizada </div> ");  });</script>';
        }
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
        $resultad["listado"] = $items->listarVentaCobrar($_SESSION["usuario"]);
        $this->view->show("vistaPagoAbonosCliente.php", $resultad);
    }

    public function modificarventaporcobrar() {
        require 'model/data/compraDato.php';
        $items = new compraDato();



        $totalPago = $_POST["deudapendiente"];
        $cuentaPagar = $_POST["cuentaporpagar"];

        $cantidadDebe = $totalPago - $cuentaPagar;


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