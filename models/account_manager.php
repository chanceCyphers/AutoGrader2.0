<?php

class AccountManager {
	
	public static function createUser($username, $email) {
		$db = Db::getInstance();

		$accountQuery = $db->prepare('SELECT * FROM users WHERE username = :username');
		$accountQuery->execute(array('username' => $username));

		$userExists = $accountQuery->fetch();

		if (!$userExists) {
			$password = sha1(openssl_random_pseudo_bytes(6));
			$group_id = 1;
			$perm_id = 4;

			# username, pwd, email, group_id, perm_id
			$enterUserQuery = $db->prepare('INSERT INTO users (username, pwd, email, group_id, perm_id) 
											VALUES (:username, :password, :email, :group_id, :perm_id)');
			$enterUserQuery->execute(array('username' => $username, 'password' => $password, 'email' => $email,
									   'group_id' => $group_id, 'perm_id' => $perm_id));
			return false;
		} else {
			return true;
		}

	}

}


?>