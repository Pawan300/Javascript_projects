<?php include('server.php'); ?>
<!doctype html>
<html>
    <head>
        <title>Registration system</title>
        <link rel="stylesheet" type="text/css"  href="style.css">
    </head>
<body>
    <div class="header">
        <h2> Student Register</h2>
    </div>

    <form method="post" action="register.php">
    <?php include('errors.php'); ?>

    <div class="input-group">
    <label>First Name</label>
    <input type="text" name="firstname">   
    </div>

    <div class="input-group">
    <label>Last Name</label>
    <input type="text" name="lastname">   
    </div>
  
    <div class="input-group">
    <label>Username</label>
    <input type="text" name="username">   
    </div>

    <div class="input-group">
    <label>Email</label>
    <input type="text" name="email">   
    </div>

    <div class="input-group">
    <label>D.O.B</label>
    <input type="Date" name="DOB">   
    </div>
    
    <div class="input-group">
    <label>Year</label>
    <input type="text" name="year">   
    </div>

    <div class="input-group">
    <label>Course</label>
    <input type="text" name="course">   
    </div>

    <div class="input-group">
    <label>Semester</label>
    <input type="text" name="semester">   
    </div>

    <div class="input-group">
    <label>Enrollment</label>
    <input type="text" name="enrollment">   
    </div>

    <div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1">  
    </div>

    <div class="input-group">
    <label>Confirm Password</label>
    <input type="password" name="password_2"> 
    </div>

    <div class="input-group">
    <button type="submit" name="register" class="btn">Register</button> 
    </div>

    <p>
    Already a member?<a href="login.php">sign in</a>
    </p>
    </form>

</body>
</html>
