<?php
session_start();

// include('question_connectivity.php');

$examname = $_SESSION['examname'];
$timeduration=$_SESSION['Time_duration'];
$maxscore=$_SESSION['Max_score'];
$semester = $_SESSION['Semester'];
$time = $_SESSION['Time'];
$date = $_SESSION['Date'];
$course = $_SESSION['Course'];
$year = $_SESSION['Year'];


?>

<html>
    <head>
        <title>Question Type</title>
        <link rel="stylesheet" type="text/css"  href="ques_style.css">
</head>
<body>

    <div style="overflow: hidden;" class="header">
        <h2 id="exam_name" style="text-transform: uppercase;"><?php echo $examname;?></h2>
        <p style="float: left;">Time:<?php echo $timeduration;?></p>
        <p id="Max_score" style="float: right;">Max score:<?php echo $maxscore;?></p>
      
    </div>

    
    <button id="mcq" class="ques" onclick="add_mcq_questions()">OBJECTIVE </button>
    <button id="subjective" class="ques" onclick="add_subjective_questions()">SUBJECTIVE</button>
    <input type="text" id="semester" value=<?php echo $semester;?> style="display:none;">
    <input type="text" id="date" value=<?php echo $date;?> style="display:none;">
    <input type="text" id="time" value=<?php echo $time;?> style="display:none;">
    <input type="text" id="Year" value=<?php echo $year;?> style="display:none;">
    <input type="text" id="Course" value=<?php echo $course;?> style="display:none;">
    <div id="question_container">    
  
    </div>
    
    <script type="text/javascript" src="add_questions.js"></script>
    

</body>
</html>