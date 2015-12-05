<?php

Class CategoryController {

	# View all of the categories in a hierarchy - serves as landing page
	function index() {
		$topLevels = CategoryManager::viewTopLevel();		
		require_once("views/categories/index.php");
	}

	function view() {
		$location = $_GET['location'];
		$childrenList = CategoryManager::getCategoryChildren($location);
		require_once("views/categories/categories.php");
	}

	# Create a new category
	function create() {
		require_once("views/categories/create.php");
		if(isset($_POST)) {
				
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