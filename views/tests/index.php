<div class="createTestPage">
    <?php
        if (isset($_SESSION['username']) && array_key_exists("username", $_SESSION)) {
            if ($_SESSION['role'] == 2 || $_SESSION['role'] == 4 || $_SESSION['role'] == 1) {
                echo '<form action="?controller=tests&action=create" method="post">';
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
                    echo "<option id='SelectTest' value='" . $row['id'] . "'>	" . $row['id'] . "</option>";
                }

                echo "</select><br/><br/>";
                echo '<input type="submit" name="submit" value="Take Test">';
                echo "</form>";
            }
        }
    ?>
</div>