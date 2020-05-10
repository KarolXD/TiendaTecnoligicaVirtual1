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

    public function registrarClienteCategorizacion($cliente, $contrasenia) {
        $consulta = $this->db->prepare('INSERT INTO `bdtecnotienda`.`tbclientecategorizacion`(`tbtbclienteid`,`tbclientecategorizacionnombre`,`tbclientecategorizaciondescuento`,`tbclientecategorizacionpuntoscompra`)
VALUES('. $cliente . ','.$contrasenia.',0,0);');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function registrarCorreo($clienteid, $valor, $valorInicial) {
        $data = array($clienteid, $valor, $valorInicial);
        $consulta = $this->db->prepare('insert into  tbcorreo (tbtbclienteid,tbcorreoatributo,tbcorreovalor)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarTelefono($clienteid, $valor, $valorInicial) {
        $data = array($clienteid, $valor, $valorInicial);
        $consulta = $this->db->prepare('insert into  tbtelefono (tbtbclienteid,tbtelefonoatributo,tbtelefonovalor)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarDireccion($clienteid, $provincia, $canton, $distrito, $descripcion) {
        $data = array($clienteid, $provincia, $canton, $distrito, $descripcion);
        $consulta = $this->db->prepare('insert into  tbdireccion (tbtbclienteid,tbdireccionprovincia,tbdireccioncanton,tbdirecciondistricto,tbdireccionotrassenas)  values (?,?,?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarCuentaBancaria($clienteid, $nombrebanco, $cuenta) {
        $data = array($clienteid, $nombrebanco, $cuenta);
        $consulta = $this->db->prepare('insert into  tbclientedatobancario (tbtbclienteid,tbclientedatosbancarionombrebanco,tbclientedatosbancarionumerocuenta)  values (?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function listarDatosCliente() {
        $consulta = $this->db->prepare('SELECT  
cliente.tbtbclienteid,
cliente.tbclienteusuario,
correo.tbcorreoatributo,
telefono.tbtelefonoatributo,
direccion.tbdireccionprovincia,
direccion.tbdireccioncanton,
direccion.tbdirecciondistricto,
direccion.tbdireccionotrassenas,
banco.tbclientedatosbancarionombrebanco,
banco.tbclientedatosbancarionumerocuenta
FROM bdtecnotienda.tbcliente cliente
join bdtecnotienda.tbcorreo correo on correo.tbtbclienteid=cliente.tbclienteusuario 
join bdtecnotienda.tbtelefono telefono on telefono.tbtbclienteid=cliente.tbclienteusuario 
join bdtecnotienda.tbdireccion direccion on direccion.tbtbclienteid=cliente.tbclienteusuario
join bdtecnotienda.tbclientedatobancario banco on banco.tbtbclienteid=cliente.tbclienteusuario
where cliente.tbclienteusuario = correo.tbtbclienteid and 
      cliente.tbclienteusuario = telefono.tbtbclienteid and 
      cliente.tbclienteusuario = direccion.tbtbclienteid and 
      cliente.tbclienteusuario = banco.tbtbclienteid and
      cliente.tbclienteactivo = 0;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function quitarCliente($clienteid) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbcliente set tbclienteactivo=1 where tbtbclienteid = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById($clienteid) {
        $consulta = $this->db->prepare('SELECT 
cliente.tbtbclienteid,
cliente.tbclienteusuario,
correo.tbcorreoatributo,
correo.tbcorreoid 
FROM bdtecnotienda.tbcliente cliente 
join bdtecnotienda.tbcorreo correo on correo.tbtbclienteid=cliente.tbclienteusuario 
where cliente.tbtbclienteid= "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById2($clienteid) {
        $consulta = $this->db->prepare('SELECT  
cliente.tbtbclienteid,
cliente.tbclienteusuario,
telefono.tbtelefonoatributo,
telefono.tbtelefononid
FROM bdtecnotienda.tbcliente cliente
join bdtecnotienda.tbtelefono telefono on telefono.tbtbclienteid=cliente.tbclienteusuario 
where cliente.tbtbclienteid = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }


    public function actualizarTelefono($correoid, $valor) {
        $consulta = $this->db->prepare('update  tbtelefono set tbtelefonoatributo= "' . $valor . '" where tbtelefononid= "' . $correoid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function actualizarCorreo($correoid, $valor) {
        $consulta = $this->db->prepare('update  tbcorreo set tbcorreoatributo="' . $valor . '" where tbcorreoid= "' . $correoid . '"');
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

        if ($del->execute()) {
            if ($count['total'] > 0) {

                return 1;
            } else {

                return 0;
            }
        } else {
            return -1;
        }
    }


}

// fin clase
