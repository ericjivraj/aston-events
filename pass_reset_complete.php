<?php
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aston Events</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
  </head>
  <body>
    <div class="logo"> <!-- Logo Start -->
      <h1><a href="index.html"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
        <li><a href="index.html"><span>Home</span></a></li>
        <li><a href="events.html"><span>Events</span></a></li>
        <li><a href="register.php"><span>Register</span></a></li>
        <li><a href="login.php" class="active"><span>Login</span></a></li>
        <li><a href="contact.html"><span>Contact</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
      <section id="events-message" class="jumbotron">
        <div class="container">
          <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
        </div>
      </section>

      <h2>Reset <span>Password</span><input type="image" src="icons/Info.png"></h2><br><p>
  <Fieldset align="center">
  <?php
  $newpass = $_POST['newpass'];
  $newpass1 = $_POST['newpass1'];
  $post_username = $_POST['username'];
  $code = $_GET['code'];
  if($newpass == $newpass1) { // If new password matches in both fields:
  if(strlen($_POST['newpass'])>=6) { // Validate characters minimum length of 6
  $enc_pass = SHA1($newpass); // Encripta a Nova Passowrd
  mysqli_query ($connect, "UPDATE organiser SET password = '$enc_pass' WHERE username LIKE '$post_username'");
  mysqli_query ($connect, "UPDATE organiser SET passreset = '0' WHERE username LIKE '$post_username'");
  echo '<h2>- Your password has been successfully reset!<p><a href="login.php">Click here</a> to Login</h2>';
  } else {
  echo '<h3>Your password cannot be less than 6 characters. Please <a href="forgotpassword.php?code=$code&username=$post_username">Try again</a>.</h3>';
  }
  } else { 
  echo '<h3>Your password fields dont match in both fields. Please <a href="forgotpassword.php?code=$code&username=$post_username">Try again</a>.</h3>';
  }
  ?>
  </Fieldset>
  </div>
  <h2>-<a href="login.php"> Login </a> </h2>
    </main>

  </body>
  </html>
