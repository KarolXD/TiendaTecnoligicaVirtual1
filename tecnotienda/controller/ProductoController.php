<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarProductoVista() {
        $this->view->show("productoVista.php", null);
    }

    public function menuProductoVista() {
        $this->view->show("menuProductoVista.php");
    }

    public function filtrarProductoById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'productoid');
        $data['actualizarProductos'] = $PD->filtrarProductoById($id);
        $this->view->show("actualizarProductoVista.php", $data);
    }

    public function modificarProducto() {

        $date = new DateTime();
        $indicaro = $date->getTimestamp();
        echo '<script>  alert("hola1 ");</script>';
        $nombreImagen = $_FILES["imagen"]['name'];
        $tipoImagen = $_FILES["imagen"]['type'];
        $tamaño = $_FILES['imagen']['size'];

        $pathParcial = "/TiendaTecnoligicaVirtual1/tecnotienda/public/img/";
        if ($tamaño <= 3000000) {
            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
                //echo $carpetaDestino;

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
                    require 'model/data/productoData.php';
                 
                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
                    $PD = new productoData();
                    $PD->modificarProducto($rutaFinal, $_POST['Nombre'], $_POST['Precio'], $_POST['Cantidad'], $_POST['Descripcion'], $_POST['subcategoriaid'], $_POST['productoid']);
                    $data['actualizarProductos'] = $PD->filtrarProductoById($_POST['productoid']);
                    echo 'Success';
                } else {
                    echo 'Ocurrió un error al subir la imagen, intente otra vez';
                }
            } else {
                echo 'El formato del archivo debe ser .PNG , .JPG o .JPEG';
            }
        } else {
            echo 'El archivo superó el limite de tamaño(2MB)';
        }
    }

    public function guardarProducto() {
        $date = new DateTime();
        $indicaro = $date->getTimestamp();

        $nombreImagen = $_FILES['imagen']['name'];

        $tipoImagen = $_FILES['imagen']['type'];
        $tamaño = $_FILES['imagen']['size'];
        $pathParcial = "/TiendaTecnoligicaVirtual1/tecnotienda/public/img/";
        if ($tamaño <= 3000000) {
            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
                echo $carpetaDestino;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
                    require 'model/data/productoData.php';
                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
                    $PD = new productoData();
                    $PD->registrarProducto($_POST['Nombre'], $_POST['Precio'], $_POST['Cantidad']
                            , $rutaFinal, $_POST['Descripcion']
                            , $_POST['subcategoriaid']);

                    echo 'Success';
                } else {
                    echo 'Ocurrió un error al subir la imagen, intente otra vez';
                }
            } else {
                echo 'El formato del archivo debe ser .PNG , .JPG o .JPEG';
            }
        } else {
            echo 'El archivo superó el limite de tamaño(2MB)';
        }
    }

    public function obtenerProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->listarProductos());
    }

    public function eliminarProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $PD->eliminarProducto($_POST['productoid']);
        $this->view->show("menuProductoVista.php", null);
//        
    }

}
