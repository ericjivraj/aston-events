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
        <h3>Update Events</h3>

        <form id="form_event" name="form_event" method="POST" action="process_update.php" Align="Left"> </form>
          <?php
					$userid = $_SESSION['org_id'];

					$sql="SELECT * FROM event WHERE org_id LIKE '$userid'";
          $check=mysqli_query($connect, $sql);
          if($check) {
          echo ('<table height="65" width="600px" align="Left" >');
          echo('<tr><width="600px"><h3>Select the Event you intend to Update</h3></tr><br />');
          echo('<tr>  <td valign="middle" width="100px" align="center"><b></n>Event ID</b></td>
                <td valign="middle" width="200px" align="center"><b>Event Name</b></td>
                <td valign="middle" width="300px" align="center"><b>Location</b></td>
          </tr><p>');

          while ($show=mysqli_fetch_array($check)) {
            $eventid=$show["event_id"];
            $eventname=$show["event_name"];
            $location=$show["place"];
						$time=$show['time'];
						$description=$show['description'];
            $date=$show['date'];

          echo ("<tr> <td valign='middle' align=\"center\"><a href=\"process_update.php?event_id=$eventid&event_name=$eventname&place=$location&date=$date&time=$time&description=$description\">$eventid</a></td>
                <td valign='middle' align=\"center\">$eventname</td>
                <td valign='middle' align=\"center\">$location</td>"); }
          echo ("</table>"); }
          else { echo ("Cant find no records."); }
          mysqli_free_result($check);
          ?>
          <br />
        <h3>Go back to the <a href="yourevents.php">Previous Page</a></h3>

    </main>

  </body>
  </html>
