<?php


   class Persona{
       private $nombre;
       private $apellidos;
       
       public function __construct() {
          $a= func_get_args();
          $n= func_num_args();
          if(method_exists($this, $f='__construct'.$n)){
              call_user_func_array(array($this,$f), $a);
          }
       } // constructor


       public function __construct1($nombre) {
           $this->nombre=$nombre;
       } // constructor1

       public function __construct2($nombre, $apellidos) {
           $this->nombre=$nombre;
           $this->apellidos=$apellidos;
       } // constructor2
       
       public function __toString(){
           return "Nombre: ".$this->nombre . " Apellidos: ".$this->apellidos;
       } // toString
       
       public function setNombre($nombre){
           $this->nombre=$nombre;           
       }
       
       public function getNombre(){
           return $this->nombre;
       }
       
   }  // fin clase
?>

