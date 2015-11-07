<div class="createQuestionPage">
	
	<p>What type of question?</p>
	
	<form action="?controller=questions&action=create" method="post">
		<input type="radio" name="questionType" value="trueFalse">True/False
		<br/>
		<input type="radio" name="questionType" value="multipleChoice">Multiple Choice
		<br/> 
		<input type="submit" value="submit">
	</form>
	
</div>