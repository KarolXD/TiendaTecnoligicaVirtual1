<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarProductoVista() {
        $this->view->show("registrarproductovista.php", null);
    }
      public function registrarDevolucion() {
        $this->view->show("registrarDevolucion.php", null);
    }
    
 public function registrarGarantia() {
        $this->view->show("registrarGarantia.php", null);
    }

    public function guardarGarantia() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $resultado = $PD->guardarGarantia($_POST['productoid'], $_POST['productocantidadgarantias']);

        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Garantia  Registrada </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Garantia  No registrada </div> ");  });</script>';
        }

        $this->view->show("registrarGarantia.php", null);
    }

    public function guardarDevolucion() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $resultado = $PD->guardarDevolucion($_POST['productoid'], $_POST['productocantidaddevuelto']);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Devolución  Registrada </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Devolución  NO registrada </div> ");  });</script>';
        }
        $this->view->show("registrarDevolucion.php", null);
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

    
    
 
    public function mostrarDetallesProductoCliente() {
        require 'model/data/productoData.php';
        $PD = new productoData();
       $data['listado'] = $PD->mostrardetallesProducto($_GET['productoid']);
        $this->view->show("mostrarDetallesProductoCliente.php",$data);
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
       $array_num2 = count($_FILES['imagenesruta']['name']);
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
            for ($j = 0; $j < $array_num2; $j++) {
                $valornombre .= $imagenesnombre[$j] . ",";
            }
            for ($i = 0; $i < $array_num; $i++) {
                if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                    $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i] . ",";
                    // 
                    $flag = true;
                    echo 'Success';
                } else {
                    $resultado = $PD->modificarproductoimagen2($valornombre, $_POST["productoid"]);
                }
            }
            if ($flag) {
                $resultado = $PD->modificarproductoimagen($valornombre, $rutaFinal, $_POST["productoid"]);
            } else {
                
            }
        }
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>  Caracteristicas de la imagen han sido modificadas </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>  Caracteristicas de la imagen NO han sido modificadas </div> ");  });</script>';
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
        $array_num2 = count($valor);
        if ((!empty($_POST["productocriterio"]) && is_array($_POST["productocriterio"]))) {
            for ($i = 0; $i < $array_num; $i++) {
                $valorcriterio .= $criterio[$i] . ",";
          //      $valoratributo .= $valor[$i] . ",";
            }
        }

           if ((!empty($_POST["productovalor"]) && is_array($_POST["productovalor"]))) {
            for ($j = 0; $j < $array_num2; $j++) {
             //   $valorcriterio .= $criterio[$i] . ",";
                $valoratributo .= $valor[$j] . ",";
            }
        }
        
       $resultado= $PD->modificarProductoCaracteristica($valorcriterio, $valoratributo, $_POST["productocaracteristicatitulo"], $_POST["productoid"]);
         if ($resultado == 1) {
                   echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>  Caracteristicas del producto han sido modificadas </div> ");  });</script>';
     
        } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Caracteristicas  No modificadas :( </div> ");  });</script>';
        
        }
       $data['listado'] = $PD->filtrarProductoCaracteristicaById($_POST["productoid"]);
        $this->view->show("actualizarProductoCaracteristica.php", $data);
    }

    public function modificarProductoPrecio() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $productoprecioventa = $_POST["preciocompra"] + ($_POST["preciocompra"] / $_POST["precioganacia"]);
        $resultado = $PD->modificarproductoprecio($_POST["preciocompra"], $_POST["preciofechacompra"], $productoprecioventa, $_POST["preciofechaventa"], $_POST["precioganacia"], $_POST["productoid"]);
        if ($resultado == 1) {
                   echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Precio Modificado </div> ");  });</script>';
     
        } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Precio  No modificado :( </div> ");  });</script>';
        
        }
        $data['listado'] = $PD->filtrarProductoPrecioById($_POST["productoid"]);
        $this->view->show("actualizarProductoPrecio.php", $data);
    }

    public function registrarProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        //producto
        $productocodigobarras = $_POST['productocodigobarras'];
        $productocantidadgarantizada = 0;
        $productocantidaddevuelto = 0;
        $productosubcategoriaid = $_POST['subcategoriaid'];
        $productoestado = $_POST['productoestado'];
        $productoactivo = 0;

        //precio
        $productopreciocompra = $_POST['preciocompra'];
        $productopreciofechacompra = $_POST['preciofechacompra'];
        $productopreciofechaventa = $_POST['preciofechaventa'];
        $productoprecioganacia = $_POST['precioganacia'];
         $productoprecioventa = $productopreciocompra+($productopreciocompra/$productoprecioganacia);


        //caracteristicas
        $productocaractericticatitulo = $_POST['caractericticatitulo'];
        $productocaracteristicacriterio = $_POST['caracteristicacriterio']; //vector
        $productocaracteristicavalor = $_POST['caracteristicavalor']; //vector
        $valorcriterio = "";
        $valoratributo = "";
          $estadoCriterio="";
          $valorInicialc=0;
        $array_num = count($productocaracteristicavalor);
        $array_num2 = count($productocaracteristicacriterio);
        if ((!empty($_POST["caracteristicacriterio"]) && is_array($_POST["caracteristicacriterio"]))) {
            for ($k = 0; $k < $array_num2; $k++) {
                $valorcriterio .= $productocaracteristicacriterio[$k] . ",";
               $estadoCriterio .= $valorInicialc . ",";
            }
        }
        
           if ((!empty($_POST["caracteristicavalor"]) && is_array($_POST["caracteristicavalor"]))) {
            for ($ka = 0; $ka < $array_num; $ka++) {
               // $valorcriterio .= $productocaracteristicacriterio[$k] . ",";
                $valoratributo .= $productocaracteristicavalor[$ka] . ",";
            }
        }
        

       $valornombre = "";
      $productoimagenesnombre = $_POST['imagenesnombre'];
        $array_num3= count($productoimagenesnombre);
        $array_num1 = count($_FILES['imagenesruta']['name']);
    
        $rutaFinal = "";
        $flag = false;
        $estadoImagen="";
        $date = new DateTime();
        $indicaro = $date->getTimestamp();

        $nombreImagen = $_FILES['imagenesruta']['name'];
        $tipoImagen = $_FILES['imagenesruta']['type'];
        $tamaño = $_FILES['imagenesruta']['size'];
        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
        $tmp_name_array = $_FILES['imagenesruta']['tmp_name'];
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
        $valorInicial=0;
        for ($i = 0; $i < $array_num1; $i++) {
             if (move_uploaded_file($_FILES['imagenesruta']['tmp_name'][$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
       //     if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
               $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i] . ",";
               $estadoImagen=$valorInicial.",";
                $flag = true;
                echo 'Success';
            } else {
                echo 'Ocurrió un error al subir la imagen, intente otra vez';
            }
        }
        $resultado1 = $PD->registrarProducto($productosubcategoriaid, $productocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado, $productoactivo);

        if ($resultado1 == 1 && $flag == true) {

            $resultado2 = $PD->registrarproductoprecio($productocodigobarras, $productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia);
            $resultado3 = $PD->registrarproductocaracteristicas($productocodigobarras, $valorcriterio, $valoratributo, $productocaractericticatitulo, $estadoCriterio);
            for ($j = 0; $j < $array_num3; $j++) {
                $valornombre .= $productoimagenesnombre[$j] . ",";
            }
            $resultado4 = $PD->registrarproductoimagen($productocodigobarras, $valornombre, $rutaFinal, $estadoImagen);

            if ($resultado2 == 1 && $resultado3 == 1 && $resultado4 == 1) {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Producto registrado  </div> ");  });</script>';
            } else {
                echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>Opps Producto NO registado :( </div> ");  });</script>';
            }
        } else if ($resultado1 == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Código de Barras existente :( </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Producto  No registrado :( </div> ");  });</script>';
        }

        $this->view->show("registrarproductovista.php", null);
    }

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
        $resultado = $PD->eliminarProducto($_POST['productoid']);

        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Producto  Eliminado </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Producto  No eliminado </div> ");  });</script>';
        }
        $this->view->show("menuProductoVista.php", null);
//        
    }

}
