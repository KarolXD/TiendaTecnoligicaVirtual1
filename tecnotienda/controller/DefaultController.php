<?php

class DefaultController {

    private $view;

    public function __construct() {
        $this->view = new View();
    }

// constructor

    public function acciondefault() {

        // llamar modelo para traer datos
        require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $this->view->show("menuUsuario.php");
    }

}
?>

