<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">	
			<li><a href="?controller=home">Home</a></li>
			<li><a href="?controller=home&action=howToUse"> About </a> </li>
			<li><a href="?controller=category&action=index">Categories</a></li>
			<li><a href="?controller=questions">Questions</a></li>
			<li><a href="?controller=tests">Tests</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a class "dropdown-toggle" data-toggle="dropdown" href="?controller=admin&action=index">Admin 
					<span class="caret"></span></a></li>
					<ul class="dropdown-menu">
						<li> <a href="?controller=admin&action=index"> Edit User </a> </li>
			<li><a href="?controller=account&action=viewInfo">
				<span class="glyphicon glyphicon-user"></span> View Account </a></li>
			<li><a href="?controller=login&action=logout">
				<span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
		</ul>
	</div>
</nav>