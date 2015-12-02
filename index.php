<?php
	session_start();
	if (sessionExpired()) {
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

function sessionExpired() {
	if (!isset($_SESSION['username']))
		return false;

	if (!isset($_SESSION['lastTime'])) {
		$_SESSION['lastTime'] = time();
		return false;
	}

	$now = time();
	$last = $_SESSION['lastTime'];
	$diff = $now - $last;

	if ($diff > 1800) {
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		session_unset();
		session_destroy();
		return true;
	} else {
		$_SESSION['lastTime'] = time();
	}
	return false;
}

?>