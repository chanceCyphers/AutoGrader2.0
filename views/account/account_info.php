<?php
	# Users will be able to view their account details here, and change their password
	# or email address.
	
	echo "<br />";
	echo "<div id=accountInfoDiv>";
	echo "<h2> Account Information </h2>";
	echo "<div id=accountInfoDivUser>";
	echo "<b> Username: </b> " . $userProfile['username'] . "<br />";
	echo "<b> Email: </b>" . $userProfile['email'] . "<br />";
	echo "<b> Groups: </b>" . $userProfile['group_des'] . "<br />";
	echo "<b> Permissions Level: </b>" . $userProfile['perm_des'] . "<br />";
	echo "<br />";
	echo "<a href='?controller=account&action=changeInfo'> Change Account Information </a> <br />";
	echo "<p> Notifications </p>";
	echo "<hr />";
	echo "</div>";
	echo "</div>";

?>

