<?php

	echo "<h2>" . $userProfile['username'] . "</h2><br/>";
	echo "<p>" . $userProfile['email'] . "</p><br/>";

	echo "<form action='?controller=admin&action=setUserGroup' method='post'>";
	echo "<p> Current Group Association: ";
	echo $userProfile["group_des"] . "</p><br/>";

	# CHANGE USER GROUP ASSOCIATION
	echo "<input type='hidden' name='username' value='" . $userProfile['username'] . "' />"; 
	echo "Change Group To: ";
		echo "<select name='userGroup'>";
			foreach($groupList as $array => $keys) {
					foreach ($keys as $key => $value) {
						echo "<option value='" . $value . "'>" . $value . "</option>";
					}
				}
		echo "</select>";
	echo "<input type='submit' value='Change' />";
	echo "</form>";
	
	# CHANGE USER PERMISSION LEVEL
	echo "<form action='?controller=admin&action=setUserPermission' method='post'>";
	echo "<p> Current Permissions: ";
	echo $userProfile["perm_des"] . "</p><br/>";

	echo "<input type='hidden' name='username' value='" . $userProfile['username'] . "' />";
	echo "Change Permissions To: ";
		echo "<select name='userPermission'>";
			foreach($permList as $array => $keys) {
					foreach ($keys as $key => $value) {
						echo "<option value='" . $value . "'>" . $value . "</option>";
					}
				}
		echo "</select>";

	echo "<input type='submit' value='Change' />";
	echo "</form>";

?>