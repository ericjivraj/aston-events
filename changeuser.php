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
        <h2>Change Username: </h2> <br>
        		 <form id="form_user" name="form_user" method="POST" action="changeuser.php" align="Left"><img src="images/users.png" style="float:right;"> <br>
        			 Current Username: <p> </p>
        			 <input type="text" name="user"> <p> </p>
        			 New Username: <p> </p>
        			 <input type="text" name="username2"> <p> </p>
        			 Confirm New Username: <p> </p>
        			 <input type="text" name="new_username"> <p> </p>
                     <input type="submit" name="change_user" id="change_user" value="Change Username" />
                     <br> <p> </p>

        <?php
        				if(isset($_POST['change_user'])) {
        				$username = $_SESSION['username'];
        				$username2 = $_POST['username2'];
        				$newusername = $_POST['new_username'];
        				$sql=null;
        				$result = mysqli_query($connect, "SELECT username FROM organiser WHERE username like '$username'");
        				if(!$result)
        				{
        				echo "No records were found!<p>";
        				}
        				else if($newusername != mysqli_fetch_assoc($result)) {
        				echo "<h3>Change from [ $username ] to [ $username2 ]: </h3><p>";
        				}
        				if($username2==$newusername) {
        				$sql=mysqli_query($connect, "UPDATE organiser SET username = '$username2' WHERE username like '$username'");
        				}
        					if($sql) {
        								echo "<h2>You now have a new Username!</h2>Try and Login again with your new Username.<p><br>";
        								header ("refresh:6;url=changeuser.php");
        					} else {
        							echo "Error: Couldn't change your username.<br> Check if all the fields have been filled in correctly!.<p>";
        					 }
        				}
        				?>
        				<h3>Go Back to the <a href='accsettings.php'>Previous Page</a> </h3>
    </main>

  </body>
  </html>
