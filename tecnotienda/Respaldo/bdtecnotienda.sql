create database bdtecnotienda;
use bdtecnotienda;

create table tbusuario(
tbusuarionombre varchar(50) not null,
tbusuariocontrasennia varchar(50) not null,
tbusuariotipousuario int not null,
tbusuarioactivo int not null,
CONSTRAINT PK_tbusuario PRIMARY KEY (tbusuarionombre));
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
tbproductocodigobarras int  not null,
tbproductocantidadgarantiasaplicadas int  not null,
tbproductocantidaddevoluciones int  not null,
tbproductoestado varchar(50) not null,
tbproductosubcategoria int not null,
tbproductoactivo int not null,
CONSTRAINT PK_tbproductoia PRIMARY KEY (tbproductoid));

alter table tbproducto MODIFY tbproductocodigobarras int(255)

create table tbproductoimagen(
tbproductoimagenid int auto_increment not null,
tbproductoid int not null,
tbproductoimagennombre varchar(1000) not null,
tbproductoimagenruta varchar(1000) not null,
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
tbclienteusuario varchar(40)  not null, 
tbcorreoatributo varchar(400) not null,
tbcorreovalor   varchar(400) not null,
CONSTRAINT PK_tbcorreo PRIMARY KEY (tbcorreoid));

create table tbtelefono(
tbtelefononid int auto_increment not null,
tbclienteusuario varchar(40)  not null, 
tbtelefononumero varchar(400),
CONSTRAINT PK_tbtelefononid PRIMARY KEY (tbtelefononid))

create table tbdireccion(
tbdireccionid int auto_increment not null,
tbclienteusuario varchar(40)  not null, 
tbdireccionprovincia varchar(50) not null,
tbdireccioncanton    varchar(50) not null,
tbdirecciondistricto varchar(50) not null,
tbdireccionotrassenas varchar(60) not null,
CONSTRAINT PK_tbdireccionid PRIMARY KEY (tbdireccionid))

create table tbcliente(
tbclienteusuario varchar(40)  not null, 
tbclientecontrasennia varchar(50) not null,
tbclienteactivo int not null,
CONSTRAINT PK_tbclienteusuario PRIMARY KEY (tbclienteusuario))

create table tbclientecategorizacion(
tbclientecategorizacionid int auto_increment not null,
tbclienteusuario varchar(40)  not null, 
tbclientecategorizacionnombre varchar(400) not null,
tbclientecategorizaciondescuento int not null,
tbclientecategorizacionpuntoscompra int not null,
CONSTRAINT PK_tbclientecategorizacionid PRIMARY KEY (tbclientecategorizacionid))
		
create table tbclientedatosbancario(
tbclientedatosbancariosid int auto_increment not null,
tbclienteusuario varchar(40)  not null, 
tbclientedatosbancarionombrebanco varchar(20) not null,
tbclientedatosbancarionumerocuenta varchar(20) not null,
CONSTRAINT PK_tbclientedatosbancariosid PRIMARY KEY (tbclientedatosbancariosid))