<?php
require_once('database.init.php');

global $db;
try {
	$db = new Database ( 'localhost', 'root', '', 'karthic_cables' );
} catch ( Exception $e ) {
	echo $e->getMessage ();
}
