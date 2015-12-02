<?php

Class CategoryController {

	# View all of the categories in a hierarchy - serves as landing page
	function index() {
		$categories = CategoryManager::view();		
		require_once("views/categories/index.php");
	}

	# Create a new category
	function create() {
		require_once("views/categories/create.php");
		if(isset($_POST)) {
			$name = $_POST['cat_name'];
			$parent = $_POST['cat_parent'];
			$success = CategoryManager::create($name, $parent);			
		}
	}

	# Delete a category
	function delete() {


	}

	# Change the location of a category in the hierarchy
	function change() {

	}

}



?>