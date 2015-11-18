<?php

class CreateQuestionDbCommunicator {

    public static function createTrueFalseQuestion($title, $question, $answer) {
		$db = Db::getInstance();
		
		$userQuery = $db->prepare('INSERT INTO questions (type, title, question, 
		answer, choice_1, choice_2, choice_3, owner, cat_id, visible, permitted)
		VALUES (1, :title, :question, :answer, null, null, null, "ownerNotYetImplemented", 1, 1, null)');

        $userQuery->execute(array('title' => $title, 'question' => $question, 'answer' => $answer));
	}

	public static function getCategories() {
	$db = Db::getInstance();

		$categoryQuery = $db->prepare('SELECT description FROM categories');
		$categoryQuery->execute();

		$categoryList = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

		return $categoryList;		
	}

	public static function getCategoryId($category_name) {

		$categoryQuery = $db->prepare('SELECT cat_id FROM categories WHERE description = :category_name');
		$categoryQuery->execute(array('category_name' => $category_name));

		$categoryID = $categoryQuery->fetch(PDO::FETCH_ASSOC);

		return $categoryID;	

	}
}

?>