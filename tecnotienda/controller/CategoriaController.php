<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author Usuario
 */
class CategoriaController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }

//
//    public function verificarCategoria() {
//        require 'model/data/categoriaDato.php';
//        $PD = new categoriaDato();
//        $PD->verificarCategoria($_POST['categoriaid']);
//        $this->view->show("menuCategoriaVista.php");
//    }
//
//  
//   
//
    public function obtenerCategorias() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        echo json_encode($PD->obtenerCategorias());
    }


    public function modificarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        if ($_POST['usuarioid']!="Selecciona:"){
        $PD->modificarCategorias($_POST['categorianombre'], $_POST['usuarioid'], $_POST['categoriadescripcion'], $_POST['categoriafecha'], $_POST['categoriaid']);
        }else{
        $PD->modificarCategorias($_POST['categorianombre'], $_POST['usuarioid1'], $_POST['categoriadescripcion'], $_POST['categoriafecha'], $_POST['categoriaid']);
       }
        $data['actualizarCategorias'] = $PD->filtrarCategoriaById($_POST["categoriaid"]);
        $this->view->show("actualizarCategoriaVista.php", $data);
    }

    public function registrarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD1 = new categoriaDato();
        $resul = $PD1->registrarCategoria($_POST['categorianombre'], $_POST['usuarioid'], $_POST['categoriadescripcion'], $_POST['categoriafecha']);

        if ($resul == 1) {
            echo('   <div class="container"> <div class="row"> <div class="col-lg-12 ">   <div class="alert alert-info" role="alert">  <strong>En hora buena!</strong> Categoria Registrada </div> </div> </div> </div> ');
        } else {
            echo('   <div class="container"> <div class="row"> <div class="col-lg-12 ">   <div class="alert alert-danger" role="alert">  <strong>Imposible registrarla!</strong> Categoria existente </div> </div> </div> </div> ');
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
