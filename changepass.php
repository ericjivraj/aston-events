<?php
include("session.php");
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
      <h1><a href="index0.php"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
        <li><a href="index0.php"><span>Home</span></a></li>
        <li><a href="yourevents.php"><span>Your Events</span></a></li>
        <li><a href="create.php"><span>Create Events</span></a></li>
        <li><a href="accsettings.php" class="active"><span>Account Settings</span></a></li>
        <li><a href="logout.php"><span>Log Out</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="join-up-message" class="jumbotron">
          <div class="container">
            <h2>You can now Create your own Events!</h2>
          </div>
        </section>
        <h2>Change Pasword: </h2> <br>

		 <form id="form_password" name="form_password" method="POST" action="changepass.php" Align="Left"><br>
			 Current Password: <p> </p>
			 <input type="password" name="currentpass"> <p> </p>
			 New Password: <p> </p>
			 <input type="password" name="newpassword"> <p> </p>
			 Confirm New Password: <p> </p>
			 <input type="password" name="newconfirmpassword"> <p> </p>
             <input type="submit" name="change_pass" id="change_pass" value="Change Password" />
             <br> <p> </p>

</form>
<?php
				if(isset($_POST['change_pass'])) {
				$username = $_SESSION['username'];
				$currentpass = SHA1($_POST['currentpass']);
				$newpassword = $_POST['newpassword'];
				$newconfirmpassword = $_POST['newconfirmpassword'];
				$query = mysqli_query ($connect, "SELECT password FROM organiser WHERE username LIKE '$username'");
				while($row = mysqli_fetch_assoc($query)) {
				$db_password = $row['password'];
				}
				if($currentpass == $db_password) {
					if($newpassword == $newconfirmpassword) {
						if(strlen($_POST['newpassword'])>=6) {
							$enc_pass = SHA1($newpassword);
							mysqli_query ($connect, "UPDATE organiser SET password = '$enc_pass' WHERE username LIKE '$username'");
							echo '<h2>- Your Password has been successfully changed</h2>';
							header ("refresh:3;url=changepass.php");
						} else {
							echo '<h4>Your Password cannot be smaller than 6 characters. Please try again.</h4>';
						}
					} else {
						echo '<h4>Your Password doesnt match in both fields!</h4>';
					}
				} else {
					echo '<h4>Your Current Password doesnt match our records!</h4>';
					}
				}
			   ?>
			   <h3>Go Back to the <a href='accsettings.php'>Previous Page</a> </h3>

    </main>

  </body>
  </html>
