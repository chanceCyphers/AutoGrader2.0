

<?php

class TestsController
    {
    public function index()
    {
        require_once('models/Create_test_db_communicator.php');

        if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
            if ($_SESSION['role'] == 2 || $_SESSION['role'] == 4 || $_SESSION['role'] == 1) {
                $questions = CreateTestDBCommunicator::getAllQuestions();
            }
            if ($_SESSION['role'] == 3) {
                $tests1 = CreateTestDBCommunicator::getAllTests();
            }
        }
        require_once('views/tests/index.php');
    }

    public function create()
    {
        require_once('models/Create_test_db_communicator.php');
        $q_title=$_POST['SelectTitle'];
        $_SESSION['SelectTitle'] = $q_title;
        $question1 = CreateTestDBCommunicator::getQuestion($q_title);
        $group_ids = CreateTestDBCommunicator::getAvailableGroups();
        require_once('views/tests/viewTestQuestion.php');
    }

    public function createTest(){
        require_once('models/Create_test_db_communicator.php');
        $qids = $_POST['qids'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $group_id = $_POST['group_id'];
        $test_title = $_POST['test_title'];
        $title1 = $_SESSION['SelectTitle'];
        $question1 = CreateTestDBCommunicator::insertTest($qids,$title1,$startDate,$endDate,$group_id,$test_title);
      //  $question11 = CreateTestDBCommunicator::insertTest();
        require_once('views/tests/Questions_Added_to_Test_Success.php');
    }

    public function takeTest(){
        require_once('models/Create_test_db_communicator.php');
        $test_id=$_POST['SelectTest'];
       // $_SESSION['SelectTitle'] = $test_id;
        $test_questions = CreateTestDBCommunicator::getSelectedTest($test_id);
        //$group_ids = CreateTestDBCommunicator::getAvailableGroups();
        require_once('views/tests/take_test.php');
    }
    public function submitTest(){
        require_once('models/Create_test_db_communicator.php');
        $test_questions = CreateTestDBCommunicator::submitTest();
        require_once('views/tests/submit_test.php');
    }
}

?>