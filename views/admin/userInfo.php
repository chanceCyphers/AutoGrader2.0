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
		echo "<form action='?controller=admin&action=changeInfo' method='post'>";
		echo "<input type='hidden' name='username' value='" . $userProfile['username'] . "' />";
		echo "<input type='submit' value='Change Info' />";
		echo "</form>";
		echo "<br />";
		echo "</div>";
		echo "</div>";
	} else {
		echo "USER NOT FOUND - SEARCH AGAIN";
	}

?>