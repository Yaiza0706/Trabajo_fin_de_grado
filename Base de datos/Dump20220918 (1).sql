CREATE DATABASE  IF NOT EXISTS `pagina_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pagina_web`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: pagina_web
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `titulacion` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `id_tipo_usuario` int NOT NULL,
  `mail` varchar(50) NOT NULL,
  `contra` varchar(2000) NOT NULL,
  `id_estado_usuario` int NOT NULL,
  `intentos` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_estado_usuario` (`id_estado_usuario`),
  CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`),
  CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`id_estado_usuario`) REFERENCES `estado_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,'Yaiza','Rubio Chavida','Ingeniería telemática','No',1,'y.rubio@edu.uah.es','$2y$10$mSwJLLc7oVEbeizOyXdKA.oWk09fZc1KyDYnxbIZrwl33vFleJROW',2,0),(2,'Joaquín','Alvárez Horcajo','Doctor en Ingeniería de Telecomunicación','https://www.uah.es/es/estudios/profesor/Joaquin-Alvarez-Horcajo/',1,'j.alvarez@uah.es','$2y$10$R6JDkpvF4qJcHlqNYDo7renWEqYVxHUmt820MG347tgCx2wEUVUVG',2,0),(3,'Isaías','Martínez Yelmo','Doctor en Ingeniería Telemática','https://www.uah.es/es/estudios/profesor/Isaias-Martinez-Yelmo/',3,'isaias.martinezy@uah.es','$2y$10$YZKZV8d0yOOLkt5hzRU9O.0.RKuFqzsDPfw5cR4QzYTnjvk5AJpk2',2,0),(4,'José Manuel','Arco Rodríguez','Doctor en Ingeniería de Telecomunicación','https://www.uah.es/es/estudios/profesor/Jose-Manuel-Arco-Rodriguez/',3,'josem.arco@uah.es','$2y$10$.EDPgLudQYwjLEnHQlfyluUIZUND43mBXvc8NktCmSWn65kvJKZr2',2,0),(5,'Juan Antonio','Carral Pelayo','Doctor en Ingeniería de Telecomunicación','https://www.uah.es/es/estudios/profesor/Juan-Antonio-Carral-Pelayo/',3,'juanantonio.carral@uah.es','$2y$10$f8pnQp.J..IcU4hl8dAhLOomCAGkxTIxmUwaPcIWvJU1QYq.UqBL2',1,0),(6,'Guillermo Agustín','Ibáñez Fernández','Doctor en Ingeniería de Telecomunicación','https://scholar.google.es/citations?user=-9EfrcoAAAAJ&hl=es',3,'guillermo.ibanez@uah.es','$2y$10$JQfUziHQhvgAOkL60mDA1u/Px3ccw8t.y6XYeq6A6FSa.XYa1Tvry',1,0),(7,'Elisa','Rojas Sánchez','Doctora en Ingeniería de Telecomunicación','https://www.uah.es/es/estudios/profesor/Elisa-Rojas-Sanchez/',3,'elisa.rojas@uah.es','$2y$10$WR/DSmdBnoK.UaABctEbO.J8Bc5IXXL5dYell0UiP5GCmMx6PnAFW',1,0),(8,'Diego','López Pajares','Máster en Ingeniería de Telecomunicación','http://www.upm.es/observatorio/vi/index.jsp?pageac=investigador.jsp&idInvestigador=34604',3,'diego.lopezp@upm.es','$2y$10$wcEKwel2yHGQyOsxMLtW3uHernw6yJUwoLw8Uw/2KgoRg.w1KidNS',1,0),(9,'Boby Nicusor','Constantin','Grado en Ingeniería Telemática','No',3,'bobby.nicursor@uah.es','$2y$10$r6RHj6yufhhtf8SzarxhxOeHmcpH6zHIMuM/reH6yaSwbmW97krm.',1,0),(10,'prueba','defensa','Ingeniería telemática','yaiza.com',3,'yaizarubioch@gmail.com','$2y$10$vF05orZFLJ.tOcJMAyiIcuDFPiRsR8v4mGAAauFAu9Q2BLzToa3IS',1,4),(11,'Prueba','final','No','No',3,'prueba@gmail.com','$2y$10$6qEsRnNAARCTyL0cb1iq.uS3ApBH7KpVm2jtgA3wdu/Dm4yjTW1lK',1,0);
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_usuario`
--

DROP TABLE IF EXISTS `estado_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_usuario`
--

