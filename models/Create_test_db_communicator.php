<?php

class CreateTestDBCommunicator
{

    public static function getAllTopics()
    {
        $db = Db::getInstance();
        $userQuery = $db->prepare('SELECT q_id, title, owner,type FROM questions GROUP BY title');
        $userQuery->execute();
        $questions = $userQuery->fetchAll(PDO::FETCH_ASSOC);

        return $questions;
    }

    public static function getAllQuestionTypes()
    {
        $db = Db::getInstance();
        $query61 = "SELECT * FROM question_types";
        $userQuery = $db->prepare($query61);
        $userQuery->execute();
        $question_types = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $question_types;
    }

    public static function getAllTests()
    {
        $group_id1 = $_SESSION['groupId'];
        $db = Db::getInstance();
        $query77 = "SELECT * FROM test WHERE group_id ='" . $group_id1 . "'";
        $userQuery = $db->prepare($query77);
        $userQuery->execute();
        $tests = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $tests;
    }

    public static function getQuestion($qtitle, $q_type)
    {
        $db = Db::getInstance();
        $query1 = "SELECT * FROM questions WHERE title LIKE '" . $qtitle . "' and type='" . $q_type . "'";
        $userQuery = $db->prepare($query1);
        $userQuery->execute();
        $question1 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $question1;
    }


    public static function getAvailableGroups()
    {
        $db = Db::getInstance();
        $query61 = "SELECT group_id FROM users GROUP BY group_id";
        $userQuery = $db->prepare($query61);
        $userQuery->execute();
        $group_ids = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        return $group_ids;
    }

    public static function insertTest($q_ids, $title1, $startDate, $endDate, $group_id, $test_title, $q_type)
    {
        $userName = $_SESSION['username'];
        $db = Db::getInstance();
        $data = $q_ids;
        $insert_data = implode(",", $data);
        $currentDate = date("Y-m-d");
        $test_id = uniqid($userName . '_' . $title1 . '_');
        $_SESSION['test_id'] = $test_id;
        $query11 = "Insert into test VALUES('" . $test_id . "','" . $insert_data . "','" . $currentDate . "','" . $startDate . "','" . $endDate . "','" . $group_id . "','" . $test_title . "','" . $q_type . "')";
        $userQuery = $db->prepare($query11);
        $userQuery->execute();
        return $insert_data;
        echo $query11;
    }


    public static function getSelectedTest($test_id)
    {
        $_SESSION['test_id'] = $test_id;
        $db = Db::getInstance();
        $query1 = "SELECT qids,q_type FROM test WHERE id LIKE '" . $test_id . "'";
        $userQuery = $db->prepare($query1);
        $userQuery->execute();
        $results1 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results1 as $row) {
            $qids1 = $row['qids'];
            $_SESSION['testqids'] = $qids1;
            $_SESSION['q_type'] = $row['q_type'];
            $qids_array = explode(",", $qids1);
            $in = str_repeat('?,', count($qids_array) - 1) . '?';
            $db = Db::getInstance();
            $query11 = "SELECT * FROM questions WHERE q_id in ($in)";
            $userQuery = $db->prepare($query11);
            $userQuery->execute($qids_array);
            $question16 = $userQuery->fetchAll(PDO::FETCH_ASSOC);
            return $question16;
        }

    }

    public static function submitTest($selected_option)
    {
        $userName = $_SESSION['username'];
        $db = Db::getInstance();
        $studentAnswers = $selected_option;
        $insert_studentAnswers = implode(",", $studentAnswers);
        $test_id = $_SESSION['test_id'];
        $testqids = $_SESSION['testqids'];
        //$insert_data = implode(",", $data);
        //$qids2 = $_SESSION['qids'];
        $score = CreateTestDBCommunicator::result($testqids,$selected_option);
       // return $score;
        //$score =61;
        $currentDate = date("Y-m-d");
        $query11 = "Insert into results VALUES('" . $userName . "','" . $test_id . "','" . $testqids . "','" . $insert_studentAnswers . "','" . $score . "')";
        $userQuery = $db->prepare($query11);
        $userQuery->execute();
        return $score;
    }


    public static function result($testqids,$selected_option)
    {
        $score = 0;
        $qids_array = explode(",", $testqids);
        $in = str_repeat('?,', count($qids_array) - 1) . '?';
        $db = Db::getInstance();
        $query11 = "SELECT * FROM questions WHERE q_id in ($in)";
        $userQuery = $db->prepare($query11);
        $userQuery->execute($qids_array);
        $question16 = $userQuery->fetchAll(PDO::FETCH_ASSOC);

        //return $question16;
        $k=1;
        foreach($question16 as $r){
            $answers[$k] = $r['answer'];
            $k = $k+1;
        }
        $k=1;
        foreach($selected_option as $r){
            $selected_option1[$k] = $r;
            $k = $k+1;
        }

        for($i=1;$i<=count($testqids)+1;$i++){
                if (!strcasecmp($selected_option1[$i], $answers[$i])) {
                    $score = $score + 1;
                }
            }
        return $score;
    }

}

?>