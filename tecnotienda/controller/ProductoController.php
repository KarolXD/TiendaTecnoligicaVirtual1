<?php

class ProductoController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarCaracteristica() {
        $this->view->show("registrarCaracteristica.php", null);
    }

    public function temporal() {


        $this->view->show("temporal.php", null);
    }

    public function guardarCaracteristica() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $productocaracteristicavalor = "";
        $productocaracteristicacriterio = "";

        if (isset($_POST["name"]) and isset($_POST["name1"])) {

            $skill = "1 " . implode("&", $_POST["skill"]) . ",";
            $skill1 = "2 " . implode("&", $_POST["skill1"]) . ",";
            $val1 = "1 " . $_POST["name"] . ",";
            $val2 = "2 " . $_POST["name1"] . ",";

            $productocaracteristicacriterio .= $val1 . $val2;
            $productocaracteristicavalor .= $skill . $skill1;
        }
        //   $PD->registrarproductocaracteristicas(1, $productocaracteristicacriterio, $productocaracteristicavalor, "temporaaall");

        $this->view->show("registrarCaracteristica.php", null);
    }

    public function registrarProductoVista() {
        $this->view->show("registrarproductovista.php", null);
    }

    public function registrarComboVista() {
        $this->view->show("RegistrarCombo.php", null);
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

    public function filtrarBySubCategoria() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->filtrarBySubCategoria($_POST['subcategorianombre']);
        $this->view->show("menuProductoVista.php", $data);
    }

    public function mostrarDetallesProducto() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->mostrardetallesProducto($_GET['productoid']);
        $this->view->show("mostrarDetallesProducto.php", $data);
    }

    public function mostrarDetallesProductoCliente() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->mostrardetallesProducto($_GET['productoid']);
        $this->view->show("mostrarDetallesProductoCliente.php", $data);
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
        $respuesta = "";
        if ($_POST["subcategoriaid"] == -1) {
            $respuesta = $PD->modificarProducto2($_POST["productocodigobarras"], $_POST["productogarantiasaplicadas"], $_POST["productosdevueltos"], $_POST["productoestado"], $_POST["cantidad"], $_POST["productoid"]);
        } else {
            $respuesta == $PD->modificarProducto($_POST["productocodigobarras"], $_POST["productogarantiasaplicadas"], $_POST["productosdevueltos"], $_POST["subcategoriaid"], $_POST["productoestado"], $_POST["cantidad"], $_POST["productoid"]);
        }

        if ($respuesta == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong>  Modificado correctamente </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong>  No se ha modificado! </div> ");  });</script>';
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

        $resultado = $PD->modificarProductoCaracteristica($valorcriterio, $valoratributo, $_POST["productocaracteristicatitulo"], $_POST["productoid"]);
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
        $productocantidad = $_POST['cantidad'];

        //precio
        $productopreciocompra = $_POST['preciocompra'];
        $productopreciofechacompra = $_POST['preciofechacompra'];
        $productopreciofechaventa = $_POST['preciofechaventa'];
        $productoprecioganacia = $_POST['precioganacia'];
        $productoprecioventa = $productopreciocompra + ($productopreciocompra / $productoprecioganacia);





        ////////////////////fin


        $valornombre = "";
        $productoimagenesnombre = $_POST['imagenesnombre'];
        $array_num3 = count($productoimagenesnombre);
        $array_num1 = count($_FILES['imagenesruta']['name']);

        $rutaFinal = "";
        $flag = false;
        $estadoImagen = "";
        $date = new DateTime();
        $indicaro = $date->getTimestamp();

        $nombreImagen = $_FILES['imagenesruta']['name'];
        $tipoImagen = $_FILES['imagenesruta']['type'];
        $tamaño = $_FILES['imagenesruta']['size'];
        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
        $tmp_name_array = $_FILES['imagenesruta']['tmp_name'];
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
        $valorInicial = 0;
        for ($i = 0; $i < $array_num1; $i++) {
            if (move_uploaded_file($_FILES['imagenesruta']['tmp_name'][$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                //     if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i] . ",";
                $estadoImagen = $valorInicial . ",";
                $flag = true;
                echo 'Success';
            } else {
                echo 'Ocurrió un error al subir la imagen, intente otra vez';
            }
        }
        $resultado1 = $PD->registrarProducto($productosubcategoriaid, $productocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado, $productoactivo, $productocantidad);

        if ($resultado1 == 1 && $flag == true) {

            $resultado2 = $PD->registrarproductoprecio($productocodigobarras, $productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia);
            //     $resultado3 = $PD->registrarproductocaracteristicas1($productocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaractericticatitulo);
            //$name=$_POST["name"]; $name1=$_POST["name1"];$name2=$_POST["name2"]; $name3=$_POST["name3"];   $name4=$_POST["name4"];   $name5=$_POST["name5"];  $name6=$_POST["name6"]; $name7=$_POST["name7"]; $name8=$_POST["name8"]; $name9=$_POST["name9"];  $name10=$_POST["name10"]; $name11=$_POST["name11"]; $name12=$_POST["name12"];       $name14=$_POST["name14"];

            for ($j = 0; $j < $array_num3; $j++) {
                $valornombre .= $productoimagenesnombre[$j] . ",";
            }


//    

            $resultado4 = $PD->registrarproductoimagen($productocodigobarras, $valornombre, $rutaFinal, $estadoImagen);

            if ($resultado2 == 1 && $resultado4 == 1) {
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

    public function listarCombo() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->listarCombos();
        $this->view->show("VistaCombos.php", $data);
    }

    public function modificarCombo() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->listarCombos();
        $this->view->show("actualizarCombo.php", $data);
    }

    public function registrarCombo() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        //producto
        $codigobarra = $_POST['productocodigobarras'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['preciocompra'];
        $caractericticatitulo = $_POST['caractericticatitulo'];


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
        $valorInicial = 0;
        for ($i = 0; $i < $array_num1; $i++) {
            if (move_uploaded_file($_FILES['imagenesruta']['tmp_name'][$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                //     if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i];
                $flag = true;
                echo 'Success';
            } else {
                echo 'Ocurrió un error al subir la imagen, intente otra vez';
            }
        }

        $resultado = $PD->registrarCombo2($codigobarra, $cantidad, $precio, $caractericticatitulo, $rutaFinal);
        echo $resultado;
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Devolución  Registrada </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Devolución  NO registrada </div> ");  });</script>';
        }

        $this->view->show("registrarCombo.php", null);
    }

    public function actualizarCombo() {
        require 'model/data/productoData.php';
        $PD = new productoData();

        $id = $_POST["id"];
        $codigoBarra = $_POST["codigoBarra"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];
        $titulo = $_POST["titulo"];

        $array_num1 = count($_FILES['imagenesruta2']['name']);

        $rutaFinal = "";
        $flag = false;
        $date = new DateTime();
        $indicaro = $date->getTimestamp();

        $nombreImagen = $_FILES['imagenesruta2']['name'];
        $tipoImagen = $_FILES['imagenesruta2']['type'];
        $tamaño = $_FILES['imagenesruta2']['size'];
        $pathParcial = "/tecnotienda/tecnotienda/public/img/";
        $tmp_name_array = $_FILES['imagenesruta2']['tmp_name'];
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . $pathParcial;
        $valorInicial = 0;
        for ($i = 0; $i < $array_num1; $i++) {
            if (move_uploaded_file($_FILES['imagenesruta2']['tmp_name'][$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                //     if (move_uploaded_file($tmp_name_array[$i], $carpetaDestino . $indicaro . $nombreImagen[$i])) {
                $rutaFinal .= $pathParcial . $indicaro . $nombreImagen[$i];
                $flag = true;
                echo 'Success';
            } else {
                echo 'Ocurrió un error al subir la imagen, intente otra vez';
            }
        }

        echo $resultado = $PD->modificarComobo($id, $codigoBarra, $cantidad, $precio, $titulo, $rutaFinal);

        $data['listado'] = $PD->listarCombos();
        $this->view->show("VistaCombos.php", $data);
    }

    public function obtenerProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->obtenerProductos());
    }

    public function registrarCaracteristicasIm() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $productoproductocodigobarras = $_POST["codigoB"];
        $productocaracteristicatitulo = $_POST["titulo"];
        $datos = count($_POST["criterios"]);
        $datos2 = count($_POST["valores"]);
        $productocaracteristicacriterio = "";
        $productocaracteristicavalor = "";
        for ($i = 0; $i < $datos; $i++) {
            $productocaracteristicavalor .= implode($datos, $_POST["criterios"][$datos] . "&") . ",";
        }
        for ($i = 0; $i < $datos2; $i++) {
            $productocaracteristicacriterio .= implode($datos2, $_POST["valores"][$datos2]) . ",";
        }
        $PD->registrarproductocaracteristicas1($productoproductocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo);
        $this->view->show("registrarproductovista.php", null);
//       
    }

    public function obtenerSubCategoriaProductos() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo json_encode($PD->obtenerSubCategoriaProductos());
    }

    public function obtenerCriterios() {

        require 'model/data/productoData.php';
        $PD = new productoData();
        session_start();
        $subcategoriaid = $_SESSION['subcategoriaid'];
        $criterio = $PD->obtenerCriterios($subcategoriaid);
        echo json_encode($criterio);
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
    }

    public function eliminarCombo() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $resultado = $PD->eliminarCombo($_GET['correoid']);
        $re = $_GET['correoid'];
        $data['listado'] = $PD->listarCombos();
        $this->view->show("VistaCombos.php", $data);
    }

    public function registrarCaracteristicas1() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        echo $productocodigobarras = $_POST["productocodigobarras2"];
        echo $productocaractericticatitulo = $_POST['titulo'];
        $productocaracteristicacriterio = "";
        $productocaracteristicavalor = "";
        //echo $cantidadInpus = $_POST["valorselect"];


        if (isset($_POST["name"]) and isset($_POST["name1"]) and isset($_POST["name2"])) {

            $skill = "1 " . implode("&", $_POST["skill"]) . ",";
            $skill1 = "2 " . implode("&", $_POST["skill1"]) . ",";
            $skill2 = "3 " . implode("&", $_POST["skill2"]) . ",";

            $val1 = "1 " . $_POST["name"] . ",";
            $val2 = "2 " . $_POST["name1"] . ",";
            $val3 = "3 " . $_POST["name2"] . ",";
            $temporal11 = " " . implode(",", $_POST["skill"]) . ",";
            $temporal22 = " " . implode(",", $_POST["skill1"]) . ",";
            $temporal33 = " " . implode(",", $_POST["skill2"]) . ",";

            $temporal1 = $temporal11;
            $temporal2 = $temporal22;
            $temporal3 = $temporal33;

            $productocaracteristicacriterio .= $val1 . $val2 . $val3;
            $productocaracteristicavalor .= $skill . $skill1 . $skill2;
        }

        $resultado3 = $PD->registrarproductocaracteristicas1($productocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaractericticatitulo);

        $resultado0 = $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name"], $temporal1, $productocaractericticatitulo, "1");
        $resultado1 = $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name1"], $temporal2, $productocaractericticatitulo, "2");
        $resultado2 = $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name2"], $temporal3, $productocaractericticatitulo, "3");

        $this->view->show("registrarproductovista.php", null);
    }

    public function registrarCaracteristicas2() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        $productocodigobarras = $_POST["productocodigobarras3"];
        $productocaractericticatitulo = $_POST['titulo1'];
        $productocaracteristicacriterio = "";
        $productocaracteristicavalor = "";


        if (isset($_POST["name3"]) and isset($_POST["name4"]) and isset($_POST["name5"]) and isset($_POST["name6"]) and isset($_POST["name7"])) {

            $skil3 = "1 " . implode("&", $_POST["skill3"]) . ",";
            $skill4 = "2 " . implode("&", $_POST["skill4"]) . ",";
            $skill5 = "4 " . implode("&", $_POST["skill5"]) . ",";
            $skill6 = "5 " . implode("&", $_POST["skill6"]) . ",";
            $skill7 = "6 " . implode("&", $_POST["skill7"]) . ",";

            $val4 = "1 " . $_POST["name3"] . ",";
            $val5 = "2 " . $_POST["name4"] . ",";
            $val6 = "3 " . $_POST["name5"] . ",";
            $val7 = "4" . $_POST["name6"] . ",";
            $val8 = "5 " . $_POST["name7"] . ",";


            $productocaracteristicacriterio .= $val4 . $val5 . $val6 . $val7 . $val8;
            $productocaracteristicavalor .= $skil3 . $skill4 . $skill5 . $skill6 . $skill7;
        }
        $resultado3 = $PD->registrarproductocaracteristicas1($productocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaractericticatitulo);

        if (isset($_POST["name3"]) and isset($_POST["name4"])and isset($_POST["name5"]) and isset($_POST["name6"]) and isset($_POST["name7"])) {

            $temporal44 = "" . implode(",", $_POST["skill3"]) . ",";
            $temporal55 = " " . implode(",", $_POST["skill4"]) . ",";
            $temporal66 = " " . implode("," . $_POST["skill5"]) . ",";
            $temporal77 = " " . implode("," . $_POST["skill6"]) . ",";
            $temporal88 = " " . implode("," . $_POST["skill7"]) . ",";

            $temporal4 = $temporal44;
            $temporal5 = $temporal55;
            $temporal6 = $temporal66;
            $temporal7 = $temporal77;
            $temporal8 = $temporal88;
        }
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name3"], $temporal4, $productocaractericticatitulo, ".");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name4"], $temporal5, $productocaractericticatitulo, ".");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name5"], $temporal6, $productocaractericticatitulo, ".");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name6"], $temporal7, $productocaractericticatitulo, ".");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name7"], $temporal8, $productocaractericticatitulo, ".");

        $this->view->show("registrarproductovista.php", null);
    }

    public function registrarCaracteristicas3() {
        require 'model/data/productoData.php';
        $PD = new productoData();
        //caracteristicas la q hay q hacer
        $productocaractericticatitulo = $_POST['titulo2'];
        $productocodigobarras = $_POST["productocodigobarras4"];
        $productocaracteristicacriterio = "";
        $productocaracteristicavalor = "";


        if (isset($_POST["name8"]) and isset($_POST["name9"]) and isset($_POST["name10"]) and isset($_POST["name11"])
                and isset($_POST["name12"]) and isset($_POST["name13"]) and isset($_POST["name14"])) {

            $skil3 = "1 " . implode("&", $_POST["skill8"]) . ",";
            $skill4 = "2 " . implode("&", $_POST["skill9"]) . ",";
            $skill5 = "4 " . implode("&", $_POST["skill10"]) . ",";
            $skill6 = "5 " . implode("&", $_POST["skill11"]) . ",";
            $skill7 = "6 " . implode("&", $_POST["skill12"]) . ",";
            $skill8 = "7 " . implode("&", $_POST["skill13"]) . ",";
            $skill9 = "8 " . implode("&", $_POST["skill14"]) . ",";

            $val4 = "1 " . $_POST["name8"] . ",";
            $val5 = "2 " . $_POST["name9"] . ",";
            $val6 = "3 " . $_POST["name10"] . ",";
            $val7 = "4" . $_POST["name11"] . ",";
            $val8 = "5 " . $_POST["name12"] . ",";
            $val9 = "6" . $_POST["name13"] . ",";
            $val10 = "7 " . $_POST["name14"] . ",";

            $productocaracteristicacriterio .= $val4 . $val5 . $val6 . $val7 . $val8 . $val9 . $val10;
            $productocaracteristicavalor .= $skil3 . $skill4 . $skill5 . $skill6 . $skill7 . $skill8 . $skill9;
        }
        $resultado3 = $PD->registrarproductocaracteristicas1($productocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaractericticatitulo);




        if (isset($_POST["name8"]) and isset($_POST["name9"])and isset($_POST["name10"]) and isset($_POST["name11"]) and
                isset($_POST["name12"]) and isset($_POST["name13"]) and isset($_POST["name14"])) {

            $temporal99 = " " . implode(",", $_POST["skill8"]) . ",";
            $temporal100 = " " . implode(",", $_POST["skill9"]) . ",";
            $temporal111 = " " . implode("," . $_POST["skill10"]) . ",";
            $temporal122 = " " . implode("," . $_POST["skill11"]) . ",";
            $temporal133 = implode("," . $_POST["skill12"]) . ",";
            $temporal144 = " " . implode("," . $_POST["skill13"]) . ",";
            $temporal155 = " " . implode("," . $_POST["skill14"]) . ",";

            $temporal9 = $temporal99;
            $temporal10 = $temporal100;
            $temporal11 = $temporal111;
            $temporal12 = $temporal122;
            $temporal13 = $temporal133;
            $temporal14 = $temporal144;
            $temporal15 = $temporal155;
        }
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name8"], $temporal9, $productocaractericticatitulo, "");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name9"], $temporal10, $productocaractericticatitulo, "");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name10"], $temporal11, $productocaractericticatitulo, "1");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name11"], $temporal12, $productocaractericticatitulo, "2");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name12"], $temporal13, $productocaractericticatitulo, "3");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name13"], $temporal14, $productocaractericticatitulo, "4");
        $PD->registrarproductocaracteristicas($productocodigobarras, $_POST["name14"], $temporal15, $productocaractericticatitulo, "6");
    }

    public function mostrarCombos2() {

        require 'model/data/productoData.php';
        $PD = new productoData();
        $data['listado'] = $PD->listarCombos();
        $this->view->show("VistaCombosCliente.php", $data);
    }

}
