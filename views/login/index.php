<div class="container centered-box">
	<h2> Enter Login Information </h2>
		<form action="?controller=login&action=validateLogin" method="post">
	  	<div class="form-group">
	  		<label for="email"> Email </label>
	    	<input class="form-control" type="email" name="email" placeholder="Email">
	  	</div>
	  	<div class="form-group">
	    	<label for="password"> Password </label>
	    	<input class="form-control" type="password" name="password" placeholder="Password">
	  	</div>
	  	<div class="form-group">
	  		<input class="btn btn-default" type="submit" value="Login">
			</div>
			<a href="?controller=account&action=forgotPass"> Forgot Password? </a>
	  </form>
</div>
