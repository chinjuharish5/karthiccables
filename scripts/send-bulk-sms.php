<?php
require_once('../framework/database/init.php');
require_once('../library/send-sms-api.php');

global $db;

$numbers = array('919629786813', '919042956965');
foreach($numbers as $mobilenumber) {
	
	$senderId = 'DIGIML';
	$ins_sms = $db->executeQuery("INSERT INTO sms_track (mobilenumber, senderid, dlr_required) VALUES ('".$mobilenumber."', '".$senderId."', 'yes') ");
	$sms_id = $db->getLastInsertId();
	
	$ch = curl_init();
	$postUrl = "http://sms.digimiles.in/bulksms/bulksms?username=di78-trans&password=miles&type=0&dlr=1&destination=".$mobilenumber."&source=DIGIML&message=hello";

	curl_setopt($ch, CURLOPT_URL, $postUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// response of the POST request
	$response = curl_exec($ch);
	//$response = '1702';
	
	$res_data = explode('|', $response);
	$status = 'waiting';
	if($res_data[0]=='1701') {
		// Success
		$status = 'sent';
	} else {
		// Failed
		$status = 'failed';
	}
	
	$ins_sms = $db->executeQuery("UPDATE sms_track SET returnCode='".$res_data[0]."',messageID='".$res_data[2]."',status='".$status."' WHERE smsid='".$sms_id."' ");
	
	// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	// $responseBody = json_decode($response);
	curl_close($ch);
	
	//$obj = new Sender("sms.digimiles.in", "", "di78-trans", "miles", "DIGIML", "Test \nSMS <br> Break",$number, "1", "1");
	//$obj->Submit();
}