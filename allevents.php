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
        <li><a href="events.html" class="active"><span>Events</span></a></li>
        <li><a href="register.php"><span>Register</span></a></li>
        <li><a href="login.php"><span>Login</span></a></li>
        <li><a href="contact.html"><span>Contact</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="events-message" class="jumbotron">
          <div class="container">
            <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
          </div>
        </section>
        <h1>View All Events</h1>
                <?php
	                      $query = mysqli_query($connect, "SELECT * FROM event") or die("Couldn't not find any events!");
	                      $count = mysqli_num_rows($query);
		                    if($count == 0) {
			                  echo 'No Events were found!';
		                    } else {
			                  while($row = mysqli_fetch_array($query)) {
				                $eventname = $row['event_name'];
                        $orgname = $row['org_name'];
                        $category = $row['category'];
                        $date = $row['date'];
                        $pic = $row['picture'];
				                $time = $row['time'];
                        $location = $row['place'];
				                $description = $row['description'];
				                echo '<h3>Event Name: '.$eventname.'<br /> Time: '.$time.'<br />Description: '.$description.'<br />
                        <h3><a href="allevents_details.php">View More Details</a></h3></h3>';
			                  }
		                    }
                        ?>
        <h3>Go Back to the <a href="events.html">Previous Page</a></h3>
    </main>

  </body>
  </html>
