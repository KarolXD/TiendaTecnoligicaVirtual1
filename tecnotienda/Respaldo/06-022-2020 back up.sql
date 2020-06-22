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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclicksoferta`
--

LOCK TABLES `tbclicksoferta` WRITE;
/*!40000 ALTER TABLE `tbclicksoferta` DISABLE KEYS */;
INSERT INTO `tbclicksoferta` VALUES (1,'karolmg1996',120,27,1,28,0,1,'2020-06-22 09:03:35'),(2,'Jahanel07',87,13,0,13,0,1,'2020-06-16 15:19:36'),(3,'Daniela10',8,5,0,5,0,1,'2020-06-16 18:05:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (1,'KarolMG1996','1234',0),(2,'Jahanel07','jahanel0707',0),(3,'Dani2702','Danielita07',0),(4,'Calidad0901','CALIdad12',0),(5,'Juanita2138','juanita1010H2',0),(6,'Bryan10','bBrauas10',0),(7,'Daniela10','Daniwenf2',0),(8,'Luis1092','LuisJosehjJj1kJ',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
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
  `tbclientefechanacimiento` date DEFAULT NULL,
  PRIMARY KEY (`tbclientecategorizacionid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecategorizacion`
--

LOCK TABLES `tbclientecategorizacion` WRITE;
/*!40000 ALTER TABLE `tbclientecategorizacion` DISABLE KEYS */;
INSERT INTO `tbclientecategorizacion` VALUES (1,'Dani2702','Regular',0,0,'1959-02-06'),(2,'Calidad0901','Inactivo',0,0,'1976-01-01'),(3,'Juanita2138','Inactivo',0,0,'1971-06-05'),(4,'KarolMG1996','Activo',10,44,'1991-08-09'),(5,'Jahanel07','Activo',10,13,'1983-02-02'),(6,'Bryan10','Inactivo',0,0,'1993-09-09'),(7,'Daniela10','Regular',0,0,'1999-06-06'),(8,'Luis1092','Inactivo',0,0,'1999-06-06');
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
  `tbclientecomprafechacompra` datetime DEFAULT NULL,
  `tbproductoid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbclientecompraid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecompra`
--

LOCK TABLES `tbclientecompra` WRITE;
/*!40000 ALTER TABLE `tbclientecompra` DISABLE KEYS */;
INSERT INTO `tbclientecompra` VALUES (1,'KarolMG1996',' Cantidad: 3, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 1485000. ,',0,1485000,'2020-06-16 14:25:16',2),(2,'KarolMG1996',' Cantidad: 2, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 62400. ,',0,62400,'2020-06-16 14:27:00',9),(3,'KarolMG1996',' Cantidad: 6, Titulo: MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB, precio: 660000, subTotal: 3960000. ,',1,0,'2020-06-16 14:27:29',3),(4,'KarolMG1996',' Cantidad: 4, Titulo: IMEXX - MOUSE WIRELESS - ROJO, precio: 49500, subTotal: 198000. ,',0,198000,'2020-06-16 14:28:30',5),(5,'Jahanel07',' Cantidad: 5, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 2475000. ,',0,2475000,'2020-06-16 14:41:28',2),(6,'Jahanel07',' Cantidad: 3, Titulo: MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB, precio: 660000, subTotal: 1980000. ,',0,1980000,'2020-06-16 14:42:05',3),(7,'Jahanel07',' Cantidad: 7, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 3465000. ,',0,3465000,'2020-06-16 14:44:42',2),(8,'Jahanel07',' Cantidad: 9, Titulo: ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB, precio: 550000, subTotal: 4950000. ,',0,4950000,'2020-06-16 14:45:07',1),(9,'Jahanel07',' Cantidad: 10, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 4950000. ,',1,0,'2020-06-16 14:45:33',2),(10,'Jahanel07',' Cantidad: 5, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 156000. ,',0,156000,'2020-06-16 14:46:39',9),(11,'Jahanel07',' Cantidad: 10, Titulo: MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB, precio: 660000, subTotal: 6600000. ,',0,6600000,'2020-06-16 14:47:50',3),(12,'Jahanel07',' Cantidad: 5, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 2475000. ,',0,2475000,'2020-06-16 15:01:45',2),(13,'Jahanel07',' Cantidad: 2, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 990000. ,',0,990000,'2020-06-16 15:19:07',2),(14,'Jahanel07',' Cantidad: 2, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 990000. ,',0,990000,'2020-06-16 15:19:25',2),(15,'KarolMG1996',' Cantidad: 10, Titulo: MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB, precio: 660000, subTotal: 6600000. ,',0,6600000,'2020-06-16 15:22:19',3),(16,'KarolMG1996',' Cantidad: 2, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 990000. ,',0,990000,'2020-06-16 15:22:39',2),(17,'KarolMG1996',' Cantidad: 1, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 31200. ,',0,31200,'2020-06-16 15:23:01',9),(18,'KarolMG1996',' Cantidad: 2, Titulo: IMEXX - MOUSE WIRELESS - AZUL, precio: 2200, subTotal: 4400. ,',0,4400,'2020-06-16 15:23:47',7),(19,'KarolMG1996',' Cantidad: 1, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 31200. ,',0,31200,'2020-06-16 15:24:19',9),(20,'KarolMG1996',' Cantidad: 1, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 31200. ,',0,31200,'2020-06-16 15:24:39',9),(21,'KarolMG1996',' Cantidad: 1, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 495000. ,',0,495000,'2020-06-16 15:24:59',2),(22,'Daniela10',' Cantidad: 3, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 1485000. ,',0,1485000,'2020-06-16 17:35:33',2),(23,'Daniela10',' Cantidad: 3, Titulo: ASUS X509J - CORE I3 1005G1 - 4 GB, precio: 495000, subTotal: 1485000. ,',0,1485000,'2020-06-16 17:37:55',2),(24,'Daniela10',' Cantidad: 2, Titulo: ASROCK A320M-HDV R4.0, precio: 31200, subTotal: 62400. ,',0,62400,'2020-06-16 17:39:00',9),(26,'Daniela10',' Cantidad: 10, Titulo: ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB, precio: 550000, subTotal: 5500000. ,',0,5500000,'2020-06-16 18:05:24',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedatobancario`
--

