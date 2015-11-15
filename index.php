<?php

# If there is a user setup in the session when reaching the page, then destroy it
if (isset($_SESSION["username"]) && array_key_exists("username", $_SESSION)) {
	session_destroy();
} else {
	session_start();
}

require_once('connection.php');

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
	
	if (isset($_GET['action'])) {
    	$action = $_GET['action'];
	} else {
		$action = 'index';
	}
} else {
    $controller = 'login';
    $action = 'login';
}

require_once('views/layout.php');

?>