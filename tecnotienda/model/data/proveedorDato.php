<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proveedorDato
 *
 * @author Karol
 */
class proveedorDato {

    //put your code here

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
    
    
    public function registrarProveedor($usuario, $contrasenia, $estado) {
        $data = array($usuario, $contrasenia, $estado);
        $consulta = $this->db->prepare('insert into tbproveedor(tbproveedorusuario,tbproveedorcontrasena,tbproveedorestado) values (?,?,?)');
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

    public function listarDatosProveedor() {
        $consulta = $this->db->prepare('select proveedor.tbproveedorusuario,correo.tbcorreoatributo,telefono.tbtelefononumero
 from tbproveedor proveedor
join tbcorreo correo on correo.tbclienteusuario=proveedor.tbproveedorusuario 
join tbtelefono telefono on telefono.tbclienteusuario=proveedor.tbproveedorusuario
where proveedor.tbproveedorusuario = correo.tbclienteusuario and 
proveedor.tbproveedorusuario = telefono.tbclienteusuario and proveedor.tbproveedorestado = 0;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function quitarCliente($clienteid) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbproveedor set tbproveedorestado=1 where tbproveedorusuario = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById($clienteid) {
        $consulta = $this->db->prepare('SELECT cliente.tbproveedorusuario,correo.tbcorreoatributo,correo.tbcorreoid FROM tbproveedor cliente 
join bdtecnotienda.tbcorreo correo on correo.tbclienteusuario=cliente.tbproveedorusuario where cliente.tbproveedorusuario ="' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById2($clienteid) {
        $consulta = $this->db->prepare('SELECT  cliente.tbproveedorusuario,
		telefono.tbtelefononumero,
                telefono.tbtelefononid
                FROM bdtecnotienda.tbproveedor cliente
                join bdtecnotienda.tbtelefono telefono on telefono.tbclienteusuario=cliente.tbproveedorusuario 
                where cliente.tbproveedorusuario = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
//
//     public function guardarProveedor($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid) {
//          $data = array($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid);
//     // $consulta = $this->db->prepare('insert into tbproveedor(tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa) values (12,"a","a",1,"a","a","a","a","a")');
//        $consulta = $this->db->prepare('insert into tbproveedor(tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa,tbproveedorid) values (?,?,?,?,?,?,?,?,?)');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//    }
//
//    public function modificarProveedor($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid) {
//        $data = array($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid);
//        $consulta = $this->db->prepare(' UPDATE tbproveedor  SET tbproveedornombreempresa=?,tbproveedorfax=?,tbproveedorapartadopostal=?,tbproveedorcorreo=?,tbproveedorsitioweb=?,tbproveedorpersonadecontacto=?,tbproveedornumerotelefono=?,tbproveedordireccionfisicaempresa=?  where tbproveedorid=?');
//        $consulta->execute($data);
//        echo $consulta->errorInfo()[2];
//    }
//
//    public function eliminarProveedor($proveedorid) {
//        $consulta = $this->db->prepare('delete from tbproveedor where tbproveedorid= "' . $proveedorid . '"');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//
//    public function filtrarProveedorById($proveedorid) {
//        $consulta = $this->db->prepare('select tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa from tbproveedor where tbproveedorid="' . $proveedorid . '"');
//        $consulta->execute();
//        $resultado = $consulta->fetchAll();
//        $consulta->CloseCursor();
//        return $resultado;
//    }
//
//    public function listarProveedor() {
//        $consulta = $this->db->prepare('select tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa from tbproveedor');
//        $consulta->execute();
//        return $consulta->fetchALL(PDO::FETCH_ASSOC);
//    }

}
