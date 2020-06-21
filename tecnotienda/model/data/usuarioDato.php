<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDato
 *
 * @author Jahanel
 */
class usuarioDato {

    //put your code here
    //put your code here
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function obtenerMorosos() {
        $consulta = $this->db->prepare('
select * from tbclientemoroso;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function guardarUsuario($usuarionombre, $contrassenia, $activo) {
        $sql = 'SELECT COUNT(*) as total FROM tbusuario where tbusuarionombre ="' . $usuarionombre . '" ';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        if ($del->execute()) {
            if ($count['total'] > 0) {
                return 0;
            } else {
                $consulta = $this->db->prepare('insert into tbusuario(tbusuarionombre,tbusuariocontrasennia,tbusuariotipousuario,tbusuarioactivo) values("' . $usuarionombre . '","' . $contrassenia . '", 1,"' . $activo . '") ');
                if ($consulta->execute()) {
                    $resultado = $consulta->fetchAll();
                    $consulta->CloseCursor();
                    $resultado;
                    return 1;
                } else {
                    return -1;
                }
            }
        } else {
            return -1;
        }
    }

    public function obtenerUsuarios() {
        $consulta = $this->db->prepare('select tbusuarioid,tbusuarionombre,tbusuarioactivo from tbusuario where tbusuariotipousuario=1 and tbusuarioactivo=0 ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function estadoResultados() {
        $consulta = $this->db->prepare('SELECT sum(tbproductovendidonombreprecio),sum(tbcantidadpagada),sum(tbtotaldeuda) FROM bdtecnotienda.tbproductovendido join bdtecnotienda.tbventaporcobrar ; ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerCategorias() {
        $consulta = $this->db->prepare('select * from tbclientecategorizacion ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
    public function asientos() {
        $consulta = $this->db->prepare('SELECT tbproductovendidonombre,tbproductovendidofecha,tbproductovendidonombreprecio FROM bdtecnotienda.tbproductovendido; ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
        public function obtenerNombreProductos2() {
        $consulta = $this->db->prepare('SELECT tbproductocaracteristicastitulo FROM bdtecnotienda.tbproductocaracteristica');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminandoUsuario($usuarioid) {
        $consulta = $this->db->prepare('update tbusuario set tbusuarioactivo=1 where tbusuarioid="' . $usuarioid . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function eliminarUsuario($usuarioid) {
        $sql = '  SELECT COUNT(*) as total FROM tbcategoria where tbusuarioid ="' . $usuarioid . '"  and tbcategoriaestado=0 ';
        $del = $this->db->prepare($sql);
        $del->execute();
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {//existe un admin
                return 0;
            } else {
                $this->eliminandoUsuario($usuarioid);
            }
        } else {
            return -1;
        }
    }

    public function loginUsuario($clienteid, $contra) {
        $sql = 'SELECT COUNT(*) as total FROM tbusuario where tbusuarionombre ="' . $clienteid . '" and tbusuariocontrasennia ="' . $contra . '"  and tbusuarioactivo=0 and tbusuariotipousuario=1';
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
