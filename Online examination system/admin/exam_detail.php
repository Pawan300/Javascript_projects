<?php
session_start();

$errors = array(); 
$db = mysqli_connect('localhost','root','','exams');

if(isset($_POST['Create_test'])) {
    $examname = mysqli_real_escape_string($db ,$_POST['exam']);
    $time = date('H:i:s', strtotime(mysqli_real_escape_string($db ,$_POST['time'])));

    // SELECT DATE_FORMAT(mytime, '%l:%i %p') FROM mytable
    // if we want to retrive it in future.

    $date = mysqli_real_escape_string($db ,$_POST['date']);
    $timeduration = mysqli_real_escape_string($db ,$_POST['time_duration']);
    $maxscore = mysqli_real_escape_string($db ,$_POST['max_Score']);
    $course = mysqli_real_escape_string($db ,$_POST['course']);
    $semester = mysqli_real_escape_string($db ,$_POST['semester']);
    $year = mysqli_real_escape_string($db ,$_POST['year']);


    if(empty($examname)){
        array_push($errors, "Exam Name is required");
    }
    if(empty($course)){
        array_push($errors, "Course is required");
    }
    if(empty($year)){
        array_push($errors, "Year is required");
    }
    if(empty($semester)){
        array_push($errors, "Semester is required");
    }
    if(empty($time)){
        array_push($errors, "Time is required");
    }
    if(empty($date)){
        array_push($errors, "Date is required");
    }
    if(empty($timeduration)){
        array_push($errors, "Time Duration is required");
    }
    if(empty($maxscore)){
        array_push($errors, "Max Score is required");
    }

    if (count($errors)==0) {
        
        $_SESSION['examname'] = $examname;
        $_SESSION['Time_duration'] = $timeduration;
        $_SESSION['Max_score'] = $maxscore;
        $_SESSION['Date'] =$date;
        $_SESSION['Time'] = $time;
        $_SESSION['Semester'] = $semester;
        $_SESSION['Year'] = $year;
        $_SESSION['Course'] =$course;

        $id = "SELECT Id from exam_details WHERE Name='$examname' and Course='$course' and Semester='$semester' and Year='$year'";
        $ids = mysqli_fetch_array(mysqli_query($db, $id), MYSQLI_BOTH);
        $exam_id = $ids['Id'];

        $flag = TRUE;

        if (sizeof($exam_id)>0){

            $checking = "SELECT * FROM exam_timing WHERE exam_id= '$exam_id' AND 
                                                          Date='$date' AND 
                                                          Time='$time'";
            $result = mysqli_query($db, $checking);
            $count = mysqli_num_rows($result);

            if ($count > 0){
                echo "<script> alert(\"Sorry! This time slot is booked!\");</script>";
                mysqli_close($db);
                $flag = FALSE;
            }
        }
        if ($flag == TRUE){
            $sql1 = "INSERT INTO exam_details (Name, Course, Semester, Year)
            VALUES ('$examname', '$course', '$semester', '$year')";

            $result1 = mysqli_query($db, $sql1);

            $id = "SELECT Id from exam_details WHERE Name='$examname' and Course='$course' and Semester='$semester' and Year='$year'";
            $ids = mysqli_fetch_array(mysqli_query($db, $id), MYSQLI_BOTH);
            $id = $ids['Id'];

            $sql2 = "INSERT INTO exam_timing (exam_id, date, time ,timeduration, max_score)
            VALUES ('$id', '$date', '$time', '$timeduration', '$maxscore')";

            $result2 = mysqli_query($db, $sql2);
                        
            if (!$result1 or !$result2){
                die("Exam details is not saved.");
            }

            mysqli_close($db);
            header('location: addques.php');
         }
    }
}
?>