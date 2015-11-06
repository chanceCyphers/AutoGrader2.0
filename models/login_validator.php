<?php

class LoginValidator {

    public static function validateLogin($email, $password) {
        $db = Db::getInstance();

        $userQuery = $db->prepare('SELECT * FROM users WHERE email = :email AND pwd = :password');
        $userQuery->execute(array('email' => $email, 'password' => $password));

        $user = $userQuery->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        } else {
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
}

?>