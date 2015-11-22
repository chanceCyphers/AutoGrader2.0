<?php
	echo "<br />";
	echo "<div id=accountInfoDiv>";
	echo "<h2> Change Account Information </h2>";
	echo "<div id=accountInfoDivUser>";
	echo "<b> Username: </b> " . $userProfile['username'] . "<br />";
	echo "<b> Email: </b>" . $userProfile['email'] . "<br />";
	echo "<b> Groups: </b>" . $userProfile['group_des'] . "<br />";
	echo "<b> Permissions Level: </b>" . $userProfile['perm_des'] . "<br />";
	echo "<br />";
	echo "</div>";
	echo "</div>";

	echo "<form action='?controller=account&action=changeInfo' method='post'>";
	echo "<h3>Change User Email</h3>";
	echo "New Email: <input type='text' name='new_email' size='30' /> <br/>";
	echo "<input type='submit' value='Change'>";
	echo "</form>";

	
	echo "<h3>Change User Password</h3>";
	echo "Current Password: <input type='password' name='password' />  <br/>";
	echo "New Password: <input type='text' name='new_pass' />  <br/>";
	echo "Retype Password: <input type='text' name='new_pass_check' />  <br/>";
	echo "<input type='submit' value='Change'>";
	echo "</form>";
?>