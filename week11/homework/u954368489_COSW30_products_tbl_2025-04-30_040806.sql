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
-- Table structure for table `products_tbl`
--

DROP TABLE IF EXISTS `products_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_tbl` (
  `product_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` double(10,2) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tbl`
--

/*!40000 ALTER TABLE `products_tbl` DISABLE KEYS */;
INSERT INTO `products_tbl` VALUES (1,'Banana Cookies','Banana, Shortbread',2.49,'2025-04-22 18:04:46','2025-04-22 19:25:59'),(2,'Chocolate Chip Cookies','Original chocolate chip cookie',2.99,'2025-04-22 19:17:58','2025-04-22 19:17:58'),(3,'Oatmeal Raisin Cookies','Oatmeal and Raisins',1.99,'2025-04-22 19:18:51','2025-04-22 19:18:51'),(4,'Devilish Cookies','White chocolate, chocolate chips, peanut butter',1.99,'2025-04-22 19:19:39','2025-04-22 19:19:39'),(5,'Peanut Butter Cookies','Peanut Butter, Walnuts',1.49,'2025-04-22 19:20:27','2025-04-22 19:20:27'),(6,'Oreo Chunk Cookies','Oreos, Peanut Butter, Chocolate Chips',2.49,'2025-04-22 19:21:28','2025-04-22 19:21:28'),(7,'Strawberry Shortbread Cookies','Strawberries, White Chocolate',2.99,'2025-04-22 19:22:24','2025-04-22 19:22:24'),(8,'Grandma Sugar Cookies','Graham, Shortbread',2.99,'2025-04-22 19:23:24','2025-04-22 19:23:24'),(9,'Black & White Cookie','Dark Chocolate, White Chocolate',1.99,'2025-04-22 19:24:18','2025-04-22 19:24:18'),(10,'Ginger Cookies','Ginger, Shortbread',1.49,'2025-04-22 19:24:58','2025-04-22 19:24:58'),(11,'LA BIG Cookie','2lb Cookie',7.99,'2025-04-25 05:05:21','2025-04-25 05:05:21'),(12,'Empress Cookie','3lb, Butter Toffee, Chocolate Chips',5.99,'2025-04-26 20:44:38','2025-04-26 20:44:38'),(13,'Backstreet Cookies','Dark chocolate chips, Butter Cream, sea salt',5.99,'2025-04-26 21:34:31','2025-04-26 21:34:31'),(14,'Backstreet Cookies','Dark chocolate chips, Butter Cream, sea salt',5.99,'2025-04-27 00:52:24','2025-04-27 00:52:24'),(15,'Cookie Monster Cookies','Chocolate Chips, Oreo Chunks, Herseys chocolate pieces',4.49,'2025-04-27 02:18:45','2025-04-27 02:18:45'),(16,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:05:03','2025-04-27 03:05:03'),(17,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:11:25','2025-04-27 03:11:25'),(18,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:11:47','2025-04-27 03:11:47'),(19,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:12:26','2025-04-27 03:12:26'),(20,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:12:54','2025-04-27 03:12:54'),(21,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:13:11','2025-04-27 03:13:11'),(22,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:13:25','2025-04-27 03:13:25'),(23,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:15:39','2025-04-27 03:15:39'),(24,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:16:29','2025-04-27 03:16:29'),(25,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:16:59','2025-04-27 03:16:59'),(26,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:19:00','2025-04-27 03:19:00'),(27,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:22:29','2025-04-27 03:22:29'),(28,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:22:43','2025-04-27 03:22:43'),(29,'Butter Scotch Cookies','Butter Scotch, Shortbread',2.99,'2025-04-27 03:22:56','2025-04-27 03:22:56');
/*!40000 ALTER TABLE `products_tbl` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-30  4:08:21
