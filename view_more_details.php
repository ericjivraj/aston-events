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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
        <?php
        $eventid = $_GET['event_id'];

        $query = mysqli_query($connect, "SELECT * FROM event WHERE event_id LIKE '$eventid'") or die("Couldn't not find any events!"); // Alterar Campos
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
        echo '<h3>Event Name: '.$eventname.' <br />Organiser: '.$orgname.' <br /> Location: '.$location.'<br />
        Date: '.$date.'<br /> Time: '.$time.'<br /> <img width="250" height="200" src="data:image/jpeg;base64,'
         . base64_encode( $row['picture'] ) . '"/></div><br /> Category: '.$category.'<br />
        Description: '.$description.'<br />
        <button type="submit" name="like" id="btnSubmit"><a href=like.php?event_id='.$eventid.'>Like</a></button></h3>';
        }
        }
         ?>

        <h3>Go Back to the <a href="allevents_details.php">Previous Page</a></h3>
      </section>
    </main>

  </body>
  </html>
