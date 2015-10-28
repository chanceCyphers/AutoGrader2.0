<?php

class RegController {
    public function register() {
        require_once('views/register/index.php');
    }

    public function validateReg() {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $isValid = RegValidator::validateReg($username, $email);

        if ($isValid) {
            require_once('views/home/index.php');
        } else {
            require_once('views/login/failure.php');
        }
    }
}

?>