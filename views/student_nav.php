<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">	
			<li><a href="?controller=home">Home</a></li>
			<li><a href="?controller=home&action=howToUse"> About </a> </li>
			<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tests
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?controller=tests&action=index">Take Test</a></li>
            <li><a href="#">View Results</a></li>
          </ul>
        </li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="?controller=account&action=viewInfo">
				<span class="glyphicon glyphicon-user"></span> View Account </a></li>
			<li><a href="?controller=login&action=logout">
				<span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
		</ul>
	</div>
</nav>