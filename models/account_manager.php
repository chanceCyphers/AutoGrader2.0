<?php

class AccountManager {
	
	public static function createUser($username, $email) {
		$db = Db::getInstance();

		$accountQuery = $db->prepare('SELECT * FROM users WHERE username = :username');
		$accountQuery->execute(array('username' => $username));

		$userExists = $accountQuery->fetch();

		if (!$userExists) {
			# Create a password for the new user (12 character hex values)
			$decrypted_password = openssl_random_pseudo_bytes(6);
			# Encrypt the password with SHA1 hashing
			$password = sha1($decrypted_password);
			# New users start off as a part of the group, NEW_USER
			$group_id = 1;
			# New users are given GUEST permissions by default
			$perm_id = 4;

			# Enter new user into the database
			$enterUserQuery = $db->prepare('INSERT INTO users (username, pwd, email, group_id, perm_id) 
											VALUES (:username, :password, :email, :group_id, :perm_id)');
			$enterUserQuery->execute(array('username' => $username, 'password' => $password, 'email' => $email,
									       'group_id' => $group_id, 'perm_id' => $perm_id));

			# Email the new user with their temporary password
			$message = "Hello, " . $username . ". Your new password is: " . $decrypted_password . ". " .
					   "Please login to the website and click View Account to change it to your desired password.";

			mail($email, "AutoGrader Password for New Account", $message);

			return false;
		} else {
			return true;
		}

	}

	public static function viewInfo($username) {
		$db = Db::getInstance();

		$accountQuery = $db->prepare('SELECT users.username, users.email, groups.group_des, permissions.perm_des 
									  FROM users, groups, permissions 
									  WHERE users.username = :username AND
									  users.group_id = groups.group_id AND
									  users.perm_id = permissions.perm_id');		
		$accountQuery->execute(array('username' => $username));
		$userInfo = $accountQuery->fetch(PDO::FETCH_ASSOC);

		return $userInfo;
	}

	public static function changeEmail($username, $new_email) {
		$db = Db::getInstance();

		$changeQuery = $db->prepare('UPDATE users SET email = :new_email WHERE username = :username');
		$changeQuery->execute('new_email' => $new_email, 'username' => $username);

		return true;
	}
}


?>