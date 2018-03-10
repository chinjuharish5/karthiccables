<?php
require_once('framework/database/init.php');

global $db;

if(isset($_SESSION['user_id'])) {
	session_destroy();
	header('Location: index.php');exit;
}