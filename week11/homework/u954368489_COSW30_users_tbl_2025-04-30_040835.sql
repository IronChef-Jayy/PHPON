-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 217.21.77.101    Database: u954368489_COSW30
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_tbl` (
  `users_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_role` varchar(30) NOT NULL DEFAULT 'customer',
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` VALUES (1,'Baron','Munchausen','customer','baron@munchausen.org',NULL,'2025-04-22 15:52:21','2025-04-22 15:52:21'),(3,'Coby','Esters','customer','ironchefjayy@gmail.com',NULL,'2025-04-22 17:32:05','2025-04-22 17:32:05'),(4,'Mathew','Pendagrass','customer','mattdawg@gmail.com',NULL,'2025-04-22 17:32:50','2025-04-22 17:32:50'),(5,'Bryan','Williams','customer','Bsmitty@yahoo.com',NULL,'2025-04-22 17:33:19','2025-04-22 17:33:19'),(6,'Ricardo','Shottenheimer','customer','riciam@msnbc.com',NULL,'2025-04-22 17:34:37','2025-04-22 17:34:37'),(7,'Stacy','Richardson','customer','stacespace@yahoo.com',NULL,'2025-04-22 17:35:41','2025-04-22 17:35:41'),(8,'Viktor','Von Doom','customer','vikvaugn@battleworld.com',NULL,'2025-04-22 17:36:37','2025-04-22 17:36:37'),(9,'Elaine','Bennis','customer','elaine@seinfeld.com',NULL,'2025-04-22 17:37:13','2025-04-22 17:37:13'),(10,'Tonya','Fields','customer','the_field@gmail.com',NULL,'2025-04-22 17:37:57','2025-04-22 17:37:57'),(11,'Jean','Gray','customer','therealjean@xmen.com',NULL,'2025-04-22 17:39:08','2025-04-22 17:39:08'),(12,'Sherman','Klump','customer','klumplump@sherman.com','Special','2025-04-25 03:00:19','2025-04-25 03:00:19'),(13,'Lucy','Ricardo','customer','lucyyyyyyyyy@ricky.com','lucyrickyfredethel','2025-04-26 22:26:47','2025-04-26 22:26:47'),(14,'Al','Bundy','customer','3none@polkhigh.com','nomams','2025-04-26 22:28:26','2025-04-26 22:28:26'),(15,'Penny','Hardawar','customer','penny101@magic.com','numberone1','2025-04-26 22:30:17','2025-04-26 22:30:17'),(16,'Freddy','Flinstone','customer','doublef@bedrock.com','wilma','2025-04-26 22:31:48','2025-04-26 22:31:48'),(17,'Reed','Richardson','customer','almostfantasic@marvel.com','stagefright','2025-04-26 22:32:51','2025-04-26 22:32:51'),(18,'Jim','Helpert','customer','funniest@theoffice.com','pamstheone','2025-04-26 22:34:28','2025-04-26 22:34:28'),(19,'Simon','Phoenix','customer','demolition@man.com','thefutureisnow','2025-04-26 22:36:15','2025-04-26 22:36:15'),(20,'M','Bison','customer','dictator@shadaloo.com','japanvega','2025-04-26 22:37:26','2025-04-26 22:37:26'),(21,'Charles','Xavior','customer','leader@thexmen','genosha','2025-04-26 22:39:54','2025-04-26 22:39:54'),(22,'Charles','Xavior','customer','leader@thexmen','genosha','2025-04-26 23:07:24','2025-04-26 23:07:24'),(23,'Stanley','Steamer','customer','sscarp@cleaner.com','carpetcleaner','2025-04-27 02:17:09','2025-04-27 02:17:09'),(24,'Stanley','Steamer','customer','sscarp@cleaner.com','carpetcleaner','2025-04-27 02:17:23','2025-04-27 02:17:23'),(25,'Stanley','Steamer','customer','sscarp@cleaner.com','carpetcleaner','2025-04-27 02:17:42','2025-04-27 02:17:42'),(26,'Seymore','Skinner','customer','springfield@principal.com','mother','2025-04-27 02:22:38','2025-04-27 02:22:38');
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-30  4:08:46
