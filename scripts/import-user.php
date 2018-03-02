<?php
require_once('../framework/database/init.php');

global $db;

$row = 1;
if (($handle = fopen("../uploads/User_Upload_Sample_data.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    echo "<p> $num fields in line $row: <br /></p>\n";
    if($row == 1) {
		$row++;
		continue;
	}
	$row++;
	
	// Dump CSV Data to Dump Table
	$kctv_id = $data[0];
	$caf_id = $data[1];
	$ca_id = $data[2];
	$tactv_id = $data[3];
	$eb_sc_no = $data[4];
	$customer_name = $data[5];
	$area_code = $data[6];
	$area = $data[7];
	$mobile_number = $data[8];
	$alternate_number = $data[9];
	$door_no = $data[10];
	
	//add Till last 39 fields
	$door_no = $data[11];
	
	/*
	CREATE TABLE `user_import_dump` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kctv_id` varchar(50) DEFAULT NULL,
  `caf_id` varchar(50) DEFAULT NULL,
  `ca_id` varchar(50) DEFAULT NULL,
  `tactv_customer_id` varchar(50) DEFAULT NULL,
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

	*/
	
	
	$ins_udump = $db->executeQuery("INSERT INTO user_import_dump (mobilenumber, senderid, dlr_required) VALUES ('".$mobilenumber."', '".$senderId."', 'yes') ");
	$udump_id = $db->getLastInsertId();
	
	/*echo '<pre>';print_r($data);
    for ($c=0; $c < $num; $c++) {
        //echo $data[$c] . "<br />\n";
		//$kctv_id = $data[]
    }*/
  }
  fclose($handle);
}