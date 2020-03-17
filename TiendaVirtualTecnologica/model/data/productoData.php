<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productoData
 *
 * @author Maikel
 */
 class productoData {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function registrarProducto($nombre, $precio, $descripcion, $rutaImg, $cantidad, $categoria, $subcategoria) {
        $data = array($nombre, $precio, $cantidad, $rutaImg, $descripcion, $categoria, $subcategoria);

        $consulta = $this->db->prepare('INSERT INTO producto(nombreProducto,precio, '
                . 'cantidad, rutaImagen, descripcion,codigoCategoria,codigoSubCategoria)'
                . ' VALUES(?,?,?,?,?,?,?)');

        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

    public function modificarProducto( $ruta,$nombre, $precio, $descripcion, $cantidad, $categoria, $subcategoria, $codigo) {
        $data = array($ruta,$nombre, $precio, $cantidad, $descripcion, $categoria, $subcategoria,$codigo);

        $consulta = $this->db->prepare('update producto set  rutaImagen=? ,nombreProducto=?,precio=?,cantidad=?, descripcion=?,codigoCategoria=?,codigoSubCategoria=? where codigoProducto=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

     public function filtrarProductoById($codigo) {
       $consulta = $this->db->prepare('Select codigoProducto,nombreProducto,precio,descripcion,cantidad,codigoSubCategoria,codigoCategoria from producto where codigoProducto="'.$codigo.'" ');
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
        $consulta = $this->db->prepare('Select codigoProducto,nombreProducto, rutaImagen,precio,descripcion,cantidad,codigoSubCategoria,codigoCategoria from producto');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
    
    
    public function eliminarProducto($codigo) {
       $consulta = $this->db->prepare('DELETE FROM producto WHERE codigoProducto = "'.$codigo.'"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    

}
