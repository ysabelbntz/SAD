-- MySQL dump 10.13  Distrib 5.6.26, for osx10.5 (x86_64)
--
-- Host: localhost    Database: mega
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `account_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` varchar(6) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'Anna','Melgar','admelgar','$2a$10$J7ELAufFTDwm9REekaJSLObhlLnf7MCYvYBnt39ackgkuL.jUUkbi','Admin','anna.melgar@yahoo.com','09151230244','12111 Katipunan Avenue, Manila 1008','Go Anna!'),(2,'Mandy','Moore','mmoore','$2a$04$VUO5cBCOCWCy2o6bc6yCseAz7n9FIo.hnVpqOV5IuiMlk6uDr4n8W','Office','cry@gmail.com','09121144211','12311 J Santos street, QC 1211','Go Mandy!');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cases` (
  `case_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `client_id` mediumint(9) NOT NULL,
  `loan_amount` decimal(9,2) NOT NULL,
  `actual_total_balance` decimal(9,2) NOT NULL,
  `date_of_release` date NOT NULL,
  `date_of_maturity` date NOT NULL,
  `payment_period` smallint(3) NOT NULL,
  `weekly_interest_rate` float NOT NULL,
  `notes` text,
  `status` varchar(8) NOT NULL,
  `actual_principal_balance` decimal(9,2) NOT NULL,
  `actual_interest_balance` decimal(9,2) NOT NULL,
  PRIMARY KEY (`case_id`),
  KEY `cases_fk1` (`client_id`),
  CONSTRAINT `cases_fk1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cases`
--

