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
        <li><a href="yourevents.php"><span>Your Events</span></a></li>
        <li><a href="create.php" class="active"><span>Create Events</span></a></li>
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
        <section>
        <h2>Create an Event</h2>
        <Fieldset> <form enctype="multipart/form-data" method="POST" name="changer" action="create.php">
         Event Name: <input name="event_name" type="text" required><p><br>
         <!--Organiser Name: <input name="organiser_name" type="text"><p><br>-->
         Location: <input name="location" type="text" required><p><br>
         Date: <input name="date" type="date" required><p><br>
         Time: <input name="time" type="Time" required><p><br>
         Category<select name="category" required>
           <option value="Sports">Sports</option>
           <option value="Culture">Culture</option>
           <option value="Others">Others</option>
         </select><br />
         Description: <input name="description" type="text" required><p><br>
         <input name="MAX_FILE_SIZE" value="102400" type="hidden">
         Picture: [JPG/JPEG] <input name="image" accept="image/jpeg" type="file" required><p><br>
         <input class="plan-button" name="create_event" value="Create Event" type="submit"><br> </form>

    		<?php
         if(isset($_POST['create_event'])) {
          $eventname=$_POST['event_name'];
          $location=$_POST['location'];
          $date=$_POST['date'];
          $time=$_POST['time'];
          $category=$_POST['category'];
          $description=$_POST['description'];
          $userid = $_SESSION['org_id'];
					$userfname = $_SESSION['fname'];

          if (isset($_FILES['image']) && ($_FILES['image']['size'] > 0)) {

					$tmpName = $_FILES['image']['tmp_name'];
          $fp = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);
          $query = "INSERT INTO event (event_id,org_id,event_name,org_name,picture,place,date,time,category,description,like_count)
          VALUES (default,$userid,'$eventname','$userfname','$data','$location','$date','$time','$category','$description',0)";

          $results = mysqli_query($connect, $query);

    	    echo "<p> <b>You have successfully created an Event!</b>";
      }
          mysqli_close($connect);
         }
         ?>
    	</Fieldset>
      </section>
    </main>

  </body>
  </html>
