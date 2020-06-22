<?php 
include "wv.php";
session_set_cookie_params(0);
session_start();
$db = new wv();

if($_REQUEST['id'] && $_REQUEST['id'] > 0)
    echo $db->clientUpdate();
else
    echo $db->clientSave();

?>