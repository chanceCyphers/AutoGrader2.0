<?php
	if (isset($_GET['desc'])) {
		$current = $_GET['desc'];
		$_SESSION['category_pos_name'] .= $current . " >> ";
	}

	echo "<div class='category-navigation'>";
	echo $_SESSION['category_pos_name'];
	echo "</div>";

	echo "<div class='container centered-box'>";

	echo "<h2> Categories </h2>";
		if ($childrenList) {
			foreach($childrenList as $array => $keys) {
				foreach ($keys as $key => $value) {
					if ($key == 'location') {
						$location = $value;
					} else {
						echo "<a href='?controller=category&action=view&location=". $location . "&desc=" . $value . "'>" . $value . "</a><br/>";
					}			
				}		
			}
		} else {
			echo "There are no more categories to display.";
		}
	?>
	<form action="?controller=category&action=create" method="post">
		<div class="form-group">
			<label for="new_category"> Create New Category </label>
				<input type="text" name="new_category" placeholder="New Category Name">
				<input class="btn btn-default col-sm-4 col-sm-offset-4" type="submit" value="Create">
		</div>
	</form>

