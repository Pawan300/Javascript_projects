<html>
<head>
<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
</head>


<body>
  <!-- style="background-image: url('assi4.jpg');"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Admin side</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="schedule.php">Schedule</a>
              </li>

              <li class="nav-item active">
                <a id="ongoing" class="nav-link" href="" onclick="change_table(this)">Ongoing Exam</a>
              </li>

              <li class="nav-item active">
                <a id="upcoming" class="nav-link" href="" onclick="change_table(this)">Upcoming Exam</a>
              </li>

              <li class="nav-item active">
                <a id="completed" class="nav-link" href="" onclick="change_table(this)">Completed Exam</a>
              </li>

              <li class="nav-item">
                <a class="nav-link logout" href="Alogin.php">logout</a>
              </li>
        </ul> 
      </div>
  </nav>  

 
<div id ="exams_container">
  <script>
    function change_table(jadoo) {
      
      t1 = document.getElementById("exams_record");
      t2 = document.getElementById("exams_record1");
      t3 = document.getElementById("exams_record2");

      if(jadoo.id == "ongoing"){

       
        t1.style.display = 'block';
        t2.style.display = 'none';
        t3.style.display = 'none';
      }
      else if(jadoo.id == "upcoming"){
        t1.style.display = 'none';
        t2.style.display = 'block';
        t3.style.display = 'none';
      }
      else{
        t1.style.display = 'none';
        t2.style.display = 'none';
        t3.style.display = 'block';
      }
    }
  </script>
  <table id="exams_record">
      <colgroup>
          <col span="1" style="width: 80%;">
          <col span="6" style="width: 10%;">
      </colgroup>
      <tr>
        <th>Today's Exam</th>
        <th>Course</th>
        <th>Timing</th>
        <th>Date</th>
        <th>Year</th>
        <th>Semster</th>
        <th>Preview</th>
      </tr>
      
      <!-- <td><button id="Preview">Preview</button></td> -->
      
    </table>
  <table id="exams_record1">
      <colgroup>
          <col span="1" style="width: 80%;">
          <col span="6" style="width: 10%;">
      </colgroup>
      <tr>
      <th>Upcoming Exam</th>
        <th>Course</th> 
        <th>Timing</th>
        <th>Date</th>
        <th>Year</th>
        <th>Semster</th>
        <th>Preview</th>
      </tr>
     
    </table>

  <table id="exams_record2">
      <colgroup>
          <col span="1" style="width: 80%;">
          <col span="6" style="width: 10%;">
      </colgroup>
      <tr>
      <th>Completed Exam</th>
        <th>Course</th>
        <th>Timing</th>
        <th>Date</th>
        <th>Year</th>
        <th>Semster</th>
        <th>Preview</th>
      </tr>
      
    </table>
</div>

</body>
</html>
