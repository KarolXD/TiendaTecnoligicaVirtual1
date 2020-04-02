<?php



class ItemController {

    public function __construct() {
        $this->view = new View();
    }
    

    public function loginCliente() {

        $this->view->show("loginCliente.php");
    }

 
    public function loginAdmin() {

        $this->view->show("loginAdmin.php");
    }

        public function menuPrincipal() {

        $this->view->show("menuPrincipal.php");
    }

    
        public function registrarCliente() {

        require 'model/ItemModel.php';
       $items = new ItemModel();
       $codigoCliente= $_POST["codigoPersona"];
       $nombre= $_POST["nombre"];
       $apellido1=$_POST["apellido1"];
       $apellido2=$_POST["apellido2"];
       $correo=$_POST["correo"];
       $contrasenia=$_POST["contrasenia"];
       $tipoUsuario=$_POST["tipoUsuario"];  
       $items->registrarCliente($codigoCliente, $nombre,$apellido1,$apellido2,$correo,$contrasenia,$tipoUsuario);
       $this->view->show("registrarCliente.php",null);
    }
        
        public function mostrarRegistrarCliente() {
        $this->view->show("registrarCliente.php",null);
    }
}

//fin
// fin clase
?>