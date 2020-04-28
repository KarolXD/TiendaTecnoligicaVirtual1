<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subcategoriaDato
 *
 * @author Karo
 */
class subcategoriaDato {

    //put your code here
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrarSubCategorias($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha) {

        $sql = 'SELECT COUNT(*) as total FROM tbsubcategoria where tbsubcategorianombre="' . $subcategorianombre . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] > 0) {
            echo '<script>  alert(" Sub Categoria EXISTENTE.Imposible registrarla");</script>';
        } else {
            $data = array($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha, 0);
            $consulta = $this->db->prepare('INSERT INTO tbsubcategoria (tbsubcategorianombre,tbcategoriaid,tbsubcategoriadescripcion,tbusuarioid,tbsubcategoriafecha,tbsubcategoriaestado ) '
                    . ' VALUES(?,?,?,?,?,?)');
            $consulta->execute($data);
            echo $consulta->errorInfo()[2];
            echo '<script>  alert(" Sub Categoria Registrada");</script>';
        }
    }

    public function modificarSubCategorias($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha, $subcategoriaid) {
        $sql = 'SELECT COUNT(*) as total FROM tbsubcategoria where tbsubcategorianombre="' . $subcategorianombre . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] >= 1) {

            echo '<script>  alert(" Sub Categoria Existente");</script>';
        } else {

            $data = array($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha, $subcategoriaid);
            $consulta = $this->db->prepare('update tbsubcategoria set tbsubcategorianombre=? ,tbcategoriaid=?,tbsubcategoriadescripcion=?,tbusuarioid=?,tbsubcategoriafecha=? where tbsubcategoriaid=? ');
            $consulta->execute($data);
            echo $consulta->errorInfo()[2];
            echo '<script>  alert(" Sub Categoria Modificada");</script>';
        }
    }

    public function modificiacionSubCategoria($subcategorianombre, $categorianombre, $subcategoriaid) {
        $sql = 'SELECT COUNT(*) as total FROM tbproducto where tbproductosubcategoriaid="' . $subcategoriaid . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {
            echo '<script>  alert("Es  Modificarlo ' . $count['total'] . '");</script>';
            $this->modificarSubCategorias($subcategorianombre, $categorianombre, $subcategoriaid);
            print('<div class="alert alert-warning" role="alert">  Se ha modificado Exitosamente!</div>');
        } else if ($count['total'] > 0) {
            echo ('<div class="alert alert-warning" role="alert">  Se ha modificado Exitosamente!</div>');
            $this->modificarSubCategorias($subcategorianombre, $categorianombre, $subcategoriaid);
            $consulta = $this->db->prepare('update  tbproducto  set tbproductosubcategoriaid = "' . $subcategoriaid . '"   where tbproductosubcategoriaid= "' . $subcategoriaid . '"');
            $consulta->execute();
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return $resultado;
        } else if ($count['total'] == null) {
            echo '<script>  alert("Datos nulos");</script>';
        }
        $del->CloseCursor();
        return $del;
    }

    public function eliminarSubCategoria($subcategoriaid) {

        $consulta = $this->db->prepare('DELETE FROM tbsubcategoria WHERE tbsubcategoriaid = "' . $subcategoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminacionSubCategoria($subcategoriaid) {
        $sql = 'SELECT COUNT(*) as total FROM tbproducto where tbproductosubcategoriaid="' . $subcategoriaid . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {

            $this->eliminarSubCategoria($subcategoriaid);
            echo '<div class="alert alert-primary" role="alert"> Registro eliminado—!</div>';
            print('<div class="alert alert-primary" role="alert"> Registro Eliminado!</div>');
        } else if ($count['total'] > 0) {
            echo '<div class="alert alert-danger" role="alert"> No es posible eliminar este registro.Lo siento—!</div>';
            echo '<script>  alert("Lo sentimos, no podemos borrar este registro.En un Producto existe la subCategoria que deseas borrar ");</script>';
        } else if ($count['total'] == null) {
            echo '<script>  alert("Datos nulos");</script>';
        }
        $del->CloseCursor();
        return $del;
    }

    public function filtrarSubCategoriaById($subcategoriaid) {
        $consulta = $this->db->prepare('select s.tbsubcategoriaid,c.tbcategorianombre,s.tbsubcategorianombre,s.tbsubcategoriadescripcion,
            s.tbusuarioid,s.tbsubcategoriafecha, s.tbcategoriaid
 from tbsubcategoria s join tbcategoria c on s.tbcategoriaid=c.tbcategoriaid where s.tbcategoriaid=c.tbcategoriaid and   s.tbsubcategoriaid="' . $subcategoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarSubCategorias() {
        $consulta = $this->db->prepare('
select s.tbsubcategoriaid,c.tbcategorianombre,s.tbusuarioid,s.tbsubcategorianombre,s.tbsubcategoriadescripcion,s.tbsubcategoriafecha
 from tbsubcategoria s join tbcategoria c on s.tbcategoriaid=c.tbcategoriaid where s.tbcategoriaid=c.tbcategoriaid');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerSubCategorias() {
        $consulta = $this->db->prepare('select  tbsubcategoriaid,tbsubcategorianombre  from  tbsubcategoria ');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

}
