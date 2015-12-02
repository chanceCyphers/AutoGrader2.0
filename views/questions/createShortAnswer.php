<div class="container centered-box">	
	<form action="?controller=questions&action=createTrueFalse" method="post">
		<h2> Create Short Answer Question </h2>
		<div class="form-group">
			<label for="title"> Give the question a title </label>
			<input class="form-control" type="text" name="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="question"> Question Prompt </label>
			<input class="form-control" type="text" name="question" placeholder="Question">
		</div>
		<div class="form-group">
			<label> Enter the Correct Answer to Question </label>
			<input class="form-control" type="text" name="answer" placeholder="Answer">
		</div>
		<div class="form-group">
			<label for="category"> Choose Category </label>
			<select class="form-control" name="category">
				<?php
					foreach($categories as $array => $keys) {
						foreach ($keys as $key => $value) {
							echo '<option value="'. $value . '">' . $value . '</option>';
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3"> <label> Set Question Permission Level </label> </div>
			<div class="col-sm-offset-5">
				<label class="radio"> <input type="radio" name="visible" value="1"> Private </label>
				<label class="radio"> <input type="radio" name="visible" value="2"> Everyone </label>
				<label class="radio"> <input type="radio" name="visible" value="3"> Individuals </label>				
			</div>
			<span class="help-block"> Note: If <em> Individuals </em> is selected, you must enter at least one user below.
									  Multiple users should be seperated by a comma (,). </span>
			<div class="form-group">
				<label for="permitted"> Individual Users </label>
				<input class="form-control" type="text" name="permitted" placeholder="Enter username(s)">
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-default col-sm-4 col-sm-offset-4" type="submit" value="Create">
		</div>
	</form>	
</div>