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
      <h1><a href="index1.php"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
        <li><a href="index1.php" class="active"><span>Home</span></a></li>
				<li><a href="view.php"><span>View</span></a></li>
        <li><a href="change.php"><span>Change</span></a></li>
        <li><a href="remove.php"><span>Remove</span></a></li>
        <li><a href="logout.php"><span>Log Out</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="join-up-message" class="jumbotron">
          <div class="container">
            <h2>You are an Admin, Welcome!</h2>
          </div>
        </section>

        <?php
          if($_SESSION['username']) {
    	  echo "<h1> Welcome <span>".$_SESSION['username']."</span>! </h1>";
    	  }
    	  ?>
    </main>

  </body>
  </html>
