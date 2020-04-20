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
          //echo '<script> alert("hola"); </script>';
        $PD->eliminacionSubCategoria($_POST['subcategoriaid']);
        $this->view->show("menuSubCategoriaVista.php");
    }

    public function modificarSubCategorias() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $PD->modificiacionSubCategoria($_POST['nombresubcategoria'], $_POST['categoriaid1'], $_POST['idsubcategoria']);
        echo 'Modificado';
    }
    

    public function menuSubCategoriaVista() {
        $this->view->show("menuSubCategoriaVista.php");
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
        //  
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        $PD->registrarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid1']);
        echo 'Registrado';
    }

}
