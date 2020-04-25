<?php

class ClienteController {

    public function __construct() {
        $this->view = new View();
    }

    public function loginCliente() {

        $this->view->show("loginCliente.php");
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
        $PD = new clienteDato();
        echo json_encode($PD->listarClientes());
    }

    
    public function listarCorreo(){
         require 'model/data/clienteDato.php';
        $items = new clienteDato();   
       $dato['listado']= $items->listarCorreo();
      $this->view->show("MenuCorreo.php",$dato);
    }
    public function filtarCorreoById(){
       require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $correoid = $_GET["correoid"];
           $dato['listado']=$items->filtarCorreoById($correoid);
          $this->view->show("actualizarCorreo.php",$dato);
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
        $items->actualizarCorreo($clienteid,$valor,$correoid);
        
         $dato['listado']=$items->filtarCorreoById($correoid);
          $this->view->show("actualizarCorreo.php",$dato);
    }

    public function registrarCliente() {

        require 'model/data/clienteDato.php';
        $items = new clienteDato();
        $usuario = $_POST["usuario"];
        $valor=""; $est="";
        $correos = $_POST["name"];
         $array_num = count($correos);
   
            for ($i = 0; $i < $array_num; $i++) {
                $valor.=$correos[$i].",";
                $est.="0".",";            
            }
                $items->registrarCorreo($usuario, $valor, $est);
     //        $items->registrarCliente($usuario,$contrasenia,$estado);
        
    
        
        $this->view->show("registrarClienteVista.php");
    }

    public function modificarCliente() {
        require 'model/data/clienteDato.php';
        $PD = new clienteDato();
        $clienteid = $_POST["codigoPersona"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $correo1 = $_POST["correo1"];
        $correo2 = $_POST["correo2"];
        $telefono1 = $_POST["telefono1"];
        $telefono2 = $_POST["telefono2"];
        $contrasenia = $_POST["contrasenia"];
        $direccion = $_POST["direccion"];
        $PD->modificarCliente($nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia, $clienteid);
        echo 'Modificado';
    }

    public function filtrarClienteById() {
        require 'model/data/clienteDato.php';
        $PD = new clienteDato();
        $data['actualizarCliente'] = $PD->filtrarClienteById($_GET['clienteid']);
        $this->view->show("actualizarClienteVista.php", $data);
    }

      public function eliminarCliente() {
         require 'model/data/clienteDato.php';
        $PD = new clienteDato();
          //echo '<script> alert("hola"); </script>';
        $PD->eliminarCliente($_POST['clienteid']);
      $this->view->show("menuClientes.php");
}
}
//fin
// fin clase
?>