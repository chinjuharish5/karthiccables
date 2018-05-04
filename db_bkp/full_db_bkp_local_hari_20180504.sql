-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 05:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karthiccables`
--
CREATE DATABASE IF NOT EXISTS `karthiccables` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `karthiccables`;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_code` varchar(10) DEFAULT NULL,
  `area` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_code`, `area`, `status`, `added_on`, `updated_on`) VALUES
(1, '02', 'maniyakarar street', 'active', '2018-03-03 00:40:27', NULL),
(2, '02', 'muvantharnagar', 'active', '2018-03-03 00:40:27', NULL),
(3, '02', 'velayudha pannadi sandhu', 'active', '2018-03-03 00:40:27', NULL),
(4, '02', 'lakshmi nagar', 'active', '2018-03-03 00:40:28', NULL),
(5, '01', 'crosscut first street', 'active', '2018-03-03 00:40:28', NULL),
(6, '02', 'rajanayakar thotam', 'active', '2018-03-03 00:40:28', NULL),
(7, '02', 'kr sanmugapannadi sandhu', 'active', '2018-03-03 00:40:28', NULL),
(8, '02', 'vedapannadi sandhu', 'active', '2018-03-03 00:40:28', NULL),
(10, '03', 'area', 'inactive', '2018-03-03 18:49:49', NULL),
(11, '624612', 'odc', 'active', '2018-03-04 00:10:16', NULL),
(12, '04', 'odc', 'active', '2018-03-04 00:10:45', NULL),
(13, '03', 'odc', 'inactive', '2018-03-04 00:10:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

DROP TABLE IF EXISTS `city_list`;
CREATE TABLE `city_list` (
  `city_id` int(11) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`city_id`, `city`, `pincode`, `state_id`, `dist_id`, `status`, `added_on`, `updated_on`) VALUES
(1, 'kuniamuthur', 641008, 1, 1, 'active', '2018-03-03 00:40:27', NULL),
(2, 's s kulam', 641107, 1, 1, 'active', '2018-03-03 00:40:28', NULL),
(3, 'b k pudur2', 641005, 1, 1, 'inactive', '2018-03-03 21:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_list`
--

