<?php

$examname = "computer networking";
$timeduration=23;
$maxscore=10;
$semester = 3;
$time = "22:27:00";
$date = "2020-12-31";
$course = "BCA";
$year =2;
$option_id = array("Option1", "Option2", "Option3", "Option4");

?>
<html>
    <head>
        <title>Preview</title>
        <link rel="stylesheet" type="text/css"  href="preview.css">
</head>
<body>

    <div style="overflow: hidden;" class="header">
        <h2 id="exam_name" style="text-transform: uppercase;"><?php echo $examname;?></h2>
        <p style="float: left;">Time:<?php echo $timeduration;?></p>
        <p id="Max_score" style="float: right;">Max score:<?php echo $maxscore;?></p>
      
    </div>
    <!-- <div id="question_container">    
  
    </div> -->
</body>
</html>

<?php

$db = mysqli_connect('localhost','root','','exams');

$sql1 = "SELECT Id from exam_details WHERE Name='$examname' and Course='$course' and Semester='$semester' and Year='$year'";
$query = mysqli_query($db, $sql1);
if (mysqli_num_rows($query) == 0){
            echo "working";
}
else{
    $result1 = mysqli_fetch_array($query ,MYSQLI_BOTH);
    $exam_id = $result1['Id'];

    $sql2 ="SELECT exam_id FROM exam_timing WHERE time ='$time' and date = '$date' and exam_id =$exam_id ";
    $result1 = mysqli_fetch_array(mysqli_query($db,$sql2) ,MYSQLI_BOTH);
    $exam_id = $result1['exam_id'];

    $sql3 = "SELECT * from question_library WHERE Exam_id = $exam_id";
    $query = mysqli_query($db,$sql3);

    $var = 1;
    echo '<div id="question_container">';
    while ($row = mysqli_fetch_array($query ,MYSQLI_ASSOC)){
        echo $var++.")";
        $options = array('a', 'b', 'c', 'd');
        $i = 0;
            
        echo $row["Question"]."           [".$row["Score"]."]"."<br>";
        foreach ($option_id as $id){
            if($row["Question_type"] == "MCQ"){
                echo " (".$options[$i++].") ".$row[$id]."<br>";
            }
        } 
        echo "<br>";              
    }
    echo '</div>';
}
?>
