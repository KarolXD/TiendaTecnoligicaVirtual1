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
INSERT INTO `tbcategoria` VALUES (1,'Karo','Computadoras','Se creó la categoría de computadoras',0,'2020-04-24 00:00:00'),(2,'Jaha','Componentes','Se creó la categoría de componentes',0,'2020-04-28 00:00:00'),(3,'Karo','Perifericos','Se añadió la categoría de periféricos',0,'2020-04-30 00:00:00'),(4,'Karo','Accesorios','Cables, adaptadores, encapsuladores',0,'2020-04-30 00:00:00');
/*!40000 ALTER TABLE `tbcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `tbclienteusuario` varchar(40) NOT NULL,
  `tbclientecontrasennia` varchar(50) NOT NULL,
  `tbclienteactivo` int(11) NOT NULL,
  PRIMARY KEY (`tbclienteusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES ('312','admin',0);
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientecategorizacion`
--

DROP TABLE IF EXISTS `tbclientecategorizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientecategorizacion` (
  `tbclientecategorizacionid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteusuario` varchar(40) NOT NULL,
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
-- Table structure for table `tbclientedatosbancario`
--

DROP TABLE IF EXISTS `tbclientedatosbancario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientedatosbancario` (
  `tbclientedatosbancariosid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteusuario` varchar(40) NOT NULL,
  `tbclientedatosbancarionombrebanco` varchar(20) NOT NULL,
  `tbclientedatosbancarionumerocuenta` varchar(20) NOT NULL,
  PRIMARY KEY (`tbclientedatosbancariosid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientedatosbancario`
--

LOCK TABLES `tbclientedatosbancario` WRITE;
/*!40000 ALTER TABLE `tbclientedatosbancario` DISABLE KEYS */;
INSERT INTO `tbclientedatosbancario` VALUES (1,'312','nacional','BCR123123');
/*!40000 ALTER TABLE `tbclientedatosbancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcorreo`
--

DROP TABLE IF EXISTS `tbcorreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcorreo` (
  `tbcorreoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteusuario` varchar(40) NOT NULL,
  `tbcorreoatributo` varchar(400) NOT NULL,
  `tbcorreovalor` varchar(400) NOT NULL,
  PRIMARY KEY (`tbcorreoid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcorreo`
--

LOCK TABLES `tbcorreo` WRITE;
/*!40000 ALTER TABLE `tbcorreo` DISABLE KEYS */;
INSERT INTO `tbcorreo` VALUES (1,'1','Karo@gmail.com,','0,'),(2,'312','Jaha@gmail.com,','0,');
/*!40000 ALTER TABLE `tbcorreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdireccion`
--

DROP TABLE IF EXISTS `tbdireccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbdireccion` (
  `tbdireccionid` int(11) NOT NULL AUTO_INCREMENT,
  `tbclienteusuario` varchar(40) NOT NULL,
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
INSERT INTO `tbdireccion` VALUES (1,'312','Alajuela','4 Cantón de Guatuso','Katira','Turrialba La suiza 150m este de la escuela canada');
/*!40000 ALTER TABLE `tbdireccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproducto`
--

DROP TABLE IF EXISTS `tbproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproducto` (
  `tbproductoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductocodigobarras` int(255) DEFAULT NULL,
  `tbproductocantidadgarantiasaplicadas` int(11) NOT NULL,
  `tbproductocantidaddevoluciones` int(11) NOT NULL,
  `tbproductoestado` varchar(50) NOT NULL,
  `tbproductosubcategoria` int(11) NOT NULL,
  `tbproductoactivo` int(11) NOT NULL,
  PRIMARY KEY (`tbproductoid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducto`
--

LOCK TABLES `tbproducto` WRITE;
/*!40000 ALTER TABLE `tbproducto` DISABLE KEYS */;
INSERT INTO `tbproducto` VALUES (1,123409,300,150,'Nuevo',1,0),(2,1234,20,10,'Producto Nuevo',3,0),(3,34567,100,10,'Producto nuevo',5,0),(4,666,10,1,'Producto Nuevo',5,0),(5,9812332,200,10,'Producto Nuevo',8,0),(6,3452,1000,10,'Producto Nuevo',2,0),(7,4,4,4,'4',1,0),(8,9123456,9,9,'9',1,0),(9,94567890,100,9,'Producto Nuevo',1,0),(10,3456789,100,10,'Producto Nuevo',6,0),(11,88789,100,20,'Producto Nuevo',6,0),(12,4567890,10,109,'Producto Nuevo',6,0),(13,98754345,156,55,'Producto Nuevo',4,0),(14,19634567,1,1,'1',4,0),(15,8888999,9,9,'Producto Nuevo',1,0),(16,66,6,6,'6',1,0),(17,888,8,8,'888',1,0),(18,7070707,1400,40,'Producto Nuevo',10,0);
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
  `tbproductocartacteristicascriterio` varchar(3000) DEFAULT NULL,
  `tbproductocaracteristicasvalor` varchar(3000) DEFAULT NULL,
  `tbproductocaracteristicastitulo` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`tbproductocaracteristicaid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductocaracteristica`
