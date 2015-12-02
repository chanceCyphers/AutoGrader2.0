<div class="container centered-box">
	<h2> Select Question Type </h2>
	<form action="?controller=questions&action=create" method="post">
		<div class="col-sm-4 col-sm-offset-4">
			<label class="radio"> <input type="radio" name="questionType" value="trueFalse"> True/False </label>
			<label class="radio"> <input type="radio" name="questionType" value="multipleChoice"> Multiple Choice </label>
			<label class="radio"> <input type="radio" name="questionType" value="shortAnswer"> Short Answer </label>
			<label class="radio"> <input type="radio" name="questionType" value="essay"> Essay </label>
		</div>		
		<div class="form-group">
			<input class="btn btn-default col-sm-4 col-sm-offset-4" type="submit" value="Create">
		</div>
	</form>
</div>