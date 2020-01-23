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
        <li><a href="index1.php"><span>Home</span></a></li>
				<li><a href="view.php" class="active"><span>View</span></a></li>
        <li><a href="change.php"><span>Change</span></a></li>
        <li><a href="remove.php"><span>Remove</span></a></li>
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
        <FieldSet>
        <legend Align="Left"><h1> Events: </h1> </legend>
        <?php
        $sql= "SELECT * FROM event";
        $result = mysqli_query($connect, $sql);
        $n_reg = mysqli_num_rows($result);
        echo "<h3>Nº Events:".$n_reg." </h3></br>";
        while($reg = mysqli_fetch_array($result))
        {
        echo  $reg['event_name']." - Organised by -  ".
              $reg['org_name'];
              echo "</br>";
        }
        mysqli_close($connect);
        ?>


    	  <h3>Go back to the  <a href="view.php">Previous Page</a> </h3>
      </section>
    </main>

  </body>
  </html>
