<?php

class LoginController {
    public function login() {
        require_once('views/login/index.php');
    }

    public function validateLogin() {
        require_once('models/login_validator.php');
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $isValid = LoginValidator::validateLogin($email, $password);

        $username = $isValid['username'];

        if ($isValid) {
            # Show home/landing page view
            require_once('views/home/index.php');
        } else {
            require_once('views/login/failure.php');
        }
    }

    public function logout() {
        
    }
}

?>