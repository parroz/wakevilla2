<?php
	include "./wv.php";
	$db = new wv();

	$q = isset($_REQUEST['q']) ? $_REQUEST['q'] : NULL;
	
	$results = $db->client('', '', $q);
	echo json_encode($results);
?>
