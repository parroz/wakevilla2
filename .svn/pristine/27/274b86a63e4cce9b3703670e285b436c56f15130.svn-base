<?php
include_once('wv.php');
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    print "Sorry - you need valid credentials to be granted access!\n";
    exit;
} else {
    $db = new wv();
    $user_username = $db->escape(trim($_SERVER['PHP_AUTH_USER']));
    $user_password = $db->escape(trim($_SERVER['PHP_AUTH_PW']));
    if ($db->auth($user_username,$user_password))
    {
        session_start();
        error_log('we are here');
        $_SESSION['username'] = $user_username;
        $_SESSION['password'] = $user_password;
    } else {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        print "Sorry - you need valid credentials to be granted access!!!\n";
        exit;
    }
}

// if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
//     // The username/password weren't entered so send the authentication headers
//      exit('<h3>Mismatch</h3>Sorry, you must enter your username and password to log in and access this page.');
//     }

//     error_log('here');
//     include_once('wv.php');
    
//     $db = new wv();
    
//     $user_username = $db->escape(trim($_SERVER['PHP_AUTH_USER'])); 
//     $user_password = $db->escape(trim($_SERVER['PHP_AUTH_PW']));

//     if ($db->auth($user_username,$user_password))
//     {
//         $_SESSION['username'] = $username;
//         $_SESSION['password'] = $password;
//         $_SESSION['id'] = $row['id'];
//     }
//     else
//     {
//         // The user name/password are incorrect so send the authentication headers
//         header('WWW-Authenticate: Basic realm="Restricted Section"');
//         header('HTTP/1.0 401 Unauthorized');
//         die ("Please enter your username and password");
//     }
?>