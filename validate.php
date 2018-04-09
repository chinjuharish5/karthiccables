<?php
require_once('framework/database/init.php');

global $db;

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user_type'])) {
	$select_query = "SELECT user_id, user_name, user_type from user_list where status='active' AND email_id='".$_POST['username']."' AND password='".$_POST['password']."' AND user_type='".$_POST['user_type']."'; ";
	$query_data = $db->fetchQuery($select_query);
	
	if(empty($query_data)) {
		echo '0';
	} else {
		$_SESSION['user_id'] = $query_data[0]['user_id'];
		$_SESSION['user_name'] = $query_data[0]['user_name'];
		$_SESSION['user_type'] = $query_data[0]['user_type'];
		echo '1';
	}
}