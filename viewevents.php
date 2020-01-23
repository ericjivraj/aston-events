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
        <section align="center">
        <h1>View Your Events</h1>
                <?php
												$userid = $_SESSION['org_id'];

												$query = mysqli_query($connect, "SELECT * FROM event WHERE org_id LIKE '$userid'") or die("Couldn't not find any events!"); // Alterar Campos
	                      $count = mysqli_num_rows($query);
		                    if($count == 0) {
			                  echo 'No Events were found!';
		                    } else {
                          echo"<table><tr>
                          <th>Event Name</th>
                          <th>Organiser Name</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th>Likes</th>
                          </tr>";
			                  while($row = mysqli_fetch_array($query)) {
                        $eventid = $row['event_id'];
				                $eventname = $row['event_name'];
                        $orgname = $row['org_name'];
                        $category = $row['category'];
                        $date = $row['date'];
                        $pic = $row['picture'];
				                $time = $row['time'];
                        $location = $row['place'];
				                $description = $row['description'];
                        $like = $row['like_count'];
                        echo "<tr>
                        <td>".$eventname."</td>
                        <td>".$orgname."</td>
                        <td>".$category."</td>
                        <td>".$date."</td>
                        <td>".$time."</td>
                        <td>".$location."</td>
                        <td>".$description."</td>
                        <td>".$like."</td>
                        </tr>";
			                  }
                        echo"</table>";
		                    }
                        ?>
                          <h3>Go back to the <a href="yourevents.php">Previous Page</a></h3>
                        </section>
    </main>

  </body>
  </html>
