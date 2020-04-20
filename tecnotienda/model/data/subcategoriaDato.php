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

    public function registrarSubCategorias($subcategorianombre, $categorianombre) {
          //echo '<script>  alert("Es  B ' . $categorianombre. '");</script>';
        $data = array($subcategorianombre, $categorianombre);
        $consulta = $this->db->prepare('INSERT INTO tbsubcategoria (tbsubcategorianombre,tbcategoriaid) '
                . ' VALUES(?,?)');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarSubCategorias($subcategorianombre, $categorianombre, $subcategoriaid) {
        $data = array($subcategorianombre, $categorianombre, $subcategoriaid);
        $consulta = $this->db->prepare('update tbsubcategoria set tbsubcategorianombre=? ,tbcategoriaid=? where tbsubcategoriaid=? ');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
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
            $consulta = $this->db->prepare('update  tbproducto  set tbproductosubcategoriaid = "' . $subcategoriaid . '"   where tbproductosubcategoriaid= "'.$subcategoriaid.'"');
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
        $consulta = $this->db->prepare('select  s.tbsubcategoriaid,s.tbsubcategorianombre,c.tbcategorianombre  from tbcategoria c join  tbsubcategoria s 
where c.tbcategoriaid=s.tbcategoriaid and  s.tbsubcategoriaid="' . $subcategoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarSubCategorias() {
        $consulta = $this->db->prepare('select  s.tbsubcategoriaid,s.tbsubcategorianombre,c.tbcategorianombre  from tbcategoria c join  tbsubcategoria s 
where c.tbcategoriaid=s.tbcategoriaid ');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

    public function obtenerSubCategorias() {
        $consulta = $this->db->prepare('select  tbsubcategoriaid,tbsubcategorianombre  from  tbsubcategoria  ');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

}
