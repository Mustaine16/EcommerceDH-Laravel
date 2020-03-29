CREATE DATABASE  IF NOT EXISTS `ecommerce_dh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecommerce_dh`;
-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: ecommerce_dh
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

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
-- Table structure for table `carritos`
--

DROP TABLE IF EXISTS `carritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_usuario` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carritos_id_producto_foreign` (`id_producto`),
  KEY `carritos_id_usuario_foreign` (`id_usuario`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carritos`
--

LOCK TABLES `carritos` WRITE;
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` bigint(20) unsigned NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_idx` (`id_usuario`),
  KEY `fk_compras_producto` (`id_producto`),
  CONSTRAINT `fk_compras_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_users` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (31,'2024-03-20',1,3,5,25999),(32,'2024-03-20',1,7,5,29500),(33,'2024-03-20',1,5,5,37500),(34,'2024-03-20',1,4,5,15999),(35,'2024-03-20',1,8,5,120000),(36,'2024-03-20',1,13,5,218999),(37,'2024-03-20',2,4,5,31998),(38,'2024-03-20',2,3,5,51998),(39,'2029-03-20',1,4,3,15999),(40,'2029-03-20',1,3,3,25999),(41,'2029-03-20',1,8,3,120000);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `imagen` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Samsung','Samsung.png'),(2,'LG','LG.png'),(3,'Motorola','Motorola.png'),(4,'Xiaomi','Xiaomi.png'),(5,'Google','Google.png'),(6,'Apple','Apple.png'),(7,'Huawei','Huawei.png'),(8,'Sony','Sony.png');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_02_21_173848_create_carritos_table',1),(4,'2020_03_01_230602_add_perfil_columns_to_users_table',2);
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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `procesador` varchar(60) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `sist_operativo` varchar(60) DEFAULT NULL,
  `pantalla` float DEFAULT NULL,
  `camara` float DEFAULT NULL,
  `memoria_ram` float DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `memoria_int` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marcas_idx` (`id_marca`),
  CONSTRAINT `fk_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (3,'Pixel 2','Snapdragon 835',25999,'5e80ff6256491.jpeg','Android 10.0',5,12.2,4,5,32),(4,'Moto E6 Plus','Helio P22',15999,'5e80ff6ca24cc.jpeg','Android 9.0',6.1,13,4,3,32),(5,'Galaxy S9+','Exynos 9810',37500,'5e80ff75b6f85.jpeg','Android 10.0',6.2,12,6,1,32),(7,'LG V30','Snapdragon 835',29500,'5e80ff7e3b223.jpeg','Android 9.0',6,16,4,2,32),(8,'iPhone 11 PRO Max','A13 Bionic',120000,'5e81000005b6e.jpeg','iOS 13.3',6.5,12,4,6,32),(13,'Redmi Note 8 PRO','Snapdragon 650',218999,'5e80ff8f250fa.jpeg','Android 9',6.8,16,32,4,32),(14,'Galaxy A31','Exynos 9611',26500,'5e80fe2fc1114.png','Android 10.0',6.4,48,6,1,64),(15,'Galaxy M21','Exynos 9611',23700,'5e80fe42e6ae3.jpeg','Android 10.0',6.4,48,4,1,64),(16,'Galaxy S20 ULTRA 5G','Exynos 990',78500,'5e80fe645b4d8.jpeg','Android 10.0',6.9,108,16,1,512),(17,'Moto G8 Play','Helio P70M',18500,'5e80fe702ea4d.jpeg','Android 9.0',6.2,13,2,3,32),(18,'Moto One Action','Exynos 9609',23000,'5e80fe7d93464.jpeg','Android 9.0 (One Version)',6.3,12,4,3,128),(19,'Moto One Vision','Exynos 9609',29500,'5e80fe886cb10.jpeg','Android 10.0',6.3,48,4,3,128),(21,'Moto G6 Plus','Snapdragon 630',20499,'5e80fe9351f0e.jpeg','Android 9.0',5.9,12,4,3,64),(22,'Moto E5 Plus','Snapdragon  425',12500,'5e80fe9f3d686.jpeg','Android 8.0',6,12,3,3,32),(23,'Redmi 7A','Snapdragon 439',13700,'5e80fead797a9.jpeg','Android 9.0',5.45,13,3,4,32),(24,'Mi A3','Snapdragon 665',23550,'5e80feb7420f0.jpeg','Android 10.0',6.09,48,4,4,64),(25,'Mi 9T','Snapdragon 730',34500,'5e8100ce2ed5b.jpeg','Android 10.0',6.39,48,6,4,128),(26,'Redmi 8A','Snapdragon 439',16490,'5e8100e17ce31.jpeg','Android 9.0',6.22,12,2,4,32),(27,'iPhone 8 Plus','A11 Bionic',75490,'5e8100f55705e.jpeg','iOS 13.4',5.5,12,3,6,64),(28,'iPhone 6s','A9',34500,'5e810104762ab.jpeg','iOS 13.4',4.7,12,2,6,32),(29,'iPhone 7','A10 Fusion',42950,'5e810110266b2.jpeg','iOS 13.4',4.7,12,2,6,128),(30,'Xperia 1 II','Snapdragon 865',144590,'5e81011ba615f.jpeg','Android 10.0',6.5,12,8,8,256),(31,'G7 ThinQ','Snapdragon 845',30700,'5e81012b63f73.jpeg','Android 9.0',6.1,16,4,2,64);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','admin@admin.com',NULL,'$2y$10$eYo6lhGM8ad.qg4xdoaj8u7MNnXYEs.HyXX2b06YgrBmIdq/1eq6u',NULL,'2020-03-01 22:58:41','2020-03-01 22:58:41','','6d57lqb1hRswdgj4O2Ye7QyOYsnTM2WCInjwFCcN.png','','','',''),(5,'ezequieldominguezcp11@gmail.com','ezequieldominguezcp11@gmail.com',NULL,'$2y$10$aJfYXYTyDbAIdAhd.JXNYuMeDtht/Zzn9nxt3K/XUQyJNlhRv/8x.',NULL,'2020-03-23 23:26:08','2020-03-24 01:03:46','','5e791b60f073e.png','Ezequiel','Dominguez','Avenida Libertador','Loma Hermosa');
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

-- Dump completed on 2020-03-29 18:47:17
