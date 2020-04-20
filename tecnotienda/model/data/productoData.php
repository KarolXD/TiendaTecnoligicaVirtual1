<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productoData
 *
 * @author Karol
 */
class productoData {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrarProducto($nombre, $precio, $cantidad, $rutaImg, $descripcion, $subcategoria) {
        $data = array($nombre, $precio, $cantidad, $rutaImg, $descripcion, $subcategoria);
        $consulta = $this->db->prepare('INSERT INTO tbproducto(tbproductonombre,tbproductoprecio, '
                . 'tbproductocantidad, tbproductoimagen,tbproductodescripcion,tbproductosubcategoriaid)'
                . ' VALUES(?,?,?,?,?,?)');

        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarProducto($ruta, $nombre, $precio, $cantidad, $descripcion,$subcategoria, $idproducto) {
        $data = array($ruta, $nombre, $precio, $cantidad, $descripcion, $subcategoria, $idproducto);
     $consulta = $this->db->prepare('update tbproducto set  tbproductoimagen=? ,tbproductonombre=?,tbproductoprecio=?,tbproductocantidad=?, tbproductodescripcion=?,tbproductosubcategoriaid=? where tbproductoid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function filtrarProductoById($idproducto) {
        $consulta = $this->db->prepare('select p.tbproductoid,p.tbproductonombre,p.tbproductoimagen, p.tbproductoprecio,p.tbproductodescripcion,p.tbproductocantidad ,s.tbsubcategorianombre from  tbproducto p join tbsubcategoria s where p.tbproductosubcategoriaid=s.tbsubcategoriaid and p.tbproductoid="' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarProductos() {
        $consulta = $this->db->prepare('select p.tbproductoid,p.tbproductonombre,p.tbproductoimagen, p.tbproductoprecio,p.tbproductodescripcion,p.tbproductocantidad ,s.tbsubcategorianombre from  tbproducto p join tbsubcategoria s where p.tbproductosubcategoriaid=s.tbsubcategoriaid');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

    public function eliminacionProducto($idproducto) {
        $consulta = $this->db->prepare('DELETE FROM tbproducto WHERE tbproductoid = "' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
      
    
    public function eliminarProducto($idproducto) {
        $sql = 'SELECT COUNT(tbproductosubcategoriaid) as total FROM tbproducto where tbproductoid="' . $idproducto . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {
            $this->eliminacionProducto($idproducto);
            echo '<div class="alert alert-primary" role="alert"> Registro eliminado—!</div>';
            print('<div class="alert alert-primary" role="alert"> Producto Eliminadot!</div>');
        } else if ($count['total'] > 0) {
            echo '<div class="alert alert-danger" role="alert"> No es posible eliminar este registro.Lo siento—!</div>';
            echo '<script>  alert("Lo sentimos, no podemos borrar este registro.En una Producto existe la subCategoria que deseas borrar' . $count['total'] . '");</script>';
        } else if ($count['total'] == null) {
            echo '<script>  alert("Datos nulos");</script>';
        }
        $del->CloseCursor();
        return $del;
    }

}
