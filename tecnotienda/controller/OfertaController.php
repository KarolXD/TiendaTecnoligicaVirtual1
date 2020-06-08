<?php

class OfertaController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }

    public function menuOfertas() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();
        $data["listado"] = $PD->obtenerOferta();
        $this->view->show("menuOfertas.php", $data);
    }

    public function obtenerProductos() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();
        echo json_encode($PD->obtenerProducto());
    }

    public function registrarOferta() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();
        $resul = $PD->registrarOferta(0, $_POST["productoid"], $_POST["descuento"], $_POST["fechaIn"], $_POST["fechaFin"]);
        if ($resul == 0) {
            echo "<script> alert('Registrado'); </script>";
        } else {
            echo "<script> alert('NO Registrado'); </script>";
        }
        $data["listado"] = $PD->obtenerOferta();
        $this->view->show("menuOfertas.php", $data);
    }

    public function modificarOferta() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();

        $resul = $PD->modificarOferta($_POST["productoid1"], $_POST["descuento"], $_POST["fechaIn"], $_POST["fechaFin"], $_POST["idOfer"]);
        if ($resul == 0) {
            echo "<script> alert('Modificado'); </script>";
        } else {
            echo "<script> alert('NO Modificado'); </script>";
        }
        $data["listado"] = $PD->obtenerOferta();
        $this->view->show("menuOfertas.php", $data);
    }

    public function eliminarOferta() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();

        $PD->eliminarProducto($_GET["idOferta"]);
        $data["listado"] = $PD->obtenerOferta();
        $this->view->show("menuOfertas.php", $data);
    }

}
