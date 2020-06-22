 <?php 
include "wv.php";
session_set_cookie_params(0);
session_start();
$db = new wv();

$p = array(
    'id' => '',
    'name' => '',
    'brand' => '',
    'model' => '',
    'hours' => '',
);

if($_REQUEST['id'] && $_REQUEST['id'] > 0)
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
    {
        echo $db->boatDelete($_REQUEST['id']);
    }
    else
        echo $db->boatUpdate($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['brand'], $_REQUEST['model'], $_REQUEST['hours']);
}
else
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
        echo '0';
    else
        echo $db->boatSave($_REQUEST['name'], $_REQUEST['brand'], $_REQUEST['model'], $_REQUEST['hours']);
}
?>