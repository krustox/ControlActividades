CREATE DATABASE  IF NOT EXISTS `controlactividades` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `controlactividades`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 167.28.128.76    Database: controlactividades
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_tema` varchar(100) NOT NULL,
  `activity_start` datetime NOT NULL,
  `activity_update` datetime NOT NULL,
  `activity_end` datetime DEFAULT NULL,
  `activity_user` int(11) NOT NULL,
  `activity_platform` int(11) NOT NULL,
  `activity_type` int(11) NOT NULL,
  `activity_state` int(11) NOT NULL,
  `activity_proyect` int(11) NOT NULL,
  `activity_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_user_idx` (`activity_user`),
  KEY `activity_platform_idx` (`activity_platform`),
  KEY `activity_type_idx` (`activity_type`),
  KEY `activity_proyect_idx` (`activity_proyect`),
  CONSTRAINT `activity_platform` FOREIGN KEY (`activity_platform`) REFERENCES `platforms` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `activity_proyect` FOREIGN KEY (`activity_proyect`) REFERENCES `proyects` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `activity_type` FOREIGN KEY (`activity_type`) REFERENCES `types` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `activity_user` FOREIGN KEY (`activity_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`172.28.71.171`*/ /*!50003 TRIGGER `controlactividades`.`activities_AFTER_INSERT` AFTER INSERT ON `activities` FOR EACH ROW
BEGIN
INSERT INTO controlactividades.historicos 
(historico_fecha,historico_actividad,historico_user,historico_descripcion)
VALUES
(
NEW.activity_update,NEW.id,NEW.activity_user,
CONCAT(
"Titulo: ",NEW.activity_tema," Inicio: ",NEW.activity_start," Fin: ",NEW.activity_start,
" Usuario: ",(SELECT concat(user_nombre," ",user_apellido) FROM users WHERE id=NEW.activity_user),
" Plataforma: ",(SELECT platform_name FROM platforms WHERE id= NEW.activity_platform),
" Tipo: ",(SELECT type_name FROM types WHERE id=NEW.activity_type),
" Estado: ", NEW.activity_state, " Proyecto: ",
(SELECT proyect_name FROM proyects WHERE id=NEW.activity_proyect),
" Descripcion: ", NEW.activity_description
)
);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`172.28.71.171`*/ /*!50003 TRIGGER `controlactividades`.`activities_AFTER_UPDATE` AFTER UPDATE ON `activities` FOR EACH ROW
BEGIN
INSERT INTO controlactividades.historicos 
(historico_fecha,historico_actividad,historico_user,historico_descripcion)
VALUES
(
NEW.activity_update,NEW.id,NEW.activity_user,
CONCAT(
"Titulo: ",NEW.activity_tema," Inicio: ",NEW.activity_start," Fin: ",NEW.activity_start,
" Usuario: ",(SELECT concat(user_nombre," ",user_apellido) FROM users WHERE id=NEW.activity_user),
" Plataforma: ",(SELECT platform_name FROM platforms WHERE id= NEW.activity_platform),
" Tipo: ",(SELECT type_name FROM types WHERE id=NEW.activity_type),
" Estado: ", NEW.activity_state, " Proyecto: ",
(SELECT proyect_name FROM proyects WHERE id=NEW.activity_proyect),
" Descripcion: ", NEW.activity_description
)
);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archive_archive` varchar(1000) NOT NULL,
  `archive_name` varchar(100) NOT NULL,
  `archive_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `archive_activity_idx` (`archive_activity`),
  CONSTRAINT `archive_activity` FOREIGN KEY (`archive_activity`) REFERENCES `activities` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `historicos`
--

DROP TABLE IF EXISTS `historicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `historico_fecha` datetime NOT NULL,
  `historico_descripcion` varchar(5000) NOT NULL,
  `historico_actividad` int(11) NOT NULL,
  `historico_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `historico_user_idx` (`historico_user`),
  KEY `historico_actividad_idx` (`historico_actividad`),
  CONSTRAINT `historico_actividad` FOREIGN KEY (`historico_actividad`) REFERENCES `activities` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `historico_user` FOREIGN KEY (`historico_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permiso_perfil` int(11) NOT NULL,
  `permiso_user` int(11) NOT NULL,
  `permiso_client` int(11) NOT NULL,
  `permiso_historico` int(11) NOT NULL,
  `permiso_archivo` int(11) NOT NULL,
  `permiso_profile` int(11) NOT NULL,
  `permiso_plataforma` int(11) NOT NULL,
  `permiso_proyecto` int(11) NOT NULL,
  `permiso_tipo` int(11) NOT NULL,
  `permiso_actividades` int(11) NOT NULL,
  `permiso_permiso` int(11) NOT NULL,
  `permiso_permiso_add` int(11) NOT NULL,
  `permiso_permiso_edit` int(11) NOT NULL,
  `permiso_permiso_delete` int(11) NOT NULL,
  `permiso_user_add` int(11) NOT NULL,
  `permiso_user_edit` int(11) NOT NULL,
  `permiso_user_delete` int(11) NOT NULL,
  `permiso_user_view` int(11) NOT NULL,
  `permiso_actividades_add` int(11) NOT NULL,
  `permiso_actividades_edit` int(11) NOT NULL,
  `permiso_actividades_delete` int(11) NOT NULL,
  `permiso_actividades_view` int(11) NOT NULL,
  `permiso_client_add` int(11) NOT NULL,
  `permiso_client_edit` int(11) NOT NULL,
  `permiso_client_delete` int(11) NOT NULL,
  `permiso_client_view` int(11) NOT NULL,
  `permiso_plataforma_add` int(11) NOT NULL,
  `permiso_plataforma_edit` int(11) NOT NULL,
  `permiso_plataforma_delete` int(11) NOT NULL,
  `permiso_plataforma_view` int(11) NOT NULL,
  `permiso_proyecto_add` int(11) NOT NULL,
  `permiso_proyecto_edit` int(11) NOT NULL,
  `permiso_proyecto_delete` int(11) NOT NULL,
  `permiso_proyecto_view` int(11) NOT NULL,
  `permiso_archivo_add` int(11) NOT NULL,
  `permiso_archivo_edit` int(11) NOT NULL,
  `permiso_archivo_delete` int(11) NOT NULL,
  `permiso_archivo_view` int(11) NOT NULL,
  `permiso_profile_add` int(11) NOT NULL,
  `permiso_profile_edit` int(11) NOT NULL,
  `permiso_profile_delete` int(11) NOT NULL,
  `permiso_profile_view` int(11) NOT NULL,
  `permiso_tipo_add` int(11) NOT NULL,
  `permiso_tipo_edit` int(11) NOT NULL,
  `permiso_tipo_delete` int(11) NOT NULL,
  `permiso_tipo_view` int(11) NOT NULL,
  `permiso_actividades_review` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permiso_perfil_UNIQUE` (`permiso_perfil`),
  KEY `permiso_perfil_idx` (`permiso_perfil`),
  CONSTRAINT `permiso_perfil` FOREIGN KEY (`permiso_perfil`) REFERENCES `profiles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `permissions` VALUES(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
--
-- Table structure for table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO controlactividades.`profiles` VALUES(1,'Administrador');
--
-- Table structure for table `proyects`
--

DROP TABLE IF EXISTS `proyects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyect_name` varchar(100) NOT NULL,
  `proyect_start` datetime NOT NULL,
  `proyect_end` datetime NOT NULL,
  `proyect_admin` int(11) NOT NULL,
  `proyect_client` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyoect_client_idx` (`proyect_client`),
  KEY `proyect_admin_idx` (`proyect_admin`),
  CONSTRAINT `proyect_admin` FOREIGN KEY (`proyect_admin`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `proyect_client` FOREIGN KEY (`proyect_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nombre` varchar(100) NOT NULL,
  `user_apellido` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(260) NOT NULL,
  `user_perfil` int(11) NOT NULL,
  `user_correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_perfil_idx` (`user_perfil`),
  CONSTRAINT `user_perfil` FOREIGN KEY (`user_perfil`) REFERENCES `profiles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'controlactividades'
--

--
-- Dumping routines for database 'controlactividades'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-09 14:14:09
