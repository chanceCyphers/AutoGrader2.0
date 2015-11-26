<!DOCTYPE html>
<html>
    <head>
        <title>Auto-Grader</title>
        <link rel="stylesheet" href="styles/site.css">
    </head>

    <body>
        <div id="header">
            <div id="header-top">
            </div>
            <div id="header-bottom">
            </div>
        </div>

        <div id="navigation-wrapper">
            <?php 
                # Only show the navigation bar appropriate for the user based on permissions
                if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
                    if ($_SESSION['role'] == 1) {
                        require_once("admin_nav.php");
                    } else if ($_SESSION['role'] == 2) {
                        require_once("prof_nav.php");
                    } else if ($_SESSION['role'] == 3) {
                        require_once("student_nav.php");
                    } else {
                        require_once("guest_nav.php");
                    }
                }
                # For some reason, the navigation does not show right away unless refreshed.             
            ?>

        </div>
        
        
        <div id="content-wrapper">
        	              
            
            <?php require_once('routes.php'); ?>
        </div>

        <footer>
        </footer>
    <body>
<html>