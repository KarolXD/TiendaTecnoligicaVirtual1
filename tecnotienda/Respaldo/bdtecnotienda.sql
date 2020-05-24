create database bdtecnotienda;
use bdtecnotienda;
drop trigger trigggerMoroso; drop trigger trigggerRegistrarcc;
update  tbventaporcobrar set tbfechalimite='2020-05-23 22:38:34' where tbventacobrarid=1;
truncate table tbventaporcobrar;truncate table tbclientecompra; truncate table tbclientemoroso;
select * from tbventaporcobrar; select * from tbclientemoroso;
DELIMITER \\
create TRIGGER trigggerMoroso
AFTER update ON
tbventaporcobrar for each row
begin
if (new.tbfechalimite >now()) then 
if ((select count(*)  from tbclientemoroso where tbclienteid= new.tbclienteid)=0)then
insert into tbclientemoroso(tbclienteid,tbventaporcobrarid,tbclientemorosodeuda,tbclientemorosofecha)
 values(new.tbclienteid,new.tbventacobrarid,new.tbtotaldeuda,new.tbfechalimite);
 end if;
  else 
 delete from  tbclientemoroso where tbclienteid= new.tbclienteid;
 end if;
end \\

select @tbclientemorosoid:=tbclientemorosoid from tbclientemoroso where tbclienteid='KarolMG1996';
select  @tbclientemorosoid;

DELIMITER \\
create TRIGGER trigggerRegistrarcc
AFTER insert ON
tbclientemoroso for each row
begin

if ((select count(*) from tbclientemoroso where tbclienteid=new.tbclienteid)<=0) then /*2020-02-02  <  NO MOROSO*/
update tbventaporcobrar set tbestadomoroso=0  where tbclienteid=new.tbclienteid;
else
update tbventaporcobrar set tbestadomoroso=1 where tbclienteid=new.tbclienteid;
end if;
end \\

select * from tbventaporcobrar
create table tbclientemoroso(
tbclientemorosoid int auto_increment primary key,
tbclienteid varchar(40) not null,
tbventaporcobrarid int not null,
tbclientemorosodeuda double,
tbclientemorosofecha datetime
)

select * from tbventaporcobrar
'2020-08-24 00:00:00' < 02/23/2020
update tbventaporcobrar  set tbfechalimite='2020-03-24 20:10:10'  where tbventacobrarid=1
select * from proba


create table proba(
id int auto_increment,
nombre varchar(40),
PRIMARY KEY (id)
)

create table tbventaporcobrar
(
tbventacobrarid int auto_increment,
tbclienteid varchar(40),
tbcantidadpagada float,
tbfechaAbono datetime,
tbtotaldeuda float,
tbtotalfactura float,
tbfechalimite datetime,
PRIMARY KEY (tbventacobrarid)
)


create table tbusuario(
tbusuarioid  int auto_increment not null, 
tbusuarionombre varchar(50) not null,
tbusuariocontrasennia varchar(50) not null,
tbusuariotipousuario int not null,
tbusuarioactivo int not null,
CONSTRAINT PK_tbusuarioid PRIMARY KEY (tbusuarioid));

create table tbproveedor(
tbproveedorusuario varchar(40),
tbproveedorcontrasena varchar(40),
tbempresa varchar(40),
tbdescripcion varchar(40),
tbproveedorestado int,
PRIMARY KEY (tbproveedorusuario))

Create table tbcategoria(
tbcategoriaid int auto_increment not null,
tbusuarioid varchar(50) not null,
tbcategorianombre varchar(50) not null,
tbcategoriadescripcion varchar(50) not null,
tbcategoriaestado int not null,
tbcategoriafecha datetime not null,
CONSTRAINT PK_tbcategoria PRIMARY KEY (tbcategoriaid));

create table tbsubcategoria(
tbsubcategoriaid int auto_increment not null,
tbcategoriaid int  not null,
tbusuarioid varchar(50) not null,
tbsubcategorianombre varchar(50)  not null,
tbsubcategoriadescripcion varchar(50) not null,
tbsubcategoriaestado int not null,
tbsubcategoriafecha  datetime not null,
CONSTRAINT PK_tbsubcategoria PRIMARY KEY (tbsubcategoriaid));

/*Tabla producto*/
create table tbproducto(
tbproductoid int auto_increment not null,
tbsubcategoriaid int not null,
tbproductocodigobarras int  not null,
tbproductocantidadgarantiasaplicadas int  not null,
tbproductocantidaddevoluciones int  not null,
tbproductoestado varchar(50) not null,
tbproductoactivo int not null,
tbproductocantidad int not null,
CONSTRAINT PK_tbproductoid PRIMARY KEY (tbproductoid));