LOCK TABLES `estado_usuario` WRITE;
/*!40000 ALTER TABLE `estado_usuario` DISABLE KEYS */;
INSERT INTO `estado_usuario` VALUES (1,'No activo',NULL),(2,'Activo',NULL);
/*!40000 ALTER TABLE `estado_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financiacion`
--

DROP TABLE IF EXISTS `financiacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financiacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(2000) DEFAULT NULL,
  `presupuesto_total` varchar(50) NOT NULL,
  `id_proyecto` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `financiacion_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financiacion`
--

LOCK TABLES `financiacion` WRITE;
/*!40000 ALTER TABLE `financiacion` DISABLE KEYS */;
INSERT INTO `financiacion` VALUES (1,' Este proyecto está cofinanciado por la Comunidad de Madrid y por la Unión Europea a través del Fondo Social Europeo.','15.000,00€',1);
/*!40000 ALTER TABLE `financiacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo_grupo` varchar(100) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `web` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'../imagenes_subidas/logo_grupo_1657105553.6764.jpg','Redes y Sistemas Inteligentes - Networks and Intelligent Systems','Grupo de investigación perteneciente a la Universidad de Alcalá y cuyo objetivo es contribuir a la sociedad mediante la investigación, el desarrollo tecnológico y la formación de personal especializado en el ámbito de las tecnologías de la información y las comunicaciones, especialmente en relación a las redes y los servicios telemáticos, la optimización de redes complejas, los sistemas inteligentes de transporte y los sistemas de ayuda a la toma de decisiones.','https://www.uah.es/es/investigacion/unidades-de-investigacion/grupos-de-investigacion/Redes-y-Sistemas-Inteligentes-Networks-and-Intelligent-Systems/#presen');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo`
--

LOCK TABLES `logo` WRITE;
/*!40000 ALTER TABLE `logo` DISABLE KEYS */;
INSERT INTO `logo` VALUES (1,'Comunidad de Madrid','../imagenes_subidas/logo_financiacion_1657108814.8363.png'),(2,'Unión Europea','../imagenes_subidas/logo_financiacion_1657108828.2082.png');
/*!40000 ALTER TABLE `logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objetivos`
--

DROP TABLE IF EXISTS `objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objetivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(5000) DEFAULT NULL,
  `id_proyecto` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `objetivos_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objetivos`
--

LOCK TABLES `objetivos` WRITE;
/*!40000 ALTER TABLE `objetivos` DISABLE KEYS */;
INSERT INTO `objetivos` VALUES (1,' El proyecto IRIS se organiza alrededor de dos objetivos principales. El primero se centra en la exploración y monitorización de recursos; mientras que el segundo lo hace en el encaminamiento eficiente. Estos dos objetivos están directamente relacionados con las dos funcionalidades, o servicios, que es necesario diseñar e implementar para la integración de redes IoT en entornos inteligentes basados en SDN/NFV.\r\n\r\nExploración y monitorización de recursos: Se pretende poder explorar y monitorizar los diferentes (y heterogéneos) recursos disponibles en redes IoT de manera integrada con sistemas basados en SDN/NFV ya existentes\r\n\r\nEncaminamiento eficiente: El fundamento del segundo objetivo es garantizar un encaminamiento eficiente para los nodos participantes en una red IoT integrada en un entorno SDN/NFV. Concretamente, se pretende proponer alternativas más eficientes energéticamente y escalables al estándar de facto actual (RPL), dado que RPL no provee un método de integración con el resto de la red SDN/NFV (ni por tanto con redes 5G)',1);
/*!40000 ALTER TABLE `objetivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `anyo` int unsigned NOT NULL,
  `presupuesto` varchar(50) NOT NULL,
  `id_proyecto` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `periodos_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES (1,2020,'7500',1),(2,2021,'7500',1);
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo_proyecto` varchar(100) NOT NULL,
  `logo_proyecto` varchar(100) DEFAULT NULL,
  `titulo` varchar(300) DEFAULT NULL,
  `numero_expediente` varchar(50) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `cif` varchar(20) DEFAULT NULL,
  `duracion` varchar(20) DEFAULT NULL,
  `resumen` varchar(2000) DEFAULT NULL,
  `logo_menu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Integración de Redes IoT en entornos inteligentes basados en SDN/NFV y redes 5G','../imagenes_subidas/logo_proyecto_1657109137.2304.jpg','IRIS-CM','CM/JIN/2019-039','01/01/2020','Q2818018J','24 meses','  Actualmente, las redes de comunicaciones son cruciales para interconectar un mundo digitalizado formado por un gran número de dispositivos heterogéneos al cual se le conoce como Internet de las Cosas (IoT-Internet of Things). Por este motivo, la quinta generación de red móvil (5G) prevé la integración de estos dispositivos IoT en redes inteligentes apoyadas en las tecnologías de las redes definidas por software (SDN - Software-Defined Networking) y la virtualización de funciones de red (NFV-Network Function Virtualization). Sin embargo, esta la integración de IoT y SDN/NFV no es todavía posible debido a las limitaciones de energía, capacidad o del firmware/software de los dispositivos IoT. Por todo ello, el proyecto IRIS tiene como objetivo facilitar la integración de estas tecnologías mediante el estudio de protocolos y servicios inteligentes que permitan faciliten la configuración de red, el descubrimiento de recursos y servicios para hacer un uso adecuado y eficiente de ellos. Además, se estudiarán mecanismos de encaminamiento eficiente en entornos IoT de forma integrada con redes inteligentes basadas en SDN/NFVV, (como son las redes 5G). De esta manera, se pretende impulsar la integración del IoT con el núcleo de las redes de comunicaciones para ofrecer soluciones y servicios más avanzados que permitan continuar con la modernización de la sociedad. ','../imagenes_subidas/logo_menu_1657109137.237.png');
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_equipo_proyecto`
--

DROP TABLE IF EXISTS `rel_equipo_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rel_equipo_proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_equipo` int NOT NULL,
  `id_proyecto` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_equipo` (`id_equipo`,`id_proyecto`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `rel_equipo_proyecto_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id`),
  CONSTRAINT `rel_equipo_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_equipo_proyecto`
--

LOCK TABLES `rel_equipo_proyecto` WRITE;
/*!40000 ALTER TABLE `rel_equipo_proyecto` DISABLE KEYS */;
INSERT INTO `rel_equipo_proyecto` VALUES (9,2,1),(10,3,1),(11,4,1),(12,5,1),(13,6,1),(14,7,1),(15,8,1),(16,9,1);
/*!40000 ALTER TABLE `rel_equipo_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_grupos_proyecto`
--

DROP TABLE IF EXISTS `rel_grupos_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rel_grupos_proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_grupo` int NOT NULL,
  `id_proyecto` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_grupo` (`id_grupo`,`id_proyecto`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `rel_grupos_proyecto_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`),
  CONSTRAINT `rel_grupos_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_grupos_proyecto`
--

LOCK TABLES `rel_grupos_proyecto` WRITE;
/*!40000 ALTER TABLE `rel_grupos_proyecto` DISABLE KEYS */;
INSERT INTO `rel_grupos_proyecto` VALUES (2,1,1);
/*!40000 ALTER TABLE `rel_grupos_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_ip_proyecto`
--

DROP TABLE IF EXISTS `rel_ip_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rel_ip_proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ip` int NOT NULL,
  `id_proyecto` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_ip` (`id_ip`,`id_proyecto`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `rel_ip_proyecto_ibfk_1` FOREIGN KEY (`id_ip`) REFERENCES `equipo` (`id`),
  CONSTRAINT `rel_ip_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_ip_proyecto`
--

LOCK TABLES `rel_ip_proyecto` WRITE;
/*!40000 ALTER TABLE `rel_ip_proyecto` DISABLE KEYS */;
INSERT INTO `rel_ip_proyecto` VALUES (2,3,1);
/*!40000 ALTER TABLE `rel_ip_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_logo_proyecto`
--

DROP TABLE IF EXISTS `rel_logo_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rel_logo_proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_proyecto` int NOT NULL,
  `id_logo` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_proyecto` (`id_proyecto`,`id_logo`),
  KEY `id_logo` (`id_logo`),
  CONSTRAINT `rel_logo_proyecto_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`),
  CONSTRAINT `rel_logo_proyecto_ibfk_2` FOREIGN KEY (`id_logo`) REFERENCES `logo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_logo_proyecto`
--

LOCK TABLES `rel_logo_proyecto` WRITE;
/*!40000 ALTER TABLE `rel_logo_proyecto` DISABLE KEYS */;
INSERT INTO `rel_logo_proyecto` VALUES (3,1,1),(4,1,2);
/*!40000 ALTER TABLE `rel_logo_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_resultados_proyecto`
--

DROP TABLE IF EXISTS `rel_resultados_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rel_resultados_proyecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_resultado` int NOT NULL,
  `id_proyecto` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_resultado` (`id_resultado`,`id_proyecto`),
  KEY `id_proyecto` (`id_proyecto`),
  CONSTRAINT `rel_resultados_proyecto_ibfk_1` FOREIGN KEY (`id_resultado`) REFERENCES `resultados` (`id`),
  CONSTRAINT `rel_resultados_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_resultados_proyecto`
--

LOCK TABLES `rel_resultados_proyecto` WRITE;
/*!40000 ALTER TABLE `rel_resultados_proyecto` DISABLE KEYS */;
INSERT INTO `rel_resultados_proyecto` VALUES (10,1,1),(11,2,1),(12,3,1),(13,4,1),(14,5,1),(15,6,1),(16,7,1),(17,8,1),(18,9,1);
/*!40000 ALTER TABLE `rel_resultados_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados`
--

DROP TABLE IF EXISTS `resultados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `anyo_publicacion` int unsigned NOT NULL,
  `id_tipo_publicacion` int DEFAULT NULL,
  `revista` varchar(200) NOT NULL,
  `autores` varchar(2000) NOT NULL,
  `web` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_publicacion` (`id_tipo_publicacion`),
  CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_tipo_publicacion`) REFERENCES `tipo_publicacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados`
--

LOCK TABLES `resultados` WRITE;
/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
INSERT INTO `resultados` VALUES (1,'One-Shot Multiple Disjoint Path Discovery Protocol (1S-MDP)',2020,2,'IEEE Communications Letters','Diego Lopez-Pajares, Joaquin Alvarez-Horcajo, Elisa Rojas, Juan A Carral, Isaias Martinez-Yelmo','https://ieeexplore.ieee.org/abstract/document/9079908'),(2,'HDDP: Hybrid Domain Discovery Protocol for heterogeneous devices in SDN',2020,2,'IEEE Communications Letters','Joaquin Alvarez-Horcajo, Elisa Rojas, Isaias Martinez-Yelmo, Marco Savi y Diego Lopez-Pajares','https://ieeexplore.ieee.org/abstract/document/9081896'),(3,'Analysis of P4 and XDP for IoT Programmability in 6G and Beyond',2020,1,'MDPI IoT','David Carrascal, Elisa Rojas, Joaquin Alvarez-Horcajo, Diego Lopez-Pajares y Isaías Martínez-Yelmo','https://www.mdpi.com/2624-831X/1/2/31'),(4,'A Hybrid SDN Switch based on Standard P4 Code',2021,2,'IEEE Communications Letters','Joaquin Alvarez-Horcajo, Isaias Martinez-Yelmo, Diego Lopez-Pajares, Juan A. Carral y Marco Savi','https://ieeexplore.ieee.org/document/9316157'),(5,'Outperforming RPL with scalable routing based on meaningful MAC addressing',2021,1,'Ad Hoc Networks','Elisa Rojas, Hedayat Hosseini, Carles Gomez, David Carrascal y Jeferson Rodrigues Cotrim','https://www.sciencedirect.com/science/article/pii/S1570870521000147'),(6,'A survey on Machine Learning Techniques for Routing Optimization in SDN',2021,1,'IEEE Access','Rashid Amin, Elisa Rojas, Aqsa Aqdus, Sadia Ramzan, David Casillas-Perez, Jose M Arco','https://ieeexplore.ieee.org/document/9493245'),(7,'eHDDP: Enhanced Hybrid Domain Discovery Protocol for network topologies with both wired/wireless and SDN/non-SDN devices',2021,1,'Computer Networks','Isaias Martinez-Yelmo, Joaquin Alvarez-Horcajo, Juan Antonio Carral, Diego Lopez-Pajares','https://www.sciencedirect.com/science/article/pii/S1389128621001110'),(8,'Scalable and Reliable Data Center Networks by Combining Source Routing and Automatic Labelling',2021,1,'MDPI Network','Elisa Rojas, Joaquin Alvarez-Horcajo, Isaias Martinez-Yelmo, Jose M. Arco, and Miguel Briso-Montiano','https://www.mdpi.com/2673-8732/1/1/3'),(9,'The disjoint multipath challenge: multiple disjoint paths guaranteeing scalability',2021,1,'IEEE Access','Diego Lopez-Pajares, Elisa Rojas, Juan A Carral, Isaias Martinez-Yelmo, Joaquin Alvarez-Horcajo.','https://ieeexplore.ieee.org/abstract/document/9432811');
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_publicacion`
--

DROP TABLE IF EXISTS `tipo_publicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_publicacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_publicacion`
--

LOCK TABLES `tipo_publicacion` WRITE;
/*!40000 ALTER TABLE `tipo_publicacion` DISABLE KEYS */;
INSERT INTO `tipo_publicacion` VALUES (1,'Artículo',NULL),(2,'Letter',NULL),(3,'Patente',NULL),(4,'Congreso',NULL);
/*!40000 ALTER TABLE `tipo_publicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Admin',NULL),(2,'Investigador principal',NULL),(3,'Investigador',NULL);
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pagina_web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-18 23:11:39
