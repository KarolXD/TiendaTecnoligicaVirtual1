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
public function listarDatosProveedorDetalle($clienteid) {
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
                                        proveedor.tbproveedorestado = 0 and
                                        tbproveedorid='. $clienteid . '');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
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
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        } else {
            return -1;
        }
    }

    public function registrarCorreo($clienteid, $valor, $valorInicial) {
        $data = array($clienteid, $valor, $valorInicial);
        $consulta = $this->db->prepare('insert into  tbcorreo (tbtbclienteid,tbcorreoatributo,tbcorreovalor)  values (?,?,?)');
        if ($consulta->execute($data)) {
            echo $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function registrarTelefono($clienteid, $valor, $valorInicial) {
        $data = array($clienteid, $valor, $valorInicial);
        $consulta = $this->db->prepare('insert into  tbtelefono (tbtbclienteid,tbtelefonoatributo,tbtelefonovalor)  values (?,?,?)');
        if ($consulta->execute($data)) {
            echo $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
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
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
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
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function actualizarCorreo($correoid, $valor) {
        $consulta = $this->db->prepare('update  tbcorreo set tbcorreoatributo="' . $valor . '" where tbcorreoid= "' . $correoid . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function actualizarDetalle($correoid, $valor) {
        $consulta = $this->db->prepare('update bdtecnotienda.tbproveedor set tbdescripcion="' . $valor . '" where tbproveedorusuario= "' . $correoid . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

}
