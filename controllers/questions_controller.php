<?php

class QuestionsController {
    
    public function index() {
        require_once('models/question_manager.php');
		$questionsUser = QuestionManager::getAllQuestionsByUser();
		$questionsPerm = QuestionManager::getQuestionsByPermissions();
        require_once('views/questions/index.php');
    }
    
    public function viewQuestion() {
        require_once('models/question_manager.php');
    	$questionId = $_GET['questionId'];
		
    	$question = QuestionManager::getQuestion($questionId);
    	
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
            require_once('views/questions/createShortAnswer.php');
        } else if ($_POST['questionType'] == "essay") {
            require_once('views/questions/createEssay.php');
        } else if ($_POST['questionType'] == "dynamic") {
            # View needs to be created and included
        } else if ($_POST['questionType'] == "coding") {
            # View needs to be created and included
        }
    }
    
    public function createTrueFalse() {
		require_once('models/createQuestionDbCommunicator.php');
    	
        $type = 1; #TRUE/FALSE
    	$title = $_POST['title'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
        $owner = $_SESSION['username'];
        # Get the id of the category by it's name
		$cat_id = CreateQuestionDbCommunicator::getCategoryId($_POST['category']);
        $visible = $_POST['visible'];
        # If privacy is set to limited, get the usernames that are permitted.
        if ($visible == 3) {
            $permitted = $_POST['permitted'];
        } else {
            $permitted = "";
        }

		CreateQuestionDbCommunicator::createTrueFalseQuestion($type, $title, $question, $answer, $owner, $cat_id, $visible, $permitted);
        
    }

    public function createShortAnswer() {
        require_once('models/createQuestionDbCommunicator.php');
        
        $type = 2; #SHORT ANSWER
        $title = $_POST['title'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $owner = $_SESSION['username'];
        # Get the id of the category by it's name
        $cat_id = CreateQuestionDbCommunicator::getCategoryId($_POST['category']);
        $visible = $_POST['visible'];
        # If privacy is set to limited, get the usernames that are permitted.
        if ($visible == 3) {
            $permitted = $_POST['permitted'];
        } else {
            $permitted = "";
        }

        CreateQuestionDbCommunicator::create_shortans($type, $title, $question, $answer, $owner, $cat_id, 
                                                      $visible, $permitted);
        require_once("views/questions/create_success.php");
    }

    public function createMultipleChoice() {
        require_once('models/createQuestionDbCommunicator.php');

        $type = 3; #MULTIPLE CHOICE
        $title = $_POST['title'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $choice_1 = $_POST['choice_1'];
        $choice_2 = $_POST['choice_2'];
        $choice_3 = $_POST['choice_3'];
        $owner = $_SESSION['username'];
        # Get the id of the category by it's name
        $cat_id = CreateQuestionDbCommunicator::getCategoryId($_POST['category']);
        $visible = $_POST['visible'];
        # If privacy is set to limited, get the usernames that are permitted.
        if ($visible == 3) {
            $permitted = $_POST['permitted'];
        } else {
            $permitted = "";
        }
        CreateQuestionDbCommunicator::createMultipleChoiceQuestion($type, $title, $question, $answer, $choice_1, $choice_2, 
                                                                   $choice_3, $owner, $cat_id, $visible, $permitted);
        require_once("views/questions/create_success.php");

    }

    public function createEssay() {
        require_once('models/createQuestionDbCommunicator.php');
        
        $type = 4; #ESSAY
        $title = $_POST['title'];
        $question = $_POST['question'];
        $answer = "STUDENT_DEFINED"; #Essay questions are not graded automatically
        $owner = $_SESSION['username'];
        # Get the id of the category by it's name
        $cat_id = CreateQuestionDbCommunicator::getCategoryId($_POST['category']);
        $visible = $_POST['visible'];
        # If privacy is set to limited, get the usernames that are permitted.
        if ($visible == 3) {
            $permitted = $_POST['permitted'];
        } else {
            $permitted = "";
        }

        CreateQuestionDbCommunicator::create_essay($type, $title, $question, $answer, $owner, $cat_id, $visible, $permitted);
        require_once("views/questions/create_success.php");
     
    }

    ### NOT IMPLEMENTED ###
    public function create_dynamic() {

    }

    ### NOT IMPLEMENTED ###
    public function create_coding() {

    }
}

?>