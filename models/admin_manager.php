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

		# Obtains a list of all of the group names
		public static function getAllGroups() {
			$db = Db::getInstance();

			$groupQuery = $db->prepare('SELECT * FROM groups');
			$groupQuery->execute();
			$groupList = $groupQuery->fetch(PDO::FETCH_ASSOC);

			return $groupList;
		}

		# Obtains a list of all of the permission names
		public static function getAllPermissions() {
			$db = Db::getInstance();

			$permQuery = $db->prepare('SELECT * FROM permissions');
			$permQuery->execute();
			$permList = $permQuery->fetch(PDO::FETCH_ASSOC);

			return $permList;
		}

		public static function setUserGroup($group_id) {

		}

		public static function setUserPermission($perm_id) {
			
		}

	}


?>