<div id="categoryDiv">
	<h2> Categories </h2>
	<?php
		foreach($categories as $array => $keys) {
			foreach ($keys as $key => $value) {
				echo $value . "<br />";
			}
		}
	?>	

	<div>
	<h2>Create New Category</h2>
    	<form action="?controller=category&action=create" method="post">    
            Category Name: <input type="text" name="cat_name" size="30">
            Create Category as Child of: <input type="text" name="cat_parent" size="30" placeholder="Parent Category">
            <input type="submit" value="Create">
    	</form>
	</div>

	<h2>Delete Category</h2>
    	<form action="?controller=category&action=delete" method="post">    
            Category Name: <input type="text" name="cat_name" size="30">
            Create Category as Child of: <input type="text" name="cat_parent" size="30" placeholder="Parent Category">
            <input type="submit" value="Delete">
    	</form>
	</div>

	<h2>Change Category</h2>
    	<form action="?controller=category&action=edit" method="post">    
            Category Name: <input type="text" name="cat_name" size="30">
            Create Category as Child of: <input type="text" name="cat_parent" size="30" placeholder="Parent Category">
            New Category Name: <input type="text" name="new_cat_name" size="30">
            New Category Parent: <input type="text" name="new_cat_parent" size="30">
            <input type="submit" value="Change">
    	</form>
	</div>



</div>