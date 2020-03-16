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


    public function registrarProducto($nombre, $precio, $descripcion, $rutaImg, $cantidad, $categoria,$subcategoria) {
        $data = array($nombre, $precio,$cantidad, $rutaImg, $descripcion, $categoria,$subcategoria);

        $consulta = $this->db->prepare('INSERT INTO producto(nombreProducto,precio, '
                . 'cantidad, rutaImagen, descripcion,codigoCategoria,codigoSubCategoria)'
                . ' VALUES(?,?,?,?,?,?,?)');

        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
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

}
