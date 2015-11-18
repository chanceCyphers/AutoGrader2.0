<div class="createQuestionPage">
	
	<p>Please select the question type</p>
	
	<form action="?controller=questions&action=create" method="post">
		<input type="radio" name="questionType" value="trueFalse"> True/False
		<br/>
		<input type="radio" name="questionType" value="multipleChoice"> Multiple Choice
		<br/>
		<input type="radio" name="questionType" value="shortAnswer"> Short Answer
		<br/>
		<input type="radio" name="questionType" value="essay"> Essay
		<br/>  
		<input type="radio" name="questionType" value="dynamic"> Dynamic (NOT IMPLEMENTED)
		<br/>
		<input type="radio" name="questionType" value="coding"> Coding (NOT IMPLEMENTED)
		<br/> <br/>
		<input type="submit" value="submit">
	</form>
	
</div>