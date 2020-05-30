<?php

class OfertaController {

    //put your code here
    public function __construct() {
        $this->view = new View();
    }
    
    public function menuOfertas(){
           require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();
       $data["listado"]=$PD->obtenerOferta();
      $this->view->show("menuOfertas.php", $data);
  
    }
    
    
      public function obtenerProductos() {
        require 'model/data/ofertaDato.php';
        $PD = new ofertaDato();
        echo json_encode($PD->obtenerProducto());
    }
    public function registrarOferta(){
          require 'model/data/ofertaDato.php';
        $PD = new ofertaDato(); 
    //    $newPrecio=$_POST["precio"]/$_POST["descuento"];
       $resul= $PD->registrarOferta(0, $_POST["productoid"], $_POST["descuento"], $_POST["fechaIn"], $_POST["fechaFin"]);
       if($resul==0){  echo "<script> alert('Registrado'); </script>"; }else{ echo "<script> alert('NO Registrado'); </script>"; }
        $data["listado"]=$PD->obtenerOferta();
      $this->view->show("menuOfertas.php", $data);
    }
    
    
}