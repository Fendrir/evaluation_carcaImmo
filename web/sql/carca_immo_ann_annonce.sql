-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: carca_immo
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ann_annonce`
--

DROP TABLE IF EXISTS `ann_annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ann_annonce` (
  `ann_id` int(11) NOT NULL AUTO_INCREMENT,
  `ann_titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ann_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ann_nb_pieces` int(11) NOT NULL,
  `ann_prix` double NOT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `cli_id` int(11) DEFAULT NULL,
  `typ_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ann_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ann_id`),
  KEY `IDX_466D3B104E949F2D` (`adm_id`),
  KEY `IDX_466D3B10BC4EE2B0` (`cli_id`),
  KEY `IDX_466D3B10278CD074` (`typ_id`),
  CONSTRAINT `FK_466D3B10278CD074` FOREIGN KEY (`typ_id`) REFERENCES `typ_type` (`typ_id`),
  CONSTRAINT `FK_466D3B104E949F2D` FOREIGN KEY (`adm_id`) REFERENCES `adm_administrateur` (`adm_id`),
  CONSTRAINT `FK_466D3B10BC4EE2B0` FOREIGN KEY (`cli_id`) REFERENCES `cli_client` (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ann_annonce`
--

LOCK TABLES `ann_annonce` WRITE;
/*!40000 ALTER TABLE `ann_annonce` DISABLE KEYS */;
INSERT INTO `ann_annonce` VALUES (1,'maison de jardin','une photo',5,50000,1,1,1,NULL,''),(2,'un appart trop cool','une photo',3,25000,1,2,2,NULL,''),(3,'Super appart a vendre très ... \"rose\"','une photo',4,45000,1,3,3,NULL,''),(4,'test immo','5a78b710b99fb967919091.png',8,220000,1,2,1,'2018-02-05 20:57:04','ceci est une super descrition de ma maison de riche aller ! Ciao !');
/*!40000 ALTER TABLE `ann_annonce` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-05 23:09:55
