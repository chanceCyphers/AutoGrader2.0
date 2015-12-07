<?php

class CategoryController {

	function index() {	
		// At the initial landing page, show the top level categories only	
		$categoryList = CategoryManager::getCategoryTopLevel();
		require_once("views/categories/index.php");
	}

	// Shows the category and all of the questions and categories in the category
	function load() {
		require_once("models/question_manager.php");
		$categoryLOC = $_GET['loc'];
		$childrenList = CategoryManager::getCategoryChildren($categoryLOC);
		$categoryIDResult = CategoryManager::getCategoryIDByLocation($categoryLOC);		
		$categoryID = $categoryIDResult['cat_id'];
		$questionsList = QuestionManager::getQuestionsUnderCategory($categoryID);
		require_once("views/categories/category_loader.php");		
	}

	// Creates a new category
	function create() {
		if (isset($_POST['new_category'])) {
			$categoryName = $_POST['new_category'];
			$categoryLoc = $_POST['location'];

			// If categories must be unique, enter check for it here
			CategoryManager::create($categoryName, $categoryLoc);
		} else {

		}
		
	}

	function delete() {

	}

	function change() {

	}

}



?>