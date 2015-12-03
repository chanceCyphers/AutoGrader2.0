<?php
	
	class AdminController {

		public function index() {
			require_once("views/admin/index.php");
			if (isset($_POST['username'])) {
				$username = $_POST['username'];	
				$userProfile = AdminManager::searchUser($username);
				require_once("views/admin/userInfo.php");
			}
		}

		public function changeInfo() {
			require_once("views/admin/index.php");
			if (isset($_POST['username'])) {
				$userToChange = $_POST['username'];
				$userProfile = AdminManager::searchUser($userToChange);
				$groupList = AdminManager::getAllGroups();
				$permList = AdminManager::getAllPermissions();
				require_once("views/admin/changeInfo.php");
			}
		}

		public function manageGroups() {
			$groupList = AdminManager::getAllGroups();			
			if(isset($_POST['group_create'])) {
				$newGroup = $_POST['group_create'];
				$exists = AdminManager::groupExist($newGroup);
				if ($exists) {
					echo "The group cannot be created, one already exists.";
				} else {
					AdminManager::createGroup($newGroup);
					echo "Group created successfully! <br/>";
					require_once("views/admin/groups.php");
				}
			} else if (isset($_POST['group_name']) && isset($_POST['group_new_name'])) {
				$oldGroupName = $_POST['group_name'];
				$newGroupName = $_POST['group_new_name'];
				$exists = AdminManager::groupExist($oldGroupName);
				if ($exists) {
					AdminManager::renameGroup($oldGroupName, $newGroupName);
					echo "Group has been renamed! <br/>";
					require_once("views/admin/groups.php");
				} else {
					echo "The group cannot be renamed, it does not exist! <br/>";
					require_once("views/admin/groups.php");
				}
			} else if (isset($_POST['group_delete'])) {
				$groupName = $_POST['group_delete'];
				$exists = AdminManager::groupExist($groupName);
				if ($exists) {
					AdminManager::deleteGroup($groupName);
					echo "Group has been deleted successfully! <br/>";
					require_once("views/admin/groups.php");
				} else {
					echo "The group cannot be deleted, it does not exist! <br/>";
					require_once("views/admin/groups.php");
				}
			} else {
				require_once("views/admin/groups.php");
			}

		}

		public function managePermissions(){

		}

		public function setUserGroup() {
			if (isset($_POST['userGroup'])) {
				$username = $_POST['username'];
				$newGroup = $_POST['userGroup'];
				AdminManager::setUserGroup($username, $newGroup);
				echo "User edited successfully";
			}
		}

		public function setUserPermission() {
			if (isset($_POST['userPermission'])) {
				$username = $_POST['username'];
				$newPermission = $_POST['userPermission'];
				AdminManager::setUserPermission($username, $newPermission);
				echo "User edited successfully";
			}
		}

	}





?>