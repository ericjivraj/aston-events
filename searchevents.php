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
        <li><a href="register.php"><span>Register</span></a></li>
        <li><a href="login.php"><span>Login</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="events-message" class="jumbotron">
          <div class="container">
            <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
          </div>
        </section>
        <section align="center">
        <h1>Search Events: </h1> <br>
		 <h3 align="center">Event Name:</h3>
		   <form action="searchevents.php" method="POST" align="center">
	        <input align="center" type="text" name="search" placeholder=""/> <p> <p>
	           <input align="center" img src="images/search.png" width="150" height="150" type="image" id="search" value="Search"/>
           </form>
           <?php
           if (isset($_POST['search'])) {
	            $searchq = $_POST['search'];
	             if($searchq<>"") {
	             $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	             $query = mysqli_query($connect, "SELECT * FROM event WHERE event_name LIKE '%$searchq%'") or die("Couldn't not search!"); // Alterar Campos
	             $count = mysqli_num_rows($query);
		                  if($count == 0) {
			                echo 'No Events were Found!';
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
		}
	 else {
		echo "Fill in the field!<p>";
	}
}
?>
        <h4>List <a href="popularevents.php">Popular Events</a></h4>
        <h4>List <a href="recentevents.php">Recent Events</a></h4>
        <h4>List <a href="sports.php">Sports Events</a></h4>
        <h4>List <a href="culture.php">Culture Events</a></h4>
        <h4>List <a href="others.php">Other Events</a></h4>
        <h3>Go Back to the <a href="allevents_details.php">Previous Page</a></h3>
      </section>
    </main>

  </body>
  </html>
