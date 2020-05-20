-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 163.178.107.10    Database: bdtecnotienda
-- ------------------------------------------------------
-- Server version	5.7.25-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbcategoria`
--

DROP TABLE IF EXISTS `tbcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcategoria` (
  `tbcategoriaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbusuarioid` varchar(50) NOT NULL,
  `tbcategorianombre` varchar(50) NOT NULL,
  `tbcategoriadescripcion` varchar(50) NOT NULL,
  `tbcategoriaestado` int(11) NOT NULL,
  `tbcategoriafecha` datetime NOT NULL,
  PRIMARY KEY (`tbcategoriaid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategoria`
--

LOCK TABLES `tbcategoria` WRITE;
/*!40000 ALTER TABLE `tbcategoria` DISABLE KEYS */;
INSERT INTO `tbcategoria` VALUES (1,'2','Componentes','Se agregaron componentes nuevos',0,'2020-05-10 00:00:00'),(2,'2','Teclado','se creo la categoría de teclado',0,'2020-05-15 00:00:00'),(3,'1','Computadoras','Se añadió una pc',0,'2020-05-19 00:00:00');
/*!40000 ALTER TABLE `tbcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `tbtbclienteid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteusuario` varchar(40) NOT NULL,
  `tbclientecontrasennia` varchar(50) NOT NULL,
  `tbclienteactivo` int(11) NOT NULL,
  PRIMARY KEY (`tbtbclienteid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (1,'KarolMG1996','1234',0);
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientecarritocompra`
--

DROP TABLE IF EXISTS `tbclientecarritocompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientecarritocompra` (
  `tbcarritocompraid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbclienteid` varchar(50) NOT NULL,
  `tbclientecarritocompracantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbcarritocompraid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecarritocompra`
--

LOCK TABLES `tbclientecarritocompra` WRITE;
/*!40000 ALTER TABLE `tbclientecarritocompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbclientecarritocompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientecategorizacion`
--

DROP TABLE IF EXISTS `tbclientecategorizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientecategorizacion` (
  `tbclientecategorizacionid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtbclienteid` varchar(255) DEFAULT NULL,
  `tbclientecategorizacionnombre` varchar(400) NOT NULL,
  `tbclientecategorizaciondescuento` int(11) NOT NULL,
  `tbclientecategorizacionpuntoscompra` int(11) NOT NULL,
  PRIMARY KEY (`tbclientecategorizacionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecategorizacion`
--

LOCK TABLES `tbclientecategorizacion` WRITE;
/*!40000 ALTER TABLE `tbclientecategorizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbclientecategorizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientecompra`
--

DROP TABLE IF EXISTS `tbclientecompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientecompra` (
  `tbclientecompraid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(50) NOT NULL,
  `tbcompradetalle` varchar(4000) DEFAULT NULL,
  `tbventaporcobrar` int(11) NOT NULL,
  `tbventacontado` int(11) NOT NULL,
  PRIMARY KEY (`tbclientecompraid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecompra`
--

LOCK TABLES `tbclientecompra` WRITE;
/*!40000 ALTER TABLE `tbclientecompra` DISABLE KEYS */;
INSERT INTO `tbclientecompra` VALUES (1,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 2, Titulo: Teclado, precio: 500000, subTotal: 1000000. ,',0,1461250),(2,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 2, Titulo: Teclado, precio: 500000, subTotal: 1000000. ,',0,1461250),(3,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 2, Titulo: Teclado, precio: 500000, subTotal: 1000000. ,',0,1461250),(4,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 2, Titulo: Teclado, precio: 500000, subTotal: 1000000. ,',0,1461250),(5,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 2, Titulo: Teclado, precio: 500000, subTotal: 1000000. ,',0,1461250),(6,'KarolMG1996',' Cantidad: 1, Titulo: Mouse, precio: 461250, subTotal: 461250. , Cantidad: 1, Titulo: Procesaror, precio: 510000, subTotal: 510000. , Cantidad: 2, Titulo: Procesaror, precio: 510000, subTotal: 1020000. ,',0,1991250);
/*!40000 ALTER TABLE `tbclientecompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientedatobancario`
--

DROP TABLE IF EXISTS `tbclientedatobancario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientedatobancario` (
  `tbclientedatosbancariosid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtbclienteid` varchar(255) DEFAULT NULL,
  `tbclientedatosbancarionombrebanco` varchar(20) NOT NULL,
  `tbclientedatosbancarionumerocuenta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tbclientedatosbancariosid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedatobancario`
--

LOCK TABLES `tbclientedatobancario` WRITE;
/*!40000 ALTER TABLE `tbclientedatobancario` DISABLE KEYS */;
INSERT INTO `tbclientedatobancario` VALUES (1,'KarolMG1996','Banco Nacional','12345678912333');
/*!40000 ALTER TABLE `tbclientedatobancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcorreo`
--

DROP TABLE IF EXISTS `tbcorreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcorreo` (
  `tbcorreoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtbclienteid` varchar(255) DEFAULT NULL,
  `tbcorreoatributo` varchar(400) NOT NULL,
  `tbcorreovalor` varchar(400) NOT NULL,
  PRIMARY KEY (`tbcorreoid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcorreo`
--

LOCK TABLES `tbcorreo` WRITE;
/*!40000 ALTER TABLE `tbcorreo` DISABLE KEYS */;
INSERT INTO `tbcorreo` VALUES (1,'KarolMG1996','KAROL@gmail.com,','0,');
/*!40000 ALTER TABLE `tbcorreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdevolucion`
--

DROP TABLE IF EXISTS `tbdevolucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbdevolucion` (
  `tbdevolucionid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbdevolucioncantidad` int(11) NOT NULL,
  PRIMARY KEY (`tbdevolucionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdevolucion`
--

LOCK TABLES `tbdevolucion` WRITE;
/*!40000 ALTER TABLE `tbdevolucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbdevolucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdireccion`
--

DROP TABLE IF EXISTS `tbdireccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbdireccion` (
  `tbdireccionid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtbclienteid` varchar(255) DEFAULT NULL,
  `tbdireccionprovincia` varchar(50) NOT NULL,
  `tbdireccioncanton` varchar(50) NOT NULL,
  `tbdirecciondistricto` varchar(50) NOT NULL,
  `tbdireccionotrassenas` varchar(60) NOT NULL,
  PRIMARY KEY (`tbdireccionid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdireccion`
--

LOCK TABLES `tbdireccion` WRITE;
/*!40000 ALTER TABLE `tbdireccion` DISABLE KEYS */;
INSERT INTO `tbdireccion` VALUES (1,'KarolMG1996','Cartago','4 Cantón de Jimenéz','Juan Viñas','200 metros este centro de nutricion');
/*!40000 ALTER TABLE `tbdireccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbgarantia`
--

DROP TABLE IF EXISTS `tbgarantia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbgarantia` (
  `tbgarantiaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbgarantiacantidad` int(11) NOT NULL,
  PRIMARY KEY (`tbgarantiaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbgarantia`
--

LOCK TABLES `tbgarantia` WRITE;
/*!40000 ALTER TABLE `tbgarantia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbgarantia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproducto`
--

DROP TABLE IF EXISTS `tbproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproducto` (
  `tbproductoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbsubcategoriaid` int(11) DEFAULT NULL,
  `tbproductocodigobarras` int(255) DEFAULT NULL,
  `tbproductocantidadgarantiasaplicadas` int(11) NOT NULL,
  `tbproductocantidaddevoluciones` int(11) NOT NULL,
  `tbproductoestado` varchar(50) NOT NULL,
  `tbproductoactivo` int(11) NOT NULL,
  `tbproductocantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbproductoid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducto`
--

LOCK TABLES `tbproducto` WRITE;
/*!40000 ALTER TABLE `tbproducto` DISABLE KEYS */;
INSERT INTO `tbproducto` VALUES (1,1,23452344,0,0,'Producto Nuevo',0,7),(2,1,56789,0,0,'Producto Nuevo',0,7),(3,1,667890,0,0,'viekp',1,4),(4,2,2132,0,0,'Producto Nuevo',0,10),(5,3,28938120,2,3,'Producto Nuevo',0,20);
/*!40000 ALTER TABLE `tbproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproductocaracteristica`
--

DROP TABLE IF EXISTS `tbproductocaracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproductocaracteristica` (
  `tbproductocaracteristicaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbproductocartacteristicascriterio` varchar(3000) NOT NULL,
  `tbproductocaracteristicasvalor` varchar(3000) NOT NULL,
  `tbproductocaracteristicastitulo` varchar(3000) NOT NULL,
  PRIMARY KEY (`tbproductocaracteristicaid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductocaracteristica`
--

LOCK TABLES `tbproductocaracteristica` WRITE;
/*!40000 ALTER TABLE `tbproductocaracteristica` DISABLE KEYS */;
INSERT INTO `tbproductocaracteristica` VALUES (1,1,'i,Iden,','2,2,','Mouse'),(2,2,'8,','9,','Procesaror'),(3,3,'22,','3,','Teclado'),(4,4,'Marca,Tipo de Teclado,LED,Tipo de Switch,,','Redragon,Mecanico,RGB, Outemu Blue,,','REDRAGON K585 DITI'),(5,5,'Procesador,',' Intel Core i7 9750H,','DELL G5 GAMING - I7 9750H - RTX 2060 6 GB');
/*!40000 ALTER TABLE `tbproductocaracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproductoimagen`
--

DROP TABLE IF EXISTS `tbproductoimagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproductoimagen` (
  `tbproductoimagenid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbproductoimagennombre` varchar(1000) NOT NULL,
  `tbproductoimagenruta` varchar(1000) NOT NULL,
  `tbproductoimagenestado` varchar(1000) NOT NULL,
  PRIMARY KEY (`tbproductoimagenid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoimagen`
--

LOCK TABLES `tbproductoimagen` WRITE;
/*!40000 ALTER TABLE `tbproductoimagen` DISABLE KEYS */;
INSERT INTO `tbproductoimagen` VALUES (2,1,'Celeste,Estandar,Estandar','/tecnotienda/tecnotienda/public/img/1589147678imexx-venom-gaming (1).jpg,','0,'),(3,2,'Gris,Extendido,Juego','/tecnotienda/tecnotienda/public/img/1589177479razer-naga-trinity.jpg,','0,'),(4,3,'Negro,Ultra Delgada,Contable','/tecnotienda/tecnotienda/public/img/1589177609hyperx-fury-s-speed-large (1).jpg,','0,'),(5,4,'Blanca,Delgada,Juego','/tecnotienda/tecnotienda/public/img/1589568099redragon-k585-diti.jpg,','0,'),(6,5,'Negra,Estandar,Estandar,','/tecnotienda/tecnotienda/public/img/1589868588dell-g5-gaming-i7-9750h-rtx-2060-6-gb(1).jpg,','0,');
/*!40000 ALTER TABLE `tbproductoimagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproductoprecio`
--

DROP TABLE IF EXISTS `tbproductoprecio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproductoprecio` (
  `tbproductoprecioid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbproductopreciocompra` double NOT NULL,
  `tbproductopreciocomprafecha` datetime DEFAULT NULL,
  `tbproductoprecioventa` double NOT NULL,
  `tbproductoprecioventafecha` datetime NOT NULL,
  `tbproductoprecioganancia` int(11) NOT NULL,
  PRIMARY KEY (`tbproductoprecioid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoprecio`
--

LOCK TABLES `tbproductoprecio` WRITE;
/*!40000 ALTER TABLE `tbproductoprecio` DISABLE KEYS */;
INSERT INTO `tbproductoprecio` VALUES (1,1,450000,'2020-05-08 00:00:00',461250,'2020-05-22 00:00:00',40),(2,2,500000,'2020-05-15 00:00:00',510000,'2020-05-16 00:00:00',50),(3,3,4000000,'2020-05-10 00:00:00',500000,'2020-05-22 00:00:00',70),(4,4,15000,'2020-05-08 00:00:00',15375,'2020-05-17 00:00:00',40),(5,5,895000,'2020-05-17 00:00:00',917375,'2020-05-17 00:00:00',40);
/*!40000 ALTER TABLE `tbproductoprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproveedor`
--

DROP TABLE IF EXISTS `tbproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproveedor` (
  `tbproveedorid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproveedorusuario` varchar(255) DEFAULT NULL,
  `tbproveedorcontrasena` varchar(40) DEFAULT NULL,
  `tbempresa` varchar(40) DEFAULT NULL,
  `tbdescripcion` varchar(40) DEFAULT NULL,
  `tbproveedorestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbproveedorid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproveedor`
--

LOCK TABLES `tbproveedor` WRITE;
/*!40000 ALTER TABLE `tbproveedor` DISABLE KEYS */;
INSERT INTO `tbproveedor` VALUES (1,'0','0','0','0',0),(2,'9','9','9','holax',1),(3,'8888','888','8','8',1),(4,'11111111111111','8`','2','3',0),(5,'777755555555','7777','777777','777',0),(6,'888888888888','9999999999','1888888888','1',0),(7,'5555555555555','111111','3r','3',0);
/*!40000 ALTER TABLE `tbproveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbsubcategoria`
--

DROP TABLE IF EXISTS `tbsubcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbsubcategoria` (
  `tbsubcategoriaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbcategoriaid` int(11) NOT NULL,
  `tbusuarioid` varchar(50) NOT NULL,
  `tbsubcategorianombre` varchar(50) NOT NULL,
  `tbsubcategoriadescripcion` varchar(50) NOT NULL,
  `tbsubcategoriaestado` int(11) NOT NULL,
  `tbsubcategoriafecha` datetime NOT NULL,
  PRIMARY KEY (`tbsubcategoriaid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsubcategoria`
--

LOCK TABLES `tbsubcategoria` WRITE;
/*!40000 ALTER TABLE `tbsubcategoria` DISABLE KEYS */;
INSERT INTO `tbsubcategoria` VALUES (1,1,'2','Procesadores','Se agregó un nuevo procesador',0,'2020-05-10 00:00:00'),(2,2,'2','Accesorios de Computadoras','Se añadió un acceso  a cmp',0,'2020-05-15 00:00:00'),(3,3,'1','Laptops','Se añadió una laptop',0,'2020-05-19 00:00:00');
/*!40000 ALTER TABLE `tbsubcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtelefono`
--

DROP TABLE IF EXISTS `tbtelefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbtelefono` (
  `tbtelefononid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtbclienteid` varchar(255) DEFAULT NULL,
  `tbtelefonoatributo` varchar(400) NOT NULL,
  `tbtelefonovalor` varchar(400) NOT NULL,
  PRIMARY KEY (`tbtelefononid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtelefono`
--

LOCK TABLES `tbtelefono` WRITE;
/*!40000 ALTER TABLE `tbtelefono` DISABLE KEYS */;
INSERT INTO `tbtelefono` VALUES (1,'KarolMG1996','72107738,','0,');
/*!40000 ALTER TABLE `tbtelefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `tbusuarioid` int(11) NOT NULL AUTO_INCREMENT,
  `tbusuarionombre` varchar(50) NOT NULL,
  `tbusuariocontrasennia` varchar(50) NOT NULL,
  `tbusuariotipousuario` int(11) NOT NULL,
  `tbusuarioactivo` int(11) NOT NULL,
  PRIMARY KEY (`tbusuarioid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'admin','admin',1,0),(2,'karo','123',1,0),(3,'jaha','5678UIHJBkhK',1,1);
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-19 20:13:02
