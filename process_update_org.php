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
				<li><a href="index1.php"><span>Home</span></a></li>
				<li><a href="view.php"><span>View</span></a></li>
        <li><a href="change.php" class="active"><span>Change</span></a></li>
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
        <Fieldset Align="Center"><form method="POST" action="process_update_org1.php">
        <tr> <td width="100px" align="left"><h3>Organiser ID: </h3><?php $orgid=$_GET['org_id']; echo $orgid;?></td> </tr>
        <tr> <p> <td width="200px" align="left"><h3>Forename: </h3><input type="text" name="fname" value="<?php $fname=$_GET['fname']; echo $fname; ?>"></td> </tr>
        <tr> <p> <td width="200px" align="left"><h3>Surname: </h3><input type="text" name="lname" value="<?php $lname=$_GET['lname']; echo $lname; ?>"></td> </tr>
        <tr> <p> <td width="200px" align="left"><h3>Username: </h3><input type="text" name="username" value="<?php $username=$_GET['username']; echo $username; ?>"></td> </tr>
        <tr> <p> <td width="300px" align="left"><h3>Email: </h3><input type="email" name="email" value="<?php $email=$_GET['email']; echo $email; ?>"></td>
        <tr> <p> <td width="200px" align="left"><h3>Phone: </h3><input type="text" name="phone" value="<?php $phone=$_GET['phone']; echo $phone; ?>"></td> </tr>

        </tr>
        <tr></tr>
        <tr><td>
        <p> <br> <input type="submit" name="update" value="Update">
        <input type="hidden" name="org_id" value="<?php echo $orgid; ?> ">
      </form> <a href="changeorg.php"><input type="submit" name="cancel" value="Cancel"> </a> </Fieldset>
    </main>

  </body>
  </html>
