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

     public function guardarProveedor($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid) {
          $data = array($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid);
     // $consulta = $this->db->prepare('insert into tbproveedor(tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa) values (12,"a","a",1,"a","a","a","a","a")');
        $consulta = $this->db->prepare('insert into tbproveedor(tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa,tbproveedorid) values (?,?,?,?,?,?,?,?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarProveedor($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid) {
        $data = array($proveedornombreempresa,$proveedorfax,$proveedorapartadopostal,$proveedorcorreo,$proveedorsitioweb,$proveedorpersonadecontacto,$proveedornumerotelefono,$proveedordireccionfisicaempresa,$proveedorid);
        $consulta = $this->db->prepare(' UPDATE tbproveedor  SET tbproveedornombreempresa=?,tbproveedorfax=?,tbproveedorapartadopostal=?,tbproveedorcorreo=?,tbproveedorsitioweb=?,tbproveedorpersonadecontacto=?,tbproveedornumerotelefono=?,tbproveedordireccionfisicaempresa=?  where tbproveedorid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function eliminarProveedor($proveedorid) {
        $consulta = $this->db->prepare('delete from tbproveedor where tbproveedorid= "' . $proveedorid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarProveedorById($proveedorid) {
        $consulta = $this->db->prepare('select tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa from tbproveedor where tbproveedorid="' . $proveedorid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarProveedor() {
        $consulta = $this->db->prepare('select tbproveedorid,tbproveedornombreempresa,tbproveedorfax,tbproveedorapartadopostal,tbproveedorcorreo,tbproveedorsitioweb,tbproveedorpersonadecontacto,tbproveedornumerotelefono,tbproveedordireccionfisicaempresa from tbproveedor');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

}
