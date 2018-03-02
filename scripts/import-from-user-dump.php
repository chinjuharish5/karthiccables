<?php
require_once('../framework/database/init.php');

global $db;

$row = 1;
$select_query = "SELECT * from user_import_dump where status in ('pending', 'reprocess'); ";
$user_data = $db->fetchQuery($select_query);
//echo '<pre>';print_r($user_data);exit;
if(!empty($user_data)) {
  foreach ($user_data as $data) {

        $dump_id = $data["ID"];
        $kctv_id = $data["kctv_id"];
	$caf_id = $data["caf_id"];
	$ca_id = $data["ca_id"];
	$tactv_id = $data["tactv_customer_id"];
	$eb_sc_no = $data["eb_sc_no"];
	$customer_name = $data["customer_name"];
	$area_code = $data["area_code"];
	$area = trim_string($data["area"]); // Only for String make trim_string($string)
	$mobile_number = $data["mobile_number"];
	$alternate_number = $data["alternate_number"];
	$door_no = $data["door_no"];
	$street_name = trim_string($data["street_name"]);
        $city = trim_string($data["city"]);
	$dist = trim_string($data["district"]);
        $state = trim_string($data["state"]);
        $pincode = $data["pin_code"];
        $same_address = trim_string($data["same_address"]);
        $perm_door_no = $data["permanent_door_no"];
        $perm_street_name = trim_string($data["permanent_street_name"]);
	$perm_city = trim_string($data["permanent_city"]);
        $perm_district = trim_string($data["permanent_district"]);
        $perm_state = trim_string($data["permanent_state"]);
        $perm_pincode = $data["permanent_pin_code"];
        $house = trim_string($data["house"]);
        $email_id = $data["email_id"];
        $company= trim_string($data["company"]);
        $branch = trim_string($data["branch"]);
        $account_status = trim_string($data["account_status"]);
        $reason = trim_string($data["reason"]);
	$instal_date = $data["installation_date"];
        $activation_date = $data["activation_date"];
        $deact_date = $data["deactivation_date"];
        $shift_date = $data["shifting_date"];
        $rejoint_date = $data["rejoint_date"];
        $tariff = $data["tariff"];
        $advance = $data["advance"];
        $balance = $data["balance"];

    //$num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
/*    if($row == 1) {
		$row++;
		continue;
	}*/
	$row++;
	
	
	
	// Check If user exists
	
	/* Module - User Start */
	$user_exists = "SELECT * from user_list where kctv_id = '".$kctv_id."' and status='active'; ";
	$user_list = $db->fetchQuery($user_exists);	
	$user_id = '';
	//echo '<pre>';print_r($user_list);exit;
	if(!empty($user_list)) {
		// ALREADY EXISTS - THROW ERROR
		$user_id = $user_list[0]['user_id'];
	} else {
		//$ins_user = $db->executeQuery("INSERT INTO user_list (mobilenumber, senderid, dlr_required) VALUES ('".$mobilenumber."', '".$senderId."', 'yes') ");
		//$user_id = $db->getLastInsertId();		
	}
	/* Module - User End */	
	
	/* Module - Area Start */
	if($area_code!='' && $area != '') {
		$area_exists = "SELECT * from area where area_code = '".$area_code."' AND area = '".$area."' AND status='active'; ";
		$area_list = $db->fetchQuery($area_exists);	
		//$area_id = '';
		if(!empty($area_list)) {
			// ALREADY EXISTS - THROW ERROR
			$area_id = $area_list[0]['area_id'];
		} else {
			$ins_area = $db->executeQuery("INSERT INTO area (area_code, area) VALUES ('".$area_code."', '".$area."') ");
			$area_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($area_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='area not found' where id='".$dump_id."'");
        continue;
      }
	}

	/* Module - Area End */


/* Module - State Start */
	if($state!='') {
		$state_exists = "SELECT * from state_list where state_name = '".$state."' AND status='active'; ";
		$state_list = $db->fetchQuery($state_exists);	
		//$area_id = '';
		if(!empty($state_list)) {
			// ALREADY EXISTS - THROW ERROR
			$state_id = $state_list[0]['state_id'];
		} else {
			$ins_state = $db->executeQuery("INSERT INTO state_list (state_name) VALUES ('".$state."') ");
			$state_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($state_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='state not found' where id='".$dump_id."'");
        continue;
      }
	}
	
	if($perm_state!='') {
		$state_exists = "SELECT * from state_list where state_name = '".$perm_state."' AND status='active'; ";
		$state_list = $db->fetchQuery($state_exists);	
		//$area_id = '';
		if(!empty($state_list)) {
			// ALREADY EXISTS - THROW ERROR
			$p_state_id = $state_list[0]['state_id'];
		} else {
			$ins_state = $db->executeQuery("INSERT INTO state_list (state_name) VALUES ('".$perm_state."') ");
			$p_state_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($p_state_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='p state not found' where id='".$dump_id."'");
        continue;
      }
	}	
	/* Module - State End */		


/* Module - District Start */
	if($dist!='' && $state_id != '') {
		$dist_exists = "SELECT * from district_list where district = '".$dist."' AND state_id = '".$state_id."' AND status='active'; ";
		//echo $dist_exists;exit;
		$district_list = $db->fetchQuery($dist_exists);	
		//$area_id = '';
		if(!empty($district_list)) {
			// ALREADY EXISTS - THROW ERROR
			$dist_id = $district_list[0]['dist_id'];
		} else {
			$ins_dist = $db->executeQuery("INSERT INTO district_list (district, state_id) VALUES ('".$dist."', '".$state_id."') ");
			$dist_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($dist_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='district not found' where id='".$dump_id."'");
        continue;
      }
	}
	
	if($perm_district!='' && $p_state_id != '') {
		$dist_exists = "SELECT * from district_list where district = '".$perm_district."' AND state_id = '".$p_state_id."' AND status='active'; ";
		$district_list = $db->fetchQuery($dist_exists);	
		//$area_id = '';
		if(!empty($district_list)) {
			// ALREADY EXISTS - THROW ERROR
			$p_dist_id = $district_list[0]['dist_id'];
		} else {
			$ins_dist = $db->executeQuery("INSERT INTO district_list (district, state_id) VALUES ('".$perm_district."', '".$p_state_id."') ");
			$p_dist_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($p_dist_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='district not found' where id='".$dump_id."'");
        continue;
      }
	}	
	/* Module - District End */	



/* Module - City Start */
	if($city!='' && $pincode != '' && $state_id != '' && $dist_id != '') {
		$city_exists = "SELECT * from city_list where city = '".$city."' AND pincode = '".$pincode."' AND state_id = '".$state_id."' AND dist_id = '".$dist_id."' AND status='active'; ";
		$city_list = $db->fetchQuery($city_exists);	
		//$area_id = '';
		if(!empty($city_list)) {
			// ALREADY EXISTS - THROW ERROR
			$city_id = $city_list[0]['city_id'];
		} else {
			$ins_city = $db->executeQuery("INSERT INTO city_list (city, pincode, state_id, dist_id) VALUES ('".$city."', '".$pincode."', '".$state_id."', '".$dist_id."' ) ");
			$city_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($city_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='city not found' where id='".$dump_id."'");
        continue;
      }
	}
	
	if($perm_city!='' && $perm_pincode != '' && $p_state_id != '' && $p_dist_id != '') {
		$city_exists = "SELECT * from city_list where city = '".$perm_city."' AND pincode = '".$perm_pincode."' AND state_id = '".$p_state_id."' AND dist_id = '".$p_dist_id."' AND status='active'; ";
		$city_list = $db->fetchQuery($city_exists);	
		//$area_id = '';
		if(!empty($city_list)) {
			// ALREADY EXISTS - THROW ERROR
			$p_city_id = $city_list[0]['city_id'];
		} else {
			$ins_city = $db->executeQuery("INSERT INTO city_list (city, pincode, state_id, dist_id) VALUES ('".$perm_city."', '".$perm_pincode."', '".$p_state_id."', '".$p_dist_id."' ) ");
			$p_city_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($p_city_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='city not found' where id='".$dump_id."'");
        continue;
      }
	}	

	/* Module - City End */

/* Module - Company Start */
	if($company!='' && $branch != '') {
		$company_exists = "SELECT * from company_list where company_name = '".$company."' AND branch = '".$branch."' AND status='active'; ";
		$company_list = $db->fetchQuery($company_exists);	
		//$area_id = '';
		if(!empty($company_list)) {
			// ALREADY EXISTS - THROW ERROR
			$company_id = $company_list[0]['company_id'];
		} else {
			$ins_company = $db->executeQuery("INSERT INTO company_list (company_name, branch) VALUES ('".$company."', '".$branch."') ");
			$company_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($company_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='company not found' where id='".$dump_id."'");
        continue;
      }
	}

	/* Module - Company End */


/* Module - Reason Start */
	$reason_id='';
	if($reason!='') {
		$reason_exists = "SELECT * from reason_list where reason = '".$reason."' AND status='active'; ";
		$reason_list = $db->fetchQuery($reason_exists);	
		//$area_id = '';
		if(!empty($reason_list)) {
			// ALREADY EXISTS - THROW ERROR
			$reason_id = $reason_list[0]['reason_id'];
		} else {
			$ins_reason = $db->executeQuery("INSERT INTO reason_list (reason) VALUES ('".$reason."') ");
			$reason_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($reason_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='state not found' where id='".$dump_id."'");
        continue;
      }
	}
	/* Module - Reason End */


/* Module - tariff Start */
	if($tariff!='' ) { // && $amount != ''
		$amount = $tariff;
		$tariff_exists = "SELECT * from tariff_list where tariff = '".$tariff."' AND amount = '".$amount."' AND status='active'; ";
		$tariff_list = $db->fetchQuery($tariff_exists);	
		//$area_id = '';
		if(!empty($tariff_list)) {
			// ALREADY EXISTS - THROW ERROR
			$tariff_id = $tariff_list[0]['tariff_id'];
		} else {
			$ins_tariff = $db->executeQuery("INSERT INTO tariff_list (tariff, amount) VALUES ('".$tariff."', '".$amount."') ");
			$tariff_id = $db->getLastInsertId();		
		}

       //Update the failure reason for area

        if($tariff_id==''){
        $update_reason = $db->executeQuery("update user_import_dump set status='failed', response='tariff not found' where id='".$dump_id."'");
        continue;
      }
	}

	/* Module - tariff End */

	
	// user_list
	if($user_id=='') {
		$ins_udata = "INSERT INTO user_list(kctv_id, caf_id, ca_id, tactv_id, eb_sc_no, user_name, user_type, mobile_number, alternate_number, email_id, area_id, door_no, street_name, city_id, dist_id, state_id, same_address, p_door_no, p_street_name, p_city_id, p_dist_id, p_state_id, house_type, company_id, acc_status, reason_id, installation_date, activation_date, deactivation_date, shifting_date, rejoint_date, tariff_id, advance, balance) VALUES ('".$kctv_id."', '".$caf_id."', '".$ca_id."', '".$tactv_id."', '".$eb_sc_no."', '".$customer_name."', 'customer', '".$mobile_number."', '".$alternate_number."', '".$email_id."', '".$area_id."', '".$door_no."', '".$street_name."', '".$city_id."', '".$dist_id."', '".$state_id."', '".$same_address."', '".$perm_door_no."', '".$perm_street_name."', '".$p_city_id."', '".$p_dist_id."', '".$p_state_id."', '".$house."', '".$company_id."', '".$account_status."', '".$reason_id."', '".$instal_date."', '".$activation_date."', '".$deact_date."', '".$shift_date."', '".$rejoint_date."', '".$tariff_id."', '".$advance."', '".$balance."' )";
		
		//echo $ins_udata."<br>";
		$ins_userdata = $db->executeQuery($ins_udata);
		
		$update_reason = $db->executeQuery("update user_import_dump set status='uploaded', response='Success',user_id='".$ins_userdata."' where id='".$dump_id."'");
	}
	
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
		//$kctv_id = $data[]
    }*/
  }
} else {
	echo 'No data to be processed';
}

function trim_string($string) {
	return strtolower(trim($string));
}