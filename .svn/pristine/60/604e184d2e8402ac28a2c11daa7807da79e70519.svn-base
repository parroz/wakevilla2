<?php
	include_once('navbar.php');
?>
<div class="container">
<?php

if (isset($_SESSION) && !empty($_SESSION['username']))
	echo 'You are logged in.'; 
else
{
    if (isset($_REQUEST['fromURL']) && !empty($_REQUEST['fromURL']))
        $fromURL = $_REQUEST['fromURL'];
    else
        $fromURL = basename($_SERVER ['PHP_SELF']);

    $result = 0;
	
	if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
	{
	    $user_username = $db->escape(trim($_POST['username']));
	    $user_password = $db->escape(trim($_POST['password']));
	    $level = $db->auth($user_username,$user_password);
	    if ($level > 0)
	    {
	        $_SESSION['username'] = $user_username;
	        $_SESSION['password'] = $user_password;
	        $_SESSION['level'] = $level;
	        $result = 1;	        
	    } else {
	        echo 'Incorrect username/password. Please, try again.';
	    	}
	}

	if ($result <= 0) 
		include_once('lib/loginForm.php');
	else
	{	    
	    if (isset($_REQUEST['fromURL']) && !empty($_REQUEST['fromURL']))
	        $fromURL = $_REQUEST['fromURL'];
	    else
	        $fromURL = basename($_SERVER ['PHP_SELF']);
	    
	    echo '<meta http-equiv="refresh" content="0; url='.$fromURL.'" />';
    }
}	
?>
	
</div>
</body>
</html>