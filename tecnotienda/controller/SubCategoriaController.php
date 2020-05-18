<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategoriaController
 *
 * @author Karol
 */
class SubCategoriaController {

    public function __construct() {
        $this->view = new View();
    }

    public function registrarSubCategoriaVista() {
        $this->view->show("registrarSubCategoriaVista.php");
    }

    public function filtrarSubCategoriaById() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['actualizarSubCategorias'] = $PD->filtrarSubCategoriaById($_GET['subcategoriaid']);
        $this->view->show("actualizarSubCategoriaVista.php", $data);
    }

    public function eliminarSubCategoria() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $resultado = $PD->eliminacionSubCategoria($_POST['subcategoriaid']);
        if ($resultado == 1) {
          echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> SubCategoria  Eliminada </div> ");  });</script>';
        } else if ($resultado == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> SubCategoria  No Eliminada. Existe una Sub Categoria en otra seccion </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> SubCategoria  No Eliminada </div> ");  });</script>';
        }
        $this->view->show("menuSubCategoriaVista.php");
    }

    public function modificarSubCategoria() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
            $fechaActual = date("Y/m/d");
        if ($_POST['categoriaid'] == 'Selecciona:' && $_POST['usuarioid'] == 'Selecciona:') {
            $resultado = $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid1'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $fechaActual, $_POST['subcategoriaid']);
        } else if ($_POST['categoriaid'] == 'Selecciona:') {
            $resultado = $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid1'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $fechaActual, $_POST['subcategoriaid']);
        } else if ($_POST['usuarioid'] == 'Selecciona:') {
            $resultado = $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'],$fechaActual, $_POST['subcategoriaid']);
        } else if ($_POST['categoriaid'] != 'Selecciona:' && $_POST['usuarioid'] != 'Selecciona:') {
            $resultado = $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $fechaActual, $_POST['subcategoriaid']);
        }
        //$PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
        if ($resultado == 1) {
         echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> SubCategoria  Modificada </div> ");  });</script>';
        } else {
         echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> SubCategoria  No Modificada </div> ");  });</script>';
        }
        $data['actualizarSubCategorias'] = $PD->filtrarSubCategoriaById($_POST['subcategoriaid']);
        $this->view->show("actualizarSubCategoriaVista.php", $data);
    }

    public function menuSubCategoriaVista() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['listado'] = ($PD->listarSubCategorias());
        $this->view->show("menuSubCategoriaVista.php", $data);
    }

    public function mostrarSubCategorias() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['listado'] = ($PD->listaMenuSubcategoria($_GET['categoriaid']));
        $this->view->show("mostrarSubCategorias.php", $data);
    }

    public function mostrarSubCategoriaCliente() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['listado'] = ($PD->listaMenuSubcategoria($_GET['categoriaid']));
        $this->view->show("mostrarSubCategoriaCliente.php", $data);
    }

    
    public function mostrardetallesSubCategoria() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['listado'] = ($PD->listadetalleSubcategoria($_GET['subcategoriaid']));
        $this->view->show("mostrardetallesSubCategoria.php", $data);
    }

    
    public function mostrardetallesSubCategoriaCliente() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $data['listado'] = ($PD->listadetalleSubcategoria($_GET['subcategoriaid']));
        $this->view->show("mostrardetallesSubCategoriaCliente.php", $data);
    }
    
    public function listarSubCategorias() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        echo json_encode($PD->listarSubCategorias());
    }

    public function obtenerSubCategorias() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        echo json_encode($PD->obtenerSubCategorias());
    }

    public function registrarSubCategorias() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $fechaActual = date("Y/m/d");
        $resultado = $PD->registrarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $fechaActual);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Sub Categoria  Registrada </div> ");  });</script>';
        } else if ($resultado == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> SubCategoria  EXISTENTE </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> SubCategoria  No registrada </div> ");  });</script>';
        }
        $this->view->show("registrarSubCategoriaVista.php");
    }

}
