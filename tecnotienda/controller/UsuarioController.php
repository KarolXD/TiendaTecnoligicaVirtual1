<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Jahanel
 */
class UsuarioController {
    //put your code here
    
       //put your code here
    public function __construct() {
        $this->view = new View();
    }

      public function cerrarSession() {
      session_start();

        if (session_destroy()) {
            echo "Sesión destruida correctamente";
        } else {
            echo "Error al destruir la sesión";
        }
      header("Location: menuUsuario.php ");
    }
      public function obtenerUsuarios() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();
        echo json_encode($PD->obtenerUsuarios(1));
    }

    public function menuPrincipalUsuario(){
   $this->view->show("menuUsuario.php");
    }
     
    
        public function menuUsuario() {
       require 'model/data/categoriaDato.php';
        $PD = new categoriaDato();
        echo json_encode($PD->obtenerNombreCategorias());
    }

    
    
    
}
