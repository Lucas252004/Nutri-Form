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
-- Table structure for table `nutrientes`
--

DROP TABLE IF EXISTS `nutrientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nutrientes` (
  `idnutrientes` int NOT NULL AUTO_INCREMENT,
  `proteinas` varchar(45) DEFAULT NULL,
  `grasasTotales` varchar(45) DEFAULT NULL,
  `sodio` varchar(45) DEFAULT NULL,
  `calorias` varchar(45) DEFAULT NULL,
  `valorEnergetico` varchar(45) DEFAULT NULL,
  `carbohidratos` varchar(45) DEFAULT NULL,
  `productos_idproductos` int NOT NULL,
  PRIMARY KEY (`idnutrientes`,`productos_idproductos`),
  KEY `fk_nutrientes_productos_idx` (`productos_idproductos`),
  CONSTRAINT `fk_nutrientes_productos` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nutrientes`
--

LOCK TABLES `nutrientes` WRITE;
/*!40000 ALTER TABLE `nutrientes` DISABLE KEYS */;
INSERT INTO `nutrientes` VALUES (1,'123','123','123','123','123','123',13);
/*!40000 ALTER TABLE `nutrientes` ENABLE KEYS */;
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
