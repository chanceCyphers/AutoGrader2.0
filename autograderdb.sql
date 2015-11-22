-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: autograderdb
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'1','Computer Science','aikeji','2015-11-15 17:45:16'),(2,'1.1','Java','aikeji','2015-11-15 17:45:52'),(3,'1.1.1','Enums','aikeji','2015-11-15 17:46:20'),(4,'1.2','PHP','aikeji','2015-11-15 17:46:51'),(5,'1.2.1','PHPUnit','aikeji','2015-11-15 17:47:10'),(6,'1.3','C++','aikeji','2015-11-15 17:47:36'),(21,'1.1.3','Interfaces','developer','2015-11-15 19:23:38'),(22,'1.2.2','Classes','developer','2015-11-15 19:24:00'),(24,'1.2.1.1','Testing','developer','2015-11-15 20:19:29'),(108,'1.4','BASIC','developer','2015-11-16 15:56:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_des` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'NEW_USER');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `perm_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `perm_des` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ADMIN'),(2,'PROFESSOR'),(3,'STUDENT'),(4,'GUEST');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_types`
--

DROP TABLE IF EXISTS `question_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_types` (
  `type_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_types`
--

LOCK TABLES `question_types` WRITE;
/*!40000 ALTER TABLE `question_types` DISABLE KEYS */;
INSERT INTO `question_types` VALUES (1,'TRUE/FALSE'),(2,'SHORT ANSWER'),(3,'MULTIPLE CHOICE'),(4,'ESSAY'),(5,'DYNAMIC'),(6,'CODING');
/*!40000 ALTER TABLE `question_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `q_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(3) unsigned NOT NULL,
  `title` varchar(60) NOT NULL,
  `question` text,
  `answer` text,
  `choice_1` varchar(60) DEFAULT NULL,
  `choice_2` varchar(60) DEFAULT NULL,
  `choice_3` varchar(60) DEFAULT NULL,
  `owner` varchar(30) NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `visible` int(2) NOT NULL,
  `permitted` text,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (3,1,'Java Inheritence','In Java, a class can inherit from multiple parent classes.','false',NULL,NULL,NULL,'developer',2,2,''),(4,1,'BASIC origins.','BASIC was created for the sole purpose of being a teaching language.','true',NULL,NULL,NULL,'developer',108,2,'');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `test_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) unsigned NOT NULL,
  `question_ids` text,
  `owner` varchar(30) NOT NULL,
  `group_ids` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `group_id` int(3) unsigned NOT NULL,
  `perm_id` int(2) unsigned NOT NULL,
  PRIMARY KEY (`username`),
  KEY `perm_id` (`perm_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`),
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('bbush6','b5a369ac346a15cbb7a8b3e0202adc6b7c8a3e38','bbush6@emich.edu',1,4),('btbush','b408130e16f82595142a6312502bfd1c85afb914','btbush@med.umich.edu',1,4),('developer','123456','dev@emich.edu',1,1),('prof','123456','prof@emich.edu',1,2),('student','123456','student@emich.edu',1,3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visible_types`
--

DROP TABLE IF EXISTS `visible_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visible_types` (
  `v_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `setting` varchar(30) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visible_types`
--

LOCK TABLES `visible_types` WRITE;
/*!40000 ALTER TABLE `visible_types` DISABLE KEYS */;
INSERT INTO `visible_types` VALUES (1,'NONE'),(2,'ALL'),(3,'SPECIFIC');
/*!40000 ALTER TABLE `visible_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-22 11:34:38
