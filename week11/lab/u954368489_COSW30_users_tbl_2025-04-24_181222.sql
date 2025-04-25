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
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` VALUES (1,'Baron','Munchausen','customer','baron@munchausen.org','2025-04-22 15:52:21','2025-04-22 15:52:21'),(3,'Coby','Esters','customer','ironchefjayy@gmail.com','2025-04-22 17:32:05','2025-04-22 17:32:05'),(4,'Mathew','Pendagrass','customer','mattdawg@gmail.com','2025-04-22 17:32:50','2025-04-22 17:32:50'),(5,'Bryan','Williams','customer','Bsmitty@yahoo.com','2025-04-22 17:33:19','2025-04-22 17:33:19'),(6,'Ricardo','Shottenheimer','customer','riciam@msnbc.com','2025-04-22 17:34:37','2025-04-22 17:34:37'),(7,'Stacy','Richardson','customer','stacespace@yahoo.com','2025-04-22 17:35:41','2025-04-22 17:35:41'),(8,'Viktor','Von Doom','customer','vikvaugn@battleworld.com','2025-04-22 17:36:37','2025-04-22 17:36:37'),(9,'Elaine','Bennis','customer','elaine@seinfeld.com','2025-04-22 17:37:13','2025-04-22 17:37:13'),(10,'Tonya','Fields','customer','the_field@gmail.com','2025-04-22 17:37:57','2025-04-22 17:37:57'),(11,'Jean','Gray','customer','therealjean@xmen.com','2025-04-22 17:39:08','2025-04-22 17:39:08');
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-24 18:13:32
