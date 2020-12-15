<?php
// session_start();

$db = mysqli_connect('localhost','root','','exams');

$domdoc = new domDocument();
$dochtml->loadHTML('index2.php');

$sql1 = """SELECT e1.Name , e1.Course , e1.Semester , e1.Year , e2.time , e2.date
FROM exam_details as e1
INNER JOIN exam_timing as e2
ON e1.Id = e2.exam_id""";

$query = mysqli_query($db, $sql1);
$result1 = mysqli_fetch_array($query ,MYSQLI_BOTH);