-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cricket
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `owner_name` varchar(25) DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `phone_no` bigint(20) NOT NULL,
  PRIMARY KEY (`owner_id`,`team_id`),
  UNIQUE KEY `team_id` (`team_id`,`owner_name`,`phone_no`),
  KEY `team_id_index` (`team_id`),
  KEY `adm_id_index` (`adm_id`),
  KEY `phone_no_index` (`phone_no`),
  CONSTRAINT `owner_ibfk_2` FOREIGN KEY (`adm_id`) REFERENCES `admin` (`adm_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `owner_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner`
--

LOCK TABLES `owner` WRITE;
/*!40000 ALTER TABLE `owner` DISABLE KEYS */;
INSERT INTO `owner` VALUES (10101,7,'Neeta Ambani',1,455552165),(10102,1,'Sharukh Khan',1,516841351),(10103,7,'Akash Ambani',1,354813515),(10104,4,'Preity Jinta',1,318943451),(10105,1,'Jay Mehta',1,4864684354),(10106,4,'Karan Paul',1,5348413518),(10107,4,'Mohit Burman',1,8416845131),(10108,3,'N. Sreenivasan',1,8646484894),(10109,8,'Gayatri Reddy',1,8468468413),(10110,5,'Shilpa Shetty',1,8646844411),(10111,5,'Manoj Badale',1,84684613444),(10112,5,'Suresh Chellaram',1,4864684684),(10113,6,'G.M. Rao',1,84684684648),(10114,2,'Vijay Mallya',1,8464648684),(10115,8,'Kalanithi Maran',1,84684646468);
/*!40000 ALTER TABLE `owner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-05 15:38:35