--

LOCK TABLES `tbproductocaracteristica` WRITE;
/*!40000 ALTER TABLE `tbproductocaracteristica` DISABLE KEYS */;
INSERT INTO `tbproductocaracteristica` VALUES (1,1,'Pantalla,Procesador,Memoria,Graficos,Disco Duro,Disco SSD, Sistema Operativo,Conectividad,','15 pulgadas – 1920 x 1080 resolución,Intel Core i5 9300H,8 GB DDR4 2666,NVIDIA GeForce GTX 1650 4 GB,1 TB,128 GB,Windows 10,WIFI 802.11 AC – Bluetooth 4.0,','DELL G3 GAMING - I5 9300H - GTX 1650 4 GB'),(2,2,'Plataforma,Socket,Chipset,Formato,Memoria,','AMD,AM4,AMD B350,Micro-ATX,DDR4 3200,','GIGABYTE AB350M-DS3H V2'),(3,3,'Marca: ,Conexion,','IMEXX, USB 2.0,','IMEXX - TECLADO ULTRA SLIM ESPAÑOL'),(4,4,'Marca: ,Tipo de Teclado,LED,',' Razer  ,Mecha-Membrane  ,RGB,','RAZER ORNATA CHROMA'),(5,5,'Largo ,','10 metros,','CABLE HDMI 1.8M'),(6,7,'1,1,2,3,4,4,5,Conectividad,1,','1,2,1,3,4,5,6,7,1,','e'),(7,8,'9,1,1,','99,1,1,','9'),(8,9,'7,1,2,34,4,5,6,','99,1,1,1,1,1,1,','9'),(9,10,'Marca,DPI,',' IMEXX,1600,','IMEXX - MOUSE WIRELESS - ROJO'),(10,11,'Marca,DPI,','IMEXX,2400,','IMEXX VENOM GAMING'),(11,12,'Marca:   ,DPI,Razer, Sensor Razer 5G Optico,','Razer,16000 ,  Chroma RGB,16000 DPI,','RAZER NAGA TRINITY'),(12,13,'1,,,,','9,`8,`,6,','INTEL CORE I7 9700K'),(13,14,'1,2,','1,2,','HYPERX FURY S - SPEED - MEDIUM8'),(14,15,'11,','1,','1'),(15,16,'6,','6,','6'),(16,17,'8,','1,','88'),(17,18,'Fabricante,','Aerocool,','AEROCOOL CYLON 600W RGB 80 PLUS BRONZE');
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
  `tbproductoimagennombre` varchar(1000) DEFAULT NULL,
  `tbproductoimagenruta` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`tbproductoimagenid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoimagen`
--

