<?php
	# Users will be able to view their account details here, and change their password
	# or email address.
	
	echo "<br />";

	echo "Username: " . $userProfile['username'] . "<br />";
	echo "Email: " . $userProfile['email'] . "<br />";
	echo "Group ID: " . $userProfile['group_id'] . "<br />";
	echo "Permissions Level: " . $userProfile['perm_id'] . "<br />";


?>

