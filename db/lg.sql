-- MySQL dump 10.13  Distrib 5.7.23-23, for Linux (x86_64)
--
-- Host: localhost    Database: lg_ac
-- ------------------------------------------------------
-- Server version	5.7.23-23

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
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `cat_aires`
--

DROP TABLE IF EXISTS `cat_aires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_aires` (
  `id_aire` tinyint(1) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `aire` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `baja` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_aire`),
  UNIQUE KEY `id_aire_UNIQUE` (`id_aire`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_aires`
--

LOCK TABLES `cat_aires` WRITE;
/*!40000 ALTER TABLE `cat_aires` DISABLE KEYS */;
INSERT INTO `cat_aires` (`id_aire`, `aire`, `baja`) VALUES (1,'Frio',0),(2,'Frio / Caliente',0);
/*!40000 ALTER TABLE `cat_aires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_habitaciones`
--

DROP TABLE IF EXISTS `cat_habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_habitaciones` (
  `id_hab` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `habitacion` varchar(45) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_hab`),
  UNIQUE KEY `id_hab_UNIQUE` (`id_hab`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_habitaciones`
--

LOCK TABLES `cat_habitaciones` WRITE;
/*!40000 ALTER TABLE `cat_habitaciones` DISABLE KEYS */;
INSERT INTO `cat_habitaciones` (`id_hab`, `habitacion`, `baja`) VALUES (01,'0 a 5',0),(02,'0 a 6',0),(03,'0 a 8',0),(04,'6 a 12',0),(05,'7 a 13',0),(06,'9 a 16',0),(07,'9 a 19',0),(08,'13 a 21',0),(09,'14 a 23',0),(10,'17 a 25',0),(11,'20 a 27',0),(12,'22 a 26',0),(13,'24 a 28',0),(14,'26 a 30',0),(15,'27 a 32',0),(16,'28 a 34',0),(17,'29 a 34',0),(18,'31 a 36',0),(19,'35 a 40',0);
/*!40000 ALTER TABLE `cat_habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_radiografia`
--

DROP TABLE IF EXISTS `cat_radiografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_radiografia` (
  `id_rad` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `caracteristica` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `texto` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `texto_m` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `link` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `ventana` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rad`),
  UNIQUE KEY `id_rad_UNIQUE` (`id_rad`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_radiografia`
--

LOCK TABLES `cat_radiografia` WRITE;
/*!40000 ALTER TABLE `cat_radiografia` DISABLE KEYS */;
INSERT INTO `cat_radiografia` (`id_rad`, `caracteristica`, `texto`, `texto_m`, `link`, `ventana`, `baja`) VALUES (01,'Garantía de 10 años','Garantía de 10 años','Garantía de<br>10 años','popup_garantia10.html',2,0),(02,'Garantía de 5 años','Garantía de 5 años','Garantía de<br> 5 años','popup_garantia5.html',2,0),(03,'Bajo nivel de ruido','Bajo nivel de ruido','Bajo nivel<br>de ruido','popup_ruido.html',2,0),(04,'Compresor Dual inverter','Compresor Dual inverter','Compresor<br>dual inverter','popup_dualinverter.html',3,0),(05,'Conectividad','<img src=\'img/i-conectividad.svg\' class=\'icono\'><br>Conectividad','<img src=\'img/i-conectividad.svg\' class=\'icono\'><br>Conectividad','popup_video.html',1,0),(06,'Cuidado de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','popup_video.html',1,0),(07,'Duerme tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','popup_video.html',1,0),(08,'Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','popup_video.html',1,0),(09,'Ecológico','<img src=\'img/i-ecologico.svg\' class=\'icono\'><br>Ecológico','<img src=\'img/i-ecologico.svg\' class=\'icono\'><br>Ecológico','popup_ecologico.html',1,0),(10,'Enfriamiento rápido','<img src=\'img/i-enfriamiento.svg\' class=\'icono\'><br>Enfriamiento<br>más Rápido','<img src=\'img/i-enfriamiento.svg\' class=\'icono\'><br>Enfriamiento<br>más Rápido','popup_video.html',1,0),(11,'Filtro de protección dual','Filtro de protección dual','Filtro de<br>protección dual','popup_filtrodual.html',2,0),(12,'Funcionamiento silencioso','Funcionamiento silencioso','Funcionamiento<br>silencioso','popup_silencioso.html',2,0),(13,'Compresor dual inverter','Dual inverter','Dual<br>inverter','popup_dualinverter.html',2,0),(14,'Gold Fin','Gold Fin <sup>TM</sup>','Gold Fin <sup>TM</sup>','popup_goldfin.html',3,0),(15,'Kit instalación de ventana','Kit instalación de ventana','Kit de<br>instalación<br>de ventana','popup_kitinstalacion.html',2,0),(16,'LG ThinQ','LG ThinQ','LG ThinQ','popup_lgthinq.html',2,0),(17,'Limpieza automática','Limpieza automática','Limpieza<br>automática','popup_limpieza.html',2,0),(18,'Mayor ahorro de energía','<img src=\'img/i-energia.svg\' class=\'icono\'><br>Ahorro<br>de Energía','<img src=\'img/i-energia.svg\'  class=\'icono\'><br>Ahorro<br>de Energía','popup_video.html',1,0),(19,'Monitor de energía','Monitor de energía','Monitor de energía','popup_monitorenergia.html',2,0),(20,'Pantalla LED y control remoto','Pantalla LED y<br>control remoto','Pantalla LED y<br>control remoto','popup_pantallaled.html',2,0),(21,'Plasmaster Ionizer','Plasmaster Ionizer','Plasmaster<br>Ionizer','popup_plasmaster.html',2,0),(22,'Practicidad y comodidad','Practicidad y<br>comodidad','Practicidad<br>y comodidad','popup_practicidad.html',2,0),(23,'Prefiltros','Prefiltros','Prefiltros','popup_prefiltros.html',2,0),(24,'Resistencia a voltajes','Resistencia a voltajes','Resistencia<br>a voltajes','popup_resistenciavolt.html',3,0),(25,'Smart Diagnosis','Smart Diagnosis','Smart<br>Diagnosis','popup_smartdiagnosis.html',2,0),(26,'Temporizador 24 horas','Temporizador 24 hrs.','Temporizador<br>24 hrs.','popup_temporizador.html',2,0),(28,'Vías de oscilación','Vías de oscilación','Vías de<br>oscilación','popup_oscilacion.html',2,0),(29,'Cuidado de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','popup_filtrodual.html',1,0),(30,'Duerme tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','popup_duerme.html',1,0),(31,'Cuidado de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','popup_filtrolavable.html',1,0),(32,'Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','popup_durabilidad.html',1,0),(33,'Cuidado de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','popup_verificacionfiltro.html',1,0),(34,'Cuidado de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','<img src=\'img/i-cuidadosalud.svg\' class=\'icono\'><br>Cuidado<br>de la salud','popup_verificacionfiltro2.html',1,0),(35,'Duerme tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','popup_duermetranquilo.html',1,0),(36,'Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','popup_durabilidad2.html',1,0),(37,'Duerme tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','<img src=\'img/i-duerme.svg\' class=\'icono\'><br>Duerme<br>tranquilo','popup_duermetranquilo2.html',1,0),(38,'Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','<img src=\'img/i-durabilidad.svg\' class=\'icono\'><br>Durabilidad','popup_durabilidad3.html',1,0);
/*!40000 ALTER TABLE `cat_radiografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipos`
--

DROP TABLE IF EXISTS `cat_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipos` (
  `id_tipo` tinyint(2) unsigned zerofill NOT NULL,
  `tipo` char(3) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `descr` text COLLATE latin1_spanish_ci NOT NULL,
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `id_tipo_UNIQUE` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipos`
--

LOCK TABLES `cat_tipos` WRITE;
/*!40000 ALTER TABLE `cat_tipos` DISABLE KEYS */;
INSERT INTO `cat_tipos` (`id_tipo`, `tipo`, `descr`, `baja`) VALUES (01,'LP','Cuidado de la salud, duerme tranquilo y durabilidad',0),(02,'SW','Mayor ahorro de energía, enfriamiento rápido, cuidado de la salud y durabilidad',0),(03,'VM','Mayor ahorro de energía, enfriamiento rápido, cuidado de la salud y durabilidad',0),(04,'VP','Mayor ahorro de energía, conectividad, cuidado de la salud y durabilidad',0),(05,'VR','Mayor ahorro de energía, conectividad, cuidado de la salud y durabilidad',0),(06,'VW','Ecológico, cuidado de la salud, duerme tranquilo y durabilidad',0),(07,'VX','Mayor ahorro de energía, enfriamiento rápido, cuidado de la salud y durabilidad',0),(08,'W','Ecológico, cuidado de la salud, duerme tranquilo y durabilidad',0),(09,'LP','Cuidado de la salud, duerme tranquilo y durabilidad',0);
/*!40000 ALTER TABLE `cat_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipos_radiografia`
--

DROP TABLE IF EXISTS `cat_tipos_radiografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipos_radiografia` (
  `id_tr` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_tipo` tinyint(2) unsigned zerofill NOT NULL DEFAULT '00',
  `id_rad` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `x` tinyint(3) NOT NULL DEFAULT '0',
  `y` tinyint(3) NOT NULL DEFAULT '0',
  `tx` tinyint(3) NOT NULL DEFAULT '0',
  `ty` tinyint(3) NOT NULL DEFAULT '0',
  `xm` tinyint(3) NOT NULL DEFAULT '0',
  `ym` tinyint(3) NOT NULL DEFAULT '0',
  `txm` tinyint(3) NOT NULL DEFAULT '0',
  `tym` tinyint(3) NOT NULL DEFAULT '0',
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tr`),
  UNIQUE KEY `id_tr_UNIQUE` (`id_tr`),
  KEY `fk_cat_tipos_radiografia_cat_tipos1_idx` (`id_tipo`),
  CONSTRAINT `fk_cat_tipos_radiografia_cat_tipos1` FOREIGN KEY (`id_tipo`) REFERENCES `cat_tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipos_radiografia`
--

LOCK TABLES `cat_tipos_radiografia` WRITE;
/*!40000 ALTER TABLE `cat_tipos_radiografia` DISABLE KEYS */;
INSERT INTO `cat_tipos_radiografia` (`id_tr`, `id_tipo`, `id_rad`, `video`, `x`, `y`, `tx`, `ty`, `xm`, `ym`, `txm`, `tym`, `baja`) VALUES (001,01,2,'',17,43,0,44,25,89,2,87,0),(002,01,35,'',26,16,15,13,10,18,3,2,0),(003,01,36,'',72,42,77,39,87,52,80,60,0),(004,01,3,'',80,58,84,59,69,89,76,87,0),(005,01,15,'',82,8,87,7,83,15,75,1,0),(006,01,20,'',15,8,0,7,13,15,3,6,0),(007,01,23,'',78,86,83,87,46,90,40,98,0),(008,02,4,'',76,56,80,57,75,83,67,91,0),(009,02,29,'',80,15,85,12,80,15,75,0,0),(010,02,8,'https://www.youtube.com/embed/_5B9S263aUs',79,78,85,75,80,82,75,89,0),(011,02,10,'https://www.youtube.com/embed/aiMSyUWxgCs',18,78,5,75,15,83,7,90,0),(012,02,11,'',24,80,3,81,32,77,20,88,0),(013,02,1,'',17,41,0,42,8,74,0,81,0),(014,02,14,'',76,3,80,5,74,10,71,2,0),(015,02,16,'',16,14,7,15,15,19,7,12,0),(016,02,17,'',70,80,75,81,57,75,50,82,0),(017,02,18,'https://www.youtube.com/embed/sIEcUj1Y8W8',18,16,6,10,15,14,10,0,0),(018,02,19,'',80,40,84,41,88,18,78,7,0),(019,02,24,'',20,44,1,45,16,10,8,0,0),(020,02,25,'',82,13,86,14,51,19,42,7,0),(021,03,4,'',76,56,80,57,75,83,67,91,0),(022,03,29,'',80,15,85,12,80,15,75,0,0),(023,03,8,'https://www.youtube.com/embed/_5B9S263aUs',79,78,85,75,80,82,75,89,0),(024,03,10,'https://www.youtube.com/embed/aiMSyUWxgCs',18,78,5,75,15,83,7,90,0),(025,03,11,'',24,80,3,81,51,77,39,85,0),(026,03,1,'',17,41,0,42,21,81,12,88,0),(027,03,14,'',76,3,80,5,74,10,71,2,0),(028,03,16,'',16,13,7,14,16,20,11,14,0),(029,03,17,'',70,80,75,81,78,77,74,84,0),(030,03,18,'https://www.youtube.com/embed/sIEcUj1Y8W8',18,16,6,10,15,14,10,0,0),(031,03,19,'',80,40,84,41,93,20,86,7,0),(032,03,24,'',20,44,1,45,16,10,8,0,0),(033,03,25,'',82,13,86,14,52,20,46,11,0),(034,04,4,'',76,56,80,57,75,83,67,91,0),(035,04,5,'https://www.youtube.com/embed/4kDd9UE_GhQ',17,78,5,75,16,82,8,89,0),(036,04,29,'',80,15,85,12,80,15,75,0,0),(037,04,8,'https://www.youtube.com/embed/_5B9S263aUs',79,78,85,75,80,82,75,89,0),(038,04,11,'',24,80,3,81,32,77,20,88,0),(039,04,1,'',17,41,0,42,8,74,0,81,0),(040,04,14,'',76,3,80,5,74,10,71,2,0),(041,04,16,'',16,14,7,15,15,19,7,12,0),(042,04,17,'',70,80,75,81,57,75,50,82,0),(043,04,18,'https://www.youtube.com/embed/FNDHDvrHYCY',18,16,6,10,15,14,10,0,0),(044,04,19,'',80,40,84,41,88,18,78,7,0),(045,04,21,'',81,60,85,61,82,77,75,88,0),(046,04,24,'',20,44,1,45,16,10,8,0,0),(047,04,25,'',82,13,86,14,51,19,42,7,0),(048,05,4,'',76,56,80,57,75,83,67,91,0),(049,05,5,'https://www.youtube.com/embed/4shjqW2Gbsk',17,78,5,75,16,82,8,89,0),(050,05,6,'https://www.youtube.com/embed/oChAOUD1HDA',80,15,85,12,80,15,75,0,0),(051,05,8,'https://www.youtube.com/embed/_5B9S263aUs',79,78,85,75,80,82,75,89,0),(052,05,19,'',80,40,84,41,88,18,78,7,0),(053,05,1,'',17,41,0,42,8,74,0,81,0),(054,05,14,'',76,3,80,5,74,10,71,2,0),(055,05,16,'',16,14,7,15,15,19,7,12,0),(056,05,17,'',70,80,75,81,57,75,50,82,0),(057,05,18,'https://www.youtube.com/embed/bFGv04MXFl4',18,16,6,10,15,14,10,0,0),(058,05,25,'',82,13,86,14,51,19,42,7,0),(059,05,21,'',81,60,85,61,82,77,75,88,0),(060,05,24,'',20,44,1,45,16,10,8,0,0),(061,05,11,'',24,80,3,81,32,77,20,88,0),(062,06,1,'',18,43,0,44,11,10,5,2,0),(063,06,3,'',80,58,84,59,77,85,72,93,0),(064,06,13,'',81,35,86,36,94,10,89,2,0),(065,06,33,'',80,15,85,12,80,15,75,0,0),(066,06,7,'https://www.youtube.com/embed/0S_5vRPmD6s',18,16,6,10,15,14,10,0,0),(067,06,5,'https://www.youtube.com/embed/_ttSgW2OMS4',79,78,85,75,80,82,75,89,0),(068,06,18,'https://www.youtube.com/embed/G-akl5G6nnU',17,78,5,75,16,82,8,89,0),(069,06,23,'',77,85,82,86,51,85,46,93,0),(070,06,26,'',80,8,84,7,64,10,56,2,0),(071,06,16,'',16,8,7,9,39,10,35,5,0),(072,06,28,'',20,85,4,86,26,85,20,93,0),(073,07,4,'',76,56,80,57,75,83,67,91,0),(074,07,29,'',80,15,85,12,80,15,75,0,0),(075,07,8,'https://www.youtube.com/embed/_5B9S263aUs',79,78,85,75,80,82,75,89,0),(076,07,10,'https://www.youtube.com/embed/Ykvsc5Npv8s',18,78,5,75,15,83,7,90,0),(077,07,11,'',24,80,3,81,24,77,13,85,0),(078,07,1,'',17,41,0,42,16,20,9,8,0),(079,07,14,'',76,3,80,5,74,10,71,2,0),(080,07,17,'',70,80,75,81,70,75,63,82,0),(081,07,18,'https://www.youtube.com/embed/sIEcUj1Y8W8',18,16,6,10,15,14,10,0,0),(082,07,19,'',80,40,84,41,91,18,82,7,0),(083,07,24,'',20,44,1,45,16,10,8,0,0),(084,07,25,'',82,13,86,14,51,19,45,9,0),(085,08,2,'',17,43,0,44,16,12,10,3,0),(086,08,3,'',80,58,84,59,89,15,79,4,0),(087,08,31,'',80,15,85,12,80,15,75,0,0),(088,08,30,'',18,16,6,10,15,14,10,0,0),(089,08,32,'',79,78,85,75,80,82,75,89,0),(090,08,9,'',17,78,5,75,16,82,8,89,0),(091,08,23,'',76,85,80,86,70,86,65,92,0),(092,08,26,'',79,8,83,9,51,10,44,1,0),(093,08,28,'',20,85,4,86,23,86,18,92,0),(094,09,1,'',17,36,0,37,17,70,8,76,0),(095,09,13,'',81,36,87,37,79,23,86,22,0),(096,09,34,'',72,41,78,37,87,52,80,60,0),(097,09,37,'',26,16,15,12,10,22,3,8,0),(098,09,38,'',26,78,15,75,10,75,3,82,0),(099,09,12,'',80,59,85,57,60,91,51,98,0),(100,09,15,'',82,6,87,5,79,70,75,76,0),(101,09,20,'',16,59,1,58,35,6,6,5,0),(103,09,23,'',78,87,83,88,37,91,18,92,0),(104,09,16,'',15,6,7,7,17,25,2,25,0),(105,01,34,'',25,78,13,73,10,78,4,85,0);
/*!40000 ALTER TABLE `cat_tipos_radiografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_zonas`
--

DROP TABLE IF EXISTS `cat_zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_zonas` (
  `id_zona` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `zona` varchar(45) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `estados` text COLLATE latin1_spanish_ci,
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_zona`),
  UNIQUE KEY `id_zona_UNIQUE` (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_zonas`
--

LOCK TABLES `cat_zonas` WRITE;
/*!40000 ALTER TABLE `cat_zonas` DISABLE KEYS */;
INSERT INTO `cat_zonas` (`id_zona`, `zona`, `estados`, `baja`) VALUES (01,'Zona 1','Aguascalientes<br>Colima<br>Guanajuato<br>Jalisco<br>Nayarit<br>Tlaxcala<br>Zacatecas',0),(02,'Zona 2','CDMX<br>Estado de México<br>Hidalgo<br>Michoacán<br>Morelos<br>Puebla<br>Querétaro',0),(03,'Zona 3','Baja California Sur<br>Guerrero<br>Oaxaca<br>San Luis Potosí<br>Tamaulipas<br>Veracruz',0),(04,'Zona 4','Baja California Norte<br>Chiapas<br>Chihuahua<br>Coahuila<br>Durango<br>Nuevo León<br>Sonora<br>Tabasco<br>Yucatán',0);
/*!40000 ALTER TABLE `cat_zonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_prod` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_tipo` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `modelo` varchar(30) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `titulo` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `voltaje` smallint(3) unsigned NOT NULL DEFAULT '0',
  `thinq` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `dualinverter` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `tuv` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `plasmaster` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `g10` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '' COMMENT '5 o 10 años',
  `g5` char(2) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `imagen` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `imagen_desc` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `baja` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prod`),
  UNIQUE KEY `id_prod_UNIQUE` (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id_prod`, `id_tipo`, `modelo`, `titulo`, `voltaje`, `thinq`, `dualinverter`, `tuv`, `plasmaster`, `g10`, `g5`, `imagen`, `imagen_desc`, `url`, `baja`) VALUES (00001,1,'LP1017WSR','Aire portátil',110,'No','No','No','No','No','Si','LP1017WSR','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-LP1017WSR#pdp_where',0),(00002,1,'LP1217GSR','Aire portátil',110,'No','No','No','No','No','Si','LP1217GSR','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-LP1217GSR#pdp_where',0),(00003,1,'LP1417SHR','Aire portátil',110,'No','No','No','No','No','Si','LP1417SHR','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-LP1417SHR#pdp_where',0),(00004,9,'LP1419IVSM','El primer Portátil Inverter en México con inteligencia artificial',110,'Si','Si','No','No','Si','No','LP1419IVSM','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-LP1419IVSM#pdp_where',0),(00005,2,'SW362H8','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','SW362H8','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-SW362H8#pdp_where',0),(00006,3,'VM121C9','*DUALCOOL Inverter ahora con inteligencia Artificial',110,'Si','Si','Si','No','Si','No','VM121C9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM121C9#pdp_where',0),(00007,3,'VM121H9','*DUALCOOL Inverter ahora con inteligencia Artificial',110,'Si','Si','Si','No','Si','No','VM121H9','dualcool inverter.svg','',0),(00008,3,'VM122C9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM122C9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM122C9#pdp_where',0),(00009,3,'VM122H9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM122H9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM122H9#pdp_where',0),(00010,3,'VM182C9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM182C9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM182C9#pdp_where',0),(00011,3,'VM182H9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM182H9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM182H9#pdp_where',0),(00012,3,'VM242C9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM242C9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM242C9-1#pdp_where',0),(00013,3,'VM242H9','*DUALCOOL Inverter ahora con inteligencia Artificial',220,'Si','Si','Si','No','Si','No','VM242H9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VM242H9#pdp_where',0),(00014,4,'VP122CR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP122CR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP122CR#pdp_where',0),(00015,4,'VP122HR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP122HR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP122HR#pdp_where',0),(00016,4,'VP182CR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP182CR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP182CR#pdp_where',0),(00017,4,'VP182HR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP182HR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP182HR#pdp_where',0),(00018,4,'VP242CR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP242CR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP242CR#pdp_where',0),(00019,4,'VP242HR','*DUALCOOL INVERTER PLUS ahora con inteligencia Artificial',220,'Si','Si','Si','Si','Si','No','VP242HR','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VP242HR#pdp_where',0),(00020,5,'VR122CW','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR122CW','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR122CW#pdp_where',0),(00021,5,'VR122HD','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR122HD','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR122HD#pdp_where',0),(00022,5,'VR182CW','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR182CW','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR182CW#pdp_where',0),(00023,5,'VR182HW','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR182HW','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR182HW#pdp_where',0),(00024,5,'VR242CW','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR242CW','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR242CW#pdp_where',0),(00025,5,'VR242HW','ARTCOOL Inverter ahora con inteligencia artificial',220,'Si','Si','Si','Si','Si','No','VR242HW','artcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VR242HW#pdp_where',0),(00026,6,'VW151CE','El primer AC Ventana Inverter en México con inteligencia artificial',110,'Si','Si','No','No','Si','No','VW151CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VW151CE#pdp_where',0),(00027,6,'VW182CE','El primer AC Ventana Inverter en México con inteligencia artificial',220,'Si','Si','No','No','Si','No','VW182CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VW151CE#pdp_where',0),(00028,6,'VW222CE','El primer AC Ventana Inverter en México con inteligencia artificial',220,'Si','Si','No','No','Si','No','VW222CE','','',0),(00029,7,'VX122C8','DUALCOOL Inverter',220,'No','Si','Si','No','Si','No','VX122C8','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VX122C8#pdp_where',0),(00030,7,'VX122C8','DUALCOOL Inverter',220,'No','Si','Si','No','Si','No','VX122C8','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VX122C8#pdp_where',0),(00031,7,'VX182C9','DUALCOOL Inverter',220,'No','Si','Si','No','Si','No','VX182C9','dualcool inverter.svg','https://www.lg.com/mx/aire-acondicionado-residencial/lg-VX182C9#pdp_where',0),(00032,8,'W051CE','AC Ventana',110,'No','No','No','No','No','Si','W051CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-W051CE#pdp_where',0),(00033,8,'W051CS','AC Ventana',110,'No','No','No','No','No','Si','W051CS','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-W051CS#pdp_where',0),(00034,8,'W081CE','AC Ventana',110,'No','No','No','No','No','Si','W081CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-W081CE#pdp_where',0),(00035,8,'W121CE','AC Ventana',110,'No','No','No','No','No','Si','W121CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-W121CE#pdp_where',0),(00036,8,'W122CE','AC Ventana',220,'No','No','No','No','No','Si','W122CE','','https://www.lg.com/mx/aire-acondicionado-residencial/lg-W122CE#pdp_where',0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_tipo_aire`
--

DROP TABLE IF EXISTS `productos_tipo_aire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_tipo_aire` (
  `id_taire` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_prod` smallint(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `id_aire` tinyint(1) NOT NULL DEFAULT '0',
  `id_zona` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `id_hab` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_taire`),
  UNIQUE KEY `id_taire_UNIQUE` (`id_taire`),
  KEY `fk_productos_tipo_aire_productos_idx` (`id_prod`),
  CONSTRAINT `fk_productos_tipo_aire_productos` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_tipo_aire`
--

LOCK TABLES `productos_tipo_aire` WRITE;
/*!40000 ALTER TABLE `productos_tipo_aire` DISABLE KEYS */;
INSERT INTO `productos_tipo_aire` (`id_taire`, `id_prod`, `id_aire`, `id_zona`, `id_hab`) VALUES (00001,00001,1,1,3),(00002,00001,1,2,3),(00003,00001,1,3,2),(00004,00001,1,4,1),(00005,00002,1,1,6),(00006,00002,1,2,7),(00007,00002,1,3,5),(00008,00002,1,4,4),(00009,00003,2,1,6),(00010,00003,2,2,7),(00011,00003,2,3,5),(00012,00003,2,4,5),(00013,00004,1,1,6),(00014,00004,1,2,7),(00015,00004,1,3,5),(00016,00004,1,4,4),(00017,00005,2,1,18),(00018,00005,2,2,19),(00019,00005,2,3,17),(00020,00005,2,4,15),(00021,00006,1,1,6),(00022,00006,1,2,7),(00023,00006,1,3,5),(00024,00006,1,4,4),(00025,00007,2,1,6),(00026,00007,2,2,7),(00027,00007,2,3,5),(00028,00007,2,4,5),(00029,00008,1,1,6),(00030,00008,1,2,7),(00031,00008,1,3,5),(00032,00008,1,4,4),(00033,00009,2,1,6),(00034,00009,2,2,7),(00035,00009,2,3,5),(00036,00009,2,4,5),(00037,00010,1,1,10),(00038,00010,1,2,11),(00039,00010,1,3,9),(00040,00010,1,4,8),(00041,00011,2,1,10),(00042,00011,2,2,11),(00043,00011,2,3,9),(00044,00011,2,4,9),(00045,00012,1,1,14),(00046,00012,1,2,16),(00047,00012,1,3,13),(00048,00012,1,4,12),(00049,00013,2,1,14),(00050,00013,2,2,16),(00051,00013,2,3,13),(00052,00013,2,4,13),(00053,00014,1,1,6),(00054,00014,1,2,7),(00055,00014,1,3,5),(00056,00014,1,4,4),(00057,00015,2,1,6),(00058,00015,2,2,7),(00059,00015,2,3,5),(00060,00015,2,4,5),(00061,00016,1,1,10),(00062,00016,1,2,11),(00063,00016,1,3,9),(00064,00016,1,4,8),(00065,00017,2,1,10),(00066,00017,2,2,11),(00067,00017,2,3,9),(00068,00017,2,4,9),(00069,00018,1,1,14),(00070,00018,1,2,16),(00071,00018,1,3,13),(00072,00018,1,4,12),(00073,00019,2,1,14),(00074,00019,2,2,16),(00075,00019,2,3,13),(00076,00019,2,4,13),(00077,00020,1,1,6),(00078,00020,1,2,7),(00079,00020,1,3,5),(00080,00020,1,4,4),(00081,00021,2,1,6),(00082,00021,2,2,7),(00083,00021,2,3,5),(00084,00021,2,4,5),(00085,00022,1,1,10),(00086,00022,1,2,11),(00087,00022,1,3,9),(00088,00022,1,4,8),(00089,00023,2,1,10),(00090,00023,2,2,11),(00091,00023,2,3,9),(00092,00023,2,4,9),(00093,00024,1,1,14),(00094,00024,1,2,16),(00095,00024,1,3,13),(00096,00024,1,4,12),(00097,00025,2,1,14),(00098,00025,2,2,16),(00099,00025,2,3,13),(00100,00025,2,4,13),(00101,00026,1,1,6),(00102,00026,1,2,7),(00103,00026,1,3,5),(00104,00026,1,4,4),(00105,00027,1,1,10),(00106,00027,1,2,11),(00107,00027,1,3,9),(00108,00027,1,4,8),(00109,00028,1,1,10),(00110,00028,1,2,11),(00111,00028,1,3,9),(00112,00028,1,4,8),(00113,00029,1,1,6),(00114,00029,1,2,7),(00115,00030,1,3,5),(00116,00030,1,4,4),(00117,00031,1,1,10),(00118,00031,1,2,11),(00119,00031,1,3,9),(00120,00031,1,4,8),(00121,00032,1,1,3),(00122,00032,1,2,3),(00123,00032,1,3,2),(00124,00032,1,4,1),(00125,00033,1,1,3),(00126,00033,1,2,3),(00127,00033,1,3,2),(00128,00033,1,4,1),(00129,00034,1,1,3),(00130,00034,1,2,3),(00131,00034,1,3,2),(00132,00034,1,4,1),(00133,00035,1,1,6),(00134,00035,1,2,7),(00135,00035,1,3,5),(00136,00035,1,4,4),(00137,00036,1,1,6),(00138,00036,1,2,7),(00139,00036,1,3,5),(00140,00036,1,4,4);
/*!40000 ALTER TABLE `productos_tipo_aire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lg_ac'
--

--
-- Dumping routines for database 'lg_ac'
--
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-13 16:05:39
