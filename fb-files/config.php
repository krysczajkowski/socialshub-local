<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '2373399259543675',
		'app_secret' => 'b3e916e66fc47e0b592ede90cbb5aead',
		'default_graph_version' => 'v4.0'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>