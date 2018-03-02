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
	$street_name = $data[11];
        $city = $data[12];
	$district = $data[13];
        $state = $data[14];
        $pin_code = $data[15];
        $same_address = $data[16];
        $perm_door_no = $data[17];
        $perm_street_name = $data[18];
	$perm_city = $data[19];
        $perm_district = $data[20];
        $perm_state = $data[21];
        $perm_pincode = $data[22];
        $house = $data[23];
        $email_id = $data[24];
        $company= $data[25];
        $branch = $data[26];
        $account_status = $data[27];
        $reason = $data[28];
	$instal_date = $data[29];
        $activation_date = $data[30];
        $deact_date = $data[31];
        $shift_date = $data[32];
        $rejoint_date = $data[33];
        $tariff = $data[34];
        $advance = $data[35];
        $balance = $data[36];
        
	if($kctv_id!='') {	
		$ins_query = "INSERT INTO user_import_dump (kctv_id, caf_id, ca_id, tactv_customer_id, eb_sc_no, customer_name, area_code, area, mobile_number, alternate_number, door_no, street_name, city, district, state, pin_code, same_address, permanent_door_no, permanent_street_name, permanent_city, permanent_district, permanent_state, permanent_pin_code, house, email_id, company, branch, account_status, reason, installation_date, activation_date, deactivation_date, shifting_date, rejoint_date, tariff, advance, balance) VALUES ('".$kctv_id."', '".$caf_id."', '".$ca_id."', '".$tactv_id."', '".$eb_sc_no."', '".$customer_name."', '".$area_code."', '".$area."', '".$mobile_number."', '".$alternate_number."', '".$door_no."', '".$street_name."', '".$city."', '".$district."', '".$state."', '".$pin_code."', '".$same_address."',  '".$perm_door_no."', '".$perm_street_name."', '".$perm_city."', '".$perm_district."', '".$perm_state."', '".$perm_pincode."', '".$house."', '".$email_id."', '".$company."', '".$branch."', '".$account_status."', '".$reason."', '".$instal_date."', '".$activation_date."', '".$deact_date."', '".$shift_date."', '".$rejoint_date."', '".$tariff."', '".$advance."', '".$balance."') ";
	
		//echo $ins_query."<br>";
		$ins_udump = $db->executeQuery($ins_query);
		$udump_id = $db->getLastInsertId();
	}
	
	/*echo '<pre>';print_r($data);
    for ($c=0; $c < $num; $c++) {
        //echo $data[$c] . "<br />\n";
		//$kctv_id = $data[]
    }*/
  }
  fclose($handle);
}