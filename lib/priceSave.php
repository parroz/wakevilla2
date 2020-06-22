 <?php 
include "wv.php";
session_set_cookie_params(0);
session_start();
$db = new wv();

if($_REQUEST['id'] && $_REQUEST['id'] > 0)
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
    {
        error_log('price delete');
        
        echo $db->priceDelete();
    }
    else
        echo $db->priceUpdate();
}
else
{
    if (isset($_POST['delete']) && !empty($_POST['delete']))
        echo '0';
    else
        echo $db->priceSave();
}
?>