LOCK TABLES `tbproductoimagen` WRITE;
/*!40000 ALTER TABLE `tbproductoimagen` DISABLE KEYS */;
INSERT INTO `tbproductoimagen` VALUES (1,1,'Color Negra 16 pulgadas,Teclado alumbrado,','/tecnotienda/tecnotienda/public/img/1588095381dell-g3-gaming-i5-9300h-gtx-1650-4-gb.jpg,/tecnotienda/tecnotienda/public/img/1588095381dell-g3-gaming-i5-9300h-gtx-1650-4-gb (1).jpg,'),(2,2,'Color Negro Pulgadas 5,','/tecnotienda/tecnotienda/public/img/1588097605tarjetamadre.2jpg.jpg,'),(3,3,'Color Negro,','/tecnotienda/tecnotienda/public/img/1588295809imexx-teclado-ultra-slim-espanol.jpg,'),(4,4,'1,','/tecnotienda/tecnotienda/public/img/1588297083razer-ornata-chroma.jpg,'),(5,5,'Color Negro,','/tecnotienda/tecnotienda/public/img/1588299077cable-hdmi.jpg,'),(6,6,'eclado Steelseries LED Rojo - Nahimic Audio 3 ,','/tecnotienda/tecnotienda/public/img/1588299825msi-gf65-thin-9sd-core-i7-9750h-gtx-1660ti-6-gb.jpg,'),(7,7,'w,','/tecnotienda/tecnotienda/public/img/1588300771msi-gf65-thin-9sd-core-i7-9750h-gtx-1660ti-6-gb.jpg,'),(8,8,'LED 1 color,','/tecnotienda/tecnotienda/public/img/1588300892msi-gf65-thin-9sd-core-i7-9750h-gtx-1660ti-6-gb.jpg,'),(9,9,'9,','/tecnotienda/tecnotienda/public/img/1588300982asus-x512f-core-i7-nvidia-mx230(1).jpg,'),(10,10,'inalambrico,','/tecnotienda/tecnotienda/public/img/1588374780imexx-mouse-wireless-rojo.jpg,'),(11,11,'LED 7 colores,','/tecnotienda/tecnotienda/public/img/1588376592imexx-venom-gaming (1).jpg,'),(12,12,'Incluye 3 caratulas intercambiables para diferentes tipos de juegos,','/tecnotienda/tecnotienda/public/img/1588377278razer-naga-trinity.jpg,'),(13,13,'Frecuencia: 3.6 Ghz / 4.9 Ghz Turbo,pulgadas 3,','/tecnotienda/tecnotienda/public/img/1588378132intel-core-i7-9700k.jpg,'),(14,14,'7,','/tecnotienda/tecnotienda/public/img/1588379379hyperx-fury-s-speed-large (1).jpg,/tecnotienda/tecnotienda/public/img/1588379379hyperx-fury-s-speed-large.jpg,'),(15,18,'Color negro,','/tecnotienda/tecnotienda/public/img/1588381914aerocool-cylon-600w-rgb-80-plus.jpg,');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductoprecio`
--

LOCK TABLES `tbproductoprecio` WRITE;
/*!40000 ALTER TABLE `tbproductoprecio` DISABLE KEYS */;
INSERT INTO `tbproductoprecio` VALUES (1,1,575000,'2020-04-01 00:00:00',675000,'2020-04-28 00:00:00',10),(2,2,38000,'2020-04-18 00:00:00',48000,'2020-04-28 00:00:00',10),(3,3,2000,'2020-04-23 00:00:00',3000,'2020-04-30 00:00:00',10),(4,4,42000,'2020-04-16 00:00:00',52000,'2020-04-30 00:00:00',10),(5,5,1000,'2020-04-04 00:00:00',2000,'2020-04-17 00:00:00',10),(6,6,555000,'2020-04-17 00:00:00',755000,'2020-04-23 00:00:00',20),(7,8,100,'2020-07-30 00:00:00',9,'2020-07-30 00:00:00',99),(8,9,45000,'2020-04-03 00:00:00',340000,'2020-04-30 00:00:00',9),(9,10,3000,'2020-01-01 00:00:00',2000,'2020-01-01 00:00:00',10),(10,7,1111,'2020-01-01 00:00:00',100,'2020-01-01 00:00:00',10),(11,11,3000,'2020-05-01 00:00:00',4000,'2020-05-23 00:00:00',10),(12,12,40000,'2020-05-01 00:00:00',60000,'2020-05-14 00:00:00',20),(13,13,2000000,'2020-05-01 00:00:00',275000,'2020-05-23 00:00:00',7),(14,14,4,'2020-05-09 00:00:00',6,'2020-05-06 00:00:00',6),(15,15,8,'2020-05-08 00:00:00',8,'2020-05-15 00:00:00',19),(16,16,6,'2020-05-08 00:00:00',6,'2020-05-09 00:00:00',6),(17,17,1239,'2020-05-14 00:00:00',8,'2020-05-21 00:00:00',823),(18,18,14000,'2020-01-01 00:00:00',24000,'2020-01-01 00:00:00',10);
/*!40000 ALTER TABLE `tbproductoprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproveedor`
--

DROP TABLE IF EXISTS `tbproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproveedor` (
  `tbproveedorusuario` varchar(40) NOT NULL,
  `tbproveedorcontrasena` varchar(40) DEFAULT NULL,
  `tbempresa` varchar(40) DEFAULT NULL,
  `tbdescripcion` varchar(40) DEFAULT NULL,
  `tbproveedorestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbproveedorusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproveedor`
--

LOCK TABLES `tbproveedor` WRITE;
/*!40000 ALTER TABLE `tbproveedor` DISABLE KEYS */;
INSERT INTO `tbproveedor` VALUES ('1','admin','matchin','me vendio monitores XD',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsubcategoria`
--

