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


    public function registrarCliente($clienteid, $nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia, $tipoUsuario) {
        $data = array($clienteid, $nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia, $tipoUsuario);
        $consulta = $this->db->prepare('insert into tbcliente(tbclienteid,tbclientenombre,tbclienteapellido1,tbclienteapellido2,tbclientecorreo1,tbclientecorreo2,tbclientetelefono1,tbclientetelefono2,tbclientedireccion,tbclientecontrasenia,tbclientetipousuario) values (?,?,?,?,?,?,?,?,?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarCliente($codigoCliente, $nombre, $apellido1, $apellido2, $correo, $contrasenia, $tipoUsuario) {
        $consulta = $this->db->prepare('update  cliente  set codigoPersona=' . $codigoCliente . ', nombre=' . $nombre . ', apellido1=' . $apellido1 . ', apellido2=' . $apellido2 . ', correo=' . $correo . ', contrasenia=' . $contrasenia . ', tipoUsuario=' . $tipoUsuario . ')');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminarCliente($codigoCliente) {
        $consulta = $this->db->prepare('delete from cliente where codigoPersona= "' . $codigoCliente . '"');
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
