<?php

class ClienteController {

    public function __construct() {
        $this->view = new View();
    }

    public function loginCliente() {

        $this->view->show("loginCliente.php");
    }

    public function loginCli() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_POST["username"];
        $contra = $_POST["password"];
        $dato = $items->loginCliente($clienteid, $contra);

        if ($dato == 1) {
            $this->view->show("loginAdmin.php", $dato);
        } else {
            $this->view->show("loginCliente.php", $dato);
        }
    }

    public function loginAdmin() {
        $this->view->show("loginAdmin.php");
    }

    public function registrarClienteVista() {
        $this->view->show("registrarClienteVista.php");
    }

    public function menuPrincipal() {
        $this->view->show("menuPrincipal.php");
    }

    public function menuClientes() {
        $this->view->show("menuClientes.php");
    }

    public function listarClientes() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $dato['listado'] = $items->listarDatosCliente();
        $this->view->show("MenuClientes.php", $dato);
    }
    
    public function listarClientesDetalle() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $dato['listado'] = $items->listarDatosCliente();
        $this->view->show("detalleCliente.php", $dato);
    }

    public function listarCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $dato['listado'] = $items->listarCorreo();
        $this->view->show("MenuCorreo.php", $dato);
    }

    public function actualizarCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $valor = "";
        $clienteid = $_POST["clienteid"];
        $correoid = $_POST["correoid"];
        $correos = $_POST["correo"];
        $array_num = count($correos);
        echo $array_num;
        for ($i = 0; $i < $array_num; $i++) {
            $valor .= $correos[$i] . ",";
        }
        $items->actualizarCorreo($clienteid, $valor, $correoid);

        $dato['listado'] = $items->filtarCorreoById($correoid);
        $this->view->show("actualizarCorreo.php", $dato);
    }

    public function filtarClienteById() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById($clienteid);
        $this->view->show("actualizarCorreo.php", $dato);
    }

    public function filtarClienteById2() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $clienteid = $_GET["clienteid"];
        $dato['listado'] = $items->filtarClienteById2($clienteid);
        $this->view->show("actualizarTelefono.php", $dato);
    }

    public function actualizarDatosCorreo() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
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

        $dato['listado'] = $items->listarDatosCliente($clienteid);
        $this->view->show("MenuClientes.php", $dato);
    }

    public function actualizarDatosTelefono() {
        require 'model/data/clienteDato.php';
        $items = new clienteDato();
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

        $dato['listado'] = $items->listarDatosCliente($clienteid);
        $this->view->show("MenuClientes.php", $dato);
    }

    public function registrarCliente() {

        require 'model/data/clienteDato.php';
        $items = new clienteDato();
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

        $provincia = $_POST["provincia"];
        if ($provincia == 1) {
            $provincia = "San José";
        }
        if ($provincia == 2) {
            $provincia = "Alajuela";
        }
        if ($provincia == 3) {
            $provincia = "Cartago";
        }
        if ($provincia == 4) {
            $provincia = "Heredia";
        }
        if ($provincia == 5) {
            $provincia = "Guanacaste";
        }
        if ($provincia == 6) {
            $provincia = "Puntarenas";
        }
        if ($provincia == 7) {
            $provincia = "Limón";
        }
        $canton = $_POST["canton"];
        $distrito = $_POST["distrito"];
        $descripcion = $_POST["direccion"];

        $banco = $_POST["banco"];
        $numerocuenta = $_POST["numerocuenta"];

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
        $items->registrarCliente($usuario, $contra, $estado);
        $items->registrarDireccion($usuario, $provincia, $canton, $distrito, $descripcion);
        $items->registrarCuentaBancaria($usuario, $banco, $numerocuenta);

        $this->view->show("registrarClienteVista.php");
    }

    public function eliminarCliente() {
        require 'model/data/clienteDato.php';
        $PD = new clienteDato();
        $usuario = $_GET['clienteid'];
        $PD->quitarCliente($usuario);
        $dato['listado'] = $PD->listarDatosCliente();
        $this->view->show("MenuClientes.php", $dato);
    }

