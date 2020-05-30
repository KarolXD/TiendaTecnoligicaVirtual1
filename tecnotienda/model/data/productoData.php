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

    public function actualizarGarantiasProducto() {
        
    }

    public function guardarGarantia($productoid, $cantidadGarantia) {
        $consulta = $this->db->prepare('INSERT INTO tbgarantia(tbproductoid,tbgarantiacantidad) VALUES(' . $productoid . ',' . $cantidadGarantia . ')');
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if ($consulta->execute()) {
            $consulta1 = $this->db->prepare('update tbproducto  set tbproductocantidadgarantiasaplicadas= ' . $cantidadGarantia . '  where tbproductocodigobarras=' . $productoid . ' ');
            $consulta1->execute();
            $resultado1 = $consulta1->fetchAll();

            if ($consulta1->execute()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
        $consulta->CloseCursor();
    }

    public function guardarDevolucion($productoid, $cantidadDevolucion) {
        $consulta = $this->db->prepare('INSERT INTO tbdevolucion(tbproductoid,tbdevolucioncantidad) VALUES(' . $productoid . ',' . $cantidadDevolucion . ')');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        if ($consulta->execute()) {
            $consulta1 = $this->db->prepare('update tbproducto  set tbproductocantidaddevoluciones= ' . $cantidadDevolucion . '  where tbproductocodigobarras=' . $productoid . ' ');
            $consulta1->execute();
            $resultado1 = $consulta1->fetchAll();
            if ($consulta1->execute()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
        $consulta->CloseCursor();
    }

    public function modificarProducto($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado, $productoid,$cantidad) {
        $data = array($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado, $productoid,$cantidad);
        $consulta = $this->db->prepare('update tbproducto set  tbproductocodigobarras=? ,tbproductocantidadgarantiasaplicadas=?,tbproductocantidaddevoluciones=?,tbsubcategoriaid=?, tbproductoestado=?, tbproductocantidad=?  where tbproductoid=?');
        if ($consulta->execute($data)) {
            echo $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function modificarProducto2($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado,$cantidad,$productoid) {
        $data = array($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado, $cantidad,$productoid);
        $consulta = $this->db->prepare('update tbproducto set  tbproductocodigobarras=? ,tbproductocantidadgarantiasaplicadas=?,tbproductocantidaddevoluciones=?, tbproductoestado=? , tbproductocantidad=?  where tbproductoid=?');
        if ($consulta->execute($data)) {
            echo $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function registrarProducto($productosubcategoriaid, $productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado, $productoactiovo,$cantidad) {
        $sql = 'SELECT COUNT(*) as total FROM tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '"';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {
                return 0;
            } else {
                $data = array($productosubcategoriaid, $productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado, $productoactiovo,$cantidad);
                $consulta = $this->db->prepare('INSERT INTO tbproducto(tbsubcategoriaid,tbproductocodigobarras,tbproductocantidadgarantiasaplicadas, '
                        . 'tbproductocantidaddevoluciones,tbproductoestado,tbproductoactivo,tbproductocantidad)'
                        . ' VALUES(?,?,?,?,?,?,?)');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        } else {
            return -1;
        }
    }

    public function registrarproductoimagen($productoproductocodigobarras, $productoimagennombre, $productoimagenruta, $productoimagenestado) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductoimagen(tbproductoid,tbproductoimagennombre,tbproductoimagenruta,tbproductoimagenestado) VALUES(@productoid,"' . $productoimagennombre . '","' . $productoimagenruta . '","' . $productoimagenestado . '")');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function modificarproductoimagen($productoimagennombre, $productoimagenruta, $productoid) {
        $data = array($productoimagennombre, $productoimagenruta, $productoid);

        $consulta = $this->db->prepare('
      update  tbproductoimagen  set tbproductoimagennombre=?,tbproductoimagenruta=? where tbproductoid=?');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function modificarproductoimagen2($productoimagennombre, $productoid) {
        $data = array($productoimagennombre, $productoid);
        $consulta = $this->db->prepare('
      update  tbproductoimagen  set tbproductoimagennombre=? where tbproductoid=?');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function registrarproductoprecio($productoproductocodigobarras, $productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductoprecio(tbproductoid,tbproductopreciocompra,tbproductopreciocomprafecha,tbproductoprecioventa,tbproductoprecioventafecha,tbproductoprecioganancia) VALUES(@productoid,"' . $productopreciocompra . '","' . $productopreciofechacompra . '", "' . $productoprecioventa . '","' . $productopreciofechaventa . '","' . $productoprecioganacia . '")');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function modificarproductoprecio($productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia, $idProducto) {
        $data = array($productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia, $idProducto);
        $consulta = $this->db->prepare(' 
      update  tbproductoprecio set  tbproductopreciocompra=?,tbproductopreciocomprafecha=?,tbproductoprecioventa=?,tbproductoprecioventafecha=?,tbproductoprecioganancia=? where  tbproductoid=?');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }
 public function registrarproductocaracteristicas1($productoproductocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductocaracteristica(tbproductoid,tbproductocartacteristicascriterio,tbproductocaracteristicasvalor,tbproductocaracteristicastitulo) VALUES(@productoid,"' . $productocaracteristicacriterio . '","' . $productocaracteristicavalor . '", "' . $productocaracteristicatitulo . '")');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }
    public function registrarproductocaracteristicas($productoproductocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo, $url) {
        $consulta = $this->db->prepare('  select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
    select @foto:=tbproductoimagenruta from tbproductoimagen where tbproductoid=@productoid;
      INSERT INTO temporalArticulos(tbproductoid,tbproductocaracteristica1criterio,tbproductocaracteristica1valor,tbproductocaracteristica1titulo,tbproductocaracteristicafoto) 
      VALUES(@productoid,"' . $productocaracteristicacriterio . '","' . $productocaracteristicavalor . '", "' . $productocaracteristicatitulo . '" ,  @foto )');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return -1;
        }
    }

    public function modificarProductoCaracteristica($productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo, $productoid) {
        $data = array($productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo, $productoid);
        $consulta = $this->db->prepare('
      update tbproductocaracteristica set tbproductocartacteristicascriterio=?,tbproductocaracteristicasvalor=?,tbproductocaracteristicastitulo=?  where tbproductoid=?');
        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }

    public function detallesProducto($idproducto) {
        $consulta = $this->db->prepare('select 
producto.tbproductocodigobarras,producto.tbproductocantidadgarantiasaplicadas,producto.tbproductocantidaddevoluciones,
sub.tbsubcategorianombre, precio.tbproductopreciocompra,precio.tbproductopreciocomprafecha,precio.tbproductoprecioventa,
precio.tbproductoprecioventafecha, precio.tbproductoprecioganancia,
caracteristica.tbproductocartacteristicascriterio, caracteristica.tbproductocaracteristicasvalor,
caracteristica.tbproductocaracteristicastitulo,imagen.tbproductoimagennombre,imagen.tbproductoimagenruta, producto.tbproductoestado,
producto.tbproductocantidad
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

    public function mostrardetallesProducto($idproducto) {
        $consulta = $this->db->prepare('select 

sub.tbsubcategorianombre,
precio.tbproductoprecioventa,
caracteristica.tbproductocartacteristicascriterio,
caracteristica.tbproductocaracteristicasvalor,
caracteristica.tbproductocaracteristicastitulo,
imagen.tbproductoimagennombre,
imagen.tbproductoimagenruta,
producto.tbproductoestado,
sub.tbsubcategoriaid,
producto.tbproductoid,
producto.tbproductocantidad


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

    public function filtrarProductoById($idproducto) {
        $consulta = $this->db->prepare('select  p.tbproductoid, p.tbproductocodigobarras,p.tbproductocantidadgarantiasaplicadas, p.tbproductocantidaddevoluciones,
p.tbproductoestado, s.tbsubcategorianombre, p.tbproductocantidad
 from tbproducto p join tbsubcategoria s on p.tbsubcategoriaid=s.tbsubcategoriaid 
 where p.tbsubcategoriaid=s.tbsubcategoriaid 
 and  p.tbproductoid="' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarProductoPrecioById($idproducto) {
        $consulta = $this->db->prepare('select tbproductoid, tbproductopreciocompra,tbproductopreciocomprafecha, tbproductoprecioventa ,tbproductoprecioventafecha ,tbproductoprecioganancia   from tbproductoprecio where tbproductoid="' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarProductoCaracteristicaById($idproducto) {
        $consulta = $this->db->prepare('select tbproductoid, tbproductocartacteristicascriterio,tbproductocaracteristicasvalor, tbproductocaracteristicastitulo   from tbproductocaracteristica where tbproductoid="' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarProductoImagenById($idproducto) {
        $consulta = $this->db->prepare('select tbproductoid, tbproductoimagennombre,tbproductoimagenruta   from  tbproductoimagen  where tbproductoid="' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerProductos() {
        $consulta = $this->db->prepare('select p.tbproductoid,p.tbproductonombre,p.tbproductoimagen, p.tbproductoprecio,p.tbproductodescripcion,p.tbproductocantidad ,s.tbsubcategorianombre from  tbproducto p join tbsubcategoria s where p.tbproductosubcategoriaid=s.tbsubcategoriaid');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

  
//lista
    public function listarProductos() {
        $consulta = $this->db->prepare('
select p.tbproductoid, p.tbproductocodigobarras, cat.tbcategorianombre,
s.tbsubcategorianombre, c.tbproductocaracteristicastitulo, pp.tbproductoprecioventa
from tbproducto p
join tbproductoprecio pp on p.tbproductoid=pp.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
join tbsubcategoria s on s.tbsubcategoriaid=p.tbsubcategoriaid
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where 
c.tbproductoid=p.tbproductoid 
and  
 s.tbsubcategoriaid=p.tbsubcategoriaid
and  p.tbproductoactivo=0
 and cat.tbcategoriaid=s.tbcategoriaid');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarBySubCategoria($subcategorianombre) {
        $consulta = $this->db->prepare('select p.tbproductoid, p.tbproductocodigobarras, cat.tbcategorianombre,
s.tbsubcategorianombre, c.tbproductocaracteristicastitulo,pp.tbproductoprecioventa 
from tbproducto p join tbproductoprecio pp on p.tbproductoid=pp.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
join tbsubcategoria s on s.tbsubcategoriaid=p.tbsubcategoriaid
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where c.tbproductoid=p.tbproductoid  and s.tbsubcategoriaid=p.tbsubcategoriaid
and  p.tbproductoactivo=0 and cat.tbcategoriaid=s.tbcategoriaid and  s.tbsubcategorianombre LIKE"' . $subcategorianombre . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function obtenerSubCategoriaProductos() {
        $consulta = $this->db->prepare('select 
s.tbsubcategorianombre
from tbproducto p join tbproductoprecio pp on p.tbproductoid=pp.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
join tbproductoimagen i on i.tbproductoid=p.tbproductoid
join tbsubcategoria s on s.tbsubcategoriaid=p.tbsubcategoriaid
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where c.tbproductoid=p.tbproductoid and  i.tbproductoid=p.tbproductoid and s.tbsubcategoriaid=p.tbsubcategoriaid
and  p.tbproductoactivo=0 and cat.tbcategoriaid=s.tbcategoriaid 
GROUP BY s.tbsubcategorianombre');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminarProducto($idproducto) {
        $consulta = $this->db->prepare('update   tbproducto set  tbproductoactivo=1 WHERE tbproductoid = "' . $idproducto . '"');
        if ($consulta->execute()) {
            $resultado = $consulta->fetchAll();
            $consulta->CloseCursor();
            return 1;
        } else {
            return 0;
        }
    }

}
