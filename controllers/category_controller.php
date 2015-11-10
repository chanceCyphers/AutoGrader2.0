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
			$description = $_POST['description'];
			$parent = $_POST['parent'];
			$success = CategoryManager::create();
			
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