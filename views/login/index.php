<div id="loginDiv">
    <h2>Enter Login Information</h2>
    <form action="?controller=login&action=validateLogin" method="post">
        <table>
		  <tr id="login_tr1">
		    <td>
				<strong><p>Email Address:</p></strong>
			</td>
			<td>
				<input type="text" name="email" size="30">
			</td>
		  <tr id="login_tr2">
			<td>
				<strong><p>Password:</p></strong>
			</td>
			<td>
				<input type="password" name="password" size="30">
			</td>
		  </tr>
		  <tr id="login_tr3">
			<td>
				<input id = "login_button"type="submit" value="Login">
			</td>
		  </tr>
		  <tr id="login_tr4">
			<td>
				<a href="?controller=account&action=newAccount" class="login_regAndFrgtpswd"> Register</a>
			</td>
			<td>
				<a href="?controller=account&action=forgotPass" class="login_regAndFrgtpswd"> Forgot Password? </a>
			</td>
		  </tr>
		</table>
    </form>
</div>