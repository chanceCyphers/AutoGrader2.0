<?php

class QuestionsController {
    
    public function index() {
        require_once('models/view_questions_db_communicator.php');
		$questions = ViewQuestionsDbCommunicator::getAllQuestions();
		
        require_once('views/questions/index.php');
    }
    
    public function viewQuestion() {
        require_once('models/view_questions_db_communicator.php');
    	$questionId = $_GET['questionId'];
		
    	$question = ViewQuestionsDbCommunicator::getQuestion($questionId);
    	
    	require_once('views/questions/viewQuestion.php');
    }
    
    public function create() {
    	$questionType = $_POST['questionType'];

		if (!isset($questionType)) {
        	require_once('views/questions/create.php');
		} else if ($questionType == "trueFalse") {
			require_once('views/questions/createTrueFalse.php');
		} else if ($questionType == "multipleChoice") {
			require_once('views/questions/createMultipleChoice.php');
		}
    }
    
    public function createTrueFalse() {
		require_once('models/createQuestionDbCommunicator.php');
    	
    	$title = $_POST['title'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		
		CreateQuestionDbCommunicator::createTrueFalseQuestion($title, $question, $answer);

		require_once('views/questions/createSuccess.php');
    }   
}

?>