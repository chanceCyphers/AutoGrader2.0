<?php

class Test {

    public static function test1()
    {
        $db = Db::getInstance();
        $data = array("one", "two", "tree");

// output one, two, three
        $insert_data = implode(",", $data);
        $testid = 'sverdlik_12341988';
        $query11 = "Insert into test VALUES('" . $testid . "','" . $insert_data . "')";

        $userQuery = $db->prepare($query11);
        $userQuery->execute();
        return $insert_data;
        echo $query11;
    }

}

Test::test1();
?>