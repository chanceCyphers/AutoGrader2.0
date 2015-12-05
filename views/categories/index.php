<div class="container centered-box">
	<h2> Categories </h2>
	<?php
		// Retrive list of categories by their location and their description
		$location = array();		// Store locations of categories in an array
		$description = array();	// Store descriptions of categories in an array
		foreach($categories as $array => $keys) {
			foreach ($keys as $key => $value) {
				if ($key == 'location') {
					$location[] = $value;			// Store next location
				} else {
					$description[] = $value;	// Store next location
					echo $value . "<br/>";		// Display for now
				}			
			}
		}

		echo "<br/>";
		echo " <button class='text-center' data-toggle='collapse' data-target='#demo'> Computer Science </button>";
		echo " <div id='demo' class='collapse'> " . $description[1] . "</div>";

	?>	

	<div>
	<h2>Create New Category</h2>
    	<form action="?controller=category&action=create" method="post">    
            Category Name: <input type="text" name="cat_name" size="30">            
            <input type="submit" value="Create">
    	</form>
	</div>
</div>