<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Usuario
 */
class UsuarioController {
    //put your code here
    
       //put your code here
    public function __construct() {
        $this->view = new View();
    }
    
      public function obtenerUsuarios() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();
        echo json_encode($PD->obtenerUsuarios(1));
    }

    
       public function menuUsuario() {
       require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        $data['listado']= $PD->obtenerNombreCategorias();
        $data2['listado2']= $PD->obtenerSubNombreCategorias();
        $this->view->show("menuUsuario.php",$data);
    }
//           public function headerUsuario() {
//       require 'model/data/categoriaDato.php';
//        $PD = new categoriaDato();
//        $data['listado']= ($PD->obtenerNombreCategorias());
//        $this->view->show("headerUsuario.php",$data);
//    }
    
    
    
}
