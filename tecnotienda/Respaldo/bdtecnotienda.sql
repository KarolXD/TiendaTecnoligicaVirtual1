
create database bdtecnotienda;
use bdtecnotienda;

select * from tbcliente

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


--No esta ejecutada aun
create table tbproveedores(
tbproveedorid int not null,
tbproveedornombreproducto varchar(25) not null,
tbproveedorcantidad int,
tbproveedorpreciototal int,
tbproveedorencargado  varchar(25) not null,
tbproveedorfechasolicitd varchar(25) not null,
CONSTRAINT PK_tbproveedorid PRIMARY KEY (tbproveedorid));

create table tbproducto(
tbproductoid int auto_increment not null ,
tbproductonombre varchar(30) not null,
tbproductoimagen varchar(255)  not null ,
tbproductoprecio double not null,
tbproductodescripcion varchar(70) not null,
tbproductocantidad int not null,
tbproductosubcategoriaid int not null,
CONSTRAINT PK_tbproductoid PRIMARY KEY (tbproductoid));


Select tbcategoriaid,tbcategorianombre from tbcategoria
Create table tbcategoria(
tbcategoriaid int auto_increment not null,
tbcategorianombre varchar(30) not null,
CONSTRAINT PK_tbcategoriaid PRIMARY KEY (tbcategoriaid));

Create table tbsubcategoria(
tbsubcategoriaid int auto_increment not null,
tbsubcategorianombre varchar(30) not null,
tbcategoriaid int not null,
CONSTRAINT PK_tbsubcategoriaid PRIMARY KEY (tbsubcategoriaid))


insert into tbproducto (tbproductonombre,tbproductoimagen,tbproductoprecio,tbproductodescripcion,tbproductocantidad,tbproductosubcategoriaid) values(1,'ja',1,'da',1,1)
