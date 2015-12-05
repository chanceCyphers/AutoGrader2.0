<div class="category-pos">
	
</div>

<div class="container centered-box">
	<h2> Categories </h2>
	<?php
		// Retrive list of categories by their location and their description
		$location	= "";
		$description = "";  
		foreach($topLevels as $array => $keys) {
			foreach ($keys as $key => $value) {
				if ($key == 'location') {
					$location = $value;
				} else {
					echo "<a href='?controller=category&action=view&location=" . $location . "'>" . $value . "</a> <br/>";		// Display for now
				}			
			}
		}
	?>