LOCK TABLES `tbsubcategoria` WRITE;
/*!40000 ALTER TABLE `tbsubcategoria` DISABLE KEYS */;
INSERT INTO `tbsubcategoria` VALUES (1,1,'Karo','Laptops','Se creó la sub categoria laptops',0,'2020-04-28 00:00:00'),(2,1,'Karo','Gaming','Se creó la sub categoria de computadoras gamming',0,'2020-04-28 00:00:00'),(3,2,'Jaha','Tarjeta Madre','Se creó la Sub Categoría tarjetas madre',0,'2020-04-28 00:00:00'),(4,2,'Jaha','Procesadores','Se creó la Sub Categoría de Procesadores',0,'2020-04-28 00:00:00'),(5,3,'Karo','Teclados','Se añadió la subcategoria de Teclado',0,'2020-04-30 00:00:00'),(6,3,'Karo','Mouse','Se creó la Sub categoría de mouse',0,'2020-04-30 00:00:00'),(7,4,'Jaha','Adaptadores','Se creó la subcategoría de adaptadores',0,'2020-04-30 00:00:00'),(8,4,'Jaha','Cables','Se creó la subcategoria de cables',0,'2020-04-30 00:00:00'),(9,2,'Jaha','Tarjeta de Video','Se creó la sub categoria de tarjetas de video',0,'2020-04-30 00:00:00'),(10,2,'Karo','Fuentes de Podes','Se creó la sub categoria de fuentes de poder',0,'2020-04-30 00:00:00');
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
  `tbclienteusuario` varchar(40) NOT NULL,
  `tbtelefononumero` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`tbtelefononid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtelefono`
--

LOCK TABLES `tbtelefono` WRITE;
/*!40000 ALTER TABLE `tbtelefono` DISABLE KEYS */;
INSERT INTO `tbtelefono` VALUES (1,'1','321,'),(2,'312','123,');
/*!40000 ALTER TABLE `tbtelefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `tbusuarionombre` varchar(50) NOT NULL,
  `tbusuariocontrasennia` varchar(50) NOT NULL,
  `tbusuariotipousuario` int(11) NOT NULL,
  `tbusuarioactivo` int(11) NOT NULL,
  PRIMARY KEY (`tbusuarionombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES ('Jaha','12345',1,0),('Karo','12345',1,0);
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

-- Dump completed on 2020-05-01 19:22:29
