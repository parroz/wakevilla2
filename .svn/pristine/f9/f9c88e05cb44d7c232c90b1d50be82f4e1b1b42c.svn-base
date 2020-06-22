<?php 
include "wv.php";
session_set_cookie_params(0);
session_start();
$db = new wv();

if (!isset($_GET['ACTION'])) {
	die('Invalid action!');
}



if($_GET['ACTION'] == 'SAVE') {
	echo $db->cardSave();
	return;
}

if($_GET['ACTION'] == 'UPDATE') {
	if (!isset($_REQUEST['id']) || empty($_REQUEST['id'])) {
		die('Invalid action!');
	}
	
	echo $db->cardUpdate($_REQUEST['id']);
}



?>