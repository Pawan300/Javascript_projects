<?php 

session_start();
$db = mysqli_connect('localhost','root','','exams');

$question = mysqli_real_escape_string($db ,$_POST['question']);
$score = mysqli_real_escape_string($db ,$_POST['score']);
$question_type = mysqli_real_escape_string($db ,$_POST['question_type']);
$time = mysqli_real_escape_string($db ,$_POST['time']);
$date = mysqli_real_escape_string($db ,$_POST['date']);
$semester = mysqli_real_escape_string($db ,$_POST['semester']);
$examname = mysqli_real_escape_string($db ,$_POST['exam_name']);
$course = mysqli_real_escape_string($db ,$_POST['Course']);
$year = mysqli_real_escape_string($db ,$_POST['Year']);
$max_score = (int)explode(":",mysqli_real_escape_string($db, $_POST['max_score']))[1];

if (is_numeric($score)){

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
        $query = mysqli_query($db, $sql1);
        if (mysqli_num_rows($query) == 0){
            $total_score = 0;
        }
        else{
            $result1 = mysqli_fetch_array($query ,MYSQLI_BOTH);
            $total_score = $result1['score'];
        }
        if ((int)($total_score+$score) > $max_score){
            echo "Maximum score reached";
        }
        else{

        $sql = "INSERT INTO question_library (Exam_id, Score, Question, Question_type)
                VALUES ('$exam_id','$score' ,'$question', '$question_type')";
        $result = mysqli_query($db, $sql);
        if (!$result){
            die("Adding record is failing.");
        }

        echo "OK".($total_score+$score);
        }
        mysqli_close($db);
    }

}
else{
    echo "Marks should only contain numbers";
}
?>
