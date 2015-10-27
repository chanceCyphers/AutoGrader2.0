<?php

class LoginValidator {

    public static function validateLogin($email, $password) {
        $db = Db::getInstance();

        $userQuery = $db->prepare('SELECT * FROM users WHERE email = :email AND pwd = :password');
        $userQuery->execute(array('email' => $email, 'password' => $password));
        $user = $userQuery->fetch();

        if (!$user) {
            return false;
        } else {
            return true;
        }
    }
}

?>