//
//    public function loginCliente() {
//
//        $this->view->show("loginCliente.php");
//    }
//
//    public function loginAdmin() {
//        $this->view->show("loginAdmin.php");
//    }
//
//    public function registrarClienteVista() {
//        $this->view->show("registrarClienteVista.php");
//    }
//
//    public function menuPrincipal() {
//        $this->view->show("menuPrincipal.php");
//    }
//
//    public function menuClientes() {
//        $this->view->show("menuClientes.php");
//    }
//
//    public function listarClientes() {
//        require 'model/data/clienteDato.php';
//        $PD = new clienteDato();
//        echo json_encode($PD->listarClientes());
//    }
//
//    
//    public function listarCorreo(){
//         require 'model/data/clienteDato.php';
//        $items = new clienteDato();   
//       $dato['listado']= $items->listarCorreo();
//      $this->view->show("MenuCorreo.php",$dato);
//    }
//    public function filtarCorreoById(){
//       require 'model/data/clienteDato.php';
//        $items = new clienteDato();
//        $correoid = $_GET["correoid"];
//           $dato['listado']=$items->filtarCorreoById($correoid);
//          $this->view->show("actualizarCorreo.php",$dato);
//    }
//     public function actualizarCorreo() {
//        require 'model/data/clienteDato.php';
//        $items = new clienteDato();
//        $valor = "";
//        $clienteid = $_POST["clienteid"];
//        $correoid = $_POST["correoid"];
//        $correos = $_POST["correo"];
//        $array_num = count($correos);
//        echo $array_num;
//        for ($i = 0; $i < $array_num; $i++) {
//            $valor .= $correos[$i] . ",";
//        }
//        $items->actualizarCorreo($clienteid,$valor,$correoid);
//        
//         $dato['listado']=$items->filtarCorreoById($correoid);
//          $this->view->show("actualizarCorreo.php",$dato);
//    }
//
//    public function registrarCliente() {
//
//        require 'model/data/clienteDato.php';
//        $items = new clienteDato();
//        $usuario = $_POST["usuario"];
//        $valor=""; $est="";
//        $correos = $_POST["name"];
//         $array_num = count($correos);
//              
//            for ($i = 0; $i < $array_num; $i++) {
//                $valor.=$correos[$i].",";
//                $est.="0".",";            
//            }
//                $items->registrarCorreo($usuario, $valor, $est);
//     //        $items->registrarCliente($usuario,$contrasenia,$estado);
//        
//    
//        
//        $this->view->show("registrarClienteVista.php");
//    }
//
//    public function modificarCliente() {
//        require 'model/data/clienteDato.php';
//        $PD = new clienteDato();
//        $clienteid = $_POST["codigoPersona"];
//        $nombre = $_POST["nombre"];
//        $apellido1 = $_POST["apellido1"];
//        $apellido2 = $_POST["apellido2"];
//        $correo1 = $_POST["correo1"];
//        $correo2 = $_POST["correo2"];
//        $telefono1 = $_POST["telefono1"];
//        $telefono2 = $_POST["telefono2"];
//        $contrasenia = $_POST["contrasenia"];
//        $direccion = $_POST["direccion"];
//        $PD->modificarCliente($nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia, $clienteid);
//        echo 'Modificado';
//    }
//
//    public function filtrarClienteById() {
//        require 'model/data/clienteDato.php';
//        $PD = new clienteDato();
//        $data['actualizarCliente'] = $PD->filtrarClienteById($_GET['clienteid']);
//        $this->view->show("actualizarClienteVista.php", $data);
//    }
//
//      public function eliminarCliente() {
//         require 'model/data/clienteDato.php';
//        $PD = new clienteDato();
//          //echo '<script> alert("hola"); </script>';
//        $PD->eliminarCliente($_POST['clienteid']);
//      $this->view->show("menuClientes.php");
//}
}

//fin
// fin clase
?>