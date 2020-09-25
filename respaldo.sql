-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: eiam2020
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `user_id` int(15) NOT NULL,
  `fecha_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  `lista_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'Hola\n',1,'2020-09-04 19:54:08',1),(2,'Hello',1,'2020-09-06 19:40:16',1),(3,'Hola hay alguien?',25,'2020-09-06 21:45:20',2);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `color` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'#2962ff'),(2,'#fb046b'),(3,'#008080'),(4,'#f93a05'),(6,'#f3be0b');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(15) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `votes` int(10) DEFAULT '0',
  `comment_father_id` int(15) DEFAULT NULL,
  `lista_id` int(15) DEFAULT NULL,
  `user_id` int(15) NOT NULL,
  `fecha_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Hola, prueba de comentario',1,NULL,1,1,'2020-09-04 19:53:50'),(2,'Lalalal',0,1,1,1,'2020-09-04 19:54:00'),(3,'Hola estamos probando',0,NULL,1,25,'2020-09-06 21:26:11'),(4,'Hola buenas',0,NULL,2,25,'2020-09-06 21:44:54'),(5,'hola',0,NULL,2,25,'2020-09-09 21:31:37'),(6,'Probando',0,NULL,2,25,'2020-09-09 21:31:52');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `cloudname` varchar(50) NOT NULL,
  `api_key` varchar(50) DEFAULT NULL,
  `api_secret` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cloudname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('enmateria-specs','489832313977453','glHHB-a8Xd1M9csxRcrXLwwZPCc');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `cuerpo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'no-replycic@gmail.com','no-replyCic@gmail.com','Hi!  eiam.site \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd prоpоsаl tоtаlly lаwfully? \r\nWе suggеsting а nеw uniquе wаy оf sеnding businеss оffеr thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh соmmеrсiаl оffеrs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis mеssаgе is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693'),(2,'eric@talkwithwebvisitor.com','','Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found eiam.site after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=eiam.site\r\n'),(3,'information@eiam.site','','ATT: eiam.site / EIAM 2020 INTERNET SITE SERVICES\r\nThis notification ENDS ON: Sep 23, 2020\r\n\r\n\r\nWe have actually not gotten a settlement from you.\r\nWe  have actually tried to call you but were unable to contact you.\r\n\r\n\r\nKindly Check Out: https://bit.ly/33LUWWY .\r\n\r\nFor info as well as to process a discretionary payment for services.\r\n\r\n\r\n\r\n09232020042159.\r\n');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `event_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_on` datetime NOT NULL,
  `event_off` datetime NOT NULL DEFAULT '2030-01-01 00:00:00',
  `event_online` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,1,'Materiales de construcción','2020-07-15 00:00:00','2030-01-01 00:00:00',1),(2,2,'Metales resistentes','2020-07-13 00:00:00','2030-01-01 00:00:00',1),(3,1,'Propuestas en altura','2020-08-12 00:00:00','2030-01-01 00:00:00',1),(4,2,'Lozas radiantes','2020-07-31 00:00:00','2030-01-01 00:00:00',1);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `list_type`
--

