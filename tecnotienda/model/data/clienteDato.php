<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemModel
 *
 * @author Karol
 */

class clienteDato {

    protected $db;

      public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }


    public function registrarCliente($usuario, $contrasenia, $estado) {
        $data = array($usuario, $contrasenia, $estado);
        $consulta = $this->db->prepare('insert into tbcliente(tbclienteusuario,tbclientecontrasennia,tbclienteactivo) values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function listarCorreo() {
        $consulta = $this->db->prepare('select tbcorreoid, clienteid,tbcorreoatributo,tbcorreovalor from tbcorreo');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
    public function actualizarCorreo($clienteid,$valor,$correoid){
        $data = array($clienteid,$valor,$correoid);  
        $consulta = $this->db->prepare('update  tbcorreo set clienteid=?, tbcorreoatributo=? where tbcorreoid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
        
    }
     public function filtarCorreoById($correoid) {
        $consulta = $this->db->prepare('select tbcorreoid, clienteid,tbcorreoatributo,tbcorreovalor from tbcorreo where tbcorreoid="'.$correoid.'"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
    
    
        public function registrarCorreo($clienteid, $valor,$valorInicial) {
        $data = array($clienteid, $valor,$valorInicial);
        $consulta = $this->db->prepare('insert into  tbcorreo (clienteid,tbcorreoatributo,tbcorreovalor)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    
    
    public function modificarCliente($nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia,$clienteid) {
   $data = array( $nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia,$clienteid);
        $consulta = $this->db->prepare(' UPDATE tbcliente  SET tbclientenombre=?,tbclienteapellido1=?,tbclienteapellido2=?,tbclientecorreo1=?,tbclientecorreo2=?,tbclientetelefono1=?,tbclientetelefono2=?,tbclientedireccion=?,tbclientecontrasenia=? where tbclienteid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    
    public function eliminarCliente($clienteid) {
        $consulta = $this->db->prepare('delete from tbcliente where tbclienteid= "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
     public function filtrarClienteById($clienteid) {
        $consulta = $this->db->prepare('select  tbclienteid,tbclientenombre,tbclienteapellido1,tbclienteapellido2,tbclientecorreo1,'
                . 'tbclientecorreo2,tbclientetelefono1,tbclientetelefono2,tbclientedireccion , tbclientecontrasenia from tbcliente where tbclienteid="'.$clienteid.'"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
   public function listarClientes() {
        $consulta = $this->db->prepare('select  tbclienteid,tbclientenombre,tbclienteapellido1,tbclienteapellido2,tbclientecorreo1,tbclientecorreo2,tbclientetelefono1,tbclientetelefono2,tbclientedireccion from tbcliente');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }
}

// fin clase
