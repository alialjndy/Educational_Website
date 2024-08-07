<?php
  session_start();
//   include("connectionWITH_DB/inc.php") ;
  $gender_error = $role_error = $birthday_error = $pwd_error = $user_error = $email_error = $gender_hack_error = $role_hack_error =  " ";


  if(isset($_POST["submit"] )){
    $username = stripslashes(strtolower($_POST["fname"]));
    $email = stripslashes($_POST["email"]);
    $pwd = stripslashes($_POST["pwd"]);
    if(!empty($_POST["type"])){
    $role = $_POST["type"];
    }
  }
  if(isset($_POST["birthday_day"]) && isset($_POST["birthday_month"]) && isset($_POST["birthday_year"])){
    $birthday_day = (int)$_POST["birthday_day"];
    $birthday_month = (int)$_POST["birthday_month"];
    $birthday_year = (int)$_POST["birthday_year"];
    $birthday = htmlentities(mysqli_real_escape_string($conn , $_POST["birthday_day"] ."-". $_POST["birthday_month"] ."-". $_POST["birthday_year"])) ;
  }
//   $username = htmlentities(mysqli_real_escape_string($conn,$_POST["fname"]));
//   $email = htmlentities(mysqli_real_escape_string($conn , $_POST["email"]));
//   $pwd = htmlentities(mysqli_real_escape_string($conn, $_POST["pwd"]));

  if(isset($_POST["birthday_day"])  AND isset($_POST["birthday_month"]) AND isset($_POST["birthday_year"]) ){
    $birthday_day = $_POST["birthday_day"];
    $birthday_month = $_POST["birthday_month"];
    $birthday_year = $_POST["birthday_year"];
  }

  if(!empty($_POST["type"])){
    $role = $_POST["type"];
    $err_sum = 0 ;
  }
  else{
    $role = "";
  }
  if(!empty($_POST["fname"])){
    $username = $_POST["fname"];
    $err_sum = 0 ;
  }
  if(!empty($_POST["email"])){
    $email = $_POST["email"];
    $err_sum = 0 ;
  }
  if(!empty($_POST["pwd"])){
    $pwd = $_POST["pwd"];
    $err_sum = 0 ;
  }
  if(!in_array($role,["student" , "teacher" , "ty"])){
    $role_hack_error = "<span id = hack>Please Insert a valid value</span>";
    $err_sum = 1;
  }

  if(empty($birthday_day) || empty($birthday_month) || empty($birthday_year)){
    $birthday_error = "<span id = error>Birthday Is Not Correct</span>";
    $err_sum =1 ;
  }
  if(empty($_POST["Gender"])){
    $gender_error = "<span id = error >Please Select Your Gender</span>";
    $err_sum = 1;
  }
  if(empty($_POST["type"])){
    $role_error = "<span id = error >Please Select Your Role</span>";
    $err_sum = 1 ;
  }
  if(strlen($username) == 0){
    $user_error = "<span id = error>please inter a valid name</span>";
    $err_sum = 1;
  }
  else if(strlen($username)<6){
    $user_error = "<span id = error>Please Inter A Valid Name</span>";
    $err_sum = 1;
  }
  if(empty($_POST["email"])){
    $email_error = "<span id = error>Please Inter A Valid Email</span>";
    $err_sum = 1 ;
  }
  if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    $email_error = "<span id = error>Invalid Email Format</span>";
    $err_sum = 1;
  }
  if(strlen($pwd)<6){
    $pwd_error = "<span id = error>Please Inter A Valid Password</P>";
    $err_sum = 1;
  }
  else if(empty($_POST["pwd"])){
    $pwd_error = "<span id = error>Your Password Is Empty</P>";
    $err_sum = 1;
  }

  if(!empty($_POST["fname"]) and !empty($_POST["email"]) and !empty($_POST["pwd"]) and !empty($_POST["birthday_day"]) and !empty($_POST["birthday_month"]) and !empty($_POST["birthday_year"]) and !empty($_POST["type"])){
    include('main.php') ;
    $sql = "INSERT INTO user_logins (UserName , Email , Password , Role , Birthday , Specialist) VALUES ('$username' , '$email' , '$pwd' , '$role' , '$birthday' , 'IT' )";
    // $result = mysqli_query($conn , $sql) ;
  }

  else {
    include('registerme') ;

  }
?>
