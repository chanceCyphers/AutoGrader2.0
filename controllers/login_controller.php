<?php

class LoginController {
    public function login() {
        require_once('views/login/index.php');
    }

    public function validateLogin() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $isValid = LoginValidator::validateLogin($email, $password);

        if ($isValid) {
            require_once('views/home/index.php');
        } else {
            require_once('views/login/failure.php');
        }
    }
}

?>