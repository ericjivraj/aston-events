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
        <li><a href="yourevents.php" class="active"><span>Your Events</span></a></li>
        <li><a href="create.php"><span>Create Events</span></a></li>
        <li><a href="accsettings.php"><span>Account Settings</span></a></li>
        <li><a href="logout.php"><span>Log Out</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="join-up-message" class="jumbotron">
          <div class="container">
            <h2>You can now Create your own Events!</h2>
          </div>
        </section>
        <?php
  if (isset ($_REQUEST['update'])) {
  $eventid=$_POST['event_id'];
  $sql = "UPDATE event SET event_name='".$_REQUEST['event_name']."', place='".$_REQUEST['location']."'
  , date='".$_REQUEST['date']."'
  , time='".$_REQUEST['time']."' , description='".$_REQUEST['description']."' WHERE event_id=".$eventid;
  $check=mysqli_query($connect, $sql);

  echo ('<h2>Updated Successfully!</h2> <br>');

  echo ('<h2>- Go Back to the<a href="updatevents.php"> Previous Page</a>.</h2> </p>');
  }
  ?>
  <p> <p>

    </main>

  </body>
  </html>
