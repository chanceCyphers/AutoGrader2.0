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

    }

    
}

?>