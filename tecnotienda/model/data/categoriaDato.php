<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoriaDato
 *
 * @author Karo
 */
class categoriaDato {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrarCategoria($categorianombre, $usuarioid, $categoriadescripcion, $categoriafecha) {
        $sql = 'SELECT COUNT(*) as total FROM tbcategoria where tbcategorianombre="' . $categorianombre . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();

        if ($count['total'] > 0) {
            return 0;
        } else {

            $data = array($categorianombre, $usuarioid, $categoriadescripcion, 0, $categoriafecha);
            $consulta = $this->db->prepare('INSERT INTO tbcategoria (tbcategorianombre,tbusuarioid,tbcategoriadescripcion,tbcategoriaestado,tbcategoriafecha) '
                    . ' VALUES(?,?,?,?,?)');
            $consulta->execute($data);
            echo $consulta->errorInfo()[2];
            return 1;
        }
    }

    public function modificarCategorias($nombrecategoria, $usuarioid, $categoriadescripcion, $categoriafecha, $idcategoria) {
        $sql = 'SELECT COUNT(*) as total FROM tbcategoria where tbcategorianombre="' . $nombrecategoria . '" ';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
     //   echo $count['total'];
        if ($count['total'] >1) {
            echo '<script>  alert("Imposible modificarlo. Categoria existente");</script>';
        } else {
            $data = array($nombrecategoria, $usuarioid, $categoriadescripcion, $categoriafecha, $idcategoria);
            $consulta = $this->db->prepare('update tbcategoria set tbcategorianombre=?,tbusuarioid=?,tbcategoriadescripcion=?,tbcategoriafecha=? where tbcategoriaid=?');
            $consulta->execute($data);
            echo '<script>  alert("Se ha modificado");</script>';
        }
    }

    public function verificarModificarCategorias($nombrecategoria, $idcategoria) {
        $sql = 'SELECT COUNT(tbsubcategoriaid) as total FROM tbsubcategoria where tbcategoriaid="' . $idcategoria . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {// Si no existe alguna categoria que voy a modificar en la tabla SubCategoria.
            $this->modificarCategorias($nombrecategoria, $idcategoria);
        } else if ($count['total'] > 0) {// Si  existe alguna categoria que voy a modificar en la tabla SubCategoria.
            $this->modificarCategorias($nombrecategoria, $idcategoria);
            $consulta = $this->db->prepare('Update tbsubcategoria set tbcategoriaid= "' . $idcategoria . '" where tbcategoriaid="' . $idcategoria . '"');
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return $resultado;
        }
    }

    public function filtrarCategoriaById($categoriaid) {
        $consulta = $this->db->prepare('Select tbcategoriaid, tbcategorianombre,tbcategoriadescripcion,tbcategoriafecha,tbusuarioid  from tbcategoria where tbcategoriaid="' . $categoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCategorias() {
        $consulta = $this->db->prepare('Select tbcategoriaid,tbcategorianombre ,tbcategoriadescripcion, tbusuarioid,tbcategoriafecha from tbcategoria');
           $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
     public function obtenerCategorias() {
        $consulta = $this->db->prepare('Select tbcategoriaid,tbcategorianombre from tbcategoria');
           $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    

    public function verificarCategoria($categoriaid) {
        $sql = 'SELECT COUNT(tbsubcategoriaid) as total FROM tbsubcategoria where tbcategoriaid="' . $categoriaid . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {
            echo '<script>  alert("Es posible eliminarlo ' . $count['total'] . '");</script>';
            $this->eliminarCategoria($categoriaid);
            print('<div class="alert alert-primary" role="alert">  This is a primary alert—check it out!</div>');
        } else if ($count['total'] > 0) {
            echo '<div class="alert alert-primary" role="alert">  This is a primary alert—check it out!</div>';
            echo '<script>  alert("Lo sentimos, no podemos borrar este registro.En una SubCategoria Existe la caregoria que deseas borrar' . $count['total'] . '");</script>';
        } else if ($count['total'] == null) {
            echo '<script>  alert("Datos nulos");</script>';
        }
        $del->CloseCursor();
        return $del;
    }

    public function eliminarCategoria($categoriaid) {
        $consulta = $this->db->prepare('DELETE FROM tbcategoria WHERE tbcategoriaid = "' . $categoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

}
