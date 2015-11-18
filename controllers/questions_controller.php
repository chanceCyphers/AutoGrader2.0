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
        # Get the list of all valid categories       
        require_once('models/createQuestionDbCommunicator.php');
        $categories = CreateQuestionDbCommunicator::getCategories();

		if (!isset($_POST['questionType'])) {
        	require_once('views/questions/create.php');
		} else if ($_POST['questionType'] == "trueFalse") {
			require_once('views/questions/createTrueFalse.php');
		} else if ($_POST['questionType'] == "multipleChoice") {
			require_once('views/questions/createMultipleChoice.php');
		} else if ($_POST['questionType'] == "shortAnswer") {
            require_once('views/questions/create_shortans.php');
        } else if ($_POST['questionType'] == "essay") {
            require_once('views/questions/create_essay.php');
        } else if ($_POST['questionType'] == "dynamic") {
            # View needs to be created and included
        } else if ($_POST['questionType'] == "coding") {
            # View needs to be created and included
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

    public function create_shortans() {

    }   
}

?>