<?php

class ViewQuestionsDbCommunicator {

    public static function getAllQuestions() {
		$db = Db::getInstance();
		
		$userQuery = $db->prepare('SELECT q_id, title, owner FROM questions');
        $userQuery->execute();
        
        $questions = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $questions;
	}
	
	public static function getQuestion($questionId) {
		$db = Db::getInstance();

		
		$userQuery = $db->prepare('SELECT * FROM questions WHERE q_id = :questionId');
        $userQuery->execute(array('questionId' => $questionId));
        
        $question = $userQuery->fetch(PDO::FETCH_ASSOC);
	
		$t = $question['title'];


		return $question;
	}
}

?>