<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemModel
 *
 * @author Nelson
 */
require 'libs/SPDO.php';
require 'model/Cliente.php';
class ItemModel {
    protected $db;
   
    
    public function __construct() {

        $this->db = SPDO::singleton();
    }
    



      
    public function registrarCliente($codigoCliente, $nombre,$apellido1,$apellido2,$correo,$contrasenia,$tipoUsuario) {
        $consulta = $this->db->prepare('insert into cliente(codigoCliente,nombre,apellido1,apellido2,correo,contrasenia,tipoUsuario) values ("'.$codigoCliente.'","' . $nombre . '","' . $apellido1 . '","' . $apellido2 . '","' . $correo . '","' . $contrasenia . '","' . $tipoUsuario . '")');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
         
  
        public function modificarCliente($codigoCliente, $nombre,$apellido1,$apellido2,$correo,$contrasenia,$tipoUsuario) {
        $consulta = $this->db->prepare('update  cliente  set codigoPersona=' . $codigoCliente . ', nombre=' . $nombre . ', apellido1=' . $apellido1 . ', apellido2=' . $apellido2 . ', correo=' . $correo . ', contrasenia=' . $contrasenia . ', tipoUsuario=' . $tipoUsuario . ')');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
        public function eliminarCliente($codigoCliente) {
        $consulta = $this->db->prepare('delete from cliente where codigoPersona= "' . $codigoCliente .  '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

}

// fin clase
