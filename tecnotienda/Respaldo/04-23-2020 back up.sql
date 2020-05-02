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
  `tbcategorianombre` varchar(30) NOT NULL,
  PRIMARY KEY (`tbcategoriaid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategoria`
--

LOCK TABLES `tbcategoria` WRITE;
/*!40000 ALTER TABLE `tbcategoria` DISABLE KEYS */;
INSERT INTO `tbcategoria` VALUES (16,'Componentess'),(18,'Computadorass');
/*!40000 ALTER TABLE `tbcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `tbclienteid` int(11) NOT NULL,
  `tbclientenombre` varchar(25) NOT NULL,
  `tbclienteapellido1` varchar(25) NOT NULL,
  `tbclienteapellido2` varchar(25) NOT NULL,
  `tbclientecorreo1` varchar(25) NOT NULL,
  `tbclientecorreo2` varchar(25) NOT NULL,
  `tbclientetelefono1` varchar(25) NOT NULL,
  `tbclientetelefono2` varchar(25) NOT NULL,
  `tbclientedireccion` varchar(25) NOT NULL,
  `tbclientecontrasenia` varchar(25) NOT NULL,
  `tbclientetipousuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbclienteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (0,'KARO','Montenegro','Guzmán','karoll@gmail.com','karol','1','1','1','1',0),(1,'MAIKEL','Ortiz','Gonzales','maikel@gmail.com','m@gmail.com','1234','9128','Turrialba','1234',0),(8,'Jaha','Rivera','Barboza','jaha@gmail.com','jahari@gmail.com','89029017','124','Turri','843',0),(9,'Calidad','Calidad','Calidad','calidad@gmail.com','cali@gmail.com','4567890','9876543','Turri','793',0);
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproducto`
--

DROP TABLE IF EXISTS `tbproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproducto` (
  `tbproductoid` int(11) NOT NULL AUTO_INCREMENT,
  `tbproductonombre` varchar(30) NOT NULL,
  `tbproductoimagen` varchar(255) NOT NULL,
  `tbproductoprecio` double NOT NULL,
  `tbproductodescripcion` varchar(70) NOT NULL,
  `tbproductocantidad` int(11) NOT NULL,
  `tbproductosubcategoriaid` int(11) NOT NULL,
  PRIMARY KEY (`tbproductoid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducto`
--

LOCK TABLES `tbproducto` WRITE;
/*!40000 ALTER TABLE `tbproducto` DISABLE KEYS */;
INSERT INTO `tbproducto` VALUES (1,'Hp','/tecnotienda/tecnotienda/public/img/1587695371Drupal_logo.png',450000,'Tiene un procesador Core i 5',100,3),(2,'Toshiba','/tecnotienda/tecnotienda/public/img/1587695383wordpress.png',67,'8',88,3),(3,'0','/tecnotienda/tecnotienda/public/img/1587695396css-logo.png',0,'0',0,3),(4,'1','ja',1,'da',1,1),(5,'Hp','/tecnotienda/tecnotienda/public/img/1587695434pagina-web-1.png',500000,'Es una gama alta de computadoras...',10,5);
/*!40000 ALTER TABLE `tbproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproveedor`
--

DROP TABLE IF EXISTS `tbproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproveedor` (
  `tbproveedorid` int(11) NOT NULL,
  `tbproveedornombreempresa` varchar(300) NOT NULL,
  `tbproveedorfax` varchar(300) NOT NULL,
  `tbproveedorapartadopostal` int(11) DEFAULT NULL,
  `tbproveedorcorreo` varchar(50) NOT NULL,
  `tbproveedorsitioweb` varchar(50) NOT NULL,
  `tbproveedorpersonadecontacto` varchar(50) NOT NULL,
  `tbproveedornumerotelefono` varchar(25) NOT NULL,
  `tbproveedordireccionfisicaempresa` varchar(50) NOT NULL,
  PRIMARY KEY (`tbproveedorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproveedor`
--

LOCK TABLES `tbproveedor` WRITE;
/*!40000 ALTER TABLE `tbproveedor` DISABLE KEYS */;
INSERT INTO `tbproveedor` VALUES (1,'Scrimix','25524040',3024,'scrimix@gmai.com','http://extremetechcr.com/tienda/','Julian','7890-11-22','San Jose');
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
  `tbsubcategorianombre` varchar(30) NOT NULL,
  `tbcategoriaid` int(11) NOT NULL,
  PRIMARY KEY (`tbsubcategoriaid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsubcategoria`
--

LOCK TABLES `tbsubcategoria` WRITE;
/*!40000 ALTER TABLE `tbsubcategoria` DISABLE KEYS */;
INSERT INTO `tbsubcategoria` VALUES (3,'Monitores',16),(4,'Procesadores',16),(5,'Laptopss',16);
/*!40000 ALTER TABLE `tbsubcategoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 23:14:06
