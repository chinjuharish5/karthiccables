<?php
session_start();
require_once('database.init.php');

global $db;
try {
	$db = new Database ( 'localhost', 'root', '', 'karthiccables' );
} catch ( Exception $e ) {
	echo $e->getMessage ();
}
