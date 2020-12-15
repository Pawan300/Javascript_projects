<?php include('database.php'); ?>
<html>
    <head>
        <title>Registration system</title>
        <link rel="stylesheet" href="Astyle.css">
    </head>
<body>
    <div class="header">
        <h2>Admin Login</h2>
    </div>

    <form method="post" action="Alogin.php">
    <?php include('error.php'); ?>
  
    <div class="input-group">
    <label>Username</label>
    <input type="text" name="username">   
    </div>
    <div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1">  
    </div>
    <div class="input-group">
    <button type="submit" name="login" class="btn" >login</button>
    </div>
    <p>
    Not yet a member?<a href="Aregister.php">sign in</a>
    </p>
    </form>


</body>
</html>
