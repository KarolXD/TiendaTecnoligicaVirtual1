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

    public function registrarCategorias($categorianombre) {
        $data = array($categorianombre);
        $consulta = $this->db->prepare('INSERT INTO tbcategoria (tbcategorianombre) '
                . ' VALUES(?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarCategorias($nombrecategoria, $idcategoria) {
        $data = array($nombrecategoria, $idcategoria);
        $consulta = $this->db->prepare('update tbcategoria set tbcategorianombre=? where tbcategoriaid=?');
        $consulta->execute($data);

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
            $consulta = $this->db->prepare('Update tbsubcategoria set tbcategoriaid= "' . $idcategoria . '" where tbcategoriaid="'.$idcategoria.'"');
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return $resultado;
        }
    }

    public function filtrarCategoriaById($categoriaid) {
        $consulta = $this->db->prepare('Select tbcategoriaid, tbcategorianombre  from tbcategoria where tbcategoriaid="' . $categoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCategorias() {
        $consulta = $this->db->prepare('Select tbcategoriaid,tbcategorianombre from tbcategoria');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
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
