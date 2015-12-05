<div class="container centered-box">
<div class="viewTestQuestionPage">

    <form action='?controller=tests&action=createTest' method='post'>
        <H3>Enter Test Timings: </H3>
        <label>Test Start Date: </label><input type="date" name="start_date"><br/><br/>
        <label>Test End Date: </label><input type="date" name="end_date"><br/><br/>

        <label>Select Test Group: </label> 

        <select  name='group_id'>
            <?php
            foreach ($group_ids as $row) {
                echo "<option id='group_id' value='".$row[group_id]."'>	".$row[group_id]."</option>";
            }
            ?>
        </select><br/><br/>

        <label>Select Test Title: </label> 
        <input type="text" name="test_title"><label style="font-size: x-small">(Ex: Quiz 1, Final Exam)</label>

        <h3>Select questions: </h3>
    <?php
    $i=0;
    //echo "<form action='views/tests/Questions_Added_to_Test_Success.php' method='get'>";
    foreach ($question1 as $row) {
        $i = $i+1;
        $questionid = $row['q_id'];
        echo "<p> <input name='qids[]' type='checkbox' id='qids' value='" . $row['q_id'] . "'/>";
        echo $i.") Title: " . $row['title'] . "</p>";
        echo "<p>Question: " . $row['question'] . "</p>";
        echo "<p>Answer: " . $row['answer'] . "</p>";
        echo "<p>Owner: " . $row['owner'] . "</p>";
        echo "<p>Visible to Others: " . $row['visible'] . "</p><br/>";

    }
    echo "<input type='submit' value='Create Test'>";
    echo "</form>";
    ?>

</div>
</div>