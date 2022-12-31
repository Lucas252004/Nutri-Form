-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb2
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idproductos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `aptoVegano` tinyint DEFAULT NULL,
  `aptoCeliaco` tinyint DEFAULT NULL,
  `nutrienteCritico` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `aptoVegetariano` tinyint DEFAULT NULL,
  `codigos_barras_idcodigos_barras` int NOT NULL,
  PRIMARY KEY (`idproductos`,`codigos_barras_idcodigos_barras`),
  KEY `fk_productos_codigos_barras1_idx` (`codigos_barras_idcodigos_barras`),
  CONSTRAINT `fk_productos_codigos_barras1` FOREIGN KEY (`codigos_barras_idcodigos_barras`) REFERENCES `codigos_barras` (`idcodigos_barras`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Producto2',1,0,NULL,NULL,1,3),(2,'Producto_Prueba',0,1,NULL,NULL,1,4),(3,'Producto4',1,1,NULL,NULL,0,5),(4,'Coca-cola',1,1,NULL,NULL,1,6),(5,'Pepsi',1,1,NULL,NULL,1,7),(6,'Bizcochos de Grasa',1,0,NULL,NULL,0,8),(7,'Bizcochos de Grasa',1,0,NULL,NULL,0,9),(8,'Bizcochos de Grasa',1,0,NULL,NULL,0,10),(9,'Bizcochos de Grasa',1,0,NULL,NULL,0,11),(10,'fsdfsdf',0,0,NULL,NULL,0,12),(11,'fsdfsdf',0,0,NULL,NULL,0,14),(12,'sdfsdfwefwer',0,1,NULL,NULL,1,15),(13,'Nuevo Producto 2',1,1,NULL,NULL,0,16);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-09 22:07:38
