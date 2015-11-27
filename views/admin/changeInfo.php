<?php

	echo "<h2>" . $userProfile['username'] . "</h2><br/>";
	echo "<p>" . $userProfile['email'] . "</p><br/>";

	echo "<form action='?controller=admin&action=changeInfo' method='post'>";
	echo "<p> Current Group Association: ";
	echo $userProfile["group_des"] . "</p><br/>";
	echo "Change Group To: ";
	# DROPDOWN MENU HERE
	echo "<input type='submit' value='Change' />";
	echo "</form>";

	echo "<form action='?controller=admin&action=changeInfo' method='post'>";
	echo "<p> Current Permissions: ";
	echo $userProfile["perm_des"] . "</p><br/>";
	echo "Change Permissions To: ";
	#DROPDOWN MENU HERE
	echo "<input type='submit' value='Change' />";
	echo "</form>";
?>