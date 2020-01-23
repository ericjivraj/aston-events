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
        <li><a href="allevents_details.php" class="active"><span>Events</span></a></li>
        <li><a href="register.html"><span>Register</span></a></li>
        <li><a href="login.html"><span>Login</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
      <section id="events-message" class="jumbotron">
        <div class="container">
          <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
      </section>

      <section class="sports" align="center">
        <h1 class="col-xs-12">Sports Events</h1>
                <?php
	                      $query = mysqli_query($connect, "SELECT * FROM event WHERE category like 'Sports'") or die("Couldn't not find any events!"); // Alterar Campos
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
                          <th>More Details</th>
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
                        <td><button><a href=view_more_details.php?event_id=".$eventid." name='viewdetails' value='Details'>Details</a></button></td>
                        </tr>";
			                  }
                        echo"</table>";
		                    }
                        ?>
                        <h4>Search <a href="searchevents.php"> Events</a></h4>
                        <h4>List <a href="popularevents.php">Popular Events</a></h4>
                        <h4>List <a href="recentevents.php">Recent Events</a></h4>
                        <h4>List <a href="culture.php">Culture Events</a></h4>
                        <h4>List <a href="others.php">Other Events</a></h4>
                        <h3>Go Back to the <a href="allevents_details.php">Previous Page</a></h3>
      </section>

    </main>

  </body>
  </html>
