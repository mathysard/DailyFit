-- Host: localhost    Database: dailyfit

-- ------------------------------------------------------

-- Server version	8.0.37



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

-- Table structure for table `daily_activity`

--



DROP TABLE IF EXISTS `daily_activity`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE `daily_activity` (

  `id` int NOT NULL AUTO_INCREMENT,

  `is_done` varchar(3) DEFAULT 'Yes',

  `description` longtext,

  `user_id` int DEFAULT NULL,

  `status` varchar(1) DEFAULT 'A',

  `is_active` tinyint DEFAULT '1',

  `created_at` varchar(255) DEFAULT NULL,

  `created_by` int DEFAULT NULL,

  `updated_at` timestamp NULL DEFAULT NULL,

  `updated_by` int DEFAULT NULL,

  PRIMARY KEY (`id`),

  KEY `user_id` (`user_id`),

  CONSTRAINT `daily_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*!40101 SET character_set_client = @saved_cs_client */;



--

-- Dumping data for table `daily_activity`

--



/*!40000 ALTER TABLE `daily_activity` ENABLE KEYS */;

UNLOCK TABLES;



--

-- Table structure for table `users`

--



DROP TABLE IF EXISTS `users`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE `users` (

  `id` int NOT NULL AUTO_INCREMENT,

  `firstname` varchar(255) DEFAULT NULL,

  `lastname` varchar(255) DEFAULT NULL,

  `email` varchar(255) DEFAULT NULL,

  `image` varchar(255) DEFAULT NULL,

  `password` varchar(255) DEFAULT NULL,

  `status` varchar(1) DEFAULT 'A',

  `is_active` tinyint DEFAULT '1',

  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,

  `created_by` int DEFAULT NULL,

  `updated_at` timestamp NULL DEFAULT NULL,

  `updated_by` int DEFAULT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*!40101 SET character_set_client = @saved_cs_client */;



--

-- Dumping data for table `users`

--



/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



-- Dump completed on 2024-09-15 15:36:29
