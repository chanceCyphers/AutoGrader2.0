<div class="container centered-box text-centered">
	<a class="btn btn-default" href="?controller=questions&action=create">Create a New Question</a>
	<h3>Last 5 Questions Created By You:</h3><br/>
</div> 
<div class="container table-responsive">
	<table class="table table-striped">
		<tr>
			<th> Title </th>
			<th> Question </th>
			<th> Type </th>
		</tr>
		<?php

		foreach ($questionsUser as $row) {
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
	<p class="text-muted"> Note: The most recent questions are displayed at the top </p>
</div>
<div class="container centered-box text-centered">
	<h3>Last 5 Questions Created By Others:</h3><br/>
</div> 
<div class="container table-responsive">
	<table class="table table-striped">
		<tr>
			<th> Title </th>
			<th> Question </th>
			<th> Type </th>
			<th> Created By </th>
		</tr>
		<?php

		foreach ($questionsPerm as $row) {
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
			echo "<td>";
			echo $row['owner'];
			echo "</td>";
			echo "</tr>";
			}
		?>
	</table>
	<p class="text-muted"> Note: The most recent questions are displayed at the top </p>
</div>
