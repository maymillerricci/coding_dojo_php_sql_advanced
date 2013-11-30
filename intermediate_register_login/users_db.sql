CREATE DATABASE  IF NOT EXISTS `users_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `users_db`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: users_db
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  KEY `fk_comments_users1_idx` (`user_id`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,7,1,'testing a comment from maymay on test message 1','2013-10-30 16:14:00',NULL),(2,9,1,'2nd comment - from maymillerricci - on test message 1','2013-10-30 16:15:46',NULL),(5,9,4,'test comment on 4th message','2013-10-30 16:35:10',NULL),(6,13,1,'Coding Dojo\'s comment on test message 1 (3rd comment total on that one)','2013-10-30 16:36:37',NULL),(7,13,2,'Coding Dojo\'s first comment on second test message','2013-10-30 16:45:37',NULL),(8,13,4,'CD comment 2 on message 4','2013-10-30 16:46:10',NULL),(9,7,4,'may may\'s comment 3 on message 4','2013-10-30 16:53:15',NULL),(10,13,6,'CD comment1 on message6!?!? ','2013-10-30 20:22:44',NULL),(11,7,11,'comment posted at 10:25','2013-10-30 22:25:21',NULL),(12,13,12,'comment at 10:29','2013-10-30 22:29:33',NULL),(17,13,14,'COMMENT!','2013-10-30 22:44:06',NULL),(18,13,11,'10:44 comment 10:44 comment 10:44 comment 10:44 comment 10:44 comment 10:44 comment ','2013-10-30 22:44:20',NULL),(19,7,14,'may may comment','2013-10-30 22:45:28',NULL),(20,7,19,'TEST COMMENT','2013-10-31 10:15:44',NULL),(21,7,20,'esttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest','2013-10-31 14:28:40',NULL),(22,13,20,'comment','2013-11-06 19:38:55',NULL),(23,15,5,'jhkjh','2013-11-10 14:25:55',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,7,'test message 1','2013-10-30 13:59:31',NULL),(2,12,'Here is my second test message.  Hello!','2013-10-30 14:44:45',NULL),(3,12,'another test message','2013-10-30 14:51:58',NULL),(4,12,'and one more message...','2013-10-30 14:52:06',NULL),(5,7,'message #5!!!!!!!!','2013-10-30 17:20:57',NULL),(6,7,'MESSAGE # 6','2013-10-30 17:42:07',NULL),(7,7,'MESSAGE # 7!!!!!!!!!','2013-10-30 18:05:01',NULL),(8,13,'Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...  Message # 8.  This needs to be a long message so I can test some things...','2013-10-30 21:06:12',NULL),(11,7,'new message posted at 9:48pm','2013-10-30 21:48:48',NULL),(12,7,'new message posted at 9:55 pm','2013-10-30 21:55:30',NULL),(14,7,'another new message','2013-10-30 22:41:45',NULL),(15,7,'INSERT INTO message (user_id, message) VALUES (1, \'EVIL MESSAGE!\')','2013-10-31 09:59:09',NULL),(16,7,'test','2013-10-31 10:05:55',NULL),(17,7,'mysql_real_escape_string(test test)','2013-10-31 10:07:31',NULL),(18,7,'mysql_real_escape_string(may)','2013-10-31 10:08:15',NULL),(19,7,'TEST','2013-10-31 10:14:28',NULL),(20,7,'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest','2013-10-31 14:21:25',NULL),(21,15,'i was here','2013-11-10 14:25:30',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'qwerty','zxcvb','qwerty','94b8cea57c49a3007225a0c70c475450','q@q.q','0000-00-00','2013-10-29 14:39:54',NULL),(7,'may','may','maymay','ca5757b6f6b2bb13eee4fb73cc44a5ee','may@may.com','0000-00-00','2013-10-29 14:48:22',NULL),(8,'eliza','k','elizak','25d55ad283aa400af464c76d713c07ad','e@d.b','0000-00-00','2013-10-29 15:28:21',NULL),(9,'may','mr','maymillerricci','25d55ad283aa400af464c76d713c07ad','may@may.com','0000-00-00','2013-10-30 13:42:17',NULL),(10,'q','q','testuser','25d55ad283aa400af464c76d713c07ad','q@q.q','0000-00-00','2013-10-30 13:43:11',NULL),(11,'q','q','testuser2','25d55ad283aa400af464c76d713c07ad','q@q.q','0000-00-00','2013-10-30 13:45:45',NULL),(12,'May','Millerricci','MayMiller','25d55ad283aa400af464c76d713c07ad','may@may.com','0000-00-00','2013-10-30 14:44:27',NULL),(13,'Coding','Dojo','CodingDojo','25d55ad283aa400af464c76d713c07ad','c@d.c','0000-00-00','2013-10-30 16:36:07',NULL),(14,'ytrewq','qwerty','ytrewq','ed2b1f468c5f915f3f1cf75d7068baae','qw@er.ty','0000-00-00','2013-10-31 10:18:56',NULL),(15,'Mark','Loveland','markloveland','da877c3656ea2a08f5fb7c9af1d4774f','markloveland@gmail.com','0000-00-00','2013-11-10 14:25:01',NULL);
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

-- Dump completed on 2013-11-29 18:12:14
