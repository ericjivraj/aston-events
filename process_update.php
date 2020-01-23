<?php
include("session.php");
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
        <tr> <width = "600px"> <h2>Update </h2></tr>
    <Fieldset Align="Center"><form method="POST" action="process_update2.php">
    <tr> <td width="100px" align="left"><h3>Event ID: </h3><?php $eventid=$_GET['event_id']; echo $eventid;?></td> </tr>
    <tr> <p> <td width="200px" align="left"><h3>Event Name: </h3><input type="text" name="event_name" value="<?php $eventname=$_GET['event_name']; echo $eventname; ?>"></td> </tr>
    <tr> <p> <td width="300px" align="left"><h3>Location: </h3><input type="text" name="location" value="<?php $location=$_GET['place']; echo $location; ?>"></td>
    <tr> <p> <td width="300px" align="left"><h3>Date: </h3><input type="date" name="date" value="<?php $date=$_GET['date']; echo $date; ?>"></td>
    <tr> <p> <td width="300px" align="left"><h3>Time: </h3><input type="time" name="time" value="<?php $time=$_GET['time']; echo $time; ?>"></td>
    <tr> <p> <td width="300px" align="left"><h3>Description: </h3><input type="text" name="description" value="<?php $description=$_GET['description']; echo $description; ?>"></td>
    </tr>
    <tr></tr>
    <tr><td>
    <p> <br> <input type="submit" name="update" value="Update">
    <input type="hidden" name="event_id" value="<?php echo $eventid; ?> ">
        <h3>Go back to the <a href="yourevents.php">Previous Page</a></h3>

    </main>

  </body>
  </html>
