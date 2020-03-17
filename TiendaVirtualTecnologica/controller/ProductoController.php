<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarProductoView() {
        $this->view->show("productoView.php", null);
    }


    public function menuProductoView() {
//        require 'model/data/productoData.php';
//        $PD = new productoData();
//        $data['xd'] = $PD->listarProductos();
        $this->view->show("menuProductoView.php");
    }

    public function filtrarProductoById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'codigoProducto');
        $data['actualizarProductos'] = $PD->filtrarProductoById($id);
        $this->view->show("actualizarProductoView.php", $data);
    }

    public function modificarProducto() {
   
        $date = new DateTime();
        $indicaro = $date->getTimestamp();
        
        $nombreImagen = $_FILES["s"]['name'];
        $tipoImagen = $_FILES["s"]['type'];
        $tamaño = $_FILES['s']['size'];

        $pathParcial = "/TiendaTecnoligicaVirtual1/TiendaVirtualTecnologica/public/img/";
    if ($tamaño <= 3000000) {
           if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
                //echo $carpetaDestino;
                if (move_uploaded_file($_FILES['s']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
                   require 'model/data/productoData.php';
                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
        $PD = new productoData();
                $PD->modificarProducto($rutaFinal, $_POST['Nombre'], $_POST['Precio'], $_POST['descripcion'], $_POST['Cantidad'], $_POST['Categoria'], $_POST['SubCategoria'], $_POST['codigoProducto']);
        $data['actualizarProductos'] = $PD->filtrarProductoById($_POST['codigoProducto']);
        $this->view->show("actualizarProductoView.php", $data);
//
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

        $pathParcial = "/TiendaTecnoligicaVirtual1/TiendaVirtualTecnologica/public/img/";
        if ($tamaño <= 3000000) {
            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
                echo $carpetaDestino;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
                    require 'model/data/productoData.php';
                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
                    $PD = new productoData();
                    $PD->registrarProducto($_POST['Nombre'], $_POST['Precio'],
                            $_POST['Descripcion'], $rutaFinal,
                            $_POST['Cantidad'], $_POST['Categoria'], $_POST['SubCategoria']);

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
        $PD = new productoData();
        echo json_encode($PD->listarCategorias());
    }

    public function obtenerSubCategorias() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->listarSubCategorias());
    }
       public function obtenerProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->listarProductos());
    }
    
    
    
    
    public function eliminarProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'codigoProducto');
        $PD->eliminarProducto($id);
        echo 'Eliminado';
        $data['xd'] =$PD->listarProductos();        
        $this->view->show("menuProductoView.php", $data);   
        
    }
    
    
    

}
