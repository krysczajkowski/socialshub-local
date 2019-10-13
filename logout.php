<?php 
session_start();
$_SESSION = array();
session_destroy();

if(isset($_COOKIE['email'])) {
	unset($_COOKIE['email']); 
	setcookie('email', '', time()-5184000); 
}

if(isset($_COOKIE['user_id'])) {
	unset($_COOKIE['user_id']); 
	setcookie('user_id', '', time()-5184000); 
}

header('Location: index.php');

