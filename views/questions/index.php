<div class="createQuestionPage">
	
	<a href="?controller=questions&action=create">Create a Question</a>

	<h2>Previous Questions:</h2><br/> 
	
	<table>
		<tr>
			<th>Question Title</th>
			<th>Owner</th>
		</tr>
		<?php
		foreach ($questions as $row) {
			$t = $row['title'];
			
			echo "<tr>";
			echo "<td>";
			printTitle($row);
			echo "</td>";
			echo "<td>";
			echo $row['owner'];
			echo "</td>";
			echo "</tr>";
		}
		
		function printTitle($row) {
			$url = "?controller=questions&action=viewQuestion&questionId=" . $row['q_id'];
			$title = $row['title'];
			echo "<a href=$url>$title</a>";
		}
		?>
		
	</table>
</div>