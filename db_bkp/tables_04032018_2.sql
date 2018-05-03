/*
SQLyog Ultimate v8.54 
MySQL - 5.5.5-10.1.13-MariaDB : Database - karthic_cables
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE `sgmtechmart`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_code` varchar(10) DEFAULT NULL,
  `area` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `area` */

insert  into `area`(`area_id`,`area_code`,`area`,`status`,`added_on`,`updated_on`) values (1,'02','maniyakarar street','active','2018-03-03 00:40:27',NULL),(2,'02','muvantharnagar','active','2018-03-03 00:40:27',NULL),(3,'02','velayudha pannadi sandhu','active','2018-03-03 00:40:27',NULL),(4,'02','lakshmi nagar','active','2018-03-03 00:40:28',NULL),(5,'01','crosscut first street','active','2018-03-03 00:40:28',NULL),(6,'02','rajanayakar thotam','active','2018-03-03 00:40:28',NULL),(7,'02','kr sanmugapannadi sandhu','active','2018-03-03 00:40:28',NULL),(8,'02','vedapannadi sandhu','active','2018-03-03 00:40:28',NULL),(10,'03','area','inactive','2018-03-03 18:49:49',NULL);

/*Table structure for table `city_list` */

DROP TABLE IF EXISTS `city_list`;

CREATE TABLE `city_list` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `city_list` */

insert  into `city_list`(`city_id`,`city`,`pincode`,`state_id`,`dist_id`,`status`,`added_on`,`updated_on`) values (1,'kuniamuthur',641008,1,1,'active','2018-03-03 00:40:27',NULL),(2,'s s kulam',641107,1,1,'active','2018-03-03 00:40:28',NULL),(3,'b k pudur2',641005,1,1,'inactive','2018-03-03 21:11:07',NULL);

/*Table structure for table `company_list` */

DROP TABLE IF EXISTS `company_list`;

CREATE TABLE `company_list` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text,
  `branch` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `company_list` */

insert  into `company_list`(`company_id`,`company_name`,`branch`,`status`,`added_on`,`updated_on`) values (1,'karthickcabletv prorietor.k.myilvanan 04222251666 - 9489075500','kuniyamuthur','active','2018-03-03 00:40:27',NULL),(2,'tyttu hhjg',' jhg j','inactive','2018-03-04 01:25:29',NULL);

/*Table structure for table `district_list` */

DROP TABLE IF EXISTS `district_list`;

CREATE TABLE `district_list` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(100) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `district_list` */

insert  into `district_list`(`dist_id`,`district`,`state_id`,`status`,`added_on`,`updated_on`) values (1,'coimbatore',1,'active','2018-03-03 00:40:27',NULL),(2,'chennai',1,'inactive','2018-03-03 20:12:25',NULL);

/*Table structure for table `reason_list` */

DROP TABLE IF EXISTS `reason_list`;

