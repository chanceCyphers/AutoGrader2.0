<div class="container centered-box">
	<h2> Categories </h2>
	<div class="category_path"> </div>
	<?php
	// String for holding the HTML for output
	$html_out = "<a class='col-sm-4 btn btn-success' href='?controller=category&action=load&loc=";
	foreach ($childrenList as $array => $key) {
		echo $html_out . $key['location'] . " '> " . $key['description'] . "</a> <br/> <br/>";
	}

	$currentLoc = $_GET['loc'];
	echo "<p> Create a New Category: </p>";
	echo "<form action='?controller=category&action=create' method='post'>";
	echo "<input type='text' name='new_category' placeholder='New Category Name'>";
	echo "<input type='hidden' name='location' value='" . $currentLoc . "'>";
	echo "<input type='submit' value='submit'>";	

	?>
</div>
<div class="container table-responsive">
	<p> <strong> Questions in this Category </strong> </p>
	<table class="table table-striped">
		<tr>
			<th> Title </th>
			<th> Question </th>
			<th> Type </th>
		</tr>		
		<?php
		foreach ($questionsList as $row) {
			echo "<tr>";
			echo "<td>";
			printTitle($row);
			echo "</td>";
			echo "<td>";
			echo $row['question'];
			echo "</td>";
			echo "<td>";
			echo $row['name'];
			echo "</td>";
			echo "</tr>";
			}
		// Allow user to view the whole details of the question by clicking it
		function printTitle($row) {
			$url = "?controller=questions&action=viewQuestion&questionId=" . $row['q_id'];
			$title = $row['title'];
			echo "<a href=$url>$title</a>";
		}
		?>
	</table>
</div>

	?>