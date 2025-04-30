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
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_tbl` (
  `order_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(6) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `users_id` int(6) DEFAULT NULL,
  `order_status` varchar(30) NOT NULL DEFAULT 'Pending',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_tbl`
--

/*!40000 ALTER TABLE `order_tbl` DISABLE KEYS */;
INSERT INTO `order_tbl` VALUES (4,1,'Banana Cookies',3,'Pending','2025-04-24 01:01:15','2025-04-24 01:01:15'),(5,4,'Devilish Cookies',11,'Pending','2025-04-24 01:02:41','2025-04-24 01:02:41'),(6,10,'Ginger Cookies',7,'Pending','2025-04-24 01:03:01','2025-04-24 01:03:01'),(7,2,'Chocolate Chip Cookies',7,'Pending','2025-04-24 01:03:23','2025-04-24 01:03:23'),(8,2,'Chocolate Chip Cookies',4,'Pending','2025-04-24 01:03:30','2025-04-24 01:03:30'),(9,5,'Peanut Butter Cookies',6,'Pending','2025-04-24 01:03:49','2025-04-24 01:03:49'),(10,6,'Oreo Chunk Cookies',1,'Pending','2025-04-24 01:04:09','2025-04-24 01:04:09'),(11,7,'Strawberry Shortbread Cookies',5,'Pending','2025-04-24 01:04:39','2025-04-24 01:04:39'),(12,8,'Grandma Sugar Cookies',4,'Pending','2025-04-24 01:05:06','2025-04-24 01:05:06'),(13,8,'Grandma Sugar Cookies',8,'Pending','2025-04-24 01:05:10','2025-04-24 01:05:10'),(14,10,'Ginger Cookies',12,'Pending','2025-04-26 22:11:36','2025-04-26 22:11:36'),(15,12,'Empress Cookie',20,'Pending','2025-04-26 22:52:05','2025-04-26 22:52:05'),(16,7,'Strawberry Shortbread Cookies',15,'Pending','2025-04-26 22:53:32','2025-04-26 22:53:32'),(17,7,'Strawberry Shortbread Cookies',15,'Pending','2025-04-26 22:54:01','2025-04-26 22:54:01'),(18,8,'Grandma Sugar Cookies',5,'Pending','2025-04-26 22:54:36','2025-04-26 22:54:36'),(19,10,'Ginger Cookies',19,'Pending','2025-04-26 22:55:23','2025-04-26 22:55:23'),(20,4,'Devilish Cookies',13,'Pending','2025-04-26 23:41:18','2025-04-26 23:41:18'),(21,4,'Devilish Cookies',13,'Pending','2025-04-26 23:41:55','2025-04-26 23:41:55'),(22,4,'Devilish Cookies',13,'Pending','2025-04-26 23:42:30','2025-04-26 23:42:30'),(23,9,'Black & White Cookie',18,'Pending','2025-04-27 02:19:52','2025-04-27 02:19:52'),(24,9,'Black & White Cookie',18,'Pending','2025-04-27 02:21:14','2025-04-27 02:21:14');
/*!40000 ALTER TABLE `order_tbl` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-30  4:07:00
