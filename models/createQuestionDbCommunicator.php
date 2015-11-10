<?php

class CreateQuestionDbCommunicator {

    public static function createTrueFalseQuestion($title, $question, $answer) {
		$db = Db::getInstance();
		
		$userQuery = $db->prepare('INSERT INTO questions (type, title, question, 
		answer, choice_1, choice_2, choice_3, owner, cat_id, visible, permitted)
		VALUES (1, :title, :question, :answer, null, null, null, "ownerNotYetImplemented", 1, 1, null)');

        $userQuery->execute(array('title' => $title, 'question' => $question, 'answer' => $answer));
	}
}

?>