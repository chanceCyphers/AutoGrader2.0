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

			$groupQuery = $db->prepare('SELECT group_des FROM groups');
			$groupQuery->execute();
			$groupList = $groupQuery->fetchAll(PDO::FETCH_ASSOC);

			return $groupList;
		}

		# Obtains a list of all of the permission names
		public static function getAllPermissions() {
			$db = Db::getInstance();

			$permQuery = $db->prepare('SELECT perm_des FROM permissions');
			$permQuery->execute();
			$permList = $permQuery->fetchAll(PDO::FETCH_ASSOC);

			return $permList;
		}

		public static function setUserGroup($username, $group) {
			$db = Db::getInstance();
			# First get group id from the groups table by looking it up with the group description
			$groupID = $db->prepare('SELECT group_id FROM groups WHERE group_des = :group');
			$groupID->execute(array('group' => $group));
			$groupMatch = $groupID->fetch(PDO::FETCH_ASSOC);
			$groupID = $groupMatch['group_id'];
			# Alter the user in the user table to change their group to the new group
			$newUserGroup = $db->prepare('UPDATE users SET group_id = :group_id WHERE username = :username');
			$newUserGroup->execute(array('group_id' => $groupID, 'username' => $username));
		}

		public static function setUserPermission($username, $perm) {
			$db = Db::getInstance();
			# First get permission id from the permissions table by lookin it up with the group description
			$permID = $db->prepare('SELECT perm_id FROM permissions WHERE perm_des = :perm');
			$permID->execute(array('perm' => $perm));
			$permMatch = $permID->fetch(PDO::FETCH_ASSOC);
			$permID = $permMatch['perm_id'];
			# Update the user in the user table to change their permission level
			$newUserPermission = $db->prepare('UPDATE users SET perm_id = :perm_id WHERE username = :username');
			$newUserPermission->execute(array('perm_id' => $permID, 'username' => $username));
			
		}

	}


?>