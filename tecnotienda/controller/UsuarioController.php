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

    public function menuPrincipalUsuario() {
        $this->view->show("menuUsuario.php");
    }

    public function listarUsuarios() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();
        $dato["listado"] = $PD->obtenerUsuarios();
        $this->view->show("menuAdministrador.php", $dato);
    }

    public function eliminarUsuario() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();

        echo $_POST["usuarioid"];
        $resultado = $PD->eliminarUsuario($_POST["usuarioid"]);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Usuario eliminado exitosamente</div> ");  });</script>';
        } else if ($resultado == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Usuario NO eliminado. Existe un usuario en una categoria/subcategoria</div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Usuario no eliminado </div> ");  });</script>';
        }
        $dato["listado"] = $PD->obtenerUsuarios();
        $this->view->show("menuAdministrador.php", $dato);
    }

    public function guardarUsuario() {
        require 'model/data/usuarioDato.php';
        $PD = new usuarioDato();
        $resultado = $PD->guardarUsuario($_POST["username"], $_POST["password"], 0);
        if ($resultado == 1) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Mensaje!</strong> Usuario registrado exitosamente</div> ");  });</script>';
        } else if ($resultado == 0) {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Usuario EXISTENTE </div> ");  });</script>';
        } else {
            echo '<script src="./public/js/jquery-3.3.1.js" type="text/javascript"> </script>  <script>   $(function() {   $("#alertControl").html("<div > <strong>Advertencia!</strong> Usuario registrado</div> ");  });</script>';
        }
        $this->view->show("registrarUsuario.php");
    }

    public function registrarUsuario() {
        $this->view->show("registrarUsuario.php");
    }

    public function menuUsuario() {
        require 'model/data/categoriaDato.php';

        $PD = new categoriaDato();
        echo json_encode($PD->obtenerNombreCategorias());
    }

}
