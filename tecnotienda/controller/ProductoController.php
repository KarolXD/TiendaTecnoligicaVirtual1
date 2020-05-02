<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarProductoVista() {
        $this->view->show("registrarproductovista.php", null);
    }

    public function filtrarBySubCategoria(){
      require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->filtrarBySubCategoria($_POST['subcategorianombre']);
        $this->view->show("menuProductoVista.php", $data);       
    }
    
    public function mostrarDetallesProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
       $data['listado'] = $PD->mostrardetallesProducto($_GET['productoid']);
        $this->view->show("mostrarDetallesProducto.php",$data);
    }

    public function detallesProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->detallesProducto($_GET['productoid']);
        $this->view->show("detallesProducto.php", $data);
    }

    public function menuProductoVista() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->listarProductos();
        $this->view->show("menuProductoVista.php", $data);
    }

    public function filtrarProductoById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'productoid');
        $data['actualizarProductos'] = $PD->filtrarProductoById($id);
        $this->view->show("actualizarProductoVista.php", $data);
    }

    public function filtrarProductoPrecioById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'productoid');
        $data['listado'] = $PD->filtrarProductoPrecioById($id);
        $this->view->show("actualizarProductoPrecio.php", $data);
    }

    public function filtrarProductoCaracteristicaById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'productoid');
        $data['listado'] = $PD->filtrarProductoCaracteristicaById($id);
        $this->view->show("actualizarProductoCaracteristica.php", $data);
    }

    public function filtrarProductoImagenById() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_GET, 'productoid');
        $data['listado'] = $PD->filtrarProductoImagenById($id);
        $this->view->show("actualizarProductoImagen.php", $data);
    }

    public function modificarproductoimagen() {
        require 'model/data/productoData.php';
        $PD = new productoData();

        $imagenesnombre = $_POST["imagenesnombre"];
        $valornombre = "";
        $array_num = count($imagenesnombre);


        if ($_FILES != null) {

            $rutaFinal = "";
            $flag = false;
            $date = new DateTime();
            $indicaro = $date->getTimestamp();
            $nombreImagen = $_FILES['imagenesruta']['name'];
            $tipoImagen = $_FILES['imagenesruta']['type'];
            $tamaño = $_FILES['imagenesruta']['size'];
            $pathParcial = "/tecnotienda/tecnotienda/public/img/";
            $tmp_name_array = $_FILES['imagenesruta']['tmp_name'];
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;

            for ($i = 0; $i < $array_num; $i++) {
                if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                    $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i] . ",";
                    $valornombre .= $imagenesnombre[$i] . ",";
                    $flag = true;
                    echo 'Success';
                } else {
                    // echo 'Ocurrió un error al subir la imagen, intente otra vez';
                    for ($i = 0; $i < $array_num; $i++) {
                        $valornombre .= $imagenesnombre[$i] . ",";
                    }
                    $PD->modificarproductoimagen2($valornombre, $_POST["productoid"]);
                }
            }
            if ($flag) {
                $PD->modificarproductoimagen($valornombre, $rutaFinal, $_POST["productoid"]);
            } else {
                
            }
        }


        $data['listado'] = $PD->filtrarProductoImagenById($_POST["productoid"]);
        $this->view->show("actualizarProductoImagen.php", $data);
    }

    public function modificarProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $id = filter_input(INPUT_POST, 'productoid');
        if ($_POST["subcategoriaid"] == -1) {
            $PD->modificarProducto2($_POST["productocodigobarras"], $_POST["productogarantiasaplicadas"], $_POST["productosdevueltos"], $_POST["productoestado"], $_POST["productoid"]);
        } else {
            $PD->modificarProducto($_POST["productocodigobarras"], $_POST["productogarantiasaplicadas"], $_POST["productosdevueltos"], $_POST["subcategoriaid"], $_POST["productoestado"], $_POST["productoid"]);
        }
        $data['actualizarProductos'] = $PD->filtrarProductoById($id);
        $this->view->show("actualizarProductoVista.php", $data);
    }

    public function modificarProductoCaracteristica() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $criterio = $_POST["productocriterio"];
        $valor = $_POST["productovalor"];

        $valorcriterio = "";
        $valoratributo = "";
        $array_num = count($criterio);
        if ((!empty($_POST["productocriterio"]) && is_array($_POST["productovalor"]))) {
            for ($i = 0; $i < $array_num; $i++) {
                $valorcriterio .= $criterio[$i] . ",";
                $valoratributo .= $valor[$i] . ",";
            }
        }

        $PD->modificarProductoCaracteristica($valorcriterio, $valoratributo, $_POST["productocaracteristicatitulo"], $_POST["productoid"]);
        $data['listado'] = $PD->filtrarProductoCaracteristicaById($_POST["productoid"]);
        $this->view->show("actualizarProductoCaracteristica.php", $data);
    }

    public function modificarProductoPrecio() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $PD->modificarproductoprecio($_POST["preciocompra"], $_POST["preciofechacompra"], $_POST["precioventa"], $_POST["preciofechaventa"], $_POST["precioganacia"], $_POST["productoid"]);
        $data['listado'] = $PD->filtrarProductoPrecioById($_POST["productoid"]);
        $this->view->show("actualizarProductoPrecio.php", $data);
    }

    public function registrarProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        //producto
        $productocodigobarras = $_POST['productocodigobarras'];
        $productocantidadgarantizada = $_POST['productocantidadgarantizada'];
        $productocantidaddevuelto = $_POST['productocantidaddevuelto'];
        $productosubcategoriaid = $_POST['subcategoriaid'];
        $productoestado = $_POST['productoestado'];
        $productoactivo = 0;

        //precio
        $productopreciocompra = $_POST['preciocompra'];
        $productopreciofechacompra = $_POST['preciofechacompra'];
        $productoprecioventa = $_POST['precioventa'];
        $productopreciofechaventa = $_POST['preciofechaventa'];
        $productoprecioganacia = $_POST['precioganacia'];


        //caracteristicas
        $productocaractericticatitulo = $_POST['caractericticatitulo'];
        $productocaracteristicacriterio = $_POST['caracteristicacriterio']; //vector
        $productocaracteristicavalor = $_POST['caracteristicavalor']; //vector
        $valorcriterio = "";
        $valoratributo = "";
        $array_num = count($productocaracteristicavalor);
        if ((!empty($_POST["caracteristicacriterio"]) && is_array($_POST["caracteristicavalor"]))) {
            for ($k = 0; $k < $array_num; $k++) {
                $valorcriterio .= $productocaracteristicacriterio[$k] . ",";
                $valoratributo .= $productocaracteristicavalor[$k] . ",";
            }
        }

    $valornombre = "";
      $productoimagenesnombre = $_POST['imagenesnombre'];
        $array_num2 = count($productoimagenesnombre);
        for ($j = 0; $j < $array_num2; $j++) {
            $valornombre .= $productoimagenesnombre[$j] . ",";
        }
        $array_num1 = count($_FILES['imagenesruta']['name']);
    
        $rutaFinal = "";
        $flag = false;
        $date = new DateTime();
        $indicaro = $date->getTimestamp();

        $nombreImagen = $_FILES['imagenesruta']['name'];
        $tipoImagen = $_FILES['imagenesruta']['type'];
        $tamaño = $_FILES['imagenesruta']['size'];
        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
        $tmp_name_array = $_FILES['imagenesruta']['tmp_name'];
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
        
        for ($i = 0; $i < $array_num1; $i++) {
             if (move_uploaded_file($_FILES['imagenesruta']['tmp_name'][$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
       //     if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
               $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i] . ",";
                $flag = true;
                echo 'Success';
            } else {
                echo 'Ocurrió un error al subir la imagen, intente otra vez';
            }
        }
       $resultado1 = $PD->registrarProducto($productocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado, $productoactivo);
     
        if ($resultado1 == 1) {
            $message = 'Puedo  registrar';
             echo "<script type='text/javascript'>alert('$message');</script>";
            $resultado2 = $PD->registrarproductoprecio($productocodigobarras, $productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia);
            $resultado3 = $PD->registrarproductocaracteristicas($productocodigobarras, $valorcriterio, $valoratributo, $productocaractericticatitulo);

            if ($flag == true) {
             $PD->registrarproductoimagen($productocodigobarras, $valornombre, $rutaFinal);
            }
        } else {
            $message = ' NO puede registrar';
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        $this->view->show("registrarproductovista.php", null);
    }

//    public function modificarProducto() {
//
//        $date = new DateTime();
//        $indicaro = $date->getTimestamp();
//        echo '<script>  alert("hola1 ");</script>';
//        $nombreImagen = $_FILES["imagen"]['name'];
//        $tipoImagen = $_FILES["imagen"]['type'];
//        $tamaño = $_FILES['imagen']['size'];
//
//        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
//        if ($tamaño <= 3000000) {
//            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
//                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
//                //echo $carpetaDestino;
//
//                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
//                    require 'model/data/productoData.php';
//
//                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
//                    $PD = new productoData();
//                    $PD->modificarProducto($rutaFinal, $_POST['Nombre'], $_POST['Precio'], $_POST['Cantidad'], $_POST['Descripcion'], $_POST['subcategoriaid'], $_POST['productoid']);
//                    $data['actualizarProductos'] = $PD->filtrarProductoById($_POST['productoid']);
//                    echo 'Success';
//                } else {
//                    echo 'Ocurrió un error al subir la imagen, intente otra vez';
//                }
//            } else {
//                echo 'El formato del archivo debe ser .PNG , .JPG o .JPEG';
//            }
//        } else {
//            echo 'El archivo superó el limite de tamaño(2MB)';
//        }
//    }
//    public function guardarImagenes($productocodigobarras, $productoimagennombre, $productoimagenruta) {
//        $date = new DateTime();
//        $indicaro = $date->getTimestamp();
//
//        $nombreImagen = $_FILES['imagen']['name'];
//        $tipoImagen = $_FILES['imagen']['type'];
//        $tamaño = $_FILES['imagen']['size'];
//        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
//        if ($tamaño <= 3000000) {
//            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
//                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
//                echo $carpetaDestino;
//                if (move_uploaded_file($_FILES[$productoimagenruta]['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
//                    require 'model/data/productoData.php';
//                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
//                    $PD = new productoData();
//                    //    $PD->registrarProducto($productoid, $rutaFinal, $productoimagen);
//                    $PD->registrarproductoimagen($productocodigobarras, $productoimagennombre, $rutaFinal);
//                    echo 'Success';
//                } else {
//                    echo 'Ocurrió un error al subir la imagen, intente otra vez';
//                }
//            } else {
//                echo 'El formato del archivo debe ser .PNG , .JPG o .JPEG';
//            }
//        } else {
//            echo 'El archivo superó el limite de tamaño(2MB)';
//        }
//    }
//    public function guardarProducto($productoid,$productoimagenruta,$productoimagen) {
//        $date = new DateTime();
//        $indicaro = $date->getTimestamp();
//
//        $nombreImagen = $_FILES['imagen']['name'];
//        $tipoImagen = $_FILES['imagen']['type'];
//        $tamaño = $_FILES['imagen']['size'];
//        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
//        if ($tamaño <= 3000000) {
//            if ($tipoImagen == 'image/jpg' || $tipoImagen == 'image/jpeg' || $tipoImagen == 'image/png') {
//                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
//                echo $carpetaDestino;
//                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $indicaro . $nombreImagen)) {
//                    require 'model/data/productoData.php';
//                    $rutaFinal = $pathParcial . $indicaro . $nombreImagen;
//                    $PD = new productoData();
//                    $PD->registrarProducto($productoid,$productoimagenruta,$rutaFinal);
//
//                    echo 'Success';
//                } else {
//                    echo 'Ocurrió un error al subir la imagen, intente otra vez';
//                }
//            } else {
//                echo 'El formato del archivo debe ser .PNG , .JPG o .JPEG';
//            }
//        } else {
//            echo 'El archivo superó el limite de tamaño(2MB)';
//        }
//    }

    public function obtenerProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->obtenerProductos());
    }

    public function obtenerSubCategoriaProductos(){
       require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->obtenerSubCategoriaProductos());        
    }
    
    public function eliminarProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $PD->eliminarProducto($_POST['productoid']);
        $this->view->show("menuProductoVista.php", null);
//        
    }

}
