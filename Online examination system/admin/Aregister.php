<?php include('database.php'); ?>
<!doctype html>
<html>
    <head>
        <title>Registration system</title>
        <link rel="stylesheet" type="text/css"  href="Astyle.css">
    </head>
<body>
    <div class="header">
        <h2> Admin Register</h2>
    </div>

    <form method="post" action="Aregister.php">
    <?php include('error.php'); ?>

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
    <label>D.O.B.</label>
    <input type="date" name="DOB">   
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
    Already a member?<a href="Alogin.php">sign in</a>
    </p>
    </form>


</body>
</html>