LOCK TABLES `cases` WRITE;
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` VALUES (1,1,5000.00,4150.00,'2016-05-01','2016-05-29',4,1.75,'','Active',4000.00,150.00),(2,2,30000.00,34800.00,'2016-05-16','2016-06-13',4,4,'','Active',30000.00,4800.00),(3,3,10000.00,11150.00,'2016-05-04','2016-07-13',10,1.75,'','Active',9600.00,1550.00);
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `client_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `account_id` mediumint(9) NOT NULL,
  `classification` varchar(10) NOT NULL,
  `representative_first_name` varchar(50) NOT NULL,
  `representative_last_name` varchar(50) NOT NULL,
  `comaker_first_name` varchar(50) NOT NULL,
  `comaker_last_name` varchar(50) NOT NULL,
  `company_name` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`client_id`),
  KEY `clients_fk` (`account_id`),
  CONSTRAINT `clients_fk` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,'Micro','Alanis','Llena','Alyssa','Benitez','SYNC Consulting','1 Ter Rue Colbert','Active','alyssa.benitez@obf.ateneo.edu','+33667909829',''),(2,1,'SME','Anne','Arrobio','Renz Caesar','Constantino','Coffee Bins and Tea Lifts','1 Ter Rue Colbert','Active','renz_52@yahoo.com','+33667909829',''),(3,1,'Micro','Robert','Cuartero','Renz Caesar','Constantino','JTA','1 Ter Rue Colbert','Active','renz_52@yahoo.com','+33667909829','');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expected`
--

DROP TABLE IF EXISTS `expected`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expected` (
  `expected_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `client_id` mediumint(9) NOT NULL,
  `case_id` mediumint(9) NOT NULL,
  `expected_due_date` date NOT NULL,
  `expected_principal_balance` decimal(9,2) NOT NULL,
  `expected_interest_balance` decimal(9,2) NOT NULL,
  `expected_total_balance` decimal(9,2) NOT NULL,
  `principal_due` decimal(9,2) NOT NULL,
  `interest_due` decimal(9,2) NOT NULL,
  `total_due` decimal(9,2) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`expected_id`),
  KEY `expected_fk1` (`case_id`),
  KEY `expected_fk2` (`client_id`),
  CONSTRAINT `expected_fk1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`),
  CONSTRAINT `expected_fk2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expected`
--

LOCK TABLES `expected` WRITE;
/*!40000 ALTER TABLE `expected` DISABLE KEYS */;
INSERT INTO `expected` VALUES (1,1,1,'2016-05-08',3750.00,262.50,4012.50,1250.00,87.50,1337.50,'Unpaid'),(2,1,1,'2016-05-15',2500.00,175.00,2675.00,1250.00,87.50,1337.50,'Unpaid'),(3,1,1,'2016-05-22',1250.00,87.50,1337.50,1250.00,87.50,1337.50,'Unpaid'),(4,1,1,'2016-05-29',0.00,0.00,0.00,1250.00,87.50,1337.50,'Unpaid'),(5,2,2,'2016-05-23',22500.00,3600.00,26100.00,7500.00,1200.00,8700.00,'Unpaid'),(6,2,2,'2016-05-30',15000.00,2400.00,17400.00,7500.00,1200.00,8700.00,'Unpaid'),(7,2,2,'2016-06-06',7500.00,1200.00,8700.00,7500.00,1200.00,8700.00,'Unpaid'),(8,2,2,'2016-06-13',0.00,0.00,0.00,7500.00,1200.00,8700.00,'Unpaid'),(9,3,3,'2016-05-11',9000.00,1575.00,10575.00,1000.00,175.00,1175.00,'Unpaid'),(10,3,3,'2016-05-18',8000.00,1400.00,9400.00,1000.00,175.00,1175.00,'Unpaid'),(11,3,3,'2016-05-25',7000.00,1225.00,8225.00,1000.00,175.00,1175.00,'Unpaid'),(12,3,3,'2016-06-01',6000.00,1050.00,7050.00,1000.00,175.00,1175.00,'Unpaid'),(13,3,3,'2016-06-08',5000.00,875.00,5875.00,1000.00,175.00,1175.00,'Unpaid'),(14,3,3,'2016-06-15',4000.00,700.00,4700.00,1000.00,175.00,1175.00,'Unpaid'),(15,3,3,'2016-06-22',3000.00,525.00,3525.00,1000.00,175.00,1175.00,'Unpaid'),(16,3,3,'2016-06-29',2000.00,350.00,2350.00,1000.00,175.00,1175.00,'Unpaid'),(17,3,3,'2016-07-06',1000.00,175.00,1175.00,1000.00,175.00,1175.00,'Unpaid'),(18,3,3,'2016-07-13',0.00,0.00,0.00,1000.00,175.00,1175.00,'Unpaid');
/*!40000 ALTER TABLE `expected` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(61) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(50) NOT NULL,
  `client` varchar(60) NOT NULL,
  `old_value` varchar(255) DEFAULT NULL,
  `new_value` varchar(255) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'Melgar Anna','2016-04-23 13:35:02','Add Payment','Daang Matuwid Inc.','','78000 paid last 04/23/16'),(2,'Melgar Anna','2016-04-24 13:22:02','Edit Client Status','RCI','ACTIVE','RISK');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `client_id` mediumint(9) NOT NULL,
  `case_id` mediumint(9) NOT NULL,
  `account_id` mediumint(9) NOT NULL,
  `expected_id` mediumint(9) NOT NULL,
  `turn_date` date NOT NULL,
  `type_of_payment` varchar(11) NOT NULL,
  `check_number` varchar(15) DEFAULT NULL,
  `turn_amount` decimal(9,2) NOT NULL,
  `principal_paid` decimal(9,2) NOT NULL,
  `interest_paid` decimal(9,2) NOT NULL,
  `penalty` float NOT NULL,
  `status` varchar(8) NOT NULL,
  `notes` text,
  PRIMARY KEY (`payment_id`),
  KEY `payment_fk1` (`client_id`),
  KEY `payment_fk2` (`account_id`),
  KEY `payment_fk3` (`case_id`),
  KEY `payment_fk4` (`expected_id`),
  CONSTRAINT `payment_fk1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  CONSTRAINT `payment_fk2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  CONSTRAINT `payment_fk3` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`),
  CONSTRAINT `payment_fk4` FOREIGN KEY (`expected_id`) REFERENCES `expected` (`expected_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,1,1,1,1,'2016-05-17','cash','',1225.00,1000.00,200.00,25,'Valid','hi'),(2,3,3,1,9,'2016-05-10','cash','',625.00,400.00,200.00,25,'Valid','hi');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-10  8:33:27
