-- MySQL dump 10.13  Distrib 5.6.51, for Linux (x86_64)
--
-- Host: localhost    Database: hotspot
-- ------------------------------------------------------
-- Server version	5.6.51

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
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,400),(2,1,NULL,NULL,'Users',2,43),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'display',7,8),(6,2,NULL,NULL,'activate',9,10),(7,2,NULL,NULL,'change_password',11,12),(8,2,NULL,NULL,'deactivate',13,14),(9,2,NULL,NULL,'edit',15,16),(10,2,NULL,NULL,'exportcvs',17,18),(11,2,NULL,NULL,'exportxls',19,20),(12,2,NULL,NULL,'initDB',21,22),(13,2,NULL,NULL,'login',23,24),(14,2,NULL,NULL,'logout',25,26),(15,2,NULL,NULL,'profile',27,28),(16,2,NULL,NULL,'update_alias',29,30),(17,2,NULL,NULL,'update_email',31,32),(18,2,NULL,NULL,'update_group',33,34),(19,2,NULL,NULL,'update_username',35,36),(20,2,NULL,NULL,'view',37,38),(21,2,NULL,NULL,'viewcsv',39,40),(22,2,NULL,NULL,'viewxls',41,42),(23,1,NULL,NULL,'Locations',44,83),(24,23,NULL,NULL,'index',45,46),(25,23,NULL,NULL,'activate',47,48),(26,23,NULL,NULL,'addLocation0',49,50),(27,23,NULL,NULL,'addLocation1',51,52),(28,23,NULL,NULL,'addLocation3',53,54),(29,23,NULL,NULL,'addLocation4',55,56),(31,23,NULL,NULL,'deactivate',59,60),(32,23,NULL,NULL,'displayBackupFile',61,62),(33,23,NULL,NULL,'displayConfigFile',63,64),(34,23,NULL,NULL,'displayLogoFile',65,66),(35,23,NULL,NULL,'edit',67,68),(36,23,NULL,NULL,'updateContactPersonName',69,70),(37,23,NULL,NULL,'updateContactPersonPost',71,72),(38,23,NULL,NULL,'updateContactPersonState',73,74),(39,23,NULL,NULL,'updateInstallationState',75,76),(40,23,NULL,NULL,'updateLocationName',77,78),(41,23,NULL,NULL,'view',79,80),(42,1,NULL,NULL,'BillingPlans',84,93),(43,42,NULL,NULL,'add',85,86),(44,42,NULL,NULL,'edit',87,88),(45,42,NULL,NULL,'index',89,90),(46,42,NULL,NULL,'view',91,92),(47,1,NULL,NULL,'CRMs',94,115),(48,47,NULL,NULL,'emailLog',95,96),(49,47,NULL,NULL,'emails',97,98),(50,47,NULL,NULL,'index',99,100),(51,47,NULL,NULL,'registeredUsers',101,102),(52,47,NULL,NULL,'setSmsGetway',103,104),(53,47,NULL,NULL,'setSmtp',105,106),(54,47,NULL,NULL,'setLog',107,108),(55,47,NULL,NULL,'smss',109,110),(56,47,NULL,NULL,'viewEmail',111,112),(57,47,NULL,NULL,'view_user',113,114),(58,1,NULL,NULL,'CheckIns',116,149),(59,58,NULL,NULL,'add',117,118),(60,58,NULL,NULL,'add_rooms',119,120),(61,58,NULL,NULL,'delete',121,122),(62,58,NULL,NULL,'edit',123,124),(63,58,NULL,NULL,'index',125,126),(64,58,NULL,NULL,'room_manage_delete',127,128),(65,58,NULL,NULL,'room_manage_edit',129,130),(66,58,NULL,NULL,'room_manage_list',131,132),(67,58,NULL,NULL,'rooms',133,134),(68,58,NULL,NULL,'update_last_name',135,136),(69,58,NULL,NULL,'update_middle_name',137,138),(70,58,NULL,NULL,'update_name',139,140),(71,58,NULL,NULL,'update_room_no',141,142),(72,58,NULL,NULL,'update_title',143,144),(74,58,NULL,NULL,'view',147,148),(75,1,NULL,NULL,'Cheques',150,161),(76,75,NULL,NULL,'add',151,152),(77,75,NULL,NULL,'chequeBounce',153,154),(78,75,NULL,NULL,'displayInstrument',155,156),(79,75,NULL,NULL,'displayInvoice',157,158),(80,75,NULL,NULL,'index',159,160),(81,1,NULL,NULL,'CmsLoginpages',162,181),(82,81,NULL,NULL,'display',163,164),(83,81,NULL,NULL,'displayBackGround',165,166),(84,81,NULL,NULL,'displayLogo',167,168),(85,81,NULL,NULL,'edit',169,170),(86,81,NULL,NULL,'edittor',171,172),(87,81,NULL,NULL,'imageBrowser',173,174),(88,81,NULL,NULL,'index',175,176),(89,81,NULL,NULL,'preview',177,178),(90,81,NULL,NULL,'resetTheme',179,180),(91,1,NULL,NULL,'CommissionAgents',182,227),(92,91,NULL,NULL,'activate',183,184),(93,91,NULL,NULL,'add',185,186),(94,91,NULL,NULL,'assign_location',187,188),(95,91,NULL,NULL,'deactivate',189,190),(96,91,NULL,NULL,'edit',191,192),(97,91,NULL,NULL,'index',193,194),(98,91,NULL,NULL,'update_account_number',195,196),(99,91,NULL,NULL,'update_address1',197,198),(100,91,NULL,NULL,'update_address2',199,200),(101,91,NULL,NULL,'update_bank',201,202),(102,91,NULL,NULL,'update_branch',203,204),(103,91,NULL,NULL,'update_city',205,206),(104,91,NULL,NULL,'update_country',207,208),(105,91,NULL,NULL,'update_email',209,210),(106,91,NULL,NULL,'update_first_name',211,212),(107,91,NULL,NULL,'update_last_name',213,214),(108,91,NULL,NULL,'update_middle_name',215,216),(109,91,NULL,NULL,'update_mobile',217,218),(110,91,NULL,NULL,'update_phone',219,220),(111,91,NULL,NULL,'update_postcode',221,222),(112,91,NULL,NULL,'update_state',223,224),(113,91,NULL,NULL,'view',225,226),(114,1,NULL,NULL,'CommissionChallans',228,237),(115,114,NULL,NULL,'add',229,230),(116,114,NULL,NULL,'index',231,232),(117,114,NULL,NULL,'printChallan',233,234),(118,114,NULL,NULL,'view',235,236),(119,1,NULL,NULL,'Coupons',238,287),(120,119,NULL,NULL,'add',239,240),(121,119,NULL,NULL,'bindCouponsWithLocation',241,242),(123,119,NULL,NULL,'couponReporting',245,246),(124,119,NULL,NULL,'createFreeCoupons',247,248),(125,119,NULL,NULL,'displayLogoFile',249,250),(126,119,NULL,NULL,'expairFreeCoupon',251,252),(127,119,NULL,NULL,'exportCoupon',253,254),(128,119,NULL,NULL,'exportToExcel',255,256),(129,119,NULL,NULL,'extendFreeCoupon',257,258),(130,119,NULL,NULL,'freeCouponsList',259,260),(131,119,NULL,NULL,'generatedCoupon',261,262),(132,119,NULL,NULL,'index',263,264),(133,119,NULL,NULL,'printACoupon',265,266),(134,119,NULL,NULL,'printGeneratedCoupon',267,268),(135,119,NULL,NULL,'printbindchallan',269,270),(136,119,NULL,NULL,'sessionDetails',271,272),(137,119,NULL,NULL,'unUsedCouponList',273,274),(138,119,NULL,NULL,'unbindCouponsFromLocation',275,276),(139,119,NULL,NULL,'usages',277,278),(140,119,NULL,NULL,'usedCouponList',279,280),(141,119,NULL,NULL,'view',281,282),(142,119,NULL,NULL,'webLogDetails',283,284),(143,1,NULL,NULL,'CustomEmails',288,291),(144,143,NULL,NULL,'index',289,290),(145,1,NULL,NULL,'FeedbackForms',292,329),(146,145,NULL,NULL,'add',293,294),(147,145,NULL,NULL,'addDevice',295,296),(148,145,NULL,NULL,'advanceFeedbackReport',297,298),(149,145,NULL,NULL,'changeHeaderPriority',299,300),(150,145,NULL,NULL,'changePriority',301,302),(151,145,NULL,NULL,'deleteFeedbackQuestion',303,304),(152,145,NULL,NULL,'devices',305,306),(153,145,NULL,NULL,'editFeedbackQuestion',307,308),(154,145,NULL,NULL,'feedback',309,310),(155,145,NULL,NULL,'feedbackDisplay',311,312),(156,145,NULL,NULL,'feedbackInbox',313,314),(157,145,NULL,NULL,'headerList',315,316),(158,145,NULL,NULL,'index',317,318),(159,145,NULL,NULL,'updateDeviceId',319,320),(160,145,NULL,NULL,'updatePassword',321,322),(161,145,NULL,NULL,'updateUsername',323,324),(162,145,NULL,NULL,'update_header_title',325,326),(163,145,NULL,NULL,'userFeedBack',327,328),(164,1,NULL,NULL,'Groups',330,333),(165,164,NULL,NULL,'build_acl',331,332),(166,1,NULL,NULL,'InvoiceExtras',334,339),(167,166,NULL,NULL,'add_invoice_extra',335,336),(168,166,NULL,NULL,'index',337,338),(169,1,NULL,NULL,'Invoices',340,351),(170,169,NULL,NULL,'displayInstrument',341,342),(171,169,NULL,NULL,'index',343,344),(172,169,NULL,NULL,'indivisual_payment',345,346),(173,169,NULL,NULL,'overall_payment',347,348),(174,169,NULL,NULL,'printInvoice',349,350),(175,1,NULL,NULL,'Pages',352,355),(176,175,NULL,NULL,'index',353,354),(177,1,NULL,NULL,'Revenues',356,365),(178,177,NULL,NULL,'index',357,358),(179,177,NULL,NULL,'monthly',359,360),(180,177,NULL,NULL,'oneTime',361,362),(181,177,NULL,NULL,'revenue',363,364),(182,1,NULL,NULL,'Socials',366,371),(183,182,NULL,NULL,'facebookIndex',367,368),(184,182,NULL,NULL,'facebookReporting',369,370),(186,1,NULL,NULL,'NetworkManagements',372,387),(187,186,NULL,NULL,'add',373,374),(188,186,NULL,NULL,'index',375,376),(189,186,NULL,NULL,'delete',377,378),(190,186,NULL,NULL,'loggedInUser',379,380),(191,23,NULL,NULL,'addLocation2',81,82),(192,186,NULL,NULL,'addapmonitor',381,382),(193,186,NULL,NULL,'apmonitor',383,384),(194,186,NULL,NULL,'editapmonitor',385,386),(195,1,NULL,NULL,'NasManagements',388,399),(196,195,NULL,NULL,'add',389,390),(197,195,NULL,NULL,'edit',391,392),(198,195,NULL,NULL,'delete',393,394),(199,195,NULL,NULL,'view',395,396),(200,195,NULL,NULL,'index',397,398);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ap_monitoring`
--

DROP TABLE IF EXISTS `ap_monitoring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ap_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ap` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `Ip` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ap_monitoring`
--

LOCK TABLES `ap_monitoring` WRITE;
/*!40000 ALTER TABLE `ap_monitoring` DISABLE KEYS */;
/*!40000 ALTER TABLE `ap_monitoring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',1,'wfadmin',1,10),(2,NULL,'Group',2,'wfaccount',11,22),(3,NULL,'Group',3,'wfnoc',23,36),(4,NULL,'Group',4,'wfengineer',37,46),(5,NULL,'Group',5,'admin',47,590),(6,NULL,'Group',6,'account',591,616),(7,NULL,'Group',7,'fom',617,698),(8,NULL,'Group',8,'fo',708,720),(9,1,'User',1,'admin',2,9),(319,5,'User',451,NULL,580,581),(320,7,'User',452,NULL,696,697),(321,5,'User',453,NULL,582,583),(322,5,'User',454,NULL,584,585),(323,5,'User',455,NULL,586,587),(324,5,'User',456,NULL,588,589);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (100,1,1,'1','1','1','1'),(101,2,1,'-1','-1','-1','-1'),(102,2,23,'1','1','1','1'),(103,3,1,'-1','-1','-1','-1'),(104,3,175,'1','1','1','1'),(105,3,120,'1','1','1','1'),(106,3,123,'1','1','1','1'),(107,3,125,'1','1','1','1'),(108,3,127,'1','1','1','1'),(109,3,128,'1','1','1','1'),(110,3,131,'1','1','1','1'),(111,3,132,'1','1','1','1'),(112,3,133,'1','1','1','1'),(113,3,134,'1','1','1','1'),(114,3,137,'1','1','1','1'),(115,3,140,'1','1','1','1'),(116,3,141,'1','1','1','1'),(117,3,41,'1','1','1','1'),(118,3,24,'1','1','1','1'),(119,3,3,'1','1','1','1'),(120,3,20,'1','1','1','1'),(121,3,45,'1','1','1','1'),(122,3,63,'1','1','1','1'),(123,3,67,'1','1','1','1'),(124,3,59,'1','1','1','1'),(125,3,74,'1','1','1','1'),(126,3,61,'1','1','1','1'),(127,3,188,'1','1','1','1'),(128,3,187,'1','1','1','1'),(129,3,189,'1','1','1','1'),(130,3,190,'1','1','1','1'),(131,3,192,'1','1','1','1'),(132,3,194,'1','1','1','1'),(133,3,193,'1','1','1','1'),(134,3,200,'1','1','1','1'),(135,3,14,'1','1','1','1'),(136,5,1,'-1','-1','-1','-1'),(137,5,175,'1','1','1','1'),(138,5,120,'1','1','1','1'),(139,5,123,'1','1','1','1'),(140,5,125,'1','1','1','1'),(141,5,127,'1','1','1','1'),(142,5,128,'1','1','1','1'),(143,5,131,'1','1','1','1'),(144,5,132,'1','1','1','1'),(145,5,133,'1','1','1','1'),(146,5,134,'1','1','1','1'),(147,5,137,'1','1','1','1'),(148,5,140,'1','1','1','1'),(149,5,141,'1','1','1','1'),(150,5,41,'1','1','1','1'),(151,5,24,'1','1','1','1'),(152,5,3,'1','1','1','1'),(153,5,20,'1','1','1','1'),(154,5,4,'1','1','1','1'),(155,5,45,'1','1','1','1'),(156,5,63,'1','1','1','1'),(157,5,67,'1','1','1','1'),(158,5,59,'1','1','1','1'),(159,5,74,'1','1','1','1'),(160,5,61,'1','1','1','1'),(161,5,188,'1','1','1','1'),(162,5,187,'1','1','1','1'),(163,5,189,'1','1','1','1'),(164,5,190,'1','1','1','1'),(165,5,193,'1','1','1','1'),(166,5,14,'1','1','1','1'),(167,6,1,'-1','-1','-1','-1'),(168,6,175,'1','1','1','1'),(169,6,128,'1','1','1','1'),(170,6,132,'1','1','1','1'),(171,6,140,'1','1','1','1'),(172,6,141,'1','1','1','1'),(173,6,123,'1','1','1','1'),(174,6,63,'1','1','1','1'),(175,6,14,'1','1','1','1'),(176,7,1,'-1','-1','-1','-1'),(177,7,175,'1','1','1','1'),(178,7,123,'1','1','1','1'),(179,7,125,'1','1','1','1'),(180,7,127,'1','1','1','1'),(181,7,128,'1','1','1','1'),(182,7,131,'1','1','1','1'),(183,7,132,'1','1','1','1'),(184,7,133,'1','1','1','1'),(185,7,134,'1','1','1','1'),(186,7,137,'1','1','1','1'),(187,7,140,'1','1','1','1'),(188,7,141,'1','1','1','1'),(189,7,45,'1','1','1','1'),(190,7,63,'1','1','1','1'),(191,7,59,'1','1','1','1'),(192,7,74,'1','1','1','1'),(193,7,61,'1','1','1','1'),(194,7,14,'1','1','1','1'),(195,8,1,'-1','-1','-1','-1'),(196,8,14,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_plans`
--

DROP TABLE IF EXISTS `billing_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_plans` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name_bp` varchar(40) NOT NULL DEFAULT '',
  `time_bp` varchar(40) NOT NULL DEFAULT '',
  `price_bp` varchar(40) NOT NULL DEFAULT '',
  `type_bp` varchar(10) NOT NULL DEFAULT '',
  `location_id` int(11) DEFAULT NULL,
  `timetofinish_bp` tinyint(4) DEFAULT NULL,
  `simultanous_bp` int(11) DEFAULT NULL,
  `redirection_url_bp` varchar(250) DEFAULT NULL,
  `maximum_time_bp` int(11) DEFAULT '0',
  `maximum_octet_bp` int(11) DEFAULT '0',
  `expiration_date_bp` varchar(25) DEFAULT NULL,
  `bandwidth_upload_bp` int(11) DEFAULT '0',
  `bandwidth_download_bp` int(11) DEFAULT '0',
  `publish_bp` tinyint(4) DEFAULT NULL,
  `cat_bp` char(25) DEFAULT NULL,
  `currency_bp` varchar(5) DEFAULT NULL,
  `login_display` varchar(2) NOT NULL DEFAULT '1',
  `advertise_url` varchar(255) DEFAULT NULL,
  `advertise_interval` int(11) DEFAULT '0',
  `is_fup` varchar(2) NOT NULL DEFAULT '0',
  `post_fup_bandwidth` varchar(255) DEFAULT NULL,
  `expire_after` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_plans`
--

LOCK TABLES `billing_plans` WRITE;
/*!40000 ALTER TABLE `billing_plans` DISABLE KEYS */;
INSERT INTO `billing_plans` VALUES (7,'complimentary','86400','0','time',2,0,0,NULL,86400,0,'2024-09-30',0,0,0,'special','INR','0',NULL,0,'0',NULL,NULL),(8,'1 Hour','60','10','time',2,1,0,NULL,60,0,'2024-09-30',0,0,0,'normal','INR','0',NULL,0,'0',NULL,NULL),(9,'2 Hour','120','0','time',2,0,0,NULL,120,0,'2024-09-30',0,0,0,'normal','INR','0',NULL,0,'0',NULL,NULL),(10,'1 Day','1440','0','time',2,1,0,NULL,1440,0,'2024-09-30',0,0,0,'normal','INR','0',NULL,0,'0',NULL,NULL),(11,'1 Week','10080','0','time',2,1,0,NULL,10080,0,'2024-09-30',0,0,0,'normal','INR','0',NULL,0,'0',NULL,NULL),(16,'Premium plan','1440','10','time',2,1,0,NULL,1440,0,'2025-03-01',0,0,1,'special','INR','1',NULL,0,'0',NULL,NULL),(17,'complimentary','86400','0','time',3,0,0,NULL,86400,0,'2022-06-21',0,0,NULL,'special','INR','0',NULL,0,'0',NULL,NULL),(18,'1 Hour','60','110','time',3,1,0,NULL,60,0,'2022-06-21',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(19,'2 Hour','120','200','time',3,0,0,NULL,120,0,'2022-06-21',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(20,'1 Day','1440','550','time',3,1,0,NULL,1440,0,'2022-06-21',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(21,'1 Week','10080','2200','time',3,1,0,NULL,10080,0,'2022-06-21',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(22,'complimentary','86400','0','time',4,0,0,NULL,86400,0,'2023-02-25',0,0,NULL,'special','INR','0',NULL,0,'0',NULL,NULL),(23,'1 Hour','60','110','time',4,1,0,NULL,60,0,'2023-02-25',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(24,'2 Hour','120','200','time',4,0,0,NULL,120,0,'2023-02-25',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(25,'1 Day','1440','550','time',4,1,0,NULL,1440,0,'2023-02-25',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(26,'1 Week','10080','2200','time',4,1,0,NULL,10080,0,'2023-02-25',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(27,'tempuer','5','0','time',2,1,0,NULL,5,10,'2026-05-01',0,0,1,'normal','INR','1',NULL,0,'0',NULL,NULL),(28,'complimentary','86400','0','time',4,0,0,NULL,86400,0,'2023-08-02',0,0,NULL,'special','INR','0',NULL,0,'0',NULL,NULL),(29,'1 Hour','60','110','time',4,1,0,NULL,60,0,'2023-08-02',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(30,'2 Hour','120','200','time',4,0,0,NULL,120,0,'2023-08-02',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(31,'1 Day','1440','550','time',4,1,0,NULL,1440,0,'2023-08-02',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL),(32,'1 Week','10080','2200','time',4,1,0,NULL,10080,0,'2023-08-02',0,0,NULL,'normal','INR','1',NULL,0,'0',NULL,NULL);
/*!40000 ALTER TABLE `billing_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocked_sites`
--

DROP TABLE IF EXISTS `blocked_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocked_sites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `website` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocked_sites`
--

LOCK TABLES `blocked_sites` WRITE;
/*!40000 ALTER TABLE `blocked_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocked_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_plans`
--

DROP TABLE IF EXISTS `business_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '''silver''',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_plans`
--

LOCK TABLES `business_plans` WRITE;
/*!40000 ALTER TABLE `business_plans` DISABLE KEYS */;
INSERT INTO `business_plans` VALUES (1,'silver','2014-10-17 17:26:27','2014-10-17 21:26:27'),(2,'gold','2014-10-17 17:26:27','2014-10-17 21:26:27'),(3,'platinum','2014-10-17 17:26:27','2014-10-17 21:26:27');
/*!40000 ALTER TABLE `business_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_ins`
--

DROP TABLE IF EXISTS `check_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_ins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `room_id` int(10) DEFAULT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `pin` varchar(4) NOT NULL DEFAULT '0000',
  `total_coupon` int(5) NOT NULL DEFAULT '0',
  `total_price` float(10,2) NOT NULL DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_id` (`location_id`,`room_no`,`last_name`),
  KEY `room_no` (`room_no`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=163093 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_ins`
--

LOCK TABLES `check_ins` WRITE;
/*!40000 ALTER TABLE `check_ins` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_ins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cheques`
--

DROP TABLE IF EXISTS `cheques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cheques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instrument` enum('Cheque','DD','Cash','BankTransfer','TDSCertificate','PayOrder','Other') NOT NULL DEFAULT 'Cheque',
  `instrument_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `instrument_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `scan` mediumblob,
  `scan_name` varchar(255) DEFAULT NULL,
  `scan_type` varchar(255) DEFAULT NULL,
  `scan_size` int(10) DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `invoice_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Location` (`location_id`,`created`),
  KEY `id_InvoiceID` (`invoice_id`),
  KEY `InstrumentNumber` (`instrument_number`)
) ENGINE=MyISAM AUTO_INCREMENT=7822 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheques`
--

LOCK TABLES `cheques` WRITE;
/*!40000 ALTER TABLE `cheques` DISABLE KEYS */;
/*!40000 ALTER TABLE `cheques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_loginpages`
--

DROP TABLE IF EXISTS `cms_loginpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_loginpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `location_domain` varchar(255) DEFAULT NULL,
  `logo` mediumblob,
  `logo_name` varchar(255) DEFAULT NULL,
  `logo_size` int(11) DEFAULT NULL,
  `logo_type` varchar(255) DEFAULT NULL,
  `footer` longtext,
  `terms_and_conditions` longtext,
  `notice` varchar(255) NOT NULL DEFAULT 'Welcome to WiFonic HotSpot Service',
  `tariff_display` varchar(2) DEFAULT '1',
  `background` mediumblob,
  `background_type` varchar(255) DEFAULT NULL,
  `background_size` int(11) DEFAULT NULL,
  `background_name` varchar(255) DEFAULT NULL,
  `bg_color` varchar(255) DEFAULT NULL,
  `font_color` varchar(255) DEFAULT NULL,
  `login_url` varchar(255) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `logo_url` varchar(255) NOT NULL DEFAULT 'http://wifonicnetworks.com',
  `bgimg_check` tinyint(4) NOT NULL DEFAULT '0',
  `opacity` float NOT NULL DEFAULT '1',
  `promotional_ad` text,
  `right_box_status` tinyint(4) NOT NULL DEFAULT '0',
  `right_box_text` text,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_loginpages`
--

LOCK TABLES `cms_loginpages` WRITE;
/*!40000 ALTER TABLE `cms_loginpages` DISABLE KEYS */;
INSERT INTO `cms_loginpages` VALUES (5,4,'914a7a6fa9eb0a9','‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0ú\0\0\0d\0\0\0ÿñM\0\0\0	pHYs\0\0.#\0\0.#x¥?v\0\0\nOiCCPPhotoshop ICC profile\0\0xÚSgTSé=÷ÞôBKˆ€”KoR RB‹€‘&*!	Jˆ!¡ÙQÁEEÈ ˆŽŽ€ŒQ,Š\nØä!¢Žƒ£ˆŠÊûá{£kÖ¼÷æÍþµ×>ç¬ó³ÏÀ–H3Q5€©BàƒÇÄÆáä.@\n$p\0³d!sý#\0ø~<<+\"À¾\0xÓ\0ÀM›À0‡ÿêB™\\€„Àt‘8K€\0@zŽB¦\0@F€˜&S\0 \0`Ëcbã\0P-\0`\'æÓ\0€ø™{\0[”! ‘\0 eˆD\0h;\0¬ÏVŠE\0X0\0fKÄ9\0Ø-\00IWfH\0°·\0ÀÎ²\0\00Qˆ…)\0{\0`È##x\0„™\0FòW<ñ+®ç*\0\0x™²<¹$9E[-qWW.(ÎI+6aaš@.Ây™24àóÌ\0\0 ‘àƒóýxÎ®ÎÎ6Ž¶_-ê¿ÿ\"bbãþåÏ«p@\0\0át~Ñþ,/³\Z€;€mþ¢%îh^ u÷‹f²@µ\0 éÚWópø~<<E¡¹ÙÙåääØJÄB[aÊW}þgÂ_ÀWýlù~<ü÷õà¾â$2]GøàÂÌôL¥Ï’	„bÜæGü·ÿüÓ\"ÄIb¹X*ãQqŽDšŒó2¥\"‰B’)Å%Òÿdâß,û>ß5\0°j>{‘-¨]cöK\'XtÀâ÷\0\0ò»oÁÔ(€hƒáÏwÿï?ýG %\0€fI’q\0\0^D$.TÊ³?Ç\0\0D *°AôÁ,ÀÁÜÁü`6„B$ÄÂBB\nd€r`)¬‚B(†Í°*`/Ô@4ÀQh†“p.ÂU¸=púažÁ(¼	AÈa!ÚˆbŠX#Ž™…ø!ÁH‹$ ÉˆQ\"K‘5H1RŠT UHò=r9‡\\Fº‘;È\02‚ü†¼G1”²Q=ÔµC¹¨7\Z„F¢Ðdt1š ›Ðr´\Z=Œ6¡çÐ«hÚ>CÇ0Àè3Äl0.ÆÃB±8,	“cË±\"¬«Æ\Z°V¬»‰õcÏ±wEÀ	6wB aAHXLXNØH¨ $4Ú	7	„QÂ\'\"“¨K´&ºùÄb21‡XH,#Ö/{ˆCÄ7$‰C2\'¹I±¤TÒÒFÒnR#é,©›4H\Z#“ÉÚdk²9”, +È…ääÃä3ää!ò[\nb@q¤øSâ(RÊjJåå4åe˜2AU£šRÝ¨¡T5ZB­¡¶R¯Q‡¨4uš9ÍƒIK¥­¢•Ó\Zhh÷i¯ètºÝ•N—ÐWÒËéGè—èôw\r†ƒÇˆg(›gw¯˜L¦Ó‹ÇT071ë˜ç™™oUX*¶*|‘Ê\n•J•&•*/T©ª¦ªÞªUóUËT©^S}®FU3Sã©	Ô–«UªPëSSg©;¨‡ªg¨oT?¤~Yý‰YÃLÃOC¤Q ±_ã¼Æ c³x,!k\r«†u5Ä&±ÍÙ|v*»˜ý»‹=ª©¡9C3J3W³Ró”f?ã˜qøœtN	ç(§—ó~ŠÞï)â)¦4L¹1e\\kª–—–X«H«Q«Gë½6®í§¦½E»YûAÇJ\'\\\'GgÎçSÙSÝ§\n§M=:õ®.ªk¥¡»Dw¿n§î˜ž¾^€žLo§Þy½çú}/ýTýmú§õGX³$ÛÎ<Å5qo</ÇÛñQC]Ã@C¥a•a—á„‘¹Ñ<£ÕFFŒiÆ\\ã$ãmÆmÆ£&&!&KMêMîšRM¹¦)¦;L;LÇÍÌÍ¢ÍÖ™5›=1×2ç›ç›×›ß·`ZxZ,¶¨¶¸eI²äZ¦Yî¶¼n…Z9Y¥XUZ]³F­­%Ö»­»§§¹N“N«žÖgÃ°ñ¶É¶©·°åØÛ®¶m¶}agbg·Å®Ãî“½“}º}ý=\r‡Ù«Z~s´r:V:ÞšÎœî?}Åô–é/gXÏÏØ3ã¶Ë)ÄiS›ÓGgg¹sƒóˆ‹‰K‚Ë.—>.›ÆÝÈ½äJtõq]ázÒõ›³›Âí¨Û¯î6îiî‡ÜŸÌ4Ÿ)žY3sÐÃÈCàQåÑ?Ÿ•0kß¬~OCOgµç#/c/‘W­×°·¥wª÷aï>ö>rŸã>ã<7Þ2ÞY_Ì7À·È·ËOÃož_…ßC#ÿdÿzÿÑ\0§€%g‰A[ûøz|!¿Ž?:Ûeö²ÙíAŒ ¹AA‚­‚åÁ­!hÈì­!÷ç˜Î‘Îi…P~èÖÐaæa‹Ã~\'…‡…W†?ŽpˆX\ZÑ1—5wÑÜCsßDúD–DÞ›g1O9¯-J5*>ª.j<Ú7º4º?Æ.fYÌÕXXIlK9.*®6nl¾ßüíó‡ââã{˜/È]py¡ÎÂô…§©.,:–@LˆN8”ðA*¨Œ%òw%Ž\nyÂÂg\"/Ñ6ÑˆØC\\*NòH*Mz’ì‘¼5y$Å3¥,å¹„\'©¼L\rLÝ›:žšv m2=:½1ƒ’‘qBª!M“¶gêgæfvË¬e…²þÅn‹·/•Ék³¬Y-\n¶B¦èTZ(×*²geWf¿Í‰Ê9–«ž+ÍíÌ³ÊÛ7œïŸÿíÂá’¶¥†KW-Xæ½¬j9²<qyÛ\nã+†V¬<¸Š¶*mÕO«íW—®~½&zMk^ÁÊ‚ÁµkëU\nå…}ëÜ×í]OX/Yßµaú†>‰Š®Û—Ø(Üxå‡oÊ¿™Ü”´©«Ä¹dÏfÒféæÞ-ž[–ª—æ—n\rÙÚ´\rßV´íõöEÛ/—Í(Û»ƒ¶C¹£¿<¸¼e§ÉÎÍ;?T¤TôTúT6îÒÝµa×ønÑî{¼ö4ìÕÛ[¼÷ý>É¾ÛUUMÕfÕeûIû³÷?®‰ªéø–ûm]­NmqíÇÒý#¶×¹ÔÕÒ=TRÖ+ëGÇ¾þïw-\r6\rUœÆâ#pDyäé÷	ß÷\r:ÚvŒ{¬áÓvg/jBšòšF›Sšû[b[ºOÌ>ÑÖêÞzüGÛœ4<YyJóTÉiÚé‚Ó“gòÏŒ•}~.ùÜ`Û¢¶{çcÎßjoïºtáÒEÿ‹ç;¼;Î\\ò¸tò²ÛåW¸Wš¯:_mêtê<þ“ÓOÇ»œ»š®¹\\k¹îz½µ{f÷éž7ÎÝô½yñÿÖÕž9=Ý½ózo÷Å÷õßÝ~r\'ýÎË»Ùw\'î­¼O¼_ô@íAÙCÝ‡Õ?[þÜØïÜjÀw óÑÜG÷…ƒÏþ‘õC™Ë†\r†ëž8>99â?rýéü§CÏdÏ&žþ¢þË®/~øÕë×ÎÑ˜Ñ¡—ò—“¿m|¥ýêÀë¯ÛÆÂÆ¾Éx31^ôVûíÁwÜwï£ßOä| (ÿhù±õSÐ§û“““ÿ˜óüc3-Û\0\0\0 cHRM\0\0z%\0\0€ƒ\0\0ùÿ\0\0€é\0\0u0\0\0ê`\0\0:˜\0\0o’_ÅF\0\0]’IDATxÚì}{¼Ucþÿ{¯³ÚíN§Óé\"•$I’&i’Æ4$MB“$$!	M.CHHî!·$$I¨$MCˆ‰I’4i’$•nêt;ÎeŸ}ÖyöïÏ{í½ÖÚkí½Oæû{>¯W=g­ý¬çþ<Ÿûç	Åãñx<\r\Z4hÐ AÃÿ0z4hÐ AƒÐ5hÐ Aƒ\r\Z¡kÐ Aƒ\r\Z4B× Aƒ\r\Z4h„®Aƒ\r\Z4h„®Aƒ\r\Z4hÐ]ƒ\r\Z4hÐ º\r\Z4hÐ A#t\r\Z4hÐ A#t\r\Z4hÐ AƒFè\Z4hÐ AƒÐ5hÐ Aƒ\r\Z¡kÐ Aƒ\r\Z¡kÐ Aƒ\r\Z4B× Aƒ\r\Z4h„®Aƒ\r\Z4hÐ]ƒ\r\Z4hÐ]ƒ\r\Z4hÐ º\r\Z4hÐ A#t\r\Z4hÐ AƒFè\Z4hÐ AƒFè\Z4hÐ Aƒ†ß<„âåž7&Ó¨ç9ÂÔòežßáÉgvZäyÎcª<ß[ž÷a\0@¾¯Ï÷Í™¿‘§´<Oy…|ÚÎ÷«™®óÔ–:‘ý³<ÏÊÓ?3Ã8Yóá…hÀ¸g*×L¿ vu¨3à•@£¯&Å€òž6)öÉBŒ3á³Å\ZL¦–g%™üÞ¿-öû0ç6Ê/\rÏšQ¬×d¾äÌ\ZüÞt}o×c$¾w·?YºézVž5K¬uåÊoÿž‡\\îˆ2\0(X‚\\`é»¡ËéÀI=6vüü£,vd¶ëJ~_\"GO‘ô°ó¡`\"¼m4æ #ú~·8~whGèväªKB¹Æ;€Zêi4PQûìó€ý_ã±ªÉ•7+×~s‡VÀ	G?šóïï\0 ¸ÇQ%ÆÓtS˜ãåøyÇW%ÖQžg|½ù,×ü‰uæžéWr]&×{\'&ç?ìªÉ.?Âïc‰õfú¶Ç»®Ã‰òMß}ãØÚë×ð°U†§<ï~I}oÿ\ZñmRN$Ë³ÞÝåZ)k-=(ÇNñîw?Áþ[®÷%Øëš¯×‹åi÷ø¾ó`¤°§îsÃð¬\0#å„¶ç§ÄUž‘8OJ\\ëÙLÌoÌ3Ž8§”ïx‰r¢Áë ¿bxbüæÐ[1}ŸôÉdvë|Is0mÇ´Sæ7Zó»\\–ÓHÓx\Zþw ×sí×%­³IÜwø{/=F\Z4üÿ©Tœ\"Ã³XC¦øsî†_¾PG9°¹_^6¹Eò…ˆØÃ«å¹†¨y …ú‘h¾QÒÒÁ’–D$ÿ€ÅÃ%Ïö¯?‹~™8td¹;®_®—sõöÉðPœAœnp9f\0‘ixÊñ–¤|Ë3<”·áY›†§g†‡4Ròyó›i9tÿrÌjïÈ,ÞçO´}IÏ½^Òf\'!Š0r·~-é¼†òÝ3$-¸¿ÍjïÿÔqVÏ™Æ7ýwÈ?u˜¾ó“Únÿz“åiëAÀºÞf@j0YÕÛÃAã)¿·¾ê3yé9ôLçApšžC:7ªË¡Ï›Q­vŸ“f†sË<¨ù8&¬¢?ˆn\rÏ³•á{ lË÷°öˆÜCsåù÷ÍDŒqÏÕòã1¥ò¼y£”³gµˆ7öŽ‘ßwu•÷;6Kù…ƒ¥¼Âæò{åbù=4%!f³ÁæÙÃ	A‘ÿ8üZ\"w«š¿g)rwÔïiyEl^Ñ_2EÀ³yHÉoxòyEîÞ|ð<›õ¾íÏ|LyÛ£Ê\r{ÚN³PÍyµ\0 %MÓ¯EŒslqÞ¥®Ñv\0 5ºõî›s‡#e(º¨,\0î[dý>užý×¾w\\2¯2äSYÍ“wý¨€õæ={’ëÃÌjg»ÞUÀ:`^Ç5Û÷*p][Õª/3:OÐ•§Aû<5Uö[Ð<á\ZæJŒÛme8ƒú©ÒÎC¦sñgáó~eñvÙ.ƒòü—‚rcl÷½/‘ó¸Kk÷yÞÓ›÷L¯#g¾DòU-H™´ˆkÐðÓ \0˜«	Ö-\0z\0øè ËâQ0~\'L\"ò ¦Žv:¦`0€§ã›qóÙãƒBSCÓ[‡uØŒ[†ž€\\X(‹O!4½\\mòÐÐq`Ì¬ºßê\0ø€¯6ë©Ö á·¿U‘ûPI;=)/Ÿ;VÒõã$í{/sŸ’\".“ïçðiŽ§¶Éò{Î&ùÎÈçG§°1+$ÍéÈü£%‰ç³žž|»<Çó<ü|„ïù/í\nQ5§*@]ÉüõY.ßÇ)w&AÃþÆ©ÛWCù]K~ÇvÇ™¯ŠßáFÖ¤[U³+Wø\nàø¢$-r÷áñ½ÌÕÆÅ‡>rdw Cñæö+ë9ùñ›«öV—Än²ƒâ|Ñ8­(ÕÁ„ Cüu ª¾±ÖÜ}åB£]|zU±Ï¡¹ÈÛl·ùh„¦Å¨¥¡9Æ)À†‰Çµ\0js¶Ó\"÷¢ÛL\"f-r÷OµÈý úoRä~ÂI\'^,õ~ÿ üxÞ…¥ÃKk/6·nÜ¾ù: áö}ýv7ùèÀ;»zfeæõ“òm!/ó/‘zòwÈóaK;\Z®–çXI+”ï³„ƒ¯üHž£]8.ƒYË\0y_Þ’•®“òÍb)7¶Lò—ô\'ÂE‘.ßÓ¢<ÆòL±›å¹¤¿+c{H\0”ÒV`o\'\"ö<Žkq¶\"÷*„Öä\0øzÁa‘ãz\0€ªÃŸæj‘{Z‘p€È}ÿÉ°€ÊÇ\\6+x­Ý}\'\\´èËÒ3Œëâ›Ô“iökžNjOÉÒC¬«gÖ;¼¹¨„î¨+cŸTbŒÎvÒP Š’-ÃRú^ä¡`<ÏS#cdÜT€9c;­>4pÁ¶1Ì:\0vtàÚ\rO-rOŸO‹ÜÓŸ#Zä^íùøíˆÜ\0ünŠ4þéãäyGiáy‡–¶T{pÿ÷çÎ½ý(àþ/Fþáö37Í¼öÝfÀCãßzìÖ›Æ3öÙ1\08dEIÁ®N)ÔD1å’/í/ƒmÍ£|‘ˆ>J÷µ2æ¯ˆÊ¡dò÷òÊHh„îfN–-—vWö–þäðØ´±¼§™Ÿ:ýÛí#ÏUäÄ\rÛ˜ï~GkfLáwlO	’*[\"Q\\Ýáß·»öÈz@×ãY|(\0Ò@0¤åX!zZüØÅÀE[F—¾v€•ãj¡pá€¥Æ3€ÐëqèBèB™Ü\n€QÚ\n€z.qÐX‰Üî£GyÑ\\ÄPSí5z\Z\rµjNh¸q~ôk4¤{×ä¢\0½ƒ\'ã}€šÅ•£+\n€ª°‘ŸSÌíòûU}—\\>æ˜Y/ÀŽÁDä­3î\Z4hø¯‹Üm0\0àØIrM8\\üÒ÷Ÿ/ôœmûb¹#ë\0î?kýMuûË.»éö\\\0X}\0¼Ûâ÷sÏÜ\n¼‹^£Ïpî„wóß	Lœ6­åðA@ÓAE¶O³++n€ï¶zR/)ð´‡º\ZÐ›û=Ïï{žÇxžßñpdm<Çãœ€š›µ‘[¶Ó05n¨Á\0p€ÄM¨ƒÞ?b(k|ûtÄ€‹^½÷µËÜpO+Ü3{×æoû\'ôÛý÷l\0E¾&Ì¥ËP„\Zî9€Ö(ÁîÜ¤\r}”y¸ùü}\ZNÆ ˜e‘°•»©øáœEªeU§ÏßÄvÔG Ô<Þ;¾0bñfj7ðÙ²£üC`ËŠºëo\\tö—¾ö\0ìNDÞLÏ©\r¿Mø•ýÐn%iü9(\0€ÒÖ¢>k›<ï¨ßÍ9+Ü·ùªøÍ`{Ps-38¤\r3`Ez[O¼=²ÇÎs\'\0÷]vöô;^ÎV2s»¤\"à:¬½ÝÜ3ä0kÞ†ÏÔ±7&iSú7!×rÈÓ’¿þt)·>E÷õÉõ6 	^½…’Ó/ ñ^ÁZ¦4£ÊkOv‹õæNeºIÒÚñ×¤¤À$g‘ÙÎD­Q±ÉåÒŠz[ü\"ˆÒ™ía=~Ó×î:^ðÌž³€7Ïÿ}»¿L¾øè¨ü3Ðb¡Z=v+>A{œU²3Ñ!Æœrt\"ùPPÈW…®4z 7\Z©±5¢bËÕîP_£Ío÷ÇG©±»:ÔîXa•®j.³ÖWtÄÚŸÒ+èÚdük‹\0}óa‚Èwv#\"o©çPƒ†ß:‡ž­Ý«+ÿI:ôŸÈÃ½÷‰;X,\"ùy\rìh8%ëÃïç56´iº¡åV\0(êC½ñà¤õ‚Œ¯ûVÒçš¡À‡\0¢ƒ ÞªÒ-ûÚe!‹ˆ@]Zê6.öÕ\'¢nB?õÃo‘|y…RÎùÔ¡“  \"¶ÚËûböïÀXI«ÖðP§ ‡:ïX‰”[2UÊ‰wfYžq²¤…$öÓß>g¤|²\r\'@§l·¤åÔÍWu•ç¸‘¢WóŒÇ\'W¶¹ÿ”I\0žSy¸Ö•÷Ïm-¨ž_Z‡n¥/æ³9öÜ#ÅC ß[·î™})€·r¿Ç¥À[‡ÞUyÞN ïŽ/›Îm 36`é„I\\—/¢nÁ¢‹Ð+1¿ÉpDEqx*º \'–VZ¥ƒj®®=cWÁ‘5Öyxî††õKûï.\Z{¨Ù¡ª»µXÜ«õš®K€=Órë.È¹ã¤Y!\0ØÉH^¡q¢_¥FHCÚõàÁàqAÀï¿º•Õ:þùuèÈ0n?·=}¹™Y¢ÿ+:ôôåýèÐ³µr\náZ-+÷æåù®kXHA‘J›ÖìU{;pßU}[Ýñ\0ð`Õ cG…\0`ÛÞdÅMF0`tŸ#5ïÏ°< *Ø°î[¶>þ¶õÂSCÒÜ¨1	pì´Í}3hôÎæ…}*–q’ÙS_ò¿Š_Q%€‰òXÉ^Yƒ‰0m«ôiDÌD°•½hÝ>”ß`>ÛÚ:w‹¡iã÷Ó*žœ{ˆœ¹EB\"þ`À¡×9`ÜÃAÖî*7´Ò(Þ™Ù>ï¬À9ÏÝS÷ï€]ôQ-\rœÓ_ÚÊ=È\n8[+w¯Õ¨·oûýÛí]ë™­Üƒ¬¡U@dŽiàVLƒÈýçÃÎÛy÷â·f?xwý~·\0\r[´{ï”SZske·Eß<¼¨Û‚Úòí™%¢ï€åx]vŽÇúEó>8O£/F¾shxƒµ*Ö\ZxkNÇ5çõÎ¿fÌ£sžpiLÈ7ìZÅy_hÍtlª€qQiË	\ZŸƒ·r7Ò¾O=æ3Y¹g²bFÀ:D†}‘ÉÊýà<†ÞÊÝü‰RÛÿ+Vîþóò?eåŠW,šh–;(¦¸KÇÛ”VÚû´b^Î¼šç×i·xóqó»6¿òy”T®E@žà‡¯Ûéô‹€–^9ë¶“`+uºÆr‡¨~Š”|Ú2\01Xÿ-éwÍ€8}ÑkÑµ«Ö*÷²¨Ó\06ŸuìŒMÀ[/žò8€¨9Ð¦Ù–¦k7‡õ/êµÍéôf«Ýó\0 ÔPú^ uÔŒ%ù‹Fu¡!Dè¶¾Ç‰\"sÕ†ùÛ‘{£]­ìãK%¿A7¥ª¦$‰+Z&í‰3–w|1ËJ9Êv·+ñêÜãÓ1;t	`\\úv•z\0\nYwèõÀ˜ænŠü—‹ånÇNŽù\"ôÌ±Üí•iyº»??,w©¹,A<ºÇËŽnzŽ’°§¾ÙÒîx_)¿ÀÎÝ‚Í\0€·O¸çâsÿÔCé”d9j\"Ã€ò‚pA­b Ö4Þ#¼0ÚÄ—©µÀ_îýÇ7o\0€=”J…vŒSÌ3ŸÞKÉ®\\ó’\ZË=ì™O/ú¬~,÷¬§±S’Œ¹ýSc¹‡}Çá—å$Ñú¥b¹{÷Å?–{Î×Lüš±ÜášŸßZ,÷a÷v”Èý ÜÖ\Zõ•‡kN*\Z™ÛªàÉÐaÏLê9ûÚ¡ÃŸ\Z]5üåq5ëuôŠN–TÎ’o¶N—\ZË“5LëïvKQtxUn?EðßÝ˜ 4D,Þ×=ñ{úÁÈY<cs·e[ä¿0ãÚ^ß\r|\":hp\0(oþÌw/¾ö[`xÿE˜8Ç>¾jÌoëÒˆ­ÁIX$E7%±a¬ \"NÌ€8Ý8™½xXßNy¹áª–’Ïè(Ï¥¼t£òy®1IÆ?yÞEo\0“ù+€\'J%ƒµ‰åØœûGö2S¡åF0£¬KÛ\0Øû\r¥Ó,1ç¡SdÜaºÊÂ¬šÊñ,cj2-’\Z ÏUäyç|I,ò!…òYÏjQ5(Ï•›Ù¢\"ÇÑ«`ÅwH>£7”kì<€‚Y´Ä_äž»]Úßäiù]Í yCÉ	MÉ6æqy6j‹$È*’|j\'U2U–a$Ü³jÑÂý°K¤¾ˆØDñ\\Šà8¿æý¯I²cêìÐÖöå@(sSØŸ«y >¨±0:ÂÌ	Ÿûï‡*ÞþÑ××˜Çs\0hä€*ö=	Ä?6­vï0mÃ™\0°÷ä¤ô\'o\Z€Á°šÑVƒ¶#fh(Ç¹9Û—Ÿ¥È]ù P…0ÇÓrÎY1õ\'ãë$_¸…ü¾·üúíGS|Dî\r¹þšŠUˆQ«?ç“ª¬xù=Tàƒ\"ëW<²“í;h‘{|/Çqó½#ë HÖ±n¶ÏYëƒ¸\Z,Ï9“ù¾…ƒ­R°ìýÍR_U~ßK+Â=h·µÐ\Z¯Æ$u”K¯”Ežx‰[ä²Ûÿ‰¼/fK}_ÄíW ¿·•ñRqAqJÑ¬9Ôûh¦ô¯æ4É¿o®¼_Ï–W„]³š@Ý¡’¯	Ïíšrž¤½f|ûŸï9	ë×^§Êñ^yÖµòˆÜ\rÇºBàwI†„ÔÎzŒçÏ›m½2#ô_\ZÜ-ƒqù“RCoÖ6º²uÞ]uÝ¬q5Ï™lX‰XŸÀèŽ’ë	gV\0=É•®ñp0€Q‹ÈúÌIzÝxòdcâ\r?\nÎss`6z(7a©”w‡ú¸-P9æëXSïˆÚî¶L¬7öðaÀáC÷[&™4hŠ´¥›Æq•Ý)ª§1]…ðƒÜO\'¨Œïã¶±Ú&îCÆW4‚sFYžE‹ârìåìg)#átW«Ïú»$Bûö8Ï­u•åL®q\nðpÎYßÜÐAõ„„Óiœ Hl˜åR\"¾!·±1ß¦¹L×HšÓ[Ò’ÍRÎSgÉó›mý…·5Eµ`œ&o¯9Bòx–å!ÒTÒÄ}¬ç$t®$“•çÉžõ˜OÝó5\rå»Þ[$Ý!õÅ‡²žVl[V5_Êmõžüþäzj`d=USüEWŒaî”ilÐIÞ«g$SbUû+©Ë˜%«´Ù&\0]ì×	B(\Z×¼`Tþ\0v\05‡;§\0á‡œõ@äC\0…@­~@|ðèG\0–\0,Jò¡cT’Ôîl\0Ø\\ðµ”ß£\\ÚÕb¿´\'g\'Ûû!ÇåiEîn%†Çi°±\0•FÌ±Žle\0¸CëÎ”|/×•ºOv^FMîƒÓWgÓï%)ï´Ëå÷†TIÄ\'I¹j9 ¿³^?iTj»S…¢–ë½ýœä$M¦\\ÇFW>ß)éÚ>’Þ+¯ú÷·êê–L5Ûã…ÏxÞÉ™†z›9\n™ŸˆÈà|–ž\'?_@¯]}]ªáƒ¶ª%t¯ÿ´ä~àMy¾„*Ë’™a–c|\r ôGyŸ(Ý|öZ!Óo|@.rÏî\'‚ëJ¾ªG¸ŸcyosÿPYðiï›äýÕbSeT¸9puÝ‚Ïâ9tê	ò{ƒ˜åbž°½-\\íN¦1Ï¼Úï•ï:JŽ³ó½áyå)‡x#‡ã¶r¥ä+§”úöŸ‘CÏÊ(®.Âô,h8/gß‚Ü	õzŒºá£­íOîÞ­]\' V`,Z&\rïñ½LìþBá¸¿–	0vßî¨Cû‘ª\'D´lüð•LØ{»8Xa×F°¿‹5 \'w¼üŽ&B‰©¶wIÆ¯¢@ñ8Ä€gV¼êÚÎ@ëv[k®»ñ$ÊÉ[l]E1JSy¶iôLòû„\0ÚÜ”ÍO÷÷Ó1çw†G\0zKJ¹öw$-jv´&W¬VáN´ÂËs$üXåœTÞÂì+OmÈ‹ßûr *ñÜÝõ¬,áèñÎ5î÷ÞãÓ\\ ï[ÿMÒc§{×v.J,ñS9F«£ô\\!$\",c/\0‘Ë–jÆÈúVzÊ¿2­fP}\'ØøÏ»$œ¦øì¬Ó9>÷nä3ÏSÏøu/3=ç\0e°>\\ ký›RúQm…Vñ•$êž†Âu@üI®[)Ôøç3\0úC!0Vñ÷MÀ…äB=\ZpŒÃ°—í1=#ª ÐÍ3¿é4¦™Œ°‚9û Ñ- ëO•‘Ã\\QîÞßuDâb\\IÂú\nrnëÚ9Ð~ú£Òêþ.a€ÏÂ¹‚ËQÍ&ˆ¬ý‘²¾ý„Ç½HÈÔB°«nçzÆ»“ïx&SzÅ<žçf:\\êÄáð¥RÈs(yªkgèâ_Ú^ÆÓøä™ÇÚûDt}ÎÅ2Ÿµúz¾åß^EÉÒêý²?÷Ÿïhª“púÖ£Çˆªë”+xjfƒ=ýžœvŸ{î}cä‡¯j)å$àÝãä}qn¶3ò3qèuºKsÎ¦þ¡FLú=G®.>¬¤]>†ÝöÙõ÷<ðg\0Øø ¢/uŒõˆ-%ï{GŠNâˆC¤kW‹3Ž1Ù£Û‰4Ýp²\0›‹Eç‘·I¨FÑÙU.uþÎÛ-¿?ÿ£,œ¯æÊ¯Yï\Z0ìƒ²!,àÕÅGîj	®ºÂGåàº¬¥Æuò¾f[¦}.‘ßÍÇ(jÌÞÌLèEÅª}Eó¥G)	}Âüƒ˜ŽHçY\0PÙ–Æt³<\"šÐÃ	‘½  µ‹^vûKÌš}k—¸ˆ€N	\"!¡ë©z_6DámŽÞ+(D©;²9©\\êÞlíµ`E3ä›ÿp-ÜÃ>K`«¸’aS,Þ mÀH(D¤hßtAK1åßþ×º·(¢]GˆÀüë3ÒnóhQ+n$þ™$¥?\nØ(ãüw¥}«_÷Ñ+­D„ªžÝ&í. Ä!!\n-á¸F<ZfYçøò\0Œ¿¼JÂf¥ô£aÇx­ƒ…b\0­D[\Z\Z/ãR	->~À*¨å+ÜÄ9-\0,^ÿ\\Dú\0€\"˜ˆ9æÑŽfPÔœú>ˆÔ·EÔöz0]±ál§:‹ZH7·âþ.ßq$\Zê_sd¦€¾ßrùî¡\'ä»\Z=\0X(ÁnÖë47JÕ¡GYo$¡ÔSü_Ö_„ë:–¸ñÝôˆØ-×{ËÅ¡[|oy´èVâfxeK¶Â“¤Üî?R]&çšµRÊ»èæ¿’õ<íÑºn¤p¨.âlë¥Ó¤OøëÐÃ6C‰]û…ÒŸœ]ª±Tÿ‚ˆc_Å`}ö>€\\äÍ½Hê;y\0€bnê:gXNvÆ–D(`ßÏ»ÎËZŠê-úB]é÷ñ…‘¨G<×º·×©‘8ì÷Å|ŸçšO÷ºwêÐ£ŽþÛ\"wÃ¡Ê±x.Øåsïz_ò=>’ªGQ5çfƒÐ’•{nKÙ\n=¨ÎÌE}\0x†:åªâ†ªdéî\0wà‡K“Ö•‰˜ç‰ñÀ>Ñ¨R±¼5;-“ŽUî\n«ñÉ²Ý_§U|_v?,6¤–øúnò]mêZ1ž±¾n-ï[R4‹|s²càŸtèÚ]Àé;¾Q¶\Z-^8ÆqœE\nZ/HZŸÜêSTnû™×œC“¥îœ2;èçÉ2ŽfI‹ˆp÷vHˆÔÃ\0²#Ã½O#»b™Ü·ËïuöeÍ¡Û%_é8†œ%…OÌcÈLYfª•gHÆÛ4~ïX\nî+lLÇ—¾ˆ`CïHjôb¾‡áë:W5DÞG\':Ê3iNexP¨âlÒ|Îa·}—ä©\'ºJu÷ÉwdHÄ±±\r\"°g´·ŠHÞ\\}œ~	c¦‚)s|=©ÿèuÆN´â‘i°½&&¤›†I®A?8ZeÂ¼ã)¯ö3D“#f&xT3ñÌq˜ô\nuµ§ˆQ×!+¤Óñ1Ö2º=»Ó%Jô¾73râîƒÑFÌfb]„]ãíäp\"®udKÚ`	G­¾˜M±@ÊoÓQÒ‚\0QcºDë\'âX—*Pe`ºú¦xÀš‰ƒW‘h4=Ý½þUÊI™º/®{ý\Zn\'ßÁNBã±±Znfy/pTË˜F|ö¡â8˜0CD„P6h*ýùa;R­¹UÆNŠÚ©óîÿ;RÔ[˜4#3!SŸ—»Ð´qÂÉ×0äYOa³@#±ÞÕ±¹±þ3^Þç\r–tô	Ò®ã¢mfñšB^9T$öü„}ºé˜·°kÂuN)Ïz³ó\'ºw=šŸ$<s)¿ëÂïìÈ!=ÒSºr2õÝ59àÓ·«\'1ÜTUüÊÐn½.	lx¢îü–×@E^ªènÃH\0aä\r„n\"\"Z«‰áÕ&Äž’(î.xÁ;ŽÃYÁlx‹PÄch\\Rù¼üR_tiæ½\'JzQ@:É÷_ç§.à}¡€ç7õyãª–@éÅ5ój¿\nLúRtädàÉ¥‘]CÔ’ N;æ;7Åî44£[µ•|Š—ÉÄmç±	´nßÍ™¸™œ<uìNDnëÞÇr‰±Üëä9¾hš\"/[_OþÉ@Ð*Ç&{zrÁ›¾Íô ï¦N vh¦ÇH%‰ÐÇÊûÊ§™ï$¦¸Ãš*BO´§âvÉ—ÿysë~\0&òNkë!ZMÏê7\\º¡ÉßO’ÚæuòE&¶âu¢{œqŠ«=I‰B®ÏF6r\Z¹ÜöœPòkzÊø×¢Ñ©I»Íy£¯°ñ±O¥\"¹Â»¼´(Îòu“üýà1ÜôALNÚt|™ºéQy)Ç(;Ë÷úy‡]ëÏ±BÛ5ï1îÕHÊí0Ý§OŠ”éð\'ðGèöÁígÊçî¯	?+÷ä|¸ŸƒV[rœœûÆH¨ªðI	1êÄµ5¥]9¯»Œ×àZWÎÕl8Šc•Ä…ÀåG	Gy÷ö4:ôpf¬Ðd‚ÌG÷ÿ¸”5–ë\\pï2À6t–ïÞ¸JÚ_ÐTÎ›Þ!Ÿùw2N‚ÞJEŠ§–*²Ò¸ØPÝÚH¿Îì‹¤µ|”œ°IÈ¡Ó÷¢HÈMò<¶¶Ü±>’Þ¦‹dq~o¸öƒàe‘$ô\'fœYÓçÊw•C*š_Bä^ƒÆíˆpjÒÑäÍŽ`jeç;°öÞ€ûk\rþòör\0Ø/†EØO·cAq$ÜP¶§ŽâqÒÛ(zj}’›ŽÞ(¿ÏáàÔ&¿Sn#³ºˆñH¸õ*÷Ò¸@,{Õ«Ÿ9–]€îÉX#Cþc;\0˜ÑæŒ5×¡ÞXŸL¸ù¥î#Ç\rÇ—~´;Á×W-J¤bu`“`Ü,#^›\"Ãš™W­¦µûvŽ‰æ\0÷89µ8ãiçòÙ¾®‘Û°¢ÿ\ZrœÛcPù4-VÂQÇë˜QM_VƒíÏž\"Ì…Ï‘ëu‚Åq¹šÆ…‡4f¾‰iW¹7´‡1‡ó2ñ!Žß\ZÿÏ˜\Zù©¤‘Õž#Û-ž¶<Ž_˜@ã¿Y#ù~‚¬ë?Ó+¡þ¾êß?p¨x’ûà¸ê®ƒ;¶Ùºf*²u±×ƒ…{u¬bÀrÉMÂ U¶A+öw¥~ãŠZÄhTuù[Zã-Ë¥¢I—ÏÏÎÅ×ÎçÏ°CHo÷Ý–gâËK$]Åƒ£¦¬ôz•\réë{byÌÂA—?›”˜^ð:ú‘HõŸNº»ºG™¼ƒâDÚ,Ô\nû¶Ãò8Ú%ÜK¿i!£°Nkøôu\0b(9ÕHK,ºCÓ(ËçãŸW¹O›Ó¾\"?v<ÉóÂÈê|òh…Uaú€5©ó”/‘ÿÝ~Òî­•$t7¹$fµ7r\nÐ*ÌkE[PtkÐ}ì½E[k­+hf\r{ø‚>ŸÜ2x ÷%/ß6\0¶,\'—:—ß¨jËÞæ¶F)R^_:°a&;Bãˆ%}‚F ÏÓ8äO\"ÂQÿ]¯:ƒnUÁÖ£kÇÉ¬±	kœãC9y‘‘ÃíàÕùg,¼¸7€¾ñ^˜ÜûþMïì	Ùs÷ôï{\';Lþ½à\ZÒ\r¡1¬Ã)R¯G£Žýßbn¼(7N]MŒÖŽ­ÜË©3WäàËè‡n_k»WEm¿³½Y{xSžß”C×¨<F\"ÊGä¤2×_À÷#™^åá@”Ktj»$ê©MÄS]}Ë‰øld•<(¾¦‘Îm÷Êv+\\ƒT?ÔbmGKé¡°ÁjÏù»§$zñ¾g\Zw¿\"û ÊÉ9Ç€Ë>rroÌbüésß¸÷kÛÅò¾õ³2îî–ô’¨#âû­áŸ…lÜÖücc©ç¬<ë(Uô~‘ü•ó¼ŒÿÆð—›%ß‰tËì>ùwø´$éf–àÐ7]\'ùçqßÓ­-ÒMŽ·ø•º“CT®½®id§§ôÚê,“ôø×9nþûByÖ…ñìÑÜÏ<Ïf}õ¯ó?÷þCûLlp4€¶$ØÖÌHCù‰õ6È¼¸åÇ\\í0<+\"±þK¦Èw=Îwrí³:q˜ü^Ky$aÞg\n\\Îõ°YTªù“òÜ¹>ç½Ä£BÏxØ/õãMŠ²7^/ùŒ…>2E+•°™Hˆþ]žð*ÅýQ¥ä3ÝçjøùýµÿÈºŒ²m·#Kº«Ë!\"˜CˆÀkp`¿$\'Xµ´¼C¢Z+ö\\ñÙm\r\0à‡õP21•©ÅrZËÁ¨6	Ga•Î•š{Ò˜ìè£$ÝÂËNî|FÒøû=9’þžFN½¹0g½$éuÂ±7S—}dîÞb\\‚wZKýù¤4[’ÃYOŽ¬ØaÅl»ÏýØ\0^½òÜ•OÎ:nyÇw¾Ž\\M„î–dÈA| 5é—\\EÊÂ>\\P¶˜Ÿ÷š—sÃÅV2?Ç«’Ft•DÈkŒ‘PPœµ()ý8	/Ëž2ok—TÌ-ÍÂ—3÷øÕ@Ñ¿2Zü3he§\rÜJèÆodó®_ƒT+VhÈù¹ÿ®ß{=å{iqRaõònØËòM¬“›^/à>ëÒ‚’ŠXvÝÜEË§ô;¦ß<†ÚÆ¶up×ôåTŠ.Þ ÂœûCFRY ’ôGüÞ{/Eº™¶ó$íHQô!gh‘‡S>×}Žà*Oþ/že÷‡÷¨³^’]þræ¾)ýRT1\rçÕÅ53àçº_ÁVÝ]9\\šg Õ_;¡0\ZË<„ÿ4;`xÏ\rŒÄ9GCuØRÞùWW¯ý{èvöéºU§Ñ¨±c5Çã]\Z\rã~©‰_\ZþÔRº;BEGeDà…e«ZìÖêX7<uÄYÝ®ÿÀžÂÃÄ[!t7Ô!<H†¡®D£b¤¸Ç}/ïÿ.~º˜\'~Âêåz’6‘Šú’éZA„ê¬ïäyðr÷rú	%½ñh‘ÐA%\"ÂU=ÉÁw¤QÅçÈ‡ÇÉ¢®b{ Â-$ù”<¿x`¬¾ï”Î†º¸è´]‚†µŒüRÂjA‚svjOg<ôü·Jû€Š_÷¤ðèÇPÕÌ’³?³nî\0jëè›ª#Î‚\'óO½”z†Ÿ®X*ÖÆ·ø8Tùÿž¾}‰•ÑMíZï¿ÿº/9€k%@‰:ãXOm±\0Å]µgª¤·R„¿q½«‰6õedÁ:…Ywâý«4µÎ‘¯Ì‘\"J½àNd#ýšRåä\\_ B\"g4«™ZçïŽ£2º‡Y¾|ÀhÞ›ûø\"¾y C‰äˆö®–ýþ™íÝæç¥CíôTöàw×fX‡–k}¨÷$P\n©–l(5£³ø›+cç;#ýz\\÷ö¡Îó°O+\07‰ÍˆŸ –ˆˆ˜²þkÜ\"«åt­ÙÇw?¦¬ô—ç¯Ipþø¹gO†ÑéŸiÏgh\"\0PŸSWþ1ñR\ržß\'>+inIÀ÷N‡2‡ä}‰€Ê¡øÕ/*ûyÀH/Œw”û˜£r½ýEáàüµ¦¬¸ìÀm ¼aR\'^‡VÆ}Î”ôOwHÚ‚ZGá`ÕIÔu7?ÍXÃõîåé(“ÒB\"F©#òÒ/Û:5!\"ÜXÝ–®ík0ŽåÐ*¾ýIŽWµdy\'ÿNÒþ|>t\\²žÒb\0xâèsoþëÀ×Ó›ÞÜ@ïHR„—DääXÿ,I{¬”ôF˜;áIY i“5ò{m[4¶<{Qÿ™ÎÙª¦T5Fýñª3ü\0ªVg–•¯(ÉJ¸±yŸýEó™È\0eœâ9þ,‡¨*¸Þ ÔJ<{Da¯¢y\rß¬óEäÆ¹$ÿu7p= é¶—l—•¢zàz{ð&ª¦ø ºdÈTuqmIóê§Ue(*CM%\"¯\Z,¯þ$„­jj—Óiýg•ˆˆÕgdm¾kô\nûùÐdÌVqØÏ¹ÿÿ00ÃúrGèR‹Dõ¦–ÝàØàÙ·Ë‹–í¸Tü…Uãåö‰ó{êyêˆÊ¨;8€*—bO91ßò¼i¦ý @UC3qëBç>äOLóº¥^|´ŠÅï [Öî°|7çIMÖõÇz’?Ô1Cû¹oãÃ%ßrZÉï%h+F£êÏ¼{Îdù$¤¾_#íYó%#þ‡”T\'F\Zß.ozR\'÷÷É498eÚ»Å×b€7âÅÔ|5uˆ2ÉA_Ì?%¦ —¢°¿‘øŒÌ7›d=*Ùú‹päárú%ÿKE£åù¶»>u{è^0®þ-Ö¯†­­+\"Gc:ìrâkO—t3ÃÍÎã5¦…9IÎ\06¨!\0æ\0¹1\0Ø³¡Îa\rZ\0•µrÎ¬Q‘…XÑå»Ü”Œ3ï’÷»¶Èû¦Iº›‘mSå9JÝ{ÍUâÕ6ØQCïË±³úŒs!\0ì³‰„1‘›Ÿõ«Ÿ¼‘âÞvY9{­I\rŸë<¥†Ü‘¶Â	ëQ·Q‘»Þ âÔH¸I%Zô/ªRî—dÆþ¦þÄOûnRÞÃÇÉsÃ2–gyÆÇÝÑÏWÚò)ß¨jå;Šh*þÕhÇˆz!Û\ZÞ‚3b7bÖ3dÔšúÌCQê°7$ÜŽ<ØÆg|íK½†±TžG2¢aÌ7×wS×‚mg8¿’×LFÚJì‘ˆ’M£³Ô³\\ýðBq/EMÑ½¢³H8¬ZS»Ì0nJÆf7>ûBþØýúÏÂô¤ì‹º´ªî ûÓÈé§dê¾ ûS!ß|œ£ué¹ì÷ûžýbú¬¤¬Ãw½øŒOçu(?wöÏ\'|#±NvYÉr»8N5ÃaŒç1þÜ8]Z¿€ýj¹Xú;à×:{ÚŸrjnˆð‡Û\\í4º2DqÛ©¬×©ÐnŸ	§µº1Ÿ!_¿±US×yÆ1»û[GèÇ2¤jÞ8Þ†ÖR6cê4ûw‘M¸~©½ö-yz÷<`Ø[oÎ›t0éý>µ‡õ€ÂiˆÆVËýÏëWûW;ÞoË0o}EþŠÒì¯ÒÏJ c&EÙç‰Ÿ.zM`!üÁrPD\n¤œI¼Í­½D Ãk#$ÿ‰HdÅ†È±°“\rø|ž§D¸»\0(Æùn4&ÐûÆ¥÷ÍxþßÏrÕ	@ãSLÝ±©‘Ù‚´ºa\0ØL#µvIZJëî²æò{å%RN”1Þc¶ûÝ©._YžJ+âg©NÀ=¡A§Þ€}AØ‰°ü­BSC\ZÜã–	¡—wðlt©nk Ûš‘AÚä0jûŽ:Ô›þCí\n_ÁœÙH¸Œ±Dä­Ë<ˆÂBj \ZÇA¿¤\r×1#Ê•¯Ns,0.–8¨Sêp]oï\'ß+íTâæ‡<\ZÁõlCÂ¨y\ZÄä(\'‡{NçüçÍž|ú´\'hœSW‹÷;{´R-ºôÙb“d\0­y»áÙôÔ¬àŠUþlÁø|îAð^F€DÃH½$¤û•’63=ýu¶/u_˜¯•Éü‰H\Z­Ä?Úhý%	»Îžq4Ò¦ÕFè¦øñn%³–È™FìI¨Æa§6åwgzj5\\ÝhcVÑûéßâæe”l‘uÚ~*€(Œ#/óìs{¼ü½Ô—gÉËÞ $–mç»H 8W–—øtœO±ÝTÁ\\Èó¶Yšýñ¿Ì¡¿OÎÔ$…zJ6ÛÔYO~Dr¹CÞoú¤^ã²‡÷í\0ž}ïE\\s&z‹ãWÏísÒ5“ °ïì¾=ƒè*i”aåóRf\0ybM\ZéÃ~G‹Æ~IÄ¿MDr‡A‘Õ’ž17¡£ÇÁ¢#\n‡8±î)ô½ÿVõ%\"/ƒ	ôóY½ù·“?}62ôÏ@ãG¬ÞqõEâfF7´R\"Šo–ð{ÛˆæÊ€+š¯ˆÃŽÐhàöÓÎ_uÿ{\0Pô6Ç¿cÀÁåÂù[ÓzEYîÀ	NëO§xšïòøûõªóÞ5Ea¬òôHöÚÕÅöH¨ÕÜ±5ä`ùb‚CÔm¥Üæ¦®£ª¥—;\0Ž‘ˆ„æ¾?É	?¾UIãÇ–i4û¤tn…ìÁÚ­=ãä/ÂO|ÿ&U`U#%ßÙS%-èÂœÞ{á¼Öýö<ÑßÞäciP}º×\Z×F\\¢ôTÝºµJö½ùfÜ8§\nàw\'³ü˜kœÂ)÷ð±žO!;ˆoŸö¡[)\"Ò¨(RçÓ:—Á†—{ÆÉ_tœ(ÖFisE_ùýÚä}¤‡GSî§œJ–gyæ5ì+jOµ0ˆÙƒ\ZN”úN¥êñƒ\'á2ŠË§Qâå•¬oµ«ždy¶å•x÷Äv<(ý{õÙ¹ãeßõ¨òXX®ýœ¼ì™ûº‚ÆœË’ò¢´r’¨6Ð]yÎ	n›ø°Ûa¹.á¥¾džÿ½åÿSž[o§éN!ƒPÖBž_â%+ÏQT}#‡íHpàï{±ëðÛ€Ð<tŽ÷&ö9wÂðù\0°s­Þóx+[©Î¥ŒéýÃÉÌ·Ö½ÁrãÂïÏq(E_ÊÄÙ×ƒ™BÄ\n¹uK^\n>o§zKy‡vBè=lÉó\'“.š4}Ø@“{Š£?>€¤Ýx\0j²WRÕpê=õ1àË®\"I÷óßGëÖÆÿ#Ízß)ç¸3”âO@è¡Ñh<\Zðè¨8\0G2ÄÖ†ÏÁîï¶æE¬î™1¥ <ã¤^?Šj“Ô®Çí—\\Ï‰õð\"“ÌÞ‰ÔkSÆ1ýh\\sl¨ÙI·œ$×ó^œ\ZgŒîû•Ö}Ö1+û#Ÿ:j%ëyN÷¨Àq[:@òl=ÓÝïaûä9.¶\0*„,ºá±	p‡Ju¿O‡Ð-Á£<‘×äÒa…Ý‰Œ„;ÜåD$(ò»ÉþþãŸ˜¯?ë)A°{  *¹?MÞ–öÏJ7nU—ˆ®Ï}ÞþPiGN}×8xº@Ã¼\0ëö»Ï¿^¼\r.<*Bç¾Ø&¢fµSl\'Ô	2Ž&uÒÙ\"ôHXŒ…+Ÿ\"B—ß×x6•‘Ùé;_›ŽdyîÐCÖ&º- Z[Ùêü¿ðû!¾çHò¾B®·o×Êê}×í^§lÝ³}ûRåPxÆm\06g%›ù¼gÜNÝÄ?î’n½t¨¤Ï_OÄ~1C•æa€–ÀS§¼ØíúE@dAå½Ñ^Àc½Îh}ã\0(7<âgÕ`¾W‰[Qo£,°Ù @6‘-ç‚¯GÑÜø!î!ÓýlÂ6êÆ©i@Þ&	ñ\Zžð£|¿]ü}Õ‹Ôqîé‘œÈ¼æ0—|ôõ]€G¯ž:ÿ¦çÃžÝÝv\rÂ…\0Ð˜V—Ç_*Ï5(\"*aš=l×Îöò¼ƒ$ÅnÆX*ºYÞ[y	D®²CØi$à†m>öøá\0Œâ:Ü6³^]ºé)š.]ÕAˆÜË(ÂÄ[Í¡[‡è®1›‚zCtÈjÂiò*:îP‹œÁ$bîçmj\rÃ/ªX²y.Q*&P¢5½™ÐU1øÝÏœrûØåb•‹zãSÄƒ©\"ZG+ž=JÚÆ8Fã^Ô1ÓÝ+ÔÌWë›*RôWdû>u-¸m	Üœš`[UÂ¸[>ºÇ… Œc%f>úž\\¹© ë*±™	R·\ZœU¨5Hà\r —¨áŒÃyk_âmå;‰ÕûœH<\"\Závc?›4H3O©-0g‰ä\"6í;)ÿË“ª%r·mŒÚŠ6ë\\*¿Û·:ž>—ù¯v©¶+‰·¼íÑü”×+±b7NQ7Ù‹ÔÛÉœç†ÇÝp…púÆ×rË\Z\Z	ƒ?¾éé‘J{.˜{¹#—Û!ÉßÁÿQÈR;u,‡è,\"öPÌÀ%ƒ)2.>Ùø«nÀµKÿ1ÿ™.Àc8÷^QÐ—{ÑC‘Z4j¸[ÌÊŒšoÉ´ì]·ñ¸8âIy%	‡2ÈÑS8Q‚ÀÍgD÷n\rãdJj\\GJï¯<€·üKž_;ƒœ³ƒŽ,ƒ	œ¿kñÃs\Z\0‡­Ú?u[{$ï²Êó;¶Ð(éV>ûé×®¼¢P–`Óƒž9›ŠŽ¤ùÝ\0&´|öÈM\0°m©K|þhËD<t{™ŽÈ€zJûdu¤\ZÚZügˆè÷\0À„úq„?!ÑDtÎêîG¹ŽÆûjIû¹€—ßÜ+Tyüâ î®Ó¹šj®J[_âmtuË·I©ª¡–QU3h¾Œ í½W«\Z0ïájñ(™ò§\\û±}Œ¼]ð‘[\"Ô©ñòíöÔ´¤¼ýö\\d¾dÄÈ7,hõ)àlAÀFƒ2¬w~©$~†ñ¡¨­JÆ¿†îtyvÀ§i[˜¨gžœ_æ¿éÕ³¿†¼/(öU\"¤ö,êÊ‡º©ÓyMí{Œ½qé#žù´•Tÿ‘ú‘Å%Ô6\nx}ë¹_zÆIyúå&Ø±_ð‰Zò.Ïe^cÜ™ùO½¾ZëÂXÄqúbOÞlz»eÐ)—ºëÌ´œÿ¯‰Ðˆ‘¦Øîl_B£ŠÊ…Ãëæ5š\0uxøíi `ÌƒÑ¾Dôy+\0Ä{Ž|oˆ1>=Öìº_†åÞOþ;Þ‡ûŸR^é|8c+\'8„Sõ„Ü—mT­“÷ÃhŒöÁ“€ê,\ZÔ\0;zÑx¡wÑæ.’‡¼õ¬c¶Ç\0¦b)@\ZõEy í£uýîÉ’ÿ@c¬¯ªöŒ)Zöˆ°ôÿÙ<¸ÿš3kÎ¹4öìß‘\Z™ý7\rgÄ­|q¹K–“5|ß\\ÖÍ–1pÆ†N‰8œÔz½[=9Èj®óÛ`fßòlÐVþÀù>üx¾¸.»~½Çu·÷[÷û!GJšÃý€\rÙ•·˜‘´ã©Á}÷†ºMÁ‡Ÿÿøa”¬Åi³ó½Hö,—:\Z-’2zþÍ>p²;\n÷K`\"ãós¸¿ggAˆ„n”WK -YÚÐðì¾[$·ÍÅ6ID3«Î©ÿ$\Z_æ¬Ïn``­•ƒ¹ÎæHyïq/´­ÏWVo]‡é½>\'¡ÑÑl³)»yØ@smNà¹xÆ’€õâ½ñ5o‡›sáßÛ!€CÕëß\'‡ñüí’Åd¥Æe3<û:[ÉùS×Û/ŽÐmx‰SZa¿À	¯8_¦æ²éGo-ñ]³ø%7/¹p|{`|§ûo^\Z	l[\rœ6\r0>‚qÝãRÌÉ—Ê÷›yÙBE:GÑÛ\0†0òÐ9WðÀcä G¯ó_tŸRãýÅ·2°s¤œ9í\0u2ó1Ðx\"‹pÞÖ_½Õè5jõÕÆxs1ÂnÍÀë$½îMIËx	Ê&êÆv|(­ý‘ˆ{;üwCå}1#Ž¡9{×\"AëfŠ¶U]*ZÊag}ÜiÒà\Z5â„gM\0Øg·¡C|zÐ8“U;à´ö…KkoÝD`Ö¦„â¶Ã%OÏÂ\0ÎÈ{Í…é+úCmÊ%òäàDÑ ÷ïH0c¹áqŽö9Dé^8 ’1Žõßð‘F5ÉVƒ\ZHùõd!·p´còU²bŒ8wWdë¯™oy†Õ ×ŒâGª††2ÒZù¡$ìÈw¼™=™V%	ˆ¯\"~†Œ×îJ®Õ¾D”‚¨ŒwúªŒ”«Wíîñüùð&\nþçü¨œE›—#O3&FÊÞ1_cIk¿¸ëš—0jý§ÓÈÃ|Ô%o\"O¾sñÂ~ÉsáÊ,æÊgŸšDÜ=†s_0jdh3üÜÀRÊ+=‹œý‘DdŸ	¡Ñ…×ç•¨rìç\\W¹j%­þw\n¡a¶ä5³Ý+˜?’F’á86ñ\ZÔåk«;ÓYHpjýFº\r/òÚÏúómX77(,Yµ§ÑÜßâµQ·¯B02¾8ž÷Èò÷þ­ël»Æ\'Æb`#¬L‘œ˜¯%óþLâ‡öÙµ7FžmU. ºW´\Z±±ßyíÕ{k%Þ|êïSî¿þ<à°\'÷Û6ÂÁ£Dà‹Þ2bã.¤´*uà5xní”üåË’‹~Â÷ô÷Œöæ-h-R&9–%BÏX^¼¯‡ê/žûø;WÌ®xûòS^¼\0\0âÅ?ÃêÉDƒnå\Zû¾!UÏ£1ØÕ7ð·ûÓ–¯\\º2¨5†=$\nˆÐ;É`ÞGQ]CxDìF÷Ñ-<Pk1wGÇÜ¤ŠôSæ.rŠüúº‡Öx=»­¿›F _\\)’,u»ôÞŽlhÌÌR¬Ãúfµ“ùøfÂ¯,’q»y9\\‹è>šqžÚ3_ËÈ¡îZ\r×A¯æ:­7;CY|.¢fù4\0a˜ñK\0D¡.cü‹<ž‰Kp2Àsÿ‘Q¨*wQæ¿HÐì¥[oý9ÕÚ·QÕÕJTæQv0ë¾žÞùï;óG¹íÐzùŸB°2YóÉj1÷wŠMñQm¸îÚèÄõÚ¹§Írg¥<Qü·msueèÖü/›ÁyÝ:SÉ×ð\r¡ÛðBsY^9Åú{ÒçRreÃ\Z›Ôƒ•­®¾íÞi¯Ýy	:à[tÄâoñÈý—\rÿÛ¨o‹<ô*9øÅù¼õÌG|X*\"w5yˆ°þÍ[—¾¸CðŸdÞøHòk¤-µ6$û\\\\äE€¿¯îÛç½ãæÎÃê\'_™2iÄ¥Àaùûçn+Nò‰ŠÀW2µoOcÀ\Z<HB{å÷\nrìñÑ¤%½ºò)¢ólyjŠæCõ1 ¾2w1¦ô®ÝôÙ‹q\0ØÓ”u_’øÂr¡9Ãá¶fyJŽÉøÓ¸F¬J-ª–^[ÆV!…ÂWr„­:tEl,¯‹¬½œ{’FVÉò½VÚî[Þlki0i]ñ-€¢š‰è}L•ô«å8Ç¨[,Çyzœ×{\Z³)Rp¯Ômè{Œ»yª{Z´‡\\.nú½gÏÅê<iñ>@˜½PÆµøx8Ýí¬~‹äÙœÈúG!õr‹äQ`¼/zÒ®yþuT/ŽÈö«#D¥>×6vº˜ãs‘GI·5±d1·Ó†çÓç}Ê÷’k¦‹ŒÈìu‘¼-ÖBbÝ«6µ<í‰ò/Ó±.m£?êí’ÿ‡Ò—#6Iymä6Éph·O?íš­„·€µ¥´å\\ž+íã§`U,`Áœ÷OyïÃéåQ†2×z3n§Ý¥}¡îÉŠá¸ÞrìÇø}#ÊIsç=\0,DO?z«Ë;\\…Î}f%üLLä²=Ò_ãk1šÃâžZá«ÎôªŠØ·«EáôvHú­p]¨fÒÎÏi#S6 \rYñ[	#Ï¡Z”²•A“€”ã&\ryn—ø™r¤OzW£µ°æ ªIÓ¯ýpìÈ7:yèü«– Rñ%,àÓZµÿãQÀ„!ƒ¬‘S`[SùÖØžðcµ GÉ‚²®`\0™ŸË0|#HÔ€†szþ×–…“€«/þø‹ç^KW„€?úfògÓ€Ãò‹Ô¶âz7J7¿MÐ\0é×FFn³ÝÐŠ+»ˆ	vñúÎ]¤$¿ï)ßíi*N|;¼BZåäüáõÝÍ~2ÍŸÍ©7\nµ\rí\0^ýüÁÇ.>¸ø¤«¼ú9\0¨å)qÜ: åðLµÝªb>×ò\\kª`UJˆIc¯½¬+÷Ø«Érí¨u$ïGÔ…`íò¼Ýv³Š&kÛ\0vÒýlãùþj\"ê3¶ Õ_Õ¢ÿlRDš d>·šØ¢«3ö7t ðÕ©%EÌ‹À.z¢öÑÌéOÃówòòOsêÛò\\ñˆŒ{×dü\Z×b¾o7BHšç	hò69ë›ïí3|îŸöG¼þr¤ FË—¨´ˆ±, ¿Ñ†Æ­wüâ‡Ð-wýŸ“þØ6’jçRéžá^ßVÊ]~þœ“‚:[«åpºZB×r‰²-à5Æ%(ÿ›|wÙ²îêÿ‰y:!Py8hÇ®›&’Éh´ÂÕŸ”}ûâóDèÝ|N§Û¦ì_›Oîsåø=IpªÂ·	Ðˆ<ïë\'|6U(¡Kd¿wÂ:\Z¦qp‚Pw#teîñ–RÎ—R¾YLï¤â=;sp‚’ñŠyºåšáð—wK»?kæ«3¼ª\\Ane D½ûÂíö¨²DÄÁûË\nØo?Ãõ©	Ï-`§þ%5LZ(›ÙZ™`-Þø×ãúa	(·\Z\0½Z¬Þ°`*€5‡b0aá…7ì\0ÛZÞàˆpÕPøÀ|éz¬Æ| Îðs\r; t·>?éCL®9mÍÐË€#_Ú}ËÆk\\¼\0P¹tÒ€zMáV0ôíŠ—%]û¦„LØñºôgÏ(æ’©KoId}y.á->	ÑúöŒfC¿?$œzQ|M¼10Ÿ÷šàbÜöÁ«\0Ø}7·×Ø›S{Ã¸ïYV	²Ä 7N¸-™‘•	ã\0‡ŠN–_R´wâ«¬ÇÉÑ89))\'â	ÝŠ?d2Ÿ}HP·—\'rë¦ÙXWm“rÂÍ=œ\'ÂuxÆöMò|/‘X·&\r\'ˆ3¯t¢µ\r$\0†uüå‚@s†%¸·d;Rc=EßÅñä<»AžÍÎÇ<þøÉ€+¼ÝoŠ­ôÿàˆ/§úó¯<åK\09IÕ„lü©–¬£ðÝâ&â9èèÿ_(ãðÅéRO‰áCX¾ag‚9#¯¨ÕL¢×S·Iûëtu!tƒóg&®Óäw$ô/¾=É«EL¨ÞËø×z\0pÅÃïöÄ®{åi§Õ×÷äH¬¿/VÉ:+ì&íjô¾#Gre_™)û:qo¹£ïnÝÝ_ìfú¯Ÿm¶WÊ½d–c˜ŽÎNÂÇÞ¿&¬dŸÎ?’­ ý9a3	¾?xæ+×g]Øí5Šq¬¹n³ƒ©QŠÁÿC¨LyŸéY¥l\0ÏM—4g¡aÏÜ#©u—¤7ÝcóZy›*Z–´Æv~cÔ˜¥@|	užè|áÕ]\0ÛÚr>ÖQ~ÍkVç¹ë`}—|Ü`îÉÀc\'¾Rtã3À‘Öž.;:8á´“¹þàq#T¼ïÉ_bªgf™ã“­FÏÌ0þfÆvqêjhh²1˜õå¸^p<pÁï¯Ý:ë+\0¨šê‰œf8„ÏîÒ,ø¹(oÈËE’ï.¹…Ê8nÒÇzOï÷ì6;3GC–vNÔèÔCžë\Zp\Zå¥\ZUåºuXãEG©>8…Ù\Z×izÚ“þ:PFoZý6m?ÿb÷ak$Pã•¿K}¨‰ˆÕ°ê¾HÞç,æxûû\'ÚU%ÖäÆ´þíóH‚œÍ´¢I#…Ó5=åØ~ÿÇl)ºMë‚[Sf\"Î…âÖÉ¸~í¥û(Nmqªó”ÿü)˜­Åz^sRCžzCò&C\"coÜ.ç”uâlùµùéü¶5Ü!b½÷Ó—\"òo>Ÿ¥wòáðý­` ¥7¯•r®	û¬Ô ýæÜWV\0ËA»ŠwK|±BÛ¼„åÄF’ÿØÚ•’÷Ÿ{ßa4ÆçôÏ/ ~×$5–zö­wç±Ÿè¹|?	 \'#pû+Ð‚/«1òœð>HõuP*±_Z‹FQô³Cd\nBÔi<MJ¼ŠŽa·|jPgYÅƒº\0cGÎ4ÆL\0ÐùX<±úÂcþÚ\0¶õ,’ëL˜@œ\\Hþl\0h²vWç[G®ØÓ|cÇ ‘tº/×_Ú•;—±ÓG04+ÛeÑ/gÃØ®‘C)Ä{£C¶µ2Ž­)«lc—»m7ß3’XBÏïªèÖ§î=FÝ`…-0ßÄúèÞRIQŒ¯ÁÈs5ÿ4¾Š&ãÙñ2¦Æ‡ª!@?,§„Ä8Žm¨~¤¸ ÛÖÈ\n$òzðúQ<ˆd2gD1w¹^]¹éÉ—ŒgG0+àêéé:“‚=?2ËÑ«ç¦Êú‚ˆ¤Ul’ÙdL4@ÔæGî\0€ùÞÒV°Éõ;R\"xynQ›m»ƒÒ*ÿÜéò¾Þ\rÌ—gd2oÄ<eûÙ~,qŒÝ}8çÔP—ê ¤ìãxç±ù2OGM çèg…`sŒŽ·óƒ~YÃŸ‘ãR©í>“ëµõ3HÚÕÙ>xÿ)áLc\rÄ»’¡UÌFjèÓT:±&-iåcð‹’\nWJþ—$”¬ºÆÙ·TÕEjÄ@å£JHmŸÚ#·Ãaª¨TM‘¨3Ïä÷#:xå}˜nÝ{ùP!–<\"gTE™Ï%Æ¼ê}¼gfbžö¸×…5ˆfë#™ù?Ì—gƒÐÍj¾â\\Åª{Š<?ËÃ1t£¤O-–ßu$£^¶—Rþ„¨*	Ü³zfë»:\0ñ\'Pú+ðä1\0¶Òuî8móâûþÙ¸a×eß¾ ˜“íÉ—ñ^ôrxÅ¥\\7qI÷_Åçbna</´`t«”WÞZÚŸÃ#(±¥	Ãe9Uí–|èægÀœ8¿/éÁq »[	¡}/ÈûJ.äœÍ¬w‚¨\0ÊKäÙ¤º¡‚þŸUïÐûàIÖ—²œKókö­-èIBŸI¡<ó9EävˆâÂžˆOQ%ô¥€M×å*Î÷É›¹ÄÄ%~·y‡SDÕù¾Öd[M_;QÆB!ŒÔ=ßÈóü4ÉHÕ*€‚vp˜Gò¹õX9pBí]¢]÷jt´mÙuRîö‡\\õšWÖ÷5;ò{ÇÛ)Ga¤Âgmï•…{ÜÃÑ³ÍA›i9—T´N{28È·¬¯g=¾oÌyr–”ê3ŽN–çª%’çD	õŒô£Ž[ìO™K•Ä‰%#»ñü±&9ñ0ðG\"“=ãlºT?‰þ}ÎÀWë¡jP¬Í#]ZK>³µˆ#\"þ°¿O	Áf¾û¹ Hk·ïºL•HPÕ·ªŸŒçô‡çºÖ‡ì«pÂýÓ­Ê²G€DÉ\n»ˆB}ü.Eí£\0D;(ä!Çòªï:1ïE\Z÷Ö\0r“\"ÿt_mt¦gî\"þëÂþ¹~C)÷J2ò—È¸Ä\'Â/reêº0<ª@ïû˜K’–|_,×à>Û.Þø¶Òip©‘õûŸ„Ð3[‰Ž­€|\0(j;ž¥õpN¾èÖ\'L%\"¢5âgÚß×m}xÿJ`ìþ™+ÇÔâcÐ.4xjìÕG_?èÖiþ}‹/Õx~Êå9À÷>ýÃ2ŸöJ<ùÎ2ùÓ}ì›&Òë_Ìt‡‘Ö¶#I¨YìýuÕDÔ…ÌÏ	Œä{Û­e4ÈÐ¯j4óÓï3>ŸùyMjœFxÊL4Zý\"rèëXÿÉÌGÎ”!?;ªØŽø’.ŒË¤vqÅÜÒ<\0!lƒ/óñ£’¢%›b÷ZËÚFe1nP§•{’âJ?æA@Iã73q ÙÆ`†cÃÇFkþVîÊaå®z+[QÖKTœXß’ó\Z+º|ü˜ŸfÍ§ŠýT{¥—!Ö—îrM[Âé¦vóx¿µ`¼x•Œë¾\"¢>´§ŒË	4ö\n­JkÉqL½¤Æ*ž\"„À;á¬å«kvr’Nˆ¥ˆzÓsäFêe/-.‘~öoÏz\n™Ó\nPVq†o‘¿‡t’võ\'Â\n‹ÄKÅg¸æ=ìš9/§fQ÷jÀ/Ó‰ÿƒùä>Ñpã€+B½åËéÚÊ5íjÙ…OH¹çÞ-ý=ìwÜÓY^	×¯A‘P˜/6kÏ\0¶tMÚùK1œÑ pÝ¼n\\ìØ·1\Z•ÆÆ§¦ËJ?æ0Š³×?IÙ˜Ø4˜‹¦Iþv·@ªQ=¸½bbŽ}j#Âäú1×ÐMñÛ7¤mM›KýÝ§-Šr)L\rÇ|*8/©QçÈe\\æé_ËsÎ»¬o­ã\\òÞâè%Ðc(ó t“í.ãI	T:Ê³ƒÄ51[åý¢»WŸ¬M¨jývå±]Pißgå¾ö3[¹§Éçz_EJø™úò§ˆû‰/ym¤÷´µ?¯;3ÚaàÞÑ3WÞy7pÑß—o~í4 Ù’‡om\rÞxß¸-…H^g’—BÇˆ/cÀ—ÖL½Ú˜S?iÓ€þµ\r·»3|ºyò?0¾çÇ?ÿ‚ yŠ57;…7\0ºõ¶\'ÿõ\0XKyUÊ\\zÍ‰,_í±\nxÎô>±ewËÆV%«Ú2®Àñ}ËÉÂE¥^ûCÄViûø?ÈÆY²ºZ\"âlãÖ©3!˜unfýÜýõ¶;ž+Ï?åzHEU”u¡p|*ÿF—(ÝòŒ£WDªÞ’»¬²:iEËAªw­„ø4èRŸìt„\n#Ž¿ïÊ~ºD©™JRw75XªQziafe·Ó|{–T¶xmìKaF\n\"úr‹H¬ªhÏÉ÷RJ½{<#~ýZ“ÿÉõ\Z=8Ák|	Œ¿¡Ãw‡{×Êpù³ÚC©èd\ZµÖ¹YT&yœ½ã½ðçËÙ×Mr}$w6ñ.ÒŠãìÈr¼Þ\Zs=ó´ßi#“\'†ÎŠizdµb«—2°5±¹oK«ôKûµw5ÄÒ¾Ï¡ÿ¢FqiRÁ½ò<q½4Ö8\\:óøIcÔ~> ëŽ‹vØ7ð¬Ág\0ÐÀ\"$ƒ6€ú¥Üu4n-Ï»h…^Fv%1”P7mß‚¶›œðîÌ·,£qZvÜOõU™Þgkg¯‰ÍÖòXK`Y¨Í–Îq\0(_ž Jü¢”c)™ŠÖ-r÷¶Ìô½L#É™\'êyGŒåÌqoIy3þíõVšÉd:6h8©Ã{‚þ«3æ\n‡R5éb2gzŸrwûµÒþ#vq†¦ë2\nïŒ…wÄú»F8ÐuÆ¥ÇËûš×ºTþãí8¬\'=Ã¿;3ß²´¢g¯$ÂŸóNZkWÖÿÍùü—§à¾UÌ œÇLƒnUBb„„È:H&`9DÊA;1H…ÊÙÖì†G—œP+¾Ø@.°R¬×&›å÷¶oJùF_×¸ÙÖÝ†çR!ì\"—þ%Eäjƒcœ‚z«|¼,FÉó·<ç¾ï&åµÈµîÂ¾\"\'Vpý™[éæ¹z€D[õùW¿‹<ˆÈpˆÈSûi®	’1“!~Õòû)·Ésî|øÝ¢˜~]xÝÑœˆÚrµ#eÜSÖ»Bªñ mû¦dÅL9Œ¯Eµ^ó9%¥}³@èIHÚ÷?Qäþ_ûºÓ‰ùìÌWÂi?^!ÂŠJNüøñ‰Ols¯BÏtD ÓP¡j†<KQÿyòû·Ó¤Ç;xûÙÞ®2…œÔRûè_ÆvE~5©þŸ\n¿ÐŒX}Œ\ræ Ó_ÆìYþ6\0D‡óÂ;<j±\'àˆ“¢AS˜‡÷Ë£È!rÓ\rÆJl[·˜*r¯ïàL˜ß0ÄßÎ–÷‡>+¢Ù­\0¢ˆb27ÔnGËl£8Ó!r·gÈæ<r)ZŒˆnožèÍ$t«*›\0_+a?aêM‡;O:„X†X¿Y\0JPtø@‡(WÁÂn$ð8Ý£\näÐ{é9§âë„So#¢ÙÈ‘rý¯jÊqÛ0Þb\\†Mä!wÅ,ÔOZ4Òã¢ÄèÜppèMºK9\'_ÀÒûr>w\0#»M¹Ô ?t¯ÛURÕ\"Sìq\n¹»#ÁsíhŒßÛª&\n¢q±ÒQ\0òQ0ýe! *nEÉ…ãå$j:Ü½ÞQìy\'Ý¹»Ü7”|ûÏb\"s  ïïŽçJŠÜ_«!åiH	Ãfå±^‘{2ÎƒX­›eÂè¨ù¦NZæM¸@1JjMB¢Ðg§˜³œÄŠXÝ€‰ü}ßÉúª¿]úÝb‹gõùHŒÂÊ-að2±ÄyaÛø2IÑz	ê¸mƒ¢|æÉ`»ÝYˆ¡@òñž{s÷-Yí.Ës¾¨´ïS/ûí\"ôÄØ©L\\)Ãm¼/z”!Ëht0±y‚jiìÇ·-éLÝCHVñ•ŠïÁŽœyÕêÐé†QI‘»e1¼ï&þwÁœ§ZZç_…Z~}|\0bý¸pòË‚ÊyÓ³ÑòàõéNµšðCè¤—k\\/•\rQø:€ä3VòÕ.BÒÏÛ@\"VkFÝréêrWHÀ\nuçB ìŸF`o÷ßFä×íêéÑ^9OYÀDýš-=¿×‡ïLEKä X)~Õ¹j€ÔuN ‰G0ZH +7¡™Î[+Û¥@gWšÂ™ þO\"jç^êŒ×\r”ñîh·§9j+-\'æEèþòEgâÐ­ãáJ‰12šéY\náë^’z–ÝÌo‡Èy_‰$¥NwÖ³‚ó.„¦Rúù\n¯}ÞísÀûH„2!ô*F|›1Ê…ÐÃÈŸ°iq[¹Ç6\'¬gïJ~^”ç†#dÝ\r=\0¸4îù.Þ2Ip²œçˆA½³Ëqn €ûß<é™‡axÐº€ÇH1¹¬D¼\'âNEèö|{ÝfmId¹‰_Ò:,—*©²…Kå<+W\r„ž”€Yißÿ/qè){r°tæ™®DìŒõüÒj7“÷lM9ÖÅíŒn;å´ÏH£¸ò{\"Tëù®&ri,—à{”tŠµŒ%&·o‘b •8uÀvE5šý²cÎ3fy%­R7E+YÛýOþTN_M\n2†Ç1öO_\0±ú	R(£˜?$âx£Vß™B<—ª”o•Ü?\'‚­OÂÜ@ü1ÇøCÕBîú,¨]â‡~èw\0Äþ3Ó5«\0©ÁƒÀH«asüÚŸB‡.G®ŸÝª¢Ñ’üÇË÷9\"µú2 F¾Y¢^ÂK”vÆ[;äW™ºPªåà°~\n8Î,iäa‚@&Òv¦]\nÀ€õxT¦÷œO¯Mmy‚D]·Xþ¸]âàïr**o‘ñ:s»ÌcûÃ$mVûfõR$Ò@|·K%á¯â1}8Lï3Ï6Kò\\gªŽä;~F@cKcÉ]È;°»Ò8ñÔŽž–D<ãfºëùa‘ ¨ùïs}u–\\UÝä÷çx¹VDüÿq«DæTáuYìûÌ×öfR{&K‹øŽt Aøç‹DÙüGonµ8ôˆ/B÷¾ÿ‰ýgu[CðŒi¦Tp=EF™ÜÎ„¿þHœt©”Wø<ã¿ó¾öÜ›8fd0¢t«\"aPNyÝæ*x™A%uLXé`–C]HéJ\"º‡å»­MJy	ƒ¢µ{”î\n­¤U»¥}¥Dðq\"ì2Fg‹‘\0©àmsÖøŒ=[Rl4úáA`ížf¿oSH\Z$º¨ð€2+ÙÿÙîô»ÞÂ¹ÜêÙGAË£¨><UÒuûå¸L™Ÿê„H{°ÜUOÊ¯ËP—U¨sOË#âîe¬¼T(óy—\00‰·sÔc¤PÈNMi:ôi+%$Äfž&¿„¹~¬ÅÌIÂÐ`LÿZôFxé=io	#ÙÕ«ù,ã˜ÔVõa/y¤\"ô\n±ï‘ÿÁ<²øgQóü÷ÿq²¸>•ýa^Â#l\0ÛÛ”*‚*ÔŠk¨«§*mËÍDˆ¤ô^\Z^b&ÎýgÚût§Væ³0å+q‹3ÕJWÙ¦íö6“ó¦¤¯ŠÏ¡$Xy\rjmž7¯E­Î03‹ù‰/>äcë{BB±\Zýø[ÕVß}e„(÷Œ²Ž7¾a®ëbåŽ©r‡†¹GÎSšÀÒJX½{rx>,IŸ}ÜŸÜÚ#*=<Æuþ­0@Æ©<·#$T+‹]#c:¤Œ~óm¦È8Œ´kÕô„ZJâ5Àñ\"îW¶oÎór~ìjYý¢<\n“Víþï³‚P<ðK‰ç9/•Â´Øƒ.’Î<þh¤Ø¡MtÖk‹¸ÂVÔ qÏñœðÔu—¾@ÿí÷¥>û ¨ ;WÅ$ºy”ßË¸A«†RON¹b\rÝÇH@ÄxPÇÛ2tí@iÕpZç·£Ÿ=>J–‚µ„õ-ey¯ÓÊ~<©.j5—NgæãÂŒÛ·/m¤­„`0ýªiúÄØäl{þÛªC©1‹d¥‹3\0Ü.3[“q„\"O5In8¡KrºÞ\0&u¿1È=ÝL‹îWe{}èfË`HÈpO\0Q¨Qk¾¯È=%pDˆ:·ØÍ\0¢ˆY·§áû¼Ý{:R8V;€š}ÉÖ4(â“õiÆïf=¡âmg!®«±FGÐÐ&É)æ¸ò\ZX¼ÏúM$±,î&P%_Å)È\\XôË;þa}~‡îAH¶U¯Ê)\"MÓ^™¼Ö6>ÉPÃÞ×fÀ½X1Äñœœgj¿UŠa±ä¥È=&óiQgZ6“åìuIw\'+Ì¶FÚr§u¡Ääaî‹×‡„H5™R9OÁ˜-Q™ŒT÷A#åîÁŒ\"÷D^ª#ýÄ­=\r@>\"ñqHõ\\‰ÁU6q‰Hh–ÍöÛç¤ÉöåÊÝVU–Ðˆ5Ûeµ—~†ÄH±É\0¢°b=*-ï:Úc\ng®jQ\"\ZjŠ¤U¼³ÿ†§ŠÜç…m\\\ZdK¸3Â•?Jw¶0rísÎØ,ý/_&åÄlãÓ)?7‡_1ôWŒåþKA%)Êä\\öRT^NG™\'òZuî•|Vt/+ïíæ¨mI@å7f1@G|°›s¨¢»“\"¶¨³S´^E‚!nG’³-ÉmÑu3÷FKK;<é¯\r”Tcˆ‘£ÀÐ,¿·Ý6ôoAkœf”rÐÜ­¢ÈHŸ’ü‹ÿ—×u\rcs=‡ÒžŒ=¢p\0qO¿â5–Ûît=ÜXl\n û~ë@Ž«|¸Sw¤è¿R»r=’ûº[Ûbg¯ÿg1æ«ìè™‘D//‰Û’•K~¡þP},!9ôgÛl°‹¸m8K„nq}°çé£\0âq®›-‹Çª×l‹*™»|[B5ý7²~)°U¬öõ$¿„âñx<K× Aƒ\r\Z4üO€¡‡@ƒ\r\Z4hÐ]ƒ\r\Z4hÐ º\r\Z4hÐ A#t\r\Z4hÐ AƒFè\Z4hÐ AƒFè\Z4hÐ AƒÐ5hÐ Aƒ\r\Z¡kÐ Aƒ\r\Z4B× Aƒ\r\Z4B× Aƒ\r\Z4h„®Aƒ\r\Z4hÐ]ƒ\r\Z4hÐ º\r\Z4hÐ º\r\Z4hÐ A#t\r\Z4hÐ AƒFè\Z4hÐ AƒÐ5hÐ AƒÐ5hÐ Aƒ\r\Z¡kÐ Aƒ\r\Z4B× Aƒ\r\Z4h„®Aƒ\r\Z4h„®Aƒ\r\Z4hÐ]ƒ\r\Z4hÐ º\r\Z4hÐ A#t\r\Z4hÐ A#t\r\Z4hÐ AƒFè\Z4hÐ AƒÐ5hÐ Aƒ\rYÃÿ\0Œ>\0¹%JK´\0\0\0\0IEND®B`‚','logo_loginpage.png',26727,'image/png','WiFonic HotSpot Admin v3.0, a secured way to internet','<p><span style=\"text-decoration: underline;\"><strong>Terms of Service:</strong></span></p><p><b>Proper Use</b></p><p>You may use the technology provided to you by this service for the sole\r\n                                purpose of using the service as described here. You must immediately\r\n                                notify the WiFonic of any unauthorized use of the service or any other\r\n                                security breach. You may not use\r\n                                the service for any other reason, including reselling any aspect of\r\n                                the service. Other examples of improper activities include, without\r\n                                limitation:\r\n                                <ol><li>modifying, adapting, translating, or reverse engineering any portion of the service;</li><li>attempting to break security, access, tamper with or use any unauthorized\r\n                                areas of the service;</li><li>removing any copyright, trademark or other proprietary rights notices\r\n                                contained in or on the service;</li><li>authorizing any other adult over 18 to use the service;</li><li>assigning your log in name, password to any other person or computer unit;</li><li>attempting to collect or maintain any information about other users of the service (including usernames and/or email addresses) or other third parties for unauthorized purposes; </li><li>logging onto the service under false or fraudulent pretenses;</li><li>creating or transmitting unwanted electronic communications such as \"spam,\" or chain letters to other users or otherwise interfering with other user&#44;s enjoyment of the service;</li><li>transmitting content that falsely expresses or implies that it is sponsored or endorsed by WiFonic, that infringes, misappropriates or violates the intellectual property, publicity, privacy or other proprietary rights of any party, or that is defamatory, objectionable, unlawful or promotes or encourages illegal activity;</li><li>transmitting any viruses, worms, defects, Trojan Horses or other items of a destructive nature; or </li><li>using the service for any unlawful, harassing, abusive, criminal or fraudulent purpose. </li></ol></p><p>This service does not store the content of your online communications or the content of data transfers. Employees of WiFonic do not access the content of any communications or files users send or receive. We reserve, however, the right to monitor, intercept and disclose any transmissions over or using our facilities, and to provide user\r\n                                information, or use records, and other related information under certain circumstances (for example, in response to lawful process, orders, subpoenas, or warrants, or to protect our rights, users or property).</p><p><b>Changes to Terms of Service; Termination</b></p><p>We may modify or terminate the service and these Terms of Service and any accompanying policies, for any reason, and without notice, including the right to terminate with or without notice, without liability to you, any user or any third party. Please review these Terms of Service from time to time so that you will be apprised of any changes </p><p>We reserve the right to terminate your use of the service, for any reason, and without notice. Upon any such termination, any and all rights granted to you by WiFonic shall terminate. </p><p><b>Privacy Policy</b></p><p>You understand and agree that WiFonic may access, preserve, and disclose information if required to do so by law or in a good\r\n                                faith belief that such access preservation or disclosure is reasonably\r\n                                necessary to comply with legal process or protect the rights and property of WiFonic or the public.\r\n                                </p><p>WiFonic does not exercise control over sites that you may visit,\r\n                                or services that you may use, that are not affiliated with WiFonic. \r\n                                These other sites and services may place their own cookies or other\r\n                                files on your computer, collect data, or solicit personal information from\r\n                                you. You should read the privacy policies of these sites and services to\r\n                                learn how they handle your personal information.\r\n                                </p><p><b>Your Responsibilities</b></p><p>You understand that the service, which utilizes wireless technologies,\r\n                                is not inherently secure and that wireless communications can be intercepted\r\n                                by technology designed and intended for that purpose. While WiFonic uses\r\n                                commercially reasonable efforts to provide a secure\r\n                                service, we cannot guarantee the effectiveness of our efforts. We will not\r\n                                be liable to you or any other party for any lack of security that may result\r\n                                from your use of the service.\r\n                                </p><p>You agree that you are responsible for providing security measures that are\r\n                                suited for your intended use of the service. For example, you shall\r\n                                take full responsibility for taking adequate measures to safeguard your data\r\n                                from loss. Also, other than the technology provided by WiFonic, you must\r\n                                provide all equipment, technology and software to use the service.\r\n                                </p><p><b>Content Disclaimer</b></p><p>WiFonic does not control and is not responsible for data,\r\n                                content, services, or products that you access or download through the \r\n                                service. We may, but are not obliged to, block data transmissions to\r\n                                protect WiFonic or the public.\r\n                                </p><p><b>Disclaimer of Warranties</b></p><p>WiFonic disclaims any and all responsibility or liability\r\n                                for the accuracy, content, completeness, legality, reliability, or\r\n                                operability or availability of information or material displayed in or\r\n                                accessible through the service. We disclaim any responsibility for\r\n                                the deletion, failure to store, misdelivery, or untimely delivery of any\r\n                                information or material. We disclaim any responsibility for any harm\r\n                                resulting from downloading or accessing any information or material on the\r\n                                Internet through the service.\r\n                                </p><p>THE SERVICE, AND ALL MATERIALS, INFORMATION, PRODUCTS AND SERVICES\r\n                                INCLUDED IN THE  SERVICE ARE PROVIDED \"AS IS,\" WITH NO WARRANTIES\r\n                                WHATSOEVER. WIFONIC AND ITS SUPPLIERS AND THEIR LICENSORS EXPRESSLY\r\n                                DISCLAIM TO THE FULLEST EXTENT PERMITTED BY LAW ALL EXPRESS, IMPLIED, AND\r\n                                STATUTORY WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE WARRANTIES OF\r\n                                MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT OF\r\n                                PROPRIETARY RIGHTS. WIFONIC AND ITS SUPPLIERS AND THEIR LICENSORS\r\n                                DISCLAIM ANY WARRANTIES REGARDING THE SECURITY, RELIABILITY, TIMELINESS, AND\r\n                                PERFORMANCE OF THE SERVICE. \r\n                                </p><p>YOU UNDERSTAND AND AGREE THAT (A) THE  SERVICE WILL NOT BE UNINTERRUPTED\r\n                                OR ERROR-FREE, (B) THERE IS NO WARRANTY OR GUARANTEE THAT THE SERVICE\r\n                                WILL OPERATE AT ANY MINIMUM DATA TRANSFER SPEED (C) WIFONIC\r\n                                HAS NO CONTROL OVER THIRD PARTY NETWORKS OR SITES YOU MAY ACCESS IN THE\r\n                                COURSE OF YOUR USE OF THE SERVICE, AND (D) YOU DOWNLOAD OR OTHERWISE\r\n                                OBTAIN MATERIAL OR DATA THROUGH THE USE OF THE SERVICE AT YOUR OWN\r\n                                DISCRETION AND RISK AND THAT YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGES\r\n                                TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF\r\n                                SUCH MATERIAL OR DATA.\r\n                                </p>\r\n                                <p><b>Limitation of Liability</b></p><p>UNDER NO CIRCUMSTANCES SHALL WIFONIC, ITS SUPPLIERS OR THEIR\r\n                                LICENSORS BE LIABLE TO YOU, ANY USER, OR ANY THIRD PARTY ON ACCOUNT OF YOUR\r\n                                OR THAT PARTY&#44;S USE OR MISUSE OF OR RELIANCE ON THE  SERVICE ARISING\r\n                                FROM ANY CLAIM RELATING TO THIS AGREEMENT OR THE SUBJECT MATTER HEREOF. SUCH\r\n                                LIMITATION OF LIABILITY SHALL APPLY TO PREVENT RECOVERY OF DIRECT, INDIRECT,\r\n                                INCIDENTAL, CONSEQUENTIAL, SPECIAL, EXEMPLARY, AND PUNITIVE DAMAGES WHETHER\r\n                                SUCH CLAIM IS BASED ON WARRANTY, CONTRACT, TORT (INCLUDING NEGLIGENCE), OR\r\n                                OTHERWISE, (EVEN IF WIFONIC, ITS SUPPLIERS OR THEIR LICENSORS\r\n                                HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES). SUCH LIMITATION OF\r\n                                LIABILITY SHALL APPLY WHETHER THE DAMAGES ARISE FROM USE OR MISUSE OF AND\r\n                                RELIANCE ON THE  SERVICE, FROM INABILITY TO USE THE  SERVICE, OR\r\n                                FROM THE INTERRUPTION, SUSPENSION, OR TERMINATION OF THE  SERVICE\r\n                                (INCLUDING SUCH DAMAGES INCURRED BY THIRD PARTIES). THIS LIMITATION SHALL\r\n                                ALSO APPLY WITH RESPECT TO DAMAGES INCURRED BY REASON OF OTHER SERVICES OR\r\n                                GOODS RECEIVED THROUGH OR ADVERTISED ON THE  SERVICE OR RECEIVED THROUGH\r\n                                ANY LINKS PROVIDED IN THE  SERVICE, AS WELL AS BY REASON OF ANY\r\n                                INFORMATION OR ADVICE RECEIVED THROUGH OR ADVERTISED ON THE  SERVICE OR\r\n                                RECEIVED THROUGH ANY LINKS PROVIDED IN THE  SERVICE. THIS LIMITATION\r\n                                SHALL ALSO APPLY, WITHOUT LIMITATION, TO THE COSTS OF PROCUREMENT OF\r\n                                SUBSTITUTE GOODS OR SERVICES, LOST PROFITS, OR LOST DATA. SUCH LIMITATION\r\n                                SHALL FURTHER APPLY WITH RESPECT TO THE PERFORMANCE OR NON-PERFORMANCE OF\r\n                                THE  SERVICE OR ANY INFORMATION OR MERCHANDISE THAT APPEARS ON, OR IS\r\n                                LINKED OR RELATED IN ANY WAY TO, THE  SERVICE. SUCH LIMITATION SHALL\r\n                                APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY\r\n                                AND TO THE FULLEST EXTENT PERMITTED BY LAW.\r\n                                </p>\r\n                                <p>Without limiting the foregoing, under no circumstances shall \r\n                                WiFonic, its suppliers or their licensors be held liable for any delay or\r\n                                failure in performance resulting directly or indirectly from acts of nature,\r\n                                forces, or causes beyond its reasonable control, including, without\r\n                                limitation, Internet failures, computer equipment failures,\r\n                                telecommunication equipment failures, other equipment failures, electrical      \r\n                                power failures, strikes, labor disputes, riots, insurrections, civil\r\n                                disturbances, shortages of labor or materials, fires, floods, storms,\r\n                                explosions, acts of God, war, governmental actions, orders of domestic or\r\n                                foreign courts or tribunals, non-performance of third parties, or loss of or\r\n                                fluctuations in heat, light, or air conditioning.\r\n                                </p><p><b>Indemnity</b></p><p>You agree to hold harmless and indemnify WiFonic, its suppliers\r\n                                and licensors from and against any third party claim arising from or in any\r\n                                way related to your use of the service, including any liability or\r\n                                expense arising from all claims, losses, damages (actual and consequential),\r\n                                suits, judgments, litigation costs and attorneys&#44; fees, of every kind and\r\n                                nature. </p></div>\r\n                            ','Welcome to WiFonic HotSpot service','1','ÿØÿà\0JFIF\0\0\0d\0d\0\0ÿì\0Ducky\0\0\0\0\0P\0\0ÿî\0&Adobe\0dÀ\0\0\0\0\n\r\0\0W\0\0iÍ\0\0ÁV\0jWÿÛ\0„\0		\n\n				\r	\rÿÂ\0v8\0ÿÄ\0å\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\01 0!A23@P`\"4B#Cp$D 5€E\0	\0\0\0!1q 0AQa2@‘\"rP±`¡ÁRb3sðÑB#‚²áñCScƒ4\0\0\0\0\0\0\0\0\0\0\0\0\0Ð \0\0\0\0\0!1AQ aq±0‘¡Á@ðÑPáñ`p€ÿÚ\0\0\0\0þÍ’u*Ôk7šV™º-ÆÒèi.ƒc(c\npÄ1ŒcD¢*AJ\0„\0 \0€\0\0\0\0¡Ò 1Ž™C\0@B$š‘\0\0)Œ„¨‘\0(ˆ@A@@\0¢RÒ…I$UEH“\råXàW›;Î˜Ú±¥MF³xÒ©³ItÍÒ´£SC@”1€†‚¡ˆˆ@!*	B‚%P\0C\0\0\0\01€Á¢@\0ZÆŒ@I1*@1\0XJ!hR†\0\0‰¤’M$šDœûÈ0–¥fñ¢–³yÔÙyÐ\0•4ªÍ“—·+—XÚ]ãYw]¡ˆ\0!\0„!\0”AP\0C€@AT1£¦1$’H€\0@B$ˆ\0C\0\0\0†\0ˆ`ˆ`ˆU)$Ô¢©0ÖXÉš¨t†BóBå‘j^4!U*8{q(\0DQ¬o.¦òíK¬¶H„H‰Y€@\n\0\00¢\np\0T4¡Œ +$ˆ\0¤¡D €\0\0\0‚–¨\0\0\0\0Q\0Ä0¬\0T’R’E!YË¬•R’¸Ó:å¥gE›sÞ]3®+šÏYÒRZJÍÏO;ÑÁˆ\0\0$\0qSZMj1eÅ­Ëp¡Êdè†\00§\0ÊÔeU”PÐ¡\0@‚\0¢\n@ˆ\0\0\0CD ÀBŒC‘Y$T¤Š‘Ç¼±ÃPÛ\ZËxª¼nužŽ=0ébó¤	r£|Ütó=>v BF tc£—R¢i\\¡*²£YwÆ´—(cJ ¢\nÑ”^”•V!Š\npÆ1«K !,“\0D\0±(\0‰D@\0\0\0\0\0\0\0\0\0B¤I6A5(‰®=åÅ))s·=ãÓ\ZÊæ£xéá×Ê¹×\ZsQsrµèÅÊ¼¯_™Â \0	\0$dŒÓ\ZèÇK‹/65\'QæÍ…$ß–î\ZÕ—H…\0Àª`ÊÒŠ(£DÁS,Œ8\0\0 D\0€¦!€€\0Ä\n  \0 ¨ƒ JMII5$§ã*	Mgn{Ç¦vÈšž˜éáÛeë:ãU5–³¦mWW=ÄxÞß-)%Q·=ôséqVT¡©±QsÕ\0\0è)\0\"•QE\Ziv\\1¨(\nhÕˆ`Q\0¨‘P!(@\n\"\0\n\0\0LU(t†\0\0€\0š’I²	©I¤œZRŠµ¹ôË¦6Í%ž˜êóöÇyzÎ¸ÕMc¬ë›Vvré2øþï E42ÑréÑéŽW³©6E9wÅÒ€„\"@¢ªÊóA•TPéÅS1€±ˆH!\0b\0!h\Z\0„2F¢1\0•¢\0V\"QR‘RM’*áÖ\\µ	N˜×—L·¥&£§>Ï?l7—fØÕMc¬é\Zœº¸ò>‡†j)A\"*L¶LQ¯.»séw-HÍE„eÓ:sÝgMC I#Rå¨¸ueYUEe‚ÐÀp\0ÀPT€’@T¢Œ\0\0\0A@\n•ˆ\00@\0\"jII©²	&É8u*”Þ6çÓç|ÑsëË·ËßŸyz›ãUá¼í]Ü:]yKçÊçb«&Y,´%y®øvÓŸG¨@09yúgn{y´$\0@*H\r\\2¢âŠ*®¨¢‘Õ-C§jÇ\0\0¡RD!R@T€@‚‚JÀ‘€€b\0\0\0B€Ä¨VA	$Y(ªN*W`±Óºc¼ïŠ.}yöy»ã¼šÎØÖ™Þ\Zš¥¯£Ç¦¶y?WæBåJYK™¥—c‡›QY¯‡gÇ¼ï$V¨qÏ¼ïÏo:h\0*!jDâå¨¢Ê²ê©”PÊ)\\1”8\0!MˆAI#\0)  Ñ(\0DARºPÀ*HH©³!$RI85/5ÔªéùôÇXèÍKn]þOG?L½gljó¼u5OO—NŽ™¿³ð|öÔÑ¬yÜý1:“}gms%ÎZ”Æ§ÍèŸ7£.™¨’Çš†¸o;sÛÍp\0‚B°´ÅËIEÙuTÊ(e-9h¤R´!TˆŠš”€H` \0\0Qt\n\0¥\0\0C5$$TY	\"³„¸U*ºc~]2ÞwÈšÃ·GËéçÞ\rÍqtÎñ³Si}n}7éŽÏ¯ð¼½iÊo——J”Í£§YëßŒë‚ÏK7ªòz¼¿·›¦tÍ‹4	d©qÖuçºÍ Thˆ8eEÅ-ÙzRZÕ4e-9m*V\0’	©&¥%v%\0†€dŒ	(@1\0†$š„Š„ÎÈ&’qV™NÓ,ôÎü÷:Á5n^—ÑÏ¼½ã\\nó¼nt­ó}~}:zóõ>ŸÈñ÷”^¹ùS¹:³mgºòéÎüýgÑÎ¼û/Éìñü~Îãlë;4nf‹Ž¦˜ÕbÔU` „ŠEKRYuUvZ»(qTÖ¢¥Õ*RÉ6I*”T”@AHA‰Z \Z%1`!ˆbd’Mf“Y¢¬ÎDÒYÜÎUÓòé6i#oÜ}/§\rdÞ7Î¯ÆË³|ß[ìëwè|Ï¦2¹×\\üùÛ¢NY¶›5è¹õã¯•×©Ë¯—Ó–ÞOgÎù}^~ñ¾7•šÊã*Ò\\lÓ\Z¬Ú€B¡M\0T*[’‹«ª«J¦PÕ–T\\i+†\n’H²	©¤!P’1P!\0„`¢ \0\0\0JÑ\0¢@#;&¡%TE‘b©8ÓXÏlå]1¿.ŠËG7^>‡›ÓŽ²oãZg¦77fù×«Ï~‡n~ç¿çx½yAzåÁ:ôÉË7°/©3×Ï·•Û‡§Ë·—×‡G“ÛòþG™¼oÏ¦W:Êšæóêii‹P\"¤¢ ¤T*[’*¬º¥«(pÖè‹*5Š–¢•	3&È&‘4…IJ\"íH(ˆ\0$ªA*`\0• Eeg5yÚšËÛ”Ô¢®4Ú\\·3•tÆÜú	ISxõåèù}Ý3ZÆøÖØé…šYÑzù×_N~ï¿çøÝy­çåÝuG,×D±©êftóíçuáèóíæuáÕåö|¯—ÓåïséŽ³®j¨4ÍçÔÓ:Óá\0\nÔT’¥`\\T]YZ–UXÊ\ZÔPÊ‹‹–á$Ô$’*Š*A#IV‰Kb \0‚œ!Ñ$‘fvq×“/£™$Ø«•6—Ìå:c^]\n¦\\Þ]yz_G>ó{ÎøÖ¸ÞkgN5ëæôuÇ»ô>w‘¾itß?5®¨æšÞ\\µ=\\Îœuóºqô¹wózðìòû>SËèówšÆùõ³¥dF‹Ïf¹ÕâÔ1\0•!j@T•^•e”]PÆµTQQKPá’+%REf±dY%Œ*	#¤%vH‘¢•Ø(\0‚°‡J\ndÃ„#+3³š¼í4ŽÜUb¥g\"m.;ÎsFó¦6ÆÍMå×—¡æôsï7s´»óéÏf¶tã^Ì½ÛÇ£èóòïž}yÇo7w×—<Öía¬z¹½8éçôãérïæõáÛåö|¯—Ñæï&7Ï©®j\"Í3pÔÓ\Z¬Ý …NY HQ`T\\]]]”RÝŒ¢•Å\\5¨c„\"jLëŠ¼¾™êæºë\0R&RÄH…d¨‘%¤ –Ñ­Ña(\0 ˆ&Ì¬Â¼Í5ÍíÊlšVsI±‡Ižto7ÞEÍMå×—¡æôsë7¼ítc|õ­ÏV5ô–{ý|öâûü>^¯T˜Ml¸k>¶/Fzyý8ú\\»ù½xwù=Ÿ+æôyºÊçÓ›y×6ij^uxÕÈX• *\0p¨¸²´Ò©.™E+.qqKqEJ’Rk#WÉéž¬M¡# ’jR+5ƒ;dB$I\"€E&†‰¢Ù¡A!U•™\'siú+&•œ²n¸nf=JÎ´Î•Ã›Ï§.ÿ\0?£\rfõ³®ž}9µ6gØÎþ³¯\rYcCN^˜ùßo“ªNv»ó|ýçÖÍèÇNœ}.]üÎ¼=\'³å<¾Ÿ;xž}9w¥Qka©yµ›¤(iL×Q­¥U\rj(²â¥²£E!ˆDÙ™Ç§“¼õEÇU0ª$UUU‚äBÁ$’H…$ŠQRl›-ÅšCê#;3³Ž§S–k¿b¥g2m/?Lç+Ô¬ë\\ÙÖo:Žœû¼ÞŽ~™»³®®}9uìûNzìéÍŽÆ_¯Ë‡>Kèfù{Ï¯‹¾:ðõáèòïæõáèy=Ÿ-åôù»Æ|úrtÆØÒ¨Mq¬w+6³u‚„P€‹Š/JK«ª(eKEÅ-—-C\0$ƒ:ÈËyð·:2Ôê(\0UIéo\nÞIy¦±3\\É ’Eˆ!($\0UIÑf¹¶hPÄÖiqUêyëßÎ»&Šç™Õxûs‰­Åk›:Î™ÒëÏ»Ëèæé—s¦o_>¼»Ï»›ôº\\ÝŽÀtyòþ‡ÎÊ»³|Íç×ÅÛ=8zqôùwó:ðô<žÏ˜òz|ž˜ÏŸN^˜Û\ZVEmÏXn^mfê!\0€@   QqeVš”UXÆ\\´lv!5FY¤1ª%32¬7œÛ\\Íåé«W~ñîôçÉrËÇ5Ë5šæA$ÄÒ’@P”¤€\0”Mnv5‹Š¶‘‹3³‰uÔó—»«*æ™Ã®8ºãI~ç\rÊ•—5>{æ¯\rsÎºùtÃ¦~Ã–÷³B¬eX+0õy¼ÿ\0O—·7ÎÞ}Œ]³Ó‡§GŸo;§ÿ\0\'³ç¼žŸ®#—N^™Ût”×žðé‹Î¯7H@!\0‚8jQU¥”UY@\\Yîë>¾ù9%|üuò¹vcŒ¬ÈÛ¦>oAžŒë¤´uïuçëoó\\’òç\\’òÍ`¹AÄ‚\"E(+\0À\0«-5*(`“Qg\"í©çÍvehT×±æ÷æÍ#î°ÜéŽƒ®ºBìøïÍå×~}=çÙÊÊ­—K*ætVi©Ëëñ\ZÇ§¯›¦uÇÓ—>Ü;åÝåõx^?_‰ÓóéÍÓ\ZãsdÙ·=á¼Ü<ïY\0$\0T€HÁ\\—Yv^”QEGÔuäà\Zg5ãñï” ŒÌ«$èÞ~ws¯|ú³zŽÍOSyÑ2^lÜ–kž^yq\\É3&$ITˆ\0\0hS)‚+»9%êËK\n“ÆïÇ›Ë÷\ZÏFšÙw=&Ò»<~{ò¸uáçÓn]yzæÓ£\ZêÆû:rö7œý~NnüÆ3}r`ÖÑÍ©ëæéqôåßÏ·ùvù}^/ÙáïØß?Lk*g£–ñÜr¼Ý \n\"PÄµ\ZEFšQvQuC*>†Îíd€Dç\\ØßŸ4f`EdšîxÏÓ¦ÖiJÆ\"LWr1—%È‚	ˆ\"„$J áŒ\0tÄ \n,I˜ëš:rÕ*ð=<UuGÛuÆ3ÐoZ³­sï;çê¼^¬1Ó§—^™£|ßS—HíÃ‡¯?S¿½^7¬ežr`ÖÉË©ìcZg|]8÷óíÅ¾]¾__‘âõx}3ÅóôÎ¸Õ¦z›sÚ±,ÅÈR‚…H@¢1‚Ô\\Q¡z”]QEÑîØÕA™s—Šk33ÎÈ3KÔñ:gÝ•šXPHìÎ\\Ì×39fÉ$˜‚DH‘*DŽ˜ÆQK+ g1Ñ\Z!Z\'Íú8•Gd}·LônifÚÎÅœ½9ønçƒÙ–wÛË¯Ÿ¼Í›æú<÷ÙßÏËèóôú|ùöáW9ç§T˜5ªséìbÞwÅ¾^>¼[çÛæõy>/WÏîpMe©ÛšFzÎ¸Ùf™¸Ë7%%$A@€pÀ©tŠ‹²êêêŠ(ú6„ªU$KŠñÆ2æH¬ŠgÛ¾-)N¤hT™Ä²@¬’I‰©„H‘\0Lc]Œ+R1$Ù0iÏÆ¨WmŸ%ß‹vÇÛo=;›jkfÉ\ZÎ\Zž›¾~/Zå×¿žø:e\ZåßuöáÅéóvú8Gnç<õê“Õ9ôõñy¹ôñ¹uèŒ5+ååÓ‡SGA¯Ÿ¶ž—-pêufå»Ê\0©\0‚ÂÔŠ4ŠŠ],º¢é©éj¢eb2ç/<¹!$P¾¯§ÏÎuÉ5Ï4\0Ñ	zµŽ9¬eßYŽjI¢&\0(t`1Œ)Af‡§¼s/›š…XI´jtÙ½Ÿ!ß“vÇÚtÏn¥ë;ÙÑ,êEÏÍùû|çžï“ÙÙÏ§LMšfúY½=øpú<ýÝøOn5s–:u&\rhœúžÆ/\'>¿-Ã¶t¢šP¦½o\'£“sÛã¯#¤ìË8àÞP\n¬BÀ`9j5Š‹-oRêÆ2£.zxU¼>z<]9›¨73³2,Äƒë½¾^ÝdŽyp—Y­”3’5®LÙ1_;229¥ÖÊ²`†\\V!\Z×¡sKµ”4•ÌõõgY“äóÓÏÆ«	6—¢ç¶Å_#Û“¦vÇÙõÏn³µµ;2Ö>cÏßæyïè¼~Îž}8·‰«K¯ÑÃ‡·ßG	íÆ¬Ï:™çjã-çÖÅãÇO˜áÞbW2R9¯sÇéãé=Þ:ñzg·,ãËÞJBÖKš±…€E•‰k:Ó\ZÐ¨²ô²ªŠQÏU›¢óuz˜¾„tÜë¨$KÎ×5œõÏbÔûoo‘œA0*#5Ê1YN»4^,ÜFH„!šÒ(ØgŸšˆ-.¨ˆÅ~/=9ñ¤#¢7¹½D|ß~@ñö3Ù©½šY×:åÞ~k‡O˜ç¯wËêô8öáé‰K—ÒÍëïçàíÃ¯ÓÅuãvgŽLó®’å¬úø×5‡.¹ë<»x|ºóžRöæïwðéÅÒ}x]sÛ”ÇÓ3¬®œjâÍ\nF¬B ŠÎ^ußŸ~žZ¸³Jªº¡†i‹¡¤¼›{˜×{7eX™qk’¹,éïËê=>t\"\"HÌ#5ÊvvT˜K”d©Æ2€\0KÇ-ë;”ŒtÆAåž± LŒµ±ÖY¾¯ÎA^†_iÛÆÕµ¥¸×Éò¿5Ë¯¯Ã·³Ã·LHÏO³Ñçóºòëôp]øÒgŽLó.ÓYë¾uægyë—l·Ï§o—\\.k»šõüý<Þ“èøëÁé;â$ðúã>¸zãRieÅˆ’D¹˜¯.¯^zuyúk-Æ•UeSŠ4¦º¥ó5=nzïJ¦ŒU2¥Äã®ÿ\0_›ÛíÈ$’!Dª Ís‚šwÖQ™Œ¹\n*˜ÆJŽdìÒQE\0ˆ—~\'=pÍEXk¨¢eùßg˜¿/»é;\r«cQœš×ÈsŸ?Ç§£Ï¯Ñy»yÝr¤¥ôs{½o7¦:}üÎ|úõ\\òÍo.{Ç¯yYÜk—hß>ž=¼^]y7:ïÍÖkÒá×¦~ƒŽ¼.“¾L¥ð{òË¯71ljhXSˆ ‹s9×šÞÉ¾žwÅ¸º²êÆhk/L½øúžŸ=ú	EX+b\"°=oo—¿¯4\"bD%Ê!s&UÉŠç.fP†:¢’¨‰Y—lê²@ À‰ys¯‡0Í¢ã%îË[\Z(ù__R=¾ÿ\0s¬ê:ãyS_Þy\\>5ÛŽŸSåïæôÉ\ZÙ½¾?—Ó=øO£ƒ²9õê¸äšèÍÏyõs|Ìêl\\úÇGÞ/.ÜÉåÍwãZKêðëÉ¼ûœµãnz	óþž9o\ZLŒí%ÕÅ’-ˆå©ÝÛ6f÷ãÓlk\\®¬º²ÍeÚ7–—™jkÓ™±€R‰·3\Zú/w‹må’\"I„¼òÁ\0gŽórÁ„°@e%ZÑ“.ròšÍ(`\"eåÎþ\Zo›-%ÖX—Ñ.e&¾OÕçT\'voèÚvGI¼p7ñû×Ìbz¹žq¾wö^Nþnâ57—¿·?¦=-ã§¯=Œùôì¹&µGf§.uœ¹/=Ïy÷Íg˜×f5¼z\\:á©ís¾_IÙYóž®Ìú“<<‘kV²gU_I›ç¯‡u¶7¯é.‘¥h]k.²íj¾/L»au¢åA¢¤\"(Ôú†ˆ$Äˆ‰p—38ºÉ=}LåƒFj :¢†rÄ¼G£¬€*$¡«9×>wùû|òk.Òç/¥†ºÌÙ\'Éú¼òt~•XËñs§my<ÙzŒñÍi›ôü;qêTl¤}±L{6vë.Î,o{ÒH<ù¯;\Zá—ŠÌ7Šç¬+Îk£:Ý=/?^}Ïg–¼n¸Ù9:cÐéÇµ9“‚¸bªäJ‰©2=Èí_ž·ŽëYtç»ç­%Ö4”»¶¶šèÅÞ^\róçÑKÓ5ìå’òéÇg6ç«®^´ÏWN~·£€I0‰$™dÂ\\ÈYéY”°DI E:Qœ¹KÅg£`\0R5c³a~{­ófk-“/­ÎÖ²¬ƒäý~uÖ{³^$ÜšS–Œ“F3[¨ówówIq³Tåé•YÏ,Ò\reÜé¬ô§÷âã5¼vÆÖ\'4¸Û®[fóvç…‘c×Ð˜i\'—o\\Ž\nÉ–j+ÙËÍÕò­éšÒ4Îë\Z¼]3v—RÔI1®²ÔÕ/OLz9zÚçék˜\0U™KˆŠ‰£%ƒ1ÙÞg\"DÕ4bX—	x®}\ntáÓ‚ª\0–3¸ÎîøòÛ7U™}\\E¨¬“å=^t¼‘7KRôµ¼Ó³ÂòSM>ÓÅëówtJ¥®œ¼?_—uÓ7Íšá·Y~­kì:rùíO&°­‰Neƒ´íç¬zf5$ËÐÀ•I´!-|}Þzs­Î¯\ZxÕË¶YÝc»ÒvÜôÙÙsÛ¼z;ÇuÍTÂ  £8ÍQ	\"È€GUaTK.´.ÂTDqMasèSc¥Ï;iðmøù»æÚ‘êä¬›\"¾[Óç@jL´ÖËS]³PgsÉ®:gmŸ·ñúg»SizõŽÍgãzã»ŸOc7â÷Ÿ˜Ó¡~óŽ±9ÌSÍÞu(í—ÝÅ¨Åy%ò®u©ÖbÉDuæu³#JXHX¬—‰ª4^™}9}¨êNNíNÍd!DˆB\0U	!	D@ ÌD\Z”hjib8³¬¬Ø’ÀdËb¡àÍü>u¾m_JD+&¾cÓç4º·¬º®ÓY˜\\e®^—.š\'Õùû«Ÿ+:õ&»zcÌ³çûr¼ë¯:ò÷Ÿ>­}Y›:Hj&·Æúfús¨ŒìçÖ<Ís`²,”Ø÷ñ=ÖD›U­”»š[Î`tÙÙ©Óc \0@ !‘¤2IJQ@\0!\0\0€L:%»&YDjL´¡Ë”¼Õùözi%K¬zD³_7êó 4½3§KW*¢/<o\"jSé<¾äó—>­ç|^Üüžœús¯C\Zñu<Ëzs}¼Uo®v²ŠšÒ]%Ökb,à¹ä¸½ð	³®Ow9FD$ÛÙ‹]ËÒ5héŒ\0P€°•Uc²€@ I–D1Œ	‰T‰DcAT\0\0\0\0\0J…(L·N1Î”¸Käã3JJÍØµK+>c×å\0£iÓ¦j¥ék(Þâ¯/2¾Áéó»òÖo£7š¹ºç«:éÆ¸zó’³®}æó®üß+¯<§KV2‚c5—›\\ùuÌgÐ€V6|í Ôöó¯[:ô3«5MMM¬±Œ`\0 I*„\"@v]šY®¥ˆD‰Dc\0\0\0%S\0\01Ò\0€AD³*–evðc¦Qæç_=jÎjt\Z¶]…‚|¿¯ÊFó¦³Z.“]7—¹ðYéðíßÏ¬ì+V\nÄ\"Uæptòòë)ªˆ`\02ìèÍ™®%<½æ@ý4÷\n³)y¥ãÆ°Æ©tMJ4,¡€ÀB\0„²!D‰ieÓK²ê‡cVŒ¡•e¡€¨\0À`\0\0‘LH¥™b\\¦¹³®h™x¥ä—ÃÓ£›Ÿ¦|îü\\¤µ+_?¯tç®Š\'mçæë<ëèóïèóì+Ä%\n$IIÏs•ç¥ç†²Æcc—QS@ä:.ôæÞlÙÇ¼á¨¯•‰eL×š9q®\\ë<ÝV“SR†P‰d‰D%’\"	¥šVöos¶¦–Qe˜0\0\0\0\0\0$ˆˆ…Ï7¬³yåãÎ¹å×Yòs¬Ž·ç0éŸ\'ÕæJF 9ëlé¬pXŽÎ}û1Ü\"hD!!¦“\\»åž‘Ó/Nu(A²ë›ß\'JøÛÏÑbòføšuã{f£ÊïË—yØŽË$!	Qšrg\\¹¼™ÖXÕš\ZZ%\Z—JD)Z\nD€áS‡U£JÖË4²ìÖÍ,º½F\0’\0„\"DDa/<¸çYgXËÍ/,¸¬ù²çYc¥ç<ûÏ™êó6žjÍ¬€3ºo=sçV•-g¤‚*\0¡Ö:qÓÑåÓ¯/Ožü>¼Ü®Y³“§=%¼é¦z™Y¤½˜ÓN¬o¯ž¹Ï\'ÑÏ›xØŽ›%A¢ˆ‚D##’k—“:Ã:Ö4—K55,)BDÀ´2’Šª.(ª¨±Œ@4³MMu÷š¦\0€D’I„rç\\òã.Råc.’äe¬q¬™ã¦“<ûÏŸéó¶‰P× \Z—`t˜òûü·5ãï>uYEçO5¬Åvcy5èó×^^·¼{ÏÓž6Mˆ\0\n5—ÛãÓ³\Z›<½ÎÞ=94äëŽNœÃö+lJ„\0\0$@*$”å—“:åÎ°Å¬ëSCB‹JRÂ²‹)(c,¢†1Œ`€5:wŽž™ $D™ÆG<¼²óæã.sXËœ¹ËY†³Ægfs[âãÓ=¸ÓIKÏ`µ¢QŒ³g¡/»Ï[Ë•Ÿ3Ó8#«ž÷ÆÙÏ¼Í™ë:ç^ß½×‰èáÕË·~oèáâï\0-ËsZæ«Ÿ£óõè«>s·/[‡nS\Záíý[¯\r¨\" ‰@\0\0D©\0‰093¬1®|êq«[4E–YE ¬cR1ˆcÀD­ÙßÛ–ÚˆFQ‚ãË‘„¸K”¸ÆRç4@²gg5œÚÏŸgNzËèóéŽóÇ¾mP€À\0ÑÌfÖuË1×Uç.Ÿ3×}—c¬€\\½œûrôáÕŽfQÉÓ<{m›ëŸ=×\nosêÇ]swÄîÑÇé<ýlgÛŸ¹Ë§4rGY:ŸuÛ—¼€„$•B@\"\0BPNiy³yæ±ÍÏ6ó®³ ØDŒÔ¤¥eÓ‘(\r	Ò=>Ü¯Yç—r3—#Æ\\—)b%A™Ç¼y1É¬ƒ=9`äÖY´T\0\0\0Û—d÷¹ïÉåÖf—n>LJM’–Aéóé1Ô\\&¯7·ž»«‹5Æñ×gqÒŸ\'ß—Öðìx^Ï9ÛŸ±}5Ü•	*	 	H(Œ‚ˆ€¦g.uÏ›Ï.yÑkÒnŽ¢kAS\0Ä0 ÀÌæ&ÎÞ˜“9d“(Ås‰P%c•eg›¬ù}yáb\0;‚¹’¥ÀC \0\03¸÷%âç¿G\ZãÇEtK¯nLóY–²#Y³ÔáÞ\rñ®N¼šz8è\n^èÔ³y.¬ù>Ü¾¯U‚@|w¿ËéôÈ#«\Zöñ}™t\0‘(‰P’T\0Jƒ\0hŠZF×,sg\\¸×>5¾uØ›Óå’YFg:yõ™zw:™®dÄˆj‡\0+‡.Uåï\'nH:lÔæ.0T\0\0\0PÆZ}7ÓNuÁ™ÖÙ½9¾Lø>Ž>=k*Nnœþ“ÏßL^¤ñ;óÆÏožýÞ\nò*¥ë—ÐfÌO·?¨ãÐ`¢5ÊÏŠöù½>Ù#CBó¯K\Zöq}\nÐ@!	¡\0„\0 \0AX  #…1•\\Qæóß?.k´UŽ’HNR*H8+3tí¨”¨D\'^~~ð€	\05Më©0T\0)5ª†Zï}ž,G7ærèå×7£.Ý½\rN>Ü~Q®¼^Ü¾Ÿ‡^¡\'‰×ž¹×vt€„áÓÚÍé€UP@¨¡æÞ~ÕÃØí˜Hb‚ÝäÓžý™}Œ»l ²•\0€B\0ADjÄ aLhÀc.V*å?æåÓ«7DƒœŠÌF `rÖb=D@AR%Apï>GLeb\0€\n:¬À¹pŒek®5ÓwÇ¯gZxÙßÏ¡.¹m›Õ§¡¹èë/|þzkåºòú]7ãÞzåíÍJc„\0\0\r@ÌíÏã»rõ{âDe+,Ôãç{ºHŠ;¹ëèeõŠD¡\"\0DˆQ\0Ð\"(¥b\"<³‹ÏÛª\\ÌÌzÔˆ‚DqÔ’j ¨ãÔò:c“Y` €\0›3(ÊY·ŸCY*Ò:yôìËºÏJÎ„ñó¿7—D·½:wjzZÏn±®³ò»ÇŸÏ§nm ÀpÀ`ŠXgƒêãò×=ýñB”Fl–Q®¦9½Z’o}o¹\0„!\0@\0Ä\0\0SÒ„3#ÉÎ¼ÿ\0?bµŒkÑÉFd©Ò \"T’c^7Lqë †\0$\0\0ÖÁi1•ßËª±j2£|k¢^£ºçÒMO=<þ[rÑy½Uß¹èjz\ZÆúÅês§Ïsß<¶1€å\0\n\0Â\Z°Ï—÷y¼,^ž¹×Q‘\ZY”ª0Æƒ·®w:Ãå¾›\'N»=.[öåôÒ©Œ@\0\0\0 ¬@€(²Ê$å>_‡ló«23\Zh³Ö†d)Ö\nÑÕåï~òÄ1\0 \0—eÆ*€îåÔ°±­æôâôÚžŠZyßŸË«Š#k{w==gÑÖ:7š±£¯ž¼Ìé­C(\0`(@0>\'èy¸¹Ú®¾ØRãšcŒs®­ç»Shñyë—\Zõºãƒ7³s—ž±Ž…ö³}Ã¾ÍJ ` \0\"\Zˆ”F \n4Ð°9žåÓÍçÒPPGY1ÊiJ&¶:Ñ×—¼yûÈ\"„1\0 \0Õ™Ë vóèìrÑ®5´llvYèYg™prë%F’ôYÕ¹èë>®³Ó¬ÕŒ³ƒ7çùíJ@2„$\0Ç¼ü§»ÏÇÇaÓÛ\ZçÆƒ}çZî³cƒÉå·^Ç\\y¹¾†ç“Ã}Î2Ý™c]’ûG¶zU0\"A@\0#B0<~}<^]$`#¤Ö8@b­¬ò÷;yC \0\0„\02‹–ó²ç\rf@ëÎ¯:q¬»ÅËríge–5áÆ¸ùîekQÐ½3èjzzÏV²ì”UAó<·Ï2†1B%#ÎëÏç}œy8m›uÎúˆ²¬Ôè4L%ñxî%»=NÙàÅë¯;ž©3”õ5³k¸õ¥öOFÊ°¨€€\0`:Pé‚3B+ð¸uÓ!6^ÃŠ Tž_^|Úˆ`2F!ˆb\0€¢Š;ùtÝQÍs‘eMT®6ÍÕj.]Î­N¤oŸž˜ÕÆ«ÝÓŽ§£¬têRUhëÄÅòyôeˆ!ˆC x~ž>G~|üvìÓs£rc}MK4¾O;ÍYêuÏ$ºG&,“(*À˜K¥—/£/¨žÍuÐ€*DPS€(F1”3#ÍÎ¾‡là«34:ŽSBkŠç‹¦2Ô\0\0C\0\0C( 4—\\Ü¬Ê®-uˆ[–³u%Ð¹v:lè°—\ZçÎª]š/Vç¡¬z\Z7,v\nÑ”ie×;Ë¡(P†!\0‰Êë7ÑÏ‹ ß¤»tY©@qæùüv¥žŸlãøÖyg*\0z™æ‡FòÎljì‰lô£Þ¯e*t†4cÀfgoÎðïœªÍLËN…ôròëÍÞxºc;€\0€0\0FhPF’éQ)†®w9Ø¼÷RÜºKq¬\\º:lŒåÆùó¤m\Z&º\ZvÜ÷êt¥X\0†QvieVgÎsß5B \"K G1æõÇ—×œÙÕ×0UtY¹™œ¾w-Fho\\õjg—=3)P\0ÁuÖz58¹m\0dÊuëÇ¬wÙD\ZHË,¢ŽI~sÏß(vt,=	yÏ›íË\r@ \0ÉÀ‘€Í¥iSZæÜPT$¯.ó•ÛË£[\"³t—UÒ7­¬K†.RÂÑÑ—FóÑ¹ÓgZtÙ RE(]”]šSÆÆ¼|k ÄÑ\n¤¹p³‹yàéŽ.™{ÏV§nš˜ãXâ€;=>ØÖ\\3ŽöÔÃ4\0ì×S}N|kÐ\0t 5ÔË4:R=[;+SBê“CBÄdr=çï†k­ŽÈóëgËéŒì\0\0\0b\0#ivÎ‚óuF\"k2²LìèçÑ­Æ™´\\ºÁV½©”e\nÊŽç£S«S¥6«JDYª: Ã/tÈêJ–,rÊM\\MTgUjqë<=±çôÏ6*\0õ=.¹Ö¹yß?ž·ÔÃ4\0Z™æáŠ\0\0\0jcš\0Àë=dõk¦Í‹,¡.içWŸ¾9µeW•×žV\0\0\0\0\0\0ŠóºšiyºÆ¥ØÉ š„’)gT9n.]eÔÐÔ²sfY‰–†ºYÓ¹Ó¬õY¢QC\0ÊªARBÄr¯™mrgWˆDÕÆu¬ef²ãTrë>GLpêrj :zg»yÐò¹oÝ¬ÆP\0i¦ÌË\0\0\0fµ†hÀ\rÎË:N²H9‘;¸õ¼èNÎ.œÐ\0\0\0\0\0\0\0€×7líÊË£R†;$Y\"¬ÑM\\Qq¢ë\ZÖ…K9¹Êá€Ê­««yé³T Q\0Õ\0ÄAœ¸˜ËÍ,§¡ÕÄ‹¢5fI¡…iRŽMç‡yâëŽŽ™éÔ‰|®;FÖc(\01Ñ\0\0\0UÙ–h\0\nCà ¤DËÕ.™×>³€\0\0\0\0\0\0\0€ß:×\\oh1ˆ,Ì‹ U)5–uC†·ºÆ…çšC\Z´ªºßS{6²ÀB€tc$F+–lËYÖ•e®irÀÈ²e£4FuRåeÆ\Zi}ùeÛòñsÐkfR€\0\0\0\0\0\04ºÎP\0*\0\"‘“*\0À\0\0\0\0\0\0C*]³ª”*[“e´ÒR®(‹A5)5”´T®\ZÜZÜh–)¨‰V–µ!n–i©©­”1Be€†I”f¹æÎj\rM,Õ53(ÌkšF)k•—.v9U’Éß—™fr†–g(\0\0\0\0\0\0X(\0¥\0S…@Æ“(á€\0\0`\0\0!oÔ¡Qf±u¤2„2	¨I©%&‘”¬¡ÊÊ‹–‹,R¨VRXêëK.˜ ¨\"†0±\0@²Df±Š -M5ž‰rK342(Ê´—$ÐÊ®340³¦xõ$´…\0\0\0\0\0\0\0«¨\0\0t €()&P \0Ä1\0À\0Ti4â¥UqQ©E¨—)N&ÄI5$¢©Ç-5¨¢¢ÁT!Zá”U•Ue`%†‰…,Š&U\0\nÊÔÖÇ(‚È	›±c‰¢XÔ”àéœÀ\0\0\0\0\0\0\0\0(\0\0\01\0Ä\0*[Í¢\\´–´X„©%\"‚D+3”Ç+2–‡\0„\n%1ÕÀ¢1€BÌ\0L•\0›/SHÎ®\"Ê–*¢l©bœM•U*®Mãž€\0\0\0\0\0\0\0\0\0ˆ\0\0\0\0\0¡\0	€C$¸©¦\0\\2Ê*\n¨\0D*DdšˆÔŠCZ\0 VŒeP1¡hÂš1\0\nTHAD  ÀV*Ñè€B§UUN&ª1ÔÎÌé\0\0\0\0\0\0\0\0\0@\0\0\0\0\0P@\0\0\0QY À¥ijIJ%*(@ *	€U\0Àc”Œ\0`(`1Ð\0\0S\0\0!B€@@šv\\MT³eDÓ€TB¢8š¨Š’,š\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0¬C†PÀ`0†\0 „*\0IPh•À\00\0\0)# \0\0\0\0\0\0 Ò‚\01ˆb\0@§b¡$Š\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0pÁD£VPÀa\nœ*b\0D¢ ÄH\0\0%`\0i@\0\0@\0\Z\n\"\0PHà\0¤$Ó1\01@\0† R\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0À0\0\0\0\0CÄ\0 \0\n€\0`\0!€\0\0\0\0\0\0\0\0\0\0\0\0\0R€(\0\0B¦QQ\0QQ\nœ*\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0€\0P¨Â§!À*\n\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÚ\0\0Üj•UÉ)ò¡Nª{Ž…ºÐ¦æ¥wT(p*T«öŽk‡kš_,¨¯,O’bÊlWCµP¦â¥JîhPàT©ÇÚùóX,¹±œ–IpkV–áý‹‡öYý˜=¦k¶÷q*T©_YMŠcÀ©]Í\r\'¨©Wí”ØçÍš?QÏTàKuò\\Bò.‹Ê˜¼´fÐ®ÚebÊojT¯¦ª*Uî4³Iö•F¢¯ÜÞ7œrä,å‡#–·úxª‘Á^¸+ìùÑòÀ×\r§À¯¤©]Å¤¤JÄÔUûÃ³‘ˆYO7”rŽå¿X!./ÓúZàÐ×ººæ…9\ZŒÊ)¾©W·Fi)±5~û!Îd,£”ú¥Ó9§(§—.LyóæpßT©WµFi(´ÔUý\"$s™‹(ëŸD2´~»™®—ºŽP9Ë>|ÎY‹sR¥p©]ª\ZJ#R¯èdH‰îÇšé¶O®çD2´%Þ¨ô¢›u Hž«õó‰—GéT(Š\ZJn¨PûJ•E¢DHçp·›ÍtÛ\'Ü¹Û·•³ùnõG(îÍ\n-—	¹ü±êo§ô~Š³S*UQ_£Ø†@†wKcÍtZ\'Ü¹Û·•³ùouÃ%ƒÁì!\"†’…\n-—3™.çóG®ÞpÉt~§†@†wKY¼×E¢}Ë»}6æ½×”¸ie\n\rl,VVÉç>™w%Þ\\:­‹¡vþœ°o;Å¬åÔº-î]íÛé´5þ»}+*pº¸ÚŠc‚×BœãÔŒ5Nv´‘²ä¥\r\"µ6œZZ Oª]¹uË½¸uÀD{NHXC8u^-g.µÛ²\\îÝíÛé´5þ»}<¨^_u…Âk÷(5Á.0E¥û×Ña~Ýå÷Y_eå÷Þ_dÇÛ—\\û±îC¹ãÑe~ï1ao8u^-g.µÛ²\\îÝíÛé´5þ»}-øÒV2šûÒ¨×®0E¥ûÞAa~Õå÷Ù_·u}÷×í[.÷_j}SîÇ»äz£ÓßÓh˜°†qê¼ZÎ]Ïâ²\\îÝí[é³›ï_ëµÒ°òº¬å5÷[_}èð·\Z¸D²¿Ê‰a~ÍøýöcûW—ß~?³o;Ýïâ–sî.ì{‹ª=1íý6‹‚Â®»Å¬åÜþ+%ÞõÞÕ®›¾ýþ»9\"‡“Õa}³ÎßUî›dK]ï(ñû>Jûìv¯u_ìÛÎÿ\0ø¤\\ë]åÝ]qéoé9ËIY›®Ê\'šÂ®»Å¬ßqv¬—{×»Vºlfÿ\0#Èê±’ÃÉêñúg¾«Ù[#¾÷’XíyV{Ws½Ù·Ÿ‘Þþ9êþeÝýpéoé;ˆ¨¸½”O5„s]w‹YË¸»VK½ëÝ«]63‘äuxùs<ŒìtÌ·×{+yG8w|‚Çjÿ\0UžÕÜîö­çä÷—nYO?åþ_ä†Qè^ÕR¾Êñœ¨Pƒ£ÙEÌÖÏõÞ-g.âíY.÷¯v­tØÎ_‘äuxÇÅq\\.Z¹2åÌ·×{+y.¨÷<‚Çjÿ\0UžÕÜîv­õy]åÑ,§Ÿòÿ\0/òC(t/h¹VFN.¢ßjF¤kF´k5šÑ©\ZŠ•+¿•(Bi:°Ž®ñk9wjÉw½{µk¦Ærü\'«Ä·öì]ZHuÞÊßJësÈ,v¯ggµs;¨uy=åÑ,§Ÿòÿ\0/òC(t/h¸FšÅº©SŽî¬ÖT©R»§…Âœ{(¹Õ‚ÏõÝ-’î.Ý’çz÷jÏMŒçùµòÝTJ¥Jár:”:ïéQ_\Zëò«ÙÙí\\.öáÜòûÑè}3?—ù\\2‡G´L5²;…Í4 «5*Wup—mg²‹X#õÝ-î.Ý’çv÷jÆV3ŸäÛTÆ¥J•.B“¼C·Ïëò«ÙÙí\\.öãÝòûÑé}3?—ù\\2‡G´R©õj1”Ú²¢1ÑU¡:áR»O	ç>ÞÒ\'$äš4±®él—qtZ.÷nö¬åãçnÕ|„WnùÔ;?«È,v¯gkµp»Ûþ_/¿—Ó1÷—õÀ‡G«ŠÔþ‡Ár¿ÆšÚx®ÜóBÙ³ã»…T†1úMBxT®ÔóŸl[7\'…Xªf+vÙýk?¥`ë­7ÿ\0×ð_ënDò íÞ»Û²xê²ŽæôuF=¨?ÚýWË«ÙÚµ2÷Gòùøäú\'“î/ëo£ÕøÐáèÕn#ÚžqeDðdíx©cÆ?KR¸T©R¸K9ô1e‹tXG¨B…ùwz-5¹B?¼~ñûÇï\Z¦„î2³5HÔÍt\ZŠ„_íó¾YíÜ-væ\\èþ_7½ŸDò}Ïåýp!Óê­Ç\\–+„ã¥âÇŒ{3Î>-Óú—Åâ\\#âÄŠŒ¡±Èll~²¯bY29c9Uá¾t«Zñ«>F_ó.F^oå]_·i›¬®\\ù¯Ü¹ßÉ¢Ëzä¥[•¤r#×xitË=»…®Ü‹½µ×çwa“è—Lºÿ\0•õ[!Óê¬ÃLk³>+°»sÍK†³Q¬Ök5ŽF¡±û¶­wyˆE8Œ¿ù>_äÝíXU<hê•Åÿ\0/Íê·øñ…K¶îÚq·;j9ë¼G¶ºä;w3µÛ™w·üî»Y>‰ôË­÷_Uœà¸z›1Õ-¹mþ‰‘|+…J•5+ìLdrÂ*»;Ëˆ¶Y{òüÎýÿ\0ÇñøGÃ%ù~fví¬ü‡û¢9ë¼.Úèeü¬ð·>%®ÜË½¸gçuYkKœ.w%ß}V:­.\rpõŽ˜í±²¥v?MÂ/…J•+ìÌdrÁ*lxýèe‚ÁŒ»ù¾Dëäù]»}>&Oòü¬íô@ò{ŸÆ°]W…Ðº)~\'ÌÐ¼ÉÅ?*L—›rIy3EÙ;¢ûGÓn\\nuÜü?w×d—O§´âŸËåòÄùbkGÈ‘ æ>8Órðì¦Ÿ‡(’ñn¤í\\[Æ\'2QpÁZ¹\"VnAzxÂSkÃ™äY•‹#„ÏÝ·–Áp¹ÿ\0°¯ïy}éñ2ÿ\0·äç‹g“Ýþ5‚ê¼.…ÐËý2üGž\Z–ßßv5.þG;Ë]Sèõ’Ÿ‘r‰\ZM&ƒI¤¦åãÇM•ƒC·|1¨\ZbQ`àÛqLøíE¶Çnwñ\Z‹*Zðí\\Bñ®3ú“?«3ú²?©\"í·ié–1„¦GÄºËž5ÈKà¼Zéý[ÇõnŸÖº^ñkÃHQQG&îbÈ‘UÚñû°\\ÁaAû×åô.Ÿ§þß“œ:meä÷`º¯‹¡tK+Ý3üJ:´Ê2Œã…N$kªéò=Û]ÉôlPÒÍÐh4 ÒS|‹™ÁV*‰Bƒˆâ4Pdc®{¶2„U ‰A”)‡˜|u•¢§Ç†Dœ¨Š”“4\ZR)Œ-ÿ\0ÉØŽIÐÔjØñûéX,#ÿ\0Ñçä:Ù]Oý¿$·Ñk§Êî®ÚÁu_Ëô.—•î‹Ÿ‰Ãü+½Rüˆv<Žˆäÿ\0épò;å®ý®ôûx-º•Ørb{ª/*;=½¦††x±­íêUo‡µM«Ïí·•7\r#ÉïˆxG-¯¹”PHà}¤ò_ûçtx}?öü¢ßEžŸ+º»|…Õäeú#Òò½Ñsñ#Ù…{®_‘Ç‘ÑŸã]uW#ª7»¨·ß·ß¹Ú²Ý¼Ð·(HHò³±ÚÜI\ZßG­ï×Ý2…\n(P¦òûÂ,)±ãõÃ¥32†“As‚¶õy§ð./û^Yo·k§Éîÿ\0\ZÈ]^FK¢/+Ý»ŸŠ»/ð®õËò#øþGM³þµò}>O{”;Ðü›½¡‹!nQqh[”!^~?kpÏRÞöÊ¨÷ÍÑZ_næG™ÝŽHxEp¡M›P_jBB&’ó<­OÆuòEÛ]¿ÿ\0µååg·o§Éîÿ\0xT¯ÝädŸÙö·Âóý»ŸŒ»/ñ.õËòcøþODøÞ@é£Éî¬¡Þ_“{·‚·q®+s7Â6.\\Ží¤-ÂÇRˆ»“ËVÄÓÜ2Ú¤7bnŠÜtÃ}1*-Ì3¿‘B‚ËjÆpÉ	ù– _ógt“«ðø^‘£ÛðÇù^Zûlµ¢Úr<«rÛ^3¹ixIŸÒ¶ëZ¬¼{RQñlÆ²ZÀìÚjïkâ·bÔ¬ÿ\0ZÇ½ãD”—ö£øÞOLúþFkŒ/÷‘iþòü›ý’Õ‰Lq.G€±®,±oä¹ ¾©ºX|ŒW`;¨±vNáR¥J•*Gî–÷ª{üçºçå~DrCL£!–Õ’9yÿ\0¯nç•rô—›yÙà±ñŸîË8\nôRƒÒç›é¶xõù?Ø/¿ÆT±•U×\n+–ÏšÐï@~E´\\ó­F1óÒ„¼éi—‘p¶ßÍÄòz ’þåÛò;Ñ—Û©FçÍzåå5nÝ˜â5\'Ãmž7Ùnw(^»]Æ´ž\"½]‰­ÍcŸ	jÔc-qC½?&òžäË|™ÒÕ—î^Åž77öøÏwå~DD†‘AmÛ<7\\e9H\\êi©ÃN’Û¤ÞPÏúöÜmYùIYq¹vÌ­F½\"—ÉÜœErí>{ˆþÔíHþÔÏ›È¯H¡¢‘ŸM%ñ8Ëá¹ÆV¬?íÁÁ¿¦6ér¿±}ÖzšRnN¯p—ÊkÉÉÍÑ”(Ê2Œ£8”etÂåÖV¢Û‘¢E\r(Ò}È×u=Óä¹pÓu‘ñ<‹„?Ö2>EDûŠ²¦¤j>N?,\rq5&T®/xñšÞ±ågtÄykþLNlYíÇÄ…JQåÖ‘êyGª;¤î÷ïñ·aÐå~©ÛíÆÅË¥ë3²ÈÅÎV|6ßôüsúÖYñGOûÆ>2ó?ãJþ¯\Z~V»ŸÛš¾®ÍZ•ÙÈù­_kž¹½ºHøæÈ[Œ)‡Hš\"K+‘™F…·,»!Yòä/Êd×\\dÖÚ#âøðKw¦\'ÇãFƒK(Î%FP¡^+J•*We¢ïYËwçZvï#™­¸ãAHn‡9‹:2·(Ù¹#úq“^-£ú¾;!n×û~¯õêÅNÌOöW£9–§+W?¸ÇåÍÈ™ó3ÈajiAÜ,;Ÿ$îQü•Ç\"ì¢ÉõlÛj&³QYyû‡îºi¼iºRéû¥fj ïP“®1„äGÂòdGýeÁ¬úÛBð<b>=ˆzºÂ†”|høÍ34^)x¬±«5,oCTckI¤ÒSb»?ì#ªÆ‡VÚÁ*Ž¬Ð†q­Ì­ªÉ¿øþw±`åÁÜ”&®©Üv`ü»‡•77ft†²ûÕ„sLŽ¶FÅóãhøí‘Ð…¥\ZÛ*W±Úr\r=ˆ[ÇVíÇ\nšF¡:š&|w†gÂÅn&˜’ñìL^Š…cÆB…•ìÔ(P¡MçÜ}ØpÃŽ¤|‘/\\²­ãmqÛXD|âPåñÊá¡Ùi\\”n[œ2­ª“-]ø¦ôÜ‡õoWÉ³;Ggä·ý[Hò¡:TÐh~\\ÇvR52¬©©šÙ¬Ö)\"W(JðîlZµ¬W#ó£æ>Så ®L‘BÚ2Â»ª³[5³Z5ÄÔ½’›)±B…\ncL_¤£-¢pÑ*!DËrˆŒÉàæ\\¾¢ ër§“Æ6eûZÑ\'\\-ÝœìL¸åtŽ¨¦ÛjF4	ðeJ•5\ZŠ•5\nD¤TçŒü‘Ý›5È‡ËqÇÃ™n6m%Mb‘¬ÖW\n•Â¥Jîµ³å‘ó,E$÷ô(P¡OYQ’t5½eJšÑ©[(ÌÎ¢Š‰vûž¡B¯wC#Qtâq>ì8ŸqÄâq*Å$‘.¼*‡žëìAxß\r(p‹”;RGjf£Yò3ä5Æ¥JîhS\nÉ$Ï”ùQ®%wô(P¡OKRRÎ7\rD™>´\\IF¬Õ#ä‘ò3äÙFJÝdëDäå…«{ÝC‘ªWÓMe„òŽ[¬Ì•kI3D“àððÿ\0fƒµÙc„‘¨ÔkBš5\ZÍhÔT©R¸Ô®×†Åd|“>f+¨S‰__Q³PØÞ	>\rÔ}eÞÒ‹˜æ ›®I\ZÑò#ä>Så>V|¬ùYò³å>Sä‡2*®Mß\"æ­‡”2¨­Û#nÑkOö]ËïGMÖ™\n¸éf’ïV?ãî\\\"Çb#±!Û’ÃT‘ò\Z¢ÊšŠãB˜ðØá¸¡¤Òq+3\\Ï’GÊ|±5ÄÕIQÈr5*9VÜž¨¹Ó¹J„§\\(5L*Wj»8±E2àIiòoÅ8¢Œ éC[5Ÿ,’xGS&NÆˆØè.g…Ž7®1c±ØíÜ‰Z\ZÙ¬Öj5\ZEp¦~‡LuHùò\"©ïj9ŽC‘¨©QÈ®1·&#Iôî\"fPP©>·mÈVÕ?¥ªëá¥á¤ÐÏŸ¡4#ŸØ…R3h›,”¦JÔ œ™W·œãn¡8Ö(ÆN-šY¥–ø[ô-&;0cñÇjâ8£Q¬Öj*T®ê¥v«¹ShWâ¦£Xä9\r•*T®Ã+ö1ÏJN¸K-ÂÂ©MánÝH¥2^ZIÖ#x«œ>DjF¤WP…ÅÛTRâ¯w*Ës<«ÆŒÒÍÆZî¤$PñÕ/8a>¤ZízZÔüt;3CREMF³R+…1©]®%J•Æ»5ÅMÄÅ-‡!ÌÔj5EJ•Ú“á_²S©mñ%–áÅ5~E›Nú±gç»ä+U¿gF\ZÂBÒ£Î(•ô;ò%\'\'¨Œˆµvµ¢ZQGª†‘EH³ù:$|f™¡Z¸¼ªT•³á‘uJ±‰áù\nVýS„Xì@~0ü{‡ÅuzÉ\nè®DÕ¨©S‰Ä©]Ž%JíT©VV…»Ú“™¬Ôj5\Z‡#Q¨ÔWnEËšžÃË}ãx®ã¿q\\-ÒÅ›’©P—…‰ÅÁÔá…YÄç:‰B1©6ë.#\"ä>XÐÒ(\nÒ´P±ù{n5$õÜ£-y— [òm\\*Ÿ­ íAÆ€üi\räRhÖ+‚º…r%QL*Wb¸T®:ôŽU5Šå\rf³Y¨ÔjŠî;šINRÙ‹àòÙ¦âÕÈAù7¨[Tz›n.å¨y$¼[–Þ„ih«*sù&‰\'1p/V·øìÚ”­ÊÄ‘nãƒû$hFBh©RÇåî¬Ô¸„o]¶[óbFq—°¸¦;˜üd;YÀW˜®¦Tá…p­JáTk†ê94ÜŠ–åXÔ©R»¦Ë·ÒYí@y`÷(i4ž\'¨q¬©Aà„&§þ,­%ÄÐˆkK$FÉXDòää\\ž«8Y.XÖ:Åü­¸GŠ¤n\'ÇÉÙ¡B]+ºTäp¨ó\'U¹š“ö9xöäKÇœE6…p©R¥MF¡ºšŠ’Cce¹Q×wSQvö­Äs{šlPŒjÛJ:K˜¡„¨^ðapv¥lò;–\\T+p<ÕöøÐŒ¬ü0>$h˜ãy’³26î¢Ü\\q¢[YauþÚêo2£“‘ÑnõÈóKwáp¯±NÔfKÆh«‹E0|\n‰†Æ°Nw;Ñ‰)Ê{®X<hP¦ÂBDbDåsf$H“³¥ûR´_u•µ[zM%Û7.FÄ»{¬°ÏÏ*_¶IâÊ‰•ã9¹8ýS¨ø;^eØ–üËs*½‚£­.k¤&jŠÔexÖ¨­pªÆ9n%z\'vSÞrÁîR#.b„\"$E‡™þ¿Yk…½Æ{^ažÏ˜ð®ÃÆ<çRÙqÕÂ/LÝù-óâFäd½]v~Ø§UR¤˜ØŸÊ•6òÚ•ÈÀéK|ží!‰EÂ›dH‹–at¹Zev+±Ãg<2Ã<<‡Yx¦f¨°y¤\"6øÊZc©ÖÊ¬ÿ\0\\[‹‡Ÿrß›bb’eJúÉû\'SQ¨bÂY×…½™\\„Iù\rú7¸X\"$IÙDY-†”•ß¬2)±žÏ†fXfdd\\uÂ;5aÎ1p¹-L´©kŠ¸ø¤FåËe¿öD<«S5•õR<…÷l#”öažš‰;íúW¸X\"$XÙ=„\"$í]°¦J.Þ9a™–•Âµ+L3+…é~ÝÌVQGŠŽgLbé¤žc–¿r¿<‡“ne}C<¤gˆg)Æ$ü†Ê×Ñ¤P ñ¦+aCd¶Q$vçÜW-JÛ©–2Y•23+†cxV§“/²xÇ&‘D¦•uÂ9®•œúVrêÅPá¤ûÖÈ°d<»S5\'é¼Ž—²ˆ’TxPYÞîzHÎ(Õmš Çiíì-„!–Ê\"D[Ž»ã¸ˆ­JÓ\n¶dq+†epÌ­%ýÏâ±©¨¹*âŒ£ëá§žáF¤g8ón¢|YÐŸ£½ÒöP‹ˆ£8!±ÜHœµ?IBG\\‘ò*Ü!`Ç´ˆ‘Û®7¼h]$§m™™aS#2¸fTÌ¿oTœ%b±Kbob*­ôÇs8u=ÄcRR[\n¨‡™z¿:Ü…8¿Aw¥ì¬ûe!ÝC“~Š˜P¦4Þ!`Ç²„DŽæ¸N1¸®øò¶jEñ®œ\r¤4NË˜Ô øV\'12¨¨ØÞÅ¤3œú¡Õ¶‘Ën7.Z!ç‘ò­HÖ™R¥wSÉàŠDbFI/ÍÍú\ZÂ‚(SiD£MÚepx®„-š•Â¸W\n—¼sS©G…ÅáFÆQŽ¥(´ë\'ã[?©uSƒ‡I¤µ3På³lHg´‘À“Ü<crp!æ2¡!H©R¸×bd±U85¨•ê\'&ýŽ4(PâSA Ó¸¤\"Áì¡XT®ÕJ•*T»Ü\\m½Qf”p(‘MGƒi\n)HŠ½QeË6IøóŠá´±ºð†ÚÜËj7îD‡—7!!2¥J•*2åÍ%k…\nŸ*)¹?CJ”ÅCƒÃƒ2Þ-Šì¡112¥p®5*T©R¥p‘IAÆî¬8¼8²­Q&Î4«gŒ¤Û¦ääI\\ñ¨JÅØìCº²9oÖrÜ«—\"/.ê›!yñ?¾î¢^\\ØïÍ•cSQ+ƒuôIlÓ\nz´&&T©R¥J•*T©SQ¨ÔTl’©©¢±§pÂ¨Jƒ ¨‡˜øœß6Ýj\'ãÐph‚àK,ðYzèa:/‘Mú4·œ}BbeJ•*T©R¥J•*WÊãÅ¸Šê*V¥E›’8i\nƒ‘ÁgÚ:3ö¶ô²˜\\xþŸ@ý‘q)±OYR»*T©R¥JìTÔT©R¸T®*ãE\\Š²­º²®µbâU‰š„ÙQäè²‘\'W‡éúj¥J•*T©R¥J•Â¥J•+J•*Ñ«QÄu8Ž§ÔâUœN\'Ô«8·Ä|\\­2{¥\nmÓk\\+êjT®+…J•*T©R¥p®Þ¦!±\nœpUÁ`°UÁTpD•=÷\\+…p¯§®*W\n•*T©R¥J•*W\ZíÖ»§ƒÁã$ýö¸W\ná_WR¥JáR¥v+»®5ô.(Òýò¸WÙ*T®Û®â¥}(Së\nì×ÿ\0ÿÚ\0\0ÜÐ§øÿ\0…hP¡O­YÌå¶·t(P§ÕŒCÅ‹ÖSê5ƒ!`Ä,¨çÏa}<°dI,¢2^í-Ž_O,BÂBÊ#%‚ô,x/©É$,$,¢s˜òYzŠÈä1?ER¿F!’\"HG9(æó˜òô2ÁåÈ‘,ùóúy‘b9ÌY@ç1åÈ[ù`„råÉ’9óúqD‰&#œÅ”3ç1ä²þx!¹1’9óú~DˆÎbéÎcË’[+\n\Z(4\\ÁåÈcN¬dH1eÎbÊ9$!nÓ.bŽ\\˜Æ<ÞN!á\"D	œ¹ÌåœÇˆ•ÛCÚž(Yrcóçôü‰&rYÌåœÇˆà¶Ø¶g‚²ä1>OÈd	œ¹Ì]09ÌyŽm‘‡„°X,¹ry1çÏéù3—9‹¦9!Ám²#ð–’Ë“É7ŸÓ‹< LåÎgéÎcÈDsÛ\"1	`ŽhYry1æóú}(9s™ú`s˜ò‡!LRÚdF!á,Yry1æóúUî™ÊÅ—9‹¦9!lÅ×e‘‡„°X!eÉåÉ?§ÙÊ…—9‹¦9-¨ºl²#ð–,¹<†<þŸg(\\æ.˜ä<¶àöb1	`°B9<‰?h^éB˜3”	‹.sLsáb#ð–#“Èóö…¸KÚÖÝ0Ò5Rœ sžêaXË!`„räH–~­l=ÊÁì¥íkxò†‰B›T(PBÁbY#—\"CÏÚ4(SÛVÂF“I¡\Z\r‚Q Èa3ôÄ©îg¶V{ÈX!¹%Ÿ´/vŽÝÁÂgé†ÍÆ„!´°CØ–B„räHO­¹á“?Lp†sÎl¬ö%‰ÑË‘!ý>¶æPŽ9GyÌ†Ke`‰*jc4”(P¡Ë‘!ûTM&’›tõ´ß-¹ŒŽ9GyÌ†Ke`‰n‘Èý{Ý­ý\nÂ…\n)µB…\n(P¡O@¶ç„p‘Ê8[ÎyÃ-•‚%»äH{T(P¡B…\n)ê—»-¹à°‘Ê8C9Él¬ÄrÍç9bô\rzˆ{ì°æHå-ç2-•‚±g43œpä1‹ìÐ÷ºá<9’9GyÏ8d¶VbÅœÐÎpÁd<¡{Ä=Ô2÷¼‰`ð‘Éao;„2[hbË“ÍçCÁzé×¾¼9,!œÈK†³Y¨ÔÍEJ•*&W†¢§43œ6ô/s\\)‹Ü/~x2›(bÜT©Ä£4aÍçœ†Š\n>ž†“IL*T©\\hPÒi421ú•*T©Ã\r&“IB…\n)ƒ+…FsXsˆ½‚¸p(P¡CIO¡„sÂ´+MOSj˜R‚õô4š\r%=ÝúZ)‚mnW©¡¤Òh4”÷×èyÇn#Ù¦Å}}~…~‰1ãL*!³PqâSyOUR¥JýAä@‘B‚\Z©¤\\SÒÓb¾¦¥Jý&S|½E\nzª•+îH¡CI¤Ó»oÐ-õJš…º¡Bž²¥J•ög³÷Ï}LcµR¥Jì!â·Ô4”õõ*j*T¯­{1õµ*rOn…\nc¨©,W¢¡¤ÒSØjT¯®^…=ª•+´²Â›šà‰bŸ§¡¤§°Ô¯©¦ÐÓf…\nÚŽ+f¥J,e°½U\r%=‚¾–˜?I]Ý\r;5Ø©\\XòÅzú\ZM%=Z~‰ôï-Æ¢¸!b¶Þ[ˆaOa¡CI¤§¾½•3Q]šcròÜ-Š{-\r%=…/\\ž55lÇ¹{úöm>¹/d[¢Ž{šö]>ªž¢»ÚaÑCs]Š{+ôÔ)ïÐÜ¬^/Øß¥§ÐÈ[Ê‹\n{ôTöêze±]·‚ÅáO_/AOq§¢CÞ=Ív+ê¥¾§¥©__OAñ[ç¹§©{Õê«¼~†›øl-ÃÚ~Ä÷”©§¶¦W|±~ÙO}¦õ=òöê}¨ÔWeîW¡~žŸI&jÛX¼¡~…ìÓÑ×è=Ev/Ñ¿Bñ§ÓU5`½¢ŸO©`ÿ\0ÀÉÿ\0‚+ÿ\0„\'ÿÚ\0\0ÝWü¿ÂÕ+õ²ôõ*WêÅ‚Å€bÅ€bÅÞÑ¯ª^±‰ÎXGÑ¯ª^‘bs–¢[„rú}áDq‰ÎXD^Š;<Ä#—ÓìDIÃ”NrÂ\"9úâÎ|Ä#—Ô‰\"8<¢s‘Ê\"ÏÐÇcŸ1åõ\"HŽ(œärˆ³æ1&\'Ãb¢Ø™Q2³Ÿ1åõ\"HŽ(œærˆ³ÁŒ‰#–,ä‰Þx3Ÿ4!¾ DI9¼¢s™Ê\"ÏPD±X<X†D·žçÌXrú$DæòÎg(‹‘Íì±<)„69ó¾ B$DæòÎg(‹</c“,xGcŸ1aËê\"dNo(ærˆ³öÞLD°xÇ1aËê\"DNo(ærˆ³öù1ÁãÏ/¨‰9¼ s™Ê\"ÌcPàJ;˜‰xÇsËê\"DNo(ªg(‹2OfJ˜òb$!ãµ‚ÔDˆœÞQ9Ï‹=©*ì1ñÕHç\"\'7”sÂ\"ÍíÍaÉˆ‡ŠØxóÓõÁa\"\'>Q9Ï‹pÐóäÄHCÅg‹Åf/_ÃÑ×ÚÞÝpÔ&WŒð†êk!‹b9âðçÌBõaz\nû¼Ià¸ÝH‡³ñxsæ!{mJûJ•*j\"ê\"x@æðyZÊçSÙ–f9âñæ!}MlD°€º¤2YFU\'1ìË	lÇ<^<Åõ<K7„ò¶O7²ð–ÌsÚæ/©à&KœÞ2¶O7³,Š4áR¥Jì¡{TF¢»uÆ¥}N¢¾’9¼.elžoeàÅ½^Öökº©R¸T©R¥vªT©R¥J•+éâ!á›ÂæVÉæö^[ÕµR¦£QR¦¢¦¢¥~—ŽÂ9¼.elžoeàÄK>hG!¥°¶_²ËßVÂ9¼.elžoeàÄK>hG!¥°½ª^ú°X,2¶O7²ðb%Ÿ4#ŽRØ^Õ,ýï<VbæV‰õ=—ƒóæ„rÊ^ÜýõŽby[$¸é4šM%\n($5ÆœTJbŽRÚ~ª…\n•Ý?b+²Èj…\n8F­žRÙ¨ß¨©U\r%\nlÔÔH”½î›‰B›:F¢¦¢¥J•Á\nlÔ~É\\*jF³S÷å´°[Ë\nlP§¶U\Z‘¬ÖWè%°ö*T©R¯xýŠ¥MF£Q_y^‚˜Ëm±n(i)µCIOªžÝF°bE=Jîéè(Sè\nok‚ÂBØX5QaLVî¥w4õ4(SÝé¾o·ïn¥J•ßT¯«¡OreMLÔj5mÔ®1Žú¥G¾¡B›Ê•õ´)ìëeîÞÂXT©R¥J•*T©\\°CÛ¡M—°÷õ+ëèP¡Bž¹l½ÕvjT©R¥w4Ã›Æ›+±B‚Åú:•ö:õÏÐµµB…6¹™Þ,Z(SÒÔ©_b§©®ÓT©R»O³CI¤[×T©_`§§^ž›u*jÙ¡B›+cŸ±T©R¾­ûRÁÇq¤ ‰t·2öJ•+ïËeÄÒSj˜HbÜ­í}–¦¢¾Ã_]LhiÙ{µîÕõÍúu½{^‰î«ìÕõUöZaú9}_Z½†^ä½-~€~æ½}…okô:ôú\rû¢ßWÒÐ§¯¯ ~è·¯Ýë¿—º/f¯¶µïÕÿ\0)Ð§ø&…=¹zŠ}OlX×éªöªý>×ø!ÿ\0âÿÚ\0?&§ÿÚ\0?¯Ý\n³ÿÚ\0?Ò¼-é^Ò·Ó1«­‹¶T#Fð¶•¾—˜rF´.»ÊØy*°*´«Ë’£Ûçª¿Ò³ €NÕQåwOV‚ªÏ­m—xTp<þ\'oŠˆ˜aÍaÉyAØxUÞUdUZª\nÜ¯ðk«+|dhó‹`±F\'\0QEˆÝ^ñ—VVWøèÑçœ„¾qæ!Í<mÕ••þˆPzl¼£\0¹è>(x[ÂßBÄNæ¹Aé¾Å¨bŽ§hß]x[è€‰Â<×(97À˜±pNG;Qeh]^ú* QÂ#pƒ“`|81É=9Sþ‘¶Å;ŒQÂMVÓå¨ç´Á=;üSþ‘Ø;ì\"1GÛ&À¡MJT”Nà>k¦˜\n°çb˜†	éÉø§ý\Z5ìSðˆÅl›„ŠØ»ïhÿ\0²n%[ÐƒpEe`Ž)Èb™‚n	éË3ÿ\0£Ã@âš‚v)øE¸§{`ìP\\  ìSp0æíNý¿µ7¢²ðGåÍ3Äôå˜Ÿôxh;Ô±OÂ-Å;Ú‚v(hÅ7¹&ž)þÒû_jg¸ ›\"²ðNOE3Ääå˜žÑÑ ìSPNÅ? ÜS½¨\'b‚1äŽ)¼×$ÜVo°£û\'æ™îA6Ee§§\"²ÖZ(§§#ôSŠº‘¶­Ø¦ Š~A¾äïj	Ø¦èœSyÁ˜¬ïbÿ\0ôŸ˜L÷ ›\"™É=å–²àSÓ¾ŠÏZìSPNÅ? ÌS½¨\'b›‚ä„N(A¸¬ïb²ï˜L÷ šŠb)¼“× œ˜²àSÓ¾‹ïÕ¹5ìSðBÅ;Ú‚rnŸJ ’²ªjÎö¦~Ó¾a3Ý¢™‚)¼“× œ˜²àS°NøQ­ÅÃÀ]_Jþº×& Š~A˜§{PNMÁužZ\"\rYÞÕ—ûoù„Ït`Š“× œ˜²àS°Nø_«ávÖÔ“ðArLÅ;–[vJn<€[Gˆ´\Z³½¨?ü„Àæ™îj)˜\"‡$á½rNLYp(àðºòÕnø\0MÖNOÁÉ3ÜŽ\"¸é‡‹¦¬ìšo¸A°f¡œ˜²àQÁ;áO?t.zHÅo;þ5¬,bE;$ÌQÂÍ6¸êZ³ ÜD‚+ÊÜS1CrNñ²\nÊuÂJÊFúœìÍ>£égÍI¢CàlÓéáxT»’®Z -æ§ÖàQ6ü3\ZWK®1…5SÚÕÉsMÆœ„Jn)˜¡IÞ7¬í¶„öN~4Lî]Yµ?sà¬€Ón:—`q„ÆSœ]´ú_¢åú%~’‘bŸBì]‹µV‹;¤Ì.hb‚¦á¤1LÅ!É;Æ³n—\rFj+gšÿ\05RÐ½oêàš%ðR†–f#FQfS@ÿ\0e:¶Š§¦ã\n¥ùŽó)Ÿìpæ‹Ëœy¡R¨\nn	«7’æ†( ŠlDy¦!IØ£âø›ëŸ‡ÄòýÃQülGÍ;›Œe‚ËÁK‚é4˜]äƒb¦çL¸Z!1fò\\àE7Kšf)¸EØ£â¦l5æ‰åã¨þ0â>j{æ™îEMØŒ_¶!1fòˆ@£$Ý\'cö¦qU•‚ä‚~)ØŸ/?>&ÍGñ‡·æ‹Oø™k+ÜŒ	‘,¯lBbÍå§ÿ\0[WL\nÁtÈ*Iz•¶-Áe`›€MYžå™î>&n8.åu}só\rgé’ÿ\0[º†ç)Ðð]§OîîšõRo53õx‰5³^§†ýi§ªs¤´ç¢ÝGñ¹\'Åö¬¯r+š8&@à›‚Êöè1fòùÅ©ÿ\0ÖÔu•¼\n&{Bb~\'æ³}ÇÆî]äñ^·jòÇ	ùèYQ_¦\Z­	õ/UNÞ(–åµ¦Tâªñä§ÔÒ»gÍU…NÅQÍ]Ãë]áwZÍvŸ(É¢j²`âºG®—v+5±ló[<×bÿ\0g¨ýÐ¤¸AŒÜ\'ç¬iä[Ó–OŠæ¹&@à†+Ûš³y.pjÌþ¶£EjoVÁXèpUÜ²S0	‰øŸšÎÄ£§uuuuuutÜ5MgÞ:öÃ‚¡é\ZaÄL‹BªËrÁl­\Z•m€ÖrMÒù¬¼>ÃãGÉ6_¶!5fr‹SñûW\"†?jÈYÿ\0¶>ÅŸŠÉý¸3Þ²ý«!3\0˜î+?pñ£Ì5DýÑ®Àt‹º®`xë9!£RŽÀ›í?õ‡ñ±”+’l†+ÛöÄ&§òF\rOÇí\\ÇíY?öÇØ³ÖO²\r÷¬£øJÉ2¢ËúBbw¸¬ïëb8xÖ`²ðÕf2×7Àa«å¬8&á¤I4Úº¿¿ë®…rNÅrMƒ¿­©¸,¼>Ø„¹#§û—üJý«!gþØû~+\'öàßzg•üu—€Yx¬ÏzÍþ¶\'xÜ´ÍV$ë‹ù=ú¾ZÃ‚hÌ©,½œTÿ\0¾Pÿ\0È>Pv+’§&à²°ûbS¹#b³=ÁÅ7³ýƒìYë#öàßzËö¬€lv¦`²ñY¾äþIÑ˜—5\'	TÏ¤)õO[2æ:{jºCÁnÅMKG\rsFÝºùoRÕžXìÃ@ÿ\0´Ll	ÀQ“¢’<2Ýò‡1â†)Mt‹•—Õ/PL=r”þkõ\r8.ç·ÍTOšìú×bý5\"Ù„ñÓK®Ý…tÖ‹)ýréØVoâ`’ÏÅd~Üû‹.wéûVBg\0qYØ£€N‡QgÎÝ©­™³Œ·¨¯ÓTdï¨kws\0ífd.»—r¦›]R™&M¨º]6;(ÕÇÿ\0“‚ãû\Zº-Š=¡@íß²Jo4ap»Çšïošï[N\nþrFnoœ×¦ÛúU’J«?üÛ’g½3Ø²Sp	žå›3/RêØ&º\03&ˆuzŸç¬ž×™ª	©O–¢ ¯ü.ð®<á WwÔ»Ð=F‹¹^Rh$î]N£q[S¶Xkœ~èðë3qÖùyb@ÝÛPêqt­8H)ÍëäŸC\0›Š$7ï\\ºNä2ú¯¶K«¨;„—¥ƒÍÐ)ÅzšÃ—cWh]Q­\n}RÕœï5rq+¨²@Ø®jr2•×_øÎSYM\"¯íOËX&¿ïÅý—ðçþm\0}K9½Tcn²ø½3ƒP\0Ñ¶S&ªñvËœd59cðÂz™ô™+G¸®ò»á¹YÇ’ý28º‹ý™ƒˆjìê÷UI€3\0®‚´vËuÜ$¨àu„öžßîÐ\Zƒ¡Á	mº–ÝÊ©ø7pOÅ696bP›EêÛc\0Ð*WûGK%iÕv¸ù¯Ñ@t	©Ò=b~Gåÿ\0OTÓÑÚgÔ²3?._“²wY™í`ž`—IOÉÿ\0™••Õ3ù]©îéïMl»LÕ¥M;+»¼í:åÚTˆ‘Ý©ºôõ9~‰8…\\¦ŽkÖæ·	•ê{õ*eMUµ}¡[ë+¹Ãšîó]§þ+û¶è[À;Z_þ9µ\ZÃï„à\nrµÍ&ˆö™ñ_©\'éÛ’/vdÏø¡Ôùð¢˜EI«#½Rî7]Ã\0™–ÙÉ—\'Œ˜Û´ÍPI]w+ÍsMƒzZxŠöÐª\ZV©¾¥ÛõØ|Šý3äWéŸ\"¿Oê_¦|Šý?¨®Ï¨®Ï¨ª‰* wÇÒÂìý.Ÿu«1­úÕs¾¥\\Ç%P]‰^œ–ùxû»»œ<Šîów0ò*¬iÁßøUËwÔVÑËH7y¢¹W*å]^ÒžÜ³=vRµ%½e¸ô×}æ¦à@Ì.¯0v+¦LÎJû`ØÇúà¨Ò¬Wéôñ4^§·•~ÕROÔ¥%@î:«rãFM•ë=gÈ*0y*hÑvepªå½X/VK%ú\0ù¯ÿ\0žJŒhåðûhZ4T=Cxà®ž×¼z„¥®–ˆh¹M3Üº\0%³šûV^žÏò]&ÆÅ-óÿ\0Ù3¨Tì‰üÀÁ9HÍWùÁ‰¡/¥gK\0<\0]ÄœhªuóuºZ$MåzßÈ.ÕOu‰îÒÞ7)lÙ­œ)§zX\rÿ\0²èË¢l÷Ö\rÅ\Z¸Ü¬„ö)»Š¼d:Ñ¡ÒÊ5´\nêë¥“qà¿Û›ÑÀT¯Lœï¼j|=áP·*‹R7WÕufb2ÿ\0º þ­·_`†ýlã·GjÚ®Ui¦Ã/Ve\\WhVVT¢ß¡xZWøUt‰Jêð²¶”Õ¦TûŸ÷¶aÔîC^Ñ*¸iÿ\0_fŒÂ¬n¥ãûžåy«+Æþð¨VWø65‰ÕýÖ‹¹t°HmÞqŒÝå®¢©’¥@4@JRÐ1©’Ú»U{fT½.àº@éH¦«ªèdûòÕU ªQPÍU§uuP·+ø‹«ÂÊÑ¿iÝ1¢uSw&,-Â;ü¦¨%êï\Z[ãÜa ®wTä°ÒÉ¿-uDÕ(¨éâ»|–ìu÷ðWüG3¢u3Œ‚3Äj‰Ëô<lØ¿+*¹mîÞ;ô¯¡ê®\nŠÊx)u\0¦*Ýú6*6ÄDrÇá/i`¨ï5ià«1ð*ÓÃ\r®­¡ê=!~VGq§^À¤E´\0Ý¡„g²¡UÔ;¨\Zf+†Y~Ñòðýª„…°ª´üŽïÑ\nÄøfg?£#/½ß`RhéË$M&ƒÅXv«éRð™C¤Q¢ŠÁV\')ü”Œ-¡A5m¥]wMo_™Ó&“2Uc¼nS4MËw{)ËÅÔ+IQÒTp+·ÉVa^jº7ÔoÔUQUPª÷ø.U-áFìŸÏÜœšdeöþ#½ŽãÝ	K©¦í(¿øæÝÙ&ãWJeÒUThBi¨u·½—Ð¬y»QTÿ\0ÁF gQþJYƒ¬}à¨åOV…Iµz_æ­<\n«Hä¯«¦ª{¼|´Žº¹}Hä0Ôþ³‡ýBÐb§L¼ï½±Ø©fzJ¾¤·)\0›I,³*Å6ó§n¤7”qt7BÞU`~Øñ]ÓàW¬tª€ÔMvù/KˆÆª’r¨#]**ßU†¾M©ðÿ\0˜îÆýh/ËÍLÙ¼`º›ëÊûû±[¡E%k©¿ÐÕþ¶È…—>+%²íLÃ©”wÍHúJºõU^Ë‚µ6”]²ºó„î`ãÀ¯©cxý«Šô•\'Õ^GwÁ-Òx/O¯æ¥õiÞZŒuÒm·øp†[,5=y>—mËØ¤Ew*úW$ÚMûÕnª˜x¦ÌmT]å~ª‘sHâ¨Æ!K £>J«w@·ªèOj¯$õÍcCÒ†òªCæÃUël¸Š¯K§ð?Pæ½|\n“©­\ZÊTªž_õQß|)‘èØà†	˜BŽ*]`×j\r:Šù.\nB\\!X§!ØïSïo©vÇàTRpüÆýí¡t“ÖNó¹n¾\r#Pnæd\\_+û&‡PŠ\nB°¤—UÁR0¤>Å»Œ~Ètð€ÔJR]\r5ŽŸá6RÌôûÁŸÀz…×¯¯’¥Â«Glrõò:T…a!-.\n¬(Ÿå©1œ&§¹6’ÓÁK1½cx¡]ý\'s•üyÖ\Z•é§ÃdDÁSeFíÂñ©\\!UC\nÉ\\IHILË]„\'n‡¥Òà¿ØÞaQÞ40u*M ßñ¶ŽRp3†Ý«ÂêôRš©W¤6M<ì–¶CWGMzÂ£¼PÓ:U*L§_‰ÉÊ½»\nÚ¯	¯Í]^ªêôWWW¤+)®7yða0£—­¼Âî—¯ð3á{e‚¯Ör·—‘«.£î««««ªB²[!Â\"ÑÃÁÜQÔà½.!WÔ½BKÒgàÎ ø‹ü¨z_¿û®—6Gd,¬ª²¨VVVVS’˜ÛqàÆ«¥ºâ¯Ô8¯W «ø¨™_Žô¸L)^_ËFq”\'¯I²õ	BÔÕÎ…Ñð^—r^¶s»ÏÂVŠ—U\\7x½ÿ\0ëÊô»vÅÒïIÝ\nÆáz„Ú¾î\n„`½BGXNÓ‡„£—¯ÍPë‡\"¥µTøËÉ_U_5ëMØP•f¬¬¬¸BjÐéóRºÁVjfª`táö­ûµ AØx{Ï‚õQQÀêg¿FAz™N¦ÎãŸ”+}ªBû¡/8pÚ¶.¢0U’õ0Lï^ƒÉU¼Æ¥Þ*Ž+aUj«\nì+´ªQU64ñ¶ødmëºŠsÁ]Tª#[«Ô®ê©MK©tƒŠºî²ºœè®¦ë•étøê¦“¾#ð\Zü2œÂ”¥ÁTr]ª}<•”ÈVS\"¥Y[šÅP)+)yÂJ¡›4OÓ\ZÔ.ÂòVSVDËNJÊÐš²¶?¦T[ŽÕxÊÙ	^óÐ•Õ<• >šÞ7…áx^3W…ÑúoEx^Ù¡ý_?ÿÚ\0?!cp%r\rÀÐS9 ±¬k!‹´Z©£úa4ú3Þ‘È÷%‰|™#¸Èåòu‹òeÄ®d­È ‚ ŠAAR¤ø1H¤pÁ©„G\"¤RVçA\"_¡‘ÍL6:ÁŠš3b0î%wAM;³èEÐÜÐÊ®šc$á³ó(³Šê,…Ñ’æ\\ŽH÷D¿ØžI’;Ž‰ÈþHý¢^È‘+¡+tE\"±ù0EbJˆD=ˆ!R-ˆu9Q/B3œ´†ˆž„îõãÔújšn†Ž‚E^üÌ­‘½‡•È%ŽÂV.Â_¬OàŸ ‡\'”^t¢ÂeÑ‰?eÄŒ÷úbv³Þ‚þ`ðç£’ýDt.·%îOFv¢=(Ëc ‡B’I$“ø°è„G\"R	MHìO¡-ëXà‡±3™º›žÃÜàŽ\"°EcŠ¤Hâ‚8¬G2J©ˆìÝ²ëJÁþŸDõDd51É\"À2åÓÀë©¨¬ía`ìG=‚û$jÓú3Þ—ƒ\rÜ”+nˆ„ˆéO~;—Ü–K\'€I$’I$ÒxaBêA[z\'bARÂaÎà„Ë’	h “ZÅbäAR¬V)Hô`ŠAÄ©‡P¨üCÌ;1ÐÔæ>_¡O¨—¸D¾V¼\ryóa+\r{Š*âi­5âZB\'][ˆî|—ŽÃ—ð‚Ú-³T¥ò\',¹n‰4’ž ‚IžÃw¤I$’I$’M.@½ÈìA¶äI’Þ¤AŽBv„õif]0Ì–ˆ†ÝKAR8 ‚ ŠEbA‚¤ÁX¬\rAŠªcRµö£0ìbê`O“ð%ŽEÏœ<¦ÉGa#ëx HŠ<‘M‡Ä’ÒDO°Q¥Â.æÈ(Á ‰E„–º‚Ê¼RrÒÎª%±7¬>„	RQÒvêAR9	ÚÕÁ}„gÔ–ˆ†ú ŠAR)E ‚\"°E#†)H ŠÅYRè*ÒÐf}Æn†:+N¡­»2¾žñâ-Ðë­x\Z#‚,&v;\nç1¨¶à•Ë˜Ö©_Q\'¡àD÷‘óbKj!n$ˆ ‚#‘© tƒ\"T‚í	ëbÈ”Ür\"è‚ ‚\" ‚ ‚)ŠAAADE4¤X¬R‡F44A*–¼Æf}Ùñ™Š<óTkÁ‚-Ý¾‚¯M¨Ä1Wç\"Ç=¯`¹Æ®\\ä‹ÆÒ+·/á¨`e·KîK$t%¢ûÑ\"l& È•ÒIèˆçR¤R ‚\"AA±i‚)R ŠÅ`‚8\"‘X c£#J3F4°º±}Ñ‚>³[¨/™x KºwD\r\\Š˜²4$5q+%a}Ánú¢ÏuäøfÍàÓä>!\'¸Y~çÄE¯¡¸à“\nr´H–Är¤R8 N%Õ7dVk¡w¨©H ‚ ‚ ‚ ŠAU\"¤R\"‘X ŠA‚4¬E ŠE\"ŒŽ4<ÓÇ¨ÄfêÏž1î}F—ª•ò£áA3Ð¡«\ra¡.È\Zµ\nÁ,Rïª2]Lš•b/f/Ì\'¶DZE/¹Ì¡Î”ô¡°ë6ù\"ï-Š°$Ec‚=«A‚\Z#Š ŠAFH¤*5H\"¤Lph`uŠ@ÕÈ£UdU™ÑœÃ¬ÌùÌù³Ä¨+àÌ_9ð¿ ¿\ZµÀ„n4 Œôï¢$hp††,O˜—}àþC²Â|HàMAHHŠ¢ ‚ ƒ$R4 iEˆ¤QE\"AAqÅ Š¡¢¬Qð±ð£NTç1ê08|¡sÆ©Ÿ3àK£Ê|o±n=¤fneA¡«wÐKþµº\ZÁbÌÔ]c.ÊyÏˆ§óF_\'CR)¢ªD	E#ZG² ‹@Ñ\rE ‚ ‚¦¼©ŠÁ±šÇV*øÆ>`ºÒòf|£ˆkÇË÷<j‰ò‘ç>ØŸ\'´-.‹Á°,¯².°0þb^ \\»|°#0»SÐÞá\'ïa}Êóð5¡äXš”YRÂ¦§ÝôÑ™°øJµ¾Iç™\rkŠG¤ˆ¦(ª†ˆÇ“õ‘òAR²@ÐëHÇ¡ÈT¢3F%ÁjE\"®Ôhh|U¯&#æS>@ùìdíFùHó	yþŒH½ø‡°ˆºƒ.Å‡SÞ%ž¿à~Á£/ãD.Üß’öÇë·gÀ—éý¤-úÜ?I¾Eâ::öô£…Us¯^¬UX>\'LÓ\'ÁÁ¯>8µ­\'ƒ<éæ¬cKÉ„ù\Z\'ÊŸ.iêgíEùOk­\'ÃG™A<]¢ØOeJšÐ”¸#Ià>)û)úâc¢ò3Ýò^tG±ý³âK\'oÒ,O3âZÀ ùGÉ>32t?žºªŠrù·¢¢,**üQÑªGë¬—|v.M4ÇóÀÅÐ»¦x9\r¬\rÒGqÑÑQŸEXÏ”1¦|ˆ¾Y§¨·ö?o‘ó‘Fø(¾˜–²è ÷mAm:„oÞÂ%èãä_²Ÿ´n!Ij¾Ð·ÝòDË·½n‹í/_uõì5Nø§ÆGÊ§øÌøBúõ×W\n«££¯Š?O*`šºiÁ?êœëÖŽzMÝ†]3ó=ô¿(/—KÀßä|·ƒäQ¾*Øú¢ÈÁ\'ïÀŸ³am	ú¶ì~HýÚ‰+§í	òùeÇCáý±	Sß…Â{«ÉâQÏ¡™ÁU§â³àë×Bˆ…çU\\c£Tå]«8üQõ3NÆqÂé‘mé@Æ25²Àßy	#%‡À¨ÅÒ¬<ß>LóàýnGËx>U#á!nèü\Z:Šð`è$~ü}=”ð%º•º0é,ïù2ô>7Û¦Iý˜ß^Eö×=Ô‹.ˆ÷\"øÑðY› ¾½uDX^8m^B \\Ž¬gšóà·•Å\'ƒ©sëÃšE,:ò5Ç´“L!-„¸…À¨ÇÒ¬TO²ƒå“<ÆN‹Áû¼žñ]Ÿ\\Ý^	÷„xÏ”<ŸFç¼R=Ø_äñOš‰÷DŸ³a}ï±fÇÁ<šM}¼	™ú/]QU\nD\"Ü\nª²s¤uq¢àŽ)á’I%$“I4àžgJrQŽHYzŽÏöA\'a<\nŒ=*ÄyŒ(?(|‰ä<ÁúüšñMòþ‘ñ‚Ú9?qXÚJ÷WfB<¢Ì—Yåô`>{?©Œ?Æù4t<Ÿ<\0‡ìr>gØ–~Ö>9òÙÚÉ¯¢>ƒÂ<ã/CG¢ø•U¸—üª¤H\"¬DB0ó9:½tI·$¤N¸àšI$Ž‚hÜëæDçH$xt!¸hŸp1Œ¸Án7l1zœ*\0©€óp>Lóàý~GÏx¦ùËÂ>Èè`xýŠ­\"Ri615Ÿ§Ö‚~É£¡äy3Ô\'írßû1~Ö>1ò©uôBð\niã4zëƒaq® Š±ŒŒk(‹à|ÇwjV8¤wDÃ{ˆô’µá+ÔARšH‰&®†-“ø—˜ã(žG\n˜¯Å,ÇÊ>Tò!úü™ñIáxCVYy…H`\'\0’Æ·ú#¬+/r„ø?q¹£¡æy¦ýfcô¹[‡Ø«e_À>aæŠÀó)-=uD!kŠâcHÃŸmEfÄBl2*;x€Ó˜A¡ð?I+˜•æÔ\"‚ŽVh	\rÜ±xU*f‡âñO ¾ðžô³¸ñÖä|±ó{^Y\'„9\nzèæ~¬Ï8_©¹§¡ó“=1©åà±Ñáx>ó üàTÞm%§®ª…[W¢¢¤‹ÑŒ}|÷”„×€Ù˜™4‘²=$e¢2»BÊcýe„õlMM8rbÕøÎè•\Z½œ«³,w°òè«ß?èùoFÿ\0NÔŒ=H«sCèa	$’I,ìðÄ†…Œåô`êÅû[š:5ù2R3ÂE¬tð7³NkR\r]ò÷ž!ië®*¡bˆj-àý’rGír=~ÃX#`¸Œm—´–S°™4’ªëÐ+|´‰,cà&Y÷$ÔN„$‘±ŒðÐ¼˜.EÌÈM¬XžÇH¹äÈ{c@û±xKú•¦¶E˜¡©îE÷¹_ÒÍ£S?w‘ƒè9qbBbd’I$’A®ëéDˆÇòiè?»ä\\Ôò7¼¼aõxàÐ_ÕÑ!çtžº¢!…†¬³ÿ\0ÓÂÆÆ2÷~“K\"LAˆ£ŽÂih]w\ZÃ7cü,BRk°ÄÉsòTÙpÅ½ë¢–Û¥ÈÝ!–ü=/ä#âŸc4\"#¨•\n_ìAÔ÷_Ñ»bó” Hðñuý?[_Ó˜÷GìhKÃ™rŠ4äAúhx^L{šü™õQ01ö³ig…x3P¯¢gÔÌæÞº¬‹UýTüˆ$’²XDÔlÄåuV5Lxæ¥ä÷„uÊ‡ïãBù;Ašòâ ¸Øêÿ\0y’÷9„½ÉcÈi^ÆFV˜Ugö®50ØIrðBt	]…«ïk]r?W\"à,v‚WÑ±Uˆ¡X­ÉJðã:Él3+µËVÕ²‘‰«LG‡]þŸ3ëÏCÉqó_“>£áŸ@²Ãéàk†· qúBß­L´¤úªˆB¦Š·§¿üQ$’6%­V+461ÀÐÒóIË nOqsQˆø\0a±º?Êfæ*ªx–QúM\nh±ÓX0h¿ô­/æy‡~òC¶ÄÌî!k%ôXÜ,²dMli¬¡?m“%!\'1&n£Ã¤Ä~¿3÷t4uFçÉ~O˜|o³7côx~®¢_å9á>ÅÑ‹)æ=íš/]Q\nˆTTë‚úè&I$’66$9Ñ’666HÉî™²C&& ´xÐÃ\rŒutŽÍÌk&øYàø±T„ÜHHDÅ6e_*Òe/2ÝÖ¿eÛ‘“æbOMxÙf!T:ðÞY“¨ðë/ÛæyO4dÑÂS/¸ÊF•.çÄû5;RÎù¯ØÛ0:ä²$3F-Eºì3œ™?¬‘zåÀ…À“m,·J÷¹’I$’66^¨0ØOQŒ›Ç±ª0©&F2Gè?Æfü!wmH‘ïÁò~‹çÍ‘rË“FÛgäù–#—À¾Ð¿\'@¸–\rï±úýLô>Yƒêi]~ï3ÍOÎ®›ðYä[^–3ý2I0‡¼?é{³™°§“~Nûžå¨¯ˆÏ”ò%Óõ‘cÑO¨¨›ÅcF r>ç%îsì&ú¼Ÿ¤Ûääü)ˆ †eÈ*¡”“WSmFÑ°æ]Ì¼jŒGx·W0áÙìI%ƒdO2W·Ðš…ŽÐÍþKëcu—ÉSK2˜à‰6Ngr¥wÑ+òÜTC£\nj»pù~…ïäL»,g1%a,m÷bvÃœî~$hèpïA¼TŸ³Í‹àùf©¡8Éûw§¼Æ\'È§?¸7îHÐIÎ†l3»1àf~·#Øtqm‚Üød’Iâ‘:ª*ª·E:9hÄDÖxC!›7Š*DãC¥†\Z‘»ŽN·	q«4%«©2Ö©Žì§´A\\ú¨BJ„¨Ñ$~”5²RjÁjA8`µGR&Ôj‘{y‘*×(a\\¤·l+¼R‘9!Š}„Ò\\†¿²$Ê÷í¾ù,ÿ\0ŒÄÄÉ0hÿ\0¢1›=¨Ê[òÂî\Z|ÚvŠú	Ú×V—Øží=ç=ÿ\0\\†½ý„îÌû¨ û\" Ámå)æ0[ÅÏþ(°ÇFŽZñ{ü}#HY!¸¥àl†iÒG©Õü,ÙÄ3u\Z©ž3ö¹Ÿ·Í‹ôócYõ½OÑæ=ç}\rûr\rŒ”NL¹&\r6möù™eAmì]eDÜvY÷œØb£´i;$LÖaý·æ%ñe¥1It´¬—d„íR9B{I±1úÁf‘„·B¶ED/\"ªßšÌ”YæÉ¼!h$ \"Œ:!Ê2I+%„*1¡mî@Ò£t_öEäžjÛo¸†º‰Y ‹ï‘y™æ6X¹yÂØD¶!ì4ÝCÐœ†àµÕö¬(rI¼\\Ä!ÐAÈ„!\'ð“Í‘ŒX·Q ì‰~ÔX}F:\",woƒP·9DÎD¸”\r¦Êá{ _sœ_Câ j9õ˜:y?_›?K›0î*ˆŸ»ægëKæ/~­ƒÙûds÷è9&ýÛ£àgÈx3ëyCÛž~¨¤¼ü?¬˜Þ)Ò6jo¢>DÄÉ$šÉ#‹ëIB©#¡{†ºH·ùD.SSh\'÷µXÇFM$c¢4fÌ†yPÕ ‚ArKˆä#¬NHêXE‹\\}HOSäiì#™ÝÁÓÖ‡RÁ›¬WÙÀ›[P”!ž‚É@òÍ¼ƒgÌn‡âlÍÐù1Ñ^ç²\'éógêsÈT\0_/™ò•/œ¼àaëû?[˜ý=j/™ö…ðc2yü¸‡Žâ|ÉÚ`?va=þ‹ùAh˜ò’!q¶6<§UKˆ\\\nˆJ+9Í÷Ã“V54aMYD|’Ÿ¾WGFèºÚ“æècãáŽ{d½oþÈ:Ž£¬ë#¹\n x6ýŠèÕCÂŸæ\r¦Š\nB}ÿ\0D¶Ž¢[dÈÂò÷NÃr—Ù”|é–þ÷<wéÈ¾‘å¨ølo×Ìði|Åàiå/é“õùÛÚ~÷4cr\Zþnµ#jC¼3ö[‹7êÆÚa„³¼?%cJšÑ:2:1†«¿\0S…\"~ÂÙC{Lomùd“I¤Ñ²ò\'˜ôZY\"c·þµ1ð¡R(ÉÝn4¾àtÙ”Àdè°(ŽÚædvx9tA¹°–XÛRv,‰­ÑûÇŽÃNÁžá/è-ºãVþò)ü#ôõôîÉ÷žB‚õdE\0oiŸ¡æ^ú\'tOÛý%y0ß³v?»ü?E°ùßhøãØ÷oàgš‡;wõ‘r=}5Oí¦{åà3ŠU•Ðð2ÁâBNp7ž‚«ì-;‘t“+N}‹_j‰ÑÀ„*†¤°ˆ%lFÆw¢câÂIdÑ$’M$cr’QÕ„ÄHN‰êwÆ?EŒ{C-FÄ:C#…—˜›o`—ÆÛ\rˆÀŽ,€žÛÀ”\'µÙ.ý–Ç³Ìd:\\Ô\0F›\\Øö.’çèy\'îó$‚ý	æIŒÉÅ\ZË–\"ú4°bu—Ò ²=¢ú-fw	íÐæ 5(|ÚwM+nÿ\0£Áêÿ\0¢T\nYÞ¹KÊî$§š2ÍW+ìÍåº’!,¤‡=—ðoÙº>;Áô/Õ‡ä!’NS-Š³R	±1ºOÀ43°ÙÕ„›—\"?ÕR?ö\'ý\rÑ\"Òoì–Q×”!1112X„%±-„˜Ý)”ÜD¯±÷©Ë—±Œ-7²ÇÈŸYX›öPOºIË%ÄêØïÉzsYÒcª|\\c$câDQ±ï±>“Ô¢æ3rî¼\rp»Dÿ\0¨4=D# |MðGÄBlS‡rz÷:K þ­×ZãÜ6ßM„¦7nìBƒoáîÞõEÍ7kÉtSEÝžÄ^M™\'™î¢˜^©HÄ#_!oAä{ˆhTÓØ,¯í4A¾I‰ã²]Ù“ìTÝ«%õÝc}³å-¥àš“¸Jë»¹.2Ì½¾Èý&ÈÍõ§¡\'îÉ³cZ)7ÐP¥å’\\X¸WVš@m2)hk[.ˆÒ\\hÔÏaIÌ`LL‘‰AR#uØ¬/â³Z¶‚˜˜˜˜˜Ý‹­¡ÿ\0›K[ÏòÖ¯#Xo`ƒ˜‰†¿Ø…˜sÃ·û2¼fÈyIäû ¶Âoà¿é3“IŸôÕÉŸ{ŸµŠÏ[äÈÙ$’M\ZšÂg.¬llš>àc0\'R|ÄÇ›v0ö²¥ìl„²……GÂñí:MMn„7fÓutK·ÐzÄa=\Z	¦%«HíXyý±„ð\'Ô‰ºÞÌœŽX0d»»]Ï„áö\'–ÐP!ZŸýŒ¦ñyï˜éDý?¬	Ò»a«\Z!Ù0í¿^2jÔdÍ\nÐ”öèGXSs\'²©U¬³	wÙGìlùa&€•²i­Ö0¹þÖ \\¯‘Æ$:’è÷£i!2t¦´ùi–ß;ˆ—Ù#Ê$sûÑtH~llO›ˆÙ6IåyÖ„*&&\"öº	ŠmUÇ²ê†Ýnt6ÜXâ/ª\ZWF˜¤fcè>F\Zq4W÷eòÿ\07€Ž¢RÖo+øÎiÑ“Õ—<-}™’d\'Í4ku’/Œ\r\'#\Z0¤žDÚµ‡,ËTõq3A²Ià\\g†}XÍ¦÷ôÉ,B†êOÞô,¨ùÂÂãxs¨ßìC}VCf\ZÈ&\\\Z{‰—bO³Ìí‡“r+-¨Âè·q)mÅ»‹$4aØosb†³[6÷ËkéN\nWí6Av–¾çÐiëíÂéV`¡	u–ú‘C¨Þhö&»×Hæ?Vgg8°“ªBF–?‚z¶]ôþvBÂòQü/\Z†ñ=®7Ó®Lì}ªuY]E1iv‘bÌ=¯Sø_.RˆŽƒ¤ä\rŠÎ:—â’/cBÅ¸ µ5ÚÔ!QQ1®‰jê©¹\nYõ‹ó¾#Uá˜…ë>`Fü¦ßÑ=¯Ñ2XT›%óô¤»“x9…ÓúCeýß;±ôCæCÃCÅÍO2(Ãþ×Ãÿ\0ct÷þ’zØnµ?bÄKk¹úd“ÀAC¤9ài¤.âðg‰©ö½Ëž¨ÌA˜(ø°â\rÔºíï	-Ê:1žhZžq&¡]8û©”=„Ã!5þ‚ÒßÇ=Å·1`á=ùŠAêœÉ$ÇS1¯l‹Q.w~â^Þÿ\0tlï=·ÂG%/R0gPöQ$JÈ·ä=6zk_!»6b|¥6Ö\"”Ì¬æ>D¼ÇöFaK÷”^7Š!Í¢Ô’uI/[‚>Cá}ŒuE-ô õ_?Ó–¿ô—wp›aÝ%@\r€9ÏpÄ¹â„Ëœo×˜ßÈ&¾Èó	EË™¶!3Y­ÆkäÝoØÁþ›ýÄ>ˆ%Ëwê1æäþEl(éYã’}6AØ‚ ræl{f¹ˆ”[¾ò#ê×†‡£É5}²ugØ…Ùs_C\'uÔc\Z‰ZH›u,@‰ˆä(ö˜¢%]È{}Kî:Y&kfÝÇf,‹<A¾\rf£%¸4	—†ÄˆÝ\rÓ Û¤jÜgåØö\0±õÿ\0£òá—Ç+à²­»‰2­°7æç%d›ÒcéÇ\\Èè,†ŸÙ$Ónc{ÿ\0¦’q÷£Cöh–býßÇ‘\'LŸ/ëx7]ÏIáy/’[©!¹EÆp¼)d¹¶5æ’ |E»±™2häÊRÿ\0Ó¸ƒkðßJ2Y.¬½5\Z ÁßÖâi`’ä>s¨ê s‚f”îÑºŽâÑ#že·dö™lÒ,¦l‹	ËìÇ£±ù<GWÐ¢!Dl¸§‚I&³éI$’OA@†\\¹œ©!l¢_¸=Çv¶`ì_aÿ\0A¿àŸÕH]\Zýä6º¢6g¸•¨†Ž–¹—i/Ñ0]¹D1;Žø&Ôl’ü\Z…˜65´’ÉÐËÌzô=nIe´†Ñf|¤Ùiê&zqW—bêzW°í“›Ù9á5Îx{‰He°Ÿì/»ƒ,FLñ–ð´M\"\'Ä¼¹òlÙR‹é`›\"ƒíÇóhMà_*T·¤•¨œE¡8³˜KÎx2hµÕôRÐ!ƒW¨×q®åÂ\næ~·f97q5e‹bHIbÅ¸bÖŽòFòŠ	4I$“Y$’Iá¿\rÈdE ‚ ‚¢\"¤r ŽŠAcÙa\rn„ËBÒøÕ÷!´ãQ‹ËÜHE©,—Á¥±n$d³À“kRV‚4œèËå §¯-Ì‡0×^ïwð1û›Y:¢ú\nIn.G0N4Þâ8Î›h=4­cÜše&å™wÓ!Â90îà&Hžõ¤L˜ƒ\rö9	;š×.74À$çÄŽíÂ·_ê6 :‚	ö>‚]ll±8•ò½I%DT@“½[;Ó-r!ÃsúÔo¨Á,’xd’iG ‚ ‚ ‚ ‚ ‚=¥à„n‰pE’†·[ç\"{>Í“ì~é9Os<-¤™r9²´=ƒ±/q|9È†ù¶ˆ¹ÙE’[&ˆ’ßôY6¬;ç‰5¸þˆŒÃÅ,K\ZL¤%ó7\\èdóÉ%$±©6\ZËì8P»ž-%n5	´Ò·¿“}{!/xDxDeö£1‹°ßžŽÂFD¢mê‹RÔ‘,–Kc¹Q,ž|¤#¨è Xî$fýIêVªh›ú¼#$’I\'† ‚8AAR(×q¾ã)F.z;8\ZB—¶ù	~˜Äô\n.ˆõ‘Po¼$`”íY,É›„ˆðk¸g.¯™v”70òùº`AJ¬ërVÈaK,ÑPMn,Ê†|0ø^Y<þ[ðvŽp—’ìæ9Èöÿ\0¤gŸ»òrø¡.¬o˜›HKT‡Ém\"Óê »ˆY­Ÿ±<-\r^TaK‘¤NFfÛª¹É\'°·¡jš-Ó9‘Ì!½„Î‚y´KÜ™ÞJåK—$”Al$a¼	:Ï[‹AðjÙ|ìê$xiñÁAA‚#Žãp:WS8x}›µQ¡uà‘Æ²\'ŽEÁµ•ãý—¬0ò>†4»’Û#¯=]nrˆè ÇB\\0S¥M¯\"î\rî\'Õåˆ[–M‘–é$Xÿ\0Kìž-ø1Ë²^G›Óò5××‘w£}¿¢ôÝ‡•åÞ\rõ\"ÃøÔu6ec°½”\'ˆÚ%Sh7:EJÝ«>¥ãƒäaêéÓHG{ÙO•†“Mîè1oØeÔJù©YÔK%lO@Ÿ2IZ’Ú–-Á\";\"LI0R\nFÌZÊ-å3›¨¶%Ÿ?RÜm*Œ:×š7½>RÃ±›÷J5i\'‘nÃW_]ø%Ét3]º%’¢I$’h’I\'\"WrjÜ‚…{gk¢ä#Ñxû?FÛñ_²BÉ.v–.°ÄœûŽ_bÜ\'`MäFÉóÙ«äMÑ†:}f¾Çm{‘ºU!´ñ8\'ÒÂýCÚº_ô[%†±q­Ä²m¶°Hñ —q>çJd=H9ªÈµÇÁÜ†A\'¿l!±÷ÕI‹Q@±%èÏ‡\0Œ2éldç:Œ7}\rè–5e·¸Û–oØƒdeòºzÂ‘ÂØ^Ú{¦n`&wÿ\0	2\'ôÐ´\Zò—ºœ	œÝ[A1\'9§=Fób¡fº´$ªÏQo¹b¾\\+,\r§¡y&›”1ktuÔž	YEõD÷‰áË½–°57iX£m\rrs¥toRe•v_Qr€_Â¯‚I&’øYQOS~»õÏáöz.¢0‚‘‹c\'½2‰E¨„CÜ¾ÈžLØv,w.KÛÜ’Ki]NP÷’“Y¤£/‹,²Ë£]Ð÷s²z\'ƒ:Lðb#­{×„ôœ“æÀx%`£(tjklöènÄ™„ô\rŽô…„uyôÊD±¹Dáu26-NjDÓ™í‹ÈäÝ¾šÇ í	µp)ïÔHFÒ;¢;ŒB²Üd”Y=™²ºœn5·¹gQ{m‘swñ½)&“èA®‹³IÝ[ÁäåÌ7„—Î?‡T[Ä7DM\nP›Ø[”Ü’ib6pGQ%”$¢Å÷%±)Ö_R¹Îz©m¡kVMT’P…A–]#.•–êØÈ™ò,Ø+‰Ow°×o\"îOš.°öÕÒÈ¡²Å‡I¿N¯cv\"Mvæís=ØíPL¡« ‘!<{‡“=UŒv>a-½hÛDv\Z²B÷Ëˆ‘¤-Îat‚¦f ÐwŠÁv\nx÷7òM¸ÛˆìRxßrl¢|…L<ŸEA†‚èh–vÔ»r%¸K©hÅ-KÜ{›5i†&Ÿã:Á€_aŸ¡Š×äwûýéÕ?ÁèºÊnŽãY°ª@@žâv&s¨½I;èè~Õeú“$²}÷&uf^O§¦òù‹ÑŒ>q†,>IGÕÙ\rr²´á§±2ŒÕ¶çrþ’‘“e¹?Ðý	öûŽ*ãU†8ù²r9“Êãî\"(ÚžL»C9$ŽR(¡YÚ·D{a\"^M¤)›ˆ°²;mehB61\"†…—ÓZ;aÈéî.Id¿ÃžrÑt[Dgýò/c§¹:/}c,Ç6Ì]Ýò#V\'\ZkK	ÂI£Ûv%ÀÚI“§°’Ã5	¥ˆü”‘\'»øú#ô óH<ògà³ú ÒhÔLÔhÈkšÊ‘+$ma©:§¿ä™Ç±˜æ†Ö£À%mfkD¤Žú1bíFÄ©aÐ6|NŒkôDì¡=uµåÁ].>5…-ngNV# ·¦åÊ_º‹a\"É˜‡†Àómæ7º0ùŽ63mÕæº	V/ä PÌ³FÀ©lE’àiÁ7G¼XE¢Sž¦¨µ‡èppÖP¤‚¿!E3K¡n5öiw†ÈOÀj¯þâwÆÆyA^ÉDjr²u1Íê`#^Á)»ÆÅ×¡ûØ“ŸïžV\Zi9Y5g=G°£Óú¡¤“%«ÇºÊÜ“Wø¶àL’ÅŒÔh•ìð2ž98~Ìl~Ëž·\ZÝÈ2ïé-sBV>nÄ,³C,pûê=BËMœò_D—‘¼ç%§[F6\'ÑBáCm¥¹oƒÍ\ZÍ+“ô$L¹ÄÉ:—ÔGŠÚr\n~”Æá±ü¦z\Z”±&\\±£Éô+A®Y¥-‹~ð®ûaIë|M8Év –—w#•×qG(Óoì,ËFŒBNÞ¡	¬•Ù±Ý#¸›L¢S\']ÈŒ¼áÎ63É’;ŽdË™751ŽCÄk\'%BFþüpJy´ŒD½ð=è_+£L;–åÎ€ÿ\0ä’I4–I5h˜jF¶ü`½´9X?”¦²ÖbDúÓ\"œî;9—Xî“ª³$Ô’S¡=´ðžM:ªlž)ž)$’iq»p‡<ñ¯w þãW—Ã$@ƒˆ–ZRÐ¬¡äEƒ#ØyB—}GM‰K´ué+ÃË nA‰6ëØV0ç0P%,’½{¡ˆ†ä›îeÕÕa/i!Ø¶bGÈt¦»0þ‡	½‰û2\nœ-ôÙœˆnR³ Vv’1wq•¶2¦émè”F±cW|ˆW/º›„NÒ#XÄJ\Z>+Û}ýËBÕ“4[ÒâJ•úŒ%7]µ\Z¢nÈ&”t	?&I$’DÉ£57mK¸†Zß¥Ë5\"ëTßq©ê0rú9£$ùlk›‰dÐ˜lýIÕÑ›eìôS†˜ÝÕÉñ J‚Ål,\rCW…VÈ]»Í~Ñþ‰\ZîÆ%u!¤®rM,¾ÂämÐ‘àlxmÛ™/K-É|ß3Ýòå-¬]âRèk	?cÝÞðC|`œâÝ¥Á=l—©\ZÂÇgØ•ˆ[&‚Ë9²”F¨.D£Îc²‹1Ï^F‹i+ÝÈ–\r¼/,jÔeòzxNÃÉ>FÏÝ.¹÷!üøÿ\0fïÉ’I$’I¡äM\rê\'evÝÁZjû©#4×&ZÊyæ\rê†éq^vM1º4»—ÓÊž@·O-ê+ö×*Á¢¤¢ŠbjOKEšhÀeÓúd3íô#˜ÜtöÇAcbË®å¡M;àËÒ>M4·,¶lsŒí#™\'n«“§‘Û|ÈÅŽRdWKy.¡#}Äœœ·\"—\rÈsbn!$)J[mŠ]Ü£2á6£X0ìŸ¿ü£³`ž¹äMÖÂmÆ¢½þŽö%¶f;Ã\ZûJð6O‘%!Ì|çuÑ>&«5¼…¤Ñê‰\'×ž	¤’I$ˆM\Z5!…»´‚Ò),ÜYy¤î˜Ë¦gq˜èÞÖO‰kè™-ýÏ­\nj*óÆ¨%e05Nªƒ8„$žHû3ÃZ}	n´ŠIeô%åöA-«¡o‹I¥ÉëÈ™ŒAÐAfbY˜3ˆË+(l²»jMSæ76…‹w	k–—\ZìÕÈì¡%è¤uõÓøZ–RØ\\†÷±ìjgqÜ¤1±aEÓØÊ\nsÃÒG\"WÜf¢LõféˆEý#BÏ-¢>p%”¦éŠ”þ,‰‰‰’1e1\ZZ2ÖÎ±È{+4Ë€îÓ©°îI$ŒÆ3¶¥ŽÞú¶å¹oWÀýl¸Õ*£\rc]&Š©[ÒªÈ¶Bf^Ûä½ÒNÅ“VËœ¹èfa‘ek˜ÏE‰±Íº¹1{¸sì&mšäs\rÛ(ÑA7A„³DjÒÓ‘6uÉPèib)l“/Y~÷ÐÄÔÛ¸Üôš½K¿§ïÈÓo¨ƒT–—BÚ±Döâo|Í.¯\nØ2N…õÿ\0\0¤H›Ñ‰Ó‘H’Iõ&²MQ\"&ˆ·Ül‘ÝZ%ƒQ¼\rÓçUG1r?®Nxß£—BT+Ô€´5ÇImã\']kÜeÖ“¬ô3ˆs%jw/–ßB\\¡µÎà’w\"òî&6d·\Z(Sw„c7o£Ðv‘%á\n×C{Á:qdÔì+]¾`È\\Ióv2VÐtdÒ–/‘¹	1IEÄŠØ°ô’î‹(ä6úû…	ž©Xm¶Þìhd´´`’D”`UlÄ+1sF)„\r2I$’x$’i>“c1%7>3ˆ\"6Ü7/À‚T‹ApÙ¥¥îøŸ©r^š‘èO©—	%DÌˆA†@…KV\\2@NŒŸ;z\nN–ìÞðf%ö‚-»„‰Í7¨¾ÊÚ\riLatæÉµÇpq‘‹´æÉ–&§Dc.as(D¤[²åsE¹´Ž5¶Ç-õ_]ˆ/è‰°¡Eó‡<º`êhbÖbÝ ñžO<·Ÿâ‡4ù\nS¶HØÑ;ŠÚ`Å+t…*I$’OÒIª£CG’‡Àÿ\0ôÎ¤ÊÚ²ØT®~ÂFXwSÏÐ|n°E+™jÆÝìx5Hèä˜ßÉ5ý.ßÍ¤Ø}JŠŒèa©¡±N‘2I$‘12ËA™LœæºÛ¬ø%‚ÁæZ!’Ý–Ô…+ØÑIa\\ciÕ‰¶ºAÂÉ.HJ/“Ëm£q¢av%rÍJ7þ„ê›™HÛÒâjÚPœ»[qdý!ÙrDN+–Æ^‚ÝØD\Z‹*ä>G¢p74töÔ6öFitö,NçÈ¦SÐÿ\0bÏ+€©˜÷T„îHO™ÌEïcZE:zp%L‰NÉ`„ÀµBz¤Å¦¨„*!UMî6õ¡$Z8Âd“I$BDÉŽÃèVö¹Œ¥;’Ûfä¬Wº7³„›å®‚œ³±Ñn=’{	%|µcxa«\Z%·b,x½Û›vty™‰²Áy0Hj~É¨¬Ä·D«’º‹Xž!n.D’ð²N*p–dø[Ò°¥àA`ZºZ9Ñ cmÅ¡òßÑmWÌÇ¸†R4ðJuMVxäb{¬5z#Uq:Ö ‹» ¹‹™·m¿!¨‘Ü8z\r®!B©#£¢bªÃ	“I$‘16!$–dFÙê,(S8!3w9-$¥nY-m¼–pÓØhº±Y»·Ì”Í2XË…©	Üí¤\Z…Øû¹¹¼‹†EÜÅbq±3Rg«\'xž;–—2.šŽ|g¡uýÑ”>o¨Ó±61÷ð<ñE8ø4Žõx¦KÙì3£±ƒÚÁa24£(’I¢£’´!ÉÈÍPÂõ1ªfö‹/·áb!D‘nˆ=Åœ¹“§\rKeÚEUS˜$\rÚ{2$V!À\\L’Fè†âg „\'O5Ö1ü¶½š×°˜å—$9êÄ§V^ÂY\rl˜—?á%ŽÂUÜHŒäMø%…¹’{™Ùoü%Ž¬Œ	ûÌÍ›!¡MÑ#‰$ç¯RÒ!¹k¿rä\'vÙóQsrK\'™-´áZ×OŠç¤¶ÐBÉØa^”T¤LBFÆÆ¶æT!Û¢/¸poC\\‡mäõuáÔ~Ô¸¤&ìHP6Ñ@—t\rõš!¼Ž¤*$/’@›QcS<¸j{=dêHÝ\\@‚-ôÔ=!áÊ tF‘¹zŽä“[QZO¨“C†šªm¦ Já“œ,\'‰ÜÌ·-½G$, V8u9µ¥&ÐexYCIHžÁh.bML¥1ƒá[¡M¯Ll‹y5¦§?\rkö9ÞŽŽ\\\Z11n¸Å•¾ùGÆC9¢ –»K±üñ¨µ?aí²\Z—¢çð“BUý0@žâ×=ˆnAjX³’è4­Ðã/q¥°ù®ämÂ™\"\nÑ5Cp¨MO¬¶A§#™y´±‘³Y}¤”®È¯#”¦RHIÒ„‡*tÀ¥Øù4&9Kì,¡FXáB•ÊDTèD’ÌI0·¿EÅ¶£Ö^Z×PŠ –ø0¼6Š|&7h¡€y‡®¾Ž3r3O°/…ôd[Gº‹—Q»Oº©4XFã%Mi´ÔÊ®Òÿ\0UÙ\n Á$$ÚâÚ;Ì¨dl»	ÎÎLvÂ&t‚ë™öâLLLLL‘²I$š&5Aznc9ÐAQ%sÇ(OÛ¤»rQµ¾$Né±l†…,Ý÷#›ÉbLñ\\DC“9cà	(R8.ÉDF\'md¢ÕÌyßeÃDäRJtÕîHYº¢ÌÏO`ËJOŸÑ\n?q@ùàm´ºxÜ*ú+&Ÿ]Ñ7ŽLzHå«oÃ†ï;U	=„…=·¢­KëØgè‡=÷/®GÖ(×:*È˜˜˜™#d’M0HEqÕ\rHnƒ6]mâz~/×†Â¸ÙƒU©®ÂKÍÊ$b\\›¤`J^‘9^ü‰KŒ‰»ÛÈR²PÚ,jjÄÎç’R »Ôl\'­ÐobJy‘¢Uªhj¡‡2Ä–Þ«äüÇ®ÿ\0†UÄÖ!ö¥÷µ!­eï#tp`³æYq&H˜™$“B&& Šâþy—îup&Xn¤ŽDñÊ2bj\Zk:’VXƒ^qÛMcðv\\†Êl9.Ó¦Ãtƒ¸o\'«nÌ\\9ß\'˜áª.™kn#‘v¯—àÿ\0\n?&ð%\nÕW{‰s¾{\nçÚœç±(´¶J,±©(±4šªªH™$’M$L’D…ÀSÀXa±¾\0™—ŽDà“‘‰K@g²rõ&Ä¡Fƒ5‘»&\Z.C3ƒ[Ž¤65fâÐmšÉ	Í%2tIÀ8:É)£qtâÃb(Ý“ð_äÈ¸ä$:UÌHÝ,PBÏÀ …2‰FR²C¸à†52}É$’I$’I$LUZ} Ñ$’I#¹\\ìÌfþhbÔ’Ë¾£B\nÉ¹ÎFË,(\'.ìm¤5&ìn’S1,—\'ydmÆLÈç%÷;¬õÎ~I±þxç.Gü…„Ñ¸iHnJÎ»¢I$ž	&²I$’I4‘2D\'€Oª\0MRI$’ÖB“CØmne¦šÕà™w8l_s/7ZÛ¸I¹³¹u·4Èö‰»²ËH¦2;,™ßü&=j¸’RÇ4X´ÉÖÜˆÚ:‰¢I$’xf²I$’I$’I$’OO\0’I¢I$’I$’I¢FK_qDe±À­a³¹e¨ºä¶âÌÍŽæ_C¸îÔ<Qés&€jæ?Ä~»ôRâ\\r‹f‡J$’I$ŸFI$’I$’I$’I$’I$ž4I$’I4I$’I$ÑÈ\'|Ç£gry‹­Å5ÉÜÖ—Ül¹ÿ\0–“™$“I$’x\'ŠIà’I$’I$’I$’I$’I$’I$’I$’I$’xR+)\"\'‚IçIô3’?ÉI>ŒÒxd’I$’I$’I$’I$’I&’I$ÒI$š\"I¤ÒI$’I$’I&“ÃàçŠI$’I$šI$“ørO“I$šI$’I$’I$’I$“I&“I\'‚I$’I$ž	¤ÒxçüT“Y$šÍ$’i$“Á?ü\'ÿÚ\0?!\"ºÑ„:0Cÿ\0à(xà!æŠ‘q¯ýÖ´Ðx£Íò<TyCk…IÃ?úµG`j«J#R}DàøI$ÿ\0å•0£1f˜Tò>ø1!«ÑÐŸBi?ø÷V&<f,È|%ŸÁcÉ­\'‘;‚&2k—?çìÇ€jgC*š!QgðŠ‹&BbÁ øêI$úROþÒÌkàjeG3*^‡àçV¤ÕŽI\'Ö’ðÌÄÈÂ¾¦tsÈÀd¦¿b2\Z:2¡¯z[ÿ\0!˜™˜WÂŒøXbk©Ñƒ¡—¡•ÅI$’[ÿ\0(†bfaSÈt1#\"#¢8nŒ],¼)Èx“ÿ\0ŸQ…L8Dt1ÐFd\rtuC hš*Ö\"ÎÓCÄùÒ¨Æ¦ƒ*†1PÌUZRˆ¸Ñq…@¨ÀÖ,éxFšp?‰?ø£šêtrÈÄaFblj3Z¥F\nˆÔ,éÁ£I‡ÿ\0@\nŒ\rt °3ÊŒŒbÅ*&Â¨ÍL¨X¦”f*‹fQf`Œ¤À?üéT`k¡&b9Ñ•%Š2TÂˆtÔT½†î\'a»šU‘YÅªñÿ\0†*1FºX™ÐÎŒŒBÅ*aD:j-hÈÄÈU`,™ð0ªÿ\0,kTbuV&t3£:*Œ•0†#T-hÈÄÈF4ÄY2€Áæú^U¬LÄ3teÁ°S\n!ˆÕÂŒŒ„cLD0fAŒÿ\00Tà5PŠÄÈC7FUò$œx!XÄ1\ZˆÂŒ¨ÈF#1Lc‚üX_Œ¿Êàj©X™PÍÑUá€1\Z‹ìÂŒŒ„`3dÁ™€x¯ñRøÇÆ¨©x\Z«V&T3tgEqJ¢5L(ÊŒ„`3dÔdÁŸø©ÒðO\\P¬LèfèÎŠ\'‚I%P#Qdx£:2€èY5˜1Ð¼/òq\"?Å Ø\\P¬¨fÆ2\ZÑè41¥\Z‹#ÅÑŒN¦lÁÖ¼~u†Cô°~„Ÿ•‚ºñ¹\ZA”Ó(DÍŒeéCcQdx§*EIÓ©¨×K:/Í^ôpb¿áX¸R}S6<\"tAˆ¢BaäÈtä!æ³¥äÍš©gCGø)ú1ÿ\0âÚáH«Ñ4 @&Èy,ªÂX,ØcQ¯‡ž1äÈÔ ÎŸŽ$’I$~‰I$’Oøeè3	¢£dj945.EI¨*£^!<TeÀt4™ÿ\0‰Bÿ\0\ZøÙo=LÌ¸ÉŽ°ªxRcÏ•dÅGCI˜¿Âª¡|lÂ‹ŠìlÍ<	äÂgPèxRtJ„š\"(Y‘AÕ“I˜¿!RÅ«jX·D%†ãLE ÈJ†¸_0à\\±¬y3­©„Ë„.W¢Æ°©Òf/ÊnˆM1çÓKV B*HŽ 4Eb¤¸€ª|/˜À2¦£S:Ú˜k\nª™z²À«hz`^“àX\"G\nKüG¬½\'ÂÄÉ%p3ÀÉš™ÖÖžj¡ÑS. Ö³\Z°ÉÑõ¥`Tbh©\"=Hô†AÏ¤—üçø³ÀÅŠI5FtÕLëkG:çEL¸<EèbÇ•?Q2\'£EAúˆcõŸKY~üv*É4&%Ä<©MxZ:*eÁà,C<™‰¯¡€±À^†BBå02ü~ô˜½GI¬ÑBó\Zn#.ÔÊ®´rUÎŠ‹<(†ƒXð2tëè`ÅSHô3¨‰¿]ÒX_âªýÄœSqN£@ydlN’a92ch`ñlrC\Z¨ÖaEŠh‰ôôàOBhš!îG1=—ùËÔX>ƒô0v¸2£p&&‰©ÉJP†5Q¨Áš…C\Z\'õ]\"Œk†ê#¹ET\'A‰Ëõ—à/IÑ’H½I«ÀŒDã€¤HI>\"ÄTàXÀHN…ÃXhjÒ\"ã$I\"8×¤—¬Ñ$T\'’O¦¿zLTtc¯¥0­b‡šCP¥V©Z„¾dQ‘EÈ¢¤ŸBh¸_¬ÉP”‡­’½41×Mð*åYˆ@‹J¤®ºAŽd¡²I$¹€…ÀÈ ‚8\"–,A‚U`$!þ1ú¯ƒRj©¨Äb hH¸‚Üp,Xšeø×“èAY&‰_çå¸òO©‘Âðf!&@qI‘¨’9AHá7H Á’U`OùgFDUºO¦ø«K‰‰©$þ\"8PŠÃò$•iÿ\0#A’DRK!oW¤A–x 3‘$ªJÿ\0Ø˜ø^Y$=!/Á j¨é44úP¦™*ðÿ\0^¸¸\ZAAAA¸Ðœ-ÐéÈx£¸­	zãUéÀbcüÙd‰Ñ$?8¸2¬_†8`‚ C\r¨¼6I\"¤Sn\nlËñp¢D¿ÀÈ)þCáÏ×n	âdtÇFˆ šBi#¸©•h€’\Z\'þ2ã]‘Â™úÍÒ$Páfd¨ˆ#¦~	ô\r‡?!¨Ãr?98¿\rT$‰	_Öh…FËæ“Á#–èÓtÄJ\Z&(’lM‰OÑœ×æB#^d~T„þ~\"L\rŒL	ÏU‰1ÖcCO­%ˆøÑ!·â¯ÁHJ?‰Ã¼:ALôfÌéÀ­«i¯ð‘n¿Ì-ðº@+ŽÕ”7ÁYfT’áÃÐY5âhÆßáZL{šüÈüº¾+	É#1>£ôÖPYôDÿ\0„h5’‚QøÍ€øWŽ­Kü%¸©#£uu>g!uþ\r¡#ñPü)\'ñ>ED&<þ2ÙÒx#€Ø†hC_à’)â•Y<L|	ÕV$j?ikpµF%Äj4cPI?Ÿ—àÀ¿©#|o‰Qp¿Äh1‰£šj*µZÑ„‡Dÿ\0Œ@¿)>‹áBT\\NC_‚·à\'X¢Uj.MP_üH¿ß>›áBôŸà>$pÈÜÑQQç?«‡â´^’Oá‹Ó–šªŠ”?E)àŸÃÇÔ‘øÊ¨QðÇªÔz±‰W|¥ÄêßþÇ¥1(üYü7Â½wê„è«5c|V/A/EªOã¨~ÒxÓôæ®®‹ð\ZõfÄDS¸Ù$ø¨ßäŸ”~Öxä’Iõ\nàãÐKƒ‘¢Ÿâ&ÿ\0)—R/ÂMSùùÆÅèL$~ˆ¿z©áÊ«ðÍÿ\0‚KòãÒ´A4êu_€‡ø-P”~à×ããŽ)JŠ—.op´üþ“þ~2tŽ(¤Qª2Á?óþf8Wà/òÉ\'üä~#¬ÿ\0ìcð—\nü\"Iÿ\0ÙGãÏÿ\0ÆÿÚ\0?!âb$N‰\'ÿ\0¥³Vƒ\rGMÿ\0ñš‹4X£É ²1ÓJ<VI©$ÿ\0ìjÐhÖ‹4|œð	ÿ\0Ôºd3â§EÂñë¢!blO¡à`óLªºžF!p<~\n ð<\r\r\\y5¿>?ðnÍF1)C¦ŸŠtÔÔYü(ô üÕf†\Z,yüKÏãÇþP±ÁM0402cÏâ^MMhŒ4ü(#ÿ\0¨XàÐÆœML˜óøf<šˆ#\Z4á‚#Š?ò\nŒª<Œb3‰¡“’&“ÁfJ„]Q§þy&ZŒãFaäcÁ$ŒTUb†Äk£,º0¡cÿ\0<†aÀÞhb3™†˜ÃX|‰°™#c°˜ZbØÑ2C] t]D?óï‡ÞhcNò3.fb…‘ ‡ƒíFfTçÅC&j¡üëømÐcNcIäf,w‰…†iCÁq`Y£6eFN ²Ì˜„?óï‚ãQ…8Q‘¨ÌÃÉ ²<ûR°\"D¡—KÑäc ²Ì˜„4ÿ\0ÐµÓFáF45ˆÐò%‘äbûS±A\Z™Qäxae™1iÿ\0ŸtæøQ…8Q…-hÆ#°jd0ffBÁ±Léð<¡…“&-D?ô,Ý8ÔaYŒhkF.#¡¨ò1ffBÁ°3*<ÊE‘dBúO‡S¢ŒÃÉˆÊ2j†ìÆ¥M(Æä`d,Ê#Àò‡‘dYbÈ‚ÇùØ ð\\wA…\Z0¡©¸dSQÐÌÈÀÈX¦Ty”<‹&BÉ‡ùx#Ó‚?5“®è1§@ðaC˜îAR5LŒŒ…Šd!ÊE‘dÔX?ðÑë¯P¨â:)Ð<ÔAA75ÄÈÈÀÈX˜¨ðhP² ²`,’’=UèHª,Ó€ÃÓ‚D×Ð‘	ŒLŒŒ…ŠÈf†äY ŒÍ”H•é<¡ñ¿ð„>&á’DÈ›É„ŠChaéKqàÄÉ˜\"v¨†hhhTbaù¥Pþ‹ÊŸå Eq7êd`h$‰$JFI$¡´%‹4à¥…FQ9ôU<~tAEÄÝPÙ4KƒL3040ÄÈjÆbËŒ”*jiBÉ˜±M8iCÉ¨¨ÀÃòÙVè:AAR?Å¡ðE‘š4‘al ÈÀ±¶T*j<PŒ…EŽÔòj*1?Å?ò‹™‹Ž‚àÐÂŽf†s-*š£!\rC‡šŠªÇø§þuq#A¡ˆ¨èe12Ò©¨ñÞ…N‘«d‰C­2DÉ¨³À?ñ-q„8Ú¢hÐHÿ\0!º½i4i40\r¦ZPÍGŠU:}jkRæ§êeÁ4Kâš\'âJ!Ãé“Y¡#LHµêº:µÁi40\r¦©–”3Qðz}<šÔ‡Á$=©Dçðd’IánàÏ¬ý%ÄÑ?N\rTzSp/©–„3Qý˜×¦ƒ:Íht!‘©­HtloQ	þCÛó—åAWY6¦\"à_ZµMGöa^jƒ:Íhtè2MjCØýD/ÈÏÖ€ÿ\061c\ZÈf\"ÏÅõ¯F†£0¯5AfŽ¢ÈX&µ!ŒcõøYþRâ~ª„¢GK1GWZ©¨Ì)‘&uš:ÐéXu3Mh¨ð:?QQ~;Kÿ\0¸¨é•F`,ŒbHH’yŒ¥ $‘¨Ð‰,4R=ÍFƒ*kEL7êª/B	p	2AÀÐ¿9úŽªÑHPGµX\\Ž°4É¬÷)NM#A5¢h…õ•¸S[¥*Ž¶ÊA¢¥!¨^³üé*>¡\\5£!„—iáié‘s!.EËME©‚XÛ\'ñW\n¬A,™Ô5hÜOé¿À~’à+ðò3:µ\0Å\"\"²näHDŒ™$ÖšRi2ÇùŠ–¨0ØŸ«$þBõŸô´O€óL:,™Ûc ½Q‘„Hˆ ‚<Œ|ð‘\nÒ$Kübüôuô\r•¹jZÄðM.L€„B ‚/Á‚)GùÈ¬	9àU‚8P¸÷cP,Š‚6	‘·’I4š¤Š#Õ‚*Aå‘L~¡\nŠŒ6e^£D‘#‚EPG¢’I~•ñã€GøøôÊ»5Ö¤Á‚8s$’Y$²Y\"D‰zägòb¤‹b«¦èOTAÊºŒ‚#Òp/f~´‰PÔzRè‡æB©üzL=Fà×dú€:M‘),cñEHÂÅr«ôåÑÎ„CƒÈðL+$–á~›‰$’I¤—bBØHŠ&´Ñ)¥ÀÃñré‰?àaTÈ\\8zéTéÁ«´#ta©‰øÐ•83%ø“þ@ÿ\0¨Ü\n\\iõž`@hdD\n™Õ8 ˜¨gÁŸÏäJ˜ùÍHáøˆllbFíëÍ”G!BBS!¹«R% eÃ—\\$Àïù’É×?”Ÿ„Æÿ\0Ñ¤€j8&¨A\nŒŒGÇ—¢×¤ÿ\0—^$¯ðÍþ2QWlR¦	&’\\E#\nÇ^‹à_áS¡\'øøèQp9Â¹\Z\"b²O^ƒ4âLŸð©´#?äÈ¨\\-HÔ\n™ððâŸSM(ðˆ§?’ÃŒ‘‘°†|	\"_…‡£þDçñ›â˜½c£¿/E1Q	ÿ\0ƒhüIä\ZôŠ×£õ t’Hÿ\0\"‘ÿ\0‰\nücàŽ5Â¨#ümÿ\0ƒ/Añ\'ƒ€½EèÅ&‘þ\"ÿ\0—šô ¿ˆªÿ\0qÍ#ñóõrüTëê/Á_†?Aq/R/RFÿ\0äº\'Ô_„œ	ú²\rUñ®5éOä,úPüXà‘¿Y~\"~«Dz¯þ~;søqHãðiú¹™)z/Ñ^‚üÄÜ\rþzpA¢üdg×h8úJðWàáÁ07øQþM>„ú1«ð×àáWød¿ñCüeø)Ðßá¥ÿ\0ù„ˆÿ\0Æ§ÿ\0ò°GþN?ü!üêÿÚ\0\0\0\0þ9ºãSïü‚Sžo÷Û5ü’h[I%¿´òZKöä\0wÛ2eû\0´$D²\Zh3`§ãr”žú³7®8ÝºgKmôSÿ\0Û›j‡„½òË²ZQB\\EÃ(—þ±¿e²Êå#M’I¤§Q•¬¸_I‘&þ1cÀ’@	Oÿ\0÷Ym«ïH>…í i$¤A‚Û\"M£ß–ß÷¿q%¹ä‘ÇcÓHJgÕ\Z\0NÁë)D’HÊÛø‚IU¿Àÿ\0öÚÛm¾ï`Ó%¶Ím¶ÒE¶›NÙQV@Y>Èkˆ|I HÖ\'èM<Ïå\ZGÄ—òCWÛiÙ‚ÿ\0,hz­R	g²[l°†ãçÁEÀ,@áž¤‚\0@â6¯f¿ÎaîpqQëm¯K…Ù%/#\0ñÿ\0ÿ\0v²\"L8Ókä«ÇfrêOm†!¦r&kª#?¾}ì\0³Šè\rm¾–|—ûúHD\0f_Í$ºÉÎ«æð\\mDø(È´0:@¼ßHÿ\0¥Sëüz„Q(é›BIÏÿ\0‡üÅØ‚÷ýªùáuE E“A|«‹PÑêÂè”LÛk5‹n\Zl0­·àŸ²[\'ÍÖK1\0lößw7Ø~ì+Žâ¡OìÆìc{tRþ¯#ð˜\\¬]fnšÊ ¶¿ÌmIâô[øm}7Ú†q@io7D£¥u|¼\0þïÕÇ{•Üd£X`\r¿«ÔÇ²dIÐŽð-\"•!Ùˆ|“ÈºÉ¨¾Ûýþùg=Ç÷8Ž‘4&ýÝL6¯ß ç;FÜ4ík$Ùù~7·›mèì?ÒÕqÙad0l2ÃƒLq»–b·]>Í}Î9Vz§ŸÀ÷Á7[´ îíæŸÎj2¶\0í»m:½–Á :>Ë4\'ƒË\'Ô¶\\ó´—ÐI3,|ÃtÙ›…ÏøÎ sŠ\0CæÎÿ\0üƒ.ˆ4Tƒù/«Y}(8ïœp¤w¤\\Ž·î·j*¼8÷è3oX—¾NWfuo3bîÿ\0ê²v€\rü‘„=W¥uý—o­Â8Êwà……t¼ó4‰¸Ë.FûîÝö[ê3l€“¿Ÿ\\‚QçËaA¶.ÛI‡®ÃÑ\'HNfù–>á·Qÿ\0]ÔË•úÛiÙù™ûdZðÂÔ8üòžè#Mñ­mŸ±ÏäuU]ÍCyhŠÞZè\0Ó½§tÝ¯Jÿ\0rÍìž]ôßƒçK÷EÙYh›Ü\0‰…Î5Ý›¸ïH8äÙjÓòü\r¶,~ûÜvB¦÷/åÐŽœOý†ë¶ë?\'${È,ˆèib¯F{£\\Î€(—µAÇ{”‚A‹k×ý[s’w°~t}aVÜ×Vêk©ÈÑ²yüø×&½ó$7^ÊS´ªL]ÿ\0øý´)úz\0¾¬ì€á½ÀÍ²+\\uy9h3žÉ(,òÆ½æ”`víB}hð	!M;Ø÷g/…¶Ì¶rmºÏXÍOãé‹’‡”‹¼9\",ÄíÎÛXy/ˆ[j—FëUüN²ª(_D–N<~· \Z»-[cóÉÁ]C5÷5bÉN×dMoËÿ\0É%4IšÞXµ`ZŽvynš½¦¿ãüuÙ6Ÿ#oûÇ—j¨Kýžo,	Í\'µ(>ZÐ³‹Z-×øì ½5pf­†7CX;¿*½&L.£YDß¥I5q	óÅM	ÌÙ›•¶€±¡\0Òg„HùšÁƒulïEhè$Û¶;=ÙH=›PèÐ ¶ò±v:ÌSUÆZíke,‡T;Ñ\"¶\0MÖœkVï¹i£gÑU8¶’ìû2LeÝ+u#ûâ‡š¯`v×Î™çjùiŒYè4\"±ÈtHì*Ù$k(â¥òSûè­ýê›EyûŠ#oÍõš½\\Øã.$¿ÞêÇþ”7è~V–=ƒ„e;{òÅ^…G/Ã¹™äÉ•Ér9;¸yÈ·†P÷–$¹–oå 	7ü©–T0$\"`fêÍGŒH¬±²{f¶ÏJö=6…ÓMÝ8ûý0¡7O\0`Ù#Š“šÎM #U/¶T“.	‘!˜¼´`«_9ÌOÙ\Z±õ@Qµ¯T×ƒ@1É–‚ÅŠ’éø˜ÚT×¯\Z-Ä¼røÒŒ)AzKÞ€ííŒy¾©8\"8¼=–³qƒæ-íÓ’\0àØÍ÷á@‚E$X€dèg:ÄžnØd»^wõ/’Ø\'ìI4‡–®m›[»™\'ž¾ß\0›±TÞŸúDGGÌÍ­~þp+_“Â¡OµÅó¿YÃqLN…ùÕÂê˜”Øu×‰1ÙÂm6í´Ça:à—î<„!}ÒÈ*n¶Å³m•ôH”Ic$*âXåáÇçƒ“Ñ?ósâ¸Úö%mƒ‚V¤ÏË‰ËA×#yÃ\0(Ô[ƒ½ÿ\0x§É¯ë?…@\'=Ef8\0$Þ„–¤ÿ\0…Ì™u\ná­%ß)D;!³·¶½¤z·¤<­üû\nh›¤;I#N	B˜]0¶@v•1X‘¥l”H+Ë`±Ž9eA³÷\Z\'~a£JBû—X6æ,*;r\0fÊXL?ÿ\0NÂ’vÙ¤+3Še8lª2géòƒÈ.¢óžb¿Ø|Í¡’*Wxè>&þ\'6•Çl\0q;ói‚\n3eÿ\0IíÙON¿’šKi3±èîï/È@¤‹dõqÏCèIÆËšDp\ZloïÚÉ±ŠÌ´–=š?ÊP­[fòÓ½¥÷S¦°´•²/Ë¸øÉé°: €n‘³·RA¶D\n	•¨ÙM9RwÀTÀË0éGûfâêØ9ÝåÕRK3(s-¸\0AmI#\'i\"Ï^KSUùQYuÆíÑGIèNEÅ#²ýËcjA\r½ã9ïl·ö®¨Ô¼„Ü¦ÀÒe–ì ´Òiö”É§]pÙ$óµn’P°Ú¦é¤Zï‘à@öª†Ýyst{²[`þÝ¿»\Z-¶’òä^Ël$\"ÌûµÒ¬Uö$·‚»—ã	ºlûa©\0¢r¼¶[-ýþ@“${1­_i\0$\0A$Ö¶&!]—þ¤¶›‘)6ÛDÌw ÒÃP\nÊJ¾‘kËoûvU²À“LŽžÔH\0H\0€	š2q¨òÙ,ÏÔ²¾”È*r`’Yf1èÝ\0öˆKHî]z\ZÆtï6»ën]ßè\0’$\0H‘Ii’ïá(yïM¨#[Uh\"öø:›ZÒCªvž.‹Ëk÷¯³mî`\0@ ’ÉÓŒúß1 HkMs#r£vž5£À\0H3ÑI5[ ’[g¶I¾[ªÒË·ßÿ\0ÿ\0m?8	\'´·[P­ŸƒzJZ¨íu¬ûó€&k®c…RtX,ö[g»lsTM[A=¶vÿ\0ý¿±€xq±7žVÅÛ-,2OEÃßÂ \n58Î×ŒuvÉï¢Om—[/ßý½“¾–ØÅÖm:A®v½T9ˆHÖm›\'6Áh¯ö¡ÂT\nîºn\0¡[<šK.ºK$uïs•É”Ïk´¡ˆ–ª\Z8«Š$¡Ch\0b\nXã5)˜Üˆéå­á%@(™ošOd2{-¶)ôN.%$¿K·?Q¾#q¹¢+k“\0K:UÜk„2¸²Çf²g½ÅðÍepd·[-\"Iº]u\0[JtE¤¿$ÆV”ÅÙ8eÏé†L«Ão­¡k UÎÛãR•Ö{,¶ßX6ßYM5!€Ï²o¾œÚÏq_±dÉ°‡ý<fÊ..× MèCÉgJw‚òÓl©áªòö‹´é;n®—mÉ\r’Z€…¹Â[§j–ÿ\0ë`A’F^	²Z²‰$S‚ÉAÒl¢›v¤Úò\n&)¥t®|…´H’D$²{Eí5rSz]´Ü•6ÖÒÏ³pÊƒH6Bi¼Y½€ïöÜ_<é«´üqd’AdEà$áe‚d>Ä,Þ5Ÿ4ÿ\0ÔWÿ\0oVŽüæ¯Ha•ý$ì¾Ã;GÏ¸ÖÁ²	 0ÕI¢æÍ PE¬I”‰´Ú[ç*ðôFg~„ P·üüÑAKÜÌ¦\nM€Y†Ñ\n=%[g-oðöËÅ¼Á\'9	5Ò8àpúä«»ŸÞXà=ÆËh÷ãéH4Ë$\"A$¤t‘L¥LçåÆ˜¸Ã]½–ÈH\rE¬J‚VV€>s¸ç˜JZ¾Ï^\0¶?JE¦Ë °ÊBóžŒAõì°Ñ,²Ò‘#CY¸¸\0ŽŽæ.¼ÌÞé®(™²R,¶	\r°÷N‘ãQ(Üq¾Ð\"Ähº„â\r#,[e\0ÿ\0@áhapÒ‡¶ÍQ¼\Z=`¶É’ÑdâÈ=\0`W¦H{®fú¡Úê4VÚg,˜$OÚ\0ã€\0.Þ\0\0ö¶”ZKÏ#¨-²[,’ÀÎ¶R­…ØK´QåŽ·y×¼‘ÒŠõÞà`\0¢0\0 \0’ÕîÑJïËYd²I!‡lN,waæ!yøæ §þþHPc¤0ûwŸÚ† 1~\0d\0\0\n€É%•2Ñpr¬‚I-–	gT|F®÷œþòp×€¿¦š¢IU¢é¡©ìk\'[8 \0A\0\0\0	\"Ý@@Y$€È¥#O|Uã¼~¶Åo3†ªÏ`ëYóÚàýKÈÝ€\0À\0\0°Z@L/l¢\0\0I ‚$Ž*˜lŸN»bw&#ÅsÛiÞ[#ËÐU\")ªØ¨\0\0\0\0\0€\0E!¹D\0\0\0\0-PÈ1]µ³+‹J¨úTÜÄ²-µ5áâ}Z9åÑ9•6``\0\0\0\0\08\00É%!É\0  \0ŠéýÃ‚?„ÊD¡Ã½­âH‹þ‚½2LÝ&×cY0„\0\0\0\0\0@&I-²H@ €H\0_ÆžRmÚÐ‘YÜE\'äI¾]±n,ÅPÕÜÀ\0\0\0\06\0‚I-€@\0\0@\09K=üù±cl£#ðoñ¾lÄÊiJºéÙkž\rxÇˆxá\0\0\0€\0dI$\0\0\0\0CûbŽ¸ÁM½6õ6îÕ¡6“ßgt—Ê\06Eúÿ\0àV«¨ºÙç×|Üa¢\0\0\0`H\0\0\0\0\06Jq}ä’zÐB1kM6Ú9µ—ÿ\0ý§ûå¾Y\'²öI-²Yi²…Ì€\0\0\0\0\0\0\0\0\0\0Ö9aA¢‚K/¼ýÛ*Ó“ù¨Aí²m·LÐÓï%žY4³Ï?ñ\0\0\0\0\0\0\0\0\0\0\0\0\'M>Ûïîûmõ»K\0\0É5šI$’`\0\0\0\0\0I$v€\0€\"‚$QaE\0\0\0\0\0\0\0\0\0\0\0\0\0$\nH¢)0€\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÚ\0?ƒŽGPôCÝÌ‘öîB9Ùg¨¡•ôb` h€1&æŒÈ±½cRRFÈ:ÖS‡äCÄ§Õ\nWƒèÈ‹Ât¢åÉ‹ýQ…Ýtd²ºMž`ž\"Njköþˆ5‡5\"JáØÂÀš]Ü¶bÈÒnãø-•÷°‘Ä\\–Ø,›v=ÇLÆ¦¬u¢KkEÏö#¸ÃêælÆ k½Ç±\\¯¢2Aw^Hÿ\0„rÉHÅ®ˆ™#XêEú\ròF¤ºèGý øGsq`GUDiv h›Äß\"Ú„$Õ±+Iæ&ÒÂz´ºæÈåa¨ËHkÝÐkxn¬xÒHlËn°@Ñ=.M ºCT®Žåšãk‘«;%¢!»VºÕÏ#¼%‚YŒˆ\"ëB8´{‰R-ÜƒÍu\ZÆ¤gcÓB7ì+h<ãr;nèÓhjGkdk™DÕ©‹	ÈÖ,‘m³ å‚×3¥Hìíƒ$%|©‹#FÅÏbø^’<éãkM„Â™·9†- ·ÔxÕ”e°ŒH÷£I‰’{è´(W,BXXÔ„ÕtjÀÈkM¨¹Í.<û¬¼õ4ÿ\0¥Öi950I¬–A8Rô_Ñåµ³—Ê!ÍÌhMe±¥ÌòžéL—ÄnÍˆÀÄcÑÍD[x\Z]Hù‘§Ô‚:öÐŒJ?Yz‘mµ#•c½\"ËäÀÔþ‘ù‘““\"Õ#?jj±´M±0Ž¤ZIµüÕ¥Èï²H—1Ü–ÆœOÀo¡ÔmË‰Ðrÿ\0¬‚9A6ÿ\0‚všA]’]HÔOäj™{DõŸ§ú.ÿ\0¢[‘“[(Ü…ßQçÃ#2¯dç ÒÚ ÐÙ×q)‡|X‡=4#<Ç(JÒÆF†Žç‘ð,–†Å ×!áW9ÈÇˆ¿ØÔ\rlBÚ‰z5bÎ±fiÈ[÷<ê,´A]›¹=ØÍä]Ô…+Å‡8±	ìX]Ûä÷_RÆ‚XP×4@ëêÜÊzÜPFÃŠFÉö\'âi\\Öó#…ÌÚÀ`“yo/•#…\"tþ\"…³Ø\rNŽa)vg¼ÁÂ>OÁ_£EÙµØ”á·]Óe5Ê$Úim”f“•çÉ	žM]Ñüºl¹ØÞ÷\"L5Ì‰\rÈö!|\r36\'ž˜%=°I+ydØ’I& ž|‰Óä’{I\'(ê^žÔJt´ÁÌÐ¶$OÉÌçh¹†ù‘²CÝaä\'aè³ê=4ƒÊÿ\0Hv¢¢“`\'ÿ\0±CR7¶F¼¨ð$CHwÍçˆæasfìa\"&Ù$‘á¡®0bÞãjWägBKøÁ/ø5…Ï]1§Ó™Í¨ðpA	cØalŒ†¯›r#?$k¹ð?`þLk(kýdkrý`‹ˆN†Fˆ‚Îz,^Ó¤¹ì&vâ#¶¾KŽ‰û\n÷~ ;-Ö(õŸÐÒMë¯rÐ·äùW÷,J}œàG·GÙ(Iã²%n7Dh’£b»\ZØÙ²ÄXr­ø_S _6šú(þI½¡Œ¹Ü¢~ý^¨òÒQ½Ê‡²­š~ÒI»í>½\'\'a§}˜ÛÞÆß/aÿ\0Ñ©Ði¤ö/»¡!ÐgXŸNGQ—M:ÈÓ\ràêŽ®¤¾››¬M‰D—|ÄÇŒ‹{ŽBÒO˜M²G;í}Ø»Ã¨Ñ‡:BÎ‰µ]——<–êM 2V÷ÌzÕ²Ro¾¶ˆÉÎö·™’;kHx…;‘Êìƒ]t2.÷¡Éä†ç–L¬KßQ«5îF©1á–FòbWÛÑ¼¡+Ø»–å—›n`™¿¸‘ô#:AÇA\'\rnCì°$ºÍ\"4Îž\\Œ>ijã°è‘Ïe‘­Èù0Ö}†£¿_¢-èÅ–ú	-Ê€ID´A`Faò)õà^ÆX|ÀÐðÛàµý ]{!d¶—ÉN¡«äïÜ›ômD™z¤<ŠeÍöEÙ9’å\r\\÷F\Z×0|˜úè,#q)Ozg!d›$·RÑäõ4d·´ ym‰Ðj;Þ/20ª§¤cj`Ùô+E;Â˜Ò_FGqÐïCƒrzj T^d”þ×ùª<IC%b]Io\Zè$Ñ…Í‹{ZMèöÞ­!.R]D†×)nãÐMüá%ò<¦è{Žƒ öIá¤Ã9>²à¾ºYI\'°	p4Ê‹îÅŽ_µ†µ^ä\"6[<ˆlÛà„<-;‘÷#‘§1.òC™±5íEžðÈÄ\Z7x#”Fƒ\\¯°·›8ØE§\ZXè:–ÃÑÔ²c¹u¶À’ÁÉîX±;2?á‘ÈM3\Z»bÍ­Ðw2rº\r!¤w\\ƒž£–“ôj³FDáH¹«£ó”ü—¿9W»…ÌÂœ¿‘ejY¼þFÐfNQCè+ØîDv?ØX³/ÅˆjðáÁzÄ›a—êdí¨‘Ô®\Z¿a«òä‹cœ—¿!+Ç‡àftØ¤áÝÝ´wz’=_Þ„1#ý²Ö=whNYÄD%n¥­¢#ŽK¦\"^ƒ9=JE­1xë.–Æ]ãý	¶\"\\™\0³Fˆÿ\0tî_q/ú;ra)bØ›ØBÐ_ÄzÏKÒ]I1»&ÅC 3Ä»n†Ër¥çc\"]ò _{\r»\\¥û³ Ñ:X‰—–ó\'–Åv\Z·2Wè8a\rh„Ü˜Õì²4WŽ²5ÌGCNbð.O–¤[\Z²ÆÌ’Ñ‰înßCB‹o±\nÐ¥è5ÿ\0K³ŒœÚ—957}ˆÛØjs¦–l„‘tå¹äÈhÓÂd¿¢NûuÔŠò…cfÏMH”öØYZPÔD®Ø—Ik©-W¸ÃÃÂ÷\ZÈ×ü£_Â;		g£X°ºb¹§\"Ä÷±€Í-Ùò%í›ÁryÉƒ²BÊçöìýG—¸¿‘¶ÙáÁö.gâË†Ëk+*~ÂVì$î4Ó{¡.Z‹g1%#W\\ÑÆOqX4åØJÏ Ð‚ê”´…Õ“-oú[£2{_½ê¯^Ä«­esìˆO±=ÙsNCt=ãì/tm»–¢\\Ë±wî#ª|¤èéa®‰rƒ–IïîK“/ÓØ|åÈIâÈî!ÐQ“ú!‹ÏDKIu$×¡!\'s–ýè$ ¥„ØÂÁj’ïÿ\0MØYJâÄfÝØž¤Ýˆ²KebwmóckZ6,û0D1{;?f iÎÇ#¡vz@ò_\"³\rì\Z=lNóƒrÂÈîS6úžÍ‰ä5[ê4»–,ã=GdL±Ùf4èB^»2É¶‚±ß±ÌjýF”8 âÝúDo ‡ƒ¢ñq¥ÝÑæðBW‹ìGqñs&akîCÁ³bÆÈQÒÚ!)±)Œj%¦1‘§ª°šš’XÎFÍ«cAä54HÑôèÉ62tJÛ­à]:³Oo ·¶ñ1Tq7Õ½([ß4{.â~Ã# l’MÑc÷+9ÉyÍ	Yõ]òë •ÜŽc˜–¸Ø£We‘+;¬-‰Ò>Esû‘½x·yð¦\"Ó\rï/HÙ>lGctKÚBXV—œ9Ù|±.ìš}Ð·q®´~‘#“äNù]>ÂÚDunÆêø9ò4`“ÂHm§A?è º\'Æ¹©„(É=ŒœÅhr6å’Õ+ÛWs»ÿ\0tAöÀ–Ë”…r&t4ZKæúÁ±wf¹–¯tmžŒžØÈÔ>ÃÂô,–£ ²mD’˜krÇõCYÌº\rZØZ\n\rnÈN|™=#Q\'1¹dØB;rÈÂ!C þËç	Hã$£c6S°”gsr–£=°$ÛžW7A„Â,æCIÚg(×!8Ó{\r%?b5nÓ$-Õ-ú9²ÑV–z‰˜îF^SÚÃØ4ØÐÒ½âpDtúØjí$K£á}EåÝÇ°¶ê/kÌ\\?HyKg`¾Ð›­ðÅ·q,?Ñ…ò$êNøœûQŽ56š>¢ÙrbYèK‹…£`Ztø,ˆ…hŽG¸™âRÜnžèkš<B{8\'¨”Ä²dDÒkÚÄ½jãî%ÏuØà•áD[§d”* §4è5ÍÈž¬»\rLø¡­5~Ø‹>‚BBg0¤f!@†\'!A2+IÛ,;¤x#fµM–ZDÎú‰%£‡ò+1;V¥°¤J-¬²Îè›	ÛÉž·›rÉ¤¹Ž=Kr“ÜY½^ÖÚEÛ1Ý$í/T6Ê¸¹ðNÊ=†©JRÑnäIYEàÉ³Å\r!X‹ÊèÅœ]íXPOfh†Éã\"o.#GÐjé,Wyo²,‡ì5£Õ\\mÈ°••‚#L¬†Œ•ÞËhÌxN¨“ÓQÞˆt#‚2s(¥}ö!§aå¤\rnÇ‡ð5Ë^žÄl¬%ñÐX´YA-ä-ÖÐ[—Q!{ýœ™4ãÌ/ìh*pæÍ¢Bsm~–S5\"òçÀ…µ¿Ø‘úJÂgå+±õ#‚^„CðZÚsÉ\r’šD)Xºù£eÔwr,UÌ¹o›¸˜´}ê”O±´OÊ$´M.\\Y±=3YNåâÕÓih\Z³£à…=R†aÍàHM0Ë“i÷¹Ï“DÞA¿~°&ú#\Z|2äÇˆµL»z¤$d|Øô`ä7-…ùBO¬‰,l.iæIah˜KW\\„”F‹\"Ù]«D	yÁ&èºD–tº“W5f$…§3tK5ç¦ÖPáCÜi§AkcIoDA>{‘*yàJtÆjy÷v#çöD¯+L\'sãlµÜJ,NXÙ2PÜ¢æT<™DBZŠï&{Š“Jw›+@ÆÛÛH\"buÉrˆê`ÖT	¥Î	&Ñ‹YÜÉË‘î±		.¥©	ÌÜkìCIë³!8;¹8fŠÉÊ\Zî-ÚhâÂn£8‘ò`kE­­‰Xœã•»ä%°‰Æ¢|Í\n7ÊäÉ9´-~²¯˜½˜½Äæÿ\0þá>¯a:Qð*ÜH¹±-rxFÍÇöK·!0ÑÐ]ZV-a†BM2)Åµ\ZÊR‚2¸ÝºÏÜ5d¨öˆÆ„I¿±£\nP”\\ÕÙ\nl~ã¸¶3~ø4Ûú‹·Aœ¨Ÿ!oHË[ÐÛ«,\\˜¤ø\nåŒ)#–Hå‚?Û!#CZîC‡¨ÖÃYœ$Ä¦¹m+ïcµ	ˆÒâD›ž‚[eêAf®†^D‘Ñ‘	|	(ºÈ˜v‘_\näž˜wcM\rR…lìÅªê+;AâXhE¹}ˆSnèr–YÚU˜‡¾ŒvõÐHù#bøŒè4h…›% –WƒnåŠþÂÕ´ù!O“Ôˆ•g¹g4ðX§±d|³Eìž—zÎãLê•Ø¤ÛXÌœš»ÐQ}vQ1;\ZF°auÕ\r-»d;’»}‹¡ÏchJãS‘³¾âbË»!—-k’R”šbøBl5Œh–rAw\ZŒæÍ>£PÛYz8Ó9,äž¢&ÛÜp¾Æ­œSÌKþ‰ ½)÷ì]ÖòdÖë%ýO±}åû	ò@Ö³Cc–H[ÿ\0ÄGØÏ³G÷\"#Jß¡#r\"[9Lü×ì%y$Ô¦Ð¢º½Æïˆã‘gÕK¬»¶!éÚr»œŒÐ“y´½†„I\nÅ£„¹µÍÄñ~D—Q —·Â{åŽƒìÈ^ÊÂZÚ;{„›:»’\Z³ »-’?¦­×-,Fœ5o±­í¹´ô†%ôCœn$kq)ÇtÄ³kèHÓ}Å·Äs7OQJ0$ºw´ç–ËD%‹4ìÄËžâQ§Q/›6Br]Ý\rºê%‹å“‡´Ù‘MðI¥É1+9.5¬—<F× ›Jã˜Á”D!Y)ÒÛ5Ü–)Žç2É”`wMãn‡`òq•vaËrÊ\'aË‚ŽƒWVˆÄ;fÚ4°î®&œ\'ÐÌ¦´›±r(Ôk”Bn!s6hñþ‰F;Žñ*¶q ¬no îP´»\"-”ð%6˜!¤˜KmY\n%Y¶7n™f\r{‘¼Ä°L¨Øj\"=Ä•âs±ö5VÙ”³©úD G6ì>g(EVÆ2ÜK9!?fâÇYÇ°™V^þÂÏ*÷jO­ö;½}™Óåõ‘·žÒ=ÅÓø	ÑRÝì6	5õ%+6ßû&5ÊärùbÒ¦ä¯\Z2$è\";à¥8Ë¾.ÕÙ\'¼4p‰”ë\ZÇ3tl.GfƒVÚˆÄÁ~ë»nzŠ-&v¬Í.êÏv3Q•“¸“´>ÍrÉ$s“ì[:ëì-¨Ëø\Z¥3LIèp†¡¬9Ó}Ý³\ZÆÇ\'ï2¤fWFDiÜ$OµÑ§Q/øÈÍÒ\"âß™-–»éÌS,Û$ãœˆñ†„¢cIDè$Ã·azh$™môpÈQ.òÈ–£1r.¥r2\néz¯%ë	h³¡5¥–‰ßRá_·,²Òäƒ“/N3–Ež¢šm+ÈæbŒ‘‡¸ÕÕ°={è5´_\'Y/|#¢Ã„£ØiAåÝò(Y!¾øc³¶w\"o¾F’„û4%*f9¨æÒÃM)í$6i7eëv‚Q¦2Ìù5/aÆÎ\Z\"ÝìeóŒ‰l»Y!YCGe­6b[­.ex®öB³èvÕó\Z—f&Siœˆmß¹ŠPíÜxú\Z¾Ç°_úA$êjf¡Ë`WÍŸ’k¬ßÂßØ¿Ù»žÚçal±pºXSö—lû2Ër.¾Z?öÿ\0°½`±Z§àÒ¢dö#!|Ïñdå=×Ü¸#w)5¯ùŠÇ>s-0È_é‹!æ_q³,›]™+ípKÊXt¯Ø\'åùY±)5ò,¿0‚©9-ÜH|Ä¢ùbÇ5}§ÈK\\Â/ÑÔÏ‹þÈrž ‰è;	tçÈ‹½va.äYr#¹Õ„aäJVü‹÷ÁŠè%xgaîê$¢q³m}ŠpÎ\ZŒ‰EÕˆÃ”Y\ZÉÉ®»M¤¹™ØÜ¼Ž­&—µð-š†°5†“\r–lnå’ï°áÞU´é8NÂSek^E¾Nk¤²æ¢Ä\':FF¬†Ÿ1fv_¶-&Çv”+†Ú<R³©\nkt¬®CQ\r‘wle™”»	òDÝZ´Ô+\"Úä…xë#v‘KÆ	jÁ|M„xZ².NÂK6j˜]†šzsHKV”3î$°´]\r$óu©fºdÝµ&¢»•œ’Þð6áî³«ú·q3Èº\\Â5ý=á‡ÓQß\\›uéÉšŒÙº°°½¼‡ÍwìŸs±ÜKñ¢>€±û°Äìâ‡ó~…qþÒË¡\0ªk“ð3)ñ,*ÄÊ>R–ÓìJT‡jhÓIm¬òhj0ö-«¶\'T;ß=‹}—ÄSšüÇ0Éò^9¥î4‡±ŒaXÝÞV7&uÄ”ì{™?«–»;ûW-µ‹t?Ô\\œåü¯´ö÷1]­,\ZÌdÖîèŽYÁËS¯ê6he©µÌ\'—v=z	?¶(ö/î-ÈFÒ+ÙYê)Œ8Õi\'6Ê$ì”\'ÌX+=ªSbÑ}BZðö5)ýÔÛ2ÖDNyàKÜ±ÛºÍ¦âMÚÊ°“ÔÂ=ÙŒBkRíØ…ô¾ˆÆTl4šˆÊ2[þ`Z‹ÍÔ[#Ú4Ée…qÂùB,Ôµ²,ú¢Äh\\NÎ|ÙVcs„/hÁkßãj[‹	=eóœÙ‰]¬Ž1kM9•«4[[å1l™}p9g¯#.ï$(z=d˜…bÌå–+/`Õ”]è7«Õ—zÙà²\'\rÜ°dP’ZrÜ$‹£Â.²œÜ\\rÜDÂ´h,áRŸ#y&›!ü„–Ðb¹`|µ!³ÌLL‰1rÄó´5uâ•aX…|žcK²ß3ô‘sCÖ´uì\'ïÜ$š¿jB¹­ì&}<‡fñÜ»Ý³Á\'Kå—øÓ±3•¬Kèˆ»Œ(ŽÜ¤Èôˆro‘ú5$YØê†1g] Ösï&ËÙr ³;‚ÄãÀ¤ìOm…ƒo;-Zµy£å÷.å­Œçìlsk±oIáV²×„_ÚÍÆÅi+¬ÎÄ¨Œnào]ô!æÙ¸ÜÍ²r[X›=³b¹ó¯ñ/„°+ksä»°¯ÊYB•ÊÐÆM9pôFÅf)M[âZfn˜‰Zz¢3ÈÄZÂ³¶™°žg:²-^ò÷$œYeXˆ+o„Žtz‰ävç9&¯+7ú\Z›7}ˆi.54²£\"VvwÔm½`%\ZµÔl5r»W\'L#œNä¨ºÆZËÂ%«-$»S=0¬ÄÖíJ\Z¼…Ûz“~K$DnÉ‰JVéÂ–£šhò‹9\\òÇœåŠtBX6žoq½Ð”·3v4ÚÊÉ	©J ¶O«!7)Ø·\"9BÕ‰.¬Ä¤£/2….QÏ\"ÍØÓŽ”_;;=zS§6]!¶Óm(›F;ö2ÙŒºÎã´8ì4Ý{¡©SbÅmö1f[ÞìÜê[û×?c’9CRÿ\0ìiÿ\0T|Í™´»=…»Ûî2OL\'èä,~½Éº›Ç±.D\"NZ}“UË°–]—þwÔ°îóî KO%RQgØ”Ön€Œ+>A0=\rÌ¬a#©™°¤å“öOŠœóó[/cÊ¼Š¤ÏöG°?¡šFó{\rUnÈïÜx/ùÃX²ÆžY	jÕµ-¬ß¡wÑd}m¡¹6ð‹E‹Y)L-ÖEÎ‘Å!oJ‹œ½ÖÄ¥îI­%w‰^|•œÝM˜¼m¸¯7.ÖâVzÃ5	~õ\ZÓ™\ZÈkÝÃ4„í¨£d7ÏªÞÝAi„ÙŒoa‘0¯”-VêÌiÄ°BN[\ZN4Œ`÷²v‹2S¾§$_$»3%©ÖX¥¥6ÝàSÁkß¡-dk“¹*Ñv]$òD.£™ví¡eg9m$4ðïÌz4ç¦úsì“q©%a½¬í#‹ßÐð–ZÔP¦V5VÖúm{±Yµ=¾‰»¼h6âÎ[Ë³z‘+«,ˆîFø-Y\\‘£A©Šv[ndËÆõ–‡f´—”ô¸Òúào}5ÓØˆD%	›žßì`Ç•mKz¸-·—‘­ÝôYÖ6›‹¹ÓÅ&TÐ’ûÖÏp¿\"vè\'ïä/{ÌÉ[¹,kº\r’Ö=Ù O-nˆEê™w§¯Ù	œÁ¢Xóz]’ûÈ’Žo(x3§”¹±„>d(¤#O¡_îs›P¹\\¤ÌÑ$lèûàÚæ÷bÎqG²-M²|‰S¨xGë>™\Zé©>!\rvÜ}3ƒCàµô3§V.^ÂÓW¹óN“úYÓK	¤i¸’âyœÙ*øý¹\Z(¶Ee¿!aË,á½-ü!»«èÅ‹/¡•­æžâi6”+¼ãäQy²4QëßAæ\\¦3m´”k#Q¬ËÔZD¡[/à†6V.­<„Å¦Ûß=9‰Ý%ï‘ÍãOƒ»YFrâ2‡µÙ—z¨l{{]{§8&m„8x9Ci®ºça½Ï1a¹}\r7ÀÝã|	$›ËÔºV‹“• ›´9ï:‰¹SxÐ•.É‡åuÜ{â­%<“(ÐˆÆñ’—†+ïmD¬ÕîX›V{J—•äVP³Ì—–ƒÝ¾ˆüÎ»¿±ŽNq z	„³\nã›øë%®r)œM>Y(OnË:¹ÏËè|Ü®ö1#þeAAlôù¯—t/²d$Aè,OÈPEïp¸Î˜,W[ÙïºÝÇSa#Mæ°‹ô06»0å(OjãÛ:þBÏº)¯ 3jmòºœý‚Ê1y›?C?iú&µ//aw\\žÆÖOb²!ƒBqžƒÍ¦}T“1È‰\'¯±-slvˆÔ’/¦c¥²j›Ú)OÛA¯ÝÅdçª²u,´®Lè@–wÃ¹bR²)L8d.ŠnÅ8†cä¬Û¼‰CN,(·<	!kgmÄòç±«QÃ›˜ÓÊˆ_$´±%hî-î<5µÉÿ\0NLÃ°‘´”tþ‰”,É‡/Q5=t˜¿X.åI„LÕæw’nñÈRÚz65Ìâ#Mpï.o·ð´m Ú‡*úÌrÁ+¥$“\\†­7˜\"¼ÛS“ °Ja‰ËbÕC“«¨&e®LÎš#—,	´“yÔ½,XM$Ò%Âˆp²\'fÞ^¢.Ú÷XY–º\rxÕ°Óníõ=»!M2›2²©o!©	ºmÌ–U‡òòG{wŽF‘!«g&/Ùƒ¸ÞøŸ/ýO€þŽ‚úöû¾c&‘l>N¿q{ VÙÕ	åýMH5‹›lNj2i@ŒjIrÓ’®µ­˜Ñ©§–ÒÓö÷bÄþä¿»{:è\"°¥My¼ÿ\0\'Wo!°<ã÷g¸F­7`K|¾DÐÚZý‚GSà]Lý<äú-{\nØ_\Z|-ÃQ¢û	ï<\Zœ­û›él	û\rm‘Ê‡¹36Æ‡,=IåÐ¸KmÖ/rÙ‰ä<‰âÒš¼Eì…²öhR’YŸ²\r=SBY{@”Ûžö9nòÄ¡-PšmJ™B+ÞÒMë‹±NùZˆ¡ËººS˜hk©¼È›DkÙ©s¸ì·{òõâÄN)’³x ©¶ÊŸ¬ñ¡¶Í#—#šMÉ/\Zn$™\Z!ìat™&fØFTOa¤æ/‚Vø&ï–†É7¹¥k\Z¡è²Øƒ–uFÐÇÌú\rOlÀÝ¦ci­ì&;²MÞÆ³\nzA¸É;ÞëT_N`]Ç¨‘¥€šS|`°ÜÃ%in¢JSK9DC\'k­	ÌÍÇ&/9&eM¤”½´µÞã¨ZfY2™o™h;=¹…RÖ½‡eì8Òò •¨âu¹š4˜£höê#æ»OÃ»ÂC,íæ~‹jo˜Ë?·!4\r·R…¶hæàˆqc{¢*¸šjSÈèK•¾ê½ÕsWs±k6³Ø[g)ö‡-EË›íÜöy×ä»“ög)ú„„bÀä®X{ÜEjÏˆ\'»¿a¯ÄÃx2\\Ì¼Ž5…âÔÒl¾K˜\\Ðì¬b6µ,®Þ2{F…äÅòÎžÔ‹«Ã52•Í,ÅÆæ&Â´-®ã°¬¹±ûŠØÆ‚[²q¦åÕ•ùŠ\\`•6XÉÉØJy[=Hvä$˜Ëó¨²ÛABoG…\n\'#ZÎD†Þ¨[¸Q¹:4#»R\\¸ž×CH“—ÊZ\'Àé¯\r‡soA“À”ù-Ý”84•30E§wqEÖ™‘Ý1#)<r\ZN,54Ô´à	-µ\Z¼Ö¬=×z¶5\rŽŽƒ+;\\î9cÝÕÚ6É`½{Æ¢W¦H;mrc¬¥’ïx¸¹/¡pœ<\rÑ9Œ´ËÐ¶Éõ$}»8ZH ‰šVDäHd¨ÜrJ]õ-e˜Ã¼µ4Áûf{ÀóÛ¿sgbÎ þo\0öïú5ûuþëýcÇ]ä_éÁ ýÈ»˜nÎP¬¢ºOBîïSdR8I`G%òuïåÖkNâ´¦¡¨•®V†ƒa‹X?f<eÝB™’;KrZ%Ø-úžKŸ›ùŽ€ýnb÷% ™l\rO[h„Jd» Ú:ügú™?:ø,hÔÙÅ½Á{ñ{±{wtb¿NHìÎèˆÎƒsaËµ¥×£Ù}}÷ØÚM¹å	¤ú™í’wè&µF‹%Ð„N‹$\Z˜Q°”©±ÈÍ»àYBv°ûPÕ…=´BYw­ªÔW„ð¬,´¯Îà”§16bR¶Z\ZgC£¹‰ð4ž{	ywÜÁ·käw”	6ë]\"Î¦*–¬6;lêHìhXZ—4gLœ mÝ.Ÿ1´±h\Zý²\\²ðÞZèhÒJíÿ\0­\n k#YT°k#\Z¯n»6ÑÆ¯î®W¶KóîH§T°3)jäÇ= xêL+Ý¬AvæÝ\rŽË÷Që¢Ñn5-ÊŽ¤.í:¡Õ‡7ruAäiËD«ï#Ä.äµ+%ô×BØÁ¬àÉ¤DŒX³ÜùT=/èIi«Oú–]ÓÛW}†±‹<‹¢þ\"Û\Z””´Š%	-\'ÖÚni¸¨|†‹u#iç¹Cq—{%®ÛÀ2ºòò/ìêš›b~íØ½¡’‚T“Vî*l»²|ž¶Ý‡½þ¢Ù³Qá^ÿ\0q< }ÈÇ»ôó\"ÖÚòj1í¡Ú^£ýGxØ—®u\'žVOÔÉÊ‰ÜL\\ú\nÐmfknÅ–ÎðuR ¶U¹	…ðJ{äV×û5WMh-\níàYNgª$–vY6q‚I½`^GˆWB•	b;˜)xfð\'¦/a¼4ìAÝaŽÚÊÔ|ÃË\"qh9/{nÚiD·)>âJQ&úH†¥>mc1©r‡Ìn6NMÛl¾‰Çk›ncb¤ÝE’²„%k¬‹-½…Ok‹ò$1\rÃCÈîÆ1êsãŒËpW	Æà,Æ°\'‰À¥T&Ü=Ç=ž¿Ñ(»×,oIÀÝ¹a;nbf,èü˜vÌiNiÑ}¡öA^p¼å¡%xEnhLœËã^ª¥£»S)aøI|þ‡‡×¹\rù³Øcnl —û¾æõû‡kRY|\rªœÄ	S—ÓÈ+Ç:âs³qÔ>bRãbçYS÷¨é†\"ŸvC¶¡¹n1|3É7û·õØöçôØ¾Ù5¹‡±:‘n>	ym¼û\'‚ç:<3q\n\n=îN>¡î×Ë1ñîg¾_²IMÂD9„Ç1Ic¡ó»/+•1©Þû\nû/v\'4ÜÉk\"»ú\' Khmd±]]à²bò)Mj‹ó»É+Ë‰-KYZZ‰y˜E~ä•±ZÊH~é.%á¸²Øm1Ì˜ÓæËéxÚó‘’žJìœ;vXNpÄl®ã\\¬;K˜\ZZ~ÅÄðÓ0EžâG	<n7„—QïvD‘r[ôc˜˜¶\Zy{¾d­KÄÄÙNìÍuœæ+m#j6ƒ^G–N”åÃEÓi¬2ÑzÙü!¥rkÎÂŠÏTYÎu—ºÐr”µÈ¾W\Z!ê2nöÌã¿\"´/éjã…Ø‡•¦G†­îDo†“ÊØ`¥%ª&ºÁ\rÝçq\"MÙLýÒ¸i2A7<”Þˆûi¼X›ú\Z®Ñmˆ¥ÎW@±§”€ë1¼¶ª;\rco°u›_Y]ÊvK,D¢0˜_È¹ô\'X±wŒ¾mëö-]¨{ÿ\0HTïò‡†k?ÀwåäBN¿`kØ¤ˆ¿öÇLÓ †´ÿ\0ê»³î¦.Te\Z-«áÈ³ÃòcåŸ2Ýæb˜þ¬È²¡Ÿð-£%Æ:‘Ô·ÅÆí¬Oá½õFú–wyšÌö9œñ4yëªŽœ„·=,¯ÌXWÒÌ”+ÞDï£jÈ]r+¡7ŒÆLÂ„\"o,ŸÐ+¶§ßÀ5Ð²6æÚë]²%iRÄ—9\Zˆ¶Ù±wdÛõ¬­³q3¡Ô‰)ÖjK¢’òÑèÄÍ\rcdòÌ8ÌKê;Œ.‹õ¾ê]$ÒJÉl>ÉI¿†mõ’ú¦hnsGWòøùÕ`B–”áê,…7ý°þ·y›\nû9ØX§Ž!’¬©™ØjŽ}ÆÜ(u³œ7»ÖãÅ®ic]+s†Lbú?’ê–”âG°EËÜêF1[Ð¶³H…êýY“M&z.L“BP÷Ä\\Óþ	®–ö0ÙoFO,JQ&éŠÍq¤J–€E—PHæQ¦DëNú}¦c³llóS{w}ikxyÿ\0xúßJÏqXfæï,ÉÌŒ\nÿ\0lŒìáaâií“Ø‚÷IàÞhòL5ç!oSùF°þÐ˜zæúÜ™Û¨ãœ±ò±bÖø–pNËª6[“fvÕû}‡SÓ\"¼kçiBeh‘q…¢‘eC²5_bÛrI4Ü‘e|¼	bíöþàD‚A$h‘×C±ÜI\"­—“Ë°’‰Ü},6» Í_uÞí½¬4JÎÂ‘yŠ_­`Úóƒèk ÑB·tþ^ÏøC´à²©º·/À‰¯Ð»êòû˜7*^Yšç<t¾l•;Ò|Q»žCy]£1_bÖãøgª4¥Ö-ÒÂei_6µ9’~FFœ8.w!ûÄÚ{dNHq¼—Rä°¶¡äYBö\";«àEJÉŽ¢ê¾ã5È(!9¸ý%]D\r¨²Ê5\Z˜ªÂ&âü-ƒlâa‹-Ñ¸_}²øeüj#:†#/‘HÁ&·2/F“ËÊÝˆä‰XÙ…Ô^¦2Ã.qHrš½ä}yÏày/›ö=µÝ“‡Éb§ÍóEºŸÔ7¾ÏV|ß–fè=Ý<ÆžÝ„\Z½whRÌJ˜“ÜÌr½…iÿ\0«Ž}¢Æs¯”HŽ_Éæ\r»S”·³ò|=g¹=¤q6¹?èo}ñkn+ã±6~ùósF‘`”ªÕ$³hÓ‘qs»¼žÁ+¶œÂÕ»iˆ÷Ó°÷Sn£¥K¹Ž±ã´¹´Xnûe›wƒŸ\Z{ó&Q\Zr…ì8Þ$wätf%-S£ck°qËfKÇ&K	;±’åÜlÝÙÏÔÃµÎj>BdÈp=GñI£«v§Axµ Éô%NQÏbmõE„¯KO%oq÷hLØp»äÍBh¼ø6í[ì:¸¼2ÒrE/†B·2\"’jy¬Ý„‹¹×¯ø\"/wUðØbæ-pž_rPÒr\Z²uD–Kw‘ 5¦hÓe%™Sf(A¢Èë˜}_\\¾Ã(‘þ¿qð-_“su¯(%=÷¹w9†Íú±ò^Ošò2äCØIcµ§àXWg.¸CkêÅ‰è–áh[êDš×·RÝ©fŒýDõ”Sªöø[\",7»ècRf5ÜÏRoæôfŸFrkg“y¤Šúu&žKÛÀÓ/rØõ¬–´J-ØKl!8VþÈØ	zæh}ÐŽôë¸ùÄûRT7¿Q­æñ¢3¹„°%[$ò›ØùâM0°$wpQïM\0˜mž…æ„¥o:P[`Éu©¨rlP†ÎK™îyMù{‘´]†6HÜ•À°i¸‹H”šMö/~ZQaœÇ•0,scÞƒ#œ4–ºK³ýÑD+*ÍÆº\\˜j½žåbv’Ó%ýàfÚ{(E¦Ìjð,£’…×ý	Muö_è©8þ`TÛ{‡ÐN£ÌKÞä¾‚Wæ>‚ÅÜað<äµ5ì\\mÂ’Râeè;l–Û™»¶	¿Â-»¯ÙzŸ?\'Î³¸ƒXÑ<1â{\'’Ös	5>û$“Ò9	:‰ï¼„°Yä/7¨…‘ÝäÅžá­BÕÀ­Ø™¸Á¥ß\r@¥”ß{‹Ì_“Fm?¨Y‰d¡³oºÐÓ¡3ÏqÚT¾IºÒIË\'‘<‰Ç2I~ï\"}ÉØxÓ›¹È½‹7m¯#8KìË\"\\¡k°§}IMw†(i´’­[¨m)F­“À{ÙÖ3?c˜sELLB•®£°®<ŸXE™[v4¶ô×ú6«kÿ\0±KM¼\"ÖÚÜÄcåv¶ÔM¨ÊÌwg±~°7c˜¾K^üÆ¾G¢u˜ð7ÔcÔc91Í$š/a3\"È‰2p7ÂèXê.ƒ>ãÛxi™´Ý¡$%iÝÏZk±$&Ì;ùqtâ]Å›3¨Òiœ“ÊWz²J\ZW\'·a%ÚËf5þÕqh%K*ã=å(GOÈ N÷ÁŸÓøCÀÝC}ÑvZ/¡àäã[÷w#¤Ã¿þME¯Œ]ûŸû=“´´¢Ù/Ù–%Õy.ë3Ðb\'\r-wD%Ôøi›ßq¦©]È›Ilÿ\0£«-¡4’Á”ÉÙµ¾Gµ£#F1ndW(ëq·,vßØze˜‡<ÖžÃB^Z]™4¼LäjÛk†ªr3%o(¾rw•‰zÊ&[·Aí¾Ã{>ÄÍý‰ÏÁ?é	©J:Äúuo¹\'PÖýÎrð„¬ÚŽ…¦f&Ó¸Úš4õÔZmÝHîxCÿ\0XýhC*7»©î- =‰{BÃÑG8°CV&¹$YyÔÞã›:œ&WnÆq\ZÎ55õ(Qìo~ÈFwP(vJ®¹5ÜJy›úîÒF	Ÿ¢$m±;f?`…ˆ•m	_†&k&ÏD2E-®fì†_ZÈum$¤ƒ”ûÉ,VÝÖÓ¤Ó¦Æé\r­GDÆ6äld¢Y$Á\"d‰’I6\'äŸcp$ÖW„4’CXßÐùG^É+¥2£Aa_£0}iÈøØÖÝü*²-|«×-§¸[V	BlMO1 á¾gq=L\nh¨IÜTUv»£‹¶v—$jÅ®Ì°¿p3œl¸Óì†»û”5Ë{bnY+¡» G½ð,„I	­©ØÙbAå5ƒoy•ŸôÚ~\'W‘&%#º7	_V6ä¯–‡ƒßFLÜ¡h6VÌá¯±dµnüR¡RÚÉèÄç(mw\n=¿bõ¬}ÁVIÇÊÙÑ`MêNùhl¼fÛ—}\r(C³Á©;¢sq;ç¡<„Ó‚mYoröÐ\'ã$ôê>4æ…™÷,;ô%ÊºG}ÏØž-#p––»$±,´|iÊPÅ\næ;¥¦èe\'±5È6SÅÈQÖZdÓæ^ÃŠÅý>KÑÔ–mmÉNé­†…»C¹0(M£Qb›”BÐ‰ãa\ZKI4*™{Rü mt•Ù2.ö†©¤’ò„¬¦‡^Ä¦ÉÏ>Lf)í‰ÙÒ…ÜX‡%…Ù|”âPþ%M	sB½îAóËí²&›žZ¤Áâ%âEt‡úcx¥w´8ë…Ÿ‰bùÃ¾=6Ñ’ÜÚý4\ZlÒ4e¬ý‰[¯s”OY÷xFçâÅuù-IÌ{ 4­íâL2:ÿ\0¨Öá5É‚yj-ÝD§^Wq2&•°çÞzø08BEÃ-oáy‰9‚<$¶BûÎ²üâuÝú!%	BJÉ‹KÛúXCLL¯ÔzI/Ðeº9V‡±ˆ¹³“8ì–1ÍÙNä¦[I6ù0—w2ÕÚHRoëÈÎýØŸLÛûK¡3ázû„—r[°¶%/|Ù…ÍŸ³A¬çbâhnÒ\Z yƒ(ÃO¡‘Ÿ!›xApa°pCØ¨Y÷ Ò7”4h‚å)=XÚš\'4›N¬q©¢„Ù5¸¨4DóIËeÝÖ“©}JÈÔßIæaÈHdo{ˆ[LJ~IâaìÂ\'º¢ÿ\0£\"q±ú†1Bq¡,c•Ì„ÌäO\\;vlÞÌ¾…öbža‚ŸÖ¦K\rbS\Z“±û‘<„.ÁÕ„ñ®ãN°÷@ØIf¦µK¸èKhNØÐd_Q^g{/ö%§<‰\rj˜§\Zìû±´›{8cf36]Kî\'QÒ˜lÈI-Ëíþ£žÄäóð$#D±¡¼ï!–ßA¢!wòÙÙ!‹B¸‡od7óûr°ö+T#dÚ»A ß¥Š\Z/UbøCêi4—&W“º ¯Cº]ö“fÁ¶¹jbâO&†°â>Df–­3#¹%»¦ñ\"’$Ó&oUÌp%ÄuHežK\'ð_\nF‰f!Mœ–H63”š-Š[qÅÂ\'eqhÎÕ–R¾B\n÷wKˆI5k,jRá–š!·Kéÿ\0Z_8sû\Z7ƒ>â¬›\ZèÈO²w\Z©±¼‘1nÂð!nmã,Ig2B…BëlKKNÅ´…Ìs¥Ú›m!Õß³¤iw»Oy ‹ßöT%Éå·#TOä_±ky	6`NN“ìÙk½¦Êoõa³ÒçÂûîÉù5ŒæþŸÑK´ÂúÉ?´‡ä›-Þ6ûÓèß›zâÇ{ÈÞýQÍ‰rYž,8Q B{p‘d,_ß}Ù\"m%>D’€Hí.¨ÄVôZ/±åo¡ò\'l÷‰{™fËAZØÿ\0ìåcŠ5Ùu\Z‹ÃÜfì²ôÂÇräa¾G•ÔÕ£‘$ðàe;ÚÃ_ª²¹”Œ9·v\\¬ãq2vX¬Cëà|Æ¥Î}Å<ùñ‹ÒbñƒÀÝºs=…¹²¹}´±„ežâÞµ):ÿ\0±-z–2èh½y\"ÄöFRÇŸ¡Á±96÷O=Y	ÄÏ\"Òrº+—mÓM=Ov¡¥ÇqYd&º;lù‹^`K©ÈÚ1LKBcKèYÅ îc0Ó¤¶¦ñÔì$¸Bä‰k	¦„6D²”¡s(¹dM]ì×À¢m_#oÈÃèjÖˆ_	eñP-Ä¶×#Øh”ë¹|Ù ˆtŒ›}$Þ%F$i¥\'8‚4µ˜ÿ\0„ÐÄ¤Kl‚q`%wÈ–ŽRZõ/ë¾ö(”<ßSq77`&œ7Ÿc6ýlZú¬A®qp‘É\'ÄìšÃ}Kòçð‡ð0aóy»åòC=„†g0~úàö£i6®0\\Â›|Úrƒ3´\Z{¢¸\Z	\nâ6ifFØ™MìŒ˜ÙX;¤Óõ7¨´/»ÃY¥EÛdnÊóÚb¸<ËÃ$s=×Á‚Su –,9öº\Zi[/#YÈÞÞÒˆ¦ï’œ´å¡Qfn{ÀÚ\"JÈ¹ßÜPî¥(¹.]˜¬±C8Rº2c D»´ö&Ný„‡$KeÃÊ:_fÔ	üdNÂjûêYÅç#YÜR5kAW´GÈÕb{¹P7r¸Ç&ð9XÉg;\rêì‡è¡o”¹D…»v!òi¾’Wé¦¡‹Êd›R°˜K±_Ñ¶‹>„„KI¥ù\rã”ÜM•®bç‰sç\'í#E„ aRœ1Øå~á’\ZÔ›>‚Þœ§\r–Dùz‹Ö’Ÿo2GŠ“ØbYŽBA¢[Ä-¾	¥4Â[mD°ðö¢}6m1‚Ù\\£d¢ØfEÑÒ6”¾Â¤ù˜Hö<Àz+?b6—dåiûû,&’|¾ãfì:Ù—ð„ý o }XÖîwM=O°×\rÜò^Ò›û2Š16ÖgcØÅX+>¹žÅËa3;-MÃx¹´B/6Ñpµ’ÒáçudsÓ$ÖMa\"ê\n‰²MT“Î,7QJI„ÝÉ+ò0˜Í„³mßBHæwç¹c˜‰D±©—¶¦èžEûökQBstµÆ»g\r?‘°¢g\\Á Ö‰Ôd±0òHôksSÕà¹DÆä¥£¨iÎþK²¯k/\"Â’¾„8ÈÄìR{×	C=…„\\Þ?£Oô6½õxœNz‹Ž£ç\\}Q¸‘½ð8ËÜ9nãÞ-ÍŒ¹™iÈä¼XMüÓm$²ú.Ný#Þåð5wb[ˆ!=ùf³Bì!ò3»ƒL†$L	1\'I¥Ä¹ƒ˜Œ’Kl)cO@ù¿b\\w+…£:‹\\rÙò-Tò,Øxn?Ô6ê0®Á9Lù¿£È”±6 ÂŽb”®Ûœ$†$·à§—ËdC)©^ÈµRX“}ÌCóx,\'+±jîqæ§ØIëFŽ¢ñš®ÛØ©cËpßÖ&ÛysØ^MÏqmPBI©ÑîJÍnIp<ó—Ô\Z\'õŠlÅ²]å’]ÃÚ33¼z‰ñŒDÖSÝ.âBØ©8È‘br«·Ð’]Úmïwq1šjÎé`x~â{‹\rI¹}%EbR¸šFð\"kÈÄßK?’(6^I7OT[lM-·ì<NLÎÛÎ‘—µÆ•†éÔ+À¥äšH@A$U¸xO1…Ñe%%äÉu\Z½1·37xIák.C.¶\ZÊV]ÆÞéˆ­k,±]–IYßs5IjåÅÕL\'KyÂlÖ£LÄeíMÜƒ©Ä§\"ßc|imá9ŒPã7œ\'¡?¬·Wv%žCiG“’#c¹²¾¬‰Ëžr2VI!/0…ÎpâÃ–! ÷…Ò|Œâˆ» BåKÜm29g$©|ˆ]j3bL¸ä%æú±BÂ¤\r\Z¥ÑÚy·n=Øˆ·Ô9²)MaV®R–T;¨&‰¦¢Ä,Ç\ZÖŽîÂ,ýÛœ¾ÂARŒ)vB’\\+\\‹m/-´D|¶.™\n.,YÜæâQP•”ŒæJ\\þ¹’±Ù/°Öû³öÐ\\K…ˆmæ9Í`ìù5*á%Cºº÷Bå\r¬­Â6=Ôm;Y…ýÉõ(æÖæ!4d›ÔOVö/o–²HÜÑYÿ\0yºiXð]Q\nS» \".š`2ÁnBÈ½P#}© É‰J%¸–³\"9‡)¹cËB)3)Äš°Þ/ì˜ÀFÔX™®#zYÌZ-YÃÎÁr¢a‡p%KCv˜.ø1m%\\5u±33dÄXtáZ/ÐE$.P5.e8S¥µ.åÓ%];0—.d7e@†-›”)^a4é»oÈï+TjQqÒƒºÆxMš”åÙx-Î2=°Ø–óIêIÛM,\'Ì»í‰{“¼lw§Y_SJq:#YŒÔÈk’nÂÍ}Ñ­$µ‹X˜0xvÃç‘­s0‡gìÙ’óa¦’îu&äO~FpFlÈå»¾f‡l¾ãÐMÃ¦¾È²ú0’ä<v¡æ™…o,4“I¸džLòñðt´`	çÓýfs¨Ã’çÐ_#¸–¢P$%m†b:˜8Nm_+Ûæø¾Âê$éä…WhÏ¸âÑâX˜XúïE\"MCÝKpeÑÕ3£%Øp1¾Ã¼—Í í>KW·‰\n(†q	µÛqxI\n-\rËÚQ9Üƒ”h9fõJ\'›Ôf¦$—KAKmÊË€¹f/Í\'—A£’×ÝCk÷ûªk°jgÈ›ƒØù)C4;¾bº¹3ý—¥äFž!LÒNarµuc\\¦8Ð†{³˜ð4MÔnÅf”=P>…³ðI&BU®|I<œÀxCÅ•ºþ\\ÍÅ_¨FÛ§Ù~c,™ …¯ü‹3/¤ìòQ””l¨¶‘r¹“›ÅÆÔ6‘½;€–ñÛšeÌEž­=Í«hç¡$Ékär \'ð¾Æ›ä	âza»êDº•%õpJs”füÆ¡ÒEÈ†”s\"¼û`Î•:°#^^ÞBÛqÈ†îèm*ù¨|/é*û1ØŠmÄr\'nîOQÍTàÒ¾õÙŽXBFS.jÌ½! ro*Ë¤óÈdIÏ=Ç û)¶¬¹\Z)›‰èÒJtA&üå÷5íë/Àq•ÑH\'RRÞ%yÄSÁßšú\rÛI¼_ý&›]7û‰»9$ÑûÜQªÂSá%Ë±/‘›IA-Û~’4÷þ‚á&%7c¡Û9FÖZl:ô~½…áÅ¬“Hsk@œ–©]—|1¢r²¸ò¹(¹°àc¶»Þˆi«²=­Ü´\'!æÿ\0/u2õ\Z\rê7ÈíTÐ6ý&ý†>¼^èÉ¶Äó ]ÂKj$èÅÎ„¤ìi9sƒôÑ#(i’^JV‘{åjÄ.\'¢QÔlÛbï ¾h¾V¢©Ó—;bì™3E$Ó¤Ës\Z+‘fK>ú‹g`r¡ªÑý\r2†Ý£³M&›cÉ2’+ûŽe<Lö\'±\r!¾`Éç—.D–Wp¼è+szàS°ë1Ð \'m\nÒ—¼…Æ%î‹ìQBŒPwpª)vúú‹ORÉ{¶lYx	·(õÛ¿ðçkV5³Lü²\runU®@HgúEÎuù%Œ¢vû&ÍŒÓµXWxn7%Ôˆ+²sŽV5‘±µ„wi:JÍ¦ÄHfÚ*÷¼¿è+.¬Ÿ’X\0J8·R	\'2tAü‰jß˜û­ ß)ÜŠ†’O›bäY_Lš$‘^gV)\ZM8æ>S2L&’£ìhÐŽnD$\'¸\"ö÷6Ñ-^ÃA‚mŸq>±\"ˆZál\'ÏöÃ²sªt›68ÉCce™\'.ãdÊ·¢w<Š\Z(ËPü¡»l™%÷\ZËÑÐlt¸œ	ÓÜÃqõ‘¥ÂÙî*À•ì=¢4,3Ê¹Iµ´	yúH¾Q4àI©Vl	·ÌÍïVm×øÌh¤úÿ\0Ùð$k6¡D»ÀñrFÄú|\n(•%Ù!‘)Dî}Â<¡Ì^WØ¤vL$\'Á5to+ýY¶m-´\'\Z{]+#ªJ~‡{cÈ5Zµ… ‚=¸wºð6»)üu­Ï`E»ê#X›ŽYï+5äÑy{W¸#LÁ«¶L<ð9Ú{˜ÃìM³µs¨‚^Â[¨Eû\nÚW°‰‘{ßr:±-h•Ì•ÜjÃ$ˆ–ÖsÉqº&ùcÃî[Ô\Zý‹º·06Æí#rwš¹9ÕþF—±Yu,”àEj\"Zž]»ŠöÉBÓg ÔÆ7ÉGn¤üv[´æHÜòÑò†Pz¦±ìy#Òj9€‹˜eÈØŽmw°Ø¦a¥Ä°;ø#ü:\n[íJ-e¶y—IÚÈr)n2—jî4Z[A8ie]+ª?ÓÐ¤·À³DR\'òÞHéea&x“i[þâ$;Iý	)dÐÙxhIJ)6\\¥¿ÐÅ>\ro7xþÑ1GQ5èàÑ¢-·ì<.lÛ*Œ‘Ýh˜ä¡4Ö£ZØ§\"—b&AQ6³»oAJÓ$“Ü‹æèp¹L.Çk±D«ò\Z9Ø\nÑnÆ™¼¶’\"´B$¡Y‰ú$9,žì¹\"<0ˆÛ’]1íô;‚Ð×‘¿ð3lÞ†:U˜|©²>†,°®ŠoØM$M×I«1­z\ZZð\'ÎfÃ	µôžÒ\'[¡´<OÚ}l–£ÃOÈ¬²yò€mÒ­ì‘>F°ý?„ß$ë%¿[Â(;	\'Á=ß#|än(ÛZ“Ì™$o˜Þ÷ófÙ†G¡#D²d…ÚCTCÓkÜc@Õ\"]É\nÂ+ÉWh%Ìß÷\r-XÖðx™Õ‡oÄ\n6ªåùlœøHÑB	Í¼Ô—-Ãã¨Ý¿Õ\n\ZÐN£`!õTu4B8JÐta9§ŸdroEHIYh‡^‚sÈ]P£¨²6»’–Á|ŒövOÓ=`È1&Dôä4\rÛ“°ñÈ†%\'À--Jïr9Ö^Ã-î1¢x\"FUÛœ‰@êáK»¡ˆî^pÆ¼µû‰{4±Üy‡†™ÙZFw(OÕÖÄ¹Ü=Äpr­Éšö=¬0C—MØ»q;å(%É)D—«LÍïj&a åŽÜ%uƒblË½: o#Ù¨Xl’÷!èº“¿7r°üI¢i—Ã„É—½?´-‘L8m|µ†	ÜËÞgàs–m	«gØ‚›Û½‘‹Ùöî¡S´?$ý`PÓ¯:¦%–í•ûq/ŠS¦ÏT98X&îÑ¦ ì4¾Ë[šæ‡::4Mm™mqÃ³Ð îî\\˜©,õþ,Häñ`ŒÓã(þß+èoÊ_úÅ—§÷™“ôÔ[lhÿ\0 çÃOôÉ!|]CÅN<TW8æý$c>Û™m¶ß6ÇµØÐÝ&í	x”2JKHyŸT¾Ü0ôôvþæ2Á²“á[ø%I1XSÞ“*J]’ö&Fàè%ïITloqˆJ$})+5hiþ¡’Ø™Ž£fQòkèXŠ9\"z7î@†’sIÏ¹“öø‚i§¿t=áJ²~À2\rÆî¿uâi&Õ\'Â¼Š6ê<¿ÂSd>‰pi/Îs‡xCOk,^FŽa–’É{ž&C]?¡ì«•¿‚u-.âm®†8ù’’\nÐ>j­fIW,\n/ãvèK®àê¿´ˆÀÕä†»ä‹Ð˜ZKÌ÷%OLê<2w¥Š\ZŠë²ÇbÊ[°@¦(-ÓæVüÉÓI47×q>ä­–†6‹\rdXucz_ô -BŽgônq)Í¤w.Ó%¡-ì!> rm\"ˆ˜…Ïqèih¼ÁíT[›JZv»Õˆ57‹Ä<nMˆßvËä±¤Ä¹£D´ß)\ZäÁ²õúµm™³_ªHI‡ä­”ÛJ0K©3/2þ™\"\r‚j—C%œ•Ç–^,ÖW¼)À·cÚG$;;kg7”Î©&çãØ›\rž¨IÃ–’ižbËz;¬Øm£õ–ÚìOÑ‹’{™¡ë‹¿qUßtûÉˆÞì‚^Õ³¸ßŸd&yaÿ\0tH„oªFïØƒW\ZµäVí¯eØL›–.~&ÏÛù‚?“é\'ºù4k~é&DÂRl¡NÒ.¡ý@ìdhÔL`ø¬Í%Q,orUN¢Vãcú\r“bïBüº\rrè‡#l–Ãbz)jŽkQ)D\"4=ÄùÓ-˜Õ«!5bAÙ]šŸ‚<#¢º¼ßºù’-\'/£&5n·ñ\"æÖp4ï\nÞ’È…Öu½á·ñ\rjZMôù.‰å!?°Ú\ZŸ;y\"ÔØÝ2Ì8lÆÛ)1µ9ŸG”5ñÕòYö’$GÉÙ®ÌÝôæ@’KY®Gt¨³c¼\rôDý¦¨,ãF!kØnð­¤êJj†ä]hÖ\nÜ%]ˆâM	{“\r\"I¯×Q‰ˆCþˆ–÷vã®>ˆJÉlô\'Aö j«#VÇÎs—*cOÔ<Ê5an&_Ñ\0\Zx4ée¼Ðö·Çô“°ùöö²‡}aG[NGb‹â•ÑxR›×–§ËvJkîŒ’Wº\0®éî±4¼¬„Ð8Q¡m²òX°4Ús¹äY™YŠ|\'²»aÍãOc¬\'Ëe­Oq!%8Y—C]yÈ—gm$Qw˜ÜºíŽÒœÏ,hNV{þqëËA­1¨i£§Ù˜‚w™½_1¥º$[\"ùF ”¶»ÜJšgï<öD9¹ôä(ˆ®oÝÈ¡r$P…®©î-¤5RM×Á~¹Ã9÷’Çºõ’ëš4Î¹<§ÔJ»_½7ÈNSÕ;\n2yÿ\0K±š¨Ãî$‘†ÌmBÄ÷d±Îãæ£LrC!„	„,Ð…ª $#LvDOÕÏÕèÿ\0šZíØè~ÅšØ™-¨aÀè=ãTNm%¿Õ‡Ý\r*Mï‚ÄH¦Ó ÖƒrÃ,ÝÊÛBIøÀ~y~ÿ\0è‹Ë—‡Í	šÎDÜ²ÀœM¥°µÍe …«÷r ÒÛá=Ø»:™™’XK›D±‘jÓK‰*BÊMg×\r±3q€¦ä°m–5åtò\\µqÊÃ˜ìƒÛ™s\"‹é æ´óÿ\0 ²r!;;¹\ZÒSq”“d\"F…˜0‹šÆOÝ6c6Q<&ñì?y²Ú.ß!ã¾kŸ%l)@k”’á9\nK¼‘p=/‚=„¨†cøI8Nb÷¹%ª[’,àµmï^wžcTÃjf¼¨EÖ¡Ùeš+=Þ¤!\Zlšž£wÝ¼“o±(0”\'Ô™ÊJ]ã^ùKih†ÿ\0ì&2Å0·{.lT—õw¸ìžìPÊ†W“–‹²6ãY\\Ýf&Ý‘^{ÉœÊòÈhA.â¹®Ú’Õ\r~,È/è†É˜.]­Æÿ\0Ø—£è6ûæ™)YGª=‚Üf´WØxÍÃ¸F/ýWiSKê\rÇImý‰-ÒRö’ëÈ“¿±Ü0ÛÜmÞò9\'˜¹Ž£¨ju¢Y&LL\"•SÐcR†ÇE(¥Ø‰¤{‘\"D€ÓDt\Zº\rl4¶\ZåFÒFGüBgCØmdÒrÆ²»›—,æÏªàp¶räD”·IÜÜJó1äŠÈ¾ÿ\0Õ‡TŸDøoa+=ð2Nx$¡Ý«.9ÀÒÚFÐÛþæ\Z!§œ2ÉˆÚÒZiþöôÜmÙ†¯Qa°–S~Üêú\"\n—vJ3pºO	ôäDòžDtd/á(iì<ài=:1ìo5Þ¨}âÜ¹\rdrÝîÙ[5&>4öÔŽRÎÈš!Wh§#pRƒVbMtÔµ†)¡9´\ZláÙfe&2éå+Œºj×cdvkÈv|°5¨…Bc\"‘<®å¥YTÈî\'F‰dšÔçîÈ$‰Ëö­$udÞëäq*N×ì5b¢À%-MC‡ÉˆD½þ„5H1å”š;	ÎH7[@£³OC£‚Þf¥ÓyÆ¯mIÝXÞ$™ê5lÜ¾xU\rŽùIÞã|Ã)Ž]èog\r5¹Þk(ò7ñèÝWôkú\"Ù{ŸÚ\Zbn¢~¢~‚~¢m„ÞÂU{qRî¡WÄD!ˆ[Phc\Zz|=„\Z­Â”Ì	œ;éôJŒm³›u#žï´\'0–E÷P…\nhÓ)ÖÚ\npxjèXf¡jÒi9I`ù	y¾ÂÞ7Á%Ìg”p$´¦%ÀôM%E¦ÂP]å¦Ä»Éú4KV_´T6Œ÷–Zn7mF³uåó®š2ì¦­òþ†Œå‰§…œÊ]Å,)$¼g½ÐÞ-’_mÑ7Yþÿ\0Âá¸M<y¿f9^eÜ(›HšeÃñÛõn%¡8IÃÊ7È²˜5—‘	a\n“bRï ¥ºØñ	¿Ñ2í&¡Z^	\"\'¶”Mù›¹c”—nÿ\0é!8„wz\Z_	ö<DD,`lFš{ •w¨ÈÒÝÆ¤†ŒJäŒ¾o<»–0Æ1ÒÀÕÉh–Íê©(‰t{‰ÀÜÿ\0Kwbí)5M&‰6çjññ9j4L?t$Ã\\§À¢ÚB»ÐÄR†1ôlZRqr	_[h¦ÐØtŒsÙófÆ›†&Õ—20ŸHÍ¹ÀÓ”úŠs*2‰°ÆcÈ²†×FJv\Zj“Ë’wcm«\Z9†šÜ{l7›±§ûÚtl@Ë&°^+—Ñ¿)Ër$h‚”Ñ&„„$$G29’¢!ƒ „B uD†¢¯àk¨ö$¹š¦ºë\rSµ“=þD¦Û}Çbh”íÈá&ï•îonšróÐÅÀœ¯áEyÜdÓÏÈwÐlÖ{È}ãNSa‘+¤²Ø¶•É-\\ðâ×}X[/r\\ÉáE’Ù!Ü/û±,¤wð±wïb&8”ï¶wE§vÿ\0zü\røe·9çÌx!É>ã›q2qlÏôzMk<ù~‰~ô#vjØíÿ\0“ñÚ?‚¶Û˜‰]—2z¤ÛW~~Æ­‰‹eÿ\0²á‰æE³_D»+ìª&(4Õñ¸Š0–NfZ\'\Z¸pk¸›…/Kd—7ÍŠRÂ[¿’\"Âjäš8öoØm’¢Zìþ]/‚NØN_´ÎÚ(|kÞ[û\"ÒDZ‰C\"zp²†˜CÒGW\r¶Hu8\\¤åÃÿ\0‚,¢dJú«@ž±½²4S.Ä¬ù‰JäÖó;ÕPªÂa<Ë™%QÌÜœù·\"Fœ‰ù®ÐßI.nø²™{HY+Ð“& ^`¡ÏQ1ÆM%‹%ig\"Ëž¼Îæÿ\0ðþ;™C%w1ÓÂ2/nw ódl±!§)=Ðõ‚ÐnFÂ±¶©õL{åÎú#[ß(\ZÝÜèç™/nçT$Ýù6Q/;\"N	2‘½ùm~òBœsÿ\0¦K¡a1»‡ô\"t´iÇ”EJ~ÆaNéŒa½àOR½¯Ãä]úùQ¿q½Ç¿ËËxw%Ôÿ\0±mÜËq÷¼¿a2)c\ZæC´‹Ví¢œ1”¼•ûå8’NÏ’ý·\"kKt†ÛF¸ò(–á6ˆÝ¾A³*ØR²ý»ÚaËÏ3²&MRï%ÉlžãFe=˜š×f´œîÉïïYÎÌ¬ú#]2¸€™NÒ3’j”KÂ#S‰—f#\r»jÃ,ÄrZbæ•,‹Þæ^ìµø\n\ZWMòå—Ñs‰¦â† ¶2_w¾I+¬=Ä,Œ¹`±¾ÓJåÞeÜnjùVÉ-ß_ ³:M¡¸Ì±ow“ÿ\0aÒho>‡£…	åó&ß¿Ú®ÄÞ¥Õõdü\Z‰•Î‰>)g…q¤4‰\\Q6jŸ¬½¤M;ÛÝOãm	nû+ü’`vD¾`P¯<¿ÐÙKVƒyMF¦™Ôé%´\'q;Ï@M|x«h4v‹æÄ”K£A,Lƒ7ß˜×Y¢WA=›¸“z7À“Ù¦—‘)%±oanOº(K£}dÐ8“äÄžÈ]ð(åÐ›K6ác©¤ùŠS£\Zílÿ\0Ø¯ð<ç†bæ:m¢QÂÔV¬o¨ÿ\0P¥» ç72ß#ž½Èu3Ü‹\\“7q-¼Ï’\Z×ÚÙ*©¾O+VMÕ,_dÝ#iÿ\0M¹1ä¬½x2ì\Z{ \'½ß¨Î\\‰£blº·§Qb~âDojRq6DDÉb×-ñ‹×ÉÒsŽ‹×­[¶í—CJ‡uÕä»]Ýˆ[A%ú\\{¸c#ÔHi-˜—¢Keq2¤F¬Ûd$L®I%ä°mäO±fT¦£á“lbÂ`ìüë¾R“~‹\ZÊR\\*b£ø?â³«ãàrA%„®·y•=\ZCz†Ï-¾¼Jš{¹1ØT-ì,ÚI´LµÔrß»ÕrKXš.CVÒÂ¦â¶r™¤’i¢Øi4®ÖPÅ\"–ÓÑC\Z’L‡/btŠ—ÎÝÄYöê1d:hB<¨÷L–h!²’Cl|‚IÒ¨š’„¥Ù$ÃNÕŸ…†+ßÑIìáàZñ¬9Ÿ³‚SOS¼ˆ¶s;1«-\\FH†nH+k\"–aÃÊ9Mv6&Yo<È=˜»BÐ	wëKš¸µ›[J=ÈM=É»+{‰âOrî„ÖÐI­º–s‡Ì÷]Æñ7\'¸·([‰´Êû&9ÚFâêÐaaÜ±Üö	¦“NSÕjr÷ì\'˜ÛHFA±9ÉMå‘MÆ¹¹’ä{óŒ¢\\9·9Ô~l±-ã,TÊÉeåˆg~ó/„Ë¹€ó{O²v;ë¯¼ÕÍDùp\'ÌL1¡-ld2yKey“’P;\'©	$–š˜·\01Þ>—7z•é4äòa<!Õ•ùQ„Æ#‡pÛ³“vJÕDS­Œ·H³Ô6Ç86Í3ˆÔjå‘‰UR?xO~cÜDµŸ\\¡%FGË‚”4‰âNCëJ,\"väþ‰š$Û…}·þÂlLl2ºAH¥%ðÉ9Úk/’bJê7—vÈR…¹‘3ªò”òdpÏ;ßCÚ†,¹÷¥$\"Cc¿X&¦”$žúˆÔ8ps¸ÓùiƒV°Ö¦§ŽbÃLº¼É-u9u%ÔœüQ:l1²Ñhÿ\0_E±¹°Hkf‡·g1ïéé–~nK8œœ£¿ôhˆÕî5ï`ŸX4X2ñ¦I³Å¢DéŽuÈKèM¢ˆÕ	‰ûˆÄÊ30ÉØ\'á?áÔ-ôJn!XKZ‰yj6ˆHJë´ùF¦ê#)ØHðäM¶\\Ñ)uÈ3%ËìXäµd”ò¢=Ñ°ÛQHÝeài+\Zcîne‘/c_SšÜ–?ú\Z¦_É-fKÁšç8Ír]N}85¹&¹„NL†%â…)CvVºG8‰°ûT²ýP\\Ø·¹ƒn%h:Éx\'{ÀÞ’JÁdðCÝ&Ž[¶åÝ‰å“kA(S=Ù-);mâÿ\0\"NTÛŒ&IL¬­sØS¹ôC’„s§Ÿ1´ÉØN“°¢$/`Š„l”¯q¦Í<§uVªÎ7þ\rÂl²Ì–²Ã˜†r€!/™ŒŠêo7nâ&úYrßBþ&QnÖ†lS\Z˜¡§bßVœÞœ—ž£3”vSxÐWKw‘$i+Nc¤“CJì¶…s\Z»	4Ú4ÃyH}š+!Ø«k¡`f¡ék‡mG_ª¤à˜jŽr±¡\'2‚i$«s3bq=G§$Œß=Ëqjaü™|Ö/}[\ZÏ\"Å±iËD-\ZYv%o\nÌBšsÐx¹\r.„=äsûÞ­+B ú¤“þÆÎôŸé)¯rFX«Gv{Ù´%áÙêëtLoÙ„žQ#fÄ¡_ÚGEù	iuÒ;¼	5šÜVÈkTú#ç7¾‚	V¹Œ§‡Ë¡~Î;ŒÑ¬ºÂHã“±Ñ|d×5ÝM	}äÚéÚÂO‡`i1f»ŠèÃÜ+œÛc‘Ý	¤)ŽÒi(q Ñ-7\ZrÔ¤¸H³µl^4/ú&Z°´Ør‰&”å5ÌF$µ(„	ö@Ë¹žäóî2ÜÏs=Îi§<sÃ2{²ãwÀm£ÁeÜ[i‘–‚nßÑ .vXp;I2Æª³iDPÓ”ïG×ÒÈÖgš3q6‘	ªàšÉ.—§dž[\Z¯Wf­4+d•\r¿#A0’÷­½;2ú‹S^/÷T5;&îÊý©D7MûÜn‰ßÝ\r<I-tÈ/4ÿ\0e\\ÂKìy\n-ð$ÜåØœ„ÊáÙ-»|!IL†,9È´TÆR³|…\'õBÄ\'_¡\',A Ðš2÷›í^žFE´Ûœ?èÓ²y‡ýÝ[%˜¼!;EfBû„¹\Zka(-ZÏ<“\nÊ.¼ü‘ve¹–˜=²; ›2ô÷!FVJ`ºCÈFý‡Ô,+Çq]•\r]ÖÜ˜Tš,•¢æØµCn+ÞÐˆ\rÇëƒí³xó6kªwBI4‡Íw\ZnãØÆ· ‰È×]‡‘êC%’66K£ÁÛ¦ƒwë‚uçd&þÙ$Á?®V\rvÜŠßSi>åÖf“Ç´‰ùE§ÞßC·)ì/Ø%vƒÞBÃÖÜ˜Ô¼†kåsýö,¶Î$‰i‹”t—äð$¶™B4÷B–ºÀÄÂe={\r[VÏbü^S»\ZÍ×Pì4¡îG\n“xŒ1¹›0£;¢\\¯³z÷\'ÐÑ¿Ãd•k>D»HÓÔk_¡;¯·cy#ÜÏSšsÆÞ/@ròE÷™Ír’$ÞÂ5º²\"Sa[L¿!;kÂ# ÓbñDøTù†0Jk¤jÃM\rGÝ<‡ÒÝ¤ÀŸ$™\'Ì‘¢p(—ô;ëv/I¡é·d¬<·Àãk<±\r1ÙL³Q•±_QD›´3\rsE§\r+V¬\\!\"×ø©JZ5öC%ä‡PvwÉ)N4Ü2¦².D¥±u&i©‡|õfRâ€jàÙîÒ/_¡•úÁ=OÆÍ4ôÑ¡›A/N{r,N©¯›jF¹ëFìæH†J¹j|	Á2¢L6Ø¹]’K;Ii~KRë Ï„Y æðr©©%h“5ì‰Krf[ÜL°76%…îX&Û¦WµåÜcÙZ·z|1Èmï>d&Q6Â¸Ø¹‡\'p5ì°,ÂíôW”1SO¶d)&áK5%’ªíÜÿ\0Gú×ÉÌ{ÒIÿ\0d²Oãczr%Þ	&ß4IkÔH+v»%’Æ¡+Ê%ùÈ(„û*~L‹ú6oòCiÉè‘}ä¹\"SØ:—0ÎQ¥ús¥aë¹¬Ô˜¡C³\Z’\\0™³Z›˜&º	-8_°v\n_u¡6%å·‚Ìšq`²kuÉºyNû“^]³ËØ›»‚ƒÿ\0eÌwÃ¿|x2Ö„<ÉXÅ!šn–q¡Ï ö1¯VÆï.’I7àp-r!cm*ýAƒ86êò´«]n‡ê%fižr,(yW\nMá	º	ó…ÞCe^†,¤€W»p¡{î°>ú‰8¢a¢G*ès×K¦ßvDr=Ø4›Yæ&”ÚJÉWhJWxÎ’³\"‰Kb	$†¥e©SÅË?q8ÖÂoÓ1Ø•Òæ¡ÎZË%5Ô>EÎäÊÍ#lÈØ–ægçÏ˜ÏYD\'Í<1âˆµªáÞ/£‘[vx$q­´êËZ~Ð_Û”M;LJ’´õ ÍÈò\Zø\"Æñªßœðq>WDKN+½[÷4RnòÒ^ìµ‚JH§b3šVšîâm\'kkdƒÅð¬su†X’Z´îZT%Êœ®‚™-Djµ ÏÛu,ðûÿ\0²?màëAjÁ]!¾Ð:J·–þEIÈž²+Ä9!“™a¨úaÛLø£Î\\ÇI·b^†½ÉžÇÒ&ÿ\0¾‰dÎ7:„Þù<È˜s”Äˆ¸ê)ç$¦BÓM&žS7!šÎy=‰8Ì[ÂÃíF¶ŽÌR“i‘¼­¬™M“¸è\Zk`§&çB2xr›\Z/`›°èm®€ö\Z–dÒ²Üˆ»u´Ø“‘<MÆc€¡%4—ê1¥y\"Ñóº}†ÏLœÏ±>€·Q„+I*[vCÌÈ³þQ‹nbÈãJ@‹Âˆµ…„|Êµ2Væ]¸—Dr;	ôCBloàBo“w]AS…a8ºßa.¾¢MµÍ>…r=KÑb3&¶kQ_À•fóêåŽƒ›si,ú^Í †-~òõ¬(ª´ç#© °”ö‘TÔÃ_¦ƒb–‰V\\…ÕG½y„åÖ¬¶öDVç5 }%‘!ÖWÝš±5ug‹¤±/>%\".ëÈt÷•„í—A\re£:–9³ A„§§ü\Z¤SxDN[ˆ\"	EÂžÄT¤É2Pº‰âj^RŸÔHÜ´ÕÂñòf£†=–I M\')ù4²m¶±Èk×¹OV!ð“+´\\ÓØdK’üÉy+Ý5xä5M%Ì´Íÿ\0w ‘õÜmqûÀ¯[<¶ð<f–v8Ô¡=Ä0ÿ\0ÑiJî„Ô>i.Œœ“Ì—¿™\'ì±½óV2hïD(?˜	‚M¯…\"ÀŸ1B¢ì„j¢•Ñ$St¶:	qEÕ}ŸhIÛÒO£\ZÚÄÉ$46jç#™4õý±|šJTÿ\0R†h§B2Ü¶ Ç!’½˜Þ‰„˜´ÆÓq§“D\"Ý‰é¨žb­Æ	ÿ\0D¯ô:KœXlm+¶,‡¶ÂêÆMÉ’K\'aÚ<ŸT~Fì,¡åÓH!“l$Ù} XGU^™E¢IÄœâÿ\0A´=D<¬šäMN°É	»±jË[qîºÉ6ÎG\'°ò’¬é¨ÍFƒËSrWÝ\nÒ¡Eª¥£Ýuàú¸­œËn¢“\ZQrÕ6î;šYX’××E÷2Ã*±ˆ4šPå{ì%Âm_;Eq#è>	,3g»!©m5égÖ™\0’L&pø-)®ÿ\0¡ÄKŽ!}ýÇ!E«+{±‘vÙ—MôE¨Unå¢û—Ói³ÁËzõm))„…ƒÊ¬ÔÏú\r›‚O{rê7JO/rIb/w¹“8²ŸÞ¢î›»—±šíÑj‹;Þå‹j¢d¢Tj÷$ä®QwgEÍ¨VkB“æœŠ»¤äšŸôl…4ò„ÅîW1Æn×Â ÄSœq1NÍ¢Í‘åw3ÒÝöY;26\Z¾ôkû¸×a¦µ.).OÐþÍ;ë‚I·¹$äžcyçb	¶ÅîNnK\'ýÑ\rŸQEóCÚ-Ú÷±(“fÌ­÷v%,<‰ZxÔbi[½¡ûä\\–mÈz7¡\nó\n‰„fún%,ß\"4žœ%w¸ùkûritd‘8fuß‘‘\'m†òOÎ[Iê¬*7dÑ(mdÐõ±ë\Z¼…¾ö,‘ÎÃQVày|(kÈNZk¤[ÍéjÐ5nh“Òw&Ó°ë4|&BaZú–xp·QÒmI9D9[\n³Z…0Ì0’b„\ZAèÓÉ>ÓÞ’RïuËÜNÉ¤ÉÔ“¹t;$Ó!Ó°ªlÝžÈM–‡®-°…§L—dÆ6BE\ZgGh!Î\Zßa$•¢á,DQ*-ÎØ1H•‰Ñý;ij“ðK!•ô—S@Ðä}ö6næÆ¬y­uðX4¶Q	ó	h‹ô‘“W.Ð±ÍˆÖ 8^Öó©+2YÜléâ÷—gÒ”š{b[p¬Ç·Ëh’q|Ži¥ÂÔ4ÔÓm!{Ìase”»¶8W’;<rÀ“CjRž‚¦Á€ñ†?#‰CŸ±d®‹?ö71»%fY£åìÜk±	·wró:h?VÚVTí7]™2úé[´®èÁœš÷BšÑ\\Ù›\ZÛL›÷“´àdÄßa¿&WDé9\':ÜØwÐœ|ys&ùÉ?¬ÕÔo%Ž¡PCä4k\"M¶Ýp‘q.Ø`Vžc•ðß.Œ¿&Òv·ˆúö±ž„×øB¬œCì-2—¢´\'[NÉ,´&p ]G:\Z\ZÆæ>âé­G¨àže¾ÛpÃÆü2î¬Wì%™1cès®¼R,§%¡`Î<³c3¤¾EI¾d‘ä†$K‹‹âH\'¾‚\'-=DÂ%Î÷\"4Ù@ðÑ+J?Ù‚=†B&WÉæX8!õV1¹ÊWýœ„¯!šþ‹¥kfÛ‚mÒ0TœŸdC+gS±Âg©Yî9ÚQó»Bj¢b,§q¦¦ØÓüÎ7¿è]¾}Þ	L.i>D°ožƒ•E…k“}cã,%	—„DÍ%}îîô­¤(`š=Œ_°‘e\0Ö$œÄGÈÔ6¹Žo¦åhÉcˆ(n\'îii<é›m…mVæJ¼LÞ‹ôm\rCÀîí	&Ò]È%Ý¹b”]ŽµE%³:ym,2DXŒÒÆò	)žÌnÃi¦ä¥ÜÂ˜Ýa÷D.¼)o‚Wû±±4A¯ƒ‘L(¶ïz[cÛ\"û$•n„¯‚WKÂpÙ(OFÙ)ä§$³=	bå“œ¼‰»Î‚‰fß£BYŸÞÛ	ÔÝ|Œ|ç(“l9rÞEpyè_E¤sedg		‰\r2fž\"’þ‰ZQ4¹ö\"I^ýÿ\0ƒsY—z£S!1õ«ÉŽ¼)aŠu\"Âðd£ËŠAW¾¢Ë_,$žš‰<4:Qy\näðÅ–Îâb÷À–:\nÜ×Qú!äC„îôc|DÇ‘k©0`(BWX\Z¶«vé‡|®Yf’0+†ç]êúÁ2\ZÜH·¡6¤”ò·x2o%Óý*\"÷nWþeâøùd¢ÒZvA2“ue)÷ú3¹,jì6”ÚKÖ2Ø“žfK.¤n)Cµ¹ÀË$[xÝõÉêìžÂü­7è\ZHI¨ZKãbS ì-ìÉÇC}–›Œó<Èy†›¹,Ñ½Qä”æ[w[ŠRÌMÃrfá¶Ã•-ë®ÊB&ÉÉ»o8ù/+ÚÙã÷¡1.íÉ<]^ôchÖý¦dŒwiBê,Z.³ØÚÑ9“¬’%§ÿ\0¡Ú^îö;Š¿µ™\rÑ	÷B¸(õLR,`†ú{\ZýÈ¿rðº«ZZš¾„ç±$Û6\'À®W\'~¥÷°Ú÷ Jf¬l\n\n/#_8\Z¿á“!{`vß2–2×0FjêÆ&ž4\ZO‘¹,M!ö$YEhWbaZñq´ùF£C\\gIGu—MO¢4¶Y¶Kèm¹ní¼î,4xsÍ8tqa-Åe1v\'dg>„÷\'ý	‹}	)É}Ã­l>#M\"×q-­Øcd•™žïƒ+¡ƒ\"œ3WÐ‡J„–²ä(²œè&J;tòE†çòCžVÒricÀ¥´àŒè&äÈZ—ì–‰J›”“ˆV—1-N39ä‰$Lì¹¾ˆL™‡¢Øå&d%˜ÝD³»8„ïr»»`Œ‘½$)‘a!®ÁŽÂ]ñpùjö\Zjf­ž\"Óð„’m­žƒÜd‘ý›i¨¢G$ü	\rèŠû‰„Ò——³-+–G’iYÜx¥”§—’F£‹J|ºˆ¤ÞèBBN#èRVäî‡yQ/“”„„•¥-·RI]#T1—l~âáC°4ÞcA(Q,î‚K?R#Ÿó’“[‹úE.ppÅ²¢4%iµ:/Ú…fÖ%oÎ£yê<‰)Cÿ\0B_À®].g]mFê£Qužb”Æ$Þ6.yÑ”ào+ÚÔ¥tÆ‡Ðz&ã^¤õÐ×.¦«¹#òZpæJ:\'žÈ`Ú×uwE èãòÉd]	C4ÇcÔÐ}àÊ··]R’$Úhk¦¢-G£-È±f‚´ééT‰ËrÎžÇÀ‘¯ÙàI4÷w/Ï$\n0!,‘\'rwËs66†-ˆéZæ	¿1”(cÙ^vÉ’OA7¸œ²*õ×O(Ý%\\Ø›˜¢[V_u™ôs=-2Gpí1ÖÂF;Uä“cmMÉV¼ýÆ’™\nóÚPšs•˜ò7€ˆeyù,o…ea4—PL¦›½_ÎAã(ŠÂmSÝ!n×dW/siÀŒ+ßD^8ËÜzó2J0‡tt=°ižNDÌXÓ6°×Êd”²y[©éM5pÆKFò.Ršo|\r¥¡]5#{v…¦Ò4º[v¦^mgìDûf°\"<’JÍóQº/‘¯µr^õt™›g‘Ò$ çCíJÍdÅÉwé	³ü˜yŽ—¦„Ñ§$ìÓµ‰.±¸˜•àÔBö%dz“vž¸\".ÔLë\'†DŽ‰÷JÈœ§‰¿¢[l-Ë#‘Ô.O¹•&¾ ±\r,Ûõ#ßbFÍµU-Þ˜¡%–E€Ú	ÒÒÑï\"¾iÊ,t÷£‹\"æ®,jªýäÑU¿ØI´	iò/ZTD~Pä8Û³¹÷\r)jFWðÒG²ù…‘=Ž\r§çè	àè¿MO¾72Vî=Ö%\rjk ÊÐáŽè16ôŸqJåÿ\0hKV¸JÑŸÙcFÐíª0`Ý\'Èjõs l.Ã‚ÁHLƒ]ót·D2ãy%ä,A,î¹A¢oD¯\"eÛ¦°9\'yG±2Yœ½}Äc÷Ø8_%Û¸¦ç5´d™ÑëØbK·eãýÙ›öR\\[8ø°’[’vnÌZÌ‹è„KKq¹l¯.Å®ÖØW[¦{0w–†I¤¦è˜“’³ýÓCQ\nVï™(I5ÍÅ\'Itî235’®r•Rã—7Eà™ÐsfÈ&VÆsÈ|å»ð¡Ùµ«ÔCÎºylQ©3VD¶À‘kÑ‘ìF§IåÝñü\"œðÚÏà‰#WHmuBiÝ\rµ)Üo:\\o#ÖýFØšk7HœI8ßs{Q8%®ƒ]ÜÃs_‘Oë‹Üþ±áŠ\"·‘«ŒÒF…Úù‰\'IYPã‘tiî2-¤¹¢’v5Üq	[[]ˆÈp–žBv5àÇÕE‹CnT›E[9ŠBnG:³&¥ùl+;MK˜§6j9š”¶wŸm‡î‡Ò†cUò/ÀNFžb´m©Û‘7²Ô[ù\Zë|H‹ItˆaÕßïA¸oàkò.Ý88•<Ì[n6éÜ†,Œ5™Ô7°‚û7„Ž\Zø!þ¡…Í•võ:‘F+o=`%“º[3²°’B\'Wúa-’ËÝÍXÐà`Á+\rYoqHGº¶fð]Èî#¶Ø™5ÕÆ°O–é¹hA0™ì+†…qÄO$Èh†“µIl¾ø}…$ZÌ)\Zl§[Œ[»;ÆãqÊ×RZ¼8m=ŽI\ZdŽzýiÙŒ²$ï”×Àœ$‹’õ$¦Ãm¶ÞµCåÊýä¼Z?nYcdè¿&:3(\'«¹¼J$ŸBî{~xÃâæÒø¢RI1G$L~äkö[r–çFéÅ˜”õDZ\nç¿eÈ\'\r¦éþµ	i”]Eú/7¶‚˜šÜèO\"b|¬$%Èi?&\nsòðH¼È÷ß;Ó^DÝDL*”ï\Z³4‹²©0/1–ŒI5›QbrM&Ð¬ú[{•´¤\'È±l‰èx3ŠiG•Y«r1Æ»!Šö|„Ù´‰ž{1=¡©f‚j/(RÄÃÊd’“z‡—Q¹¢TmÅFådnìÑ%Ø†ìLšy¹\nÎtódå	\"pù\n´Ï!V±É‰Ñd4»\n¶œNKFDG¿©·ŽeÄ¡§ØÝh^Ñµ³£Ê{§£9âešWFŸ¶\ZæleÇX%›RZèK‹(kÛBv¬˜$ÈvR¾Ò:JîÒW¸“%·vÓ ÝÊyÕÚŸÝ‰¸Vfz.¤ÇR-	ÓS‰}K2rZÇŒŽÇ¸\rîñõ!„¶“^ÖzŽÌœùt¹±š™@æ‹fÞi¦Išµö!&M_e¢#4á.ŒOÐÖ%Æ‰ðA¤À‚5pÕ´ÚKjcÚrŒ‚Ìªa4w4¿2¼‰³Ðkq‡àm(Û˜‘¥ÌÌêbª[ì°›FÔx4$Û]û„a&í.—ôŒIzÞN×±xCO\r1Ãg)ó¬=p!äZL†âîË6\'»!(‹=É¨¸ãÊcF„ÊÕ;¬\\›ª6¥Ô5\'‚YcnÄYw}†{’µ÷<¶òCFIh0MÝr´¦Â\"zhQ¢÷3ÊkšëÒŒÀœŽ÷îùŒJÃ\"ðÖuw\r‰n[*‹i-™E¦å\'þÇk];ï‹³À¹…Ó%š?[u„©SaXR×A§ÞVr°#Ôè†ë÷œ\ngRë\'¡#ÌodÀÁË”Æ±ÌÏîMè;Q>Ã%0hN¦dKìGy¥ÅeàX¡(M®K\r‘ž\\É#‘¦Óœ‰wod,{áDÆ µ5`ÚN{Ë#Pš~ô‘º;˜et1˜æQÃV\\Oà„¬0r›­DUÉ·t½É¤Îœ^c•Æ÷Z–´NlS®j\'AL¨.ÎÝ›&ÉEisÕ#k.z‰¢ê w2¡\"Ñ:?à‹@e¬L`‰Oì°$ŒÖr¢ÂR¥;áÛrÒdžW8°ÊÃú(h(m:\n§²6ú½º`Ë“!Ež½¸Rì)XÐ™„–ä¥(‹FFM«ÇB»:UT:ÖÕ4Mc[Ÿc!¤­ˆNzµ˜†¬äæœü‹6°ýYþá,=oƒ¶1Z¤Õ HTKNü¶D1áÆ>ÇR–ƒoèµ—žÂ\\2æô\ZPÓÔjFÙ¶´½t¢pZ9ˆŸzmÄzl]´’¾ˆb°œ`®‰r\"ÈJ5¡Ù¤´´\']F,ÄˆIÈÒ!J\'šÿ\0„Ý›‡¸Þaµ‘“yž‹q·&8-Ìµîx%.BX××i‰%‰–FæÍ°»º\Z|ÆæÜÑ0PÖ¢qk²ø¸Åÿ\0GF¯•ÑÑè#q¥«¥¸ßh\ZµrDzŒiG‚ëDãSÈÒ³–(]>ÄoØ{=˜ÝjË¡ªµ‡qRM±Æë^äòëg?à¥ËUw×´ˆÊÆ‰¶MµþÄK\rå>ìd÷„‰ê³’&G›Í–°+kI~ÄNìÿ\0{D¬Há†™5iÊíÃÛ¨£‰4K”1•ÌVYm«H‹i¥-]«Ví8w†=R‘eÞaÊ1MÇyÎSírk6V hzÙŒmßYácÈ¥å	cÏ!3%ò8×aÎjI¹Q5\">N®„ÐšîZ4ÎÚ3z±¹o)p„i+rìžŽâm“N\ZÕiýFêÒì˜DˆjÁQ2%ÞG5 µ\ZÆu¹eµ©\"½6ZšDA§rò¶p5i¥u¸sKYcàrfômFâRÂ·ŸtQ­_öÔr\"µm•‰ÝâKîœ9È™†à*`ËàK*æœ4˜¤4Í;´ôè)–xÐIæw<›€ÃCÞG0s–ŒkÃn­ zÒ9-4ÖÜÅöü½ð\Zo®ÛÆZ{¼5¹eŒXöìï#—3^æšõéxw\Zš½ŒW™Ô‚ÒXN`ÿ\0‰+s÷±Ô%Ü|â]ÄSuG2ùŒÖ£]‹nüÈò&š† z”y¯ÚÅ\'CÆYÜj!Ã;KÊb<šæíÔœu×6…l\n(B³ßÝ¯öMŒlÞ¼¢E¥+¥)n6²\"®wÂ?t»{‹dÞ]ßQÄ:ÒØ†–«$k°Y+7 ¥rÔ‰šIg*#âÂÞhùF)Ù)ð ¿-wyirE+°·a¶sk³‰÷ötü½®²¨‘+N¸«¨½Ö[”Ï°×›\"qÝWÏ³\"“ÚR!iJZ:ú“gnº^‚¥”7\n=è²<‰µufµCÕ°ÎW³ÂÜÀÑw¡y‚F™*7TüÚ¼ÔX$p»‘–:Ô‚ÖNRï©·I~È¼•›e·FçÑy|+}‰o¾´º –QCvmîC%2ÈZM;áDØÀ·¹ËG¸ð<7¨šnà–Zl›ØdI¦ú	$Êö\"ÈÖãz„i$¬²Ý»E×_ÁËÔç°°!2‘CÓQœÙš˜9½Ž¹c}‡°ZH»„âêÛšzô-‹…»\"]OÚ†û›¶ ðålFnú1.â	ðØùÇ\rFgà‹“É\ZìL;HšZ¼çQkqÐ÷#ÒIß[r–[î>ÂæÏ„#7.ê D°nZÓËÌèH‹cÂ^ƒ†z¦aes†tn Y-)eÃ´s4\rµ™˜ZÈ«ˆs_{\n8&Ö¡\"“äºXI+gæW˜sÆIäßf\Zk–‚¹Š“K	7¨ ÜA¶ö\Z´Úl‡wý#:DÎ“¯}©Y›—¤ƒšÔL¥%ŽCÃ%·šXùÑ:ß‡F>Øôq)q¨í¤ä¸”wYØ³\"7g~BÏ3ß™»V‡q‰L›±Ï&cØ··°Ÿ‚ð)vK8DT©Ñ°ÊM&ºxv½,(õ\'©ˆDiB–$$â!=†œ4æ_Ãk©E²¡Ì‰¹‡¨šd¥k€¬¬ãD4Âì›V“q½Ù&´÷Ü•a¾,\'\"p/ô;›3GQò”œÁhžçôßBŽ½ºš«Ì«Ú÷BäèÐûnõ!0kqon‡Æä·lqºbVX³ì&ß¸¹Äý†­ï:zÈ·™æ@7K§‘ÏÄ>¼ÄÐfÿ\0`\"äZö@-³\Z’gçâÂ‹8…eï}‡r‰8g“hf&âÖÅÐ‹OrÞÝ£QT¨ÁF¯hVÑY4³öS3hK\nu&±+ŠfC£8V¯¦,\'®Åž£(­(SÀ•[IY´òú‘”;,Þñ¯t)ä¼¡ònÉ2Ò\n\ZnÐ‹-c› îLÖ‹4åÈrˆ™yä@£NººVî×Š^ä½ýº´–‹ˆ±àÞÂ4ÉŠXÚÇ?ƒÃ9õòé9Ê²³qj\'<¹fTsÂâ.O#£L‰-Dv	Jî$­¾Ì]wfMSÃˆV.Yjgþ˜™tÐC×çÆ’ymhÞƒ:kGÏÜ„‘2¥æãkiÂuå·&â6·Ù$ó9‚÷hOœèa†-?#sþ„¿Ø·>äöž…ýF\'ocoL¢*\\Á~¤ç±ûDBc²Ì‰Ë=žýQnD7žfy³\"æ?Ø(Í°û\r¬ë ÂNÏQYQkÃî%½F“q¤žgäo¥.´¥a™d‡ÎD!),\\©3ˆN.±QÐ—•‚¸‡4õ“ ‘7mè4ØÆ´šJŽ±+ØzŒî×dé#+\Z !Øÿ\0£Ý¢Y‘¢e7‘*“¢éÃÙ¡:i1ØFå£˜z¡ÌnÕ–•s=—àÕhíÅ òèŒÅwE óÀXU•¿sÆÞ‚ÊÂuÒ\\õbmë†žSKq^¢RjÉ¿2ÒºÚ\rRQN\'ìX™h”¦šd&£$Cƒë2±%Ò£—•#ÝWÈÓ›Dµs›Su”Y0’™p5vNú¡¸ºZÜÛžD‰ó’FÌ.t/Kà×C	êG5é(HúŠ:ãœ™ƒÀŸ\rŸ§DÞ½s›\rÝBn\\÷¬_söÈo9›ÆGðÀ’ç´\"å=rLí/´Ì[d@L—ª9\\’Y×ÉrÍÈ`£°ÊóqÚ6e‚–h‰ŠÐm×y±-„ž‹¨ªÁ£âq	Äê¨C”Å¿t$³k6sk`CŒkoçý•I]FIRg-!»­x”*i[ö.ÛKršÏäxi–d‡±Ð‰·ßðkÝ’ê¸VPÒÒ½kÌåÁ·¤­éÐjbè„åx‹OR\Z‡{‰Î£™M8Ý\"Ö‚·d&œ­d>l½s¶çCI!Â}EË,”c¨åiµïì\\•gºC“NÂãjÏGôFZy\Z{j;ÒiÎƒ|‰‡É’&×a?’y	ÐCåÏÕ7ö:¨_ðu‹Ú+lËpßqsáoö9;b÷‹ý¨.~‡¶©;ÒÏ3ŽcïZÏNìyO¹ÿ\0\"?¶2ŒÙ­E%:ÈýrM^Ißã$¡.b¢`g(²ÆÜvôz¸í¨­…Ï,…­±²ÃdÆèÛq~^ÃãLã¡a²É-¬ÆˆkçWkû’š‚9\rlÜõŽÅ—:œÝ^9ÜRQI¬³j¥¹/vN Ùh\nÓ†XI3Ö6–MþqÆœ+$î<¾G2¸:	U•½%ntRVä­É[Ó6Yx¿¢.œÍµ_bÆKÌ®èMg\"¾eÆ£È¤mwR4Q©”l¬‘$±<˜°J•xŠ\neøi:!±­2SZÏÑ8iò{Žj/üZ_îÔ8oIÔLBì’\'æ\neçQv§ýÏ¹ÍERLP×¸„´³›°Šs¨ê¯sM\r¿ØÃ¿‘ÊûÚJë#vÌò¢Ýi¹\\MËÔ¢2äa·ÖärK˜ô6›äÌ8UÍI„‚\rµïÈqy[‰¶›$ð;C‘°ì„L“Ä>µ Ð¾÷»Ûèw»m÷™g¡àF¤›J!`x${»9.½-,\\Þ›Â_ðI(îžëÛ‰8ük+‹Ý>› ¯¤Å*Ss{29Šw™[äÜ6ÆD,ß ›gØ„ž¦²\'ÜE¤JÔPeNƒnÚÐr· pÚMè1v“iÊ\Z§á¦½†‹-ÆãW Õf`rÑõ9ïÈ¸Ÿá-t$OÜ[‰%Ð¹…\rMµInj¼QÖ.q]“öŽ¾Ü!Ö(j(V#cyn4?nôÿ\0Ë/:û’Ðt:èK É	¦Ê°|¾cÁ+¹´)\"·6¶ÿ\0‚×6¸¹³ß¨ÜÐ²¼\ZÜ–ÃEÑv®+m/#d(ÏšœŠË˜Õ©®\\‡i6rc‹]¾ãËIædnéot;y&ñb4³¬¨£ü´š=}‡$IsKUNýÄ‹\"[p(‡‘[[hXP·è&½Ç:ì¹-K;ŒÞòˆn¯²1:\rV^p5ÁÇ[nEó?„^²I<I?è³5Uf\\Î.zzÏÚ§\Zëˆ^±ž³þòu¾Õz¨ë¥¢ËFw4K“b%_W’e»µ¼’·{xM¶òÙ*×mˆXo¤‰ÂI¾‰L‰Cm¯x%-s‘ÜÄ°\'‹¶KnÓâç9N…à¦\ZÎ¦×r$òL·n_,ŠÒˆ{kö¬?RmÏãKÜHÆÐ\'a·hŽb!èÅ–}Äù“›Ç18ÏfO1Yåô JOÙ?£G¬A¨m<Ÿk\r5,¶”Lt&u$$±;’‰çFâf’H¸ê,:Îº:„,%¦¸ä£ª¯Y×OÇƒÄê©×Â1\\‰h»’Þ_±‚HÚýI6ì\'lêº—.çS[“/6Z“³mÂgWq´[ MÂMáh>lj&ã6›Ï9s›\"y¾„Ý_ÿ\0Á¾nø\ZI>ƒŠµöD=KO/Ì—¹/~8±<\ng‘,—k®b|ÉÄ17½É{‹¸ò&5ž¤þÉÝóDûóÆ¤ÿ\0KGÙ+ý¹1E–„’³IçY$’Id²I:	æI$óáªzŽ£¨ê:Ž£¯‡úŽ£ª‰:Ž£ÞKý•Fdìˆo$Ô6Ä’K{‰þ¢Qžä¯x’Íz±,OQ¶$MdjÜ”¶KÜ—ú%î6ðÄÜ}\r\'Èä!ÿ\0P¨”\'5N‰¨äê:‰ÒIom	nÍìuÎ	æI1Ì’k<RÉ$“¢‰$“ è$è:‚h‡®\0£ è$è&¤º\'EE©$ó&‰¢h’IæI<É¢DÉ\'{ÿ\0„–K:‚I©ÐK%’$‘ÑD³ è$K%’÷$Kßÿ\0„ÿÚ\0?Á$ÐÙ!ˆR:‰^Œø\'ñg‚}FýHdzóÇ$’OŠ³ë/Mº,Ñ²8JÊFÈö\"lEŠ$iaˆ!ÑÖi4„AŽ	ü%Ç$Òi$Òi5‚?\ZI\'ñáº!©Žá¤`¹LŒ¢ûhÁ¬º\'v06GáSRc)ì`ŸÄI<rjOðÁõæ’I$Ò„«$’d\'t$”._N}†ÆÃA746d¸c†#¡Ö7¢ðÅ$n¢¡$’I4’i4‚8çÔ’I\'Ðž9¬ñOÒ»ÖM»	49>‚v[’6fºúï¬(ÒBl2ŠPøPØÄ“I¤“DÑ$2pf’Iž9¤’I$úÎ“<‹#u’}	2/Bk4CXóPÈKöh%Âà÷fž‚Â\ZÎ¾»p\ZPnJr\ZEê#æZøKiCb½ËðÅb’O¥$Ñ<ŠIàž	Ö}I®8“ãoQŒÔeK\nqÈ-åÇ6/Ø5ôÖzï ãr†›ì˜ÝÆ€ÐÌ1ÌÒ6éª+tB¢Ø‰àšÉ*‰V\Z}I\'Ð’i&8§…U9£:Zª=x)ò™–ô…¹ò¢w\\(ŠÀøp\raàÌù7ÐnTÑ0Æâ›CJkbjé/€Hàž4E%ˆÇúÓéÏñÏ“Iôd‘±>\r‘¨iëÀ_›€‘	ÙH ‚ ‚8³F%ÞÎ“/ØÁÕŒfºãE9~â\ZD\rˆ|K\'D¥\r†æ³ÃŽ	ôdš·UIà“\\Sø8â\\-™Áºpg^\n¼†UeÒ‚ ‚ ‚¸èÄ[>ƒ^`ê%›t`è©`áI\"tÀ‘jÊ$‘ÑÑ.Å$ÒIã’k\"õ3èI¨é<\n“À¸óÀØõ‹Z¨ÁÐ›:™SkÏ1•ìj*4@Õb¥¢2Cf|PŸ#Í¤`°6MgŽxˆUšÏ’M\'ÐšI5’}EëL“I1Ä¸Â@k˜‡Íz¦Tòt<Ã^“!¨O’ @Œ…\n(lÄÃ ¹)åž#%Ñ!›‚}Iª¹ œñ¿Bi$ð¿ARx&x1ê6#<ª²M]|LÌºpôÍZÊyÌ¨ê0uCØYHK± ahWûÑÌ†¡1.áàQàtÓSÏ\ZÝŽˆðüIàDðº«P©|22i#$L‘:MW­­\nŠ˜àšHødš¬=\'S\nZÊ›¡òª9Ï-E–Œ}PÖ0ŠïªŒD3ŽLÏ¹!3ÖR<á¢Ô=û©ß©åŸoâ80O¦øŒ\rúŸMÖ*ŒqéÆ©3KpLWj§ÀÇNBÚœU8ºpcÎ?:ÑáÕ)\\2hÄCÀèq$ØI‚<ÃqFNþ)à<ªt·Aá‡Ãé:­„`Š®Lñ:¯Jk>¢ã½#ŽÀ¸ö§JŒ}8ä•¶£å*Óq¼™fMƒÝw1dÌDÄÂ”\ZWqê Íû¥5ÝƒÎ?_Sà{Pyà^›ª\Zr/G‚œsHáJ®K‡5µP©RIàb—Qñªptà”~T.&¡ò©MÆ3¦ƒ>§àÈbÇ¼aÅsWB×¤ˆYêR~Ž¦ÔŸ¾ƒ®³LÑðºtôpG­Ò‘ÅrÇ4Çp+‰!\\xÔÀøU‡Ì¨dqˆhBŸ(Å&½9\Z†O£!ƒ3¦\'nìpôÏùGìê[Ü1ö‡ë:!4*kGÇY:O¨—¸¢¯\n‰Ñ¡±OÄ¬ÁÐù4PÀ,Ÿ\"¶µµPÍuú3Qš–CÈ<³z³°\ZÞ´a‹±›ðU‰zoÖTTÓ‚)‚+z×HÀ®H‰Þª¬Æ„±ð+1tá\ZÁ:J„0\"²=†ÀÚ{\rb\ZëS<·ÑšŒÆ&J|†N“Ó_Ø1u<£Î,NÔŸ¢ªêè„¢q¾)ã´ ¿«\n‘H\"¨\\1L2H¢ä$K‰˜ŒN—öhbè|ÊÃP8ÄÄ[’DÉ‚éF£Agƒ1š–J¬¸µŽTžQóã?]Ö(…Àø_¢„–%‡~Ç‹d’I$\\Ñ±RhÑÅ0$\\8< ³eÉÐùn,BHŸ:C0fð.c1‰“ƒÖlØû0õ0>¦¬{{‡À—¦è˜„ä…Áš7GGèä#ú)éO\ZdzHBô0âÄÈKPñîk21t>g\0Eˆa	$‘PèE,ÆÊbdàýtóé>7Ø–õ0uf¬ð‹XtÏà%EIàšj1Ôiè5Š4~’áŽ	 c$‚Fh.\'GÍfF.‡Î¡æ¢ÁJÌ\"DÉ$’GÈ*cE,ÆS-{‰’`üâ}Ïqƒ¹å\ZÎÜzd\nŽ±\"G´rŽPÖþäDGnÐˆã\'TV)\"«Ðªê™.…lÌJ -I`sHÇ6õRŒAW¢D‰aš…3w\0k&}[£ìûºÌñ(2)5ÉN¢â‘Ö7Y”íÄ«âQ&©8ØÆ>\'ëº&d¡.(y«(Tx ÷répr	Wo “;Ñ‰¶~ÂØ~Â\Z?aš:Vã0«5tü&-ºä^½Y3>…IúÌtD‘Çà\\\r‹%ƒwBEv(X$’FHýWUH#Ð|:\Z¹¤\nàÉ“¬ØÔ·©ÎcÜbÛ8{únàòÉ\"IÕDV15c0cðfcÃàœÂ¤Ï%—èÌG”òŸqá®‹ðGD!QôA‡è\nêPU2I$þhèý-ÇCÍ*²¯¨þñ› Ø‘Ðk:QoºH\\ÿ\0zÒÆ`ÇàÌÇ‡NCM%[Äf=ýùî/1ùÑ—@Ô¯YÕ\nˆŠæ²I#º©$’Oõ#Š=f!.+qb0’ED¨˜™ÃtfHhLÈ^#\r,f~Ìxt½Ø¶­AVñ?¡ƒ™sPð\rñ\ZüqH ŽVäL\\ÄAATd¸¢(æ#Ïâ?KRüEÃ Œ…EÁˆN†Ä!3/ÝÄuÉð)eÁÉúrW¡†¦LôffŽ–Èž>ÞÇCØhN‚ZLèµ¨•Â*ÊºzX|,tBn°%nu#©\r-Ñr7\"ãæ%5%<$P :2‰0!B8šQ;¢8cŠ+$qÀÆ#3 K‡l C½	ˆþ<—+‘ŸG5\rHò<oC	¨b0f½™Xˆª¿\n¶Ãƒ\0Öt/ŽŠAÂ×´f*Ý&<90Æ‚T‘82I&D‚TtZì%Ø…X¤*6|2EõfBH‚ÌN6X œ™2D¨Äp´¯D¸0Ê.¢>¡àX}ªkO“Áƒ¡†–,˜2/ÙÒT&Pë0I(’PÚx3™²3è3U8˜—C£B°\\n“è2¢0Ä‰È™’ÑÃð´EBS%—ÄV\"­˜Õˆk‰xlLV&¤Ìý¨±ÝáC»ø>ŒÕBÉƒ{>	¨Cx^>Ñö{\0´-Ü1eÎg¦ÇˆÑIÈ®(ôÒBul¼aSXC0…EÀ˜‰%·¬ø\Zõ	è@Ý¨¨†¸‰¨©‰Q2^†gÔK‘!Ö‡Ú†0tcÛÐÁÞ¢Éƒ×\0ÕWÌ|OºLÆ=ÇŠFfƒYØð\rt!—¦¨KQ3H«D|5<(B\\øß®Cõ#Ô1±]\nŒLÖ‰pb`E,¦î³À—:´™ÆŒÅÐÃÞ¢Éü èÅ×ó‚	®2\rŠéK­Gs!ÑX¹llt~˜#¬šŽÒuKz.®¦£V7B—d^Çvtf\Z˜‡çK[Ò1w5Q©ü­¨Æƒ†’ñP³‚Á6]LzX(ˆLkÑId£„„2I29Pø(\'+‰Ñð±(q>8#‚hÄjôbEQ.Ñ²D¤\\ orðâxf¥ÍÈHcL)mìÄ)­Œ\rØØ\"þƒ€gRfG>DGÕ÷%× -Ílb3®¦§# ÜIž˜ô#1>”À‘TjK&ÃcB‰©R’DÉ¢\"‹JUž8áŽ«21³.–Ccr!±y¤p¥d‘,K	‰²h!˜ŒO!˜ÍFÔBCB%Ö%P…œÂ2Å5-Œ&aìºž!K ·1]w!hN–ÀæL9dQÐ¸‰(L5F+Ù–²O*\r€ö¨P¸ç ùF[…!ïJA{MCá?UúVÇUŠ–Ç¼P…è;“El½Ì‚ØÔñà‘Ä&KqR‰^‚F‚ná@Á…q¯P1Ø²1Ëa\Zò7´K]	 H¨ì2 MÇÀé ŒÐŽ\r\rÀi—BuDˆ›J=@¹G´‚± ‚åÉàI>†>¬fƒzÝQz.ôŠ4·\Z04¹˜áìî]E±ŠÆ’F\Zçé6ï±oþä¶B8@öXÔ\'˜ÒØÉ½Å@$X£¢Chr%ðÉ4!ÝêÕ\r4cD›4b$Ú±+OVðÁúÍ	âc¹aet…GÁbM:J´8ê8V‚!©‘oŸ¹Óêsã’j;¡„·B0±Y„ä7.“$HbE(Ç!!„@„@™®­gYÌ4¿}h ‚¬ÕàšÍb§Ž‚¦‘RÜ!+£LHf@9+27&KEbŒhˆ\n¿ðŠ\'¥ð R6Ú†:ˆ(áDñË€B¤„ÂM…þŽ\"—à~‹¥É$šR+4.c+RiT*iIáL²égEºæ=Œ‰¸‰MX¾œ~ø HÜQÎjlJ°AUuÑJV|-Á5·é\'!B$ú³êGãÇ,$Dò=e	Ñ‚T\\\nŒlHj@¥‘ã H÷h{x#	áŒ±ÖAl)äH‰\Z‘¦\'*Zâ‚ jjX«¸@„4ôÛ.Oþ“¤„DÖVü¨Îj\ZÇ‘+R7„SãjŒAùŒN¢,=D ‚D*! @…¥W,…j·\rÐn³Iü(à’\' LJÿ\0Æ7Ä±#áx9Dã¥m¿£\\Šà\\Ä¤]™ÔŠˆ|F´l@š®6Á¨Ð4Ñ$®	¤¿Zx%Ð@š#cccc&´\rÚe\'ÑBQ¸Dzbú0nš\nXn\"\"‚:	Ý	‰hhZääˆLX˜jÃÒÈÙ¡°5Õ$’hcð MœêH— ‰0ŸÃ‘±±±±±ŒHÁ1%µjuBª	zXA\rVªöŽP\"®îhÕ„(‹+@”%&5^»fƒMÁª’I$’I?‹	\Zˆ’¼‰~¬’661º:b„3AX[k6$OÐšÆìsÉ1œ’AE‘£R$‰G„)t@ær5$Bâ‰#(hA0ÄèVDHŠëðÛ´7Ðh!Ò}YõsÂ‹yô%I$’HØØßCXp*X¤A<SHFäÊbdÖG#@‰0ƒÁw«lKgÁ öŒ¸N’]1¡12ñb/J\'ø­&0l±!º¤’Oñ@Ë’ý9WÁ’I$l’IbP@£\n8ÕÄ¢`‰È¼).Šcw¨)\n˜Á;RLKà8$ú «†´bPòC¶á+ó´Æ›†­8–õç…9Ñ$’I$’OœEwÁ5õ&¬a,’äŒNö B+\ZI‚Ä¬²2m˜  µË#Ò‚9\\fƒ·ç*6h2{XÅ¢Iõ#‚(ÐÉ$‘²I&²>)Äð£×Iäk±±W4\nV„ö±Ê‡ »ã6–bÄ‚KÄôdH|_E_Sä2H1zZ‰?àd„Æóaš¦¸\"D¨ŸÒ}1çQÄ½H ŠOaäj:ÆZî†W\"<Ã}—AqÈ¤l––z-t TŠóÄ¶!X±Š–¢$ì7\'üR›)ÂŒV¤þ\n;¿AzGÁ\Zà1Ž#¶±ÜØeI.Ddø…Ì4ˆiIl|,tUI š‰“bÃO1úSø±W#˜°ü¸£‚Þ»ØŸD¸åHœÑ²Ž‹†ÐéBœ—Ul\\=GÅ3½‘Ý!ºF;!$¯Ü=D\'?ˆ½V¤KPJ¬V)³ŸÃbÄÍq«0ÄØCaH{½|ñÞª‘±1†ÄÛ\r2ÔMbÑr…ÀŸøÃDUÖ`Zõ—¨‡°ê\\« …BÔ7ñPõ5FrLÄ´\"ÒH²äš¡ÀHÿ\0zkG®‰ÔDz‰UñÅ dŠ…B©œ›#õp@ë’\"Dè’J‚(‰ˆ\Z\'µ˜W/A9ÓDVlOá¯E.«</37hý%GT¸R£að&¸p@ÇÒ‚\\I½h¬Š¨b$W0;Œ0Yà!¦BÀ®ÆànFŠnH–\'òp\Z¢àÇoéë¾ÄI’(épMª«¬z¸ÚL‹ñ_‚i7Aæ˜&YA½	[‹ÐYá™hÀº-Í‰ôÕ¥7Äè¿\\Oœ$E8·lc£àaÕ‰^„!pÍ2mq¬KÕZ	5ª£f…r0©c#.@œ\rÍSH‡¡-ðÈ¸ÕS$~#dÑfMLé4utTn—Á¬!q§IÉ Í[áÉ‚<1M™–DaÚ‘H¥®‚æcwàCVØ¥eKE ‚HL^ºËQq¤è\'ñ5¬	pDc4¨ÆÇ£¥„Q>)¤‰ÑÜƒŠÁ’8$Cr\\\n$eÄMÁ\n‘’ff>D¦‹Àß•€š&}Wñ1!_ˆHËdÉ\"¤²JëF:9$‘!4GDÆ‘/Q2I\'ÁÖ¨‘U\rÀ¹‹¸)›‰—Dá		Ý2ð%,C‘¸C¹—T¸\\ŸQ!ñ0\'€¸#Òh6Jj½&ÁbÔ™á±­ø&“„¦6`I²èc’FC	V:‘V15‘¾\Zš¸P)õˆŸK7\nBü\'‡z&i5Å££$Uc¡@„!zŽ¬{\ZŒ„DÒA7¢TQB|¼jœFÆ—M|*âcc~†EÞ”±:&²(!¯\"QøknL“$Š¦@¨—UE_RøLˆ2`J7*!ˆw¨œh&Z(›O\"!Œ:`ødloÑÈZFé!1?†’Õfij‹ŠFˆ½Y4*—ÅŒÈ™vÈbãM.¬$ØÄÌm‰˜åŒÈåˆÕÇ\"‚‘4­CBªüWÖ‘¿QVI\' ràµH£3Dr\rS\"¶(\\/Ô“RÄA@à@àAˆR,°Ñ:†4×OÀCü)üàr\Z#Š)Ž«DR(é’\"@Ò¢ü&†\"ˆLDAD‘H$@’ HƒJA	XœÑãðýô\'ÐñÀmY¡Á‚)Š@éAHUŽA‚+ b¢b8 tqGd!Á(àN…‰üéªüêý\"‘Ht‚ôZ¤R ‚ *>8àÒ&ˆ 	ñâŠŠˆ1!ÀˆòÓŠE\"/IªÁ‚ ‚ Nà‚ ‚ Š¡ÑÞÒTA+üUÇ?‚ß«ÇŠ²+AARApGR\"B Š &DzOÐT\'ø³þ*=(ü8 ‚¤pAEbG\rq@¨èép¦M\'üú±éÇâÇàÇX¢Dþn#Š ‚à‚¤pO¡H\"AAø0AH#ÔŠGV8\"‘þ ‚¬pE\"°Ecÿ\0…ÿ\0ÿÚ\0?¤\rZ‰ƒ!´g1#õ­LþLzïÑ’iÐ‚=H ‚õ#ð	,Q7fd„¸JÊ\\Á9\r*hÔ¸`‚)/üT’xcÑŽ8¢üxõÐ‡ƒC!R‹\0‘@“ïKP”0”™©‚Dè0G¤êÇpA7èG«‚pG¨ÿ\0&ÕŠ\"Á¸lKpKû„’,†¬ÄŒž”’%DŒ•½b±ÃH ‚ ‚#ÐšKâ‡H\\SKÒ ‚$SÐŠG©”Qð!\Z2º^Je&K­Â×©Q.õÚ‚;“†ØšãX„¸¢h‚8‚+$ñA/J*G«J‘èG¦½H¤ˆ²+f%‡·qÝ)‡µ\ZúÑ¢»×W2Å±ƒ!„‚q\n&v˜„&KÁ<pAŒ4GR¬~|züª‘˜°dfcKE”X÷.o©’£Ë×[Èíîh<)!¡ª\"³IàžAŠä~±þ8b±è@²f%©h1fc*ËÂ—Ì0jÏ×ÁˆF!;šÁh+Ü½&X×R h‚$ŠG«ˆ!z±ø\Zú0G¯ª«:šµ\'•¦^4”1ŒxõñbŒfŽâÈF­ƒ¤–%R‰Í\"±ÅÁ9áIk†8 ŠdjO@¸ß\nP<gK#A‰˜óéA„\ný¢@RÂ1«I$’Mdž2F\Zst&n´S»Q\n†\\šfˆô F8ãÔuŠæ®±ÃiÑ|-Q•ÂàÆ–J†x—Ñ°„‰‰‰’67P6LP`x)Ï©÷	^G\n8 ˆéžâÀïT‹E dzE\")Ê¯>¼q>7\\‘tuC¢ú,Ù Àyu\Z…ÔKÀZZ%(ˆ0Ãc\r’5†ràÅô=ÌÑ#Â(kêy˜³%ú:R)/Ñ‚8#‰ñ:ß†*•Š>ôàÀ¨‚^–lÐ`dê%ÕŒB¨(ÍÑ“˜å(zHqrS7X¡xvÇ7ô\\¾B¹S0´Â0ý”È¼a\"g©ƒêÌ¦)Ç(½ãWéAoÒŠEu¬S#«ôäÏ3I—©š“ ö2WçèËÒÆ>aoE	øqÃÙtxf{}ŸbüØ³í\'©ã}ˆy4FíèH3>¦câh\\x#Žx`ŠÏ\Zà…šÅ ‰\"ºð¿MÆlÒbyÔ˜À?\n”ßÚcÛaŠ:\'ò4±îà<gÒ-ËAE“Ô‡³Fî`ŒCvÖ\r}LÆ.%Àøß¤…ÃŸV«âdG¢¸`Á<m“Gè1z2}M4‘šƒR0.…ã8è|FdYØb»ŠÎx–¡œK¹:(@Õ\"†\r?4-(bZƒ²V\r}L‚ôÌ‚(¨ÈVdkÑŽ<‹ÕÏ«#T~¤.43AÞœúŒÕ/¹šŒC·`ƒ0ÐÀÏÐ¹Nd†³ÑÑÁÞ‘?Fì{£\0²‚C#Qâ6¨-†.õƒ]%Æ|šª®9‚8\'Ôž8ô¦™¢¬«$V8µ*>a Äû™¨³€kà,ƒúôðGÕÐÑÞƒâ/,Ä`Ã9ˆy<&Â£`êÇÜ\\œXàh×ðsTO¥>ª ’O£ž%Á$ð$d|M‰Ør^|‚ø¡÷3ÐhàŒ…Ã0ØÄøÕñT °ïIð—ÙˆÀ-†S•=¸$a2ô3‹v}Æ:\'GÂÝ0hOõ§†=Yž)ôsé.`SŽ7‘¼ù†“ìgéWˆ~‚²Ô$ò{-Ü•Jil4!ª3º}™ª¦†GˆÛ‚¦56jKg¦× ø\'ÔŠÀèé¬ÖlH‘b|\\|G\\I\"{Qð²¨@ÒbeêféP£ ¡î\Z®lY}…ƒA˜Åôû1PÀe1thè«	iÈdìgî4¯¡j´G«\"ãŽ\\.ÃR!I¢á‰&‹‚høÐ¨×­fŒ½LÕ­nª²ÜY6Úic¨ƒ®¬cAž“ÂPK†.ƒÍSÞƒ†#!œJîÂ—²—ô•`‚:Hý/E2xg‚FÅUÄøàaÖ}D\\ÍhÇÂ†éÈi¡å3ÔáR-åãàÀC5<]ib2ºSÀy¡)˜¹»i‹ŽLTF81M}%é7ðª´Yè…è?I‰,ÄE9“Wj$gFˆáj c™Lã?S7AÃ¤xF·¸dA*6&d§Š–::\"ÙÀ/KÚ5ÆBÝÜµ\\zXàTÔÏ&.-âÖNb›ú>E*:­u&r!\\/ÓŠ@ÐÑ&ÂèŒŒÁ…è˜lÄ– s°%`Dè`e‹c(ò¡ì¬šÊV\rF©t`¼‚È—wßQp34ÏV\'˜àÏ™Dœ\rø„!~áh:\'’#1ã†%U“_E¹)´?(æ/sœ½Ènˆn†`YfÈnˆn½Îr÷\ZÕ{¡\Z³`1Œ…áL}ÅFBYu3]EàfLÝÌ\\.ÔšOŽ¯ŽhÜ\\dP‚DKú1¡ \rÞ/4$@—âjŽ“Æý\0Ó‚G\\‹„‰a¼’Wº1wò`ê Í–r‹D2ÉŽ˜¬¾£9øÐÐ?$`ŒF#ò/u0±.¨Ä}IK¡©˜ÅÅžÁ4T~¤‚-ôè~€¡!/F=wUÂ‡LñdgV;«Oßq}mÔ*‰ YAžÐÞ®óþ\ZhÐÐy‚3Fì‡“À#î¦†°–S—¡©›«¥‘Õè\'Æø] ‚hèèHƒ,‚ˆ Dz+ð_à|ÔU5H\Z¤ˆ$~öeÀµÔ\"êOàzž1 cCGCÈ\"Ý²0¤Í‘¬:Q4 F«1‰ÑšXšÍ(øgÐB¢©$P°A‹?€ø¡Ž%H_ßÃ\Z¹Dy*3™~Ž¨h~¿ÃÆ4Ðð,::\rHÍ	S\"4TˆnL€nCu¹)&%Iáž¦jÇÀËÒY\"‹ì\\¾ÂšÉ4šcähNÔžIÌŽ‰zÉÆ•‘ìáŒTdð·C\nÃ\Z\Zï¿á0è2q°ÿ\0‘¯êxF“!,,\"1FHÍÔ†4%ÀhAÖœhŽ$’I\"³EHâb†\rÒ\ZãyjÈ™Ü{ÄºÈ™-è–)\Z“(p²j†¢\Zà\'<XÍ1àt|HB(°¨@–}ü\Zƒ¡Êf6àò/ìäYÚ`,;£lf»p tÈÑÄj‚AˆaÁ‘£Z DK±ÐGaò¢N-XªàNôla±!ð^8×¡‘1„×–¤ñ¦“TŒPêé!%À::>yxB\ZCÅ<ÆcÀ÷vò~‡$xÆšÂ®Æk©oì¿éÉšŒU	+ÔÄ>ƒ0¤é$Š²I5hdÈšºÈ…I5Æfª­CYþ	¾5D%eÀð1%ÂäC•\"zÑâ†c!àó#ô9#?cE\Zz)lfºÐdíKïM²Èú‹æ\ZÂê\ZÑƒ0\Z–|3EI#^’ò:5H\"Š¯bõ°ä’è†:.,V£ç¹ô4/bJƒ?A®<d~ç$eìd‡CG_§I.´™;Ì{ÏÙÜÈi3t>@–TEÄ5\rF\\pG	3)ª«Í\"°!pdü\"àžVïèª4F”CT:Oœ\nˆ#!`´~è`bºC9˜ðy‘ò>ŒÝ—Ba¿ªP\\LFa-0?£¸²4Ð‚ÁC!æ•­&¥hU\"tUÍ\"‰\n‰G1ðÅ\"³/ðçÐUŸLð¨ƒB_‰ðÁº Ü¸Eûªã¨Þj<T5†F‡*>¦q”…î Z£\' Ö‚Ø\\Á\0iÛ¬»¨é=:EÏA|¦1çZŽ\ZxÆ©95ÏqÄ‰ÄØé´™4HŠÈ?U“ª¢0ô4¡Q¸ŠF\"	2I%î\'x÷}|qkA¨É3âb$h&‘íío$®XÙK&æ@ÆMî\"·FlKÝ0š’–¤MÜCP0é…ª*º˜aU	®„íIµ Keš‹œJ!’:¨5Ã­ê¨ŸÀ/ZúRˆz%\nE\nãŠpöþ\re	Ù¤¡«Rq HÉ+1¸Éër j”¸“4*YÐIÞ7(†€LÆÆÎˆc¤qI(žÀNª™D&AÓ%©´4ÿ\0£Pö£ÜÔ=†Ï7,X‚	G£‘¢Œ¸¨¨k\Z.‚¢F>5s¨Á\Z0Çƒp¿~F„¶%an0^ÇânR0‡é#ä>‡ÀÕŽ9–âiHô\r©\\ÉøAšU¸&ÆçpE$ULD×ÀÑ©¢4Âu&}\"—$HžTŽõÓ¡ðG\nq2éD#/F^ƒ•Ä¥šh5ò$Âí	5®3hcÙ?B2†be’6@Ónô‘$HÆÁ¡Ö­­ èòA„G\"	!š4RŠ:+-úÿ\0‚’I$šÅ[‚¬pçD#/E\\fÃoA* m¶5„¥ÃKfD0)ÜFÁåª&‰2XÛ	š‹PWAm‰Z\"@nÐ‚èr6;Ž­IŽ( ‡RQ\"_ýIàšMZ¤z–9 ™|¡pãRX†”ƒCI;#C*+SÜ¤;Žvdf‘qmvET)T¤€Â˜Æ67“ÀˆXc†8àF‰%Ã~,Öi$ðMg‚h™<[¨Mª	±&]Ñi\rˆ\"´Vš°KdÜ–ÃA«Ùp©¤7y$’I$ÔAhcÀÇVæ¨NÄªE ‚*½EH¦CeèÇþbáä¡\"<*#RÈc\nÉ2=4jŽâh Š\"† ‚(ÐðH‘Î%¹Î9Ç0æÃ™DkÇ-\"‰„j$|#ð‘jLðèHHN*Ö\'Z\'±$RH¥Žà\"à†ˆ#ÑˆÈVË0¬~þÁûû#¹?`bª/¨¨$E_\ZPŠašA~4*Q&2jó‘!„…[$‚ÔŽ<„Z‚fªT,$¯\Zì@ˆÕ^]î)&\"RL™a2$Hwð4§—¦”-âéŠGãM9 uT%ø©$$$AÉ“\\•NtÂƒàÌÈ‘!918èL†Å\"D+w‹r&½eQDê†ãgF`&!Hô@êýÆ”-Â®‘$AøÓF2j7/U$@•¨©›\Zê$,5ÇšÈ!\nèjyªf\"OD\"ËP&4wX¤Ü7Ä’È-ÃÙ–£0¥xyü4èL$2H#‚#ÓŽâ½Z±ºz0@‘	$GÑh†Æ³¢¹%Þ„‰H”–FØC\"°	ƒEÞ“1IŒAi’dðHL©E ±…Gf\'s7\n~»ªm–ñJ?ÀŽ8 Š¤;€‘$E`Bàcv0‰Ä•MôS‚T[ÍÚ‘.	™„2!éid’!E Ù[‚Ä‰“NIdŒR¬‰)D.c¦•øSè¡(A=„¢uPGô#Òh…AH Š®.ŠànÃv¤ú¸H” Vã:	šÏºI¨óTÅ„ÜH˜ºðO©H$JÈüˆô‰	D	Â¤¥ýãjP‘A\\…‘|3ë¡¹”P!šžÁš‡Ì7Bd^,ˆ9o\"Á•#Â\r“*‰àž	pÉ}Í„è&™´~Hb@¥‘i€ýl]Fçñd@ÖèHB3™+2µ†¢FÍ%èbª‘u\Z‚IôlW¹\Z„¯\"S‚?!ð_n‰^8&}7Xô¤’ËÓÏ£K“^ªã9ÑR‘ð	d±1¾Dòà@’\\)U¡‡Š²1DÙ%’OÂ/E‘Á<	µ‹\"=piGé!\r5	d…j¨‘Ðàä#¸Ò«J=EÄøHR*ƒrÆ„ÚÁÎYàðH ÈÔšëÀøW ”1þ\rÂ„ŒQ™©.3EeÉzëìTŽ	¥•\n‚j6a#5Lkü~E‘¯ñ4#Bt|EF;†4&Ö¾%éâ®ÄÔ ¨Ó¢tW¤ŠõèHË°Gç´¯ÁhŸÇt‰bB£àap±ÐÇFnpãÒšMræ¨¢j“É1D£w4¢\rÅLäü×àu^ƒpl~#àš%EÀÐÈNŠŒlu:ÀÐ‡\\p.(&­wª`Ln“L‰F6iUERÎˆõ_§“1q.&àØŸÃ‘äEU(À…WEB|ct>+¢AúïÆ&¬‘!(££Ý0àb³¢6g!€ý1q¯Æ‚ÅÇ1 Ê¸±EB¬ÑŒdq´C‘W>›KB|¢Ï®ŒQ‹Q¸$Iˆ¬þÀ\\2G\Z¢gø‰2ÊÈñ!Q!.qŽ*À‡‚)ŠàTŽ	’†¬×.(ˆš=à’HC\\Qé<‡EYÆM‰\n¶Vh‰\"jè•F(ïF?F+>GoEÕÌp£\\(.¢0ôôf¨â|k5tŠ\" B\'‡#â*%H Š&5F:ºG¡AœpEb‰F¬Aqˆ‰ô7DôÒB#Ô{q$1þa\"¸à— LRI$ÀÔÀšÆ>+pÇ@ ;RD@èØÚ¥™$*&ñ1úsüêP4\r„™Š†…Xô—\nV`nŽã\'…úh9ÒÍp+Œ!ºMÉ$„8.‰	GÄý\'é ‚\"5HCsøR‰(‚&‘Á^k4tUc©BŽ¿.CeËÒá¨i¡®!Uçðà  5þd˜¤Ò}I¬c…Y¤’1Ö\\–e‹2QaµIBH²\r¬\n‹1¤lpµüè/ÌH„äŒ‰$‘\n“FI#ãž	âÁ\"«T’IÉ$NI$Dˆ‘D«¯à1z+ò’‘(\'Ši&¤ú³\\pM$ž	àT\\KŠIásI£tš6É¤’;Ñü®BÇ§<IáUBb&Ž³Y¬Öx¤ž.•’I¤Ñ¡Q*È¦ŠÔ½4ä‰zóIàuž)ã’i4ŸF}I&“F?QðµþAV}I£toÔž9¤’O©$ú2I<9¦8ù‘~<ðM¤ÖI¬’I$Òi$ÒI$šHßñªÏ ü“Á5ŸNk>´ÖIášÉ<Àê©4’x#üTú“ø3I\'üÖi$Ñù“ÿÙ','image/jpeg',92761,'background_loginpage.png','#9E3523','#FFFAF0','',0,'http://wifonicnetworks.com',0,1,NULL,0,NULL,'2023-06-03 00:00:00','2023-06-03 18:54:27');
/*!40000 ALTER TABLE `cms_loginpages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commission_agents`
--

DROP TABLE IF EXISTS `commission_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commission_agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `bank` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commission_agents`
--

LOCK TABLES `commission_agents` WRITE;
/*!40000 ALTER TABLE `commission_agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `commission_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commission_agents_locations`
--

DROP TABLE IF EXISTS `commission_agents_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commission_agents_locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commission_agent_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `commission_percent` float(10,2) DEFAULT NULL,
  `commission_on` enum('net','wifonic','hotel') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commission_agents_locations`
--

LOCK TABLES `commission_agents_locations` WRITE;
/*!40000 ALTER TABLE `commission_agents_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `commission_agents_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commission_challans`
--

DROP TABLE IF EXISTS `commission_challans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commission_challans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commission_agent_id` int(10) unsigned DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `challan_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` float(10,2) DEFAULT NULL,
  `challan` longblob,
  `amount` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commission_challans`
--

LOCK TABLES `commission_challans` WRITE;
/*!40000 ALTER TABLE `commission_challans` DISABLE KEYS */;
/*!40000 ALTER TABLE `commission_challans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cust_id` varchar(10) NOT NULL DEFAULT '',
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `department` varchar(200) DEFAULT NULL,
  `work_phone` varchar(200) DEFAULT NULL,
  `home_phone` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `username` varchar(60) NOT NULL DEFAULT '',
  `location_id` mediumint(9) NOT NULL DEFAULT '0',
  `mail` varchar(100) NOT NULL DEFAULT '',
  `upload_limit` varchar(100) NOT NULL DEFAULT '',
  `download_limit` varchar(100) NOT NULL DEFAULT '',
  `cr_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` varchar(255) DEFAULT NULL,
  `activated` smallint(4) NOT NULL DEFAULT '0',
  `active_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(4) NOT NULL DEFAULT '0',
  `rate` smallint(4) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL DEFAULT '',
  `billing_plan_id` smallint(4) NOT NULL DEFAULT '0',
  `time_to_finish` smallint(1) NOT NULL DEFAULT '0',
  `sn` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `foot_note` varchar(255) DEFAULT NULL,
  `called_station_id` varchar(255) DEFAULT NULL,
  `calling_station_id` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) NOT NULL DEFAULT 'none',
  `response_message` varchar(255) NOT NULL DEFAULT 'none',
  `date_created` varchar(255) NOT NULL DEFAULT 'none',
  `payment_id` varchar(255) NOT NULL DEFAULT 'none',
  `merchant_ref_no` varchar(255) NOT NULL DEFAULT 'none',
  `mode` varchar(255) NOT NULL DEFAULT 'none',
  `is_flagged` varchar(255) NOT NULL DEFAULT 'none',
  `transaction_id` varchar(255) NOT NULL DEFAULT 'none',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `is_sms` varchar(10) NOT NULL DEFAULT 'none',
  `country_code` int(11) DEFAULT NULL,
  `acct_input_octets` varchar(50) DEFAULT NULL,
  `acct_output_octets` varchar(50) DEFAULT NULL,
  `total_session_time` bigint(12) NOT NULL DEFAULT '0',
  `is_fup` varchar(2) DEFAULT '0',
  `post_fup_limit` varchar(255) DEFAULT NULL,
  `advertise_url` varchar(255) DEFAULT NULL,
  `advertise_interval` int(10) DEFAULT NULL,
  `simultaneous_limit` int(10) NOT NULL DEFAULT '1',
  `maximum_session` int(11) DEFAULT NULL,
  `maximum_octet` int(11) DEFAULT NULL,
  `expire_after` int(10) DEFAULT NULL,
  `isused` int(2) NOT NULL DEFAULT '0',
  `expiry_date` datetime DEFAULT NULL,
  `acctoutputoctets` bigint(12) DEFAULT NULL,
  `acctinputoctets` bigint(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Serial` (`sn`),
  KEY `Username_index` (`username`),
  KEY `CalledStationID_index` (`called_station_id`),
  KEY `id_activeDate` (`active_date`),
  KEY `activated` (`activated`,`active_date`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couponsjuly16`
--

DROP TABLE IF EXISTS `couponsjuly16`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `couponsjuly16` (
  `id` mediumint(9) NOT NULL DEFAULT '0',
  `cust_id` varchar(10) NOT NULL DEFAULT '',
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `department` varchar(200) DEFAULT NULL,
  `work_phone` varchar(200) DEFAULT NULL,
  `home_phone` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `username` varchar(60) NOT NULL DEFAULT '',
  `location_id` mediumint(9) NOT NULL DEFAULT '0',
  `mail` varchar(100) NOT NULL DEFAULT '',
  `upload_limit` varchar(100) NOT NULL DEFAULT '',
  `download_limit` varchar(100) NOT NULL DEFAULT '',
  `cr_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` varchar(255) DEFAULT NULL,
  `activated` smallint(4) NOT NULL DEFAULT '0',
  `active_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(4) NOT NULL DEFAULT '0',
  `rate` smallint(4) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL DEFAULT '',
  `billing_plan_id` smallint(4) NOT NULL DEFAULT '0',
  `time_to_finish` smallint(1) NOT NULL DEFAULT '0',
  `sn` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `foot_note` varchar(255) DEFAULT NULL,
  `called_station_id` varchar(255) DEFAULT NULL,
  `calling_station_id` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) NOT NULL DEFAULT 'none',
  `response_message` varchar(255) NOT NULL DEFAULT 'none',
  `date_created` varchar(255) NOT NULL DEFAULT 'none',
  `payment_id` varchar(255) NOT NULL DEFAULT 'none',
  `merchant_ref_no` varchar(255) NOT NULL DEFAULT 'none',
  `mode` varchar(255) NOT NULL DEFAULT 'none',
  `is_flagged` varchar(255) NOT NULL DEFAULT 'none',
  `transaction_id` varchar(255) NOT NULL DEFAULT 'none',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `is_sms` varchar(10) NOT NULL DEFAULT 'none',
  `country_code` int(11) DEFAULT NULL,
  `acct_input_octets` bigint(12) NOT NULL DEFAULT '0',
  `acct_output_octets` bigint(12) NOT NULL DEFAULT '0',
  `is_fup` enum('0','1') NOT NULL DEFAULT '0',
  `post_fup_limit` varchar(255) NOT NULL,
  `advertise_url` varchar(255) NOT NULL,
  `advertise_interval` int(10) NOT NULL,
  `simultaneous_limit` int(10) NOT NULL DEFAULT '1',
  `maximum_session` int(11) NOT NULL,
  `maximum_octet` int(11) NOT NULL,
  `expire_after` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couponsjuly16`
--

LOCK TABLES `couponsjuly16` WRITE;
/*!40000 ALTER TABLE `couponsjuly16` DISABLE KEYS */;
/*!40000 ALTER TABLE `couponsjuly16` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_challans`
--

DROP TABLE IF EXISTS `delivery_challans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_challans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` int(10) unsigned DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `challan_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `challan` longblob,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1707 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_challans`
--

LOCK TABLES `delivery_challans` WRITE;
/*!40000 ALTER TABLE `delivery_challans` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_challans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `element_types`
--

DROP TABLE IF EXISTS `element_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `element_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `element_types`
--

LOCK TABLES `element_types` WRITE;
/*!40000 ALTER TABLE `element_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `element_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_devices`
--

DROP TABLE IF EXISTS `feedback_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` varchar(255) DEFAULT NULL,
  `udi` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_devices`
--

LOCK TABLES `feedback_devices` WRITE;
/*!40000 ALTER TABLE `feedback_devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_forms`
--

DROP TABLE IF EXISTS `feedback_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `location_domain` varchar(255) DEFAULT NULL,
  `colum_name` enum('c_0','c_1','c_2','c_3','c_4','c_5','c_6','c_7','c_8','c_9','c_10','c_11','c_12','c_13','c_14','c_15','c_16','c_17','c_18','c_19') DEFAULT 'c_0',
  `name` varchar(255) DEFAULT NULL,
  `header_id` int(11) DEFAULT NULL,
  `header_priority` int(11) DEFAULT NULL,
  `order_priority` int(11) DEFAULT NULL,
  `element_type_id` int(11) DEFAULT NULL,
  `value` mediumtext,
  `number_options` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_forms`
--

LOCK TABLES `feedback_forms` WRITE;
/*!40000 ALTER TABLE `feedback_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_headers`
--

DROP TABLE IF EXISTS `feedback_headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_headers`
--

LOCK TABLES `feedback_headers` WRITE;
/*!40000 ALTER TABLE `feedback_headers` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `c_0` varchar(255) DEFAULT NULL,
  `c_1` varchar(255) DEFAULT NULL,
  `c_2` varchar(255) DEFAULT NULL,
  `c_3` varchar(255) DEFAULT NULL,
  `c_4` varchar(255) DEFAULT NULL,
  `c_5` varchar(255) DEFAULT NULL,
  `c_6` varchar(255) DEFAULT NULL,
  `c_7` varchar(255) DEFAULT NULL,
  `c_8` varchar(255) DEFAULT NULL,
  `c_9` varchar(255) DEFAULT NULL,
  `c_10` varchar(255) DEFAULT NULL,
  `c_11` varchar(255) DEFAULT NULL,
  `c_12` varchar(255) DEFAULT NULL,
  `c_13` varchar(255) DEFAULT NULL,
  `c_14` varchar(255) DEFAULT NULL,
  `c_15` varchar(255) DEFAULT NULL,
  `c_16` varchar(255) DEFAULT NULL,
  `c_17` varchar(255) DEFAULT NULL,
  `c_18` varchar(255) DEFAULT NULL,
  `c_19` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `free_users`
--

DROP TABLE IF EXISTS `free_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `free_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mac` char(17) DEFAULT NULL,
  `username` char(19) DEFAULT NULL,
  `password` char(4) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `free_users`
--

LOCK TABLES `free_users` WRITE;
/*!40000 ALTER TABLE `free_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `free_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'wfadmin','2014-06-09 00:00:00','2014-06-09 00:00:00'),(2,'wfaccount','2014-06-09 00:00:00','2014-06-09 00:00:00'),(3,'wfnoc','2014-08-23 00:00:00','2014-08-23 00:00:00'),(4,'wfengineer','2014-08-23 14:24:00','2014-08-23 14:24:00'),(5,'admin','2014-08-23 14:25:00','2014-08-23 14:25:00'),(6,'account','2014-08-23 14:26:00','2014-08-23 14:26:00'),(7,'fom','2014-08-23 14:27:00','2014-08-23 14:27:00'),(8,'fo','2015-08-07 13:24:56','2015-08-07 13:24:56');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_plan_id` int(10) NOT NULL DEFAULT '1',
  `location_name` varchar(255) DEFAULT NULL,
  `location_domain` varchar(60) DEFAULT NULL,
  `location_state` varchar(255) DEFAULT NULL,
  `location_city` varchar(40) DEFAULT NULL,
  `location_country` char(2) DEFAULT NULL,
  `location_e164_country` int(11) DEFAULT '91',
  `location_organisation` varchar(60) DEFAULT NULL,
  `location_server_name` varchar(60) DEFAULT NULL,
  `location_street` varchar(100) DEFAULT NULL,
  `revenue_share` int(1) NOT NULL DEFAULT '1',
  `committed_revenue` float(10,2) NOT NULL DEFAULT '0.00',
  `revenue_percent` int(3) NOT NULL DEFAULT '0',
  `monthly_fixed` int(10) DEFAULT NULL,
  `internet_provided` int(1) NOT NULL DEFAULT '0',
  `service_tax_included` tinyint(2) NOT NULL DEFAULT '1',
  `invoice_day` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31') NOT NULL DEFAULT '1',
  `nas` varchar(255) NOT NULL DEFAULT 'mikrotik',
  `credit_limit` int(15) NOT NULL DEFAULT '0',
  `contact_persons1` varchar(255) DEFAULT NULL,
  `contact_persons2` varchar(255) DEFAULT NULL,
  `contact_person_post1` varchar(255) DEFAULT NULL,
  `contact_person_post2` varchar(255) DEFAULT NULL,
  `contact_person_mob1` varchar(255) DEFAULT NULL,
  `contact_person_mob2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `post_code` int(10) DEFAULT NULL,
  `pms_type` enum('wifonic','ids','winhms','lucid','opera','other','none') NOT NULL DEFAULT 'none',
  `service_start_time` time NOT NULL DEFAULT '00:00:00',
  `service_end_time` time NOT NULL DEFAULT '23:59:59',
  `username_length` varchar(2) NOT NULL DEFAULT '16',
  `coupons_allocated` int(10) NOT NULL DEFAULT '500',
  `coupons_available` int(10) NOT NULL DEFAULT '500',
  `client_type` enum('hotel','hospital','society','other') NOT NULL DEFAULT 'hotel',
  `devices_per_occupancy` int(10) NOT NULL DEFAULT '6',
  `roompin` int(11) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL DEFAULT '1',
  `installation_name` varchar(255) DEFAULT '',
  `installation_address1` varchar(255) DEFAULT '',
  `installation_address2` varchar(255) DEFAULT '',
  `installation_city` varchar(255) DEFAULT NULL,
  `installation_state` varchar(255) DEFAULT NULL,
  `installation_postcode` varchar(255) DEFAULT '',
  `logo` mediumblob,
  `logo_name` varchar(255) DEFAULT NULL,
  `logo_type` varchar(255) DEFAULT NULL,
  `logo_size` int(10) DEFAULT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '0',
  `live_date` date DEFAULT NULL,
  `complementary` tinyint(1) NOT NULL DEFAULT '0',
  `chilli_domain` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `one_time` smallint(1) unsigned NOT NULL DEFAULT '0',
  `amc` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `one_time_cost` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  `one_time_date` date DEFAULT NULL,
  `config` mediumblob,
  `config_name` varchar(255) DEFAULT NULL,
  `config_type` varchar(255) DEFAULT NULL,
  `config_size` int(10) DEFAULT NULL,
  `backup` longblob,
  `backup_name` varchar(255) DEFAULT NULL,
  `backup_type` varchar(255) DEFAULT NULL,
  `backup_size` int(10) DEFAULT NULL,
  `router_address` varchar(255) NOT NULL DEFAULT 'none',
  `sms_password` varchar(4) NOT NULL DEFAULT '0000',
  `type` enum('WiFi','Hosting','CCTV','DMS') NOT NULL DEFAULT 'WiFi',
  `valid_till` datetime DEFAULT CURRENT_TIMESTAMP,
  `auto_renew` varchar(2) NOT NULL DEFAULT '1',
  `contract_period` int(10) NOT NULL DEFAULT '3',
  `scratch_card_price` float(10,2) NOT NULL DEFAULT '10.00',
  `router_management` varchar(2) NOT NULL DEFAULT '0',
  `annual_increment` float(3,1) NOT NULL DEFAULT '0.0',
  `increment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `log_server` varchar(2) NOT NULL DEFAULT 'n',
  `payment_frequency` enum('monthly','quarterly','halfyearly','yearly') NOT NULL DEFAULT 'monthly',
  `monitor` varchar(2) NOT NULL DEFAULT '0',
  `macbind` varchar(2) NOT NULL DEFAULT '0',
  `logedinuser` varchar(2) NOT NULL DEFAULT '0',
  `pms` varchar(2) NOT NULL DEFAULT '0',
  `checkincycle` int(2) NOT NULL DEFAULT '0',
  `pms_monitor` varchar(2) NOT NULL DEFAULT '0',
  `log_server_monitor` varchar(2) NOT NULL DEFAULT '0',
  `sms_gateway` varchar(255) DEFAULT NULL,
  `sms_gateway_auth_key` varchar(255) DEFAULT NULL,
  `sms_gateway_user` varchar(255) DEFAULT NULL,
  `sms_gateway_pass` varchar(255) DEFAULT NULL,
  `sms_gateway_senderid` varchar(255) DEFAULT NULL,
  `sms_gateway_template` varchar(255) DEFAULT NULL,
  `smtp_from` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `posting` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `CustomerID` (`customer_id`),
  KEY `LocationDomain_index` (`location_domain`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (4,3,'Sterlingyercaud','914a7a6fa9eb0a9','TamilNadu','yercaud','IN',91,NULL,NULL,NULL,0,0.00,0,0,0,1,'1','Mikrotik',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'none','00:00:00','23:59:59','16',500,500,'hotel',4,0,'1','','','','yercaud','TamilNadu','',NULL,NULL,NULL,NULL,0,NULL,0,NULL,'930389675432',1,0.00,0.00,'2023-06-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'192.168.1.150','0000','WiFi','2023-06-03 00:00:00','1',3,10.00,'0',0.0,'2023-06-03 00:00:00','n','monthly','0','0','0','1',0,'0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-06-03 14:54:27','2023-06-03 14:54:39',0);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations_users`
--

DROP TABLE IF EXISTS `locations_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations_users`
--

LOCK TABLES `locations_users` WRITE;
/*!40000 ALTER TABLE `locations_users` DISABLE KEYS */;
INSERT INTO `locations_users` VALUES (4,2,1,NULL,'2021-07-08 07:04:37'),(5,2,94,NULL,'2021-07-08 07:04:37'),(6,2,454,NULL,'2021-07-29 01:47:03'),(15,2,455,NULL,'2022-12-27 07:08:58'),(10,3,1,NULL,'2022-04-22 06:27:01'),(11,3,94,NULL,'2022-04-22 06:27:01'),(19,4,94,NULL,'2023-06-03 05:24:27'),(18,4,1,NULL,'2023-06-03 05:24:27');
/*!40000 ALTER TABLE `locations_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `message` text,
  `timestamp` datetime DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=712 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (709,'Info','3232235930','http://192.168.1.150/HSv3/locations/addLocation0','admin','Location ID: 4 created','2023-06-03 14:54:27','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','2023-06-03 14:54:27','2023-06-03 18:54:27'),(710,'Info','3232235930','http://192.168.1.150/HSv3/locations/addLocation1/4','admin','3','2023-06-03 14:54:39','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','2023-06-03 14:54:39','2023-06-03 18:54:39'),(711,'Info','3232235930','http://192.168.1.150/HSv3/locations/addLocation1/4','admin','Location commertial were added','2023-06-03 14:54:39','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','2023-06-03 14:54:39','2023-06-03 18:54:39');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nas`
--

DROP TABLE IF EXISTS `nas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) DEFAULT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nasname_2` (`nasname`),
  KEY `nasname` (`nasname`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nas`
--

LOCK TABLES `nas` WRITE;
/*!40000 ALTER TABLE `nas` DISABLE KEYS */;
INSERT INTO `nas` VALUES (4,'192.168.1.150','914a7a6fa9eb0a9','other',1812,'wf909radius',NULL,'wifonic','wifonic',4);
/*!40000 ALTER TABLE `nas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radacct`
--

DROP TABLE IF EXISTS `radacct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) unsigned DEFAULT NULL,
  `acctstopdelay` int(12) unsigned DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acctupdatetime` datetime DEFAULT NULL,
  `acctinterval` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  UNIQUE KEY `acctuniqueid` (`acctuniqueid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB AUTO_INCREMENT=121854 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radacct`
--

LOCK TABLES `radacct` WRITE;
/*!40000 ALTER TABLE `radacct` DISABLE KEYS */;
/*!40000 ALTER TABLE `radacct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radacctback`
--

DROP TABLE IF EXISTS `radacctback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radacctback` (
  `radacctid` bigint(21) NOT NULL DEFAULT '0',
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) unsigned DEFAULT NULL,
  `acctstopdelay` int(12) unsigned DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radacctback`
--

LOCK TABLES `radacctback` WRITE;
/*!40000 ALTER TABLE `radacctback` DISABLE KEYS */;
/*!40000 ALTER TABLE `radacctback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radacctjuly16`
--

DROP TABLE IF EXISTS `radacctjuly16`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radacctjuly16` (
  `radacctid` bigint(21) NOT NULL DEFAULT '0',
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) unsigned DEFAULT NULL,
  `acctstopdelay` int(12) unsigned DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radacctjuly16`
--

LOCK TABLES `radacctjuly16` WRITE;
/*!40000 ALTER TABLE `radacctjuly16` DISABLE KEYS */;
/*!40000 ALTER TABLE `radacctjuly16` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radcheck`
--

DROP TABLE IF EXISTS `radcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=MyISAM AUTO_INCREMENT=20212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radcheck`
--

LOCK TABLES `radcheck` WRITE;
/*!40000 ALTER TABLE `radcheck` DISABLE KEYS */;
/*!40000 ALTER TABLE `radcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radcheckjuly16`
--

DROP TABLE IF EXISTS `radcheckjuly16`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radcheckjuly16` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radcheckjuly16`
--

LOCK TABLES `radcheckjuly16` WRITE;
/*!40000 ALTER TABLE `radcheckjuly16` DISABLE KEYS */;
/*!40000 ALTER TABLE `radcheckjuly16` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupcheck`
--

DROP TABLE IF EXISTS `radgroupcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupcheck`
--

LOCK TABLES `radgroupcheck` WRITE;
/*!40000 ALTER TABLE `radgroupcheck` DISABLE KEYS */;
/*!40000 ALTER TABLE `radgroupcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupreply`
--

DROP TABLE IF EXISTS `radgroupreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupreply`
--

LOCK TABLES `radgroupreply` WRITE;
/*!40000 ALTER TABLE `radgroupreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `radgroupreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radpostauth`
--

DROP TABLE IF EXISTS `radpostauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radpostauth`
--

LOCK TABLES `radpostauth` WRITE;
/*!40000 ALTER TABLE `radpostauth` DISABLE KEYS */;
/*!40000 ALTER TABLE `radpostauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radreply`
--

DROP TABLE IF EXISTS `radreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=MyISAM AUTO_INCREMENT=7801 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radreply`
--

LOCK TABLES `radreply` WRITE;
/*!40000 ALTER TABLE `radreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `radreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radusergroup`
--

DROP TABLE IF EXISTS `radusergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radusergroup`
--

LOCK TABLES `radusergroup` WRITE;
/*!40000 ALTER TABLE `radusergroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `radusergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `country_code` int(3) NOT NULL DEFAULT '91',
  `gender` varchar(10) NOT NULL DEFAULT 'male',
  `date_of_birth` date DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `type` enum('subscription','facebook','google','linkedin','twitter') NOT NULL DEFAULT 'subscription',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_users`
--

LOCK TABLES `registered_users` WRITE;
/*!40000 ALTER TABLE `registered_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_coupons`
--

DROP TABLE IF EXISTS `report_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_coupons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `month` int(4) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `total_coupon` int(10) DEFAULT NULL,
  `total_upload` bigint(30) DEFAULT NULL,
  `total_download` bigint(30) DEFAULT NULL,
  `total_duration` bigint(30) DEFAULT NULL,
  `total_price` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_id_month_year` (`location_id`,`month`,`year`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_coupons`
--

LOCK TABLES `report_coupons` WRITE;
/*!40000 ALTER TABLE `report_coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `room_no` varchar(20) DEFAULT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_id` (`location_id`,`room_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sent_mails`
--

DROP TABLE IF EXISTS `sent_mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sent_mails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` text,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sent_mails`
--

LOCK TABLES `sent_mails` WRITE;
/*!40000 ALTER TABLE `sent_mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `sent_mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sent_messages`
--

DROP TABLE IF EXISTS `sent_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sent_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `to` text,
  `message` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sent_messages`
--

LOCK TABLES `sent_messages` WRITE;
/*!40000 ALTER TABLE `sent_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `sent_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `radacctid` bigint(21) NOT NULL DEFAULT '0',
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) unsigned DEFAULT NULL,
  `acctstopdelay` int(12) unsigned DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Maharashtra','2015-08-10 21:27:33','2015-08-11 01:27:33'),(2,'UttarPradesh','2015-08-10 21:27:33','2015-08-11 01:27:33'),(3,'Haryana','2015-08-10 21:27:33','2015-08-11 01:27:33'),(4,'AndhraPradesh','2015-08-10 21:27:33','2015-08-11 01:27:33'),(5,'Chhattisgarh','2015-08-10 21:27:33','2015-08-11 01:27:33'),(6,'Gujarat','2015-08-10 21:27:33','2015-08-11 01:27:33'),(7,'Kerala','2015-08-10 21:27:33','2015-08-11 01:27:33'),(8,'Jharkhand','2015-08-10 21:27:33','2015-08-11 01:27:33'),(9,'Uttarakhand','2015-08-10 21:27:33','2015-08-11 01:27:33'),(10,'Delhi','2015-08-10 21:27:33','2015-08-11 01:27:33'),(11,'Rajasthan','2015-08-10 21:27:33','2015-08-11 01:27:33'),(12,'WestBengal','2015-08-10 21:27:33','2015-08-11 01:27:33'),(13,'Goa','2015-08-10 21:27:33','2015-08-11 01:27:33'),(14,'Punjab','2015-08-10 21:27:33','2015-08-11 01:27:33'),(15,'TamilNadu','2015-08-10 21:27:33','2015-08-11 01:27:33'),(16,'Sikkim','2015-08-10 21:27:33','2015-08-11 01:27:33'),(17,'Odisha','2015-08-10 21:27:33','2015-08-11 01:27:33'),(18,'Karnataka','2015-08-10 21:27:33','2015-08-11 01:27:33'),(19,'Bihar','2015-08-10 21:27:33','2015-08-11 01:27:33'),(20,'HimachalPradesh','2015-08-10 21:27:33','2015-08-11 01:27:33'),(21,'AndamanAndNicobarIsland','2015-08-10 21:27:33','2015-08-11 01:27:33'),(22,'DadraAndNagarHaveli','2015-08-10 21:27:33','2015-08-11 01:27:33'),(23,'JammuAndKashmir','2015-08-10 21:27:33','2015-08-11 01:27:33'),(24,'MadhyaPradesh','2015-08-10 21:27:33','2015-08-11 01:27:33');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('email','sms') DEFAULT NULL,
  `template` text,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmpcp`
--

DROP TABLE IF EXISTS `tmpcp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmpcp` (
  `id` mediumint(9) NOT NULL DEFAULT '0',
  `cust_id` varchar(10) NOT NULL DEFAULT '',
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `department` varchar(200) DEFAULT NULL,
  `work_phone` varchar(200) DEFAULT NULL,
  `home_phone` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `username` varchar(60) NOT NULL DEFAULT '',
  `location_id` mediumint(9) NOT NULL DEFAULT '0',
  `mail` varchar(100) NOT NULL DEFAULT '',
  `upload_limit` varchar(100) NOT NULL DEFAULT '',
  `download_limit` varchar(100) NOT NULL DEFAULT '',
  `cr_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` varchar(255) DEFAULT NULL,
  `activated` smallint(4) NOT NULL DEFAULT '0',
  `active_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(4) NOT NULL DEFAULT '0',
  `rate` smallint(4) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL DEFAULT '',
  `billing_plan_id` smallint(4) NOT NULL DEFAULT '0',
  `time_to_finish` smallint(1) NOT NULL DEFAULT '0',
  `sn` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `foot_note` varchar(255) DEFAULT NULL,
  `called_station_id` varchar(255) DEFAULT NULL,
  `calling_station_id` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) NOT NULL DEFAULT 'none',
  `response_message` varchar(255) NOT NULL DEFAULT 'none',
  `date_created` varchar(255) NOT NULL DEFAULT 'none',
  `payment_id` varchar(255) NOT NULL DEFAULT 'none',
  `merchant_ref_no` varchar(255) NOT NULL DEFAULT 'none',
  `mode` varchar(255) NOT NULL DEFAULT 'none',
  `is_flagged` varchar(255) NOT NULL DEFAULT 'none',
  `transaction_id` varchar(255) NOT NULL DEFAULT 'none',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `is_sms` varchar(10) NOT NULL DEFAULT 'none',
  `country_code` int(11) DEFAULT NULL,
  `acct_input_octets` bigint(12) NOT NULL DEFAULT '0',
  `acct_output_octets` bigint(12) NOT NULL DEFAULT '0',
  `is_fup` enum('0','1') NOT NULL DEFAULT '0',
  `post_fup_limit` varchar(255) NOT NULL,
  `advertise_url` varchar(255) NOT NULL,
  `advertise_interval` int(10) NOT NULL,
  `simultaneous_limit` int(10) NOT NULL DEFAULT '1',
  `maximum_session` int(11) NOT NULL,
  `maximum_octet` int(11) NOT NULL,
  `expire_after` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmpcp`
--

LOCK TABLES `tmpcp` WRITE;
/*!40000 ALTER TABLE `tmpcp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmpcp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmppc1`
--

DROP TABLE IF EXISTS `tmppc1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmppc1` (
  `id` mediumint(9) NOT NULL DEFAULT '0',
  `cust_id` varchar(10) NOT NULL DEFAULT '',
  `firstname` varchar(40) NOT NULL DEFAULT '',
  `lastname` varchar(40) NOT NULL DEFAULT '',
  `department` varchar(200) DEFAULT NULL,
  `work_phone` varchar(200) DEFAULT NULL,
  `home_phone` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `username` varchar(60) NOT NULL DEFAULT '',
  `location_id` mediumint(9) NOT NULL DEFAULT '0',
  `mail` varchar(100) NOT NULL DEFAULT '',
  `upload_limit` varchar(100) NOT NULL DEFAULT '',
  `download_limit` varchar(100) NOT NULL DEFAULT '',
  `cr_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` varchar(255) DEFAULT NULL,
  `activated` smallint(4) NOT NULL DEFAULT '0',
  `active_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(4) NOT NULL DEFAULT '0',
  `rate` smallint(4) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL DEFAULT '',
  `billing_plan_id` smallint(4) NOT NULL DEFAULT '0',
  `time_to_finish` smallint(1) NOT NULL DEFAULT '0',
  `sn` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `foot_note` varchar(255) DEFAULT NULL,
  `called_station_id` varchar(255) DEFAULT NULL,
  `calling_station_id` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) NOT NULL DEFAULT 'none',
  `response_message` varchar(255) NOT NULL DEFAULT 'none',
  `date_created` varchar(255) NOT NULL DEFAULT 'none',
  `payment_id` varchar(255) NOT NULL DEFAULT 'none',
  `merchant_ref_no` varchar(255) NOT NULL DEFAULT 'none',
  `mode` varchar(255) NOT NULL DEFAULT 'none',
  `is_flagged` varchar(255) NOT NULL DEFAULT 'none',
  `transaction_id` varchar(255) NOT NULL DEFAULT 'none',
  `cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `is_sms` varchar(10) NOT NULL DEFAULT 'none',
  `country_code` int(11) DEFAULT NULL,
  `acct_input_octets` bigint(12) NOT NULL DEFAULT '0',
  `acct_output_octets` bigint(12) NOT NULL DEFAULT '0',
  `is_fup` enum('0','1') NOT NULL DEFAULT '0',
  `post_fup_limit` varchar(255) NOT NULL,
  `advertise_url` varchar(255) NOT NULL,
  `advertise_interval` int(10) NOT NULL,
  `simultaneous_limit` int(10) NOT NULL DEFAULT '1',
  `maximum_session` int(11) NOT NULL,
  `maximum_octet` int(11) NOT NULL,
  `expire_after` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmppc1`
--

LOCK TABLES `tmppc1` WRITE;
/*!40000 ALTER TABLE `tmppc1` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmppc1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '1',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=456 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,0,'admin','c44c8bcf97aa83afb225fdf2147a6193aa7435ea','WiFonic Admin','admin@wifonic.com','1','2014-06-09 12:16:30','2014-12-29 12:44:30'),(455,5,1,'pragati','f072c25d2aca4c1a9867d8230d6a7319670cae53','Pragati Resort','support@wifonicnetworks.com','1','2022-03-15 14:58:19','2022-12-27 17:38:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weblogs`
--

DROP TABLE IF EXISTS `weblogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weblogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT NULL,
  `http_method` varchar(10) DEFAULT NULL,
  `url` mediumtext,
  `receivedat` datetime DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `mac` varchar(32) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `receivedat` (`receivedat`)
) ENGINE=MyISAM AUTO_INCREMENT=2921108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weblogs`
--

LOCK TABLES `weblogs` WRITE;
/*!40000 ALTER TABLE `weblogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `weblogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-03  5:28:48
