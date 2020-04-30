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

// acciondefault
}

// fin clase$this->load->view('your_view_directory or view_page',['data'=>$data, 'data2'=>$data2, 'data3'=>$data3... so on ]);
?>

