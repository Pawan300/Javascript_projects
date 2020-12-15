<?php
session_start();

$username = "";
$email = "";
$errors = array(); 


$db = mysqli_connect('localhost','root','','registration');

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db ,$_POST['username']);
    $firstname = mysqli_real_escape_string($db ,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($db ,$_POST['lastname']);
    $dob = mysqli_real_escape_string($db ,$_POST['DOB']);
    $email = mysqli_real_escape_string($db ,$_POST['email']);
    $password_1 = mysqli_real_escape_string($db ,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db ,$_POST['password_2']);
    $semester = mysqli_real_escape_string($db ,$_POST['semester']);
    $course = mysqli_real_escape_string($db ,$_POST['course']);
    $enrollment = mysqli_real_escape_string($db ,$_POST['enrollment']);
    $year = mysqli_real_escape_string($db ,$_POST['year']);


    if(empty($username)){
        array_push($errors, "Username is required");
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
    if(empty($enrollment)){
        array_push($errors, "Enrollment is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    if(empty($firstname)){
        array_push($errors, "First name is required");
    }
    if(empty($dob)){
        array_push($errors, "DOB is required");
    }

    ## Password validation 
    function password_verification($password){
        $error_message = "";
        if (strlen($password) < 8) {
            $error_message .= "Password must be of 8 digit.";
        }

        $flag = FALSE;
        for ($x = 0 ; $x <strlen($password); $x++){
            if (ctype_upper($password[$x])){
                $flag = TRUE;
                break;
            }
        }

        if (!$flag){
            $error_message .= "Password should contain a capital letter alphabet.";
        }

        return $error_message;
    }
    $error_message = password_verification($password_1);
    if (strlen($error_message)>0){
        array_push($errors, $error_message);
    }
    else{
        if($password_1 !=$password_2) {
            array_push($errors, "Password does not match");
        }
    }


    ## Email validation
    function checkemail($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    if(!checkemail($email)){
        array_push($errors, "Invalid Email. Valid email should be example@example.com");
    }
    
    if (count($errors)==0) {
        $password=md5($password_1);
       
        $sql_username_matching = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($db, $sql_username_matching);
        $count = mysqli_num_rows($result);
        if ($count > 0){
            array_push($errors, "Sorry! This Username already exists!");
            mysqli_close($db);
        }
        else{
            
            $sql = "INSERT INTO users (username, email, password, Firstname, Lastname, DOB, Year, Semester,
            Course, Enrollment) VALUES ('$username', '$email', '$password', '$firstname', '$lastname',
             '$dob', '$year','$semester','$course','$enrollment')";
            $result = mysqli_query($db, $sql);
            if (!$result){
                die("Adding record is failing.");
            }
            mysqli_close($db);
            header('location: login.php');
        }

       
    }
}
if (isset($_POST['login'])){
    
    $username = mysqli_real_escape_string($db ,$_POST['username']);
    $password = mysqli_real_escape_string($db ,$_POST['password_1']);

    if(empty($username)){
        array_push($errors, "username is required");
    }
    if(empty($password)){
        array_push($errors, "password is required");
    }
    if (count($errors)==0) {
        $password=md5($password);
        $query= "select * FROM  users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$query);
        if(mysqli_num_rows($result)==1){

            $_SESSION['username'] = $username;
            header('location: index.php');
        }
        else{
            array_push($errors,"Username/Password doesn't match");
            header('location: login.php');           
        }
    }
}
?>