CREATE DATABASE  IF NOT EXISTS `parcial` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `parcial`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: parcial
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numCuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `saldo` decimal(15,2) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuenta_numcuenta_unique` (`numCuenta`),
  KEY `cuenta_user_id_foreign` (`user_id`),
  CONSTRAINT `cuenta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,'123-985',500.00,2,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(2,'658-365',100.00,2,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(3,'698-985',50.00,3,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(4,'874-987',190.00,3,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(5,'987-687',80.00,2,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(6,'879-301',500.00,3,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Ahuachapán',NULL,NULL),(2,'Sonsonate',NULL,NULL),(3,'Santa Ana',NULL,NULL),(4,'Cabañas',NULL,NULL),(5,'Chalatenango',NULL,NULL),(6,'Cuscatlán',NULL,NULL),(7,'La Libertad',NULL,NULL),(8,'La Paz',NULL,NULL),(9,'San Salvador',NULL,NULL),(10,'San Vicente',NULL,NULL),(11,'Morazán',NULL,NULL),(12,'San Miguel',NULL,NULL),(13,'Usulután',NULL,NULL),(14,'La Unión',NULL,NULL);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_04_06_132608_create_users_types_table',1),(2,'2018_04_06_132609_create_departamentos_table',1),(3,'2018_04_06_132610_create_municipios_table',1),(4,'2018_04_06_132619_create_users_table',1),(5,'2018_04_06_132620_create_password_resets_table',1),(6,'2018_04_06_132723_create_cuenta_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipios_departamento_id_foreign` (`departamento_id`),
  CONSTRAINT `municipios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'Ahuachapán',1,NULL,NULL),(2,'Apaneca',1,NULL,NULL),(3,'Atiquizaya',1,NULL,NULL),(4,'Concepción de Ataco',1,NULL,NULL),(5,'El Refugio',1,NULL,NULL),(6,'Guaymango',1,NULL,NULL),(7,'Jujutla',1,NULL,NULL),(8,'San Francisco Menéndez',1,NULL,NULL),(9,'San Lorenzo',1,NULL,NULL),(10,'San Pedro Puxtla',1,NULL,NULL),(11,'Tacuba',1,NULL,NULL),(12,'Turín',1,NULL,NULL),(13,'Acajutla',2,NULL,NULL),(14,'Armenia',2,NULL,NULL),(15,'Caluco',2,NULL,NULL),(16,'Cuisnahuat',2,NULL,NULL),(17,'Izalco',2,NULL,NULL),(18,'Juaypua',2,NULL,NULL),(19,'Nahuizalco',2,NULL,NULL),(20,'San Antonio del Monte',2,NULL,NULL),(21,'San Julión',2,NULL,NULL),(22,'Santa Catarina Masahuat',2,NULL,NULL),(23,'Santa Isabel Ishuatán',2,NULL,NULL),(24,'Santo Domingo de Guzmán',2,NULL,NULL),(25,'Sonsonate',2,NULL,NULL),(26,'Sonzacate',2,NULL,NULL),(27,'Candelaria de la Frontera',3,NULL,NULL),(28,'Chalchuapa',3,NULL,NULL),(29,'Coatepeque',3,NULL,NULL),(30,'El Congo',3,NULL,NULL),(31,'El Porvenir',3,NULL,NULL),(32,'Masahuat',3,NULL,NULL),(33,'Metapán',3,NULL,NULL),(34,'San Antonio Pajonal',3,NULL,NULL),(35,'San Sebastián Salitrillo',3,NULL,NULL),(36,'Santa Ana',3,NULL,NULL),(37,'Santa Rosa Guachipilín',3,NULL,NULL),(38,'Santiago de la Frontera',3,NULL,NULL),(39,'Santa Ana',3,NULL,NULL),(40,'Cinquera',4,NULL,NULL),(41,'Villa Dolores',4,NULL,NULL),(42,'Guacotecti',4,NULL,NULL),(43,'Ilobasco',4,NULL,NULL),(44,'Jutiapa',4,NULL,NULL),(45,'San Isidro',4,NULL,NULL),(46,'Sensuntepeque',4,NULL,NULL),(47,'Tejutepeque',4,NULL,NULL),(48,'Victoria',4,NULL,NULL),(49,'Agua Caliente',5,NULL,NULL),(50,'Arcatao',5,NULL,NULL),(51,'Azacualpa',5,NULL,NULL),(52,'Chalatenango',5,NULL,NULL),(53,'Citalá',5,NULL,NULL),(54,'Comalapa',5,NULL,NULL),(55,'Concepción Quezaltepeque',5,NULL,NULL),(56,'Dulce Nombre de María',5,NULL,NULL),(57,'El Carrizal',5,NULL,NULL),(58,'El Paraíso',5,NULL,NULL),(59,'La Laguna',5,NULL,NULL),(60,'La Palma',5,NULL,NULL),(61,'La Reina',5,NULL,NULL),(62,'Las Vueltas',5,NULL,NULL),(63,'Nombre de Jesús',5,NULL,NULL),(64,'Nueva Concepción',5,NULL,NULL),(65,'Nueva Trinidad',5,NULL,NULL),(66,'Ojos de Agua',5,NULL,NULL),(67,'Potonico',5,NULL,NULL),(68,'San Antonio de la Cruz',5,NULL,NULL),(69,'San Antonio de Los Ranchos',5,NULL,NULL),(70,'San Fernando',5,NULL,NULL),(71,'San Francisco Lempa',5,NULL,NULL),(72,'San Ignacio',5,NULL,NULL),(73,'San Francisco Morán',5,NULL,NULL),(74,'San Isidro Labrador',5,NULL,NULL),(75,'San José Cancasque',5,NULL,NULL),(76,'San José Las Flores',5,NULL,NULL),(77,'San Luis del Carmen',5,NULL,NULL),(78,'San Miguel de Mercedes',5,NULL,NULL),(79,'San Rafael',5,NULL,NULL),(80,'Santa Rita',5,NULL,NULL),(81,'Tejutla',5,NULL,NULL),(82,'Candelaria',6,NULL,NULL),(83,'Cojutepeque',6,NULL,NULL),(84,'El Carmen',6,NULL,NULL),(85,'El Rosario',6,NULL,NULL),(86,'Monte San Juan',6,NULL,NULL),(87,'Oratorio de Concepción',6,NULL,NULL),(88,'San Bartolomé Perulapía',6,NULL,NULL),(89,'San Cristobal',6,NULL,NULL),(90,'San José Guayabal',6,NULL,NULL),(91,'San Pedro Perulapán',6,NULL,NULL),(92,'San Rafael Cedros',6,NULL,NULL),(93,'San Ramón',6,NULL,NULL),(94,'Santa Cruz Analquito',6,NULL,NULL),(95,'Santa Cruz Michapa',6,NULL,NULL),(96,'Suchitoto',6,NULL,NULL),(97,'Tenancingo',6,NULL,NULL),(98,'Antiguo Cuscatlán',7,NULL,NULL),(99,'Chiltiupán',7,NULL,NULL),(100,'Ciudad Arce',7,NULL,NULL),(101,'Colón',7,NULL,NULL),(102,'La Libertad',7,NULL,NULL),(103,'Santa Tecla',7,NULL,NULL),(104,'Nuevo Cuscatlán',7,NULL,NULL),(105,'San Juan Opico',7,NULL,NULL),(106,'Quezaltepeque',7,NULL,NULL),(107,'Sacacoyo',7,NULL,NULL),(108,'San José Villanueva',7,NULL,NULL),(109,'San Matías',7,NULL,NULL),(110,'San Pablo Tacachico',7,NULL,NULL),(111,'Talnique',7,NULL,NULL),(112,'Tamanique',7,NULL,NULL),(113,'Teotepeque',7,NULL,NULL),(114,'Tepecoyo',7,NULL,NULL),(115,'Zaragoza',7,NULL,NULL),(116,'Cuyultitán',8,NULL,NULL),(117,'Rosario de La Paz',8,NULL,NULL),(118,'Jerusalén',8,NULL,NULL),(119,'Mercedes de la Ceiba',8,NULL,NULL),(120,'Olocuilta',8,NULL,NULL),(121,'Paraíso de Osorio',8,NULL,NULL),(122,'San Antonio Masahuat',8,NULL,NULL),(123,'San Emigdio',8,NULL,NULL),(124,'San Francisco Chinameca',8,NULL,NULL),(125,'San Juan Nonualco',8,NULL,NULL),(126,'San Juan Talpa',8,NULL,NULL),(127,'San Matías',8,NULL,NULL),(128,'San Juan Tepezontes',8,NULL,NULL),(129,'San Luis La Herradura',8,NULL,NULL),(130,'San Luis Talpa',8,NULL,NULL),(131,'San Miguel Tepezontes',8,NULL,NULL),(132,'San Pedro Masahuat',8,NULL,NULL),(133,'San Pedro Nonualco',8,NULL,NULL),(134,'San Rafael Obrajuelo',8,NULL,NULL),(135,'Santa María Ostuma',8,NULL,NULL),(136,'Santiago Nonualco',8,NULL,NULL),(137,'Tapalhuaca',8,NULL,NULL),(138,'Zacatecoluca',8,NULL,NULL),(139,'Aguilares',9,NULL,NULL),(140,'Apopa',9,NULL,NULL),(141,'Ayutuxtepeque',9,NULL,NULL),(142,'Ciudad Delgado',9,NULL,NULL),(143,'Cuscatancingo',9,NULL,NULL),(144,'El Paisnal',9,NULL,NULL),(145,'Guazapa',9,NULL,NULL),(146,'Ilopango',9,NULL,NULL),(147,'Mejicanos',9,NULL,NULL),(148,'Nejapa',9,NULL,NULL),(149,'Panchimalco',9,NULL,NULL),(150,'Rosario de Mora',9,NULL,NULL),(151,'San Marcos',9,NULL,NULL),(152,'San Martín',9,NULL,NULL),(153,'San Salvador',9,NULL,NULL),(154,'Santiago Texacuangos',9,NULL,NULL),(155,'Santo Tomás',9,NULL,NULL),(156,'Soyapango',9,NULL,NULL),(157,'Tonacatepeque',9,NULL,NULL),(158,'Apastepeque',10,NULL,NULL),(159,'Guadalupe',10,NULL,NULL),(160,'San Cayetano Istepeque',10,NULL,NULL),(161,'San Esteban Catarina',10,NULL,NULL),(162,'San Ildefonso',10,NULL,NULL),(163,'San Lorenzo',10,NULL,NULL),(164,'San Sebastián',10,NULL,NULL),(165,'San Vicente',10,NULL,NULL),(166,'Santa Clara',10,NULL,NULL),(167,'Santo Domingo',10,NULL,NULL),(168,'Tecoluca',10,NULL,NULL),(169,'Tepetitán',10,NULL,NULL),(170,'Verapaz',10,NULL,NULL),(171,'Arambala',11,NULL,NULL),(172,'Cacaopera',11,NULL,NULL),(173,'Chilanga',11,NULL,NULL),(174,'Corinto',11,NULL,NULL),(175,'Delicias de Concepción',11,NULL,NULL),(176,'El Divisadero',11,NULL,NULL),(177,'El Rosario',11,NULL,NULL),(178,'Gualococti',11,NULL,NULL),(179,'Guatajiagua',11,NULL,NULL),(180,'Joateca',11,NULL,NULL),(181,'Jocoaitique',11,NULL,NULL),(182,'Jocoro',11,NULL,NULL),(183,'Lolotiquillo',11,NULL,NULL),(184,'Meanguera',11,NULL,NULL),(185,'Osicala',11,NULL,NULL),(186,'Perquín',11,NULL,NULL),(187,'San Carlos',11,NULL,NULL),(188,'San Fernando',11,NULL,NULL),(189,'San Francisco Gotera',11,NULL,NULL),(190,'San Isidro',11,NULL,NULL),(191,'San Simón',11,NULL,NULL),(192,'Sensembra',11,NULL,NULL),(193,'Sociedad',11,NULL,NULL),(194,'Torola',11,NULL,NULL),(195,'Yamabal',11,NULL,NULL),(196,'Yoloaiquín',11,NULL,NULL),(197,'Carolina',12,NULL,NULL),(198,'Chapeltique',12,NULL,NULL),(199,'Chinameca',12,NULL,NULL),(200,'Chirilagua',12,NULL,NULL),(201,'Ciudad Barrios',12,NULL,NULL),(202,'Comoacarán',12,NULL,NULL),(203,'El Tránsito',12,NULL,NULL),(204,'Lolotique',12,NULL,NULL),(205,'San Antonio del Mosco',12,NULL,NULL),(206,'San Gerardo',12,NULL,NULL),(207,'San Jorge',12,NULL,NULL),(208,'San Luis de la Reina',12,NULL,NULL),(209,'San Miguel',12,NULL,NULL),(210,'San Rafael Oriente',12,NULL,NULL),(211,'Sesori',12,NULL,NULL),(212,'Uluazapa',12,NULL,NULL),(213,'Alegría',13,NULL,NULL),(214,'Berlín',13,NULL,NULL),(215,'California',13,NULL,NULL),(216,'Concepción Batres',13,NULL,NULL),(217,'El Triunfo',13,NULL,NULL),(218,'Ereguayquín',13,NULL,NULL),(219,'Estanzuelas',13,NULL,NULL),(220,'Jiquilisco',13,NULL,NULL),(221,'Jucuapa',13,NULL,NULL),(222,'Jucuarán',13,NULL,NULL),(223,'Mercedes Umaña',13,NULL,NULL),(224,'Nueva Granada',13,NULL,NULL),(225,'Ozatlán',13,NULL,NULL),(226,'Puerto El Triunfo',13,NULL,NULL),(227,'Puerto el triunfo',13,NULL,NULL),(228,'San Agustín',13,NULL,NULL),(229,'San Buenaventura',13,NULL,NULL),(230,'San Dionisio',13,NULL,NULL),(231,'San Francisco de Javier',13,NULL,NULL),(232,'Santa Elena',13,NULL,NULL),(233,'Santa María',13,NULL,NULL),(234,'Santiago de María',13,NULL,NULL),(235,'Tecapán',13,NULL,NULL),(236,'Usulután',13,NULL,NULL),(237,'Anamoros',14,NULL,NULL),(238,'Bolívar',14,NULL,NULL),(239,'Concepción de Oriente',14,NULL,NULL),(240,'Conchagua',14,NULL,NULL),(241,'El Carmen',14,NULL,NULL),(242,'El Sauce',14,NULL,NULL),(243,'Intipuca',14,NULL,NULL),(244,'La Unión',14,NULL,NULL),(245,'Poloros',14,NULL,NULL),(246,'San Alejo',14,NULL,NULL),(247,'San José',14,NULL,NULL),(248,'Santa Rosa de Lima',14,NULL,NULL),(249,'Yayantique',14,NULL,NULL),(250,'Yucuaiquán',14,NULL,NULL);
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dui` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `user_type_id` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'CLE',
  `municipio_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_dui_unique` (`dui`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_type_id_foreign` (`user_type_id`),
  KEY `users_municipio_id_foreign` (`municipio_id`),
  CONSTRAINT `users_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `users_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'12548758-8','franklin.esquivel@outlook.com','$2y$10$D4muK/logh/kwWlzDdBhReBJ1abYd.UGEcNvlxgesI7gyvDrUYrXG','Franklin Armando','Esquivel Guevara','1998-09-26',19,'Santa Lucía','76702569','ADM',5,NULL,'2018-04-07 03:02:58','2018-04-07 03:02:58',NULL),(2,'98526857-8','fulano@gmail.com','$2y$10$49uqbznOU1/GOeEwoyU9Mu8VlM5Wom7ka68VkHYcgnvB0N0Anue9y','Fulano','Detal','1995-09-26',23,'Por allá','00000000','CLE',5,NULL,'2018-04-07 03:02:59','2018-04-07 03:02:59',NULL),(3,'6985325-8','mojicalems@gmail.com','$2y$10$Uq0pYZP0kZTZnLjt9IPNeeC1QqKfHdZukouptVZIfIFcewPePEGf.','Fulano','Detal','1995-09-26',23,'Por allá','00000000','CLE',5,NULL,'2018-04-07 03:02:59','2018-04-07 03:02:59',NULL),(4,'69857569-8','ramiro@gmail.com','$2y$10$qQp7zJKa2/TuK4iw078h3eU5TGFTS2sBZ2QQWrTjWFgfWDBMNnx4K','Ramiro','Martínez','1995-09-26',23,'Por allá','00000000','CLE',5,NULL,'2018-04-07 03:02:59','2018-04-07 03:02:59',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_types`
--

DROP TABLE IF EXISTS `users_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_types` (
  `id` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_types`
--

LOCK TABLES `users_types` WRITE;
/*!40000 ALTER TABLE `users_types` DISABLE KEYS */;
INSERT INTO `users_types` VALUES ('ADM','Administrador','Administrador de la plataforma'),('CLE','Cliente','Cliente de la plataforma');
/*!40000 ALTER TABLE `users_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-06 15:05:49
