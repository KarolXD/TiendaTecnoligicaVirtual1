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

    public function loginUsuario($clienteid, $contra) {

        $sql = 'SELECT COUNT(*) as total FROM tbusuario where tbusuarionombre ="' . $clienteid . '" and tbusuariocontrasennia ="' . $contra . '"  and tbusuarioactivo=0 and tbusuariotipousuario=1';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();

        if ($del->execute()) {
            if ($count['total'] > 0) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

}
