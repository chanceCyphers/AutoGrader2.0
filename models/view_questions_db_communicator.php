<?php

class ViewQuestionsDbCommunicator {

    public static function getAllQuestionsByUser() {
		$db = Db::getInstance();
		$owner = $_SESSION['username'];
		$userQuery = $db->prepare('SELECT q_id, title, question, owner, question_types.name 
								   FROM questions, question_types								   
								   WHERE questions.type = question_types.type_id AND questions.owner = :owner
								   ORDER BY q_id
								   DESC LIMIT 5');
        $userQuery->execute(array('owner' => $owner));
        
        $questionsUser = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $questionsUser;
	}

	public static function getQuestionsByPermissions() {
		$db = Db::getInstance();
		$owner = $_SESSION['username'];
		$userQuery = $db->prepare('SELECT q_id, title, question, owner, question_types.name 
								   FROM questions, question_types								   
								   WHERE questions.type = question_types.type_id AND questions.visible = 2
								   ORDER BY q_id
								   DESC LIMIT 5');
        $userQuery->execute();
        
        $questionsPerm = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $questionsPerm;
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