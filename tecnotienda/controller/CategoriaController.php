<?php

class CategoriaController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }

    public function verificarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $resultado = $PD->verificarCategoria($_POST['categoriaid']);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Categoria  Eliminada </div> ");  });</script>';
        } else if ($resultado == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> No es posible eliminar esta categoria! Existe una relación  </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Categoria no eliminada </div> ");  });</script>';
        }
        $this->view->show("menuCategoriaVista.php");
    }

    public function obtenerCategorias() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        echo json_encode($PD->obtenerCategorias());
    }

    public function modificarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $fechaActual = date("Y/m/d");
        $resultado = $PD->modificarCategorias($_POST['categorianombre'], $_POST['categoriadescripcion'], $fechaActual, $_POST['categoriaid'], $_POST['usuarioid']);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Categoria  modificada </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Categoria no modificada </div> ");  });</script>';
        }
        $data['actualizarCategorias'] = $PD->filtrarCategoriaById($_POST["categoriaid"]);

        $this->view->show("actualizarCategoriaVista.php", $data);
    }

    public function registrarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD1 = new categoriaDato();
        $fechaActual = date("Y/m/d");
        $resul = $PD1->registrarCategoria($_POST['categorianombre'], $_POST['usuarioid'], $_POST['categoriadescripcion'], $fechaActual);

        if ($resul == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Categoria  Registrada </div> ");  });</script>';
        } else if ($resul == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Categoria  EXISTENTE </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Categoria  NO registrada </div> ");  });</script>';
        }
        $this->view->show("registrarCategoriaVista.php");
    }

    public function menuCategoriaVista() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $data['listado'] = $PD->listarCategorias();
        $this->view->show("menuCategoriaVista.php", $data);
    }

    public function registrarCategoriaVista() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();
        $data['listadoUsuarios'] = $PD->obtenerUsuarios(1);
        $this->view->show("registrarCategoriaVista.php", $data);
    }

    public function filtrarCategoriaById() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $data['actualizarCategorias'] = $PD->filtrarCategoriaById($_GET["categoriaid"]);
        $this->view->show("actualizarCategoriaVista.php", $data);
    }

}
