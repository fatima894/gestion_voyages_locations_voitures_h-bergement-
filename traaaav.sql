-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: travel
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airports` (
  `airport_id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`airport_id`),
  KEY `street_id` (`street_id`),
  CONSTRAINT `airports_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `street_addresses` (`street_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airports`
--

LOCK TABLES `airports` WRITE;
/*!40000 ALTER TABLE `airports` DISABLE KEYS */;
INSERT INTO `airports` VALUES (1,'Berlin airport',2,'2022-05-01 07:49:39','2022-05-01 07:49:39'),(2,'Paris airport',3,NULL,NULL),(3,'Kenitra Airport',5,'2022-05-14 07:53:44','2022-05-14 07:53:44'),(4,'Casablanca Airport',6,'2022-05-14 07:54:15','2022-05-14 07:54:15'),(5,'Laâyoune Airport',7,'2022-05-14 07:55:17','2022-05-14 07:55:17'),(6,'Tetouan Airport',9,'2022-05-14 07:57:15','2022-05-14 07:57:15'),(7,'Zagora Airport',8,'2022-05-14 07:57:41','2022-05-14 07:57:41'),(8,'Fes Airport',10,'2022-05-22 22:26:06','2022-05-22 22:26:06'),(9,'Ouarzazate Airport',12,'2022-05-22 22:26:34','2022-05-22 22:26:34'),(10,'Rabat-Salé Airport',13,'2022-05-22 22:26:58','2022-05-22 22:26:58'),(11,'Tan Tan Airport',15,'2022-05-22 22:27:14','2022-05-22 22:27:14');
/*!40000 ALTER TABLE `airports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_companies`
--

DROP TABLE IF EXISTS `car_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_companies` (
  `car_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_company_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`car_company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_companies`
--

