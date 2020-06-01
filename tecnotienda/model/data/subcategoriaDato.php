<?php

class subcategoriaDato {

    //put your code here
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

      public function obtenerCriterios($subcategoriaid) {
   $this->registroCriteriosClicks($_SESSION["usuario"], 0, 0, 0,  1, 0, 1);
  $consulta = $this->db->prepare('SELECT tbproductocaracteristica1id, tbproductocaracteristica1criterio,tbproductocaracteristica1titulo from tbproducto p join temporalArticulos t
on p.tbproductoid =t.tbproductoid where  p.tbproductoid =t.tbproductoid
and p.tbsubcategoriaid= "' . $subcategoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    
     public function obtenerValores($criterioid,$subcategoriaid) { 
  $consulta = $this->db->prepare('SELECT tbproductocaracteristica1id, tbproductocaracteristica1valor from tbproducto p join temporalArticulos t
on p.tbproductoid =t.tbproductoid where  p.tbproductoid =t.tbproductoid
and p.tbsubcategoriaid="' . $subcategoriaid . '"  and tbproductocaracteristica1id=  "' . $criterioid . '" ');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    public function registrarSubCategorias($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha) {
        $sql = 'SELECT COUNT(*) as total FROM tbsubcategoria where tbsubcategorianombre="' . $subcategorianombre . '"';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
              $count = $del->fetch();
            if ($count['total'] > 0) {
                return 0;
            } else {
                $data = array($subcategorianombre, $categoriaid, $subcategoriadescripcion, $subcategoriafecha, 0);
                $consulta = $this->db->prepare('select  @usuarioid:=tbusuarioid from tbusuario where tbusuarionombre="' . $usuarioid . '";   INSERT INTO tbsubcategoria (tbsubcategorianombre,tbcategoriaid,tbsubcategoriadescripcion,tbusuarioid,tbsubcategoriafecha,tbsubcategoriaestado ) '
                        . ' VALUES(?,?,?,@usuarioid,?,?)');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        return -1;
    }

    public function modificarSubCategorias($subcategorianombre, $categoriaid, $subcategoriadescripcion, $usuarioid, $subcategoriafecha, $subcategoriaid) {
        $data = array($subcategorianombre, $categoriaid, $subcategoriadescripcion, $subcategoriafecha, $subcategoriaid);
        $consulta = $this->db->prepare('select  @usuarioid:=tbusuarioid from tbusuario where tbusuarionombre="' . $usuarioid . '";  update tbsubcategoria set tbsubcategorianombre=? ,tbcategoriaid=?,tbsubcategoriadescripcion=?, tbusuarioid=@usuarioid, tbsubcategoriafecha=? where tbsubcategoriaid=? ');

        if ($consulta->execute($data)) {
            $consulta->errorInfo()[2];
            return 1;
        } else {
            return -1;
        }
    }


    public function eliminarSubCategoria($subcategoriaid) {
        $consulta = $this->db->prepare('update   tbsubcategoria set tbsubcategoriaestado=1 WHERE tbsubcategoriaid = "' . $subcategoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function eliminacionSubCategoria($subcategoriaid) {
        $sql = 'SELECT COUNT(*) as total FROM tbproducto where tbsubcategoriaid="' . $subcategoriaid . '"  and tbproductoactivo=0 ';
        $del = $this->db->prepare($sql);
  
     
        if ($del->execute()) {
               $count = $del->fetch();
            if ($count['total'] == 0) {
                $this->eliminarSubCategoria($subcategoriaid);
                return 1;
            } else if ($count['total'] > 0) {
                return 0;
            }$del->CloseCursor();
        } else {
            return -1;   
        }

    }

    public function filtrarSubCategoriaById($subcategoriaid) {
        $consulta = $this->db->prepare('select s.tbsubcategoriaid,c.tbcategorianombre,s.tbsubcategorianombre,s.tbsubcategoriadescripcion,
            s.tbusuarioid,s.tbsubcategoriafecha, s.tbcategoriaid
 from tbsubcategoria s join tbcategoria c on s.tbcategoriaid=c.tbcategoriaid where s.tbcategoriaid=c.tbcategoriaid and   s.tbsubcategoriaid="' . $subcategoriaid . '" ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listarSubCategorias() {
        $consulta = $this->db->prepare('
select s.tbsubcategoriaid,
c.tbcategorianombre,
u.tbusuarionombre,
s.tbsubcategorianombre,
s.tbsubcategoriadescripcion,
s.tbsubcategoriafecha
 from tbsubcategoria s 
 join tbcategoria c on s.tbcategoriaid=c.tbcategoriaid 
 join tbusuario u on s.tbusuarioid=u.tbusuarioid
 where s.tbcategoriaid=c.tbcategoriaid
 and s.tbusuarioid=u.tbusuarioid and tbsubcategoriaestado=0');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function listaMenuSubcategoria($categoriaid) {
        $consulta = $this->db->prepare('
select  tbsubcategoriaid,tbsubcategorianombre  from  tbsubcategoria  where tbcategoriaid="' . $categoriaid . '" and tbsubcategoriaestado=0');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function registroSubcategoriaClicks($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
            $clicksofertaregular, $clicksofertanormalm) {
        $sql = 'select  @cantidad:= count(*) as total from tbclicksoferta  where tbclienteid="'.$clienteid.'";';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {//si ya existe un registro uptualizao
                $data = array( $clicksofertasubcategoria,$clienteid);
                $consulta = $this->db->prepare('update tbclicksoferta set '
                        . '  tbclicksofertasubcategoria=tbclicksofertasubcategoria+?, '
                       
                        . ' tbclicksfertafecha=now() '
                        . 'where tbclienteid=?; ');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 25;
                } else {
                    return -1;
                }
            } else {
                $data = array($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
                    $clicksofertaregular, $clicksofertanormalm);
                $consulta = $this->db->prepare('insert into tbclicksoferta(tbclienteid,tbclicksofertacategoria,tbclicksofertasubcategoria,tbclicksofertavalor,
tbclicksofertacriterio,tbclicksofertaregular,tbclicksofertanormalm,tbclicksfertafecha) 
values(?,?,?,?,?,?,?,now())');

                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        return -1;

    }
//fin
    
        public function registroCategoriaClicks($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
            $clicksofertaregular, $clicksofertanormalm) {
        $sql = 'select  @cantidad:= count(*) as total from tbclicksoferta  where tbclienteid="'.$clienteid.'";';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {//si ya existe un registro uptualizao
                $data = array($clicksofertacategoria ,$clienteid);
                $consulta = $this->db->prepare('update tbclicksoferta set  '
                        . '  tbclicksofertacategoria=tbclicksofertacategoria+?, '
                       
                        . ' tbclicksfertafecha=now() '
                        . 'where tbclienteid=?; ');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 25;
                } else {
                    return -1;
                }
            } else {
                $data = array($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
                    $clicksofertaregular, $clicksofertanormalm);
                $consulta = $this->db->prepare('insert into tbclicksoferta(tbclienteid,tbclicksofertacategoria,tbclicksofertasubcategoria,tbclicksofertavalor,
tbclicksofertacriterio,tbclicksofertaregular,tbclicksofertanormalm,tbclicksfertafecha) 
values(?,?,?,?,?,?,?,now())');

                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        return -1;

    }
    
    
      
        public function registroCriteriosClicks($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
            $clicksofertaregular, $clicksofertanormalm) {
        $sql = 'select  @cantidad:= count(*) as total from tbclicksoferta  where tbclienteid="'.$clienteid.'";';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {//si ya existe un registro uptualizao
                $data = array($clicksofertacriterio ,$clienteid);
                $consulta = $this->db->prepare('update tbclicksoferta set  '
                        . '  tbclicksofertacriterio=tbclicksofertacriterio+?, '
                       
                        . ' tbclicksfertafecha=now() '
                        . 'where tbclienteid=?; ');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 25;
                } else {
                    return -1;
                }
            } else {
                $data = array($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
                    $clicksofertaregular, $clicksofertanormalm);
                $consulta = $this->db->prepare('insert into tbclicksoferta(tbclienteid,tbclicksofertacategoria,tbclicksofertasubcategoria,tbclicksofertavalor,
tbclicksofertacriterio,tbclicksofertaregular,tbclicksofertanormalm,tbclicksfertafecha) 
values(?,?,?,?,?,?,?,now())');

                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        return -1;

    }
    
          public function registroValoresClicks($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
            $clicksofertaregular, $clicksofertanormalm) {
        $sql = 'select  @cantidad:= count(*) as total from tbclicksoferta  where tbclienteid="'.$clienteid.'";';
        $del = $this->db->prepare($sql);
        if ($del->execute()) {
            $count = $del->fetch();
            if ($count['total'] > 0) {//si ya existe un registro uptualizao
                $data = array($clicksofertavalor ,$clienteid);
                $consulta = $this->db->prepare('update tbclicksoferta set  '
                        . '  tbclicksofertavalor=tbclicksofertavalor+?, '
                       
                        . ' tbclicksfertafecha=now() '
                        . 'where tbclienteid=?; ');
                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 25;
                } else {
                    return -1;
                }
            } else {
                $data = array($clienteid, $clicksofertacategoria, $clicksofertasubcategoria, $clicksofertavalor, $clicksofertacriterio,
                    $clicksofertaregular, $clicksofertanormalm);
                $consulta = $this->db->prepare('insert into tbclicksoferta(tbclienteid,tbclicksofertacategoria,tbclicksofertasubcategoria,tbclicksofertavalor,
tbclicksofertacriterio,tbclicksofertaregular,tbclicksofertanormalm,tbclicksfertafecha) 
values(?,?,?,?,?,?,?,now())');

                if ($consulta->execute($data)) {
                    $consulta->errorInfo()[2];
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        return -1;

    }


    public function listadetalleSubcategoria($subcategoriaid) {
        $consulta = $this->db->prepare('select i.tbproductoimagenruta,c.tbproductocaracteristicastitulo, pr.tbproductoprecioventa,
s.tbsubcategorianombre,p.tbproductoid, s.tbcategoriaid
 from  tbsubcategoria s
join tbproducto p on  s.tbsubcategoriaid=p.tbsubcategoriaid
join tbproductoprecio pr on pr.tbproductoid=p.tbproductoid
join tbproductoimagen i on i.tbproductoid=p.tbproductoid
join tbproductocaracteristica c on c.tbproductoid=p.tbproductoid
where 
s.tbsubcategoriaid=p.tbsubcategoriaid and
pr.tbproductoid=p.tbproductoid and
i.tbproductoid=p.tbproductoid and
c.tbproductoid=p.tbproductoid and   p.tbproductoestado=0 and s.tbsubcategoriaid="' . $subcategoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    public function filtrardetalleSubcategoria($subcategoriaid, $idCarac) {
        $consulta = $this->db->prepare('select 
        i.tbproductocaracteristicafoto,
i.tbproductocaracteristica1titulo,
            pr.tbproductoprecioventa,
s.tbsubcategorianombre,p.tbproductoid, s.tbcategoriaid
 from  tbsubcategoria s
join tbproducto p on  s.tbsubcategoriaid=p.tbsubcategoriaid
join tbproductoprecio pr on pr.tbproductoid=p.tbproductoid
join temporalArticulos i on i.tbproductoid=p.tbproductoid
where 
s.tbsubcategoriaid=p.tbsubcategoriaid and
pr.tbproductoid=p.tbproductoid and
i.tbproductoid=p.tbproductoid and
     tbproductocaracteristica1id="'.$idCarac.'"  and  p.tbproductoestado=0 and s.tbsubcategoriaid="' . $subcategoriaid . '"');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    public function filtrardetalleSubcategoriaCliente($subcategoriaid,$idCarac) {
        $consulta = $this->db->prepare('select 
i.tbproductocaracteristicafoto,
i.tbproductocaracteristica1titulo,
pr.tbproductoprecioventa,
s.tbsubcategorianombre,
p.tbproductoid, s.tbcategoriaid from  tbsubcategoria s
join tbproducto p on  s.tbsubcategoriaid=p.tbsubcategoriaid
join tbproductoprecio pr on pr.tbproductoid=p.tbproductoid
join temporalArticulos i on i.tbproductoid=p.tbproductoid
where 
s.tbsubcategoriaid=p.tbsubcategoriaid and
pr.tbproductoid=p.tbproductoid and
i.tbproductoid=p.tbproductoid   and  p.tbproductoestado=0 and s.tbsubcategoriaid= "  ' .$subcategoriaid . ' "

and tbproductocaracteristica1id="'.$idCarac.'"     ');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }
    public function obtenerSubCategorias() {
        $consulta = $this->db->prepare('select  tbsubcategoriaid,tbsubcategorianombre  from  tbsubcategoria   where tbsubcategoriaestado=0 ');
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }

}
