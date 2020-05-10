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


    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrarProveedor($usuario, $contrasenia, $empresa, $descrip, $estado) {

        $sql = 'SELECT COUNT(*) as total FROM tbproveedor where tbproveedorusuario="' . $usuario . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();

        if ($del->execute()) {
            if ($count['total'] > 0) {//si es mayor a 1 NO INGRESE
                return 0;
            } else {///ingresese
                $data = array($usuario, $contrasenia, $empresa, $descrip, $estado);
                $consulta = $this->db->prepare('insert into tbproveedor(tbproveedorusuario,tbproveedorcontrasena,tbempresa,tbdescripcion,tbproveedorestado) values (?,?,?,?,?)');
                $consulta->execute($data);
                echo $consulta->errorInfo()[2];
                return 1;
            }
        } else {
            return -1;
        }
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

    public function listarDatosProveedor() {
        $consulta = $this->db->prepare('select 
proveedor.tbproveedorid,
proveedor.tbproveedorusuario,
proveedor.tbempresa,
proveedor.tbdescripcion,
correo.tbcorreoatributo,
telefono.tbtelefonoatributo
from tbproveedor proveedor
join tbcorreo correo on correo.tbtbclienteid=proveedor.tbproveedorusuario 
join tbtelefono telefono on telefono.tbtbclienteid=proveedor.tbproveedorusuario
where 
proveedor.tbproveedorusuario = correo.tbtbclienteid and 
proveedor.tbproveedorusuario = telefono.tbtbclienteid and 
proveedor.tbproveedorestado = 0;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function quitarCliente($clienteid) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbproveedor set tbproveedorestado=1 where tbproveedorid = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById($clienteid) {
        $consulta = $this->db->prepare('SELECT cliente.tbproveedorid,
cliente.tbproveedorusuario,
correo.tbcorreoatributo,
correo.tbcorreoid
FROM tbproveedor cliente 
join bdtecnotienda.tbcorreo correo on correo.tbtbclienteid=cliente.tbproveedorusuario 
where cliente.tbproveedorid = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById2($clienteid) {
        $consulta = $this->db->prepare('SELECT  
 cliente.tbproveedorid,
cliente.tbproveedorusuario,
telefono.tbtelefonoatributo,
telefono.tbtelefononid
FROM bdtecnotienda.tbproveedor cliente
join bdtecnotienda.tbtelefono telefono on telefono.tbtbclienteid=cliente.tbproveedorusuario 
where cliente.tbproveedorid = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtarClienteById3($clienteid) {
        $consulta = $this->db->prepare('select 
tbproveedorid,
 tbproveedorusuario,
 tbdescripcion 
 from tbproveedor where tbproveedorid="' . $clienteid . '"');
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

    public function actualizarDetalle($correoid, $valor) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbproveedor set tbdescripcion="' . $valor . '" where tbproveedorusuario= "' . $correoid . '"');
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
