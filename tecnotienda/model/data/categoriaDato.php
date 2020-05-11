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
        if ($del->execute()) {
            if ($count['total'] > 0) {
                return 0;
            } else {
                $data = array($categorianombre, $categoriadescripcion, 0, $categoriafecha);
                $consulta = $this->db->prepare('select  @usuarioid:=tbusuarioid from tbusuario where tbusuarionombre="' . $usuarioid . '";  INSERT INTO tbcategoria (tbcategorianombre,tbusuarioid,tbcategoriadescripcion,tbcategoriaestado,tbcategoriafecha) '
                        . ' VALUES(?,@usuarioid,?,?,?)');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                }
            }
        } else {
            return -1;
        }
    }

    public function modificarCategorias($nombrecategoria, $categoriadescripcion, $categoriafecha, $idcategoria, $usuarioid) {
        $data = array($nombrecategoria, $categoriadescripcion, $categoriafecha, $idcategoria);
        $consulta = $this->db->prepare('select  @usuarioid:=tbusuarioid from tbusuario where tbusuarionombre="' . $usuarioid . '"; '
                . ' update tbcategoria set tbcategorianombre=?,tbcategoriadescripcion=?,tbcategoriafecha=?, tbusuarioid=@usuarioid where tbcategoriaid=?');
        if ($consulta->execute($data)) {
            return 1;
        } else {
            return -1;
        }
        
    }



    public function filtrarCategoriaById($categoriaid) {
        $consulta = $this->db->prepare('
Select tbcategoriaid, tbcategorianombre,tbcategoriadescripcion,tbcategoriafecha,u.tbusuarionombre  from tbcategoria c
join tbusuario u on c.tbusuarioid=u.tbusuarioid
 where  tbcategoriaestado=0 and tbcategoriaid="' . $categoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCategorias() {
        $consulta = $this->db->prepare('
Select tbcategoriaid,tbcategorianombre ,tbcategoriadescripcion, u.tbusuarionombre,tbcategoriafecha from tbcategoria
c join tbusuario u on c.tbusuarioid=u.tbusuarioid where c.tbusuarioid=u.tbusuarioid  and tbcategoriaestado=0 ');
           $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
     public function obtenerCategorias() {
        $consulta = $this->db->prepare('Select tbcategoriaid,tbcategorianombre from tbcategoria where tbcategoriaestado=0');
           $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
       public function obtenerNombreCategorias() {
        $consulta = $this->db->prepare('Select tbcategoriaid,tbcategorianombre from tbcategoria where tbcategoriaestado=0');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
        
    }
    
    
    public function obtenerSubNombreCategorias() {
        $consulta = $this->db->prepare('Select  tbsubcategorianombre from tbsubcategoria where tbcategoriaestado=0
');
       

        if ($consulta->execute()) {
              $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
               return 1;
        } else {
               return -1;
        }
    }

    public function verificarCategoria($categoriaid) {
        $sql = 'SELECT COUNT(*) as total FROM tbsubcategoria where tbcategoriaid="' . $categoriaid . '" and tbsubcategoriaestado=0';
        $del = $this->db->prepare($sql);
        
   
        if ($del->execute()) {
                 $count = $del->fetch();
            if ($count['total'] <= 0) {
             $this->eliminarCategoria($categoriaid);
                return 1;
            } else if ($count['total'] > 0) {
              return 0;
            }
      
        } else{
                  $del->CloseCursor();
            return -1;
        }
    }

    public function eliminarCategoria($categoriaid) {
        $consulta = $this->db->prepare('update  tbcategoria  set tbcategoriaestado=1 WHERE tbcategoriaid = "' . $categoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

}
