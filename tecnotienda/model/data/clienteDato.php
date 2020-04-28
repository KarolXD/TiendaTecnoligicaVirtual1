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

    public function registrarCorreo($clienteid, $valor, $valorInicial) {
        $data = array($clienteid, $valor, $valorInicial);
        $consulta = $this->db->prepare('insert into  tbcorreo (tbclienteusuario,tbcorreoatributo,tbcorreovalor)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarTelefono($clienteid, $valor) {
        $data = array($clienteid, $valor);
        $consulta = $this->db->prepare('insert into  tbtelefono (tbclienteusuario,tbtelefononumero)  values (?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarDireccion($clienteid, $provincia, $canton, $distrito, $descripcion) {
        $data = array($clienteid, $provincia, $canton, $distrito, $descripcion);
        $consulta = $this->db->prepare('insert into  tbdireccion (tbclienteusuario,tbdireccionprovincia,tbdireccioncanton,tbdirecciondistricto,tbdireccionotrassenas)  values (?,?,?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarCuentaBancaria($clienteid, $nombrebanco, $cuenta) {
        $data = array($clienteid, $nombrebanco, $cuenta);
        $consulta = $this->db->prepare('insert into  tbclientedatosbancario (tbclienteusuario,tbclientedatosbancarionombrebanco,tbclientedatosbancarionumerocuenta)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function listarDatosCliente() {
        $consulta = $this->db->prepare('SELECT  cliente.tbclienteusuario,
    correo.tbcorreoatributo,
    telefono.tbtelefononumero,
    direccion.tbdireccionprovincia,direccion.tbdireccioncanton,direccion.tbdirecciondistricto,direccion.tbdireccionotrassenas,
    banco.tbclientedatosbancarionombrebanco,banco.tbclientedatosbancarionumerocuenta
     FROM bdtecnotienda.tbcliente cliente
     join bdtecnotienda.tbcorreo correo on correo.tbclienteusuario=cliente.tbclienteusuario 
     join bdtecnotienda.tbtelefono telefono on telefono.tbclienteusuario=cliente.tbclienteusuario 
     join bdtecnotienda.tbdireccion direccion on direccion.tbclienteusuario=cliente.tbclienteusuario
     join bdtecnotienda.tbclientedatosbancario banco on banco.tbclienteusuario=cliente.tbclienteusuario where cliente.tbclienteusuario = correo.tbclienteusuario and 
     cliente.tbclienteusuario = telefono.tbclienteusuario and cliente.tbclienteusuario = direccion.tbclienteusuario and cliente.tbclienteusuario = banco.tbclienteusuario and cliente.tbclienteactivo = 0;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function quitarCliente($clienteid) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbcliente set tbclienteactivo=1 where tbclienteusuario = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById($clienteid) {
        $consulta = $this->db->prepare('SELECT cliente.tbclienteusuario,correo.tbcorreoatributo,correo.tbcorreoid FROM bdtecnotienda.tbcliente cliente join bdtecnotienda.tbcorreo correo on correo.tbclienteusuario=cliente.tbclienteusuario where cliente.tbclienteusuario = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById2($clienteid) {
        $consulta = $this->db->prepare('SELECT  cliente.tbclienteusuario,
		telefono.tbtelefononumero,
                telefono.tbtelefononid
                FROM bdtecnotienda.tbcliente cliente
                join bdtecnotienda.tbtelefono telefono on telefono.tbclienteusuario=cliente.tbclienteusuario 
                where cliente.tbclienteusuario = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function loginCliente($clienteid, $contra) {

        $sql = 'SELECT COUNT(*) as total FROM tbcliente where tbclienteusuario ="' . $clienteid . '" and tbclientecontrasennia ="' . $contra . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        if ($count['total'] > 0) {
               echo '<script>  alert("Inicia Sesion");</script>';
               return 1;
        } else {
              echo '<script>  alert("Datos Incorrectos");</script>'; 
              return 0;
        }
    }

//
//    public function registrarCliente($usuario, $contrasenia, $estado) {
//        $data = array($usuario, $contrasenia, $estado);
//        $consulta = $this->db->prepare('insert into tbcliente(tbclienteusuario,tbclientecontrasennia,tbclienteactivo) values (?,?,?)');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//    }
//
//    public function listarCorreo() {
//        $consulta = $this->db->prepare('select tbcorreoid, tbclienteusuario,tbcorreoatributo,tbcorreovalor from tbcorreo');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//    
//    public function actualizarCorreo($clienteid,$valor,$correoid){
//        $data = array($clienteid,$valor,$correoid);  
//        $consulta = $this->db->prepare('update  tbcorreo set tbclienteusuario=?, tbcorreoatributo=? where tbcorreoid=?');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//        
//    }
//     public function filtarCorreoById($correoid) {
//        $consulta = $this->db->prepare('select tbcorreoid, tbclienteusuario,tbcorreoatributo,tbcorreovalor from tbcorreo where tbcorreoid="'.$correoid.'"');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//    
//    
//    
//        public function registrarCorreo($clienteid, $valor,$valorInicial) {
//        $data = array($clienteid, $valor,$valorInicial);
//        $consulta = $this->db->prepare('insert into  tbcorreo (tbclienteusuario,tbcorreoatributo,tbcorreovalor)  values (?,?,?)');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//    }
//
//    
//    
//    public function modificarCliente($nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia,$clienteid) {
//   $data = array( $nombre, $apellido1, $apellido2, $correo1, $correo2, $telefono1, $telefono2, $direccion, $contrasenia,$clienteid);
//        $consulta = $this->db->prepare(' UPDATE tbcliente  SET tbclientenombre=?,tbclienteapellido1=?,tbclienteapellido2=?,tbclientecorreo1=?,tbclientecorreo2=?,tbclientetelefono1=?,tbclientetelefono2=?,tbclientedireccion=?,tbclientecontrasenia=? where tbclienteid=?');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//    }
//
//    
//    public function eliminarCliente($clienteid) {
//        $consulta = $this->db->prepare('delete from tbcliente where tbclienteid= "' . $clienteid . '"');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//     public function filtrarClienteById($clienteid) {
//        $consulta = $this->db->prepare('select  tbclienteid,tbclientenombre,tbclienteapellido1,tbclienteapellido2,tbclientecorreo1,'
//                . 'tbclientecorreo2,tbclientetelefono1,tbclientetelefono2,tbclientedireccion , tbclientecontrasenia from tbcliente where tbclienteid="'.$clienteid.'"');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//   public function listarClientes() {
//        $consulta = $this->db->prepare('select  tbclienteid,tbclientenombre,tbclienteapellido1,tbclienteapellido2,tbclientecorreo1,tbclientecorreo2,tbclientetelefono1,tbclientetelefono2,tbclientedireccion from tbcliente');
//        $consulta->execute();
//        return $consulta->fetchALL(PDO::FETCH_ASSOC);
//    }
}

// fin clase
