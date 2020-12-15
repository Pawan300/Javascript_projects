<?php include('exam_detail.php'); ?>
<!doctype html>
<html>
    <head>
        <title>schedule</title>
        <link rel="stylesheet" type="text/css"  href="qstyle.css">
    </head>
<body>
    <div class="header">
        <h2 style= "text-transform: uppercase;"> schedule</h2>
    </div>

    <form method="post" action="schedule.php">
        
        <?php include('error.php'); ?>
        <div class="input-group">
            <label>Exam name</label>
            <input type="text" name="exam" value="">
            
            <label>Course</label>
            <input type="text" name="course" value="">
            
            <label>Year</label>
            <input type="text" name="year" value="">
            
            <label>Semester</label>
            <input type="text" name="semester" value="">
            
            <label>Time (24 hr format)</label>
            <input type="time" name="time" value="">   
            
            <label>Date</label>
            <input type="date" name="date">  
            
            
            <label>Time duration</label>
            <input type="text" name="time_duration" value="">

            <label>Max score</label>
            <input type="text" name="max_Score" value="">

            <button type="submit" name="Create_test" class="btn">Create test</button> 
        </div> 
    </form>


</body>
</html>