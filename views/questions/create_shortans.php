<div class="createQuestionShortAnswerPage">
	
	<form action="?controller=questions&action=create_shortans" method="post">
		Give the question a title: <br />
		<input type="text" name="title"> <br />
		The question:<br/>
		<input type="text" name="question"><br />
		Answer: <input type="text" name="answer"> <br />
		<br/>
		Choose Category:	
		<select name="category">
			<?php

				foreach($categories as $array => $keys) {
					foreach ($keys as $key => $value) {
						echo '<option value="category">' . $value . '</option>';
					}
				}
			?>
		</select>
		<br />
		Choose who can use the question: <br/>
		None (Private) <input type="radio" name="visible" value="1"> <br/>
		All (Global) <input type="radio" name="visible" value="2"> <br/>
		Select Users <input type="radio" name="visible" value="3"> <br/>
		Usernames that can view the question (seperate by commas):
		<input type="text" name="permitted"> <br/>
		<input type="submit" value="Create">		
	</form>
	
</div>