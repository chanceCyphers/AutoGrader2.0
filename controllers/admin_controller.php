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
				require_once("views/admin/changeInfo.php");
			}


		}

	}





?>