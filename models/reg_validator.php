<?php

class RegValidator
{
    public static function validateReg($username, $email)
    {
        $db = Db::getInstance();

        $userQuery = $db->prepare('SELECT * FROM users WHERE username = :username
                                                         AND email = :email');
        $userQuery->execute(array('username' => $username, 'email' => $email));
        $user = $userQuery->fetch();

        # If user does not exist in the database, create them and return true
        # Generate password for table, encrypt it, put it in table, and
        # email the password to the user
        if (!$user) {
            # Generate random hex password that is 12 characters long
            $pwd = bin2hex(openssl_random_pseudo_bytes(6));
            # Encrypt the password for insertion into table
            $pwd = sha1($pwd);
            # Default group is NEW_USER
            $group_id = 1;
            # Default permissions are GUEST
            $perm_id = 4;
            $userEntry = $db->prepare('INSERT INTO users
                                       (username, pwd, email, group_id, perm_id)
                                       (:username, :pwd, :email, :group, :perm)');
            $suc = $userEntry->execute(array('username' => $username, 'pwd' => $pwd,
                                      'email' => $email, 'group_id' => $group_id, 'perm_id' => $perm_id));
            echo $suc;
            return true;
        # If user exists, reload page with warning at the top that the user exists
        } else {
            return false;
        }
    }
}

?>