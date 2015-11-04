<?php
session_start();
require_once('connection.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'login';
    $action = 'login';
}

require_once('views/layout.php');

?>

<?php 	#comments
		# Everything starts here. The file is loaded and $controller and $action are set to 
		# their defaults, which is 'login'. It then requires the layout.php file once to
		# load the HTML for the page. 

		# This page is the "gateway" to the application. Even though many different files
		# get loaded, this is the only page that the users will see. As such, the $_GET
		# global will continually be updated as forms and other sumbissions are activated



?>