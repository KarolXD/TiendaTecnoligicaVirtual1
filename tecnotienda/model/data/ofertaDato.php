<?php

class ofertaDato {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function obtenerProducto() {
        $consulta = $this->db->prepare('SELECT tbproductoid,tbproductocaracteristica1titulo from temporalArticulos group by(tbproductoid);  ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminarProducto($id) {
        $consulta = $this->db->prepare('delete from tboferta where tbofertaid= "' . $id . ' "  ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerOferta() {
        $consulta = $this->db->prepare('SELECT * from tboferta;  ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function registrarOferta($precio, $codigoProducto, $porcentaje, $fechaIn, $fechaFin) {
        $data = array($precio, $codigoProducto, $porcentaje, $fechaIn, $fechaFin);
        $consulta = $this->db->prepare('INSERT INTO tboferta(tbofertaprecio,tbproductoid,tbofertadescuento,tbofertafechainicio,tbofertafechafin)
        VALUES (?,?,?,?,?);

        select  @precio:=tbproductoprecioventa from tbproductoprecio where tbproductoid="' . $codigoProducto . ' ";
       select @id:=tbofertaid from tboferta where tbproductoid=" ' . $codigoProducto . ' "; 
update tboferta set tbofertaprecio= (@precio/"' . $porcentaje . '") where  tbofertaid =@id;        
'
        );
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function modificarOferta($codigoProducto, $porcentaje, $fechaIn, $fechaFin, $codigoOferta) {
        $data = array($codigoProducto, $porcentaje, $fechaIn, $fechaFin, $codigoOferta);
        $consulta = $this->db->prepare('
select  @precio:=tbproductoprecioventa from tbproductoprecio where tbproductoid="' . $codigoProducto . ' ";            
update  tboferta  set tbproductoid=?,tbofertadescuento=?,tbofertafechainicio=?,tbofertafechafin=?,
tbofertaprecio=(@precio/"' . $porcentaje . '")
        where tbofertaid=?;
        


');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

}
