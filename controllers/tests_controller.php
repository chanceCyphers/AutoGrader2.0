

<?php

class TestsController
    {
    public function index()
    {
        require_once('models/Create_test_db_communicator.php');

        if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
            if ($_SESSION['role'] == 2 || $_SESSION['role'] == 4 || $_SESSION['role'] == 1) {
                $questions = CreateTestDBCommunicator::getAllTopics();
                $question_types = CreateTestDBCommunicator::getAllQuestionTypes();
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
        $q_type = $_POST['SelectTestType'];
       $_SESSION['q_type']= $q_type;
        $question1 = CreateTestDBCommunicator::getQuestion($q_title,$q_type);
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
        $q_type = $_SESSION['q_type'];
        $question1 = CreateTestDBCommunicator::insertTest($qids,$title1,$startDate,$endDate,$group_id,$test_title,$q_type);
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

        if($_SESSION['q_type']==3) {
            $selected_option = $_POST['options'];
            $test_questions = CreateTestDBCommunicator::submitTest($selected_option);
        }

        $qids61 =$_SESSION['testqids'];
        $arrays = explode(",",$qids61);
        $count = count($arrays);

        if($_SESSION['q_type']==1){
            for($i=1;$i<=$count;$i++){
                $value[$i] = $_POST[$i];
            }
            $test_questions = CreateTestDBCommunicator::submitTest($value);
        }

        require_once('views/tests/submit_test.php');
    }
}

?>