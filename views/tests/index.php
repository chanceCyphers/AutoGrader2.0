<div class="container centered-box">
<div class="createTestPage">
    <?php
        if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
            if ($_SESSION['role'] == 2 || $_SESSION['role'] == 4 || $_SESSION['role'] == 1) {
                echo '<form name="createTest" action="?controller=tests&action=create" method="post">';
                echo "<label>Select a Topic: </label><select  name='SelectTitle'>";


                foreach ($questions as $row) {
                    echo "<option id='SelectTitle' value='" . $row['title'] . "'>	" . $row['title'] . "</option>";
                }

                echo "</select><br/><br/>";
                echo '<input type="submit" name="submit" value="Create Test">';
                echo "</form>";
            }

            if ($_SESSION['role'] == 3) {

                echo '<form align="center" action="?controller=tests&action=takeTest" method="post">';
                echo "<label>Select a Test: </label><select  name='SelectTest'>";


                foreach ($tests1 as $row) {
                    $split_testid = explode("_", $row['id']);
                    $test_title = $split_testid[1]." ".$row['exam_title'];

                    echo "<option id='SelectTest' value='" . $row['id'] . "'>	" . $test_title . "</option>";
                }

                echo "</select><br/><br/>";
                echo '<input type="submit" name="submit" value="Take Test">';
                echo "</form>";
            }
        }
    ?>
</div>

</div>