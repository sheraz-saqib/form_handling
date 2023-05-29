<?php

$conn = mysqli_connect('localhost','root','','crud_operation');

error_reporting(0);
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$submit = $_POST['submit'];
$notification = false;
if(isset($submit)){
if($name != '' && $contact != '' && $email != '' && $pass != ''){
    $insertQuery = "INSERT INTO `user`( `name`, `contact`, `email`, `password`) VALUES ('$name','$contact','$email','$pass')";
    $result = mysqli_query($conn,$insertQuery);
    if($result){
        $notification = true;
    }
}}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register form</title>
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- notification -->
    <?php
    if(!$conn){
        echo "<div class='notification'>
        <div class='message danger'>
          <h2>connection failed!</h2>
          <p>Your connection problem please try again.</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }
    if($notification){
        echo "<div class='notification'>
        <div class='message success'>
          <h2>success!</h2>
          <p>Your data has submitted</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }if(!$notification){
        echo "<div class='notification'>
        <div class='message danger'>
          <h2>failed!</h2>
          <p>Your data has not submitted</p>
        </div>
        <div class='cross_icon'>
          <i class='fa-solid fa-xmark'></i>
        </div>
      </div>";
    }
    ?>
    <!-- notification -->
    <div class="container">
      <header>
        <h2><span>Regis</span>teration <span>Fo</span>rm</h2>
      </header>
      <form action="index.php" method="POST" class="form" id="form">
        <!-- row -->
        <div class="row">
          <div class="row_left">
            <h3>first name</h3>
            <input type="text" id="name" name="name" placeholder="first name" />
          </div>
          <div class="row_right">
            <h3>contact</h3>
            <input
              type="number"
              name="contact"
              id="contact"
              placeholder="contact"
            />
          </div>
        </div>
        <!-- row -->
        <!-- row -->
        <div class="row">
          <div class="row_left">
            <h3>email</h3>
            <input type="email" name="email" id="email" placeholder="email" />
          </div>
          <div class="row_right password_field">
            <h3>password</h3>
            <input
              type="password"
              name="pass"
              id="pass"
              placeholder="password"
            />
            <i class="fa-solid fa-eye-slash eye_slash_hide"></i>
            <i id="eye_icon" class="fa-solid fa-eye"></i>
          </div>
        </div>
        <!-- row -->

        <!-- row -->
        <div class="btn">
          <button type="submit" id="submit" name="submit" class="Submit_btn">
            submit <i class="fa-solid fa-check"></i>
          </button>
        </div>
      </form>
    </div>

    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->
  </body>
  <script src="app.js"></script>
</html>