CREATE TABLE `reason_list` (
  `reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`reason_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `reason_list` */

insert  into `reason_list`(`reason_id`,`reason`,`status`,`added_on`,`updated_on`) values (1,'shifting to new house 2','inactive','2018-03-04 00:47:14',NULL);

/*Table structure for table `sms_error_codes` */

DROP TABLE IF EXISTS `sms_error_codes`;

CREATE TABLE `sms_error_codes` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `error_code` varchar(10) DEFAULT NULL,
  `error_msg` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `createdOn` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sms_error_codes` */

/*Table structure for table `sms_track` */

DROP TABLE IF EXISTS `sms_track`;

CREATE TABLE `sms_track` (
  `smsid` int(11) NOT NULL AUTO_INCREMENT,
  `mobilenumber` varchar(15) DEFAULT NULL,
  `senderid` varchar(10) DEFAULT NULL,
  `status` enum('sent','failed','waiting') DEFAULT 'waiting',
  `returnCode` varchar(10) DEFAULT NULL,
  `messageID` text,
  `recordDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `dlr_required` enum('yes','no') DEFAULT 'no',
  `dlr_received_date` datetime DEFAULT NULL,
  PRIMARY KEY (`smsid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `sms_track` */

insert  into `sms_track`(`smsid`,`mobilenumber`,`senderid`,`status`,`returnCode`,`messageID`,`recordDate`,`dlr_required`,`dlr_received_date`) values (1,'919629786813','DIGIML','failed','1025','','2018-01-27 17:03:25','yes',NULL),(2,'919042956965','DIGIML','failed','1025','','2018-01-27 17:03:26','yes',NULL),(3,'919629786813','DIGIML','sent','1701','hshsadhjsadhjk','2018-01-27 17:04:17','yes',NULL),(4,'919042956965','DIGIML','sent','1701','hshsadhjsadhjk','2018-01-27 17:04:17','yes',NULL),(5,'919629786813','DIGIML','failed','1702','','2018-01-27 17:04:36','yes',NULL),(6,'919042956965','DIGIML','failed','1702','','2018-01-27 17:04:36','yes',NULL);

/*Table structure for table `state_list` */

DROP TABLE IF EXISTS `state_list`;

CREATE TABLE `state_list` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `state_list` */

insert  into `state_list`(`state_id`,`state_name`,`status`,`added_on`,`updated_on`) values (1,'tamilnadu','active','2018-03-03 00:40:27',NULL),(2,'keralam','inactive','2018-03-03 19:21:27',NULL);

/*Table structure for table `tariff_list` */

DROP TABLE IF EXISTS `tariff_list`;

CREATE TABLE `tariff_list` (
  `tariff_id` int(11) NOT NULL AUTO_INCREMENT,
  `tariff` varchar(250) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT '1',
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`tariff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tariff_list` */

insert  into `tariff_list`(`tariff_id`,`tariff`,`amount`,`months`,`status`,`added_on`,`updated_on`) values (1,'210',210,1,'active','2018-03-03 00:40:27',NULL),(2,'150',150,1,'active','2018-03-03 00:40:27',NULL),(3,'350 enjoye',35,1,'inactive','2018-03-04 00:34:09',NULL);

/*Table structure for table `user_import_dump` */

DROP TABLE IF EXISTS `user_import_dump`;

CREATE TABLE `user_import_dump` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kctv_id` varchar(50) DEFAULT NULL,
  `caf_id` varchar(50) DEFAULT NULL,
  `ca_id` varchar(50) DEFAULT NULL,
  `tactv_customer_id` varchar(50) DEFAULT NULL,
  `eb_sc_no` varchar(50) DEFAULT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `area_code` varchar(10) DEFAULT NULL,
  `area` text,
  `mobile_number` varchar(20) DEFAULT NULL,
  `alternate_number` varchar(20) DEFAULT NULL,
  `door_no` varchar(50) DEFAULT NULL,
  `street_name` text,
  `city` varchar(200) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `same_address` enum('yes','no') DEFAULT NULL,
  `permanent_door_no` varchar(50) DEFAULT NULL,
  `permanent_street_name` text,
  `permanent_city` varchar(200) DEFAULT NULL,
  `permanent_district` varchar(100) DEFAULT NULL,
  `permanent_state` varchar(100) DEFAULT NULL,
  `permanent_pin_code` int(11) DEFAULT NULL,
  `house` enum('own','rent') DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `company` text,
  `branch` varchar(250) DEFAULT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `reason` text,
  `installation_date` datetime DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `deactivation_date` datetime DEFAULT NULL,
  `shifting_date` datetime DEFAULT NULL,
  `rejoint_date` datetime DEFAULT NULL,
  `tariff` varchar(50) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `processed_on` datetime DEFAULT NULL,
  `status` enum('pending','uploaded','failed','reprocess') DEFAULT 'pending',
  `response` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `user_import_dump` */

insert  into `user_import_dump`(`ID`,`kctv_id`,`caf_id`,`ca_id`,`tactv_customer_id`,`eb_sc_no`,`customer_name`,`area_code`,`area`,`mobile_number`,`alternate_number`,`door_no`,`street_name`,`city`,`district`,`state`,`pin_code`,`same_address`,`permanent_door_no`,`permanent_street_name`,`permanent_city`,`permanent_district`,`permanent_state`,`permanent_pin_code`,`house`,`email_id`,`company`,`branch`,`account_status`,`reason`,`installation_date`,`activation_date`,`deactivation_date`,`shifting_date`,`rejoint_date`,`tariff`,`advance`,`balance`,`added_on`,`processed_on`,`status`,`response`,`user_id`) values (1,'2580B','875916','13130007','3658547','','MYILVANAN K','02','MANIYAKARAR STREET','9442535500','9489085500','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'own','kctv1965@gmail.com','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-07 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(2,'2580','663470','13014A15','283875','','KANNAMMAL M','02','MANIYAKARAR STREET','9489065500','9489075500','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-10-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(3,'2057','122223','130C9325','5478636','','MOHAMMED SADHIK ALI','02','MUVANTHARNAGAR','9003752559','8608859784','20/25','MOOVENDAR NAGAR',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-25 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,150,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(4,'2975','750789','13023242','566523','','MARUTHAI','02','VELAYUDHA PANNADI SANDHU','9037782770','','4/142','VELAYUDHA PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,450,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(5,'2976','750900','13021510','566535','','KALAMANI N','02','VELAYUDHA PANNADI SANDHU','9087783353  ','','142','VELAYUDHA PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,420,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(6,'21128','1777145','130D8976','3690997','','KANAGARAJ NITHYA','02','LAKSHMI NAGAR','9486325060','','',' LAKSHMI NAGAR','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','52E/30','ANNA NAGAR','S S KULAM','COIMBATORE','TAMILNADU',641107,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(7,'1673','320946','130D3073','3647948','','PAECHIAPPAN BABY','01','CROSSCUT FIRST STREET','9976988553','','17/19','CROSS CUT STREET NO 1','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-27 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(8,'2407A','604300','1302DFAF','553947','','NIJAMBALKISH','02','RAJANAYAKAR THOTAM','9894131956','9585675588','','RAJANAYAKAR THOTAM','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','54/1','THIRUNAGAR COLONY','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'rent','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-10-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(9,'2649B','2690286','140232C5','5896311','','KANNAN JAYASRI','02','KR SANMUGAPANNADI SANDHU','9944216168','','','KR SANMUGAPANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','122','SUNDAKAMUTHUR MAIN ROAD','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'rent','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2018-01-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,0,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(10,'2934A','487336','1308C148','3652634','','GANESAN','02','VEDAPANNADI SANDHU','7598818009','','21A','VADAB PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-30 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','',0,0,'2018-03-02 23:13:47',NULL,'uploaded','Success',1),(11,'2580B','875916','13130007','3658547','','MYILVANAN K','02','MANIYAKARAR STREET','9442535500','9489085500','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'own','kctv1965@gmail.com','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-07 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(12,'2580','663470','13014A15','283875','','KANNAMMAL M','02','MANIYAKARAR STREET','9489065500','9489075500','2/34','MANIAKARA STREET',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-10-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(13,'2057','122223','130C9325','5478636','','MOHAMMED SADHIK ALI','02','MUVANTHARNAGAR','9003752559','8608859784','20/25','MOOVENDAR NAGAR',' KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-25 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,150,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(14,'2975','750789','13023242','566523','','MARUTHAI','02','VELAYUDHA PANNADI SANDHU','9037782770','','4/142','VELAYUDHA PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,450,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(15,'2976','750900','13021510','566535','','KALAMANI N','02','VELAYUDHA PANNADI SANDHU','9087783353  ','','142','VELAYUDHA PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,420,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(16,'21128','1777145','130D8976','3690997','','KANAGARAJ NITHYA','02','LAKSHMI NAGAR','9486325060','','',' LAKSHMI NAGAR','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','52E/30','ANNA NAGAR','S S KULAM','COIMBATORE','TAMILNADU',641107,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(17,'1673','320946','130D3073','3647948','','PAECHIAPPAN BABY','01','CROSSCUT FIRST STREET','9976988553','','17/19','CROSS CUT STREET NO 1','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-12-27 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(18,'2407A','604300','1302DFAF','553947','','NIJAMBALKISH','02','RAJANAYAKAR THOTAM','9894131956','9585675588','','RAJANAYAKAR THOTAM','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','54/1','THIRUNAGAR COLONY','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'rent','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-10-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','210',0,210,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(19,'2649B','2690286','140232C5','5896311','','KANNAN JAYASRI','02','KR SANMUGAPANNADI SANDHU','9944216168','','','KR SANMUGAPANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'no','122','SUNDAKAMUTHUR MAIN ROAD','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'rent','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2018-01-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','150',0,0,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL),(20,'2934A','487336','1308C148','3652634','','GANESAN','02','VEDAPANNADI SANDHU','7598818009','','21A','VADAB PANNADI SANDHU','KUNIAMUTHUR','COIMBATORE','TAMILNADU',641008,'yes','','','','','',0,'own','','KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500','kuniyamuthur','Active','','2017-11-30 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','',0,0,'2018-03-03 00:44:13',NULL,'pending',NULL,NULL);

/*Table structure for table `user_list` */

DROP TABLE IF EXISTS `user_list`;

CREATE TABLE `user_list` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `kctv_id` varchar(50) DEFAULT NULL,
  `caf_id` varchar(50) DEFAULT NULL,
  `ca_id` varchar(50) DEFAULT NULL,
  `tactv_id` varchar(50) DEFAULT NULL,
  `eb_sc_no` varchar(50) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_type` enum('customer','admin','staff') DEFAULT 'customer',
  `password` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `alternate_number` varchar(20) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL COMMENT 'From Area Table',
  `door_no` varchar(20) DEFAULT NULL,
  `street_name` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL COMMENT 'From City Table',
  `dist_id` int(11) DEFAULT NULL COMMENT 'From District Table',
  `state_id` int(11) DEFAULT NULL COMMENT 'From State Table',
  `same_address` enum('yes','no') DEFAULT 'no',
  `p_door_no` varchar(20) DEFAULT NULL,
  `p_street_name` varchar(250) DEFAULT NULL,
  `p_city_id` int(11) DEFAULT NULL COMMENT 'From City Table',
  `p_dist_id` int(11) DEFAULT NULL COMMENT 'From District Table',
  `p_state_id` int(11) DEFAULT NULL COMMENT 'From State Table',
  `house_type` enum('own','rent') DEFAULT 'own',
  `company_id` int(11) DEFAULT NULL COMMENT 'From Company Table',
  `acc_status` enum('active','inactive','deleted','hold') DEFAULT 'active',
  `reason_id` int(11) DEFAULT NULL COMMENT 'From Reason Table',
  `installation_date` datetime DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `deactivation_date` datetime DEFAULT NULL,
  `shifting_date` datetime DEFAULT NULL,
  `rejoint_date` datetime DEFAULT NULL,
  `tariff_id` int(11) DEFAULT NULL COMMENT 'From Tariff Table',
  `advance` int(11) DEFAULT '0',
  `balance` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `user_list` */

insert  into `user_list`(`user_id`,`kctv_id`,`caf_id`,`ca_id`,`tactv_id`,`eb_sc_no`,`user_name`,`user_type`,`password`,`mobile_number`,`alternate_number`,`email_id`,`area_id`,`door_no`,`street_name`,`city_id`,`dist_id`,`state_id`,`same_address`,`p_door_no`,`p_street_name`,`p_city_id`,`p_dist_id`,`p_state_id`,`house_type`,`company_id`,`acc_status`,`reason_id`,`installation_date`,`activation_date`,`deactivation_date`,`shifting_date`,`rejoint_date`,`tariff_id`,`advance`,`balance`,`status`,`added_on`,`updated_on`) values (1,'2580B','875916','13130007','3658547','','MYILVANAN K','customer',NULL,'9442535500','9489085500','kctv1965@gmail.com',1,'2/34','maniakara street',1,1,1,'no','2/34','maniakara street',1,1,1,'own',1,'active',0,'2017-12-07 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,210,'active','2018-03-03 00:40:27',NULL),(2,'2580','663470','13014A15','283875','','KANNAMMAL M','customer',NULL,'9489065500','9489075500','',1,'2/34','maniakara street',1,1,1,'yes','','',1,1,1,'own',1,'active',0,'2017-10-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,210,'active','2018-03-03 00:40:27',NULL),(3,'2057','122223','130C9325','5478636','','MOHAMMED SADHIK ALI','customer',NULL,'9003752559','8608859784','',2,'20/25','moovendar nagar',1,1,1,'yes','','',1,1,1,'own',1,'active',0,'2017-12-25 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',2,0,150,'active','2018-03-03 00:40:27',NULL),(4,'2975','750789','13023242','566523','','MARUTHAI','customer',NULL,'9037782770','','',3,'4/142','velayudha pannadi sandhu',1,1,1,'yes','','',1,1,1,'own',1,'active',0,'2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',2,0,450,'active','2018-03-03 00:40:27',NULL),(5,'2976','750900','13021510','566535','','KALAMANI N','customer',NULL,'9087783353  ','','',3,'142','velayudha pannadi sandhu',1,1,1,'yes','','',1,1,1,'own',1,'active',0,'2017-11-15 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,420,'active','2018-03-03 00:40:28',NULL),(6,'21128','1777145','130D8976','3690997','','KANAGARAJ NITHYA','customer',NULL,'9486325060','','',4,'','lakshmi nagar',1,1,1,'no','52E/30','anna nagar',2,1,1,'own',1,'active',0,'2017-12-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,210,'active','2018-03-03 00:40:28',NULL),(7,'1673','320946','130D3073','3647948','','PAECHIAPPAN BABY','customer',NULL,'9976988553','','',5,'17/19','cross cut street no 1',1,1,1,'yes','','',2,1,1,'own',1,'active',0,'2017-12-27 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,210,'active','2018-03-03 00:40:28',NULL),(8,'2407A','604300','1302DFAF','553947','','NIJAMBALKISH','customer',NULL,'9894131956','9585675588','',6,'','rajanayakar thotam',1,1,1,'no','54/1','thirunagar colony',1,1,1,'rent',1,'active',0,'2017-10-26 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,210,'active','2018-03-03 00:40:28',NULL),(9,'2649B','2690286','140232C5','5896311','','KANNAN JAYASRI','customer',NULL,'9944216168','','',7,'','kr sanmugapannadi sandhu',1,1,1,'no','122','sundakamuthur main road',1,1,1,'rent',1,'active',0,'2018-01-14 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',2,0,0,'active','2018-03-03 00:40:28',NULL),(10,'2934A','487336','1308C148','3652634','','GANESAN','customer',NULL,'7598818009','','',8,'21A','vadab pannadi sandhu',1,1,1,'yes','','',1,1,1,'own',1,'active',0,'2017-11-30 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',2,0,0,'active','2018-03-03 00:40:28',NULL),(11,'123123','3323','234','1213','23','harish k','customer',NULL,'96296291','','chinjuharish@gmial.com',2,'23','werwer',1,1,1,'no','234','werew',1,1,1,'rent',1,'active',NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,2,0,150,'active','2018-03-04 11:24:56',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
