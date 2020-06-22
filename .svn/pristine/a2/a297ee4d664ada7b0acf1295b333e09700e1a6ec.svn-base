<?php
include "wv.php";
session_start();
//nucleos::check_logged(6) or die('Não tem permissões para aceder ao menu seleccionado');
$db = new wv();

$type = 'session';

$errors = array();
$data 	= array();

$data['sucess'] = false;

error_log(json_encode($_POST));

$_POST = $db->escapeArray($_POST);

error_log(json_encode($_POST));

while(true)
{	
    if (isset($_POST['firstname']) && !empty($_POST['firstname']))
    {
        // create new client
        $_POST['clientId'] = $db->clientSave();
    }
    
    
    if (!isset($_POST['clientId']) || empty($_POST['clientId']))
	{
		$errors['clientId']		= 'O campo Cliente é de preenchimento obrigatório.';
		break;
	}

	if (!isset($_POST['sport']) || empty($_POST['sport']))
	{
		$errors['sport']		= 'O campo sport é de preenchimento obrigatório.';
		break;
	}
	
	if (!isset($_POST['boat']) || empty($_POST['boat']))
	{
		$errors['boat']		= 'O campo sport é de preenchimento obrigatório.';
		break;
	}
	
	if (!isset($_POST['hours']) || empty($_POST['hours']))
	{
		$errors['hours']		= 'O campo hours é de preenchimento obrigatório.';
		break;
	}
	
	if (!isset($_POST['driver']) || empty($_POST['driver']))
	{
		$errors['driver']		= 'O campo driver é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['instructor']) || empty($_POST['instructor']))
	{
		$errors['instructor']		= 'O campo instructor é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['date']) || empty($_POST['date']))
	{
		$errors['date']		= 'O campo date é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['hour']) || empty($_POST['hour']))
	{
		$errors['hour']		= 'O campo hour é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['minutes']) || empty($_POST['minutes']))
	{
		$errors['minutes']		= 'O campo minutes é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['price']) || empty($_POST['price']))
	{
		$errors['price']		= 'O campo price é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['cost']) || empty($_POST['cost']))
	{
		$errors['cost']		= 'O campo cost é de preenchimento obrigatório.';
		break;
	}
	if (!isset($_POST['ppm']) || empty($_POST['ppm']))
	{
		$errors['ppm']		= 'O campo ppm é de preenchimento obrigatório.';
		break;
	}
	$data = $_POST;
	$data['weight'] = (!empty($_POST['weight']) && $_POST['weight'] == '1');
		    
	if (isset($_POST['delete']) && !empty($_POST['delete']))
	{
	   if (isset($_POST['sid']) && !empty($_POST['sid']))
	       $db->sessionDelete($data);
	   else
	       $errors['delete']		= 'To eliminate a session, an ID is necessary';
	   break;
	}
	
	if (isset($_POST['sid']) && !empty($_POST['sid']))
        $db->sessionUpdate($data);
	else
	    $db->sessionCreate($data);
	
	break;
}

$data['success'] = empty($errors);
$data['errors'] = $errors;

echo json_encode($data);	
?>