<?php

class compraDato {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public function agregaralcarrito($producto, $usuario, $cantidad) {
        $data = array($producto, $usuario, $cantidad);
        $consulta = $this->db->prepare('INSERT INTO tbclientecarritocompra
        (tbproductoid,tbclienteid,tbclientecarritocompracantidad) 
        VALUES (?,?,?)');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function mostrardetallesProducto($idproducto) {
        $consulta = $this->db->prepare('select 
sub.tbsubcategorianombre,
precio.tbproductoprecioventa,
caracteristica.tbproductocartacteristicascriterio,
caracteristica.tbproductocaracteristicasvalor,
caracteristica.tbproductocaracteristicastitulo,imagen.tbproductoimagennombre,imagen.tbproductoimagenruta,
producto.tbproductoestado,sub.tbsubcategoriaid, producto.tbproductoid
from tbproducto producto join tbproductoprecio precio on producto.tbproductoid=precio.tbproductoid
join tbproductocaracteristica caracteristica on caracteristica.tbproductoid=precio.tbproductoid
join tbproductoimagen imagen on imagen.tbproductoid=producto.tbproductoid
join tbsubcategoria sub on sub.tbsubcategoriaid=producto.tbsubcategoriaid
where  producto.tbproductoid=precio.tbproductoid and caracteristica.tbproductoid=precio.tbproductoid
and  imagen.tbproductoid=producto.tbproductoid
 and  producto.tbproductoid=

"' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCarritoCompras($clienteid) {
        $consulta = $this->db->prepare('SELECT carrito.tbproductoid,carrito.tbclientecarritocompracantidad, precioproducto.tbproductoprecioventa,productocaracteristica.tbproductocaracteristicastitulo,carrito.tbcarritocompraid
            FROM bdtecnotienda.tbclientecarritocompra carrito 
join tbproductoprecio precioproducto on precioproducto.tbproductoid = carrito.tbproductoid
join tbproductocaracteristica productocaracteristica on productocaracteristica.tbproductoid  = carrito.tbproductoid
where tbclienteid = "' . $clienteid . '" and precioproducto.tbproductoid = carrito.tbproductoid;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function quitardelCarrito($productoid) {
        $consulta = $this->db->prepare('DELETE FROM `bdtecnotienda`.`tbclientecarritocompra`
        WHERE tbproductoid="' . $productoid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

}

?>
