<?php 
session_start();

if(isset($_COOKIE['email'])) {
	unset($_COOKIE['email']); 
	setcookie('email', null , -1, '/'); 
}

if(isset($_COOKIE['user_id'])) {
	unset($_COOKIE['user_id']); 
	setcookie('user_id', null , -1, '/'); 
}

if(isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

if (isset($_SESSION['access_token'])) {
    unset($_SESSION['access_token']);
}

$_SESSION = array();
session_destroy();

header('Location: index.php');

exit();
