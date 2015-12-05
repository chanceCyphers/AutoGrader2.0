<?php

class CreateQuestionDbCommunicator {

    public static function createTrueFalseQuestion($type, $title, $question, $answer, $owner, $cat_id, $visible, $permitted) {
		$db = Db::getInstance();
		
		$questionInsert = $db->prepare('INSERT INTO questions (type, title, question, 
		answer, choice_1, choice_2, choice_3, owner, cat_id, visible, permitted)
		VALUES (:type, :title, :question, :answer, null, null, null, :owner, :cat_id, :visible, :permitted)');

        $questionInsert->execute(array('type' => $type, 'title' => $title, 'question' => $question, 'answer' => $answer,
        						  'owner' => $owner, 'cat_id' => $cat_id, 'visible' => $visible, 'permitted' => $permitted));
	}

	public static function create_shortans($type, $title, $question, $answer, $owner, $cat_id, $visible, $permitted) {
		$db = Db::getInstance();
		
		$questionInsert = $db->prepare('INSERT INTO questions (type, title, question, 
		answer, choice_1, choice_2, choice_3, owner, cat_id, visible, permitted)
		VALUES (:type, :title, :question, :answer, null, null, null, :owner, :cat_id, :visible, :permitted)');

        $questionInsert->execute(array('type' => $type, 'title' => $title, 'question' => $question, 'answer' => $answer,
        						  'owner' => $owner, 'cat_id' => $cat_id, 'visible' => $visible, 'permitted' => $permitted));
	}

	public static function createMultipleChoiceQuestion($type, $title, $question, $answer, $choice_1, $choice_2, $choice_3, $owner, $cat_id, $visible, $permitted) {
		$db = Db::getInstance();
		
		$questionInsert = $db->prepare('INSERT INTO questions (type, title, question, 
		answer, choice_1, choice_2, choice_3, owner, cat_id, visible, permitted)
		VALUES (:type, :title, :question, :answer, :choice_1, :choice_2, :choice_3, :owner, :cat_id, :visible, :permitted)');

        $questionInsert->execute(array('type' => $type, 'title' => $title, 'question' => $question, 'answer' => $answer,
        						  'choice_1' => $choice_1, 'choice_2' => $choice_2, 'choice_3' => $choice_3,
        						  'owner' => $owner, 'cat_id' => $cat_id, 'visible' => $visible, 'permitted' => $permitted));
	}

	public static function getCategories() {
		$db = Db::getInstance();

		$categoryQuery = $db->prepare('SELECT description FROM categories');
		$categoryQuery->execute();

		$categoryList = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

		return $categoryList;		
	}

	public static function getCategoryId($category_name) {
		$db = Db::getInstance();

		$categoryQuery = $db->prepare('SELECT cat_id FROM categories WHERE description = :category_name');
		$categoryQuery->execute(array('category_name' => $category_name));

		$categoryID = $categoryQuery->fetch(PDO::FETCH_ASSOC);
		$categoryID = (integer) $categoryID['cat_id'];

		return $categoryID;	

	}
}

?>