alter table tbclientecompra modify tbcompradetalle varchar(4000);

create table tbproductoimagen(
tbproductoimagenid int auto_increment not null,
tbproductoid int not null,
tbproductoimagennombre varchar(1000) not null,
tbproductoimagenruta varchar(1000) not null,
tbproductoimagenestado varchar(1000) not null,
CONSTRAINT PK_tbproductoimagen PRIMARY KEY (tbproductoimagenid));

create table tbproductocaracteristica(
tbproductocaracteristicaid int auto_increment not null,
tbproductoid int not null,
tbproductocartacteristicascriterio varchar(3000) not null,
tbproductocaracteristicasvalor varchar(3000) not null, 
tbproductocaracteristicastitulo varchar(3000) not null, 
CONSTRAINT tbproductocaracteristica PRIMARY KEY (tbproductocaracteristicaid));

create table tbproductoprecio(
tbproductoprecioid int auto_increment not null,
tbproductoid int not null,
tbproductopreciocompra  double not null,
tbproductopreciocomprafecha datetime null,
tbproductoprecioventa double not null,
tbproductoprecioventafecha datetime not null,
tbproductoprecioganancia int not null,
CONSTRAINT PK_tbproductoprecio PRIMARY KEY (tbproductoprecioid));

/*Cliente*/
create table tbcorreo(
tbcorreoid int auto_increment not null,
tbclienteid int not null, 
tbcorreoatributo varchar(400) not null,
tbcorreovalor   varchar(400) not null,
CONSTRAINT PK_tbcorreo PRIMARY KEY (tbcorreoid));

create table tbtelefono(
tbtelefononid int auto_increment not null,
tbclienteid int not null, 
tbtelefonoatributo varchar(400) not null,
tbtelefonovalor   varchar(400) not null,
CONSTRAINT PK_tbtelefononid PRIMARY KEY (tbtelefononid));

create table tbclientecarritocompra(
tbcarritocompraid int auto_increment,
tbproductoid int not null,
tbclienteid varchar(50) not null,
CONSTRAINT PK_tbcarritocompraid PRIMARY KEY (tbcarritocompraid)
)

create table tbclientecompra(
tbclientecompraid int auto_increment,
tbclienteid varchar(50) not null,
tbcompradetalle varchar(50) not null,
tbventaporcobrar int not null,		
tbventacontado int not null,										
CONSTRAINT PK_tbclientecompraid PRIMARY KEY (tbclientecompraid)
)

create table tbdireccion(
tbdireccionid int auto_increment not null,
tbclienteid int  not null, 
tbdireccionprovincia varchar(50) not null,
tbdireccioncanton    varchar(50) not null,
tbdirecciondistricto varchar(50) not null,
tbdireccionotrassenas varchar(60) not null,
CONSTRAINT PK_tbdireccionid PRIMARY KEY (tbdireccionid))
create table tbcliente(
tbclienteid int auto_increment not null,
tbclienteusuario varchar(40)  not null, 
tbclientecontrasennia varchar(50) not null,
tbclienteactivo int not null,
CONSTRAINT PK_tbclienteid PRIMARY KEY (tbtbclienteid))

create table tbclientecategorizacion(
tbclientecategorizacionid int auto_increment not null,
tbclienteid int not null, 
tbclientecategorizacionnombre varchar(400) not null,
tbclientecategorizaciondescuento int not null,
tbclientecategorizacionpuntoscompra int not null,
CONSTRAINT PK_tbclientecategorizacionid PRIMARY KEY (tbclientecategorizacionid))
		
create table tbgarantia(
tbgarantiaid int auto_increment not null,
tbproductoid int not null, 
tbgarantiacantidad int not null,
CONSTRAINT PK_tbgarantiaid PRIMARY KEY (tbgarantiaid))

create table tbdevolucion(
tbdevolucionid int auto_increment not null,
tbproductoid int not null,
tbdevolucioncantidad int not null,
CONSTRAINT PK_tbdevolucionid PRIMARY KEY (tbdevolucionid))
        
create table tbclientedatobancario(
tbclientedatosbancariosid int auto_increment not null,
tbclienteid int not null, 
tbclientedatosbancarionombrebanco varchar(20) not null,
tbclientedatosbancarionumerocuenta varchar(20) not null,
CONSTRAINT PK_tbclientedatosbancariosid PRIMARY KEY (tbclientedatosbancariosid))