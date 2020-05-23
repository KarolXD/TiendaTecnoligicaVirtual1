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
        $consulta = $this->db->prepare('SELECT carrito.tbproductoid,
            carrito.tbclientecarritocompracantidad, 
            precioproducto.tbproductoprecioventa,
            productocaracteristica.tbproductocaracteristicastitulo,
            carrito.tbcarritocompraid,
CONCAT(carrito.tbclientecarritocompracantidad*precioproducto.tbproductoprecioventa) AS SubTotal
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
        WHERE tbcarritocompraid="' . $productoid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarPago($clienteid) {
        $consulta = $this->db->prepare('SELECT
CONCAT("Cantidad: ",carrito.tbclientecarritocompracantidad, ", Titulo: ",caracteristica.tbproductocaracteristicastitulo, ", precio: " ,precio.tbproductoprecioventa, ", subTotal: ", carrito.tbclientecarritocompracantidad*precio.tbproductoprecioventa, ".") AS detalle
, carrito.tbclientecarritocompracantidad, precio.tbproductoprecioventa,
producto.tbproductoid
 FROM bdtecnotienda.tbcliente cliente 
join  bdtecnotienda.tbclientecarritocompra carrito on carrito.tbclienteid=cliente.tbclienteusuario 
join bdtecnotienda.tbproducto producto on producto.tbproductoid=carrito.tbproductoid 
join bdtecnotienda.tbproductocaracteristica caracteristica on caracteristica.tbproductoid=producto.tbproductoid
join bdtecnotienda.tbproductoprecio precio on precio.tbproductoid = producto.tbproductoid
where cliente.tbclienteusuario=carrito.tbclienteid and producto.tbproductoid = caracteristica.tbproductoid 
and cliente.tbclienteusuario =  "' . $clienteid . '";');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarPagoDatosCliente($clienteid) {
        $consulta = $this->db->prepare('SELECT 
cliente.tbclienteusuario,correo.tbcorreoatributo,banco.tbclientedatosbancarionumerocuenta
 FROM bdtecnotienda.tbcliente cliente
join bdtecnotienda.tbcorreo correo on correo.tbtbclienteid=cliente.tbclienteusuario
join bdtecnotienda.tbclientedatobancario banco on banco.tbtbclienteid=cliente.tbclienteusuario
where cliente.tbclienteusuario=correo.tbtbclienteid and cliente.tbclienteusuario=correo.tbtbclienteid
and cliente.tbclienteusuario= "' . $clienteid . '";');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarPagoAdmin() {
        $consulta = $this->db->prepare('SELECT 
* from tbclientecompra');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarDetallePagoAdmin($clientecompraid) {
        $consulta = $this->db->prepare('SELECT 
* from tbclientecompra where tbclientecompraid="' . $clientecompraid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function registrarPago($idcliente, $detallecompra, $ventaporcobrar, $ventacontado) {
        $data = array($idcliente, $detallecompra, $ventaporcobrar, $ventacontado);
        $consulta = $this->db->prepare('INSERT INTO `bdtecnotienda`.`tbclientecompra`
(`tbclienteid`,
`tbcompradetalle`,
`tbventaporcobrar`,
`tbventacontado`)
        VALUES (?,?,?,?);');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function actualizarCantiadadProductos($cantidad, $producto) {
        $consulta = $this->db->prepare('UPDATE `bdtecnotienda`.`tbproducto`
                                        SET
                                        tbproductocantidad = tbproductocantidad-"' . $cantidad . '" 
                                        WHERE tbproductoid = "' . $producto . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function eliminarDelCarrito($producto) {
        $consulta = $this->db->prepare('DELETE FROM `bdtecnotienda`.`tbclientecarritocompra`
WHERE tbproductoid="' . $producto . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function registrarventaporcobrar($idcliente, $tbcantidadpagada, $tbfechaAbono, $tbtotaldeuda, $tbtotalfactura, $fechalimite) {
        $data = array($idcliente, $tbcantidadpagada, $tbfechaAbono, $tbtotaldeuda, $tbtotalfactura, $fechalimite);
        $consulta = $this->db->prepare('INSERT INTO `bdtecnotienda`.`tbventaporcobrar`
                                        (`tbclienteid`,
                                        `tbcantidadpagada`,
                                        `tbfechaAbono`,
                                        `tbtotaldeuda`,
                                        `tbtotalfactura`,
                                        `tbfechalimite`)
                                        VALUES(?,?,?,?,?,?);');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function listarmontoaDeber($clientecompraid) {
        $consulta = $this->db->prepare('SELECT 
        `tbventaporcobrar`.`tbcantidadpagada`,
        `tbventaporcobrar`.`tbtotaldeuda`
        FROM `bdtecnotienda`.`tbventaporcobrar` where `tbventaporcobrar`.`tbclienteid` = "' . $clientecompraid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

}

?>
