<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDato
 *
 * @author Usuario
 */
class usuarioDato {

    //put your code here
    //put your code here
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function obtenerUsuarios($usuariotipousuario) {
        $consulta = $this->db->prepare('select tbusuarionombre from tbusuario where tbusuariotipousuario="' . $usuariotipousuario . '"');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

}
