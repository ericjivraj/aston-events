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
      <h1><a href="index1.php"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
        <li><a href="index1.php"><span>Home</span></a></li>
        <li><a href="view.php"><span>View</span></a></li>
        <li><a href="change.php"><span>Change</span></a></li>
        <li><a href="remove.php" class="active"><span>Remove</span></a></li>
        <li><a href="logout.php"><span>Log Out</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="join-up-message" class="jumbotron">
          <div class="container">
            <h2>You are an Admin, Welcome!</h2>
          </div>
        </section>
        <h2> Remove Organiser </h2>
        <form name="form3" method="POST" action="remove_organisers.php">
        Type in the Organiser's Username:
        <input type="text" name="org_name">
        <input type="submit" name="remove" value="Remove"> <p> </p>
        <br> <br> <br> <br> <br>
        </form>
        <?php
        					if(isset($_POST['remove'])) {
        					$orgname = $_POST['org_name'];
        					if(!$orgname)
        					{ echo 'Type in the name again. '; exit;}
        					echo '<h3>Organiser to be Removed: </h3>- '.$orgname. '<p>';
        					$result=mysqli_query($connect, "SELECT * FROM organiser");
        					$nr_before = mysqli_num_rows($result);
        					$remove = "DELETE FROM organiser WHERE username = '".$orgname."'";
        					mysqli_query($connect, $remove);
        					$result=mysqli_query($connect, "SELECT * FROM organiser");
        					$nr_after=mysqli_num_rows($result);
        					$removed = $nr_before - $nr_after;
        					echo '<h3>Nº Organisers Removed: </h3>- ' .$removed;
        					}
        				?>
        <h3>Go Back to the <a href="remove.php"> Previous Page</a></h3>

    </main>

  </body>
  </html>
