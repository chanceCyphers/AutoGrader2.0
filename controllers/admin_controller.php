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