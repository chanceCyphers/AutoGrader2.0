<?php
	
	if (isset($userProfile) && $userProfile) {
		echo "<br />";
		echo "<div id=accountInfoDiv>";
		echo "<h2> Account Information </h2>";
		echo "<div id=accountInfoDivUser>";
		echo "<b> Username: </b> " . $userProfile['username'] . "<br />";
		echo "<b> Email: </b>" . $userProfile['email'] . "<br />";
		echo "<b> Groups: </b>" . $userProfile['group_des'] . "<br />";
		echo "<b> Permissions Level: </b>" . $userProfile['perm_des'] . "<br />";
		echo "<br />";
		echo "</div>";
		echo "<a href=controller=admin&action=changeInfo> Change User Info </a>";
		echo "</div>";
	} else {
		echo "USER NOT FOUND - SEARCH AGAIN";
	}

?>