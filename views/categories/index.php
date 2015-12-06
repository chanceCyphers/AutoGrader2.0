<div class="container centered-box">
	<h2> Categories </h2>
	<?php
		$_SESSION['category_pos_name'] = "";
		$_SESSION['category_pos'] = "";
		// Retrive list of categories by their location and their description
		$location	= "";
		foreach($topLevels as $array => $keys) {
			foreach ($keys as $key => $value) {
				if ($key == 'location') {
					$location = $value;
				} else {					
					echo "<a href='?controller=category&action=view&location=". $location . "&desc=" . $value . "'>" . $value . "</a><br/>";
				}			
			}
		}
	?>



