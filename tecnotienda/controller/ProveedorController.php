<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProveedorController
 *
 * @author Karol
 */
class ProveedorController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }

    public function menuProveedor() {
        $this->view->show("menuProveedor.php");
    }

    public function registrarProveedor() {
        $this->view->show("registrarProveedor.php");
    }

    public function guardarProveedor() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        $PD->guardarProveedor($_POST['proveedornombreempresa'], $_POST['proveedorfax'], $_POST['proveedorapartadopostal'], $_POST['proveedorcorreo'],
                $_POST['proveedorsitioweb'], $_POST['proveedorpersonadecontacto'], $_POST['proveedornumerotelefono'], $_POST['proveedordireccionfisicaempresa'], $_POST['proveedorid']);
        echo 'Registrado';
    }
    
    
       public function modificarProveedor() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        $PD->modificarProveedor($_POST['proveedornombreempresa'], $_POST['proveedorfax'], $_POST['proveedorapartadopostal'], $_POST['proveedorcorreo'],
                $_POST['proveedorsitioweb'], $_POST['proveedorpersonadecontacto'], $_POST['proveedornumerotelefono'], $_POST['proveedordireccionfisicaempresa'], $_POST['proveedorid']);
        echo 'Registrado';
    }
        public function filtrarProveedorById() {
         require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        $data['actualizarProveedores'] = $PD->filtrarProveedorById($_GET['proveedorid']);
        $this->view->show("actualizarProveedor.php", $data);
    }


    public function listarProveedor() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        echo json_encode($PD->listarProveedor());
    }
    
      public function eliminarProveedor() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
          //echo '<script> alert("hola"); </script>';
        $PD->eliminarProveedor($_POST['proveedorid']);
        $this->view->show("menuProveedor.php");
    }

}
