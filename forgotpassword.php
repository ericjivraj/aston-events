<!DOCTYPE html>
<?php
include("dbconnect.php");
require 'phpmailer/PHPMailerAutoload.php';
?>

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

      <h2>Forgot Password</h2>
  <?php

 //After receiving the email, this is the form you get
  if(isset($_GET['code'])) { // If you click on the email link
    $get_username = $_GET['username']; // Get username
    $get_code = $_GET['code']; // Get code
    $query = mysqli_query ($connect, "SELECT * FROM organiser WHERE username LIKE '$get_username'"); // Query à BD <- ERRO
    while($row = mysqli_fetch_assoc($query)) { // While its reading the db fields
      $db_code = $row['passreset'];
      $db_username = $row['username']; // Check if username matches the db one
    }
    if($get_username == $db_username && $get_code == $db_code) { // This form appears if the user has already clicked in their email link
      echo '
        <form action="pass_reset_complete.php?code=$get_code" method="POST" align="Center">
        <h2>- '.$db_username.', Fill in the fields above to reset your <span>Password</span>:</h2>
        <h2><input type="password" name="newpass" placeholder="New Password"></h2>
        <h2><input type="password" name="newpass1" placeholder="Type in again your new Password"></h2>
        <input type="hidden" name="username" value="'.$db_username.'";><p>
        <h2><input type="submit" value="Save Password!"></h2> </form> ';
    }
  }

/* Main form */
if(isset($_GET['code']) == 0) {
  echo ' <form action="forgotpassword.php" method="post" align="Center">
  <h2>- Insert your Username and Password to reset your <span><br>Password</span>:</h2> <h3> ● You will be emailed further instructions on how to reset. </h3>
  <h2><input type="text" name="username" value="" placeholder="Username" ><p></h2>
  <h2><input type="text" name="email" placeholder="Email" ><br></h2>
  <br /><input type="button" name="submit" value="Submit"></form> ';
  if(isset($_POST['submit'])) { // If you click the button
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $query = mysqli_query ($connect, "SELECT * FROM organiser WHERE username = '$username'");
    $numrow = mysqli_num_rows($query);
    if($numrow!=0) {
      while($row = mysqli_fetch_assoc($query)) {
        $db_email = $row ['email'];
      }
      if ($email == $db_email) { // If the email typed in matches the db one
        $code = rand(10000,1000000);
        $to = $db_email;
        $subject = "Reset Password";
        $headers = 'From: jivrajae@aston.ac.uk';
        $body = "
        This is an automatic email
        Click the following link to reset your password:
        http://localhost/astonevents/forgotpassword.php?code=$code&username=$username
        ";
        mysqli_query($connect, "UPDATE organiser SET passreset='$code' WHERE username='$username'");
        //$fp = stream_socket_client("ssl://smtp.gmail.com", $errno, $errstr, 30);
        //stream_socket_enable_crypto( $fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT );

        /*$mail = new PHPMailer();  // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send()) {
          $error = 'Mail error: '.$mail->ErrorInfo;
          return false;
          } else {
            $error = 'Message sent!';
            return true;
          }*/

        // ini_set("SMTP","smtp.gmail.com");
         //ini_set("smtp_port","465");
      $success= mail($to,$subject,$body,$headers);
      if($success){
        echo "Mail was sent";
      }else{
        echo "Not sent";
      }

        /*$mail = new PHPMailer;

                   $mail->SMTPDebug = 3;                               // Enable verbose debug output

                   //$mail->isSMTP();                                      // Set mailer to use SMTP
                   $mail->Host = 'smtp.aston.ac.uk';  // Specify main and backup SMTP servers
                  // $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  // $mail->Username = 'ericjivraj@gmail.com';                 // SMTP username
                   //$mail->Password = 'ibwKo1hUfuakoRDnOjG';                           // SMTP password
                   //$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                   //$mail->Port = 465;                                    // TCP port to connect to

                   $mail->setFrom('jivrajae@aston.ac.uk', 'Mailer');
                   $mail->addAddress($db_email);     // Add a recipient
                   //$mail->addAddress('ellen@example.com');               // Name is optional
                   $mail->addReplyTo('ericjivraj@gmail.com', 'Information');
                   // Set email format to HTML
                   //construct email subject and body
                   $mail->Subject = 'Forgotten Password';
                   $mail->Body = 'Dear Eric';
                   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                   //send email if cannot be sent throw an error
                   if (!$mail->send()) {
                       echo 'Message could not be sent.';
                       echo 'Mailer Error: ' . $mail->ErrorInfo;
                       echo 'Not sent: <pre>'.print_r(error_get_last(), true).'</pre>';
                   } else {
                       //otherwise complete the order
                       echo 'Message waas sent.';
                   }
*/
                   }

         // Função de mail('destinatário',assunto',mensagem','remetente');
        // echo "<h3>- An Email has been sent to your email. Please check and follow its' instructions.</h3>"; // Mensagem de Sucesso
  //     } else { // Se não:
  //       echo '<br><h3>- The email you have typed in is not valid, please try again!.</h3>'; // Mensagem de Erro
  //     }
  //   } else { // Se não:
  //     echo '<br><h3>- Please fill in the fields with valid values.</h3>'; // Mensagem de Erro
  }
   }
 }
  ?>

    </main>

  </body>
  </html>
