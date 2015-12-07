<?php

class LoginController {
    public function login() {
        // Landing login page, show login area to visitor
        require_once('views/login/index.php');
    }

    public function validateLogin() {
        require_once('models/login_validator.php');
        // Obtain user information from login form
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Check if user is valid in db
        $isValid = LoginValidator::validateLogin($email, $password);
        $username = $isValid['username'];

        // Load application on successful user credentials
        if ($isValid) {
            require_once('views/home/index.php');
        } else {
            require_once('views/login/failure.php');
        }

        echo "<script> window.location.assign('index.php?controller=home') </script>";
    }

    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        unset($_SESSION);
        session_destroy();
        # Redirect to homepage on logout
        echo "<script> window.location.assign('index.php') </script>";
    }
}

?>