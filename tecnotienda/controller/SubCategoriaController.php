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

    public function modificarSubCategoria() {
        require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
        if ($_POST['categoriaid'] == 'Selecciona:' && $_POST['usuarioid'] == 'Selecciona:') {
            $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid1'], $_POST['subcategoriadescripcion'], $_POST['usuarioid1'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
        } else if ($_POST['categoriaid'] == 'Selecciona:') {
            $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid1'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
        } else if ($_POST['usuarioid'] == 'Selecciona:') {
            $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid1'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
        } else    if ($_POST['categoriaid'] != 'Selecciona:' && $_POST['usuarioid'] != 'Selecciona:') {
            $PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
        }
     //$PD->modificarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'], $_POST['subcategoriadescripcion'], $_POST['usuarioid'], $_POST['subcategoriafecha'], $_POST['subcategoriaid']);
       
        $data['actualizarSubCategorias'] = $PD->filtrarSubCategoriaById($_POST['subcategoriaid']);
        $this->view->show("actualizarSubCategoriaVista.php", $data);
    }

    public function menuSubCategoriaVista() {
       require 'model/data/subcategoriaDato.php';
        $PD = new subcategoriaDato();
          $data['listado']= ($PD->listarSubCategorias());
        $this->view->show("menuSubCategoriaVista.php",$data);
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
        $PD->registrarSubCategorias($_POST['subcategorianombre'], $_POST['categoriaid'],$_POST['subcategoriadescripcion'],$_POST['usuarioid'], $_POST['subcategoriafecha']);
         $this->view->show("registrarSubCategoriaVista.php");
    }

}
