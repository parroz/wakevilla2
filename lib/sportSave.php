 <?php 
include "wv.php";
session_set_cookie_params(0);
session_start();
$db = new wv();


if($_REQUEST['id'] && $_REQUEST['id'] > 0)
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
    {
        echo $db->sportDelete($_REQUEST['id']);
    }
    else
        echo $db->sportUpdate($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['shortname']);
}
else
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
        echo '0';
    else
        echo $db->sportSave($_REQUEST['name'], $_REQUEST['shortname']);
}
?>