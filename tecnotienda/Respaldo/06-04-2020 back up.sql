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
INSERT INTO `tbcategoria` VALUES (1,'1','Computadoras','Se ha registrado una computadora',0,'2020-05-20 00:00:00'),(2,'1','Componentes','Se ha registrado un componente',0,'2020-05-20 00:00:00'),(3,'1','Perifericos','Se ha registrado un periferico',0,'2020-05-20 00:00:00');
/*!40000 ALTER TABLE `tbcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclicksoferta`
--

DROP TABLE IF EXISTS `tbclicksoferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclicksoferta` (
  `tbclicksofertaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(40) NOT NULL,
  `tbclicksofertacategoria` int(11) DEFAULT NULL,
  `tbclicksofertasubcategoria` int(11) DEFAULT NULL,
  `tbclicksofertavalor` int(11) DEFAULT NULL,
  `tbclicksofertacriterio` int(11) DEFAULT NULL,
  `tbclicksofertaregular` int(11) DEFAULT NULL,
  `tbclicksofertanormalm` int(11) DEFAULT NULL,
  `tbclicksfertafecha` datetime DEFAULT NULL,
  PRIMARY KEY (`tbclicksofertaid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclicksoferta`
--

LOCK TABLES `tbclicksoferta` WRITE;
/*!40000 ALTER TABLE `tbclicksoferta` DISABLE KEYS */;
INSERT INTO `tbclicksoferta` VALUES (1,'karolmg1996',14,14,3,4,0,1,'2020-05-31 18:56:40'),(2,'Jahanel07',9,9,4,13,0,1,'2020-06-03 14:45:46');
/*!40000 ALTER TABLE `tbclicksoferta` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (1,'KarolMG1996','1234',0),(2,'Jahanel07','jahanel0707',0),(3,'Dani2702','Danielita07',0),(4,'Calidad0901','CALIdad12',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecarritocompra`
--

LOCK TABLES `tbclientecarritocompra` WRITE;
/*!40000 ALTER TABLE `tbclientecarritocompra` DISABLE KEYS */;
INSERT INTO `tbclientecarritocompra` VALUES (56,4,'KarolMG1996',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecategorizacion`
--

LOCK TABLES `tbclientecategorizacion` WRITE;
/*!40000 ALTER TABLE `tbclientecategorizacion` DISABLE KEYS */;
INSERT INTO `tbclientecategorizacion` VALUES (1,'Dani2702','Danielita07',0,0),(2,'Calidad0901','CALIdad12',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecompra`
--

LOCK TABLES `tbclientecompra` WRITE;
/*!40000 ALTER TABLE `tbclientecompra` DISABLE KEYS */;
INSERT INTO `tbclientecompra` VALUES (1,'KarolMG1996',' Cantidad: 2, Titulo: ASUS TUF FX505DU - RYZEN 7 3750H - GTX 1660TI, precio: 770000, subTotal: 1540000. ,',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedatobancario`
--

LOCK TABLES `tbclientedatobancario` WRITE;
/*!40000 ALTER TABLE `tbclientedatobancario` DISABLE KEYS */;
INSERT INTO `tbclientedatobancario` VALUES (1,'KarolMG1996','Banco Nacional','12345678912333'),(2,'Jahanel07','Banco de Costa Rica','098765672893'),(3,'Dani2702','Banco de Costa Rica','32'),(4,'Calidad0901','Banco Nacional','123456789101121314');
/*!40000 ALTER TABLE `tbclientedatobancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientemoroso`
--

DROP TABLE IF EXISTS `tbclientemoroso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientemoroso` (
  `tbclientemorosoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(40) NOT NULL,
  `tbventaporcobrarid` int(11) NOT NULL,
  `tbclientemorosodeuda` double DEFAULT NULL,
  `tbclientemorosofecha` datetime DEFAULT NULL,
  PRIMARY KEY (`tbclientemorosoid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientemoroso`
--

LOCK TABLES `tbclientemoroso` WRITE;
/*!40000 ALTER TABLE `tbclientemoroso` DISABLE KEYS */;
INSERT INTO `tbclientemoroso` VALUES (1,'KarolMG1996',1,1411666.625,'2020-08-23 22:38:34');
/*!40000 ALTER TABLE `tbclientemoroso` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcorreo`
--

LOCK TABLES `tbcorreo` WRITE;
/*!40000 ALTER TABLE `tbcorreo` DISABLE KEYS */;
INSERT INTO `tbcorreo` VALUES (1,'KarolMG1996','KAROL@gmail.com,','0,'),(2,'Jahanel07','jahanelrive3131@gmail.com,','0,'),(3,'Dani2702','dani@hola.com,','0,'),(4,'Calidad0901','calidad@calidad.com,','0,'),(5,'112345678','telnet@gmail.com,','0,');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdireccion`
--

LOCK TABLES `tbdireccion` WRITE;
/*!40000 ALTER TABLE `tbdireccion` DISABLE KEYS */;
INSERT INTO `tbdireccion` VALUES (1,'KarolMG1996','Cartago','4 Cantón de Jimenéz','Juan Viñas','200 metros este centro de nutricion'),(2,'Jahanel07','Cartago','8 Cantón de Turrialba','La Suiza','200 metros de la escuela de Canada'),(3,'Dani2702','Cartago','4 Cantón de Jimenéz','Juan Viñas','200 metros este centro de nutricion'),(4,'Calidad0901','Cartago','8 Cantón de Turrialba','Turrialba','Turri');
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
-- Table structure for table `tboferta`
--

DROP TABLE IF EXISTS `tboferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tboferta` (
  `tbofertaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbofertaprecio` double NOT NULL,
  `tbproductoid` int(11) DEFAULT NULL,
  `tbofertadescuento` int(11) DEFAULT NULL,
  `tbofertafechainicio` datetime DEFAULT NULL,
  `tbofertafechafin` datetime DEFAULT NULL,
  PRIMARY KEY (`tbofertaid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tboferta`
--

LOCK TABLES `tboferta` WRITE;
/*!40000 ALTER TABLE `tboferta` DISABLE KEYS */;
INSERT INTO `tboferta` VALUES (2,9900,5,5,'2020-06-26 18:47:00','2020-06-27 18:47:00'),(3,49500,2,10,'2020-05-29 22:36:00','2020-05-31 22:36:00');
/*!40000 ALTER TABLE `tboferta` ENABLE KEYS */;
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
INSERT INTO `tbproducto` VALUES (1,1,3456789,0,0,'Producto nuevo',0,30),(2,1,4567813,0,0,'Producto nuevo',0,30),(3,1,56789123,0,0,'Producto nuevo',0,30),(5,4,67890,0,0,'Producto nuevo',0,30);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductocaracteristica`
--

LOCK TABLES `tbproductocaracteristica` WRITE;
/*!40000 ALTER TABLE `tbproductocaracteristica` DISABLE KEYS */;
INSERT INTO `tbproductocaracteristica` VALUES (1,1,'1 Color,2 Pantalla,','1 Gris&Azul&Rojo&Verde,2 15 pulgadas,','ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB'),(2,2,'1 Color,2 Procesador,','1 Azul&Gris&Morada&Rojo,2  Intel Core i5 8265U,','ASUS X509J - CORE I3 1005G1 - 4 GB'),(3,3,'1 TColor,2 Memoria,','1 Negra&Gris,2  8 GB DDR4 2400,','MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB'),(10,5,'1 color,2 tamano,3 pantalla,4resolucion,5 teclado,','1 verde,2 grande,4 15 pulgads,5 megas,6 led,','IMEXX - MOUSE WIRELESS - ROJO');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoimagen`
--

LOCK TABLES `tbproductoimagen` WRITE;
/*!40000 ALTER TABLE `tbproductoimagen` DISABLE KEYS */;
INSERT INTO `tbproductoimagen` VALUES (1,1,'Laptops buena,','/tecnotienda/tecnotienda/public/img/1590629973Gris.png,/tecnotienda/tecnotienda/public/img/1590629973azul.png,/tecnotienda/tecnotienda/public/img/1590629973Roja.png,/tecnotienda/tecnotienda/public/img/1590629973verde.png,','0,'),(2,2,'ALta gama,','/tecnotienda/tecnotienda/public/img/1590630303azul2.png,/tecnotienda/tecnotienda/public/img/1590630303gris2.png,/tecnotienda/tecnotienda/public/img/1590630303morado.png,/tecnotienda/tecnotienda/public/img/1590630303rojo2.png,','0,'),(3,3,'ALta gama,','/tecnotienda/tecnotienda/public/img/1590630420negra.png,/tecnotienda/tecnotienda/public/img/1590630420gris.png,','0,'),(5,5,'Calidad alta,','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,','0,');
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
INSERT INTO `tbproductoprecio` VALUES (1,1,500000,'2020-05-27 00:00:00',550000,'2020-05-30 00:00:00',10),(2,2,450000,'2020-05-22 00:00:00',495000,'2020-06-06 00:00:00',10),(3,3,600000,'2020-05-29 00:00:00',660000,'2020-05-30 00:00:00',10),(5,5,45000,'2020-05-29 00:00:00',49500,'2020-05-30 00:00:00',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproveedor`
--

LOCK TABLES `tbproveedor` WRITE;
/*!40000 ALTER TABLE `tbproveedor` DISABLE KEYS */;
INSERT INTO `tbproveedor` VALUES (1,'0','0','0','0',0),(2,'9','9','9','holax',1),(3,'8888','888','8','8',1),(4,'11111111111111','8`','2','3',0),(5,'777755555555','7777','777777','777',0),(6,'888888888888','9999999999','1888888888','1',0),(7,'5555555555555','111111','3r','3',0),(8,'112345678','karol12LK','TigoStard','100 portatiles marca hp',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsubcategoria`
--

LOCK TABLES `tbsubcategoria` WRITE;
/*!40000 ALTER TABLE `tbsubcategoria` DISABLE KEYS */;
INSERT INTO `tbsubcategoria` VALUES (1,1,'1','Laptops','Se ha registrado  una laptops',0,'2020-05-20 00:00:00'),(2,2,'1','Tarjeta Madre','Se ha registrado 1 Tarjeta Madre',0,'2020-05-20 00:00:00'),(3,3,'1','Teclado','Se ha registrado un teclado',0,'2020-05-20 00:00:00'),(4,3,'1','Mouse','Se ha registrado un mouse',0,'2020-05-20 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtelefono`
--

LOCK TABLES `tbtelefono` WRITE;
/*!40000 ALTER TABLE `tbtelefono` DISABLE KEYS */;
INSERT INTO `tbtelefono` VALUES (1,'KarolMG1996','72107738,','0,'),(2,'Jahanel07','89781111,','0,'),(3,'Dani2702',',','0,'),(4,'Calidad0901','72108877,','0,'),(5,'112345678','72107738,','0,');
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

--
-- Table structure for table `tbventaporcobrar`
--

DROP TABLE IF EXISTS `tbventaporcobrar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbventaporcobrar` (
  `tbventacobrarid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(40) DEFAULT NULL,
  `tbcantidadpagada` float DEFAULT NULL,
  `tbfechaAbono` datetime DEFAULT NULL,
  `tbtotaldeuda` float DEFAULT NULL,
  `tbtotalfactura` float DEFAULT NULL,
  `tbfechalimite` datetime DEFAULT NULL,
  `tbestadomoroso` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbventacobrarid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbventaporcobrar`
--

LOCK TABLES `tbventaporcobrar` WRITE;
/*!40000 ALTER TABLE `tbventaporcobrar` DISABLE KEYS */;
INSERT INTO `tbventaporcobrar` VALUES (1,'KarolMG1996',128333,'2020-05-24 17:05:37',898347,1540000,'2020-07-24 16:41:04',0);
/*!40000 ALTER TABLE `tbventaporcobrar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-04  8:37:54