DROP TABLE IF EXISTS `list_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_type` (
  `list_type_id` int(5) NOT NULL AUTO_INCREMENT,
  `list_type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`list_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list_type`
--

LOCK TABLES `list_type` WRITE;
/*!40000 ALTER TABLE `list_type` DISABLE KEYS */;
INSERT INTO `list_type` VALUES (1,'Conferencias'),(2,'Materiales');
/*!40000 ALTER TABLE `list_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista`
--

DROP TABLE IF EXISTS `lista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '0',
  `lista` text,
  `user_id` int(15) NOT NULL DEFAULT '0',
  `vistas` int(11) DEFAULT '0',
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `list_type` int(5) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista`
--

LOCK TABLES `lista` WRITE;
/*!40000 ALTER TABLE `lista` DISABLE KEYS */;
INSERT INTO `lista` VALUES (1,'Honda Civic Type-R',',Honda Civic Type-R',24,32,'2020-09-01 00:00:00',NULL,1),(2,'Prueba 2',',Honda Civic Type-R',2,27,'2020-09-01 16:50:00',NULL,1),(3,'Prueba 3',',Honda Civic Type-R',2,0,'2020-09-30 17:01:00',NULL,1),(4,'Prueba 4',',Honda Civic Type-R',3,0,'2020-09-30 17:01:00',NULL,1),(5,'Lobo de Wallstreet',',Lobo,Honda Civic Type-R',24,1,'2020-09-21 19:22:00',NULL,1);
/*!40000 ALTER TABLE `lista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professions`
--

DROP TABLE IF EXISTS `professions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professions` (
  `profession_id` int(3) NOT NULL AUTO_INCREMENT,
  `profession` varchar(40) NOT NULL,
  PRIMARY KEY (`profession_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professions`
--

LOCK TABLES `professions` WRITE;
/*!40000 ALTER TABLE `professions` DISABLE KEYS */;
INSERT INTO `professions` VALUES (1,'Arquitecto'),(2,'Ingeniero civil'),(3,'Diseñador gráfico'),(4,'Estudiante');
/*!40000 ALTER TABLE `professions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialmedia`
--

DROP TABLE IF EXISTS `socialmedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socialmedia` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socialmedia`
--

LOCK TABLES `socialmedia` WRITE;
/*!40000 ALTER TABLE `socialmedia` DISABLE KEYS */;
INSERT INTO `socialmedia` VALUES (1,'Instagram',NULL),(2,'Facebook',NULL);
/*!40000 ALTER TABLE `socialmedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `url_file` varchar(255) DEFAULT NULL,
  `alt_text` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (10,'masisa blanco transparente.png','masisa','http://www.masisa.cl'),(11,'udd blanco transparente.png','universidad del desarrollo','http://www.udd.cl'),(12,'knauf blanco transparente.png','knauf','http://www.knauf.cl'),(13,'fundermax blanco transparente.png','fundermax','http://www.grupobasica.com'),(14,'masisa blanco transparente.png','dfs','https://v2computers.com'),(15,'masisa blanco transparente.png','sdf','https://v2computers.com'),(17,'knauf blanco transparente.png','dfs','https://v2computers.com');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `accion` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `cuerpo` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `accion` (`accion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'email_de_bienvenida','Bienvenido a EIAM','<h3>Bievenido a EIAM, {{user_name}}:<br /><br /></h3>\r\n<p>En esta plataforma podras ver eventos de arquitenctura<br />lorem ispsum dolor sit amet</p>'),(2,'email_de_reseteo_de_clave','Reinicio de clave','<h3>Reinicio de Clave</h3>\r\n<p>Estimado {{user_name}} ud ha solicitado un reinicio de clave, su nueva clave es:</p>\r\n<p>{{passwd}}</p>\r\n<p>Equipo de EIAM</p>'),(3,'tos','tos','<p>Lorem ipsum dolor sit amet</p>'),(4,'quienes_somos','quienes_somos','<h2 style=\"text-align: center;\"><strong style=\"margin: 0px; padding: 0px; text-align: justify;\">Qui&eacute;nes somos</strong></h2>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum<span style=\"text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p><span style=\"text-align: justify;\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),(5,'principal','principal','<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div><strong style=\"margin: 0px; padding: 0px; text-align: justify;\">Lorem Ipsum</strong><span style=\"text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>'),(6,'cuenta','cuenta','');
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `university_id` int(3) NOT NULL AUTO_INCREMENT,
  `university` varchar(40) NOT NULL,
  PRIMARY KEY (`university_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (1,'Universidad Católica'),(2,'Universidad de Chile'),(3,'Universidad del Desarrollo'),(4,'Universidad de Los Antes'),(5,'Universidad Diego Portales'),(6,'Universidad Mayor');
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accessLevel` int(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(1) NOT NULL DEFAULT '1',
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `profession_id` int(3) NOT NULL,
  `university_id` int(3) NOT NULL,
  `user_company` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,'cristiandelafuente@gmail.com','tan3246','Cristián de la Fuente',2,5,'Infomágica'),(2,2,'eeiiggss@gmail.com','haha','Roberto',3,6,'Hobbylandia'),(3,2,'cristiandelafu@gmail.com','3246','Manuel De La Fuente',2,5,'De La Fuente Construcciones'),(4,3,'fsalazar.sch@gmail.com','91XrGJwSHP','Felipe',1,1,'Infomagica'),(5,1,'lala@lala.cl','secreto','Tan',1,1,'Infomagica'),(10,3,'jjames@enmateriaspecs.com','sLVaWYhJxt','José Ignacio James',3,1,'EnMateria Specs'),(21,1,'cristian@infomagica.cl','3246','Tandelaf Fuentes',1,0,'Metaldor y Asociados'),(22,1,'tuboled@tuboled.cl','3246','Carlos Arias',3,0,'Macal'),(24,2,'ericalexb@gmail.com','eric','Eric Burnett',2,2,'B&A Abogados'),(25,1,'joseignaciojames@gmail.com','n0xrkght4V','Ignacio James',1,0,'Particular'),(26,1,'info@enmateria.cl','pecosa2016','Juan Perez Soto',1,0,'Particular'),(27,1,'fran@hotmail.com','3246','Fran Silvestri',2,0,'En Materia Specs'),(31,1,'admin@nullpointerex.com','test','doge',4,2,''),(32,1,'kako@gmail.com','3246','Prueba Tan',4,4,''),(33,1,'ana@gmail.com','3246','Ana María',4,4,''),(34,1,'andres@dbgcomunicaciones.cl','fuegoadls','Andres Galindo',3,0,'DBG COMUNICACIONES'),(35,1,'sebastian@buildpro.cl','Seba123456','Sebastián Greene',1,0,'Buildpro '),(36,1,'milagrosbeunza@gmail.com','delfin77','milagros',3,0,'habilidades');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `nombre` varchar(200) NOT NULL DEFAULT '0',
  `tipo` varchar(20) NOT NULL DEFAULT '0',
  `secure_url` varchar(500) NOT NULL DEFAULT '0',
  `subtitle` varchar(200) DEFAULT NULL,
  `ingles` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES ('Honda Civic Type-R','contenido','https://res.cloudinary.com/enmateria-specs/video/upload/v1599079675/contenido/Honda%20Civic%20Type-R.mp4',NULL,NULL),('index','contenido','https://res.cloudinary.com/enmateria-specs/video/upload/v1600139652/contenido/index.mp4',NULL,NULL),('Lobo','contenido','https://res.cloudinary.com/enmateria-specs/video/upload/v1600899597/contenido/Lobo.mp4',NULL,NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `comment_id` int(15) DEFAULT NULL,
  `voto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,25,1,1);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-25  1:03:44
