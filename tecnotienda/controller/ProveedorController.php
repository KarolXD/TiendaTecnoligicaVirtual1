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

    public function registrarProveedorVista() {
        $this->view->show("registrarProveedor.php");
    }

    public function listarProveedor() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $dato['listado'] = $items->listarDatosProveedor();
        $this->view->show("menuProveedor.php", $dato);
    }

    public function eliminarCliente() {
        require 'model/data/proveedorDato.php';
        $PD = new proveedorDato();
        $usuario = $_GET['clienteid'];
        $PD->quitarCliente($usuario);
        $dato['listado'] = $PD->listarDatosProveedor();
        $this->view->show("menuProveedor.php", $dato);
    }

    public function registrarProveedor() {

        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $usuario = $_POST["usuario"];
        $valor = "";
        $valor2 = "";
        $temp = "";
        $temp2 = "";
        $correos = $_POST["name"];
        $telefono = $_POST["names"];
        $array_cor = count($correos);
        $array_num = count($telefono);
        $estado = $_POST["estado"];
        $contra = $_POST["contra"];

        for ($i = 0; $i < $array_cor; $i++) {
            $valor .= $correos[$i] . ",";
            $temp .= "0" . ",";
        }
        for ($y = 0; $y < $array_num; $y++) {
            $valor2 .= $telefono[$y] . ",";
            $temp2 .= "0" . ",";
        }

        $items->registrarCorreo($usuario, $valor, $temp);
        $items->registrarTelefono($usuario, $valor2);
        $items->registrarProveedor($usuario, $contra, $estado);

        $this->view->show("registrarProveedor.php");
    }

    public function actualizarDatosCorreo() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        echo $array_num;
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $items->actualizarCorreo($correoid, $valor);

        $dato['listado'] = $items->listarDatosProveedor($clienteid);
        $this->view->show("menuProveedor.php", $dato);
    }

    public function actualizarDatosTelefono() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        echo $array_num;
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $items->actualizarTelefono($correoid, $valor);

        $dato['listado'] = $items->listarDatosProveedor($clienteid);
        $this->view->show("menuProveedor.php", $dato);
    }
    
    
    public function filtarClienteById() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById($clienteid);
        $this->view->show("actualizarCorreoP.php", $dato);
    }

    public function filtarClienteById2() {
        require 'model/data/proveedorDato.php';
        $items = new proveedorDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById2($clienteid);
        $this->view->show("actualizarTelefonoP.php", $dato);
    }
    

//    public function menuProveedor() {
//        $this->view->show("menuProveedor.php");
//    }
//
//    public function registrarProveedor() {
//        $this->view->show("registrarProveedor.php");
//    }
//
//    public function guardarProveedor() {
//        require 'model/data/proveedorDato.php';
//        $PD = new proveedorDato();
//        $PD->guardarProveedor($_POST['proveedornombreempresa'], $_POST['proveedorfax'], $_POST['proveedorapartadopostal'], $_POST['proveedorcorreo'],
//                $_POST['proveedorsitioweb'], $_POST['proveedorpersonadecontacto'], $_POST['proveedornumerotelefono'], $_POST['proveedordireccionfisicaempresa'], $_POST['proveedorid']);
//        echo 'Registrado';
//    }
//    
//    
//       public function modificarProveedor() {
//        require 'model/data/proveedorDato.php';
//        $PD = new proveedorDato();
//        $PD->modificarProveedor($_POST['proveedornombreempresa'], $_POST['proveedorfax'], $_POST['proveedorapartadopostal'], $_POST['proveedorcorreo'],
//                $_POST['proveedorsitioweb'], $_POST['proveedorpersonadecontacto'], $_POST['proveedornumerotelefono'], $_POST['proveedordireccionfisicaempresa'], $_POST['proveedorid']);
//        echo 'Registrado';
//    }
//        public function filtrarProveedorById() {
//         require 'model/data/proveedorDato.php';
//        $PD = new proveedorDato();
//        $data['actualizarProveedores'] = $PD->filtrarProveedorById($_GET['proveedorid']);
//        $this->view->show("actualizarProveedor.php", $data);
//    }
//
//
//    public function listarProveedor() {
//        require 'model/data/proveedorDato.php';
//        $PD = new proveedorDato();
//        echo json_encode($PD->listarProveedor());
//    }
//    
//      public function eliminarProveedor() {
//        require 'model/data/proveedorDato.php';
//        $PD = new proveedorDato();
//          //echo '<script> alert("hola"); </script>';
//        $PD->eliminarProveedor($_POST['proveedorid']);
//        $this->view->show("menuProveedor.php");
//    }

}
