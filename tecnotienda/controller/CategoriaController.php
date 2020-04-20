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

    public function registrarCategoriaVista() {
        $this->view->show("registrarCategoriaVista.php");
    }

    public function filtrarCategoriaById() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $data['actualizarCategorias'] = $PD->filtrarCategoriaById($_GET["categoriaid"]);
        $this->view->show("actualizarCategoriaVista.php", $data);
    }

    public function verificarCategoria() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $PD->verificarCategoria($_POST['categoriaid']);
        $this->view->show("menuCategoriaVista.php");
    }

    public function registrarCategorias() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $PD->registrarCategorias($_POST['categorianombre']);
    }

    public function modificarCategorias() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $PD->modificarCategorias($_POST['nombreCategoria'], $_POST['categoriaid']);
    }

    public function obtenerCategorias() {
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        echo json_encode($PD->listarCategorias());
    }

    public function menuCategoriaVista() {
        $this->view->show("menuCategoriaVista.php");
    }

}
