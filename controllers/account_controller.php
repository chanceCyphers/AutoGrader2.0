<?php

class AccountController {
    # Lands user on the new account registration page to fill out the form
    public function newAccount() {
        require_once('views/account/register.php');
    }

    # Runs the process to register a new user for the site
    public function regNewUser() {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $userExists = AccountManager::createUser($username, $email);

        if (!$userExists) {
            echo "User created successfully";
        } else {
            echo "User already exists!";
        }

    }

    # Lands user on the forgot password page to fill out the form
    public function forgotPass() {
    	require_once('views/account/forgotPass.php');

    }

    # Runs the process to reset a user's password
    public function resetPass() {

    }

    # Lands user on the account information page
    public function viewInfo() {
        $username = $_SESSION['username'];

        # Retrieve the user's information
        $userProfile = AccountManager::viewInfo($username);
        # If the user exists, display the information through the view
        if (isset($userProfile)) {
            require_once('views/account/account_info.php');
        } else {
            # User not found error
        }
    }

    # Allows user to change password and contact email
    public function changeInfo() {
        $username = $_SESSION['username'];

        if (isset($_POST['new_email']) || isset($_POST['password'])) {
            if (array_key_exists('new_email', $_POST)) {
                $new_email = $_POST['new_email'];
                AccountManager::changeEmail($username, $new_email);
                echo "EMAIL CHANGE SUCCESSFUL";
            }

            if (array_key_exists('password', $_POST) &&
                array_key_exists('new_pass', $_POST) &&
                array_key_exists('new_pass_check', $_POST)) {

                $password = $_POST['password'];
                $new = $_POST['new_pass'];
                $checked = $_POST['new_pass_check'];

                $valid = AccountManager::validatePassword($username, $password);
                if ($valid && ($new == $checked)) {
                    AccountManager::changePassword($username, $checked);
                    echo "PASSWORD CHANGE SUCCESSFUL";
                } else {
                    echo "ERROR - PASSWORD NOT CHANGED";
                }
            }
        } else {    
            # Retrieve the user's information
            $userProfile = AccountManager::viewInfo($username);
            # If the user exists, display the information through the view
            if (isset($userProfile)) {
                require_once('views/account/change_info.php');
            } else {
                # User not found error
            }
        }
    }

    
}

?>