LOCK TABLES `car_companies` WRITE;
/*!40000 ALTER TABLE `car_companies` DISABLE KEYS */;
INSERT INTO `car_companies` VALUES (1,'Volkswagen Group',NULL,NULL),(2,'Ferrari',NULL,NULL),(3,'BMW Group',NULL,NULL),(4,'Toyota',NULL,NULL),(5,'Honda','2022-05-10 15:43:17','2022-05-10 15:43:17'),(6,'Hyundai',NULL,NULL),(7,'Ford',NULL,NULL),(8,'Kia',NULL,NULL),(9,'Renault',NULL,NULL),(10,'Nissan',NULL,NULL),(11,'Audi',NULL,NULL),(12,'Mercedes',NULL,NULL),(13,'Golf','2022-06-13 11:15:04','2022-06-13 11:15:04');
/*!40000 ALTER TABLE `car_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_details`
--

DROP TABLE IF EXISTS `car_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_details` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `adress_id` int(11) NOT NULL,
  `car_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_at_page` tinyint(2) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `adress_id` (`adress_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `car_details_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `street_addresses` (`street_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `car_details_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `car_companies` (`car_company_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_details`
--

LOCK TABLES `car_details` WRITE;
/*!40000 ALTER TABLE `car_details` DISABLE KEYS */;
INSERT INTO `car_details` VALUES (2,11,8,'Audi s6','OS75845',1,500,'audi3.jpg',NULL,NULL),(3,11,12,'Audi s5 v2022','BN47584',1,250,'audi.jpg',NULL,NULL),(4,12,6,'Mercedes A9','HG54632',1,350,'mercedes.jpg',NULL,NULL),(7,6,9,'Hyundai H4','BF45798',1,1000,'hyundai.webp','2022-05-22 23:14:33','2022-05-22 23:14:33'),(8,9,8,'Renault s8','AF12376',1,500,'voiture25.jpg','2022-06-13 11:13:15','2022-06-13 11:13:15'),(10,12,15,'Mercedes g56','DG1234',1,500,'voiture22.jpg','2022-06-13 11:20:59','2022-06-13 11:20:59');
/*!40000 ALTER TABLE `car_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_reservations`
--

DROP TABLE IF EXISTS `car_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_reservations` (
  `car_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `reservation_car_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `return_date` date NOT NULL,
  `return_time` time NOT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `reservation_price` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`car_reservation_id`),
  KEY `car_id` (`reservation_car_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `car_reservations_ibfk_1` FOREIGN KEY (`reservation_car_id`) REFERENCES `car_details` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `car_reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_reservations`
--

LOCK TABLES `car_reservations` WRITE;
/*!40000 ALTER TABLE `car_reservations` DISABLE KEYS */;
INSERT INTO `car_reservations` VALUES (3,3,3,'2022-05-10','15:04:13','2022-05-17','09:04:13',0,0,'cancelled',NULL,NULL),(6,4,3,'2022-05-17','02:00:00','2022-05-19','03:00:00',0,250,'active','2022-05-15 05:17:19','2022-05-15 05:17:19'),(7,3,2,'2022-05-10','02:00:00','2022-05-18','02:30:00',0,500,'active','2022-05-19 17:23:36','2022-05-19 17:23:36'),(8,6,2,'2022-05-19','04:00:00','2022-05-25','04:00:00',0,500,'wait','2022-05-22 21:55:09','2022-05-22 21:55:09'),(9,5,4,'2022-05-17','00:10:45','2022-05-20','00:12:45',0,1000,'active',NULL,NULL),(10,2,7,'2022-06-26','08:00:00','2022-06-28','13:00:00',0,1000,'wait','2022-05-22 23:15:31','2022-05-22 23:15:31'),(11,2,3,'2022-06-16','01:00:00','2022-06-23','01:00:00',0,250,'wait','2022-06-11 07:48:11','2022-06-11 07:48:11'),(12,2,3,'2022-06-23','15:30:00','2022-06-26','14:30:00',0,250,'wait','2022-06-11 18:51:48','2022-06-11 18:51:48'),(13,2,3,'2022-06-23','15:30:00','2022-06-26','14:30:00',0,250,'wait','2022-06-11 18:53:00','2022-06-11 18:53:00'),(14,6,7,'2022-06-23','18:30:00','2022-06-25','19:00:00',0,1000,'active','2022-06-12 21:21:26','2022-06-12 21:21:26'),(15,2,3,'2022-06-15','01:30:00','2022-06-16','06:30:00',0,250,'wait','2022-06-12 23:11:47','2022-06-12 23:11:47'),(16,2,7,'2022-06-22','00:00:00','2022-06-24','00:00:00',0,1000,'active','2022-06-13 10:01:33','2022-06-13 10:01:33'),(17,2,4,'2022-06-06','00:30:00','2022-06-08','05:30:00',2,700,'active','2022-06-16 07:47:10','2022-06-16 07:47:10'),(18,7,8,'2022-06-22','09:30:00','2022-06-23','09:30:00',1,500,'active','2022-06-16 20:19:35','2022-06-16 20:19:35');
/*!40000 ALTER TABLE `car_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Berlin',2,NULL,NULL),(2,'Clausthal',2,NULL,NULL),(5,'Kenitra',1,'2022-05-14 07:33:50','2022-05-14 07:33:50'),(6,'Casablanca',1,'2022-05-14 07:33:55','2022-05-14 07:33:55'),(7,'Marrakech',1,'2022-05-14 07:34:12','2022-05-14 07:34:12'),(8,'Oujda',1,'2022-05-14 07:34:24','2022-05-14 07:34:24'),(9,'Agadir',1,'2022-05-14 07:34:39','2022-05-14 07:34:39'),(10,'Tanger',1,'2022-05-14 07:34:55','2022-05-14 07:34:55'),(11,'Nador',1,'2022-05-14 07:35:51','2022-05-14 07:35:51'),(12,'Fes',1,'2022-05-14 07:36:02','2022-05-14 07:36:02'),(13,'Ouarzazate',1,'2022-05-14 07:36:59','2022-05-14 07:36:59'),(14,'Tetouan',1,'2022-05-14 07:37:12','2022-05-14 07:37:12'),(15,'Zagora',1,'2022-05-14 07:37:44','2022-05-14 07:37:44'),(16,'Laâyoune',1,'2022-05-14 07:37:55','2022-05-14 07:37:55'),(17,'Salé',1,'2022-05-14 07:38:28','2022-05-14 07:38:28'),(18,'Tan Tan',1,'2022-05-14 07:38:46','2022-05-14 07:38:46'),(20,'Agadir',1,'2022-05-23 07:18:57','2022-05-23 07:18:57'),(21,'Istanbul',10,'2022-05-23 07:19:08','2022-05-23 07:19:08'),(22,'Al-kahira',9,'2022-05-23 07:19:28','2022-05-23 07:19:28'),(23,'Tunisie',8,'2022-05-23 07:19:38','2022-05-23 07:19:38'),(24,'Al-Jadida',1,'2022-05-23 07:20:16','2022-05-23 07:20:16');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Morocco',NULL,NULL),(2,'Germany',NULL,NULL),(3,'UK',NULL,NULL),(4,'USA',NULL,NULL),(7,'France','2022-05-14 07:39:10','2022-05-14 07:39:10'),(8,'Tunisie','2022-05-14 07:39:22','2022-05-14 07:39:22'),(9,'Egypt','2022-05-14 07:39:28','2022-05-14 07:39:28'),(10,'Turquie','2022-05-14 07:40:02','2022-05-14 07:40:02'),(11,'Emirates','2022-05-14 07:40:19','2022-05-14 07:40:19');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directions`
--

DROP TABLE IF EXISTS `directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directions` (
  `direction_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_airport_id` int(11) NOT NULL,
  `to_airport_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`direction_id`),
  KEY `from_airport_id` (`from_airport_id`),
  KEY `to_airport_id` (`to_airport_id`),
  CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`from_airport_id`) REFERENCES `airports` (`airport_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `directions_ibfk_2` FOREIGN KEY (`to_airport_id`) REFERENCES `airports` (`airport_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directions`
--

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;
INSERT INTO `directions` VALUES (1,1,2,NULL,NULL),(2,2,1,'2022-05-01 09:22:55','2022-05-01 09:22:55'),(4,3,5,'2022-05-14 08:02:49','2022-05-14 08:02:49'),(5,4,1,'2022-05-14 08:02:59','2022-05-14 08:02:59'),(6,5,6,'2022-05-14 08:04:31','2022-05-14 08:04:31'),(7,7,4,'2022-05-14 08:04:47','2022-05-14 08:04:47'),(8,3,7,'2022-05-20 13:54:46','2022-05-20 13:54:46'),(9,1,11,'2022-05-22 22:27:44','2022-05-22 22:27:44'),(10,3,9,'2022-05-22 22:27:57','2022-05-22 22:27:57'),(11,5,10,'2022-05-22 22:28:11','2022-05-22 22:28:11'),(12,10,11,'2022-05-22 22:28:21','2022-05-22 22:28:21'),(13,11,8,'2022-05-22 22:28:42','2022-05-22 22:28:42');
/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight_reservations`
--

DROP TABLE IF EXISTS `flight_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_reservations` (
  `flight_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `flight_detail_id` int(11) NOT NULL,
  `reservation_price` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flight_reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight_reservations`
--

LOCK TABLES `flight_reservations` WRITE;
/*!40000 ALTER TABLE `flight_reservations` DISABLE KEYS */;
INSERT INTO `flight_reservations` VALUES (1,3,4,3000,'cancelled','2022-05-15 17:00:30','2022-05-15 17:00:30'),(2,2,18,5199.35,'paid','2022-06-06 00:12:40','2022-06-06 00:12:40'),(3,2,21,5699,'wait','2022-06-06 11:28:01','2022-06-06 11:28:01'),(4,2,20,5000,'wait','2022-06-06 11:29:39','2022-06-06 11:29:39'),(5,2,21,5699,'wait','2022-06-08 23:05:58','2022-06-08 23:05:58'),(6,2,15,4999,'wait','2022-06-11 07:06:34','2022-06-11 07:06:34'),(7,2,20,5000,'wait','2022-06-11 19:04:40','2022-06-11 19:04:40'),(8,2,20,5000,'wait','2022-06-11 19:04:53','2022-06-11 19:04:53'),(9,2,18,7999,'wait','2022-06-11 19:05:41','2022-06-11 19:05:41'),(10,2,16,7000,'wait','2022-06-11 19:05:55','2022-06-11 19:05:55'),(11,2,17,5999,'wait','2022-06-11 19:06:10','2022-06-11 19:06:10'),(12,2,21,2849.5,'wait','2022-06-11 19:09:13','2022-06-11 19:09:13'),(13,2,18,7999,'wait','2022-06-11 19:32:51','2022-06-11 19:32:51'),(14,2,19,8999,'wait','2022-06-11 19:33:13','2022-06-11 19:33:13'),(15,2,19,6749.25,'wait','2022-06-11 22:21:09','2022-06-11 22:21:09'),(16,2,15,4999,'wait','2022-06-12 00:09:58','2022-06-12 00:09:58'),(17,6,18,7999,'active','2022-06-12 21:25:55','2022-06-12 21:25:55'),(18,2,14,6999,'wait','2022-06-12 22:22:11','2022-06-12 22:22:11'),(19,2,21,5699,'wait','2022-06-12 23:04:15','2022-06-12 23:04:15'),(20,2,21,5699,'wait','2022-06-12 23:04:53','2022-06-12 23:04:53'),(21,2,14,6999,'wait','2022-06-12 23:05:23','2022-06-12 23:05:23'),(22,2,15,4999,'wait','2022-06-12 23:06:19','2022-06-12 23:06:19'),(23,2,14,6999,'wait','2022-06-12 23:07:26','2022-06-12 23:07:26'),(24,2,17,5999,'wait','2022-06-12 23:09:08','2022-06-12 23:09:08'),(25,2,18,7999,'wait','2022-06-12 23:09:31','2022-06-12 23:09:31'),(26,2,20,5000,'wait','2022-06-12 23:09:56','2022-06-12 23:09:56'),(27,2,15,3499.3,'wait','2022-06-12 23:22:57','2022-06-12 23:22:57'),(28,2,20,4500,'wait','2022-06-12 23:23:05','2022-06-12 23:23:05'),(29,2,16,7000,'wait','2022-06-13 10:51:05','2022-06-13 10:51:05'),(30,2,15,4999,'wait','2022-06-13 18:48:01','2022-06-13 18:48:01'),(31,2,15,4999,'wait','2022-06-13 18:48:01','2022-06-13 18:48:01'),(32,2,15,4999,'wait','2022-06-13 18:48:01','2022-06-13 18:48:01'),(33,2,15,4999,'active','2022-06-13 18:48:01','2022-06-13 18:48:01'),(34,2,23,2999,'active','2022-06-13 22:04:54','2022-06-13 22:04:54'),(35,2,19,8999,'active','2022-06-16 07:48:05','2022-06-16 07:48:05'),(36,7,19,8999,'active','2022-06-16 20:18:37','2022-06-16 20:18:37');
/*!40000 ALTER TABLE `flight_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `house_reservations`
--

DROP TABLE IF EXISTS `house_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `house_reservations` (
  `house_reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `reservation_price` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`house_reservation_id`),
  KEY `room_id` (`room_id`),
  KEY `customer_id` (`customer_id`),
  KEY `customer_id_2` (`customer_id`),
  CONSTRAINT `house_reservations_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `house_reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `house_reservations`
--

LOCK TABLES `house_reservations` WRITE;
/*!40000 ALTER TABLE `house_reservations` DISABLE KEYS */;
INSERT INTO `house_reservations` VALUES (7,4,12,'2022-06-09','2022-06-10',0,4599,'active','2022-06-09 12:34:45','2022-06-09 12:34:45'),(8,4,9,'2022-06-17','2022-06-18',0,3799,'active','2022-06-10 09:42:29','2022-06-10 09:42:29'),(9,4,10,'2022-06-17','2022-06-25',0,2599,'active','2022-06-10 09:44:42','2022-06-10 09:44:42'),(10,2,9,'2022-06-24','2022-06-25',0,3799,'wait','2022-06-11 19:26:18','2022-06-11 19:26:18'),(11,2,10,'2022-06-17','2022-06-19',0,2599,'cancelled','2022-06-11 19:45:24','2022-06-11 19:45:24'),(12,2,10,'2022-06-03','2022-06-12',0,2599,'wait','2022-06-11 19:46:51','2022-06-11 19:46:51'),(13,2,13,'2022-06-12','2022-06-23',0,3700,'wait','2022-06-11 19:47:18','2022-06-11 19:47:18'),(14,2,13,'2022-06-12','2022-06-25',0,3700,'wait','2022-06-11 19:48:15','2022-06-11 19:48:15'),(15,6,9,'2022-06-22','2022-06-26',0,3799,'active','2022-06-12 21:19:43','2022-06-12 21:19:43'),(16,2,9,'2022-06-10','2022-06-23',0,3799,'wait','2022-06-12 23:19:05','2022-06-12 23:19:05'),(17,2,9,'2022-06-14','2022-06-15',0,3799,'wait','2022-06-12 23:21:26','2022-06-12 23:21:26'),(18,2,10,'2022-06-22','2021-06-26',361,938239,'active','2022-06-16 07:44:18','2022-06-16 07:44:18'),(19,2,8,'2022-06-18','2022-06-25',7,13993,'wait','2022-06-16 07:44:34','2022-06-16 07:44:34'),(20,2,8,'2022-06-16','2022-06-18',2,3998,'wait','2022-06-16 07:45:12','2022-06-16 07:45:12'),(21,2,8,'2022-06-17','2022-06-24',7,13993,'wait','2022-06-16 07:45:36','2022-06-16 07:45:36'),(22,7,10,'2022-06-23','2022-06-25',2,5198,'active','2022-06-16 20:18:25','2022-06-16 20:18:25');
/*!40000 ALTER TABLE `house_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `housing_infos`
--

DROP TABLE IF EXISTS `housing_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `housing_infos` (
  `house_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_info_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `adresse` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`house_info_id`),
  KEY `type` (`type`),
  KEY `adresse` (`adresse`),
  CONSTRAINT `housing_infos_ibfk_1` FOREIGN KEY (`type`) REFERENCES `housing_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `housing_infos_ibfk_2` FOREIGN KEY (`adresse`) REFERENCES `street_addresses` (`street_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `housing_infos`
--

LOCK TABLES `housing_infos` WRITE;
/*!40000 ALTER TABLE `housing_infos` DISABLE KEYS */;
INSERT INTO `housing_infos` VALUES (2,'Résidence Alfath',2,12,'alfath@test.com','0654326789',NULL,NULL),(9,'Remas Hotel',1,5,'remas@contact.com','0678745623',NULL,'2022-05-22 06:00:06'),(10,'Andalous Hotel',1,6,'andalous@contact.com','0660945682','2022-05-20 14:29:58','2022-05-22 05:36:38'),(11,'Maldives Villa',3,2,'maldivesvilla@contact.com','00495678234567','2022-05-20 14:40:49','2022-05-20 14:40:49'),(14,'Luxe Hotel',1,10,'LuxeHotel@gmail.com','0667324561','2022-05-23 07:15:59','2022-05-23 07:15:59'),(15,'Four Seasons Hotel',1,6,'fourseasons@gmail.com','0678923417','2022-05-23 07:17:48','2022-05-23 07:17:48'),(16,'Carli Lakin',2,15,'fakedata48396@gmail.com','0566443789','2022-06-08 23:26:27','2022-06-08 23:26:27'),(17,'La Sauvagine',3,13,'sauvagine@gmail.com','0678565338',NULL,NULL),(18,'Les Scoubidous',3,16,'scoubidous@gmail.com','0699442568',NULL,NULL),(19,'Villa ALIZE',3,15,'alize@gmail.com','0623457846',NULL,NULL),(20,'Villa BLANCHE',3,9,'blanche@gmail.com','0634217889',NULL,NULL),(21,'Villa BELLEVUE',3,15,'bellevue@gmail.com','0634589530',NULL,NULL);
/*!40000 ALTER TABLE `housing_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `housing_types`
--

DROP TABLE IF EXISTS `housing_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `housing_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `housing_types`
--

LOCK TABLES `housing_types` WRITE;
/*!40000 ALTER TABLE `housing_types` DISABLE KEYS */;
INSERT INTO `housing_types` VALUES (1,'Hotel',NULL,NULL),(2,'Appartement',NULL,NULL),(3,'Villa',NULL,NULL);
/*!40000 ALTER TABLE `housing_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id_post` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
  `room_size` int(11) NOT NULL,
  `price` float NOT NULL,
  `show_at_page` tinyint(1) NOT NULL DEFAULT 0,
  `persons_per_room` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `house_id` (`house_id`),
  CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `housing_infos` (`house_info_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (8,15,1000,1999,1,1,'hotel-5.jpg',NULL,NULL),(9,10,400,3799,1,1,'hotel-2.jpg',NULL,NULL),(10,9,800,2599,1,2,'hotel-3.jpg',NULL,NULL),(11,15,1000,3499,1,2,'room-2.jpg',NULL,NULL),(12,11,1000,4599,1,3,'property-2.jpg',NULL,NULL),(13,2,700,3700,1,3,'room-5.jpg',NULL,NULL),(14,16,600,3999,0,2,'room-3.jpg',NULL,NULL);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `street_addresses`
--

DROP TABLE IF EXISTS `street_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `street_addresses` (
  `street_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`street_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `street_addresses_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `street_addresses`
--

LOCK TABLES `street_addresses` WRITE;
/*!40000 ALTER TABLE `street_addresses` DISABLE KEYS */;
INSERT INTO `street_addresses` VALUES (2,'Goslarish str.2',1,NULL,NULL),(3,'Mecklenburger str 2',2,'2022-05-01 06:42:39','2022-05-01 06:42:39'),(4,'2, rue Joseph Heuzé',2,'2022-05-01 06:43:16','2022-05-01 06:43:16'),(5,'Hay Maamoura',5,'2022-05-14 07:42:28','2022-05-14 07:42:28'),(6,'Hay Ljadid',6,'2022-05-14 07:43:19','2022-05-14 07:43:19'),(7,'Hay Lfath',16,'2022-05-14 07:48:12','2022-05-14 07:48:12'),(8,'Hay Salam',15,'2022-05-14 07:55:40','2022-05-14 07:55:40'),(9,'Hay Idari',14,'2022-05-14 07:56:51','2022-05-14 07:56:51'),(10,'Hay Fakhita',12,'2022-05-22 22:22:57','2022-05-22 22:22:57'),(11,'Hay Nadira',11,'2022-05-22 22:23:16','2022-05-22 22:23:16'),(12,'Hay Ouarzaziya',13,'2022-05-22 22:23:35','2022-05-22 22:23:35'),(13,'Hay Slaoui',17,'2022-05-22 22:23:56','2022-05-22 22:23:56'),(15,'Hay Tazi',18,'2022-05-22 22:25:24','2022-05-22 22:25:24'),(16,'les orangéres',17,'2022-06-08 23:28:47','2022-06-08 23:28:47'),(17,'n°20 el-oudaya rue alfath',9,'2022-06-08 23:29:29','2022-06-08 23:29:29');
/*!40000 ALTER TABLE `street_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_companies`
--

DROP TABLE IF EXISTS `travel_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_companies`
--

LOCK TABLES `travel_companies` WRITE;
/*!40000 ALTER TABLE `travel_companies` DISABLE KEYS */;
INSERT INTO `travel_companies` VALUES (1,'Qatar Airways',NULL,NULL,NULL),(2,'Emirates',NULL,NULL,NULL),(3,'Japan Airlines',NULL,NULL,NULL),(4,'Lufthansa',NULL,NULL,NULL),(6,'Royal Air Maroc',NULL,'2022-05-14 07:49:09','2022-05-14 07:49:09'),(7,'Turkish Airlines',NULL,'2022-05-14 07:49:24','2022-05-14 07:49:24'),(8,'British Airways',NULL,'2022-05-14 07:49:37','2022-05-14 07:49:37'),(9,'Royal Air Maroc','airmaroc.png','2022-06-13 22:03:19','2022-06-13 22:03:19');
/*!40000 ALTER TABLE `travel_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_details`
--

DROP TABLE IF EXISTS `travel_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_details` (
  `travel_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_company` int(11) NOT NULL,
  `direction_id` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `travel_time` time NOT NULL,
  `reach_time` time NOT NULL,
  `show_at_page` tinyint(1) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`travel_detail_id`),
  KEY `airline_company` (`airline_company`),
  KEY `direction_id` (`direction_id`),
  CONSTRAINT `travel_details_ibfk_1` FOREIGN KEY (`airline_company`) REFERENCES `travel_companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `travel_details_ibfk_2` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`direction_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_details`
--

LOCK TABLES `travel_details` WRITE;
/*!40000 ALTER TABLE `travel_details` DISABLE KEYS */;
INSERT INTO `travel_details` VALUES (14,6,7,'2022-05-19','16:05:00','18:00:00',1,6999,'casa.jpg','2022-05-21 16:55:18','2022-05-21 16:55:18'),(15,6,1,'2022-05-25','09:09:00','11:30:00',1,4999,'2.jpg','2022-05-21 16:56:38','2022-05-21 16:56:38'),(16,6,7,'2022-05-27','18:00:00','20:09:00',1,7000,'casa.jpg','2022-05-22 22:30:33','2022-05-22 22:30:33'),(17,6,8,'2022-05-29','14:05:00','16:00:00',1,5999,'zagora.jpg','2022-05-22 22:40:39','2022-05-22 22:40:39'),(18,4,6,'2022-06-03','07:08:00','10:07:00',1,7999,'tetouan.webp','2022-05-22 22:47:07','2022-05-22 22:47:07'),(19,6,11,'2022-07-26','17:09:00','22:00:00',1,8999,'Tour-Hassan.webp','2022-05-22 22:54:52','2022-05-22 22:54:52'),(20,4,2,'2022-06-22','19:30:00','22:20:00',1,5000,'berlin.jpg','2022-05-22 22:58:22','2022-05-22 22:58:22'),(21,1,4,'2022-06-05','07:08:00','09:10:00',1,5699,'laayoune.jpg','2022-05-22 23:03:45','2022-05-22 23:03:45'),(22,6,13,'2022-05-26','12:00:00','14:03:00',1,4999,'casa.jpg','2022-05-23 09:34:36','2022-05-23 09:34:36'),(23,9,7,'2022-06-23','12:07:00','16:00:00',1,2999,'casa.jpg','2022-06-13 22:04:40','2022-06-13 22:04:40');
/*!40000 ALTER TABLE `travel_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_offers`
--

DROP TABLE IF EXISTS `travel_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_offers` (
  `travel_offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_id` int(11) NOT NULL,
  `discount_percentage` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`travel_offer_id`),
  KEY `travel_id` (`travel_id`),
  CONSTRAINT `travel_offers_ibfk_1` FOREIGN KEY (`travel_id`) REFERENCES `travel_details` (`travel_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_offers`
--

LOCK TABLES `travel_offers` WRITE;
/*!40000 ALTER TABLE `travel_offers` DISABLE KEYS */;
INSERT INTO `travel_offers` VALUES (23,15,60,NULL,NULL),(27,15,70,'2022-05-22 22:20:48','2022-05-22 22:20:48'),(28,16,63,'2022-05-22 22:30:50','2022-05-22 22:30:50'),(30,17,79,'2022-05-22 22:40:50','2022-05-22 22:40:50'),(31,18,65,'2022-05-22 22:47:20','2022-05-22 22:47:20'),(32,19,75,'2022-05-22 22:55:18','2022-05-22 22:55:18'),(33,20,90,'2022-05-22 22:58:30','2022-05-22 22:58:30'),(34,21,50,'2022-05-22 23:04:06','2022-05-22 23:04:06'),(35,22,60,'2022-05-23 09:34:46','2022-05-23 09:34:46');
/*!40000 ALTER TABLE `travel_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `PassPort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin','admin@test.com',NULL,'','$2y$10$1OESvVKIZMQ.E7XODvNqC./OlOTANv9IM5B3v96IfjrStTac4Of4q',NULL,'2022-05-01 11:36:03','2022-05-01 11:36:03'),(3,'fatimazahra','secretary','fatimazahra@test.com',NULL,'','$2y$10$rgmdXNc/SSkekzCQhoUKCuU3Q/cYZaC9uLrwCwSUcd3heildT9DH.',NULL,'2022-05-13 17:26:49','2022-05-13 17:26:49'),(4,'ramy','secretary','ramy@test.com',NULL,'','$2y$10$ADg2kpQwjEveK30YiO.K7.SPHQcntR/6RIvymZ2LRZLXESjHTHv0q',NULL,'2022-05-13 18:31:32','2022-05-13 18:31:32'),(5,'sami','customer','sami@gmail.com',NULL,'','$2y$10$AnqaxZ2pj8jPI54JiaKTNeO9e3fXwTdfjsEwHqjPd0NkwICnpaI5O',NULL,'2022-05-14 09:09:10','2022-05-14 09:09:10'),(6,'zineb','secretary','zineb@test.com',NULL,'','$2y$10$LQbAEr5vRzoYvnriTBuF5Ok/ODhWd4zuSEpj7irnzEgbbcry8QfN.',NULL,'2022-05-22 21:52:04','2022-05-22 21:52:04'),(7,'jaafar','customer','jaafar@gmail.com',NULL,'','$2y$10$4LHS.G6z0MbyFjTELLYKQOI9PvcZqlxMqA1pr3OLts4AeCBBO7Gw.',NULL,'2022-05-22 22:07:44','2022-05-22 22:07:44'),(8,'loubna','customer','loubna@test.com',NULL,'','$2y$10$IOGp2pgKiBWT0m4HuVm5AO3vnKap/fDe81oOUykmHrnNnJZos8b.G',NULL,'2022-06-12 21:32:09','2022-06-12 21:32:09'),(9,'asmae','customer','asmae@test.com',NULL,'','$2y$10$nYjErqR4/CBt09ZvZn0vgev.QG7Z/df/caFmQRM.d2L7UEte2cF1e',NULL,'2022-06-12 21:33:02','2022-06-12 21:33:02'),(10,'youssef','customer','youssef@test.com',NULL,'','$2y$10$BZ9le.CjFzyd6zaGDiF7OuukAX70XjSgqQ6XZF/45I/JgVMEhMCAy',NULL,'2022-06-12 21:33:55','2022-06-12 21:33:55'),(11,'fatimazahrae','customer','fatimazahrae@test.com',NULL,'','$2y$10$P5erFE2yOJ5c.8JwWTMqP.nqgr7PdXV3fxe/GMudlO8Qi8EamTUQW',NULL,'2022-06-12 21:35:46','2022-06-12 21:35:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-16 22:31:37
