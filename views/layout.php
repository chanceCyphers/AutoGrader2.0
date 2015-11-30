<!DOCTYPE html>
<html>
    <head>
        <title>Auto-Grader</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
                } else {
                    require_once("default_nav.php");
                }
                # For some reason, the navigation does not show right away unless refreshed.             
            ?>

        </div>        
        
        <div id="content-wrapper">
            <?php require_once('routes.php'); ?>
        </div>

        <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        </footer>
    <body>
<html>