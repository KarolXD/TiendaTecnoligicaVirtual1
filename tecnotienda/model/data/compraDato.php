<?php

class compraDato {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }
   
     
                public function productovendidoBydia() {
        $consulta = $this->db->prepare(' select tbproductovendidofecha,tbproductovendidonombre,
   tbproductovendidocantidad,DAYNAME(tbproductovendidofecha) from tbproductovendido
   where tbproductovendidocantidad>5
    ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
               public function productovendidoBymes() {
        $consulta = $this->db->prepare('   select tbproductovendidofecha,tbproductovendidonombre,
   tbproductovendidocantidad,MONTHNAME(tbproductovendidofecha) from tbproductovendido
   where tbproductovendidocantidad>5
    ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
               public function productovendidoByquincena() {
        $consulta = $this->db->prepare('   select tbproductovendidofecha,tbproductovendidonombre,
   tbproductovendidocantidad,MONTHNAME(tbproductovendidofecha) from tbproductovendido
   where tbproductovendidocantidad>5
    ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
            
      public function morosidadmensual() {
        $consulta = $this->db->prepare(' select sum(tbclientemorosodeuda),sum(tbclientemontofactura) from tbclientemoroso;
    ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    public function morosidadByCategogia() {
        $consulta = $this->db->prepare('   select c.tbtbclienteid, c.tbclientecategorizacionnombre,
    m.tbclientemorosodeuda , m.tbclientemorosofecha, m.tbventaporcobrarid from tbclientecategorizacion c
    join tbclientemoroso m
    on c.tbtbclienteid=m.tbclienteid where  c.tbtbclienteid=m.tbclienteid
    ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    public function obtenerCxc() {
        $consulta = $this->db->prepare('select * from tbclientedetalleabono');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarCompras($usuario) {
        $consulta = $this->db->prepare('

select tbclientecompraid,tbclienteid,tbcompradetalle,tbventacontado,tbclientecomprafechacompra from tbclientecompra where tbclienteid="' . $usuario . '";');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerMorosos() {
        $consulta = $this->db->prepare('
select * from tbclientemoroso;');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
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

    public function productoVendido($productoid, $clienteid, $productovendidocantidad) {
        $consulta = $this->db->prepare('
      select @id:=p.tbproductoid, @subca:=p.tbsubcategoriaid,  @nombre:=c.tbproductocaracteristicastitulo,
 @precio:=pp.tbproductoprecioventa from 
tbproducto p join tbproductocaracteristica c on p.tbproductoid=c.tbproductoid
join tbproductoprecio pp on pp.tbproductoid=p.tbproductoid
where p.tbproductoid="' . $productoid . '";   
    
insert into tbproductovendido (tbclienteid,tbproductoid,tbsubcategoriaid,tbproductovendidocantidad,
tbproductovendidonombre,tbproductovendidonombreprecio,
tbproductovendidofecha,tbproductocancelado)
values("' . $clienteid . '", @id,@subca, "' . $productovendidocantidad . '",@nombre,(@precio*"' . $productovendidocantidad . '"), now(),0 );');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();

            return 0;
        } else {
            return 1;
        }
    }

    //fatlta afinar
    public function borrarproductoVendido($idCarritoC) {
        $consulta = $this->db->prepare('  select @idproducto:= tbproductoid    from tbclientecarritocompra where tbcarritocompraid="' . $idCarritoC . '";
	select @id:=tbproductovendidoid from tbproductovendido where tbproductoid=@idproducto; 
		delete from tbproductovendido where tbproductovendidoid=@id; ');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();

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

    public function adm_listarcxc() {
        $consulta = $this->db->prepare('select v.tbclienteid, v.tbcompradetalle,v.tbclientecomprafechacompra
from tbclientecompra v
 join tbventaporcobrar vc on v.tbproductoid=vc.tbproductoid
where v.tbproductoid=vc.tbproductoid  and v.tbventaporcobrar=1
');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function adm_listarmenosvendido() {
        $consulta = $this->db->prepare('select v.tbproductovendidonombre
, s.tbsubcategorianombre,v.tbproductovendidocantidad

from tbproductovendido v
join tbsubcategoria  s on
s.tbsubcategoriaid=v.tbsubcategoriaid
 where tbproductocancelado=0 and  tbproductovendidocantidad<5 and s.tbsubcategoriaid=v.tbsubcategoriaid
  and tbsubcategorianombre<>"Laptops"
group by v.tbproductovendidonombre');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function adm_listarmasvistos() {
        $consulta = $this->db->prepare('select v.tbproductovendidonombre
, s.tbsubcategorianombre

from tbproductovendido v
join tbsubcategoria  s on
s.tbsubcategoriaid=v.tbsubcategoriaid
 where tbproductocancelado=0 and  tbproductovendidocantidad>=5 and s.tbsubcategoriaid=v.tbsubcategoriaid
group by v.tbproductovendidonombre ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function adm_listarcredito() {
        $consulta = $this->db->prepare('select v.tbclienteid,v.tbproductovendidonombre,v.tbproductovendidocantidad,v.tbproductovendidonombreprecio 
, s.tbsubcategorianombre

from tbproductovendido v
join tbsubcategoria  s on
s.tbsubcategoriaid=v.tbsubcategoriaid
 where tbproductocancelado=0 and  tbproductovendidocantidad>=5 and s.tbsubcategoriaid=v.tbsubcategoriaid
order by tbproductovendidocantidad desc');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarDetalleAbono($clienteid) {
        $consulta = $this->db->prepare('select  d.tbclienteabonoid, d.tbclienteid,d.tbcantidadpagada,d.tbfechaAbono,d.tbtotaldeuda,
d.tbtotalfactura,d.tbfechalimite, c.tbproductocaracteristicastitulo
 from tbclientedetalleabono  d join tbproductocaracteristica c
on d.tbproductoid=c.tbproductoid where d.tbclienteid="' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function registrarPago($idcliente, $detallecompra, $ventaporcobrar, $ventacontado, $tbproductoid) {
        $data = array($idcliente, $detallecompra, $ventaporcobrar, $ventacontado, $tbproductoid);
        $consulta = $this->db->prepare('INSERT INTO `bdtecnotienda`.`tbclientecompra`
(`tbclienteid`,
`tbcompradetalle`,
`tbventaporcobrar`,
`tbventacontado`, tbclientecomprafechacompra,tbproductoid)
        VALUES (?,?,?,?,now(),?);');
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

    public function modificarventaporcobrar($idcliente, $tbcantidadpagada, $tbtotaldeuda, $ventacobrarid) {
        $data = array($idcliente, $tbcantidadpagada, $tbtotaldeuda, $ventacobrarid);
        $consulta = $this->db->prepare('update  `bdtecnotienda`.`tbventaporcobrar`
                                       set  `tbclienteid`=?,
                                        `tbcantidadpagada` =?,
                                        `tbfechaAbono` =now(),
                                        `tbtotaldeuda` =? where tbventacobrarid=?
                                      
                                     
                                  ');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function registrarventaporcobrar($idcliente, $tbcantidadpagada, $tbtotaldeuda, $tbtotalfactura, $fechalimite, $tbproductoid) {
        $data = array($idcliente, $tbcantidadpagada, $tbtotaldeuda, $tbtotalfactura, $fechalimite, $tbproductoid);
        $consulta = $this->db->prepare('INSERT INTO `bdtecnotienda`.`tbventaporcobrar`
                                        (`tbclienteid`,
                                        `tbcantidadpagada`,
                                        `tbfechaAbono`,
                                        `tbtotaldeuda`,
                                        `tbtotalfactura`,
                                        `tbfechalimite`,
                                       `tbestadomoroso`,tbproductoid)
                                        VALUES(?,?,now(),?,?,?,0,?);');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 0;
        } else {
            return 1;
        }
    }

    public function listarVentaCobrar($clienteid) {
        $consulta = $this->db->prepare('SELECT *
        FROM `bdtecnotienda`.`tbventaporcobrar` where `tbventaporcobrar`.`tbclienteid` = "' . $clienteid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
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

    public function validarSiPagado($clienteid) {
        $consulta = $this->db->prepare('SELECT count(*) as total
        FROM `bdtecnotienda`.`tbventaporcobrar` where `tbventaporcobrar`.`tbclienteid` = "' . $clienteid . '"');

        if ($consulta->execute()) {
            $count = $consulta->fetch();
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

?>