LOCK TABLES `tbclientedatobancario` WRITE;
/*!40000 ALTER TABLE `tbclientedatobancario` DISABLE KEYS */;
INSERT INTO `tbclientedatobancario` VALUES (1,'KarolMG1996','Banco Nacional','12345678912333'),(2,'Jahanel07','Banco de Costa Rica','098765672893'),(3,'Dani2702','Banco de Costa Rica','32'),(4,'Calidad0901','Banco Nacional','123456789101121314'),(5,'Juanita2138','77','1234567891919199'),(6,'Bryan10','77','1234567891919199'),(7,'Daniela10','77','1234567891919199'),(8,'Luis1092','77','1234567891919199');
/*!40000 ALTER TABLE `tbclientedatobancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientedeseo`
--

DROP TABLE IF EXISTS `tbclientedeseo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientedeseo` (
  `tbclientedeseoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) NOT NULL,
  `tbclienteid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`tbclientedeseoid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedeseo`
--

LOCK TABLES `tbclientedeseo` WRITE;
/*!40000 ALTER TABLE `tbclientedeseo` DISABLE KEYS */;
INSERT INTO `tbclientedeseo` VALUES (1,9,'karolmg1996 '),(2,2,'karolmg1996 '),(3,3,'karolmg1996 '),(4,7,'Jahanel07 ');
/*!40000 ALTER TABLE `tbclientedeseo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientedetalleabono`
--

DROP TABLE IF EXISTS `tbclientedetalleabono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientedetalleabono` (
  `tbclienteabonoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(50) NOT NULL,
  `tbcantidadpagada` double DEFAULT NULL,
  `tbfechaAbono` datetime DEFAULT NULL,
  `tbtotaldeuda` float DEFAULT NULL,
  `tbtotalfactura` float DEFAULT NULL,
  `tbfechalimite` datetime DEFAULT NULL,
  `tbproductoid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbclienteabonoid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedetalleabono`
--

LOCK TABLES `tbclientedetalleabono` WRITE;
/*!40000 ALTER TABLE `tbclientedetalleabono` DISABLE KEYS */;
INSERT INTO `tbclientedetalleabono` VALUES (1,'KarolMG1996',660000,'2020-06-16 14:27:29',3300000,3960000,'2020-06-19 14:27:29',3),(2,'Jahanel07',825000,'2020-06-16 14:45:33',4125000,4950000,'2020-12-16 00:00:00',2),(3,'KarolMG1996',660000,'2020-06-16 14:27:29',3300000,3960000,'2020-06-19 14:27:29',3),(4,'Jahanel07',825000,'2020-06-16 14:45:33',4125000,4950000,'2020-12-16 00:00:00',2),(7,'Jahanel07',825000,'2020-06-16 14:45:33',4125000,4950000,'2020-06-16 21:36:14',2),(8,'Jahanel07',825000,'2020-06-16 21:37:11',3300000,4950000,'2020-06-16 21:36:14',2),(9,'Jahanel07',825000,'2020-06-16 21:40:16',2475000,4950000,'2020-06-16 21:36:14',2),(10,'Jahanel07',825000,'2020-06-16 21:40:16',2475000,4950000,'2020-06-14 21:36:14',2),(11,'Jahanel07',825000,'2020-06-16 21:44:41',1650000,4950000,'2020-06-14 21:36:14',2),(12,'Jahanel07',825000,'2020-06-16 21:44:41',1650000,4950000,'2020-05-14 21:36:14',2),(13,'Jahanel07',825000,'2020-06-16 21:45:01',825000,4950000,'2020-05-14 21:36:14',2),(14,'Jahanel07',825000,'2020-06-16 21:46:38',825000,4950000,'2020-05-14 21:36:14',2),(15,'Jahanel07',825000,'2020-06-16 21:46:38',825000,4950000,'2020-06-16 21:36:14',2),(16,'Jahanel07',825000,'2020-06-16 21:46:55',825000,4950000,'2020-06-16 21:36:14',2),(17,'Jahanel07',825000,'2020-06-16 21:48:26',0,4950000,'2020-06-16 21:36:14',2),(18,'KarolMG1996',660000,'2020-06-16 14:27:29',3300000,3960000,'2020-06-19 14:27:29',3),(19,'KarolMG1996',1000,'2020-06-20 15:43:39',3299000,3960000,'2020-06-19 14:27:29',3),(20,'KarolMG1996',78,'2020-06-20 17:00:51',3297890,3960000,'2020-06-19 14:27:29',3),(21,'KarolMG1996',140,'2020-06-20 17:44:09',3297750,3960000,'2020-06-19 14:27:29',3);
/*!40000 ALTER TABLE `tbclientedetalleabono` ENABLE KEYS */;
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
  `tbclientemontofactura` float DEFAULT NULL,
  PRIMARY KEY (`tbclientemorosoid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientemoroso`
--

LOCK TABLES `tbclientemoroso` WRITE;
/*!40000 ALTER TABLE `tbclientemoroso` DISABLE KEYS */;
INSERT INTO `tbclientemoroso` VALUES (1,'karolmg1996',1,3297750,'2020-06-19 14:27:29',3960000);
/*!40000 ALTER TABLE `tbclientemoroso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclienteperfilado`
--

DROP TABLE IF EXISTS `tbclienteperfilado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclienteperfilado` (
  `tbclienteperfiladoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(50) DEFAULT NULL,
  `tbclienteperfiladocantidadclick` int(11) DEFAULT NULL,
  `tbclienteperfiladocantidadcxc` int(11) DEFAULT NULL,
  `tbclienteperfiladocantidadcontado` int(11) DEFAULT NULL,
  `tbclienteperfiladomontocxc` float DEFAULT NULL,
  `tbclienteperfiladomontocontado` float DEFAULT NULL,
  `tbclienteperfiladocantidadcompras` int(11) DEFAULT NULL,
  `tbclienteperfiladomontocompras` float DEFAULT NULL,
  PRIMARY KEY (`tbclienteperfiladoid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclienteperfilado`
--

LOCK TABLES `tbclienteperfilado` WRITE;
/*!40000 ALTER TABLE `tbclienteperfilado` DISABLE KEYS */;
INSERT INTO `tbclienteperfilado` VALUES (1,'karolmg1996',176,1,10,140,9928400,11,9928540),(2,'Jahanel07',113,1,9,825000,24081000,10,24906000),(3,'Daniela10',18,1,3,71750,3032400,4,3104150);
/*!40000 ALTER TABLE `tbclienteperfilado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcombo`
--

DROP TABLE IF EXISTS `tbcombo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcombo` (
  `tbcombocomboid` int(11) NOT NULL AUTO_INCREMENT,
  `tbcombocodigoBarra` int(11) DEFAULT NULL,
  `tbcombocantidad` int(11) DEFAULT NULL,
  `tbcomboprecio` float DEFAULT NULL,
  `tbcombotitulo` varchar(100) DEFAULT NULL,
  `tbcomboimagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`tbcombocomboid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcombo`
--

LOCK TABLES `tbcombo` WRITE;
/*!40000 ALTER TABLE `tbcombo` DISABLE KEYS */;
INSERT INTO `tbcombo` VALUES (3,31,12,12123,'Teclado y mouse logitect','/tecnotienda/tecnotienda/public/img/1592174217teclado y mouse.jpg'),(4,123145,13,123,'Teclado y mouse logitect','/tecnotienda/tecnotienda/public/img/1592174231teclado y mouse.jpg');
/*!40000 ALTER TABLE `tbcombo` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcorreo`
--

LOCK TABLES `tbcorreo` WRITE;
/*!40000 ALTER TABLE `tbcorreo` DISABLE KEYS */;
INSERT INTO `tbcorreo` VALUES (1,'KarolMG1996','KAROL@gmail.com,','0,'),(2,'Jahanel07','jahanelrive3131@gmail.com,','0,'),(3,'Dani2702','dani@hola.com,','0,'),(4,'Calidad0901','calidad@calidad.com,','0,'),(5,'112345678','telnet@gmail.com,','0,'),(6,'Juanita2138','juanita@gmail.com,','0,'),(7,'Bryan10','Bryan@gmail.com,','0,'),(8,'Daniela10','Dani@gmail.com,','0,'),(9,'Luis1092','Luis@gmail.com,','0,');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdireccion`
--

LOCK TABLES `tbdireccion` WRITE;
/*!40000 ALTER TABLE `tbdireccion` DISABLE KEYS */;
INSERT INTO `tbdireccion` VALUES (1,'KarolMG1996','Cartago','4 Cantón de Jimenéz','Juan Viñas','200 metros este centro de nutricion'),(2,'Jahanel07','Cartago','8 Cantón de Turrialba','La Suiza','200 metros de la escuela de Canada'),(3,'Dani2702','Cartago','4 Cantón de Jimenéz','Juan Viñas','200 metros este centro de nutricion'),(4,'Calidad0901','Cartago','8 Cantón de Turrialba','Turrialba','Turri'),(5,'Juanita2138','Alajuela','14 Cantón de Upala','Turrúcares','7'),(6,'Bryan10','Heredia','4 Cantón de Flores','Llorente','7'),(7,'Daniela10','San José','19 Cantón de Turrubares','San Sebastián','7'),(8,'Luis1092','San José','2 Cantón de Acosta ','Guaitil','7');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tboferta`
--

LOCK TABLES `tboferta` WRITE;
/*!40000 ALTER TABLE `tboferta` DISABLE KEYS */;
INSERT INTO `tboferta` VALUES (2,9900,5,5,'2020-06-26 18:47:00','2020-06-27 18:47:00'),(3,49500,2,10,'2020-05-29 22:36:00','2020-05-31 22:36:00'),(4,99000,1,5,'2020-06-11 12:19:00','2020-06-20 10:17:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducto`
--

LOCK TABLES `tbproducto` WRITE;
/*!40000 ALTER TABLE `tbproducto` DISABLE KEYS */;
INSERT INTO `tbproducto` VALUES (1,1,3456789,30,30,'Producto nuevo',0,21),(2,1,4567813,10,8,'Producto nuevo',0,40),(3,1,56789123,40,39,'Producto nuevo',0,61),(5,4,67890,30,29,'Producto nuevo',0,36),(7,4,6789,0,0,'Producto nuevo',0,24),(8,3,4567,50,30,'Producto nuevo',0,34),(9,2,128213,40,30,'Producto nuevo',0,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductocaracteristica`
--

LOCK TABLES `tbproductocaracteristica` WRITE;
/*!40000 ALTER TABLE `tbproductocaracteristica` DISABLE KEYS */;
INSERT INTO `tbproductocaracteristica` VALUES (1,1,'1 Color,2 Pantalla,','1 Gris&Azul&Rojo&Verde,2 15 pulgadas,','ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB'),(2,2,'1 Color,2 Procesador,','1 Azul&Gris&Morada&Rojo,2  Intel Core i5 8265U,','ASUS X509J - CORE I3 1005G1 - 4 GB'),(3,3,'1 TColor,2 Memoria,','1 Negra&Gris,2  8 GB DDR4 2400,','MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB'),(10,5,'1 color,2 tamano,3 pantalla,4resolucion,5 teclado,','1 verde,2 grande,4 15 pulgads,5 megas,6 led,','IMEXX - MOUSE WIRELESS - ROJO'),(11,7,'1 Color,2 Marca,3 DPI,','1 Azul,2 IMEXX,3 1600,','IMEXX - MOUSE WIRELESS - AZUL'),(12,8,'1 Color,2 Marca,3 Tipo de Teclado,','1 Azul,2 Redragon,3 Membrana,','REDRAGON K503 HARPE RGB'),(13,9,'1 Memoria,2  Formato,3 Color,','1 : DDR4 3200+(OC)/2933/2667/2400/2133,2 Micro-ATX,3 Rojo,','ASROCK A320M-HDV R4.0');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoimagen`
--

LOCK TABLES `tbproductoimagen` WRITE;
/*!40000 ALTER TABLE `tbproductoimagen` DISABLE KEYS */;
INSERT INTO `tbproductoimagen` VALUES (1,1,'Laptops buena,','/tecnotienda/tecnotienda/public/img/1590629973Gris.png,/tecnotienda/tecnotienda/public/img/1590629973azul.png,/tecnotienda/tecnotienda/public/img/1590629973Roja.png,/tecnotienda/tecnotienda/public/img/1590629973verde.png,','0,'),(2,2,'ALta gama,','/tecnotienda/tecnotienda/public/img/1590630303azul2.png,/tecnotienda/tecnotienda/public/img/1590630303gris2.png,/tecnotienda/tecnotienda/public/img/1590630303morado.png,/tecnotienda/tecnotienda/public/img/1590630303rojo2.png,','0,'),(3,3,'ALta gama,','/tecnotienda/tecnotienda/public/img/1590630420negra.png,/tecnotienda/tecnotienda/public/img/1590630420gris.png,','0,'),(5,5,'Calidad alta,','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,','0,'),(6,6,'kkkkkk,','/tecnotienda/tecnotienda/public/img/1592096113teclado y mouse.jpg,','0,'),(7,7,'Hola,','/tecnotienda/tecnotienda/public/img/1592250363Capture.PNG,','0,'),(8,8,'w,','/tecnotienda/tecnotienda/public/img/1592250694corsair-k63-wireless.jpg,','0,'),(9,9,'sd,','/tecnotienda/tecnotienda/public/img/1592250880roja.PNG,','0,');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoprecio`
--

LOCK TABLES `tbproductoprecio` WRITE;
/*!40000 ALTER TABLE `tbproductoprecio` DISABLE KEYS */;
INSERT INTO `tbproductoprecio` VALUES (1,1,500000,'2020-05-27 00:00:00',550000,'2020-05-30 00:00:00',10),(2,2,450000,'2020-05-22 00:00:00',495000,'2020-06-06 00:00:00',10),(3,3,600000,'2020-05-29 00:00:00',660000,'2020-05-30 00:00:00',10),(5,5,45000,'2020-05-29 00:00:00',49500,'2020-05-30 00:00:00',10),(7,7,2000,'2020-06-11 00:00:00',2200,'2020-07-03 00:00:00',10),(8,8,70000,'2020-06-19 00:00:00',71750,'2020-06-26 00:00:00',40),(9,9,30000,'2020-06-03 00:00:00',31200,'2020-07-02 00:00:00',25);
/*!40000 ALTER TABLE `tbproductoprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproductovendido`
--

DROP TABLE IF EXISTS `tbproductovendido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproductovendido` (
  `tbproductovendidoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteid` varchar(50) DEFAULT NULL,
  `tbproductoid` int(11) DEFAULT NULL,
  `tbsubcategoriaid` int(11) DEFAULT NULL,
  `tbproductovendidocantidad` int(11) DEFAULT NULL,
  `tbproductovendidonombre` varchar(100) DEFAULT NULL,
  `tbproductovendidonombreprecio` float DEFAULT NULL,
  `tbproductovendidofecha` datetime DEFAULT NULL,
  `tbproductocancelado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbproductovendidoid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductovendido`
--

LOCK TABLES `tbproductovendido` WRITE;
/*!40000 ALTER TABLE `tbproductovendido` DISABLE KEYS */;
INSERT INTO `tbproductovendido` VALUES (2,'karolmg1996',2,1,3,'ASUS X509J - CORE I3 1005G1 - 4 GB',1485000,'2020-06-16 14:24:51',0),(3,'karolmg1996',9,2,2,'ASROCK A320M-HDV R4.0',62400,'2020-06-16 14:26:44',0),(4,'karolmg1996',3,1,6,'MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB',3960000,'2020-06-16 14:27:12',1),(5,'karolmg1996',5,4,4,'IMEXX - MOUSE WIRELESS - ROJO',198000,'2020-06-16 14:27:59',0),(6,'Jahanel07',2,1,5,'ASUS X509J - CORE I3 1005G1 - 4 GB',2475000,'2020-06-16 14:41:10',0),(7,'Jahanel07',3,1,3,'MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB',1980000,'2020-06-16 14:41:51',0),(8,'Jahanel07',2,1,7,'ASUS X509J - CORE I3 1005G1 - 4 GB',3465000,'2020-06-16 14:44:32',0),(9,'Jahanel07',1,1,9,'ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB',4950000,'2020-06-16 14:44:55',0),(10,'Jahanel07',2,1,10,'ASUS X509J - CORE I3 1005G1 - 4 GB',4950000,'2020-06-16 14:45:18',1),(11,'Jahanel07',9,2,5,'ASROCK A320M-HDV R4.0',156000,'2020-06-16 14:46:23',0),(12,'Jahanel07',3,1,10,'MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB',6600000,'2020-06-16 14:47:37',0),(13,'Jahanel07',2,1,5,'ASUS X509J - CORE I3 1005G1 - 4 GB',2475000,'2020-06-16 15:01:31',0),(14,'Jahanel07',2,1,2,'ASUS X509J - CORE I3 1005G1 - 4 GB',990000,'2020-06-16 15:18:39',0),(15,'Jahanel07',2,1,2,'ASUS X509J - CORE I3 1005G1 - 4 GB',990000,'2020-06-16 15:19:16',0),(16,'karolmg1996',3,1,10,'MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB',6600000,'2020-06-16 15:22:06',0),(17,'karolmg1996',2,1,2,'ASUS X509J - CORE I3 1005G1 - 4 GB',990000,'2020-06-16 15:22:28',0),(18,'karolmg1996',9,2,1,'ASROCK A320M-HDV R4.0',31200,'2020-06-16 15:22:46',0),(19,'karolmg1996',7,4,2,'IMEXX - MOUSE WIRELESS - AZUL',4400,'2020-06-16 15:23:11',0),(21,'karolmg1996',9,2,1,'ASROCK A320M-HDV R4.0',31200,'2020-06-16 15:24:08',0),(22,'karolmg1996',9,2,1,'ASROCK A320M-HDV R4.0',31200,'2020-06-16 15:24:28',0),(23,'karolmg1996',2,1,1,'ASUS X509J - CORE I3 1005G1 - 4 GB',495000,'2020-06-16 15:24:48',0),(25,'Daniela10',2,1,3,'ASUS X509J - CORE I3 1005G1 - 4 GB',1485000,'2020-06-16 17:35:13',0),(26,'Daniela10',2,1,3,'ASUS X509J - CORE I3 1005G1 - 4 GB',1485000,'2020-06-16 17:37:38',0),(27,'Daniela10',9,2,2,'ASROCK A320M-HDV R4.0',62400,'2020-06-16 17:38:50',0),(29,'Daniela10',1,1,10,'ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB',5500000,'2020-06-16 18:05:11',0);
/*!40000 ALTER TABLE `tbproductovendido` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtelefono`
--

LOCK TABLES `tbtelefono` WRITE;
/*!40000 ALTER TABLE `tbtelefono` DISABLE KEYS */;
INSERT INTO `tbtelefono` VALUES (1,'KarolMG1996','72107738,','0,'),(2,'Jahanel07','89781111,','0,'),(3,'Dani2702',',','0,'),(4,'Calidad0901','72108877,','0,'),(5,'112345678','72107738,','0,'),(6,'Juanita2138','72345558,','0,'),(7,'Bryan10','12345678,','0,'),(8,'Daniela10','72345558,','0,'),(9,'Luis1092','72345558,','0,');
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
  `tbproductoid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbventacobrarid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbventaporcobrar`
--

LOCK TABLES `tbventaporcobrar` WRITE;
/*!40000 ALTER TABLE `tbventaporcobrar` DISABLE KEYS */;
INSERT INTO `tbventaporcobrar` VALUES (1,'KarolMG1996',140,'2020-06-20 17:44:09',3297750,3960000,'2020-06-19 14:27:29',1,3),(2,'Jahanel07',825000,'2020-06-16 21:48:26',0,4950000,'2020-06-16 21:36:14',1,2);
/*!40000 ALTER TABLE `tbventaporcobrar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporalarticulos`
--

DROP TABLE IF EXISTS `temporalarticulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporalarticulos` (
  `tbproductocaracteristica1id` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductoid` int(11) DEFAULT NULL,
  `tbproductocaracteristica1criterio` varchar(300) DEFAULT NULL,
  `tbproductocaracteristica1valor` varchar(300) DEFAULT NULL,
  `tbproductocaracteristica1titulo` varchar(300) DEFAULT NULL,
  `tbproductocaracteristicafoto` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`tbproductocaracteristica1id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporalarticulos`
--

LOCK TABLES `temporalarticulos` WRITE;
/*!40000 ALTER TABLE `temporalarticulos` DISABLE KEYS */;
INSERT INTO `temporalarticulos` VALUES (1,1,'Color','Gris,Azul,Rojo,Verde,','ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB','/tecnotienda/tecnotienda/public/img/1590629973Gris.png,/tecnotienda/tecnotienda/public/img/1590629973azul.png,/tecnotienda/tecnotienda/public/img/1590629973Roja.png,/tecnotienda/tecnotienda/public/img/1590629973verde.png,'),(2,1,'Pantalla','15 pulgadas,','ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB','/tecnotienda/tecnotienda/public/img/1590629973Gris.png,/tecnotienda/tecnotienda/public/img/1590629973azul.png,/tecnotienda/tecnotienda/public/img/1590629973Roja.png,/tecnotienda/tecnotienda/public/img/1590629973verde.png,'),(3,2,'Color','Azul,Gris,Morada,Rojo,','ASUS X509J - CORE I3 1005G1 - 4 GB','/tecnotienda/tecnotienda/public/img/1590630303azul2.png,/tecnotienda/tecnotienda/public/img/1590630303gris2.png,/tecnotienda/tecnotienda/public/img/1590630303morado.png,/tecnotienda/tecnotienda/public/img/1590630303rojo2.png,'),(4,2,'Procesador',' Intel Core i5 8265U,','ASUS X509J - CORE I3 1005G1 - 4 GB','/tecnotienda/tecnotienda/public/img/1590630303azul2.png,/tecnotienda/tecnotienda/public/img/1590630303gris2.png,/tecnotienda/tecnotienda/public/img/1590630303morado.png,/tecnotienda/tecnotienda/public/img/1590630303rojo2.png,'),(5,3,'TColor','Negra,Gris,','MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB','/tecnotienda/tecnotienda/public/img/1590630420negra.png,/tecnotienda/tecnotienda/public/img/1590630420gris.png,'),(6,3,'Memoria',' 8 GB DDR4 2400,','MSI GF65 THIN 9SD - CORE I7 9750H - GTX 1660TI 6 GB','/tecnotienda/tecnotienda/public/img/1590630420negra.png,/tecnotienda/tecnotienda/public/img/1590630420gris.png,'),(180,5,'color','verde,','IMEXX - MOUSE WIRELESS - ROJO','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,'),(181,5,'tamano',' grande,','IMEXX - MOUSE WIRELESS - ROJO','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,'),(182,5,'pantalla',' ,','IMEXX - MOUSE WIRELESS - ROJO','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,'),(183,5,'resolucion',' ,','IMEXX - MOUSE WIRELESS - ROJO','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,'),(184,5,'teclado',' ,','IMEXX - MOUSE WIRELESS - ROJO','/tecnotienda/tecnotienda/public/img/1590781614imexx-mouse-wireless-rojo.jpg,'),(185,7,'Color',' Azul,','IMEXX - MOUSE WIRELESS - AZUL','/tecnotienda/tecnotienda/public/img/1592250363Capture.PNG,'),(186,7,'Marca',' IMEXX,','IMEXX - MOUSE WIRELESS - AZUL','/tecnotienda/tecnotienda/public/img/1592250363Capture.PNG,'),(187,7,'DPI',' 1600,','IMEXX - MOUSE WIRELESS - AZUL','/tecnotienda/tecnotienda/public/img/1592250363Capture.PNG,'),(188,8,'Color',' Azul,','REDRAGON K503 HARPE RGB','/tecnotienda/tecnotienda/public/img/1592250694corsair-k63-wireless.jpg,'),(189,8,'Marca',' Redragon,','REDRAGON K503 HARPE RGB','/tecnotienda/tecnotienda/public/img/1592250694corsair-k63-wireless.jpg,'),(190,8,'Tipo de Teclado',' Membrana,','REDRAGON K503 HARPE RGB','/tecnotienda/tecnotienda/public/img/1592250694corsair-k63-wireless.jpg,'),(191,9,'Memoria',' : DDR4 3200+(OC)/2933/2667/2400/2133,','ASROCK A320M-HDV R4.0','/tecnotienda/tecnotienda/public/img/1592250880roja.PNG,'),(192,9,' Formato',' Micro-ATX,','ASROCK A320M-HDV R4.0','/tecnotienda/tecnotienda/public/img/1592250880roja.PNG,'),(193,9,'Color',' Rojo,','ASROCK A320M-HDV R4.0','/tecnotienda/tecnotienda/public/img/1592250880roja.PNG,');
/*!40000 ALTER TABLE `temporalarticulos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-22  9:31:10
