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
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(45) NOT NULL,
  `won` int(11) DEFAULT NULL,
  `lost` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `trophies` int(11) DEFAULT NULL,
  `net_runrate` float(7,4) DEFAULT NULL,
  `capt_id` int(11) DEFAULT NULL,
  `adm_id` int(11) NOT NULL,
  `fours` int(11) DEFAULT NULL,
  `sixes` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_id`),
  UNIQUE KEY `team_name` (`team_name`),
  KEY `won_index` (`won`),
  KEY `lost_index` (`lost`),
  KEY `runs_index` (`runs`),
  KEY `wickets_index` (`wickets`),
  KEY `trophies_index` (`trophies`),
  KEY `net_runrate_index` (`net_runrate`),
  KEY `adm_id_index` (`adm_id`),
  KEY `fours_index` (`fours`),
  KEY `sixes_index` (`sixes`),
  KEY `capt_idx` (`capt_id`),
  CONSTRAINT `capt` FOREIGN KEY (`capt_id`) REFERENCES `player` (`player_id`),
  CONSTRAINT `team_ibfk_2` FOREIGN KEY (`adm_id`) REFERENCES `admin` (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Kolkata knight riders',5,6,1602,70,2,1.1543,1,1,162,75,1015),(2,'Royal Challengers Bangalore',4,10,1865,65,0,-1.1242,175,1,187,59,1011),(3,'Chennai Super Kings',9,7,2365,93,4,1.2620,20,1,244,86,1018),(4,'Kings XI Punjab',10,5,2332,95,0,1.3456,27,1,231,95,1012),(5,'Rajasthan Royals',13,3,2662,109,1,-1.3011,38,1,258,85,1016),(6,'Delhi Daredevils',7,7,2000,96,0,-1.2680,41,1,218,54,1013),(7,'Mumbai Indians',7,7,1851,94,3,1.1977,133,1,197,76,1014),(8,'sun risers hyderabad',2,12,2121,66,2,-2.7680,55,1,205,92,1017);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-05 15:38:33
