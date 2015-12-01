<?php

echo "<div class='container centered-box'>";
echo 	"<form action='?controller=account&action=changeInfo' method='post'>";
echo 		"<h3>Change User Email</h3>";
echo 		"<div class='form-group'>";
echo  		"<input class='form-control' type='email' name='new_email' placeholder='New Email'>";
echo  	"</div>";
echo  	"<div class='form-group'>";
echo  		"<input class='btn btn-default' type='submit' value='Change'>";
echo  	"</div>";
echo 	"</form>";
echo "</div>";

echo "<div class='container centered-box'>";
echo 	"<form action='?controller=account&action=changeInfo' method='post'>";
echo 		"<h3>Change User Password</h3>";
echo  	"<div class='form-group'>";
echo    	"<input class='form-control' type='password' name='password' placeholder='Current Password'>";
echo  	"</div>";
echo  	"<div class='form-group'>";
echo    	"<input class='form-control' type='password' name='password' placeholder='New Password'>";
echo  	"</div>";
echo  	"<div class='form-group'>";
echo    	"<input class='form-control' type='password' name='new_pass_check' placeholder='Re-Type New Password'>";
echo  	"</div>";
echo  	"<div class='form-group'>";
echo  		"<input class='btn btn-default' type='submit' value='Change'>";
echo  	"</div>";
echo 	"</form>";
echo "</div>";

?>