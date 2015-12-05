<?php

class CreateTestDBCommunicator {

    public static function getAllQuestions() {
		$db = Db::getInstance();
		$userQuery = $db->prepare('SELECT q_id, title, owner FROM questions GROUP BY title');
        $userQuery->execute();
        $questions = $userQuery->fetchAll(PDO::FETCH_ASSOC);

        return $questions;
	}

    public static function getAllTests() {
        $group_id1 = $_SESSION['groupId'];
        $db = Db::getInstance();
        $query77 = "SELECT * FROM test WHERE group_id ='". $group_id1."'";
        $userQuery = $db->prepare($query77);
        $userQuery->execute();
        $tests = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $tests;
    }

	public static function getQuestion($qtitle) {
		$db = Db::getInstance();
		$query1 = "SELECT * FROM questions WHERE title LIKE '".$qtitle."'";
		$userQuery = $db->prepare($query1);
		$userQuery->execute();
		$question1 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
		return $question1;
	}
    public static function getAvailableGroups() {
        $db = Db::getInstance();
        $query61 = "SELECT group_id FROM users GROUP BY group_id";
        $userQuery = $db->prepare($query61);
        $userQuery->execute();
        $group_ids = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $group_ids;
    }
	public static function insertTest($q_ids,$title1,$startDate,$endDate,$group_id){
        $userName = $_SESSION['username'];
        $db = Db::getInstance();
        $data = $q_ids;
        $insert_data = implode(",", $data);
        $currentDate = date("Y-m-d");
        $test_id = uniqid($userName.'_'.$title1.'_');
        $_SESSION['test_id'] = $test_id;
        $query11 = "Insert into test VALUES('" . $test_id . "','" . $insert_data . "','" . $currentDate . "','" . $startDate . "','" . $endDate . "','" . $group_id . "')";
        $userQuery = $db->prepare($query11);
        $userQuery->execute();
        return $insert_data;
        echo $query11;
	}



    public static function getSelectedTest($test_id){

        $db = Db::getInstance();
        $query1 = "SELECT qids FROM test WHERE id LIKE '".$test_id."'";
        $userQuery = $db->prepare($query1);
        $userQuery->execute();
        $results1 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        foreach($results1 as $row) {
            $qids1 = $row['qids'];
            //return $qids1;

            $qids_array = explode(",", $qids1);
            $in = str_repeat('?,', count($qids_array) - 1) . '?';
            //return $qids_array;
            //return $in;
            //$ids = array(5,6);
            //$in  = str_repeat('?,', count($ids) - 1) . '?';


            $db = Db::getInstance();
            $query11 = "SELECT * FROM questions WHERE q_id in ($in)";
            $userQuery = $db->prepare($query11);
            $userQuery->execute($qids_array);
            $question16 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
            return $question16;
        }

    }

    public static function submitTest(){

    }
}

?>