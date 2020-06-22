<?php
include "wv.php";
session_start();
$db = new wv();


$opt		= !empty($_POST['opt'])			? $_POST['opt']	: 'all';
$driver		= !empty($_POST['driver'])			? $_POST['driver']	: '';
$instructor	= !empty($_POST['instructor'])		? $_POST['instructor']		: '';
$sport		= !empty($_POST['sport'])			? $_POST['sport']			: '';
$boat		= !empty($_POST['boat'])			? $_POST['boat']			: '';
$date1		= !empty($_POST['date1'])			? $_POST['date1']			: '';
$date2		= !empty($_POST['date2'])			? $_POST['date2']			: '';
$clientId	= !empty($_POST['clientId'])			? $_POST['clientId']	: '';


echo json_encode($db->sessions($opt, '', $clientId, $driver, $instructor));
	
?>
