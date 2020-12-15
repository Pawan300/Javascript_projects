<?php 

session_start();
$db = mysqli_connect('localhost','root','','exams');

$question = mysqli_real_escape_string($db ,$_POST['question']);
$option1 = mysqli_real_escape_string($db ,$_POST['option1']);
$option2 = mysqli_real_escape_string($db ,$_POST['option2']);
$option3 = mysqli_real_escape_string($db ,$_POST['option3']);
$option4 = mysqli_real_escape_string($db ,$_POST['option4']);
$score = mysqli_real_escape_string($db ,$_POST['score']);
$question_type = mysqli_real_escape_string($db ,$_POST['question_type']);
$time = mysqli_real_escape_string($db ,$_POST['time']);
$date = mysqli_real_escape_string($db ,$_POST['date']);
$semester = mysqli_real_escape_string($db ,$_POST['semester']);
$examname = mysqli_real_escape_string($db ,$_POST['exam_name']);
$course = mysqli_real_escape_string($db ,$_POST['Course']);
$year = mysqli_real_escape_string($db ,$_POST['Year']);
$max_score = mysqli_real_escape_string($db, $_POST['max_score']);


$checking = "SELECT Id FROM exam_details WHERE 
           Name='$examname' AND Semester='$semester' and Course='$course'    #Checking exam details existence
            and Year='$year'";

$result = mysqli_query($db, $checking);
$count = mysqli_num_rows($result);
if ($count == 0){
    mysqli_close($db);
    echo "Error while loading exam details.";
}
else{

    $exam_id = mysqli_fetch_array($result, MYSQLI_BOTH);
    $exam_id = $exam_id['Id'];

    $sql1 = "SELECT sum(Score) as score FROM question_library WHERE Exam_id = '$exam_id'";
    $result1 = mysqli_fetch_array(mysqli_query($db, $sql1) ,MYSQLI_BOTH);
    $total_score = $result1['score'];

    if ($total_score+$score >= $max_score){
        echo "Maximum score reached";
    }
    else{
    
        $sql = "INSERT INTO question_library (Exam_id, Question, Option1, Option2, Option3, Option4, Score, Question_type)
            VALUES ('$exam_id','$question', '$option1', '$option2', '$option3', '$option4', '$score','$question_type')";
        $result = mysqli_query($db, $sql);
        if (!$result){
            die("Adding record is failing.");
        }
        
        echo "OK".$total_score;
    }
    mysqli_close($db);
}
?>
