<div class="container centered-box">
<?php
    $split_testid = explode("_", $test_id);
    $test_title = $split_testid[1];
    echo "<span style='font-size: large;font-weight: bold'>".$test_title."</span></br></br>";
    $i=0;
    echo "<form action='?controller=tests&action=submitTest' method='post'>";
   foreach ($test_questions as $row) {
        $i = $i + 1;
       echo "<p><strong>".$i.")</strong> " . $row['question'] . "</p>";
       $type1 = $row['type'];
       $_SESSION['type']=$type1;
       if($type1==1){
           echo "<p> <input name='trueFalse' type='radio' id='true' value='True'/> True</p>";
           echo "<p> <input name='trueFalse' type='radio' id='false' value='False'/>False</p>";
       }

       if($type1==3){
           $ran = array(1,2,3,4);
           shuffle($ran);
           foreach ($ran as $row11){
               //echo $row11."<br/>";
               if($row11==1){
                   echo "<p> <input name='options' type='checkbox' id='option1' value='" . $row['choice_1'] . "'/>" . $row['choice_1'] . "</p>";
               }
               elseif($row11==2){
                   echo "<p> <input name='options' type='checkbox' id='option2' value='" . $row['choice_2'] . "'/>". $row['choice_2'] . "</p>";
               }
               elseif($row11==3){
                   echo "<p> <input name='options' type='checkbox' id='option3' value='" . $row['choice_3'] . "'/>". $row['choice_3'] . "</p>";
               }
               elseif($row11==4){
                   echo "<p> <input name='options' type='checkbox' id='option3' value='" . $row['answer'] . "'/>". $row['answer'] . "</p>";
               }
               else{

               }

           }

       }

       if($type1==2){
           echo "<input type='text' name='textAns'><br/><br/>";
       }


    }
echo "<input name='submit' type='submit' value='Submit Test'>";
?>
</div>