DROP TABLE IF EXISTS `company_list`;
CREATE TABLE `company_list` (
  `company_id` int(11) NOT NULL,
  `company_name` text,
  `branch` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_list`
--

INSERT INTO `company_list` (`company_id`, `company_name`, `branch`, `status`, `added_on`, `updated_on`) VALUES
(1, 'karthickcabletv prorietor.k.myilvanan 04222251666 - 9489075500', 'kuniyamuthur', 'active', '2018-03-03 00:40:27', NULL),
(2, 'tyttu hhjg', ' jhg j', 'inactive', '2018-03-04 01:25:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district_list`
--

DROP TABLE IF EXISTS `district_list`;
CREATE TABLE `district_list` (
  `dist_id` int(11) NOT NULL,
  `district` varchar(100) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district_list`
--

INSERT INTO `district_list` (`dist_id`, `district`, `state_id`, `status`, `added_on`, `updated_on`) VALUES
(1, 'coimbatore', 1, 'active', '2018-03-03 00:40:27', NULL),
(2, 'chennai', 1, 'inactive', '2018-03-03 20:12:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `pid` int(11) NOT NULL,
  `userid` int(11) NOT NULL COMMENT 'Reference from user table',
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `transaction_type` enum('debit','credit','discount') NOT NULL DEFAULT 'credit',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_type` enum('online','offline') NOT NULL DEFAULT 'offline',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pid`, `userid`, `amount`, `description`, `transaction_type`, `payment_date`, `payment_type`, `status`) VALUES
(1, 5, 10, 'Testing', 'credit', '2018-04-08 10:10:53', 'offline', 'active'),
(2, 5, 20, 'ad', 'credit', '2018-04-08 10:42:49', 'offline', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reason_list`
--

DROP TABLE IF EXISTS `reason_list`;
CREATE TABLE `reason_list` (
  `reason_id` int(11) NOT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reason_list`
--

INSERT INTO `reason_list` (`reason_id`, `reason`, `status`, `added_on`, `updated_on`) VALUES
(1, 'shifting to new house 2', 'inactive', '2018-03-04 00:47:14', NULL),
(2, 'line cut', 'active', '2018-03-04 09:09:52', NULL),
(3, 'line cut', 'active', '2018-03-04 09:09:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_error_codes`
--

DROP TABLE IF EXISTS `sms_error_codes`;
CREATE TABLE `sms_error_codes` (
  `eid` int(11) NOT NULL,
  `error_code` varchar(10) DEFAULT NULL,
  `error_msg` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `createdOn` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_track`
--

DROP TABLE IF EXISTS `sms_track`;
CREATE TABLE `sms_track` (
  `smsid` int(11) NOT NULL,
  `mobilenumber` varchar(15) DEFAULT NULL,
  `senderid` varchar(10) DEFAULT NULL,
  `status` enum('sent','failed','waiting') DEFAULT 'waiting',
  `returnCode` varchar(10) DEFAULT NULL,
  `messageID` text,
  `recordDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `dlr_required` enum('yes','no') DEFAULT 'no',
  `dlr_received_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_track`
--

INSERT INTO `sms_track` (`smsid`, `mobilenumber`, `senderid`, `status`, `returnCode`, `messageID`, `recordDate`, `dlr_required`, `dlr_received_date`) VALUES
(1, '919629786813', 'DIGIML', 'failed', '1025', '', '2018-01-27 17:03:25', 'yes', NULL),
(2, '919042956965', 'DIGIML', 'failed', '1025', '', '2018-01-27 17:03:26', 'yes', NULL),
(3, '919629786813', 'DIGIML', 'sent', '1701', 'hshsadhjsadhjk', '2018-01-27 17:04:17', 'yes', NULL),
(4, '919042956965', 'DIGIML', 'sent', '1701', 'hshsadhjsadhjk', '2018-01-27 17:04:17', 'yes', NULL),
(5, '919629786813', 'DIGIML', 'failed', '1702', '', '2018-01-27 17:04:36', 'yes', NULL),
(6, '919042956965', 'DIGIML', 'failed', '1702', '', '2018-01-27 17:04:36', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

DROP TABLE IF EXISTS `state_list`;
CREATE TABLE `state_list` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`state_id`, `state_name`, `status`, `added_on`, `updated_on`) VALUES
(1, 'tamilnadu', 'active', '2018-03-03 00:40:27', NULL),
(2, 'keralam', 'inactive', '2018-03-03 19:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tariff_list`
--

DROP TABLE IF EXISTS `tariff_list`;
CREATE TABLE `tariff_list` (
  `tariff_id` int(11) NOT NULL,
  `tariff` varchar(250) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT '1',
  `status` enum('active','inactive') DEFAULT 'active',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tariff_list`
--

INSERT INTO `tariff_list` (`tariff_id`, `tariff`, `amount`, `months`, `status`, `added_on`, `updated_on`) VALUES
(1, '210', 210, 1, 'active', '2018-03-03 00:40:27', NULL),
(2, '150', 150, 1, 'active', '2018-03-03 00:40:27', NULL),
(3, '350 enjoye', 35, 1, 'inactive', '2018-03-04 00:34:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_import_dump`
--

DROP TABLE IF EXISTS `user_import_dump`;
CREATE TABLE `user_import_dump` (
  `ID` int(11) NOT NULL,
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_import_dump`
--

INSERT INTO `user_import_dump` (`ID`, `kctv_id`, `caf_id`, `ca_id`, `tactv_customer_id`, `eb_sc_no`, `customer_name`, `area_code`, `area`, `mobile_number`, `alternate_number`, `door_no`, `street_name`, `city`, `district`, `state`, `pin_code`, `same_address`, `permanent_door_no`, `permanent_street_name`, `permanent_city`, `permanent_district`, `permanent_state`, `permanent_pin_code`, `house`, `email_id`, `company`, `branch`, `account_status`, `reason`, `installation_date`, `activation_date`, `deactivation_date`, `shifting_date`, `rejoint_date`, `tariff`, `advance`, `balance`, `added_on`, `processed_on`, `status`, `response`, `user_id`) VALUES
(1, '2580B', '875916', '13130007', '3658547', '', 'MYILVANAN K', '02', 'MANIYAKARAR STREET', '9442535500', '9489085500', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'own', 'kctv1965@gmail.com', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(2, '2580', '663470', '13014A15', '283875', '', 'KANNAMMAL M', '02', 'MANIYAKARAR STREET', '9489065500', '9489075500', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-10-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(3, '2057', '122223', '130C9325', '5478636', '', 'MOHAMMED SADHIK ALI', '02', 'MUVANTHARNAGAR', '9003752559', '8608859784', '20/25', 'MOOVENDAR NAGAR', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 150, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(4, '2975', '750789', '13023242', '566523', '', 'MARUTHAI', '02', 'VELAYUDHA PANNADI SANDHU', '9037782770', '', '4/142', 'VELAYUDHA PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 450, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(5, '2976', '750900', '13021510', '566535', '', 'KALAMANI N', '02', 'VELAYUDHA PANNADI SANDHU', '9087783353  ', '', '142', 'VELAYUDHA PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 420, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(6, '21128', '1777145', '130D8976', '3690997', '', 'KANAGARAJ NITHYA', '02', 'LAKSHMI NAGAR', '9486325060', '', '', ' LAKSHMI NAGAR', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '52E/30', 'ANNA NAGAR', 'S S KULAM', 'COIMBATORE', 'TAMILNADU', 641107, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(7, '1673', '320946', '130D3073', '3647948', '', 'PAECHIAPPAN BABY', '01', 'CROSSCUT FIRST STREET', '9976988553', '', '17/19', 'CROSS CUT STREET NO 1', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-27 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(8, '2407A', '604300', '1302DFAF', '553947', '', 'NIJAMBALKISH', '02', 'RAJANAYAKAR THOTAM', '9894131956', '9585675588', '', 'RAJANAYAKAR THOTAM', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '54/1', 'THIRUNAGAR COLONY', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'rent', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-10-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(9, '2649B', '2690286', '140232C5', '5896311', '', 'KANNAN JAYASRI', '02', 'KR SANMUGAPANNADI SANDHU', '9944216168', '', '', 'KR SANMUGAPANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '122', 'SUNDAKAMUTHUR MAIN ROAD', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'rent', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2018-01-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 0, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(10, '2934A', '487336', '1308C148', '3652634', '', 'GANESAN', '02', 'VEDAPANNADI SANDHU', '7598818009', '', '21A', 'VADAB PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '2018-03-02 23:13:47', NULL, 'uploaded', 'Success', 1),
(11, '2580B', '875916', '13130007', '3658547', '', 'MYILVANAN K', '02', 'MANIYAKARAR STREET', '9442535500', '9489085500', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'own', 'kctv1965@gmail.com', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(12, '2580', '663470', '13014A15', '283875', '', 'KANNAMMAL M', '02', 'MANIYAKARAR STREET', '9489065500', '9489075500', '2/34', 'MANIAKARA STREET', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-10-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(13, '2057', '122223', '130C9325', '5478636', '', 'MOHAMMED SADHIK ALI', '02', 'MUVANTHARNAGAR', '9003752559', '8608859784', '20/25', 'MOOVENDAR NAGAR', ' KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 150, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(14, '2975', '750789', '13023242', '566523', '', 'MARUTHAI', '02', 'VELAYUDHA PANNADI SANDHU', '9037782770', '', '4/142', 'VELAYUDHA PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 450, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(15, '2976', '750900', '13021510', '566535', '', 'KALAMANI N', '02', 'VELAYUDHA PANNADI SANDHU', '9087783353  ', '', '142', 'VELAYUDHA PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 420, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(16, '21128', '1777145', '130D8976', '3690997', '', 'KANAGARAJ NITHYA', '02', 'LAKSHMI NAGAR', '9486325060', '', '', ' LAKSHMI NAGAR', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '52E/30', 'ANNA NAGAR', 'S S KULAM', 'COIMBATORE', 'TAMILNADU', 641107, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(17, '1673', '320946', '130D3073', '3647948', '', 'PAECHIAPPAN BABY', '01', 'CROSSCUT FIRST STREET', '9976988553', '', '17/19', 'CROSS CUT STREET NO 1', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-12-27 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(18, '2407A', '604300', '1302DFAF', '553947', '', 'NIJAMBALKISH', '02', 'RAJANAYAKAR THOTAM', '9894131956', '9585675588', '', 'RAJANAYAKAR THOTAM', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '54/1', 'THIRUNAGAR COLONY', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'rent', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-10-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '210', 0, 210, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(19, '2649B', '2690286', '140232C5', '5896311', '', 'KANNAN JAYASRI', '02', 'KR SANMUGAPANNADI SANDHU', '9944216168', '', '', 'KR SANMUGAPANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'no', '122', 'SUNDAKAMUTHUR MAIN ROAD', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'rent', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2018-01-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', 0, 0, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL),
(20, '2934A', '487336', '1308C148', '3652634', '', 'GANESAN', '02', 'VEDAPANNADI SANDHU', '7598818009', '', '21A', 'VADAB PANNADI SANDHU', 'KUNIAMUTHUR', 'COIMBATORE', 'TAMILNADU', 641008, 'yes', '', '', '', '', '', 0, 'own', '', 'KARTHICKCABLETV PRORIETOR.K.MYILVANAN 04222251666 - 9489075500', 'kuniyamuthur', 'Active', '', '2017-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, '2018-03-03 00:44:13', NULL, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE `user_list` (
  `user_id` int(11) NOT NULL,
  `kctv_id` varchar(50) DEFAULT NULL,
  `caf_id` varchar(50) DEFAULT NULL,
  `ca_id` varchar(50) DEFAULT NULL,
  `tactv_id` varchar(50) DEFAULT NULL,
  `eb_sc_no` varchar(50) DEFAULT NULL,
  `cylinder_no` varchar(50) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_type` enum('customer','admin','staff','rent_staff','own_staff') DEFAULT 'customer',
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
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`user_id`, `kctv_id`, `caf_id`, `ca_id`, `tactv_id`, `eb_sc_no`, `cylinder_no`, `user_name`, `user_type`, `password`, `mobile_number`, `alternate_number`, `email_id`, `area_id`, `door_no`, `street_name`, `city_id`, `dist_id`, `state_id`, `same_address`, `p_door_no`, `p_street_name`, `p_city_id`, `p_dist_id`, `p_state_id`, `house_type`, `company_id`, `acc_status`, `reason_id`, `installation_date`, `activation_date`, `deactivation_date`, `shifting_date`, `rejoint_date`, `tariff_id`, `advance`, `balance`, `status`, `added_on`, `updated_on`) VALUES
(1, '258555', '875916', '13130007', '3658547', '', '', 'myilvanan k', 'customer', NULL, '9442535500', '9489085500', 'kctv1965@gmail.com', 1, '2/34', 'maniakara street', 1, 1, 1, 'no', '2/34', 'maniakara street', 1, 1, 1, 'own', 1, 'active', 0, '2017-12-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 210, 'inactive', '2018-03-03 00:40:27', NULL),
(2, '2589', '663470', '13014A15', '283875', '', '', 'kannammal m', 'customer', NULL, '9489065500', '9489075500', '', 1, '2/34', 'maniakara street', 1, 1, 1, 'yes', '', '', 1, 1, 1, 'own', 1, 'active', 0, '2017-10-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 210, 'active', '2018-03-03 00:40:27', NULL),
(3, '2057', '122223', '130C9325', '5478636', '', '', 'MOHAMMED SADHIK ALI', 'customer', NULL, '9003752559', '8608859784', '', 2, '20/25', 'moovendar nagar', 1, 1, 1, 'yes', '', '', 1, 1, 1, 'own', 1, 'active', 0, '2017-12-25 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 150, 'active', '2018-03-03 00:40:27', NULL),
(4, '2975', '750789', '13023242', '566523', '', '', 'MARUTHAI', 'customer', NULL, '9037782770', '', '', 3, '4/142', 'velayudha pannadi sandhu', 1, 1, 1, 'yes', '', '', 1, 1, 1, 'own', 1, 'active', 0, '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 450, 'active', '2018-03-03 00:40:27', NULL),
(5, '2976', '750900', '13021510', '566535', '', '', 'KALAMANI N', 'customer', NULL, '9087783353  ', '', '', 3, '142', 'velayudha pannadi sandhu', 1, 1, 1, 'yes', '', '', 1, 1, 1, 'own', 1, 'active', 0, '2017-11-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 420, 'active', '2018-03-03 00:40:28', NULL),
(6, '21128', '1777145', '130D8976', '3690997', '', '', 'KANAGARAJ NITHYA', 'customer', NULL, '9486325060', '', '', 4, '', 'lakshmi nagar', 1, 1, 1, 'no', '52E/30', 'anna nagar', 2, 1, 1, 'own', 1, 'active', 0, '2017-12-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 210, 'active', '2018-03-03 00:40:28', NULL),
(7, '1673', '320946', '130D3073', '3647948', '', '', 'PAECHIAPPAN BABY', 'customer', NULL, '9976988553', '', '', 5, '17/19', 'cross cut street no 1', 1, 1, 1, 'yes', '', '', 2, 1, 1, 'own', 1, 'active', 0, '2017-12-27 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 210, 'active', '2018-03-03 00:40:28', NULL),
(8, '2407A', '604300', '1302DFAF', '553947', '', '', 'nijambalkish', 'customer', NULL, '9894131956', '9585675588', '', 6, '', 'rajanayakar thotam', 1, 1, 1, 'no', '54/1', 'thirunagar colony', 1, 1, 1, 'rent', 1, 'active', 0, '2017-10-26 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 210, 'active', '2018-03-03 00:40:28', NULL),
(9, '2649B', '2690286', '140232C5', '5896311', '', '', 'KANNAN JAYASRI', 'customer', NULL, '9944216168', '', '', 7, '', 'kr sanmugapannadi sandhu', 1, 1, 1, 'no', '122', 'sundakamuthur main road', 1, 1, 1, 'rent', 1, 'active', 0, '2018-01-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 0, 'active', '2018-03-03 00:40:28', NULL),
(10, '2934A', '487336', '1308C148', '3652634', '', '', 'GANESAN', 'customer', NULL, '7598818009', '', '', 8, '21A', 'vadab pannadi sandhu', 1, 1, 1, 'yes', '', '', 1, 1, 1, 'own', 1, 'active', 0, '2017-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 0, 'active', '2018-03-03 00:40:28', NULL),
(11, '123123', '3323', '234', '1213', '23', '', 'harish k', 'customer', NULL, '96296291', '', 'chinjuharish@gmial.com', 2, '23', 'werwer', 1, 1, 1, 'no', '234', 'werew', 1, 1, 1, 'rent', 1, 'active', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 2, 0, 150, 'active', '2018-03-04 11:24:56', NULL),
(12, '2580B', '875916', '13130007', '3658547', '0', '', 'myilvanan k ', 'customer', NULL, '9442535500', '9442535500', '0', 1, '17/34', 'maniyakarar veedhi ', 1, 1, 1, 'yes', '', '', 0, 0, 0, 'own', 1, 'active', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 1, 0, 0, 'active', '2018-03-04 09:05:27', NULL),
(13, NULL, NULL, NULL, NULL, NULL, '', 'Admin', 'admin', 'admin', NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, NULL, 'own', NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'active', '2018-03-10 12:32:51', NULL),
(14, '', '', '', '', '', '', 'own staff', 'own_staff', 'admin123', '', '', 'ownstaff1@gmail.com', 0, '', '', 0, 0, 0, 'yes', '', '', 0, 0, 0, 'own', 0, 'active', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 0, 0, 0, 'active', '2018-03-09 23:05:59', NULL),
(15, '', '', '', '', '', '', 'rent staff', 'rent_staff', 'admin123', '', '', 'rentstaff1@gmail.com', 0, '', '', 0, 0, 0, 'yes', '', '', 0, 0, 0, 'rent', 0, 'active', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 0, 0, 0, 'active', '2018-03-09 23:05:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company_list`
--
ALTER TABLE `company_list`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `district_list`
--
ALTER TABLE `district_list`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reason_list`
--
ALTER TABLE `reason_list`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `sms_error_codes`
--
ALTER TABLE `sms_error_codes`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `sms_track`
--
ALTER TABLE `sms_track`
  ADD PRIMARY KEY (`smsid`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tariff_list`
--
ALTER TABLE `tariff_list`
  ADD PRIMARY KEY (`tariff_id`);

--
-- Indexes for table `user_import_dump`
--
ALTER TABLE `user_import_dump`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district_list`
--
ALTER TABLE `district_list`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reason_list`
--
ALTER TABLE `reason_list`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_error_codes`
--
ALTER TABLE `sms_error_codes`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_track`
--
ALTER TABLE `sms_track`
  MODIFY `smsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tariff_list`
--
ALTER TABLE `tariff_list`
  MODIFY `tariff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_import_dump`
--
ALTER TABLE `user_import_dump`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
