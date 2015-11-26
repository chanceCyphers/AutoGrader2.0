<?php	

	class AdminManager {

		public static function searchUser($username) {
			$db = Db::getInstance();

	        $userQuery = $db->prepare('SELECT users.username, users.email, groups.group_des, permissions.perm_des 
									   FROM users, groups, permissions 
									   WHERE users.username = :username AND
									   users.group_id = groups.group_id AND
									   users.perm_id = permissions.perm_id');
	        $userQuery->execute(array('username' => $username));

	        $user = $userQuery->fetch(PDO::FETCH_ASSOC);

	        return $user;

		}



	}


?>