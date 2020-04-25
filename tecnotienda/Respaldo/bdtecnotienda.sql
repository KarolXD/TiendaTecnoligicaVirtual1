
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
