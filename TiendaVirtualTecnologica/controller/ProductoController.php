<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function guardarProducto() {
        $date = new DateTime();
        $indicaro = $date->getTimestamp();
        $nombreImagen = $_FILES['imagen']['name'];
        $tipoImagen = $_FILES['imagen']['type'];
        $tamaño = $_FILES['imagen']['size'];

        $pathParcial = "/TiendaVirtualTecnologica2/TiendaVirtualTecnologica/public/img/";
        if ($tamaño <= 3000000) {
            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].$pathParcial;
                //echo $carpetaDestino;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino.$indicaro.$nombreImagen)) {
                    require 'model/data/productoData.php';
                    $rutaFinal=$pathParcial.$indicaro.$nombreImagen;
                    $PD = new productoData();
                    $PD-> registrarProducto($_POST['Nombre'], $_POST['Precio'],
                            $_POST['Descripcion'],$rutaFinal ,
                            $_POST['Cantidad'],$_POST['Categoria'],$_POST['SubCategoria']);
                    
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
    
    public function obtenerCategorias() {
        require 'model/data/productoData.php';
        $PD= new productoData();
        echo json_encode($PD->listarCategorias());
    }
    

    public function obtenerSubCategorias() {
        require 'model/data/productoData.php';
        $PD= new productoData();
        echo json_encode($PD->listarSubCategorias());
    }
    
    

}
