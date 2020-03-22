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


        public function registrarProducto($nombre, $precio,$cantidad, $rutaImg,$descripcion, $categoria, $subcategoria) {
        $data = array($nombre, $precio,$cantidad, $rutaImg,$descripcion, $categoria, $subcategoria);

        $consulta = $this->db->prepare('INSERT INTO producto(nombreProducto,precio, '
                . 'cantidad, rutaImagen, descripcion,codigoCategoria,codigoSubCategoria)'
                . ' VALUES(?,?,?,?,?,?,?)');

        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function registrarCategorias($nombreCategoria) {
        $data = array($nombreCategoria);

        $consulta = $this->db->prepare('INSERT INTO categoria(nombreCategoria) '
                . ' VALUES(?)');

        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarCategorias($nombreCategoria,$codigoCategoria) {
        $data = array($nombreCategoria,$codigoCategoria);
        $consulta = $this->db->prepare('update categoria set nombreCategoria=? where codigoCategoria=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarProducto($ruta, $nombre, $precio, $descripcion, $cantidad, $categoria, $subcategoria, $codigo) {
        $data = array($ruta, $nombre, $precio, $cantidad, $descripcion, $categoria, $subcategoria, $codigo);
        $consulta = $this->db->prepare('update producto set  rutaImagen=? ,nombreProducto=?,precio=?,cantidad=?, descripcion=?,codigoCategoria=?,codigoSubCategoria=? where codigoProducto=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function filtrarProductoById($codigo) {
        $consulta = $this->db->prepare('Select codigoProducto,nombreProducto,precio,descripcion,cantidad,codigoSubCategoria,codigoCategoria from producto where codigoProducto="' . $codigo . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarCategoriaById($codigo) {
        $consulta = $this->db->prepare('Select codigoCategoria,nombreCategoria from categoria where codigoCategoria="' . $codigo . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCategorias() {
        $consulta = $this->db->prepare('Select codigoCategoria,nombreCategoria from categoria');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

    public function listarSubCategorias() {
        $consulta = $this->db->prepare('Select codigoSubCategoria,nombreSubCategoria from subcategoria');
        $consulta->execute();

        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

    public function listarProductos() {
        $consulta = $this->db->prepare('Select codigoProducto,nombreProducto, rutaImagen,precio,descripcion,cantidad,s.nombreSubCategoria,c.nombreCategoria from producto
 join categoria c join subCategoria s ');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

    public function eliminarProducto($codigo) {
        $consulta = $this->db->prepare('DELETE FROM producto WHERE codigoProducto = "' . $codigo . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
      public function eliminarCategoria($codigo) {
        $consulta = $this->db->prepare('DELETE FROM categoria WHERE codigoCategoria = "' . $codigo . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }


}
