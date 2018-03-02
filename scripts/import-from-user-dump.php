<?php
require_once('../framework/database/init.php');

global $db;

$row = 1;
$select_query = "SELECT * from user_import_dump where status in ('pending', 'reprocess'); ";
$user_data = $db->executeQuery($select_query);

if(!empty($user_data)) {
  foreach ($user_data as $data) {
    $num = count($data);
    echo "<p> $num fields in line $row: <br /></p>\n";
/*    if($row == 1) {
		$row++;
		continue;
	}*/
	$row++;
	
	// Dump CSV Data to Dump Table
	$kctv_id = $data[0];
	$caf_id = $data[1];
	$ca_id = $data[2];
	$tactv_id = $data[3];
	$eb_sc_no = $data[4];
	$customer_name = $data[5];
	$area_code = $data[6];
	$area = strtolower($data[7]); // Only for String make strtolower($string)
	$mobile_number = $data[8];
	$alternate_number = $data[9];
	$door_no = $data[10];
	
	//add Till last 39 fields
	$door_no = $data[11];
	
	// Check If user exists
	
	/* Module - User Start */
	$user_exists = "SELECT * from user_list where kctv_id = '".$kctv_id."' and status='active'; ";
	$user_list = $db->executeQuery($user_exists);	
	$user_id = '';
	if(!empty($user_list)) {
		// ALREADY EXISTS - THROW ERROR
	} else {
		$ins_user = $db->executeQuery("INSERT INTO user_list (mobilenumber, senderid, dlr_required) VALUES ('".$mobilenumber."', '".$senderId."', 'yes') ");
		$user_id = $db->getLastInsertId();		
	}
	/* Module - User End */	
	
	/* Module - Area Start */
	if($area_code!='' && $area != '') {
		$area_exists = "SELECT * from area where area_code = '".$area_code."' AND area = '".$area."' AND status='active'; ";
		$area_list = $db->executeQuery($area_exists);	
		$area_id = '';
		if(!empty($area_list)) {
			// ALREADY EXISTS - THROW ERROR
			$area_id = $area_list[0]['area_id'];
		} else {
			$ins_area = $db->executeQuery("INSERT INTO area (area_code, area) VALUES ('".$area_code."', '".$area."') ");
			$area_id = $db->getLastInsertId();		
		}
	}
	/* Module - Area End */	
	
	
	// Following Tables should be checked
	/*
		Refer everything for user_import_dump table fields
		State table (state_list) - state_name -> state_id
		District table (district_list) - district, state_id -> dist_id
		City table (city_list) - city, pincode, state_id, dist_id -> city_id
		Company table (company_list) - company_name, branch -> company_id
		Reason table (reason_list) - reason -> reason_id
		Tariff table (tariff_list) - tariff,amount -> tariff_id
		User table (user_list) - All fields use from user field
	*/
	
	/*echo '<pre>';print_r($data);
    for ($c=0; $c < $num; $c++) {
        //echo $data[$c] . "<br />\n";
		//$kctv_id = $data[]
    }*/
  }
} else {
	echo 'No data to be processed';
}