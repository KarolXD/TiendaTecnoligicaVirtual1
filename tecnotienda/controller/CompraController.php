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
        $detalle = $_POST["detalle"];
        
    }

}

?>