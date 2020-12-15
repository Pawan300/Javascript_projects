<?php

    session_start();

    if(!isset($_SESSION['username'])){ 
        header("Location: login.php"); 
    }
    // Load the db connect function to pass the link var
    $link = mysqli_connect('localhost','root','','registration');
    
    if(isset($_SESSION['username']))
    {
        session_unset();

        // destroy the session
        session_destroy();
        header('location: login.php');
    }

?>
