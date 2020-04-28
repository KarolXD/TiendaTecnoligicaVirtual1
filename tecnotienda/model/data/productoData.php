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
    public function modificarProducto($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado,$productoid) {
        $data = array($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado,$productoid);
        $consulta = $this->db->prepare('update tbproducto set  tbproductocodigobarras=? ,tbproductocantidadgarantiasaplicadas=?,tbproductocantidaddevoluciones=?,tbproductosubcategoria=?, tbproductoestado=? where tbproductoid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }

        public function modificarProducto2($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado,$productoid) {
        $data = array($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productoestado,$productoid);
        $consulta = $this->db->prepare('update tbproducto set  tbproductocodigobarras=? ,tbproductocantidadgarantiasaplicadas=?,tbproductocantidaddevoluciones=?, tbproductoestado=? where tbproductoid=?');
        $consulta->execute($data);
        echo $consulta->errorInfo()[2];
    }
    public function registrarProducto($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado, $productoactiovo) {
        $sql = 'SELECT COUNT(*) as total FROM tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        if ($count['total'] > 0) {
            echo '<script>  alert("Código de barras ya existente");</script>';
            return 0;
        } else {
            $data = array($productoproductocodigobarras, $productocantidadgarantizada, $productocantidaddevuelto, $productosubcategoriaid, $productoestado,$productoactiovo);
            $consulta = $this->db->prepare('INSERT INTO tbproducto(tbproductocodigobarras,tbproductocantidadgarantiasaplicadas, '
                    . 'tbproductocantidaddevoluciones, tbproductosubcategoria,tbproductoestado,tbproductoactivo)'
                    . ' VALUES(?,?,?,?,?,?)');
            $consulta->execute($data);
            $consulta->errorInfo()[2];
              echo '<script>  alert("Registrado");</script>';
            return 1;
        }
    }

    public function registrarproductoimagen($productoproductocodigobarras, $tbproductoimagennombre, $tbproductoimagenruta) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductoimagen(tbproductoid,tbproductoimagennombre,tbproductoimagenruta) VALUES(@productoid,"' . $tbproductoimagennombre . '","' . $tbproductoimagenruta . '")');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function modificarproductoimagen($tbproductoimagennombre, $tbproductoimagenruta, $productoid) {
        $data = array($tbproductoimagennombre, $tbproductoimagenruta, $productoid);

        $consulta = $this->db->prepare('
      update  tbproductoimagen  set tbproductoimagennombre=?,tbproductoimagenruta=? where tbproductoid=?');
        $consulta->execute($data);
        $consulta->errorInfo()[2];
        echo '<script>  alert("Modificado");</script>';
        return 1;
    }
    
     public function modificarproductoimagen2($tbproductoimagennombre, $productoid) {
        $data = array($tbproductoimagennombre, $productoid);

        $consulta = $this->db->prepare('
      update  tbproductoimagen  set tbproductoimagennombre=? where tbproductoid=?');
        $consulta->execute($data);
        $consulta->errorInfo()[2];
        echo '<script>  alert("Modificado");</script>';
        return 1;
    }

    public function registrarproductoprecio($productoproductocodigobarras, $productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductoprecio(tbproductoid,tbproductopreciocompra,tbproductopreciocomprafecha,tbproductoprecioventa,tbproductoprecioventafecha,tbproductoprecioganancia) VALUES(@productoid,"' . $productopreciocompra . '","' . $productopreciofechacompra . '", "' . $productoprecioventa . '","' . $productopreciofechaventa . '","' . $productoprecioganacia . '")');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
     
 public function modificarproductoprecio($productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia,$idProducto) {
        $data = array($productopreciocompra, $productopreciofechacompra, $productoprecioventa, $productopreciofechaventa, $productoprecioganacia,$idProducto);

        $consulta = $this->db->prepare(' 
      update  tbproductoprecio set  tbproductopreciocompra=?,tbproductopreciocomprafecha=?,tbproductoprecioventa=?,tbproductoprecioventafecha=?,tbproductoprecioganancia=? where  tbproductoid=?' );
        $consulta->execute($data);
        $consulta->errorInfo()[2];
        echo '<script>  alert("Registrado");</script>';
        return 1;
    }

    public function registrarproductocaracteristicas($productoproductocodigobarras, $productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo) {
        $consulta = $this->db->prepare(' select  @productoid:=tbproductoid from tbproducto where tbproductocodigobarras="' . $productoproductocodigobarras . '";
      INSERT INTO tbproductocaracteristica(tbproductoid,tbproductocartacteristicascriterio,tbproductocaracteristicasvalor,tbproductocaracteristicastitulo) VALUES(@productoid,"' . $productocaracteristicacriterio . '","' . $productocaracteristicavalor . '", "' . $productocaracteristicatitulo . '")');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    

    public function modificarProductoCaracteristica($productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo,$productoid) {
        $data = array($productocaracteristicacriterio, $productocaracteristicavalor, $productocaracteristicatitulo, $productoid);
        $consulta = $this->db->prepare('
      update tbproductocaracteristica set tbproductocartacteristicascriterio=?,tbproductocaracteristicasvalor=?,tbproductocaracteristicastitulo=?  where tbproductoid=?');
        $consulta->execute($data);
        $consulta->errorInfo()[2];
        echo '<script>  alert("Modificado");</script>';
        return 1;
    }

    
    
    public function detallesProducto($idproducto) {
        $consulta = $this->db->prepare('select 
producto.tbproductocodigobarras,producto.tbproductocantidadgarantiasaplicadas,producto.tbproductocantidaddevoluciones,
sub.tbsubcategorianombre, precio.tbproductopreciocompra,precio.tbproductopreciocomprafecha,precio.tbproductoprecioventa,
precio.tbproductoprecioventafecha, precio.tbproductoprecioganancia,
caracteristica.tbproductocartacteristicascriterio, caracteristica.tbproductocaracteristicasvalor,
caracteristica.tbproductocaracteristicastitulo,imagen.tbproductoimagennombre,imagen.tbproductoimagenruta, producto.tbproductoestado
from tbproducto producto join tbproductoprecio precio on producto.tbproductoid=precio.tbproductoid
join tbproductocaracteristica caracteristica on caracteristica.tbproductoid=precio.tbproductoid
join tbproductoimagen imagen on imagen.tbproductoid=producto.tbproductoid
join tbsubcategoria sub on sub.tbsubcategoriaid=producto.tbproductosubcategoria
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
p.tbproductoestado, s.tbsubcategorianombre
 from tbproducto p join tbsubcategoria s on p.tbproductosubcategoria=s.tbsubcategoriaid 
 where p.tbproductosubcategoria=s.tbsubcategoriaid 
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
    public function filtrarProductoImagenById($idproducto){
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

    public function listarProductos() {
        $consulta = $this->db->prepare('select p.tbproductoid, p.tbproductocodigobarras, cat.tbcategorianombre,
s.tbsubcategorianombre, c.tbproductocaracteristicastitulo
from tbproducto p join tbproductoprecio pp on p.tbproductoid=pp.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
join tbproductoimagen i on i.tbproductoid=p.tbproductoid
join tbsubcategoria s on s.tbsubcategoriaid=p.tbproductosubcategoria
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where c.tbproductoid=p.tbproductoid and  i.tbproductoid=p.tbproductoid and s.tbsubcategoriaid=p.tbproductosubcategoria
and  p.tbproductoactivo=0 and cat.tbcategoriaid=s.tbcategoriaid');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrarBySubCategoria($subcategorianombre) {
        $consulta = $this->db->prepare('select p.tbproductoid, p.tbproductocodigobarras, cat.tbcategorianombre,
s.tbsubcategorianombre, c.tbproductocaracteristicastitulo
from tbproducto p join tbproductoprecio pp on p.tbproductoid=pp.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
join tbproductoimagen i on i.tbproductoid=p.tbproductoid
join tbsubcategoria s on s.tbsubcategoriaid=p.tbproductosubcategoria
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where c.tbproductoid=p.tbproductoid and  i.tbproductoid=p.tbproductoid and s.tbsubcategoriaid=p.tbproductosubcategoria
and  p.tbproductoactivo=0 and cat.tbcategoriaid=s.tbcategoriaid and  s.tbsubcategorianombre LIKE "' . $subcategorianombre . '" ');
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
join tbsubcategoria s on s.tbsubcategoriaid=p.tbproductosubcategoria
join tbcategoria cat   on cat.tbcategoriaid=s.tbcategoriaid
where c.tbproductoid=p.tbproductoid and  i.tbproductoid=p.tbproductoid and s.tbsubcategoriaid=p.tbproductosubcategoria
and  p.tbproductoactivo=0 and cat.tbcategoriaid=s.tbcategoriaid 
GROUP BY s.tbsubcategorianombre');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminacionProducto($idproducto) {
        $consulta = $this->db->prepare('DELETE FROM tbproducto WHERE tbproductoid = "' . $idproducto . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminarProducto($idproducto) {
        $sql = 'SELECT COUNT(tbproductosubcategoriaid) as total FROM tbproducto where tbproductoid="' . $idproducto . '"';
        $del = $this->db->prepare($sql);
        $del->execute();
        $count = $del->fetch();
        echo $count['total'];
        if ($count['total'] <= 0) {
            $this->eliminacionProducto($idproducto);
            echo '<div class="alert alert-primary" role="alert"> Registro eliminado—!</div>';
            print('<div class="alert alert-primary" role="alert"> Producto Eliminadot!</div>');
        } else if ($count['total'] > 0) {
            echo '<div class="alert alert-danger" role="alert"> No es posible eliminar este registro.Lo siento—!</div>';
            echo '<script>  alert("Lo sentimos, no podemos borrar este registro.Existe una SubCategoria asociada a este producto");</script>';
        } else if ($count['total'] == null) {
            echo '<script>  alert("Datos nulos");</script>';
        }
        $del->CloseCursor();
        return $del;
    }

}
