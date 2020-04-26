
create database bdtecnotienda;
use bdtecnotienda;

create table tbcliente(
tbclienteid int not null,
tbclientenombre  varchar(25) not null,
tbclienteapellido1  varchar(25) not null,
tbclienteapellido2  varchar(25) not null,
tbclientecorreo1  varchar(25) not null,
tbclientecorreo2  varchar(25) not null,
tbclientetelefono1  varchar(25) not null,
tbclientetelefono2  varchar(25) not null,
tbclientedireccion  varchar(25) not null,
tbclientecontrasenia varchar(25) not null,
tbclientetipousuario int,
CONSTRAINT PK_tbclienteid PRIMARY KEY (tbclienteid));
 
create table tbproveedor(
tbproveedorid int not null,
tbproveedornombreempresa varchar(300) not null,
tbproveedorfax varchar(300) not null,
tbproveedorapartadopostal int,
tbproveedorcorreo  varchar(50) not null,
tbproveedorsitioweb varchar(50) not null,
tbproveedorpersonadecontacto varchar(50) not null,
tbproveedornumerotelefono varchar(25) not null,
tbproveedordireccionfisicaempresa varchar(50) not null,
CONSTRAINT PK_tbproveedorid PRIMARY KEY (tbproveedorid));

create table tbproducto(
tbproductoid int auto_increment not null ,
tbproductonombre varchar(30) not null,
tbproductoimagen varchar(255)  not null ,
tbproductoprecio double not null,
tbproductodescripcion varchar(300) not null,
tbproductocantidad int not null,
tbproductosubcategoriaid int not null,
CONSTRAINT PK_tbproductoid PRIMARY KEY (tbproductoid));

Create table tbcategoria(
tbcategoriaid int auto_increment not null,
tbcategorianombre varchar(30) not null,
CONSTRAINT PK_tbcategoriaid PRIMARY KEY (tbcategoriaid));

Create table tbsubcategoria(
tbsubcategoriaid int auto_increment not null,
tbsubcategorianombre varchar(30) not null,
tbcategoriaid int not null,
CONSTRAINT PK_tbsubcategoriaid PRIMARY KEY (tbsubcategoriaid))

/*------------------------Nuevas tablas---------------*/

create table tbusuario(
tbusuarioid int auto_increment not null,
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
tbproductocodigo int  not null,
tbproductocantidadgarantiasaplicadas int  not null,
tbproductocantidaddevoluciones int  not null,
tbproductoestado int not null,
CONSTRAINT PK_tbproductoia PRIMARY KEY (tbproductoid));

create table tbproductoimagen(
tbproductoimagenid int auto_increment not null,
tbproductoid int not null,
tbproductoimagennombre varchar(50) not null,
tbproductoimagenruta varchar(50) not null,
tbproductoimagenestado int,
CONSTRAINT PK_tbproductoimagen PRIMARY KEY (tbproductoimagenid));

create table tbproductocaracteristica(
tbproductocaracteristicaid int auto_increment not null,
tbproductocartacteristicascriterio varchar(50) not null,
tbproductocaracteristicasvalor varchar(50) not null, 
tbproductocaracteristicasprioridad int not null,
tbproductocaracteristicasestado int not null,
CONSTRAINT tbproductocaracteristica PRIMARY KEY (tbproductocaracteristicasestado));


create table tbproductoprecio(
tbproductoprecioid int auto_increment not null,
tbproductopreciocompra  double not null,
tbproductopreciocomprafecha datetime null,
tbproductoprecioventa double not null,
tbproductoprecioventafecha datetime not null,
tbproductoprecioganancia int not null,
CONSTRAINT PK_tbproductoprecio PRIMARY KEY (tbproductoprecioid));

/*Cliente*/
drop table tbcorreo

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

