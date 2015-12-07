<?php
    $nav = "";             
    if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
        if ($_SESSION['role'] == 1) {
            $nav = "admin_nav.php";
        } else if ($_SESSION['role'] == 2) {
            $nav = "prof_nav.php";
        } else if ($_SESSION['role'] == 3) {
            $nav = "student_nav.php";
        } else {
            $nav = "guest_nav.php";
        }
    } else {
        $nav = "default_nav.php";
        $_SESSION['role'] = 4;
    }           
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ikeji-Lab</title>
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
            <?php require_once($nav); ?>
        </div>        
        
        <div id="content-wrapper">
            <?php require_once('routes.php'); ?>
        </div>

        <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="scripts/script.js"> </script>
        </footer>
    </body>
</html>