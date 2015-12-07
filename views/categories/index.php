<div class="container centered-box">
	<h2> Categories </h2>
	<?php
	// String for holding the HTML for output
	$html_out = "<a class='col-sm-4 btn btn-success' href='?controller=category&action=load&loc=";
	foreach ($categoryList as $array => $key) {
		echo $html_out . $key['location'] . " '> " . $key['description'] . "</a><br/>";
	}
	?>
</div>


